<?= $this->extend('fronts\templates\Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link href="<?= base_url('vendors/glightbox/glightbox.min.css') ?>" rel="stylesheet">

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="booking-hero-header d-flex align-items-center">
    <div class="bg-holder bg-holder overlay bg-opacity-50" style="background-image:url(<?= base_url() ?>assets/video/travel.png);">
        <video class="bg-video" autoplay="autoplay" loop="loop" muted="muted" playsinline="playsinline">
            <source src="<?= base_url() ?>assets/video/travel.mp4" type="video/mp4" />
        </video>
    </div>
    <div class="container-medium position-relative z-5">
        <h2 class="text-center text-secondary-lighter fs-5 fs-md-3 fw-normal mb-3">Hotel Barcelona Center</h2>
        <h1 class="text-center fs-4 fs-md-1 text-white fw-normal mb-6 overflow-hidden">NEXT <span class="typed-text text-primary" data-typed-text="[&quot;&lt;span class=text-primary&gt;TRIP!&lt;/span&gt;&quot;,&quot;&lt;span class=text-warning&gt;TOUR?&lt;/span&gt;&quot;, &quot;&lt;span class=text-info&gt;SOJOURN?&lt;/span&gt;&quot;, &quot;&lt;span class=text-success&gt;VACAY?&lt;/span&gt;&quot;]"></span></h1>
        <div class="row gx-0 gy-3 gy-md-0 align-items-center mx-auto p-3 bg-body-emphasis rounded-5 rounded-md-pill position-relative border w-lg-75">
            <div class="col-12 col-md">
                <div class="form-icon-container border-bottom border-bottom-md-0 border-translucent pb-3 pb-md-0">
                    <input class="form-control form-icon-input border-0 py-0 shadow-none fs-8" type="text" placeholder="Pick a place" />
                    <span class="fa-solid fa-map-marker-alt form-icon text-body-tertiary top-0" data-fa-transform="down-2"></span>
                </div>
            </div>
            <div class="col-6 col-md">
                <div class="form-icon-container flatpickr-input-container">
                    <input class="form-control datetimepicker form-icon-input border-y-0 border-start-0 border-start-md py-0 shadow-none border-translucent fs-8 rounded-0" type="text" placeholder="Pick a date" data-options='{"mode":"range","dateFormat":"d/m/y","disableMobile":true}' />
                    <span class="fa-solid fa-calendar form-icon top-0 text-body-tertiary" data-fa-transform="down-2"></span>
                </div>
            </div>
            <div class="col-6 col-md">
                <button class="btn px-3 fs-8 fw-semibold text-body-tertiary" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside">
                    <span class="fa-solid fa-user me-2"></span>1 adult</button>
                <div class="dropdown-menu dropdown-menu-start p-4" style="max-width: 320px">
                    <div class="row align-items-center g-0 pb-3 border-bottom border-translucent">
                        <div class="col-5">
                            <h5 class="mb-0 text-body">Adults</h5>
                        </div>
                        <div class="col-7">
                            <div class="input-group gap-2" data-quantity="data-quantity"><button
                                    class="btn btn-phoenix-primary px-2 rounded" data-type="minus"><span
                                        class="fa-solid fa-minus px-1"></span></button><input
                                    class="form-control border-translucent input-spin-none text-center rounded"
                                    id="adults" type="number" value="2" /><button
                                    class="btn btn-phoenix-primary px-2 rounded" data-type="plus"><span
                                        class="fa-solid fa-plus px-1"></span></button></div>
                        </div>
                    </div>
                    <div class="row align-items-center g-0 py-3 border-bottom border-translucent">
                        <div class="col-5">
                            <h5 class="mb-0 text-body">Infants</h5>
                        </div>
                        <div class="col-7">
                            <div class="input-group gap-2" data-quantity="data-quantity"><button
                                    class="btn btn-phoenix-primary px-2 rounded" data-type="minus"><span
                                        class="fa-solid fa-minus px-1"></span></button><input
                                    class="form-control border-translucent input-spin-none text-center rounded"
                                    id="infants" type="number" value="2" /><button
                                    class="btn btn-phoenix-primary px-2 rounded" data-type="plus"><span
                                        class="fa-solid fa-plus px-1"></span></button></div>
                        </div>
                    </div>
                    <div class="row align-items-center g-0 pt-3">
                        <div class="col-5">
                            <h5 class="mb-0 text-body">Children</h5>
                        </div>
                        <div class="col-7">
                            <div class="input-group gap-2" data-quantity="data-quantity">
                                <button
                                    class="btn btn-phoenix-primary px-2 rounded" data-type="minus">
                                    <span
                                        class="fa-solid fa-minus px-1"></span>
                                </button>
                                <input
                                    class="form-control border-translucent input-spin-none text-center rounded"
                                    id="children" type="number" value="2" />
                                <button
                                    class="btn btn-phoenix-primary px-2 rounded" data-type="plus">
                                    <span
                                        class="fa-solid fa-plus px-1"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-auto">
                <button class="btn btn-lg btn-phoenix-primary rounded-pill w-100">
                    <span class="fa-solid fa-search me-2"></span>Search
                </button>
            </div>
        </div>
    </div>
</div>

<section class="pt-6 pt-md-10 pb-10">
    <div class="container-medium">
        <div class="bg-holder d-none d-xl-block" style="background-image:url(<?= base_url('assets/img/bg/bg-left-27.png') ?>');background-size:auto;background-position:left;"></div>
        <!--/.bg-holder-->
        <div class="bg-holder d-none d-xl-block" style="background-image:url(<?= base_url('assets/img/bg/bg-right-27.png') ?>);background-size:auto;background-position:right;"></div>
        <!--/.bg-holder-->
        <div class="row g-3 position-relative align-items-center justify-content-between">
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-md-7">
                        <div class="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a href="#!"> <img class="w-100 h-md-100 object-fit-cover" src="<?= base_url() ?>assets/img/gallery/37.png" alt="" height="220" /></a>
                            <div class="backdrop-faded"><a class="fw-bold fs-7 text-white" href="#!">Maui</a>
                                <p class="mb-0 text-white fs-9">14 Hotels</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-5">
                        <div class="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a href="#!"><img class="w-100 h-100 object-fit-cover" src="<?= base_url() ?>assets/img/gallery/35.png" alt="" /></a>
                            <div class="backdrop-faded"><a class="fw-bold fs-7 text-white stretched-link" href="#!">New Zealand</a>
                                <p class="mb-0 text-white fs-9">17 Hotels</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-5">
                        <div class="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a href="#!"> <img class="w-100 h-100 object-fit-cover" src="<?= base_url() ?>assets/img/gallery/36.png" alt="" /></a>
                            <div class="backdrop-faded"><a class="fw-bold fs-7 text-white" href="#!">London</a>
                                <p class="mb-0 text-white fs-9">17 Hotels</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="img-zoom-hover position-relative h-100 rounded-3 overflow-hidden"><a href="#!"> <img class="w-100 h-md-100 object-fit-cover" src="<?= base_url() ?>assets/img/gallery/37.png" alt="" height="220" /></a>
                            <div class="backdrop-faded"><a class="fw-bold fs-7 text-white" href="#!">Maui</a>
                                <p class="mb-0 text-white fs-9">14 Hotels</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="d-flex flex-column gap-3 h-100">
                    <div class="home-rewards">
                        <p class="text-uppercase">Loyalty program</p>
                        <p class="text-uppercase">Join Center Rewards Hotels and enjoy exclusive benefits</p>
                    </div>
                    <div class="row gap-2 small-mx">
                        <div class="col-12 px-0">
                            <div class="home-rewards-adv-item">
                                <img src="<?= base_url('assets/img/realistic-icon/call-center-service.png') ?>" alt="">
                                <p>Up to 27% off bookings made through our website or call centre</p>
                            </div>
                        </div>
                        <div class="col-12 px-0">
                            <div class="home-rewards-adv-item">
                                <img src="<?= base_url('assets/img/realistic-icon/drink.png') ?>" alt="">
                                <p>Welcome drink</p>
                            </div>
                        </div>
                        <div class="col-12 px-0">
                            <div class="home-rewards-adv-item">
                                <img src="<?= base_url('assets/img/realistic-icon/table.png') ?>" alt="">
                                <p>10% discount on dining</p>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-primary key-btn w-50 py-3 fs-8" href="<?= route_to('user.register') ?>">Sign up<span class="fa-solid fa-chevron-right ms-2" data-fa-transform="down-2"></span></a>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section>
<div class="bg-primary-subtle border-y border-translucent py-4 sticky-top">
    <div class=" container-medium d-flex flex-between-center justify-content-center">
        <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link px-3 fs-8 active" id="barcelona-tab" data-bs-toggle="tab" href="#tab-barcelona" role="tab" aria-controls="tab-barcelona" aria-selected="true">Barcelona</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="granada-tab" data-bs-toggle="tab" href="#tab-granada" role="tab" aria-controls="tab-granada" aria-selected="false">Granada</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="cordoba-tab" data-bs-toggle="tab" href="#tab-cordoba" role="tab" aria-controls="tab-cordoba" aria-selected="false">Cordoba</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="saville-tab" data-bs-toggle="tab" href="#tab-saville" role="tab" aria-controls="tab-saville" aria-selected="false">Saville</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="velencia-tab" data-bs-toggle="tab" href="#tab-velencia" role="tab" aria-controls="tab-velencia" aria-selected="false">Velencia</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="badajoz-tab" data-bs-toggle="tab" href="#tab-badajoz" role="tab" aria-controls="tab-badajoz" aria-selected="false">Badajoz</a>
            </li>
        </ul>
    </div>
</div>
<section class="tab-content pt-0" id="myTabContent">
    <div class="tab-pane overflow-x-hidden fade show active" id="tab-barcelona" role="tabpanel" aria-labelledby="barcelona-tab">
        <?= $this->include('fronts/user/components/Home-hotel-swiper') ?>
    </div>
    <div class="tab-pane overflow-x-hidden fade" id="tab-granada" role="tabpanel" aria-labelledby="granada-tab">
        <?= $this->include('fronts/user/components/Home-hotel-swiper') ?>
    </div>
    <div class="tab-pane overflow-x-hidden fade" id="tab-cordoba" role="tabpanel" aria-labelledby="cordoba-tab">
        <?= $this->include('fronts/user/components/Home-hotel-swiper') ?>
    </div>
    <div class="tab-pane overflow-x-hidden fade" id="tab-saville" role="tabpanel" aria-labelledby="saville-tab">
        <?= $this->include('fronts/user/components/Home-hotel-swiper') ?>
    </div>
    <div class="tab-pane overflow-x-hidden fade" id="tab-velencia" role="tabpanel" aria-labelledby="velencia-tab">
        <?= $this->include('fronts/user/components/Home-hotel-swiper') ?>
    </div>
    <div class="tab-pane overflow-x-hidden fade" id="tab-badajoz" role="tabpanel" aria-labelledby="badajoz-tab">
        <?= $this->include('fronts/user/components/Home-hotel-swiper') ?>
    </div>
</section>
<section class="pb-7 pt-0">
    <div class="container-medium">
        <!-- <div class="text-center mb-5">
            <h3 class="mb-2 text-body-emphasis">Latest photos from tourists</h3>
            <p class="mb-0 text-body-tertiary">See how our tourists enjoyed their trip from images captured by them with Team Phoenix!</p>
        </div> -->
        <div class="row g-3">
            <div class="col-md-6 col-xl-4">
                <div class="img-zoom-hover rounded-3 overflow-hidden position-relative">
                    <a href="#!">
                        <img class="latest-img w-100 object-fit-cover" src="<?= base_url() ?>assets/img/gallery/51.png" alt="">
                    </a>
                    <div class="backdrop-faded">
                        <a class="fw-semibold mb-0 text-secondary-lighter stretched-link" href="#!">
                            Weddings and Celebrations
                        </a>
                        <h5 class="text-light mb-0">Celebrate your wedding or banquet in style</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="img-zoom-hover rounded-3 overflow-hidden position-relative">
                    <a href="#!">
                        <img class="latest-img w-100 object-fit-cover" src="<?= base_url() ?>assets/img/gallery/52.png" alt="">
                    </a>
                    <div class="backdrop-faded">
                        <a class="fw-semibold mb-0 text-secondary-lighter stretched-link" href="#!">
                            Conventions and events
                        </a>
                        <h5 class="text-light mb-0">A wide range of rooms for events</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="img-zoom-hover rounded-3 overflow-hidden position-relative">
                    <a href="#!">
                        <img class="latest-img w-100 object-fit-cover" src="<?= base_url() ?>assets/img/gallery/53.png" alt="">
                    </a>
                    <div class="backdrop-faded">
                        <a class="fw-semibold mb-0 text-secondary-lighter stretched-link" href="#!">
                            Dining
                        </a>
                        <h5 class="text-light mb-0">Creative and innovative cuisine</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pb-7 pt-0">
    <div class="container-medium">
        <div class="text-center mb-5">
            <h3 class="mb-2 text-body-emphasis">Our gallery</h3>
            <p class="mb-0 text-body-tertiary">See how our tourists enjoyed their trip from images captured by them!</p>
        </div>
        <div class="row g-2 g-sm-3">
            <div class="col-md-6">
                <div class="row g-2 g-sm-3">
                    <div class="undefined">
                        <a href="https://cf.bstatic.com/xdata/images/hotel/max1024x768/268925471.jpg?k=e1039086549fecfb3c08377384b999d41e4dac81b787bc52e379359848108102&o=" data-gallery="default-gallery">
                            <img class="img-fluid rounded-2" src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/268925471.jpg?k=e1039086549fecfb3c08377384b999d41e4dac81b787bc52e379359848108102&o=" alt="">
                        </a>

                    </div>
                    <div class="col-6">
                        <a href="https://cf.bstatic.com/xdata/images/hotel/max1024x768/269176590.jpg?k=fe737d93cf30e6f130d430413efa0bdcd27380363df6e4eab82ad7ce11bcd0a6&o=" data-gallery="default-gallery">
                            <img class="img-fluid rounded-2" src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/269176590.jpg?k=fe737d93cf30e6f130d430413efa0bdcd27380363df6e4eab82ad7ce11bcd0a6&o=" alt="">
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="https://cf.bstatic.com/xdata/images/hotel/max1024x768/126223810.jpg?k=ca150238a160bbf621eeab1f2729951591921967c29d7002001f362a5d0d8b2b&o=" data-gallery="default-gallery">
                            <img class="img-fluid rounded-2" src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/126223810.jpg?k=ca150238a160bbf621eeab1f2729951591921967c29d7002001f362a5d0d8b2b&o=g" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="video-container h-100">
                    <a href="https://images.mirai.com/VIDEOS/500343/Hoteles-Center-Barcelona.mp4" data-gallery="default-gallery">
                        <video class="video w-100 h-100 object-fit-cover overflow-hidden rounded-2" muted data-play-on-hover>
                            <source src="https://images.mirai.com/VIDEOS/500343/Hoteles-Center-Barcelona.mp4" type="video/mp4">
                        </video>
                        <div class="circle-icon-item position-absolute top-50 start-50 translate-middle bg-body-emphasis rounded-pill bg-opacity-50">
                            <span class="fa-solid fa-video text-body fs-9 fs-sm-8"></span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div><!-- end of .container-->
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('vendors/glightbox/glightbox.min.js') ?>"> </script>



<?= $this->endSection() ?>