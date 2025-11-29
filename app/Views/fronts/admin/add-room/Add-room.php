<?= $this->extend('fronts/templates/AdminLayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('headUtilities') ?>
<link href="<?= base_url('vendors/flatpickr/flatpickr.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('vendors/dropzone/dropzone.css') ?>" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('assets') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="mb-9">
    <h2 class="fs-5 mb-4 mb-xl-5">Add New Room</h2>
    <div class="theme-wizard" data-theme-wizard="data-theme-wizard"
        data-wizard-modal-disabled="data-wizard-modal-disabled">
        <div class="row gx-0 gx-xl-5">
            <div class="col-xl-4 order-xl-1">
                <?= $this->include('fronts/admin/add-room/Nav-tab'); ?>
            </div>
            <div class="col-xl-8 flex-1">
                <div class="tab-content">
                    <?= $this->renderSection('wizard-tab'); ?>
                </div>
                <div class="d-none mt-6 d-flex flex-wrap gap-2" data-wizard-footer="data-wizard-footer">
                    <button class="btn btn-phoenix-danger" type="button">Discard</button>
                    <button class="btn btn-phoenix-primary" type="button">Save draft</button>
                    <button class="btn btn-primary px-6 px-sm-11" type="submit" data-wizard-next-btn="data-wizard-next-btn">Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('jsUtls') ?>
<script src="<?= base_url('vendors/dropzone/dropzone-min.js'); ?>"></script>
<script src="<?= base_url('vendors/flatpickr/flatpickr.min.js'); ?>"></script>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->include('fronts/admin/add-room/ArJs'); ?>
<?= $this->renderSection('wizard-script'); ?>
<?= $this->endSection() ?>