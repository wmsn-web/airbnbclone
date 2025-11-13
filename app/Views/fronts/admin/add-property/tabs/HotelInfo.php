<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-property/AddProperty.php'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>
<div class="tab-pane active show" role="tabpanel" aria-labelledby="add-property-wizard-tab1" id="add-property-wizard-tab1">
    <form action="<?= base_url('admin/add-property/save-hotel' . (!empty($hotelId) ? '/' . $hotelId : '')) ?>" method="post" id="addPropertyWizardForm1" data-wizard-form="1" enctype="multipart/form-data" novalidate="novalidate">
        <h3 class="mb-6">Basic information</h3>
        <h4 class="mb-4">Property Information</h4>
        <div class="form-floating">
            <input class="form-control" type="text" name="property_name" id="property_name" placeholder="Property Name" value="" />
            <label for="property_name">Property Name</label>
        </div>
        <div class="form-floating my-3">
            <textarea class="form-control" placeholder="Description" name="description" id="description" style="height: 162px;"></textarea><label for="description">DESCRIPTION</label>
        </div>
        <div class="row g-3">
            <div class="col-md-4 col-lg-12 col-xl-4">
                <div class="form-icon-container">
                    <div class="form-floating">
                        <select class="form-select form-icon-input" name="rating" id="rating">
                            <?php foreach (['5', '4', '3', '2', '1'] as $star): ?>
                                <option value="<?= $star ?>"> <?= $star ?> star </option>
                            <?php endforeach; ?>
                        </select>
                        <label class="text-body-tertiary form-icon-label" for="rating">Rating</label>
                    </div>
                    <span class="fa-solid fa-star text-warning form-icon fs-10"></span>
                </div>
            </div>
        </div>
        <h4 class="mt-6 mb-3">Contact Information</h4>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control input-spin-none" type="email" name="email" id="email" placeholder="Email Address" /><label for="email">Email Address</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control input-spin-none" type="tel" name="phone" id="phone" placeholder="Phone number" />
                </div>
            </div>
        </div>
        <h4 class="mt-6 mb-3">Is it part of a hotel / property chain?</h4>
        <div class="row align-items-center g-3">
            <div class="col-sm-auto">
                <div class="form-check form-check-inline me-4 me-sm-7 mb-0">
                    <input class="form-check-input" id="no1" type="radio" name="checkIsHotelRadio" value="no" checked>
                    <label class="form-check-label" for="no1">No</label>
                </div>
                <div class="form-check form-check-inline me-0 mb-0">
                    <input class="form-check-input" id="yes1" type="radio" name="checkIsHotelRadio" value="yes">
                    <label class="form-check-label" for="yes1">Yes</label>
                </div>
            </div>
            <div class="col-sm-auto flex-1">
                <div class="form-floating">
                    <input class="form-control" type="text" name="chain_name" id="chain_name" placeholder="Name of Company, Group or Chain" disabled>
                    <label for="chain_name">Name of Company, Group or Chain</label>
                </div>
            </div>
        </div>
        <h4 class="mt-6 mb-3">Upload thumbnail</h4>
        <div class="row align-items-center g-3">
            <div class="dropzone dropzone-single p-0 mb-5" id="my-awesome-dropzone">
                <div class="fallback">
                    <input name="thumbnail" type="file" accept=".png, .jpg, .jpeg, .webp" />
                </div>
                <div class="dz-message text-body-tertiary text-opacity-85" data-dz-message="data-dz-message">
                    Drag your thumbnail here<span class="text-body-secondary px-1">or</span><button class="btn btn-link p-0" type="button">Browse from device</button><br />(600 X 750)<br />
                    <img class="mt-3 me-2" src="<?= base_url() ?>assets/img/icons/image-icon.png" width="40" alt="" />
                </div>
                <div class="dz-preview d-flex flex-wrap mt-3">
                    <div class="rounded-2 overflow-hidden me-2 mb-2 position-relative" style="height: 140px; width: 200px;">
                        <img class="w-100 h-100 object-fit-cover" src="" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                        <button class="btn dropdown-toggle dropdown-caret-none px-3 text-body bg-body dz-remove w-auto h-auto py-0 border" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="top: 16px; right: 16px;">
                            <span class="fa-solid fa-ellipsis"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end py-1">
                            <li><a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6">
            <button class="btn btn-primary px-6 px-sm-11" type="submit" id="submit-tab1">Next</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>

