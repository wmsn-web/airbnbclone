<!-- Hotel Location tab -->
<div class="tab-pane <?= ($activeTab == 'tab2') ? 'active show' : '' ?>" role="tabpanel" aria-labelledby="add-property-wizard-tab2" id="add-property-wizard-tab2">
    <form action="<?= base_url('admin/add-property/save-location/' . $hotelId); ?>" method="post" id="addPropertyWizardForm2" data-wizard-form="2">
        <?= csrf_field() ?>
        <h3 class="mb-6">Location</h3>

        <!-- Search Address (Disabled) -->
        <div class="form-icon-container mb-3">
            <div class="form-floating">
                <input class="form-control form-icon-input" type="text" name="add-property-wizard-search-address" id="add-property-wizardwizard-search-address" placeholder="Search address..." value="" disabled>
                <label class="text-body-tertiary form-icon-label" for="add-property-wizardwizard-search-address">Search address...</label>
            </div>
            <svg class="svg-inline--fa fa-location-dot text-body form-icon fs-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-dot" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                <path fill="currentColor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"></path>
            </svg>
            <svg class="svg-inline--fa fa-location-crosshairs position-absolute text-primary fs-9 end-0 top-0 mt-3 me-3" data-fa-transform="down-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="location-crosshairs" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.625em;">
                <g transform="translate(256 256)">
                    <g transform="translate(0, 64)  scale(1, 1)  rotate(0 0 0)">
                        <path fill="currentColor" d="M256 0c17.7 0 32 14.3 32 32V66.7C368.4 80.1 431.9 143.6 445.3 224H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H445.3C431.9 368.4 368.4 431.9 288 445.3V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.3C143.6 431.9 80.1 368.4 66.7 288H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H66.7C80.1 143.6 143.6 80.1 224 66.7V32c0-17.7 14.3-32 32-32zM128 256a128 128 0 1 0 256 0 128 128 0 1 0 -256 0zm128-80a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" transform="translate(-256 -256)"></path>
                    </g>
                </g>
            </svg>
        </div>

        <!-- Map Container -->
        <div class="mapbox-container rounded-3 border overflow-hidden mt-3 mb-6">
            <div id="mapbox" data-mapbox="{&quot;attributionControl&quot;:false,&quot;center&quot;:[-74.0020158,40.7228022],&quot;zoom&quot;:14,&quot;scrollZoom&quot;:false}" style="height: 250px" class="mapboxgl-map">
                <!-- Map content remains the same -->
            </div>
        </div>

        <!-- Street Name -->
        <div class="form-floating mb-3">
            <input class="form-control" type="text" name="street_name" id="add-property-wizardwizard-street"
                placeholder="Apartment / Street" value="<?= !empty($hlData['street_name']) ? $hlData['street_name'] : ''; ?>">
            <label for="add-property-wizardwizard-street">Apartment / Street</label>
        </div>

        <!-- City and State -->
        <div class="row gx-3 my-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" type="text" name="city" id="add-property-wizardwizard-city"
                        placeholder="City" value="<?= !empty($hlData['city']) ? $hlData['city'] : ''; ?>" required>
                    <label for="add-property-wizardwizard-city">City</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="state" id="add-property-wizardwizard-state"
                        placeholder="State (Optional)" value="<?= !empty($hlData['state']) ? $hlData['state'] : ''; ?>" required>
                    <label for="add-property-wizardwizard-state">State</label>
                </div>
            </div>
        </div>

        <!-- Zip Code and Country -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="zip_code" id="add-property-wizardwizard-zip-code"
                        maxlength="10" placeholder="Zip Code" value="<?= !empty($hlData['zip_code']) ? $hlData['zip_code'] : ''; ?>" required>
                    <label for="add-property-wizardwizard-zip-code">Zip Code</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="country_or_region" id="add-property-wizardwizard-country"
                        placeholder="Country / Region" value="<?= !empty($hlData['country_or_region']) ? $hlData['country_or_region'] : ''; ?>" required>
                    <label for="add-property-wizardwizard-country">Country / Region</label>
                </div>
            </div>
        </div>

        <!-- Latitude and Longitude -->
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="latitude" id="add-property-wizardwizard-latitude"
                        maxlength="10" placeholder="e.g., 34.052235" value="<?= !empty($hlData['latitude']) ? $hlData['latitude'] : ''; ?>">
                    <label for="add-property-wizardwizard-latitude">Latitude (Optional)</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="longitude" id="add-property-wizardwizard-longitude"
                        maxlength="10" placeholder="e.g., -118.243683" value="<?= !empty($hlData['longitude']) ? $hlData['longitude'] : ''; ?>">
                    <label for="add-property-wizardwizard-longitude">Longitude (Optional)</label>
                </div>
            </div>
        </div>
        <!-- Hidden submit button (optional) -->
        <div class="d-none">
            <button type="submit" class="btn btn-primary">Save Location</button>
        </div>
    </form>
</div>