<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-room/Add-room'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>
<div class="tab-pane" role="tabpanel" aria-labelledby="add-room-wizard-tab2" id="add-room-wizard-tab2">
    <div class="row g-0">
        <div class="col-xxl-8">
            <form id="addPropertyWizardForm2" name="addPropertyWizardForm2" data-wizard-form="2">
                <h3 class="mb-6">Pricing</h3>
                <h4 class="mb-2">Base price per night</h4>
                <p class="mb-5 text-body-tertiary">Get a great value stay with us, starting at our base price per night.</p>

                <div class="nav nav-tabs mb-2" id="day-week-pricing" role="tablist">
                    <div class="form-check form-check-inline me-3">
                        <input class="form-check-input active" type="radio" id="all-day-tab" name="dayWeekPricing" value="all" checked="checked" data-bs-toggle="tab" data-bs-target="#allDayPricing" aria-controls="allDayPricing" aria-selected="true" role="tab">
                        <label class="form-check-label" for="all-day-tab">Across all days</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="day-of-week-tab" name="dayWeekPricing" value="byday" data-bs-toggle="tab" data-bs-target="#dayOfWeekPricing" aria-controls="dayOfWeekPricing" aria-selected="false" tabindex="-1" role="tab">
                        <label class="form-check-label" for="day-of-week-tab">By day of week</label>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="allDayPricing" role="tabpanel" aria-labelledby="all-day-tab" tabindex="0">
                        <div class="row gx-2 w-sm-60">
                            <div class="col-8">
                                <div class="form-floating">
                                    <input class="form-control" type="text" name="room_price[]" id="room-price" placeholder="Room price" />
                                    <label for="room-price">Room price</label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-floating">
                                    <select class="form-select" name="room_price_currency[]" id="room-price-currency">
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="BDT">BDT</option>
                                    </select>
                                    <label for="room-price-currency">Currency</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="dayOfWeekPricing" role="tabpanel" aria-labelledby="day-of-week-tab" tabindex="0">
                        <div class="card bg-body-highlight">
                            <div class="card-body">
                                <div class="row gx-2 justify-content-between">
                                    <div class="col col-sm-auto">
                                        <label class="mb-1 text-body-highlight fw-bold fs-9" for="date">Date</label>
                                        <div class="form-icon-container">
                                            <input class="form-control datetimepicker form-icon-input flatpickr-input" id="date" name="date_range" type="text" placeholder="Start date" data-options='{"disableMobile":true,"mode":"range","minDate":"today","dateFormat":"d-m-y"}' readonly="readonly" />
                                            <span class="fa-solid fa-calendar-alt form-icon fs-9 text-body-tertiary" data-fa-transform="up-1" aria-hidden="true"></span>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <label class="mb-1 text-body-highlight fw-bold fs-9" for="day-of-week-currency">Currency</label>
                                        <select class="form-select" name="day_of_week_currency" id="day-of-week-currency">
                                            <option value="USD">USD</option>
                                            <option value="EUR">EUR</option>
                                            <option value="BDT">BDT</option>
                                        </select>
                                    </div>
                                </div>

                                <hr class="mb-2" />

                                <div class="row g-2">
                                    <div class="col-4 col-sm">
                                        <label class="mb-1 text-body-highlight fw-bold fs-9" for="sunday">Sunday</label>
                                        <input class="form-control input-spin-none" id="sunday" name="day_price_sunday" type="number" value="100" />
                                    </div>

                                    <div class="col-4 col-sm">
                                        <label class="mb-1 text-body-highlight fw-bold fs-9" for="monday">Monday</label>
                                        <input class="form-control input-spin-none" id="monday" name="day_price_monday" type="number" value="100" />
                                    </div>

                                    <div class="col-4 col-sm">
                                        <label class="mb-1 text-body-highlight fw-bold fs-9" for="tuesday">Tuesday</label>
                                        <input class="form-control input-spin-none" id="tuesday" name="day_price_tuesday" type="number" value="100" />
                                    </div>

                                    <div class="col-4 col-sm">
                                        <label class="mb-1 text-body-highlight fw-bold fs-9" for="wednesday">Wednesday</label>
                                        <input class="form-control input-spin-none" id="wednesday" name="day_price_wednesday" type="number" value="100" />
                                    </div>

                                    <div class="col-4 col-sm">
                                        <label class="mb-1 text-body-highlight fw-bold fs-9" for="thursday">Thursday</label>
                                        <input class="form-control input-spin-none" id="thursday" name="day_price_thursday" type="number" value="100" />
                                    </div>

                                    <div class="col-4 col-sm">
                                        <label class="mb-1 text-body-highlight fw-bold fs-9" for="friday">Friday</label>
                                        <input class="form-control input-spin-none" id="friday" name="day_price_friday" type="number" value="100" />
                                    </div>

                                    <div class="col-4 col-sm">
                                        <label class="mb-1 text-body-highlight fw-bold fs-9" for="saturday">Saturday</label>
                                        <input class="form-control input-spin-none" id="saturday" name="day_price_saturday" type="number" value="100" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <label class="mb-2 mt-5 lh-1 text-body-highlight fw-bold">How many people are included in the base rate?</label>
                <div class="form-floating w-sm-60">
                    <select class="form-select" name="people_select" id="people-select">
                        <option value="5">05 People</option>
                        <option value="10">10 People</option>
                        <option value="15">15 People</option>
                    </select>
                    <label for="people-select">Select</label>
                </div>

                <div class="d-flex align-items-center gap-2 mt-7">
                    <label class="fs-7 fw-bold text-body-emphasis" for="extraBedSwitch">Extra bed option</label>
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" id="extraBedSwitch" name="extra_bed" type="checkbox" role="button" data-bs-toggle="collapse" data-bs-target="#extraBedCollapse" aria-expanded="false" aria-controls="extraBedCollapse" aria-pressed="true" value="1" />
                    </div>
                </div>

                <p class="fs-9 text-body-tertiary mb-0">Can you provide extra bed</p>

                <div class="collapse" id="extraBedCollapse">
                    <div class="mt-4">
                        <div class="row gx-3">
                            <div class="col-6 col-sm-4 col-xxl-5">
                                <label class="mb-1 text-body-highlight fw-bold" for="number-of-bed-pricing">Number of bed</label>
                                <div class="input-group gap-1" data-quantity="data-quantity">
                                    <button class="btn btn-phoenix-primary px-3 bg-body-emphasis bg-body-hover rounded" type="button" data-type="minus">-</button>
                                    <input class="form-control flex-1 border-translucent input-spin-none text-center rounded" id="number-of-bed-pricing" name="number_of_beds" type="number" value="2" />
                                    <button class="btn btn-phoenix-primary px-3 bg-body-emphasis bg-body-hover rounded" type="button" data-type="plus">+</button>
                                </div>
                            </div>

                            <div class="col-6 col-sm-4 col-xxl-5">
                                <label class="mb-1 text-body-highlight fw-bold" for="pricing-bed-type">Bed type</label>
                                <select class="form-select" id="pricing-bed-type" name="pricing_bed_type">
                                    <option value="twin">Twin bed</option>
                                    <option value="king">King bed</option>
                                    <option value="queen">Queen bed</option>
                                    <option value="single">Single bed</option>
                                    <option value="double">Double bed</option>
                                    <option value="twin-xl">Twin XL bed</option>
                                    <option value="quad">Quad Bed</option>
                                    <option value="executive">Executive Suite</option>
                                    <option value="bunk">Bunk Bed</option>
                                </select>
                            </div>
                        </div>

                        <h5 class="mt-4 mb-3">Check the box(es) if you can accommodate the following guests in extra beds.</h5>

                        <div class="row gx-2 gy-0 align-items-center mb-3">
                            <div class="col-12 col-sm-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="age-range-1" name="age_range[]" value="1" />
                                    <label class="form-check-label text-body-emphasis" for="age-range-1">02-06 year olds</label>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-floating">
                                    <input class="form-control" type="text" name="room_price[]" id="room-price-1" placeholder="Room price" />
                                    <label for="room-price-1">Room price</label>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-floating">
                                    <select class="form-select" name="room_price_currency[]" id="room-price-currency-1">
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="BDT">BDT</option>
                                    </select>
                                    <label for="room-price-currency-1">Currency</label>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-2 gy-0 align-items-center mb-3">
                            <div class="col-12 col-sm-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="age-range-2" name="age_range[]" value="2" />
                                    <label class="form-check-label text-body-emphasis" for="age-range-2">07-12 year olds</label>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-floating">
                                    <input class="form-control" type="text" name="room_price[]" id="room-price-2" placeholder="Room price" />
                                    <label for="room-price-2">Room price</label>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-floating">
                                    <select class="form-select" name="room_price_currency[]" id="room-price-currency-2">
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="BDT">BDT</option>
                                    </select>
                                    <label for="room-price-currency-2">Currency</label>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-2 gy-0 align-items-center mb-3">
                            <div class="col-12 col-sm-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="age-range-3" name="age_range[]" value="3" />
                                    <label class="form-check-label text-body-emphasis" for="age-range-3">12-16 year olds</label>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-floating">
                                    <input class="form-control" type="text" name="room_price[]" id="room-price-3" placeholder="Room price" />
                                    <label for="room-price-3">Room price</label>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-floating">
                                    <select class="form-select" name="room_price_currency[]" id="room-price-currency-3">
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="BDT">BDT</option>
                                    </select>
                                    <label for="room-price-currency-3">Currency</label>
                                </div>
                            </div>
                        </div>

                        <div class="row gx-2 gy-0 align-items-center">
                            <div class="col-12 col-sm-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="age-range-4" name="age_range[]" value="4" />
                                    <label class="form-check-label text-body-emphasis me-5" for="age-range-4">For adults</label>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-floating">
                                    <input class="form-control" type="text" name="room_price[]" id="room-price-4" placeholder="Room price" />
                                    <label for="room-price-4">Room price</label>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="form-floating">
                                    <select class="form-select" name="room_price_currency[]" id="room-price-currency-4">
                                        <option value="USD">USD</option>
                                        <option value="EUR">EUR</option>
                                        <option value="BDT">BDT</option>
                                    </select>
                                    <label for="room-price-currency-4">Currency</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <h4 class="mb-2 mt-7">Breakfast</h4>
                <p class="mb-4 text-body-tertiary">Do you own multiple hotels, or are you part of a property management company or group?</p>

                <div class="nav nav-tabs mb-2" id="breakfastTab" role="tablist">
                    <div class="form-check form-check-inline me-3">
                        <input class="form-check-input active" type="radio" id="breakfast-included-tab" name="breakfast_radio" value="included" checked="checked" data-bs-toggle="tab" data-bs-target="#breakfastInCluded" aria-controls="breakfastInCluded" aria-selected="true" role="tab">
                        <label class="form-check-label" for="breakfast-included-tab">Yes, it's included in the price</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="breakfast-not-included-tab" name="breakfast_radio" value="not_included" data-bs-toggle="tab" data-bs-target="#breakfastNotIncluded" aria-controls="breakfastNotIncluded" aria-selected="false" tabindex="-1" role="tab">
                        <label class="form-check-label" for="breakfast-not-included-tab">No</label>
                    </div>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active w-sm-60" id="breakfastInCluded" role="tabpanel" aria-labelledby="breakfast-included-tab" tabindex="0">
                        <h5 class="text-body-highlight my-4">What type of food is available for breakfast for guests?</h5>

                        <div class="form-floating">
                            <select class="form-select" name="breakfast_type[]" id="breakfast-type-1">
                                <option value="continental">Continental breakfast</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                            <label for="breakfast-type-1">Option 1</label>
                        </div>

                        <div class="form-floating my-2">
                            <select class="form-select" name="breakfast_type[]" id="breakfast-type-2">
                                <option value="american">American breakfast</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                            <label for="breakfast-type-2">Option 2</label>
                        </div>

                        <div class="form-floating">
                            <select class="form-select" name="breakfast_type[]" id="breakfast-type-3">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                            <label for="breakfast-type-3">Option 3</label>
                        </div>

                        <div class="text-center mt-4">
                            <a class="fw-bold fs-9" href="#!">
                                <span class="fa-solid fa-plus me-2" aria-hidden="true"></span>Add more
                            </a>
                        </div>
                    </div>

                    <div class="tab-pane" id="breakfastNotIncluded" role="tabpanel" aria-labelledby="breakfast-not-included-tab" tabindex="0"></div>
                </div>
                <div class="mt-6 d-flex flex-wrap gap-2">
                    <button class="btn btn-primary px-6 px-sm-11" type="submit">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<!-- individual Js -->
<?= $this->section('wizard-script'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('addPropertyWizardForm2');

        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                try {
                    const submitForm = await fetch(this.action, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });

                    const resp = await submitForm.json();
                    if (!resp) {
                        notyf.open({
                            type: 'error',
                            message: "Network error. Try again"
                        });
                    }
                    if (resp) {
                        console.log(resp);

                    }

                } catch (error) {
                    console.error(`Error : ${error}`);
                }

            })
        }
    });
</script>
<?= $this->endSection(); ?>