<?= $this->extend('fronts/templates/Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link href="<?= base_url('vendors/mapbox-gl/mapbox-gl.css'); ?>" rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="bg-body-emphasis">
    <div class="container-small px-lg-7 px-xxl-3">
        <div class="row g-5 g-lg-5">
            <div class="col-md-6 mb-5 mb-md-0 text-center text-md-start">
                <h3 class="mb-3">Stay connected</h3>
                <p class="mb-5">Stay connected with Phoenix's Help Center; Phoenix is available for your necessities at all times.</p>
                <div class="d-flex flex-column align-items-center align-items-md-start gap-3 gap-md-0">
                    <div class="d-md-flex align-items-center">
                        <div class="icon-wrapper shadow-info">
                            <span class="uil uil-phone text-primary fs-4 z-1 ms-2" data-bs-theme="light"></span>
                        </div>
                        <div class="flex-1 ms-3">
                            <a class="link-900" href="tel:+123456789">+1234 567 890</a>
                        </div>
                    </div>
                    <div class="d-md-flex align-items-center">
                        <div class="icon-wrapper shadow-info"><span class="uil uil-envelope text-primary fs-4 z-1 ms-2" data-bs-theme="light"></span></div>
                        <div class="flex-1 ms-3"><a class="fw-semibold text-body" href="mailto:example@gmail.com">example@gmail.com</a>
                        </div>
                    </div>
                    <div class="mb-6 d-md-flex align-items-center">
                        <div class="icon-wrapper shadow-info"><span class="uil uil-map-marker text-primary fs-4 z-1 ms-2" data-bs-theme="light"></span></div>
                        <div class="flex-1 ms-3"><a class="fw-semibold text-body" href="#!">39163 Amir Drive Suite 802</a></div>
                    </div>
                    <div class="d-flex">
                        <a href="#!"><span class="fa-brands fa-facebook fs-6 text-primary mx-3"></span></a>
                        <a href="#!"><span class="fa-brands fa-twitter fs-6 text-primary mx-3"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center text-md-start">
                <h3 class="mb-3">Drop us a line</h3>
                <p class="mb-7">If you have any query or suggestion , we are open to listen you, Lets talk, reach us anytime.</p>
                <form class="row g-4" action="<?= base_url('contact/get') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="col-12">
                        <input class="form-control bg-body-emphasis" type="text" name="name" placeholder="Name" required="required" />
                    </div>
                    <div class="col-12">
                        <input class="form-control bg-body-emphasis" type="email" name="email" placeholder="Email" required="required" />
                    </div>
                    <div class="col-12">
                        <textarea class="form-control bg-body-emphasis" rows="6" name="message" placeholder="Message" required="required"></textarea>
                    </div>
                    <div class="col-12 d-grid">
                        <button class="btn btn-outline-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="border">
        <div class="row">
            <div class="col-12 mb-5">
                <div class="mapbox-container rounded-3 border overflow-hidden mt-3 mb-6">
                    <div id="mapbox" data-mapbox='{"attributionControl":false,"center":[-74.0020158,40.7228022],"zoom":14,"scrollZoom":false}' style="height: 381px"></div>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('vendors/mapbox-gl/mapbox-gl.js'); ?>"></script>
<?= $this->endSection() ?>