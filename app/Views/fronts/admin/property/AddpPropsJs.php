<script>
    // Global variables
    let segmentCount = 1;
    let dropzoneInstance = null;

    // Notification function
    function showNotification(type, message) {
        notyf.open({
            type: type,
            message: message
        });
    }

    // Setup slider function
    function setupSlider(sliderEl, fromInput, toInput) {
        const slider = noUiSlider.create(sliderEl, {
            start: [parseInt(fromInput.value), parseInt(toInput.value)],
            connect: true,
            range: {
                min: 0,
                max: 18
            },
            step: 1
        });

        slider.on('update', function(values) {
            fromInput.value = Math.round(values[0]);
            toInput.value = Math.round(values[1]);
        });

        fromInput.addEventListener('input', () => {
            slider.set([fromInput.value, null]);
        });

        toInput.addEventListener('input', () => {
            slider.set([null, toInput.value]);
        });
    }

    function setupAjaxFormSubmission(form, isFileUpload = false) {
        if (!form) return;

        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn?.innerHTML;

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Show loading state
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            }

            try {
                let formData;
                let contentType;

                if (isFileUpload) {
                    formData = new FormData(this);
                    contentType = false; // Let browser set Content-Type with boundary
                } else {
                    formData = new FormData(this);
                    const params = new URLSearchParams();
                    for (const [key, value] of formData.entries()) {
                        params.append(key, value);
                    }
                    formData = params;
                    contentType = 'application/x-www-form-urlencoded';
                }

                const headers = {};
                // Always include CSRF token in header
                const csrfToken = document.querySelector('input[name="<?= csrf_token() ?>"]')?.value;
                if (csrfToken) {
                    headers['X-CSRF-TOKEN'] = csrfToken;
                }

                if (contentType) {
                    headers['Content-Type'] = contentType;
                }

                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: headers
                });

                // ... [rest of the code]
            } catch (error) {
                showNotification(`error, An error occurred: ${error.message}`);
                console.log(`error: ${error}`);

            } finally {
                // Reset button state
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            }
        });
    }
    // Setup AJAX form submission
    function setupAjaxFormSubmission(form, isFileUpload = false) {
        if (!form) return;

        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn?.innerHTML;

        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Show loading state
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            }

            try {
                let formData;

                if (isFileUpload) {
                    formData = new FormData(this);
                } else {
                    formData = new FormData(this);
                    const params = new URLSearchParams();
                    for (const [key, value] of formData.entries()) {
                        params.append(key, value);
                    }
                    formData = params;
                }

                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: isFileUpload ? {} : {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    }
                });

                const data = await response.json();

                if (data.success) {
                    showNotification('success', data.msg);

                    // Redirect to next tab if specified
                    if (data.nextTab) {
                        setTimeout(() => {
                            window.location.href = `/admin/add_property/${data.nextTab}/${data.hotelId || '<?= $hotelId ?>'}`;
                        }, 1500);
                    }
                } else {
                    // Handle different error types
                    if (data.type === 'validation') {
                        // Display validation errors
                        for (const field in data.msg) {
                            if (data.msg.hasOwnProperty(field)) {
                                showNotification('error', data.msg[field]);
                            }
                        }
                    } else {
                        showNotification('error', data.msg);
                    }
                }
            } catch (error) {
                showNotification('error', 'An error occurred: ' + error.message);
            } finally {
                // Reset button state
                if (submitBtn) {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            }
        });
    }

    // Update condition field function
    function updateConditionField(checkbox, freeRadio, paidRadio, conditionContainer) {
        if (checkbox.checked && paidRadio && paidRadio.checked) {
            conditionContainer.classList.add('show');
        } else {
            conditionContainer.classList.remove('show');
        }
    }

    // Remove photo function
    function removePhoto(photoName, hotelId) {
        if (confirm('Are you sure you want to remove this photo?')) {
            fetch(`/admin/remove-photo/${hotelId}/${photoName}`, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        '<?= csrf_token() ?>': document.querySelector('input[name="<?= csrf_token() ?>"]').value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showNotification('success', 'Photo removed successfully');
                        // Reload the page to reflect changes
                        setTimeout(() => location.reload(), 1000);
                    } else {
                        showNotification('error', data.message || 'Failed to remove photo');
                    }
                })
                .catch(error => {
                    showNotification('error', 'An error occurred while removing the photo');
                });
        }
    }

    // Initialize Dropzone
    function initializeDropzone() {
        if (typeof Dropzone === 'undefined') return;

        dropzoneInstance = new Dropzone("#gallery-dropzone", {
            url: "<?= base_url('admin/save-photos/' . $hotelId) ?>",
            paramName: "photos",
            uploadMultiple: true,
            parallelUploads: 10,
            maxFilesize: 2, // MB
            acceptedFiles: "image/jpeg,image/jpg,image/png,image/webp",
            addRemoveLinks: false,
            autoProcessQueue: false, // We'll process when form is submitted
            previewTemplate: document.querySelector('.dz-preview').innerHTML,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="<?= csrf_token() ?>"]').value
            },
            init: function() {
                this.on("addedfile", function(file) {
                    // Show the preview template
                    const previewElement = file.previewElement;
                    previewElement.querySelector('[data-dz-name]').textContent = file.name;
                    previewElement.querySelector('[data-dz-size]').textContent = this.filesize(file.size);

                    // Add remove event listener
                    const removeButton = previewElement.querySelector('[data-dz-remove]');
                    removeButton.addEventListener('click', function(e) {
                        e.preventDefault();
                        dropzoneInstance.removeFile(file);
                    });
                });

                this.on("sendingmultiple", function(files, xhr, formData) {
                    // Add CSRF token to form data
                    formData.append('<?= csrf_token() ?>', document.querySelector('input[name="<?= csrf_token() ?>"]').value);
                });

                this.on("successmultiple", function(files, response) {
                    if (response.success) {
                        showNotification('success', response.msg);
                        // Redirect to next tab after a short delay
                        setTimeout(function() {
                            window.location.href = '/admin/add_property/' + response.nextTab + '/' + response.hotelId;
                        }, 1500);
                    } else {
                        showNotification('error', response.msg);
                    }
                });

                this.on("errormultiple", function(files, response) {
                    showNotification('error', 'An error occurred during upload');
                });
            }
        });
    }

    // Add age segment
    function addAgeSegment() {
        segmentCount++;

        const fromId = `addsegfr${segmentCount}`;
        const toId = `addsegto${segmentCount}`;
        const sliderId = `asi${segmentCount}`;

        const newDiv = document.createElement('div');
        newDiv.classList.add('age-segment-box');
        newDiv.innerHTML =
            `<h5 class="mb-2 mt-4 text-body">
            <span>Age Segment ${segmentCount}</span>
            <button class="btn btn-link p-0 ms-1 remove-seg" type="button">Remove</button>
        </h5>
        <div class="row align-items-center g-3">
            <div class="col-6 col-sm-auto">
                <div class="form-floating age-segment-input">
                    <input class="form-control input-spin-none" type="number" id="${fromId}" name="age_segments[${segmentCount - 1}][from]" value="0" />
                    <label for="${fromId}">From (Yrs)</label>
                </div>
            </div>
            <div class="col-12 col-sm-auto flex-1 order-1 order-sm-0">
                <div class="noUi-target-primary noUi-handle-primary noUi-slider-slim noUi-handle-circle px-2" id="${sliderId}"></div>
            </div>
            <div class="col-6 col-sm-auto">
                <div class="form-floating age-segment-input">
                    <input class="form-control input-spin-none" type="number" id="${toId}" name="age_segments[${segmentCount - 1}][to]" value="7" />
                    <label for="${toId}">To (Yrs)</label>
                </div>
            </div>
        </div>
        `;

        const segBox = document.querySelector('#addagesegment');
        segBox.appendChild(newDiv);

        const sliderElement = document.getElementById(sliderId);
        const fromInput = document.getElementById(fromId);
        const toInput = document.getElementById(toId);
        setupSlider(sliderElement, fromInput, toInput);
    }

    // Toggle chain input
    function toggleChainInput() {
        const noRadio = document.getElementById("no1");
        const yesRadio = document.getElementById("yes1");
        const chainInput = document.getElementById("chain_name");

        if (noRadio && yesRadio && chainInput) {
            chainInput.disabled = noRadio.checked;
            if (noRadio.checked) {
                chainInput.removeAttribute('required');
            } else {
                chainInput.setAttribute('required', 'required');
            }
        }
    }

    // Main initialization
    document.addEventListener("DOMContentLoaded", function() {
        // Set up AJAX for all forms except the Dropzone form (Tab4)
        const forms = document.querySelectorAll('form:not(#addPropertyWizardForm4)');
        forms.forEach(form => {
            const isFileUpload = form.enctype === 'multipart/form-data';
            setupAjaxFormSubmission(form, isFileUpload);
        });

        // Initialize chain input toggle
        toggleChainInput();
        document.getElementById("no1")?.addEventListener("change", toggleChainInput);
        document.getElementById("yes1")?.addEventListener("change", toggleChainInput);

        // Main form submission button handler
        const formSubmitBtn = document.getElementById('submit-form');
        if (formSubmitBtn) {
            formSubmitBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const activeTab = document.querySelector('.tab-pane.active');
                if (!activeTab) return;

                const form = activeTab.querySelector('form');
                if (form) {
                    form.dispatchEvent(new Event('submit'));
                }
            });
        }

        // Hide submit button on final tab
        const activeTabId = document.querySelector('.tab-pane.active')?.id;
        if (activeTabId == 'add-property-wizard-tab7' && formSubmitBtn) {
            formSubmitBtn.style.display = 'none';
        }

        // Done button handler
        const doneBtn = document.getElementById('finished');
        if (doneBtn) {
            doneBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.location.href = "<?= base_url('admin/hotel_listing'); ?>";
            });
        }

        // Setup the first segment slider
        const from = document.getElementById('addsegfr1');
        const to = document.getElementById('addsegto1');
        const slider = document.getElementById('asi1');
        if (from && to && slider) {
            setupSlider(slider, from, to);
        }

        // Add age segment button
        const addSegBtn = document.querySelector('#addsegment');
        addSegBtn?.addEventListener('click', function(e) {
            e.preventDefault();
            addAgeSegment();
        });

        // Remove segment functionality
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-seg')) {
                e.preventDefault();
                e.target.closest('.age-segment-box')?.remove();
            }
        });

        // Prevent clicking on disabled tabs
        document.querySelectorAll('.nav-wizard .nav-link.disabled').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.classList.contains('disabled')) {
                    e.preventDefault();
                    showNotification('warning', 'Please complete the current step before proceeding to the next one.');
                }
            });
        });

        // Handle price tier toggling
        document.querySelectorAll('[data-price-toggle]').forEach(checkbox => {
            const slug = checkbox.value;
            const freeRadio = document.getElementById(`${slug}-free`);
            const paidRadio = document.getElementById(`${slug}-paid`);
            const conditionContainer = document.querySelector(`[data-pricing-collapse][aria-labelledby="${slug}-paid"]`);

            if (freeRadio && paidRadio && conditionContainer) {
                // Initial state
                updateConditionField(checkbox, freeRadio, paidRadio, conditionContainer);

                // Add event listeners
                checkbox.addEventListener('change', () => {
                    updateConditionField(checkbox, freeRadio, paidRadio, conditionContainer);
                });

                freeRadio.addEventListener('change', () => updateConditionField(checkbox, freeRadio, paidRadio, conditionContainer));
                paidRadio.addEventListener('change', () => updateConditionField(checkbox, freeRadio, paidRadio, conditionContainer));
            }
        });

        // Initialize Dropzone only if the element exists
        if (document.getElementById('gallery-dropzone')) {
            initializeDropzone();
        }

        // Handle photo form submission (Tab4) - We are using Dropzone, so we don't need the generic AJAX for this form.
        // But we have to handle the form submission when the common button is clicked.
        // We have already set up the form to be excluded from the generic AJAX, so we need to set up the Dropzone form separately.
        // Actually, the Dropzone form is handled by the Dropzone instance. We don't need to set up an additional submit event.

        // However, we have to make sure that when the common button is clicked, the Dropzone form's submit event is triggered, which will be handled by Dropzone.
        // We have already set up the common button to trigger the form's submit event, and the Dropzone form has a submit event listener that prevents the default and processes the queue.

        // But note: the Dropzone form does not have a submit button inside it, so the form's submit event is triggered by the common button.

        // We are good.

        // Initialize accordions to show the first one by default
        const firstAccordion = document.querySelector('.accordion-button:not(.collapsed)');
        if (firstAccordion) {
            firstAccordion.click();
        }

        // Initialize date/time pickers
        if (typeof flatpickr !== 'undefined') {
            document.querySelectorAll('.datetimepicker').forEach(input => {
                const options = JSON.parse(input.getAttribute('data-options') || '{}');
                flatpickr(input, options);
            });
        }

        // Show any server-side messages
        <?php if (session()->has('success')): ?>
            showNotification('success', '<?= session('success') ?>');
        <?php endif; ?>

        <?php if (session()->has('errors')): ?>
            <?php if (is_array(session('errors'))): ?>
                <?php foreach (session('errors') as $error): ?>
                    showNotification('error', '<?= $error ?>');
                <?php endforeach; ?>
            <?php else: ?>
                showNotification('error', '<?= session('errors') ?>');
            <?php endif; ?>
        <?php endif; ?>
    });
</script>