<!-- individual Js -->
<?= $this->section('wizard-script'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hInfo = document.querySelector("#addPropertyWizardForm1");
        const dropzoneContainer = document.getElementById('my-awesome-dropzone');
        const previewContainer = dropzoneContainer.querySelector('.dz-preview');
        const dropzoneMessage = dropzoneContainer.querySelector('.dz-message');
        // ☎️ Telephone input setup
        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                fetch("https://ipapi.co/json")
                    .then(res => res.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback("us"));
            },
            utilsScript: "<?= base_url('vendors/telephoneinput/js/utils.js') ?>",
            separateDialCode: true
        });

        // 🏨 Chain toggle logic
        const noRadio = document.getElementById("no1");
        const yesRadio = document.getElementById("yes1");
        const chainInput = document.getElementById("chain_name");

        function toggleChainInput() {
            chainInput.disabled = noRadio.checked;
        }
        toggleChainInput();
        noRadio.addEventListener("change", toggleChainInput);
        yesRadio.addEventListener("change", toggleChainInput);

        // 🖼️ Dropzone (UI only)
        const previewTemplate = previewContainer.innerHTML;
        previewContainer.innerHTML = '';

        const myDropzone = new Dropzone("div.dropzone-single", {
            url: "#", // not used
            autoProcessQueue: false, // disable Dropzone upload
            uploadMultiple: false,
            maxFiles: 1,
            acceptedFiles: ".png,.jpg,.jpeg,.webp",
            addRemoveLinks: true,
            previewTemplate: previewTemplate,
            previewsContainer: previewContainer,
            init: function() {
                this.on("addedfile", function() {
                    if (this.files.length >= this.options.maxFiles) {
                        dropzoneMessage.style.display = "none";
                    }
                });
                this.on("removedfile", function() {
                    dropzoneMessage.style.display = "";
                });
            }
        });

        // 📤 Manual submission
        if (hInfo) {
            hInfo.addEventListener("submit", async function(e) {
                e.preventDefault();

                // Clean phone number
                let fullNumber = input.value;
                if (typeof intlTelInputUtils !== "undefined") {
                    fullNumber = iti.getNumber(intlTelInputUtils.numberFormat.E164);
                } else {
                    fullNumber = iti.getNumber(); // fallback
                }
                input.value = fullNumber.replace("+", "").replace(/\s+/g, "");

                const formData = new FormData(hInfo);

                // Include Dropzone file (if any)
                if (myDropzone.files.length > 0) {
                    formData.append("thumbnail", myDropzone.files[0]);
                }

                try {
                    const response = await fetch(hInfo.action, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    const data = await response.json();

                    if (data.success) {
                        showNotyf("success", data.msg);
                        // Optionally reset Dropzone and form
                        Object.entries(data).forEach(([key, value]) => {
                            console.log(`${key}: ${value}`);
                        });
                        setTimeout(() => {
                            window.location.href = "https://www.example.com/new-page";
                        }, 800);
                    }

                    if (data.error) {
                        const errorMsgs = Object.values(data.msg);
                        errorMsgs.forEach(msg => {
                            if (msg) showNotyf("error", msg);
                        });
                        console.table(data.msg);
                    }
                } catch (err) {
                    showNotyf("error", "Something went wrong! " + err.message);
                    console.error("Submission error:", err);
                }
            });
        }
    });
</script>
<?= $this->endSection(); ?>