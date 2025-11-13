<script>
    // 🔔 Notification helper
    function showNotyf(type, message) {
        notyf.open({
            type: type,
            message: message
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
        

        let segmentCount = 1;

        const segBox = document.querySelector('#addagesegment');
        const addSegBtn = document.querySelector('#addsegment');

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

        addSegBtn?.addEventListener('click', function(e) {
            e.preventDefault();
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
            segBox.appendChild(newDiv);

            const sliderElement = document.getElementById(sliderId);
            const fromInput = document.getElementById(fromId);
            const toInput = document.getElementById(toId);
            setupSlider(sliderElement, fromInput, toInput);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-seg')) {
                e.preventDefault();
                e.target.closest('.age-segment-box')?.remove();
            }
        });



        // tabSubmit1.addEventListener('click', function() {
        // })
    });
</script>