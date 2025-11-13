<div class="tab-pane <?= ($activeTab == 'tab1') ? 'active show' : '' ?>" role="tabpanel" aria-labelledby="add-property-wizard-tab1" id="add-property-wizard-tab1">
    <form action="<?= base_url('admin/add-property/save-hotel' . (!empty($hotelId) ? '/' . $hotelId : '')) ?>" method="post" enctype="multipart/form-data" id="addPropertyWizardForm1" data-wizard-form="1">
        <?= csrf_field() ?>
        <h3 class="mb-6">Basic information</h3>
        <h4 class="mb-4">Property Information</h4>

        <!-- Property Name -->
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="property-name" id="property-name"
                placeholder="Property Name" value="<?= set_value('property-name', $hData['property_name'] ?? '') ?>"
                required>
            <label for="property-name">Property Name</label>
        </div>

        <!-- Description -->
        <div class="form-floating mb-3">
            <textarea class="form-control" name="description" id="description" placeholder="Description"
                style="height: 162px"><?= set_value('description', $hData['description'] ?? '') ?></textarea>
            <label for="description">DESCRIPTION</label>
        </div>

        <!-- Rating -->
        <div class="row g-3 mb-3">
            <div class="col-md-4 col-lg-12 col-xl-4">
                <div class="form-icon-container">
                    <div class="form-floating">
                        <select class="form-select form-icon-input" name="rating" id="rating" required>
                            <?php foreach (['5', '4', '3', '2', '1'] as $star): ?>
                                <option value="<?= $star ?>" <?= set_select('rating', $star, ($hData['rating'] ?? '') == $star) ?>>
                                    <?= $star ?> star
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <label class="text-body-tertiary form-icon-label" for="rating">Rating</label>
                    </div>
                    <svg class="svg-inline--fa fa-star text-warning form-icon fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <h4 class="mt-6 mb-3">Contact Information</h4>

        <!-- Email and Phone -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control input-spin-none" type="email" name="email" id="email"
                        placeholder="Email Address" value="<?= set_value('email', $hData['email'] ?? '') ?>"
                        required>
                    <label for="email">Email Address</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control input-spin-none" type="tel" name="phone" id="phone"
                        placeholder="Phone number" value="<?= set_value('phone', $hData['phone'] ?? '') ?>"
                        required>
                    <label for="phone">Phone number</label>
                </div>
            </div>
        </div>

        <h4 class="mt-6 mb-3">Is it part of a hotel / property chain?</h4>

        <!-- Chain Selection -->
        <div class="row align-items-center g-3 mb-3">
            <div class="col-sm-auto">
                <div class="form-check form-check-inline me-4 me-sm-7 mb-0">
                    <input class="form-check-input" id="no1" type="radio" name="checkIsHotelRadio"
                        value="no" <?= (empty($hData['chain_name'])) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="no1">No</label>
                </div>
                <div class="form-check form-check-inline me-0 mb-0">
                    <input class="form-check-input" id="yes1" type="radio" name="checkIsHotelRadio"
                        value="yes" <?= (!empty($hData['chain_name'])) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="yes1">Yes</label>
                </div>
            </div>
            <div class="col-sm-auto flex-1">
                <div class="form-floating">
                    <input class="form-control" type="text" name="chain_name" id="chain_name"
                        placeholder="Name of Company, Group or Chain"
                        <?= !empty($hData['chain_name']) ? 'value="' . htmlspecialchars($hData['chain_name']) . '"' : '' ?>>
                    <label for="chain_name">Name of Company, Group or Chain</label>
                </div>
            </div>
        </div>

        <!-- Current Thumbnail -->
        <?php if (!empty($hData['thumbnail'])): ?>
            <h4 class="mt-6 mb-3">Current Thumbnail</h4>
            <div class="mb-3">
                <img src="<?= base_url('writable/uploads/hotel-thumbnails/' . $hData['thumbnail']) ?>"
                    width="250" class="rounded shadow-sm" alt="Current thumbnail" />
            </div>
        <?php endif; ?>

        <!-- Thumbnail Upload -->
        <h4 class="mt-6 mb-3"><?= !empty($hData['thumbnail']) ? 'Update' : 'Upload'; ?> thumbnail</h4>
        <div class="mb-3">
            <label class="form-label" for="customFile"><span>372 X 465 px</span></label>
            <input class="form-control" id="customFile" name="thumbnail" type="file"
                accept=".jpg, .jpeg, .png, .webp" <?= empty($hData['thumbnail']) ? 'required' : '' ?> />
        </div>

        <!-- Submit button (optional, as you have one in the layout) -->
        <div class="d-none">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>