<!-- Hotel amenities tab -->
<div class="tab-pane <?= ($activeTab == 'tab3') ? 'active show' : '' ?>" role="tabpanel" aria-labelledby="add-property-wizard-tab3" id="add-property-wizard-tab3">
    <!-- Add amenities form -->
    <form action="<?= base_url('admin/add-property/add-amenities/' . $hotelId) ?>" method="post" id="addAmenityForm">
        <?= csrf_field() ?>
        <div>
            <h3 class="mb-6">General amenities</h3>
            <div class="row g-3">
                <div class="col-sm-auto flex-sm-fill">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="amenities-catagory" id="add-property-wizardwizard-amenities-catagory"
                            placeholder="Amenities Category" required>
                        <label for="add-property-wizardwizard-amenities-catagory">Amenities Category</label>
                    </div>
                </div>
                <div class="col-sm-auto flex-sm-fill">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="amenities" id="add-property-wizardwizard-amenities"
                            placeholder="Amenity" required>
                        <label for="add-property-wizardwizard-amenities">Amenity</label>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <button class="btn btn-phoenix-primary w-100 h-100 fs-8" type="submit" id="add_ame">
                        <svg class="svg-inline--fa fa-plus me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>
                        </svg>Add amenity
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- Add Hotel amenities form -->
    <form action="<?= base_url('admin/save-hotel-amenities/' . $hotelId) ?>" method="post" id="addPropertyWizardForm3" data-wizard-form="3">
        <?php if (!empty($amsData)): ?>
            <?= csrf_field() ?>
            <?php
            $s = 1;
            foreach ($amsData as $ams):
                $sl = $s++;
                $show = "";
                if ($sl == 1) {
                    $show = "show";
                }
            ?>

                <div class="accordion-button-arrow-icon accordion mt-5" id="amenitiesAccordion<?= $sl; ?>">
                    <div class="accordion-item px-0 py-3">
                        <h5 class="accordion-header">
                            <button class="accordion-button py-0 text-body-highlight" type="button" data-bs-toggle="collapse" data-bs-target="#popularAmenities<?= $sl; ?>" aria-expanded="true" aria-controls="popularAmenities<?= $sl; ?>">
                                <span class="circle-icon-item border border-primary text-primary me-3">
                                    <svg class="svg-inline--fa fa-fire" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="fire" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M159.3 5.4c7.8-7.3 19.9-7.2 27.7 .1c27.6 25.9 53.5 53.8 77.7 84c11-14.4 23.5-30.1 37-42.9c7.9-7.4 20.1-7.4 28 .1c34.6 33 63.9 76.6 84.5 118c20.3 40.8 33.8 82.5 33.8 111.9C448 404.2 348.2 512 224 512C98.4 512 0 404.1 0 276.5c0-38.4 17.8-85.3 45.4-131.7C73.3 97.7 112.7 48.6 159.3 5.4zM225.7 416c25.3 0 47.7-7 68.8-21c42.1-29.4 53.4-88.2 28.1-134.4c-4.5-9-16-9.6-22.5-2l-25.2 29.3c-6.6 7.6-18.5 7.4-24.7-.5c-16.5-21-46-58.5-62.8-79.8c-6.3-8-18.3-8.1-24.7-.1c-33.8 42.5-50.8 69.3-50.8 99.4C112 375.4 162.6 416 225.7 416z"></path>
                                    </svg>
                                </span>
                                <span class="flex-1"><?= $ams['category']; ?></span>
                            </button>
                        </h5>
                        <div class="accordion-collapse collapse ms-md-9 <?= $show; ?>" id="popularAmenities<?= $sl; ?>" data-bs-parent="#amenitiesAccordion<?= $sl; ?>">
                            <?php
                            $dc = [];
                            if ($hamData !== null && isset($hamData['amenities'])) {
                                $dc = json_decode($hamData['amenities'], true);
                            }
                            ?>
                            <?php foreach ($ams['amenities'] as $am):
                                $slug = $am->am_slug;
                                $name = $am->am_name;

                                $isChecked = array_key_exists($slug, $dc);
                                $type = $isChecked ? $dc[$slug]['type'] : '';
                                $condition = $isChecked ? $dc[$slug]['condition'] : '';

                                $freeChecked = ($type === 'free' || $type === '') ? 'checked' : '';
                                $paidChecked = ($type === 'paid') ? 'checked' : '';
                                $collapseShow = ($type === 'paid') ? 'show' : '';
                                $isActive = $isChecked ? 'active' : '';
                            ?>
                                <div class="form-price-tier border p-3 rounded-2 my-3 <?= $isActive; ?>" data-form-price-tier="data-form-price-tier">
                                    <div class="d-sm-flex align-items-center gap-3">
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" id="<?= $slug; ?>" type="checkbox"
                                                name="am_data[]" data-price-toggle="data-price-toggle"
                                                value="<?= $slug; ?>" <?= $isChecked ? 'checked' : '' ?>>
                                            <label class="form-check-label fs-8 fw-bold text-body ms-2" for="<?= $slug; ?>">
                                                <?= $name; ?>
                                            </label>
                                        </div>
                                        <div class="pricings ms-auto mt-2 mt-sm-0">
                                            <div class="form-check form-check-inline me-3 mb-0">
                                                <input class="form-check-input" type="radio" id="<?= $slug; ?>-free"
                                                    name="<?= $slug; ?>-radio" value="free" data-pricing="data-pricing" <?= $freeChecked ?>>
                                                <label class="form-check-label" for="<?= $slug; ?>-free">Free</label>
                                            </div>
                                            <div class="form-check form-check-inline me-0 mb-0">
                                                <input class="form-check-input" type="radio" id="<?= $slug; ?>-paid"
                                                    name="<?= $slug; ?>-radio" value="paid" data-pricing="data-pricing" <?= $paidChecked ?>>
                                                <label class="form-check-label" for="<?= $slug; ?>-paid">Paid</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse <?= $collapseShow ?>" data-pricing-collapse="data-pricing-collapse">
                                        <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                            <div class="form-floating">
                                                <input class="form-control" type="text" name="<?= $slug; ?>-condition"
                                                    id="<?= $slug; ?>-condition" placeholder="Condition" value="<?= esc($condition) ?>">
                                                <label for="<?= $slug; ?>-condition">Condition</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Hidden submit button (optional) -->
        <div class="d-none">
            <button type="submit" class="btn btn-primary">Save Amenities</button>
        </div>
    </form>
</div>