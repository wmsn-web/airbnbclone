<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-room/Add-room'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>
<div class="tab-pane" role="tabpanel" aria-labelledby="add-room-wizard-tab3"
    id="add-room-wizard-tab3">
    <div class="row g-0">
        <div class="col-xxl-8">
            <form id="addPropertyWizardForm3" novalidate="novalidate" data-wizard-form="3">
                <div class="d-sm-flex flex-between-center gap-3">
                    <h3 class="mb-4 mb-sm-0">Amenities</h3>
                    <div class="row g-3">
                        <div class="col-sm-auto flex-sm-fill">
                            <div class="form-floating"><input class="form-control" type="text"
                                    name="add-room-wizard-search-amenities"
                                    id="add-room-wizardwizard-search-amenities"
                                    placeholder="Search amenities" value=""><label
                                    for="add-room-wizardwizard-search-amenities">Search
                                    amenities</label><svg
                                    class="svg-inline--fa fa-magnifying-glass position-absolute text-body-quaternary fs-9 end-0 top-0 mt-3 me-3"
                                    data-fa-transform="down-2" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="magnifying-glass" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;">
                                    <g transform="translate(256 256)">
                                        <g transform="translate(0, 64)  scale(1, 1)  rotate(0 0 0)">
                                            <path fill="currentColor"
                                                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                                                transform="translate(-256 -256)"></path>
                                        </g>
                                    </g>
                                </svg><!-- <span class="fa-solid fa-search position-absolute text-body-quaternary fs-9 end-0 top-0 mt-3 me-3" data-fa-transform="down-2"></span> Font Awesome fontawesome.com -->
                            </div>
                        </div>
                        <div class="col-sm-auto"><button
                                class="btn btn-phoenix-primary w-100 h-100 fs-8"><svg
                                    class="svg-inline--fa fa-plus me-2" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="plus" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                    </path>
                                </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Add
                                amenity</button></div>
                    </div>
                </div>
                <div class="accordion-button-arrow-icon accordion mt-2"
                    id="generalAmenitiesAccordion">
                    <div class="accordion-item px-0 py-3">
                        <h5 class="accordion-header"><button
                                class="accordion-button py-0 text-body-highlight" type="button"
                                data-bs-toggle="collapse" data-bs-target="#popularAmenities"
                                aria-expanded="true" aria-controls="popularAmenities"><span
                                    class="circle-icon-item border border-primary text-primary me-3"><svg
                                        class="svg-inline--fa fa-fire" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="fire"
                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z">
                                        </path>
                                    </svg><!-- <span class="fa-solid fa-fire"></span> Font Awesome fontawesome.com --></span><span
                                    class="flex-1">Popular amenities</span></button></h5>
                        <div class="accordion-collapse collapse ms-md-9 show" id="popularAmenities"
                            data-bs-parent="#generalAmenitiesAccordion">
                            <div class="form-price-tier border p-3 rounded-2 my-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="wifi" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="wifi">Wifi</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="wifi-free" name="Wifi-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="wifi-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="wifi-paid" name="Wifi-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="wifi-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="wifi-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="wifi-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="wifi-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="wifi-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="wifi-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="wifi-option3">Option 3</label></div><button
                                            class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="breakfast" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="breakfast">Breakfast</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="breakfast-free" name="Breakfast-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="breakfast-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="breakfast-paid" name="Breakfast-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="breakfast-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="breakfast-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="breakfast-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="breakfast-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="breakfast-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="breakfast-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="breakfast-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="gym" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="gym">Gym</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="gym-free" name="Gym-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label" for="gym-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="gym-paid" name="Gym-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label" for="gym-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="gym-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="gym-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="gym-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="gym-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="gym-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="gym-option3">Option 3</label></div><button
                                            class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="swimming" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="swimming">Swimming pool</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="swimming-free" name="Swimming pool-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="swimming-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="swimming-paid" name="Swimming pool-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="swimming-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="swimming-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="swimming-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="swimming-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="swimming-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="swimming-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="swimming-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="in-room" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="in-room">In-room coffee/tea</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="in-room-free" name="In-room coffee/tea-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="in-room-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="in-room-paid" name="In-room coffee/tea-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="in-room-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="in-room-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="in-room-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="in-room-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="in-room-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="in-room-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="in-room-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="daily-housekeeping"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="daily-housekeeping">Daily housekeeping</label>
                                    </div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="daily-housekeeping-free"
                                                name="Daily housekeeping-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="daily-housekeeping-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="daily-housekeeping-paid"
                                                name="Daily housekeeping-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="daily-housekeeping-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="daily-housekeeping-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="daily-housekeeping-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="daily-housekeeping-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="daily-housekeeping-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="daily-housekeeping-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="daily-housekeeping-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="bar" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="bar">Bar / Lounge</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="bar-free" name="Bar / Lounge-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label" for="bar-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="bar-paid" name="Bar / Lounge-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label" for="bar-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="bar-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="bar-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="bar-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="bar-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="bar-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="bar-option3">Option 3</label></div><button
                                            class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="laundry" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="laundry">Laundry</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="laundry-free" name="Laundry-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="laundry-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="laundry-paid" name="Laundry-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="laundry-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="laundry-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="laundry-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="laundry-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="laundry-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="laundry-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="laundry-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="newspaper" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="newspaper">Newspaper</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="newspaper-free" name="Newspaper-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="newspaper-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="newspaper-paid" name="Newspaper-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="newspaper-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="newspaper-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="newspaper-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="newspaper-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="newspaper-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="newspaper-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="newspaper-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="bicycle" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="bicycle">Bicycle</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="bicycle-free" name="Bicycle-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="bicycle-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="bicycle-paid" name="Bicycle-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="bicycle-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="bicycle-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="bicycle-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="bicycle-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="bicycle-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="bicycle-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="bicycle-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="air" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="air">Air conditioning</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="air-free" name="Air conditioning-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label" for="air-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="air-paid" name="Air conditioning-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label" for="air-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="air-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="air-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="air-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="air-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="air-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="air-option3">Option 3</label></div><button
                                            class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="games" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="games">Games room</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="games-free" name="Games room-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="games-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="games-paid" name="Games room-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="games-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="games-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="games-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="games-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="games-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="games-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="games-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="beach" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="beach">Beach view</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="beach-free" name="Beach view-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="beach-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="beach-paid" name="Beach view-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="beach-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="beach-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="beach-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="beach-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="beach-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="beach-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="beach-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item px-0 py-3">
                        <h5 class="accordion-header"><button
                                class="accordion-button py-0 text-body-highlight collapsed"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#foodAndDrink" aria-expanded="false"
                                aria-controls="foodAndDrink"><span
                                    class="circle-icon-item border border-primary text-primary me-3"><svg
                                        class="svg-inline--fa fa-utensils" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="utensils"
                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z">
                                        </path>
                                    </svg><!-- <span class="fa-solid fa-utensils"></span> Font Awesome fontawesome.com --></span><span
                                    class="flex-1 me-2">Food &amp; Drink</span></button></h5>
                        <div class="accordion-collapse collapse ms-md-9" id="foodAndDrink"
                            data-bs-parent="#generalAmenitiesAccordion">
                            <div class="form-price-tier border p-3 rounded-2 my-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="restaurants"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="restaurants">Restaurants</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="restaurants-free" name="Restaurants-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="restaurants-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="restaurants-paid" name="Restaurants-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="restaurants-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="restaurants-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="restaurants-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="restaurants-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="restaurants-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="restaurants-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="restaurants-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="bars" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="bars">Bars</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="bars-free" name="Bars-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="bars-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="bars-paid" name="Bars-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="bars-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="bars-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="bars-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="bars-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="bars-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="bars-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="bars-option3">Option 3</label></div><button
                                            class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="in-room-dining"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="in-room-dining">In-Room Dining</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="in-room-dining-free" name="In-Room Dining-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="in-room-dining-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="in-room-dining-paid" name="In-Room Dining-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="in-room-dining-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="in-room-dining-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="in-room-dining-option1">Option 1</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="in-room-dining-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="in-room-dining-option2">Option 2</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="in-room-dining-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="in-room-dining-option3">Option 3</label>
                                        </div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="family-friendly-dining"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="family-friendly-dining">Family-Friendly
                                            Dining</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="family-friendly-dining-free"
                                                name="Family-Friendly Dining-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="family-friendly-dining-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="family-friendly-dining-paid"
                                                name="Family-Friendly Dining-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="family-friendly-dining-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="family-friendly-dining-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="family-friendly-dining-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="family-friendly-dining-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="family-friendly-dining-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="family-friendly-dining-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="family-friendly-dining-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="breakfast-buffet"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="breakfast-buffet">Breakfast Buffet</label>
                                    </div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="breakfast-buffet-free"
                                                name="Breakfast Buffet-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="breakfast-buffet-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="breakfast-buffet-paid"
                                                name="Breakfast Buffet-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="breakfast-buffet-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="breakfast-buffet-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="breakfast-buffet-option1">Option 1</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="breakfast-buffet-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="breakfast-buffet-option2">Option 2</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="breakfast-buffet-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="breakfast-buffet-option3">Option 3</label>
                                        </div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item px-0 py-3">
                        <h5 class="accordion-header"><button
                                class="accordion-button py-0 text-body-highlight collapsed"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#outdoorAndView" aria-expanded="false"
                                aria-controls="outdoorAndView"><span
                                    class="circle-icon-item border border-primary text-primary me-3"><svg
                                        class="svg-inline--fa fa-umbrella-beach" aria-hidden="true"
                                        focusable="false" data-prefix="fas"
                                        data-icon="umbrella-beach" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M346.3 271.8l-60.1-21.9L214 448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H544c17.7 0 32-14.3 32-32s-14.3-32-32-32H282.1l64.1-176.2zm121.1-.2l-3.3 9.1 67.7 24.6c18.1 6.6 38-4.2 39.6-23.4c6.5-78.5-23.9-155.5-80.8-208.5c2 8 3.2 16.3 3.4 24.8l.2 6c1.8 57-7.3 113.8-26.8 167.4zM462 99.1c-1.1-34.4-22.5-64.8-54.4-77.4c-.9-.4-1.9-.7-2.8-1.1c-33-11.7-69.8-2.4-93.1 23.8l-4 4.5C272.4 88.3 245 134.2 226.8 184l-3.3 9.1L434 269.7l3.3-9.1c18.1-49.8 26.6-102.5 24.9-155.5l-.2-6zM107.2 112.9c-11.1 15.7-2.8 36.8 15.3 43.4l71 25.8 3.3-9.1c19.5-53.6 49.1-103 87.1-145.5l4-4.5c6.2-6.9 13.1-13 20.5-18.2c-79.6 2.5-154.7 42.2-201.2 108z">
                                        </path>
                                    </svg><!-- <span class="fa-solid fa-umbrella-beach"></span> Font Awesome fontawesome.com --></span><span
                                    class="flex-1 me-2">Outdoor &amp; View</span></button></h5>
                        <div class="accordion-collapse collapse ms-md-9" id="outdoorAndView"
                            data-bs-parent="#generalAmenitiesAccordion">
                            <div class="form-price-tier border p-3 rounded-2 my-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="garden-or-courtyard"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="garden-or-courtyard">Garden or
                                            Courtyard</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="garden-or-courtyard-free"
                                                name="Garden or Courtyard-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="garden-or-courtyard-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="garden-or-courtyard-paid"
                                                name="Garden or Courtyard-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="garden-or-courtyard-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="garden-or-courtyard-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="garden-or-courtyard-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="garden-or-courtyard-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="garden-or-courtyard-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="garden-or-courtyard-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="garden-or-courtyard-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="scenic-views"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="scenic-views">Scenic Views</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="scenic-views-free" name="Scenic Views-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="scenic-views-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="scenic-views-paid" name="Scenic Views-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="scenic-views-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="scenic-views-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="scenic-views-option1">Option 1</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="scenic-views-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="scenic-views-option2">Option 2</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="scenic-views-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="scenic-views-option3">Option 3</label>
                                        </div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="sunbathing-areas"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="sunbathing-areas">Sunbathing Areas</label>
                                    </div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="sunbathing-areas-free"
                                                name="Sunbathing Areas-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="sunbathing-areas-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="sunbathing-areas-paid"
                                                name="Sunbathing Areas-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="sunbathing-areas-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="sunbathing-areas-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="sunbathing-areas-option1">Option 1</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="sunbathing-areas-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="sunbathing-areas-option2">Option 2</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="sunbathing-areas-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="sunbathing-areas-option3">Option 3</label>
                                        </div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="outdoor-lounge-areas"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="outdoor-lounge-areas">Outdoor Lounge
                                            Areas</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="outdoor-lounge-areas-free"
                                                name="Outdoor Lounge Areas-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="outdoor-lounge-areas-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="outdoor-lounge-areas-paid"
                                                name="Outdoor Lounge Areas-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="outdoor-lounge-areas-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="outdoor-lounge-areas-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="outdoor-lounge-areas-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="outdoor-lounge-areas-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="outdoor-lounge-areas-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="outdoor-lounge-areas-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="outdoor-lounge-areas-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item px-0 py-3">
                        <h5 class="accordion-header"><button
                                class="accordion-button py-0 text-body-highlight collapsed"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#intertainment" aria-expanded="false"
                                aria-controls="intertainment"><span
                                    class="circle-icon-item border border-primary text-primary me-3"><svg
                                        class="svg-inline--fa fa-cart-shopping" aria-hidden="true"
                                        focusable="false" data-prefix="fas"
                                        data-icon="cart-shopping" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z">
                                        </path>
                                    </svg><!-- <span class="fa-solid fa-cart-shopping"></span> Font Awesome fontawesome.com --></span><span
                                    class="flex-1 me-2">Entertainment &amp; Family
                                    Services</span></button></h5>
                        <div class="accordion-collapse collapse ms-md-9" id="intertainment"
                            data-bs-parent="#generalAmenitiesAccordion">
                            <div class="form-price-tier border p-3 rounded-2 my-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="game-room" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="game-room">Game Room</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="game-room-free" name="Game Room-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="game-room-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="game-room-paid" name="Game Room-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="game-room-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="game-room-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="game-room-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="game-room-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="game-room-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="game-room-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="game-room-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="play-area" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="play-area">Children's Play Area</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="play-area-free"
                                                name="Children's Play Area-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="play-area-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="play-area-paid"
                                                name="Children's Play Area-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="play-area-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="play-area-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="play-area-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="play-area-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="play-area-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="play-area-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="play-area-option3">Option 3</label></div>
                                        <button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="sports-facilities"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="sports-facilities">Sports Facilities</label>
                                    </div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="sports-facilities-free"
                                                name="Sports Facilities-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="sports-facilities-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="sports-facilities-paid"
                                                name="Sports Facilities-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="sports-facilities-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="sports-facilities-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="sports-facilities-option1">Option 1</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="sports-facilities-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="sports-facilities-option2">Option 2</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="sports-facilities-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="sports-facilities-option3">Option 3</label>
                                        </div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="babysitting-services"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="babysitting-services">Babysitting
                                            Services</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="babysitting-services-free"
                                                name="Babysitting Services-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="babysitting-services-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="babysitting-services-paid"
                                                name="Babysitting Services-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="babysitting-services-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="babysitting-services-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="babysitting-services-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="babysitting-services-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="babysitting-services-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="babysitting-services-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="babysitting-services-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item px-0 py-3">
                        <h5 class="accordion-header"><button
                                class="accordion-button py-0 text-body-highlight collapsed"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#mediaAndTechnology" aria-expanded="false"
                                aria-controls="mediaAndTechnology"><span
                                    class="circle-icon-item border border-primary text-primary me-3"><svg
                                        class="svg-inline--fa fa-video" aria-hidden="true"
                                        focusable="false" data-prefix="fas" data-icon="video"
                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 576 512" data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M0 128C0 92.7 28.7 64 64 64H320c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128zM559.1 99.8c10.4 5.6 16.9 16.4 16.9 28.2V384c0 11.8-6.5 22.6-16.9 28.2s-23 5-32.9-1.6l-96-64L416 337.1V320 192 174.9l14.2-9.5 96-64c9.8-6.5 22.4-7.2 32.9-1.6z">
                                        </path>
                                    </svg><!-- <span class="fa-solid fa-video"></span> Font Awesome fontawesome.com --></span><span
                                    class="flex-1 me-2">Media &amp; Technology</span></button>
                        </h5>
                        <div class="accordion-collapse collapse ms-md-9" id="mediaAndTechnology"
                            data-bs-parent="#generalAmenitiesAccordion">
                            <div class="form-price-tier border p-3 rounded-2 my-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="high-speed-internet"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="high-speed-internet">High-Speed
                                            Internet</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="high-speed-internet-free"
                                                name="High-Speed Internet-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="high-speed-internet-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="high-speed-internet-paid"
                                                name="High-Speed Internet-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="high-speed-internet-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="high-speed-internet-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="high-speed-internet-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="high-speed-internet-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="high-speed-internet-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="high-speed-internet-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="high-speed-internet-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="business-center"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="business-center">Business Center</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="business-center-free"
                                                name="Business Center-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="business-center-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="business-center-paid"
                                                name="Business Center-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="business-center-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="business-center-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="business-center-option1">Option 1</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="business-center-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="business-center-option2">Option 2</label>
                                        </div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="business-center-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="business-center-option3">Option 3</label>
                                        </div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="video-conferencing"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="video-conferencing">Video Conferencing
                                            Facilities</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="video-conferencing-free"
                                                name="Video Conferencing Facilities-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="video-conferencing-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="video-conferencing-paid"
                                                name="Video Conferencing Facilities-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="video-conferencing-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="video-conferencing-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="video-conferencing-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="video-conferencing-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="video-conferencing-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="video-conferencing-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="video-conferencing-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="vr" type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="vr">Virtual Reality (VR) Experiences</label>
                                    </div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="vr-free"
                                                name="Virtual Reality (VR) Experiences-radio"
                                                value="free" data-pricing="data-pricing"><label
                                                class="form-check-label" for="vr-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="vr-paid"
                                                name="Virtual Reality (VR) Experiences-radio"
                                                value="paid" data-pricing="data-pricing"><label
                                                class="form-check-label" for="vr-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="vr-option1" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="vr-option1">Option 1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="vr-option2" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="vr-option2">Option 2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="vr-option3" type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="vr-option3">Option 3</label></div><button
                                            class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item px-0 py-3">
                        <h5 class="accordion-header"><button
                                class="accordion-button py-0 text-body-highlight collapsed"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#accessibility" aria-expanded="false"
                                aria-controls="accessibility"><span
                                    class="circle-icon-item border border-primary text-primary me-3"><svg
                                        class="svg-inline--fa fa-universal-access"
                                        aria-hidden="true" focusable="false" data-prefix="fas"
                                        data-icon="universal-access" role="img"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        data-fa-i2svg="">
                                        <path fill="currentColor"
                                            d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm161.5-86.1c-12.2-5.2-26.3 .4-31.5 12.6s.4 26.3 12.6 31.5l11.9 5.1c17.3 7.4 35.2 12.9 53.6 16.3v50.1c0 4.3-.7 8.6-2.1 12.6l-28.7 86.1c-4.2 12.6 2.6 26.2 15.2 30.4s26.2-2.6 30.4-15.2l24.4-73.2c1.3-3.8 4.8-6.4 8.8-6.4s7.6 2.6 8.8 6.4l24.4 73.2c4.2 12.6 17.8 19.4 30.4 15.2s19.4-17.8 15.2-30.4l-28.7-86.1c-1.4-4.1-2.1-8.3-2.1-12.6V235.5c18.4-3.5 36.3-8.9 53.6-16.3l11.9-5.1c12.2-5.2 17.8-19.3 12.6-31.5s-19.3-17.8-31.5-12.6L338.7 175c-26.1 11.2-54.2 17-82.7 17s-56.5-5.8-82.7-17l-11.9-5.1zM256 160a40 40 0 1 0 0-80 40 40 0 1 0 0 80z">
                                        </path>
                                    </svg><!-- <span class="fa-solid fa-universal-access"></span> Font Awesome fontawesome.com --></span><span
                                    class="flex-1 me-2">Accessibility</span></button></h5>
                        <div class="accordion-collapse collapse ms-md-9" id="accessibility"
                            data-bs-parent="#generalAmenitiesAccordion">
                            <div class="form-price-tier border p-3 rounded-2 my-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="accessible-common-areas"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="accessible-common-areas">Accessible Common
                                            Areas</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="accessible-common-areas-free"
                                                name="Accessible Common Areas-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="accessible-common-areas-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="accessible-common-areas-paid"
                                                name="Accessible Common Areas-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="accessible-common-areas-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-common-areas-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-common-areas-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-common-areas-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-common-areas-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-common-areas-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-common-areas-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="accessible-parking-spaces"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="accessible-parking-spaces">Accessible Parking
                                            Spaces</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="accessible-parking-spaces-free"
                                                name="Accessible Parking Spaces-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="accessible-parking-spaces-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="accessible-parking-spaces-paid"
                                                name="Accessible Parking Spaces-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="accessible-parking-spaces-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-parking-spaces-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-parking-spaces-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-parking-spaces-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-parking-spaces-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-parking-spaces-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-parking-spaces-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2 mb-3"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="accessible-fitness-center"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="accessible-fitness-center">Accessible Fitness
                                            Center</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="accessible-fitness-center-free"
                                                name="Accessible Fitness Center-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="accessible-fitness-center-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="accessible-fitness-center-paid"
                                                name="Accessible Fitness Center-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="accessible-fitness-center-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-fitness-center-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-fitness-center-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-fitness-center-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-fitness-center-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-fitness-center-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-fitness-center-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-price-tier border p-3 rounded-2"
                                data-form-price-tier="data-form-price-tier">
                                <div class="d-sm-flex align-items-center gap-3">
                                    <div class="form-check form-switch mb-0"><input
                                            class="form-check-input" id="accessible-swimmings-pool"
                                            type="checkbox"
                                            data-price-toggle="data-price-toggle"><label
                                            class="form-check-label fs-8 fw-bold text-body ms-2"
                                            for="accessible-swimmings-pool">Accessible Swimming
                                            Pool</label></div>
                                    <div class="pricings ms-auto mt-2 mt-sm-0">
                                        <div class="form-check form-check-inline me-3 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="accessible-swimmings-pool-free"
                                                name="Accessible Swimming Pool-radio" value="free"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="accessible-swimmings-pool-free">Free</label>
                                        </div>
                                        <div class="form-check form-check-inline me-0 mb-0">
                                            <input class="form-check-input" type="radio"
                                                id="accessible-swimmings-pool-paid"
                                                name="Accessible Swimming Pool-radio" value="paid"
                                                data-pricing="data-pricing"><label
                                                class="form-check-label"
                                                for="accessible-swimmings-pool-paid">Paid</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                                    <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-swimmings-pool-option1"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-swimmings-pool-option1">Option
                                                1</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-swimmings-pool-option2"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-swimmings-pool-option2">Option
                                                2</label></div>
                                        <div class="form-check mb-4"><input class="form-check-input"
                                                id="accessible-swimmings-pool-option3"
                                                type="checkbox"><label
                                                class="form-check-label fw-normal fs-8 fw-semibold"
                                                for="accessible-swimmings-pool-option3">Option
                                                3</label></div><button class="btn btn-link p-0"><svg
                                                class="svg-inline--fa fa-plus me-2"
                                                aria-hidden="true" focusable="false"
                                                data-prefix="fas" data-icon="plus" role="img"
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z">
                                                </path>
                                            </svg><!-- <span class="fa-solid fa-plus me-2"></span> Font Awesome fontawesome.com -->Additional
                                            Condition</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        const form = document.getElementById('addPropertyWizardForm3');

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