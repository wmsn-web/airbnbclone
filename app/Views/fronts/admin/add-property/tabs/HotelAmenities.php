<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-property/AddProperty.php'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>
<div class="tab-pane <?= wizardnav('amenities', 'active show') ?>" role="tabpanel" aria-labelledby="add-property-wizard-tab3" id="add-property-wizard-tab3">
    <form action="<?= base_url('admin/add-property/add-amenities') ?>" method="post" id="addAmenityForm" novalidate="novalidate">
        <?= csrf_field(); ?>
        <h3 class="mb-6">General amenities</h3>
        <div class="row g-3">
            <div class="col-sm-auto flex-sm-fill">
                <div class="form-floating">
                    <input class="form-control" type="text" name="amenities-catagory" id="amenities-catagory" placeholder="Amenities Catagory" />
                    <label for="amenities-catagory">Amenities Catagory</label>
                </div>
            </div>
            <div class="col-sm-auto flex-sm-fill">
                <div class="form-floating">
                    <input class="form-control" type="text" name="amenities" id="amenities" placeholder="Amenity" />
                    <label for="amenities">Amenity</label>
                </div>
            </div>
            <div class="col-sm-auto">
                <button class="btn btn-phoenix-primary w-100 h-100 fs-8" id="add_ame" type="submit">
                    <svg class="svg-inline--fa fa-plus me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"></path>
                    </svg>
                    Add amenity
                </button>
            </div>
        </div>
    </form>
    <form id="addPropertyWizardForm3" novalidate="novalidate" data-wizard-form="3">
        <?php if (!empty($amsData)): ?>
            <?= csrf_field() ?>
            <?php $s = 1;
            foreach ($amsData as $ams):
                $sl = $s++;
                $show = "";
                if ($sl == 1) {
                    $show = "show";
                }
            ?>
                <div class="accordion-button-arrow-icon accordion mt-2" id="generalAmenitiesAccordion<?= $sl; ?>">
                    <div class="accordion-item px-0 py-3">
                        <h5 class="accordion-header">
                            <button class="accordion-button py-0 text-body-highlight" type="button" data-bs-toggle="collapse" data-bs-target="#popularAmenities<?= $sl; ?>" aria-expanded="true" aria-controls="popularAmenities<?= $sl; ?>">
                                <span class="circle-icon-item border border-primary text-primary me-3"><span class="fa-solid fa-fire"></span></span><span class="flex-1"><?= $ams['category']; ?></span>
                            </button>
                        </h5>
                        <div class="accordion-collapse collapse ms-md-9 <?= $show; ?>" id="popularAmenities<?= $sl; ?>" data-bs-parent="#amenitiesAccordion<?= $sl; ?>">
                            <?php
                            if ($hamData !== null && isset($hamData['amenities'])) {
                                $dc = json_decode($hamData['amenities'], true);
                            } else {
                                $dc = [];
                            }
                            foreach ($ams['amenities'] as $am):
                                $slug = $am->am_slug;
                                $name = $am->am_name;

                                $isChecked = array_key_exists($slug, $dc);
                                $type = $isChecked ? $dc[$slug]['type'] : '';
                                $condition = $isChecked ? $dc[$slug]['condition'] : '';

                                $freeChecked = ($type === 'free') || ($type === '') ? 'checked' : '';
                                $paidChecked = ($type === 'paid') ? 'checked' : '';
                                $collapseShow = ($type === 'paid') ? 'show' : '';
                                $isActive = $isChecked ? 'active' : ''; ?>
                                <div class="form-price-tier border p-3 rounded-2 my-3 <?= $isActive;  ?>" data-form-price-tier="data-form-price-tier">
                                    <div class="d-sm-flex align-items-center gap-3">
                                        <div class="form-check form-switch mb-0">
                                            <input class="form-check-input" id="<?= $am->am_slug; ?>" type="checkbox" name="am_data[]" data-price-toggle="data-price-toggle" value="<?= $slug; ?>" <?= $isChecked ? 'checked' : '' ?>>
                                            <label class="form-check-label fs-8 fw-bold text-body ms-2" for="<?= $slug; ?>">
                                                <?= $name; ?>
                                            </label>
                                        </div>
                                        <div class="pricings ms-auto mt-2 mt-sm-0">
                                            <div class="form-check form-check-inline me-3 mb-0">
                                                <input class="form-check-input" type="radio" id="<?= $slug; ?>-free" name="<?= $slug; ?>-radio" value="free" data-pricing="data-pricing" <?= $freeChecked ?>>
                                                <label class="form-check-label" for="<?= $slug; ?>-free">Free</label>
                                            </div>
                                            <div class="form-check form-check-inline me-0 mb-0">
                                                <input class="form-check-input" type="radio" id="<?= $slug; ?>-paid" name="<?= $slug; ?>-radio" value="paid" data-pricing="data-pricing" <?= $paidChecked ?>>
                                                <label class="form-check-label" for="<?= $slug; ?>-paid">Paid</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse <?= $collapseShow ?>" data-pricing-collapse="data-pricing-collapse">
                                        <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                                            <div class="form-floating">
                                                <input class="form-control" type="text" name="<?= $slug; ?>-condition" id="<?= $slug; ?>-condition" placeholder="Search amenities" value="<?= esc($condition) ?>">
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
        const addAmenityForm = document.querySelector("#addAmenityForm");
        const hAmenities = document.querySelector("#addPropertyWizardForm3");

        // ADD NEW AMENITY
        if (addAmenityForm) {
            addAmenityForm.addEventListener("submit", async function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                try {
                    const response = await fetch(this.action, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (data.success) {
                        showNotyf("success", data.msg);
                        setTimeout(() => location.reload(), 800); // optional reload
                    } else if (data.error) {
                        if (data.type === "duplicate") {
                            showNotyf("error", data.msg);
                        } else if (data.type === "validation") {
                            Object.values(data.msg).forEach(msg => showNotyf("error", msg));
                        } else {
                            showNotyf("error", data.msg);
                        }
                    }
                } catch (err) {
                    showNotyf("error", "Something went wrong! " + err.message);
                    console.error("Submission error:", err);
                }
            });
        }

        // SAVE HOTEL AMENITIES
        if (hAmenities) {
            hAmenities.addEventListener("submit", async function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                try {
                    const response = await fetch(this.action, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });
                    const data = await response.json();

                    if (data.success) {
                        showNotyf("success", data.msg);
                        // optionally go to next tab
                        // goToWizardTab(data.nextTab);
                    } else if (data.error) {
                        Object.values(data.msg).forEach(msg => showNotyf("error", msg));
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