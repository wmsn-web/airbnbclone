<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-property/AddProperty.php'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>
<div class="tab-pane" role="tabpanel" aria-labelledby="add-property-wizard-tab4" id="add-property-wizard-tab4">
    <form id="addPropertyWizardForm4" novalidate="novalidate" data-wizard-form="4">
        <h3 class="mb-6">Add property picture</h3>
        <div class="dropzone dropzone-multiple p-0 mb-5" id="my-awesome-dropzone" data-dropzone="data-dropzone">
            <div class="fallback"><input name="file" type="file" multiple="multiple" /></div>
            <div class="dz-message text-body-tertiary text-opacity-85" data-dz-message="data-dz-message">
                Drag your photo here<span class="text-body-secondary px-1">or</span><button class="btn btn-link p-0" type="button">Browse from device</button><br />
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
    </form>
</div>
<?= $this->endSection(); ?>

<!-- individual Js -->
<?= $this->section('wizard-script'); ?>
<?= $this->endSection(); ?>