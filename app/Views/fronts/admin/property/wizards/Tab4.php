<!-- Hotel gallery tab -->
<div class="tab-pane <?= ($activeTab == 'tab4') ? 'active show' : '' ?>" role="tabpanel" aria-labelledby="add-property-wizard-tab4" id="add-property-wizard-tab4">
    <form action="<?= base_url('admin/add-property/save-photos/' . $hotelId) ?>" method="post" id="addPropertyWizardForm4" data-wizard-form="4" enctype="multipart/form-data" class="position-relative">
        <?= csrf_field() ?>
        <h3 class="mb-6">Add Property Photos</h3>

        <!-- Display existing photos if available -->
        <?php if (!empty($hGData) && !empty($hGData['photos'])):
            $photos = json_decode($hGData['photos'], true);
        ?>
            <div class="mb-4">
                <h4 class="mb-3">Current Photos</h4>
                <div class="row g-3">
                    <?php foreach ($photos as $photo): ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="position-relative">
                                <img src="<?= base_url('writable/uploads/hotel-gallery/' . $photo) ?>"
                                    class="img-fluid rounded shadow-sm" alt="Hotel photo" style="height: 150px; width: 100%; object-fit: cover;">
                                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                                    data-bs-toggle="tooltip" title="Remove photo" onclick="removePhoto('<?= $photo ?>', <?= $hotelId ?>)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Dropzone file upload section -->
        <div class="mb-3">
            <label class="form-label">Upload Photos (Drag & Drop or Click to Browse)</label>

            <div class="dropzone dropzone-multiple p-0" id="gallery-dropzone" data-dropzone="data-dropzone" action="#!">
                <div class="fallback">
                    <input name="file" type="file" multiple="multiple" />
                </div>
                <div class="dz-message" data-dz-message="data-dz-message">
                    <img class="me-2" src="<?= base_url('assets/img/icons/cloud-upload.svg') ?>" width="25" alt="" />
                    Drop your files here
                </div>
                <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                    <div class="d-flex mb-3 pb-3 border-bottom border-translucent media">
                        <div class="border p-2 rounded-2 me-2">
                            <img class="rounded-2 dz-image" src="<?= base_url('assets/img/icons/file.png') ?>" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                        </div>
                        <div class="flex-1 d-flex flex-between-center">
                            <div>
                                <h6 data-dz-name="data-dz-name"></h6>
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 fs-9 text-body-quaternary lh-1" data-dz-size="data-dz-size"></p>
                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                </div>
                                <span class="fs-10 text-danger" data-dz-errormessage="data-dz-errormessage"></span>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-link text-body-tertiary btn-sm dropdown-toggle btn-reveal dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-ellipsis-h"></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end border border-translucent py-2">
                                    <a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove File</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-text mt-2">Accepted formats: JPG, JPEG, PNG, WEBP. Maximum file size: 2MB per image.</div>

            <!-- Hidden file input for form submission -->
            <input type="hidden" name="photos_data" id="photos_data" value="" />
        </div>

        <!-- Hidden submit button -->
        <div class="d-none">
            <button type="submit" class="btn btn-primary">Upload Photos</button>
        </div>
    </form>
</div>