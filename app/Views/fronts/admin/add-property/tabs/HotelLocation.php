<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-property/AddProperty.php'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>

<div class="tab-pane <?= wizardnav('location', 'active show') ?>" role="tabpanel" aria-labelledby="add-property-wizard-tab2" id="add-property-wizard-tab2">
    <form action="<?= base_url('admin/add-property/save-location/' . $hotelId) ?>" method="post" id="addPropertyWizardForm2" data-wizard-form="2" novalidate="novalidate">
        <h3 class="mb-6">Location</h3>
        <div class="form-icon-container">
            <div class="form-floating">
                <mapbox-search-box
                    id="searchBox"
                    access-token="<?= env('MAPBOX_ACCESS_TOKEN') ?>"
                    placeholder="Search location..."
                    proximity="0,0">
                </mapbox-search-box>
            </div>
        </div>
        <div class="mapbox-container rounded-3 border overflow-hidden mt-3 mb-6">
            <div id="mapbox" style="height: 250px"></div>
        </div>
        <div class="form-floating">
            <input class="form-control" type="text" name="street_name" id="street_name" placeholder="Apartment / Street" /><label for="street_name">Apartment / Street</label>
        </div>
        <div class="row gx-3 my-3">
            <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                    <input class="form-control" type="text" name="city" id="city" placeholder="City" />
                    <label for="city">City</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="state" id="state" placeholder="State (Optional)" />
                    <label for="state">State (Optional)</label>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="zip_code" id="zip_code" placeholder="Zip Code" /><label for="zip_code">Zip Code</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="country_or_region" id="country_or_region" placeholder="Country / Region" /><label for="country_or_region">Country / Region</label>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="latitude" id="latitude" maxlength="10" placeholder="e.g., 34.052235" value="">
                    <label for="latitude">Latitude (Optional)</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input class="form-control" type="text" name="longitude" id="longitude" maxlength="10" placeholder="e.g., -118.243683" value="">
                    <label for="longitude">Longitude (Optional)</label>
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
        mapboxgl.accessToken = "<?= env('MAPBOX_ACCESS_TOKEN') ?>";

        const map = new mapboxgl.Map({
            container: 'mapbox',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [77.5946, 12.9716],
            zoom: 12

        });

        let marker;
        const searchBox = document.getElementById('searchBox');

        // Set search options
        searchBox.options = {
            language: 'en',
            country: 'IN'
        };

        // Listen for retrieve event
        searchBox.addEventListener('retrieve', (e) => {
            const feature = e.detail.features[0];
            if (!feature || !feature.geometry) return;

            const coords = feature.geometry.coordinates;
            const props = feature.properties;
            console.log(props);

            const lat = coords[1];
            const lng = coords[0];

            // Fly to the selected location
            map.flyTo({
                center: [lng, lat],
                zoom: 14
            });

            // Add or update marker
            if (!marker) {
                marker = new mapboxgl.Marker({
                        color: '#ff2600ff'
                    })
                    .setLngLat([lng, lat])
                    .addTo(map);
            } else {
                marker.setLngLat([lng, lat]);
            }

            // --- Auto-fill form fields ---

            // Fill Lat / Lng inputs
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);

            // Fill Street 
            if (props.address) {
                document.getElementById('street_name').value = props.address || '';
            } else {
                document.getElementById('street_name').value = '';
            }

            // Fill City 
            document.getElementById('city').value = props.context?.place?.name || '';

            // Fill State 
            document.getElementById('state').value = props.context?.region?.name || '';

            // Fill Country
            document.getElementById('country_or_region').value = props.context?.country?.name || '';

            // Zip code
            document.getElementById('zip_code').value = props.context?.postcode?.name || '';

            // Optional: trigger input events so floating labels stay up
            document.querySelectorAll('.form-control').forEach(input => input.dispatchEvent(new Event('input')));
        });

        const hLocation = document.querySelector("#addPropertyWizardForm2");
        // 📤 Manual submission
        if (hLocation) {
            hLocation.addEventListener("submit", async function(e) {
                e.preventDefault();
                const formData = new FormData(hLocation);

                try {
                    const response = await fetch(hLocation.action, {
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
                        // myDropzone.removeAllFiles(true);
                        // hLocation.reset();
                        // dropzoneMessage.style.display = "";
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