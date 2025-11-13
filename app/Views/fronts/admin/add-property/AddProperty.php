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
<script id="search-js" defer src="https://api.mapbox.com/search-js/v1.5.0/web.js"></script>
<?= $this->endSection(); ?>

<!-- Page main content  -->
<?= $this->section('content') ?>
<?php
// $tabs = ['tab1', 'tab2', 'tab3', 'tab4', 'tab5', 'tab6', 'tab7'];
// $currentIndex = array_search($activeTab, $tabs);



// echo $hotelId;
?>
<nav class="mb-3" aria-label="breadcrumb">
	<ol class="breadcrumb mb-0">
		<li class="breadcrumb-item"><a href="#!">Page 1</a></li>
		<li class="breadcrumb-item"><a href="#!">Page 2</a></li>
		<li class="breadcrumb-item active">Default</li>
	</ol>
</nav>
<div class="mb-9">
	<h2 class="fs-5 mb-4 mb-xl-5">Add New Property</h2>
	<div class="theme-wizard" data-theme-wizard="data-theme-wizard"
		data-wizard-modal-disabled="data-wizard-modal-disabled">
		<div class="row gx-0 gx-xl-5">
			<div class="col-xl-4 order-xl-1">
				<div class="scrollbar mb-4">
					<ul class="nav justify-content-between flex-nowrap nav-wizard nav-wizard-vertical-xl" data-tab-map-container="data-tab-map-container">
						<li class="nav-item">
							<a class="nav-link <?= wizardnav('info', 'active', 'done complete') ?> py-0 py-xl-3" href="<?= base_url('admin/add-property/info' . (!empty($hotelId) ? '/' . $hotelId : '')) ?>" data-bs-toggle="tab" data-wizard-step="1">
								<div class="text-center d-inline-block d-xl-flex align-items-center gap-3">
									<span class="nav-item-circle-parent">
										<span class="nav-item-circle">
											<span class="fa-solid fa-file nav-item-icon"></span>
											<span class="fa-solid fa-check check-icon"></span>
										</span>
									</span>
									<span class="nav-item-title fs-9 fs-xl-8">Info</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= wizardnav('location', 'active', '') ?> py-0 py-xl-3" href="<?= base_url((!empty($hotelId) ? 'admin/add-property/location/' . $hotelId : '')) ?>" data-bs-toggle="tab" data-wizard-step="2">
								<div class="text-center d-inline-block d-xl-flex align-items-center gap-3">
									<span class="nav-item-circle-parent">
										<span class="nav-item-circle">
											<span class="fa-solid fa-location-dot nav-item-icon"></span>
											<span class="fa-solid fa-check check-icon"></span>
										</span>
									</span>
									<span class="nav-item-title fs-9 fs-xl-8">Location</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?= wizardnav('amenities', 'active', '') ?>  py-0 py-xl-3" href="<?= base_url((!empty($hotelId) ? 'admin/add-property/amenities/' . $hotelId : '')) ?>" data-bs-toggle="tab" data-wizard-step="3">
								<div class="text-center d-inline-block d-xl-flex align-items-center gap-3">
									<span class="nav-item-circle-parent">
										<span class="nav-item-circle"><span class="fa-solid fa-mug-saucer nav-item-icon"></span><span class="fa-solid fa-check check-icon"></span></span>
									</span>
									<span class="nav-item-title fs-9 fs-xl-8">Amenities</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-0 py-xl-3" href="#add-property-wizard-tab4" data-bs-toggle="tab" data-wizard-step="4">
								<div class="text-center d-inline-block d-xl-flex align-items-center gap-3">
									<span class="nav-item-circle-parent">
										<span class="nav-item-circle"><span class="fa-solid fa-images nav-item-icon"></span><span class="fa-solid fa-check check-icon"></span></span>
									</span>
									<span class="nav-item-title fs-9 fs-xl-8">Photos</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-0 py-xl-3" href="#add-property-wizard-tab5" data-bs-toggle="tab" data-wizard-step="5">
								<div class="text-center d-inline-block d-xl-flex align-items-center gap-3">
									<span class="nav-item-circle-parent">
										<span class="nav-item-circle"><span class="fa-solid fa-usd nav-item-icon"></span><span class="fa-solid fa-check check-icon"></span></span>
									</span>
									<span class="nav-item-title fs-9 fs-xl-8">Finance</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-0 py-xl-3" href="#add-property-wizard-tab6" data-bs-toggle="tab" data-wizard-step="6">
								<div class="text-center d-inline-block d-xl-flex align-items-center gap-3">
									<span class="nav-item-circle-parent">
										<span class="nav-item-circle"><span class="fa-solid fa-shield-halved nav-item-icon"></span><span class="fa-solid fa-check check-icon"></span></span>
									</span>
									<span class="nav-item-title fs-9 fs-xl-8">Policies</span>
								</div>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link py-0 py-xl-3" href="#add-property-wizard-tab7" data-bs-toggle="tab" data-wizard-step="7">
								<div class="text-center d-inline-block d-xl-flex align-items-center gap-3">
									<span class="nav-item-circle-parent">
										<span class="nav-item-circle"><span class="fas fa-check"></span></span>
									</span>
									<span class="nav-item-title fs-9 fs-xl-8">Done</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-xl-8 flex-1">
				<div class="row">
					<div class="col-xxl-8">
						<div class="tab-content">

							<?= $this->renderSection('wizard-tab'); ?>

						</div>
						<div class="mt-6 d-none" data-wizard-footer="data-wizard-footer">
							<div class="" data-wizard-prev-btn="data-wizard-prev-btn"></div>
							<button class="btn btn-primary px-6 px-sm-11 d-none" type="submit" data-wizard-next-btn="data-wizard-next-btn" id="submit-form">Next</button>
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
<?= $this->include('fronts/admin/add-property/ApJs'); ?>
<?= $this->renderSection('wizard-script'); ?>
<?= $this->endSection(); ?>