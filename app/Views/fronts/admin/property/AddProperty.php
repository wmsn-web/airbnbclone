<!-- Admin page global layout -->
<?= $this->extend('fronts/templates/Adminlayout.php'); ?>

<!-- Current page page Title -->
<?= $this->section('pageTitle'); ?>
<?= esc($pageTitle); ?>
<?= $this->endSection(); ?>

<!-- Current page head section content -->
<?= $this->section('headUtilities'); ?>
<link href="<?= base_url('vendors/mapbox-gl/mapbox-gl.css') ?>" rel="stylesheet">
<link href="<?= base_url('vendors/flatpickr/flatpickr.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('vendors/dropzone/dropzone.css') ?>" rel="stylesheet">
<link href="<?= base_url('vendors/nouislider/nouislider.min.css') ?>" rel="stylesheet">
<?= $this->endSection(); ?>

<!-- Current page head css or js -->
<?= $this->section('assets'); ?>
<link rel="stylesheet" href="<?= base_url('vendors/telephoneinput/css/intlTelInput.css'); ?>" />
<?= $this->endSection(); ?>

<!-- Page main content  -->
<?= $this->section('content') ?>
<nav class="mb-3" aria-label="breadcrumb">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
        <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
        <li class="breadcrumb-item active">Default</li>
    </ol>
</nav>

<div class="mb-9">
    <h2 class="fs-5 mb-4 mb-xl-5">Add New Property</h2>
    <div class="theme-wizard" data-theme-wizard="data-theme-wizard" data-wizard-modal-disabled="data-wizard-modal-disabled">
        <div class="row gx-0 gx-xl-5">
            <!-- tab navs  -->
            <?= $this->include('fronts/admin/property/wizards/Tab-nav'); ?>
            <div class="col-xl-8 flex-1">
                <div class="row">
                    <div class="col-xxl-8">
                        <div class="tab-content">
                            <!-- Hotel tab -->
                                <?= $this->include('fronts/admin/property/wizards/Tab1'); ?>
                                <!-- Hotel Location tab -->
                                <?= $this->include('fronts/admin/property/wizards/Tab2'); ?>
                                <!-- Hotel amenities tab -->
                                <?= $this->include('fronts/admin/property/wizards/Tab3'); ?>
                                <!-- Hotel galley tab -->
                                <?= $this->include('fronts/admin/property/wizards/Tab4'); ?>
                                <!-- Hotel finance tab -->
                                <?= $this->include('fronts/admin/property/wizards/Tab5'); ?>
                                <!-- Hotel policies tab -->
                                <?= $this->include('fronts/admin/property/wizards/Tab6'); ?>
                                <!-- Hotel review tab -->
                                <?= $this->include('fronts/admin/property/wizards/Tab7'); ?>
                        </div>
                        <div class="mt-6" data-wizard-footer="data-wizard-footer">
                            <button class="btn btn-primary px-6 px-sm-11" type="submit" data-wizard-next-btn="data-wizard-next-btn" id="submit-form">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('jsUtls'); ?>
<script src="<?= base_url('vendors/dropzone/dropzone-min.js'); ?>"></script>
<script src="<?= base_url('vendors/mapbox-gl/mapbox-gl.js'); ?>"></script>
<script src="<?= base_url('vendors/nouislider/nouislider.min.js'); ?>"></script>
<script src="<?= base_url('vendors/flatpickr/flatpickr.min.js'); ?>"></script>
<script src="<?= base_url('vendors/telephoneinput/js/intlTelInputWithUtils.min.js') ?>"></script>
<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<?= $this->include('fronts/admin/property/AddpPropsJs'); ?>
<?= $this->endSection(); ?>