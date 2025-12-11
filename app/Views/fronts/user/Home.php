<?= $this->extend('fronts/templates/Viewlayout') ?>

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
        <?= $this->include('fronts/user/components/Find-hotel-search-bar'); ?>
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
                    <?php if (!session()->has('user_id')): ?>
                        <a class="btn btn-primary key-btn w-50 py-3 fs-8" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#registerModal">Sign up<span class="fa-solid fa-chevron-right ms-2" data-fa-transform="down-2"></span></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section>

<?php

use App\Libraries\Slug;

if (!empty($locations)): ?>
    <?php if ($totalHotels <= 2): ?>
        <section class="py-10">
            <div class="container-medium">
                <h3 class="mb-2 text-body-emphasis text-center">Our hotel<?= $totalHotels == 1 ? '' : 's' ?></h3>
                <?php foreach ($locations as $cityHotel): ?>
                    <?php foreach ($cityHotel['hotels'] as $hotel): ?>
                        <div class="row align-items-center">
                            <div class="col-lg-6 text-center text-lg-start pe-xxl-3">
                                <h2 class="mb-3 text-body-emphasis lh-base"><?= $hotel['property_name'] ?></h2>
                                <p class="mb-5"><?= $hotel['description'] ?></p>
                                <a class="btn btn-lg btn-outline-primary rounded-pill me-2" href="<?= base_url('hotel/' . $hotel['property_name_slug']) ?>" role="button">See Hotel<i class="fa-solid fa-angle-right ms-2"></i></a>
                            </div>
                            <div class="col-sm-6 mt-7 text-center text-lg-start">
                                <div class="hoverbox rounded">
                                    <a href="<?= base_url('hotel/' . $hotel['property_name_slug']) ?>">
                                        <!-- <?= $hotel['thumbnail'] ?> -->
                                        <img class="img-fluid" src="<?= base_url('image/hotel_thumbnail/' . $hotel['id'] . "/" . $hotel['thumbnail']) ?>" alt="<?= $hotel['property_name'] ?> thumbnail" />
                                        <div class="backdrop-faded">
                                            <!-- <h3 class="text-underline fs-7 fs-lg-6 text-white fw-bold mb-2">abcd</h3> -->
                                            <div class="d-sm-flex d-md-block d-lg-flex flex-between-center">
                                                <h5 class="text-secondary-lighter fw-normal mb-3"><span class="fa-solid fa-map-marker-alt text-primary me-2"></span><?= $cityHotel['city'] ?></h5>
                                                <div class="d-flex gap-3">
                                                    <h5 class="text-secondary-lighter fw-normal">
                                                        <span class="fa-solid fa-star fs-9 me-2"></span><?= $hotel['rating'] ?>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </section>
    <?php elseif ($totalHotels <= 3): ?>
        <section class="py-10">
            <div class="container-medium">
                <div class="row g-3">
                    <h3 class="mb-2 text-body-emphasis text-center text-xl-start">Our hotel<?= $totalHotels == 1 ? '' : 's' ?></h3>
                    <?php foreach ($locations as $cityHotel): ?>
                        <?php foreach ($cityHotel['hotels'] as $key => $hotel): ?>
                            <div class="col-md-6 col-xl-4">
                                <div class="hoverbox rounded">
                                    <a href="<?= base_url('hotel/' . $hotel['property_name_slug']) ?>">
                                        <img class="img-fluid" src="<?= base_url('image/hotel_thumbnail/' . $hotel['id'] . "/" . $hotel['thumbnail']) ?>" alt="<?= $hotel['property_name'] ?> thumbnail" />
                                        <div class="backdrop-faded">
                                            <h3 class="text-underline fs-7 fs-lg-6 text-white fw-bold mb-2"><?= $hotel['property_name'] ?></h3>
                                            <div class="d-sm-flex d-md-block d-lg-flex flex-between-center">
                                                <h5 class="text-secondary-lighter fw-normal mb-3"><span class="fa-solid fa-map-marker-alt text-primary me-2"></span><?= $cityHotel['city'] ?></h5>

                                                <div class="d-flex gap-3">
                                                    <h5 class="text-secondary-lighter fw-normal"> <span class="fa-solid fa-star fs-9 me-2"></span><?= $hotel['rating'] ?></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php elseif ($totalHotels > 3): ?>
        <div class="bg-primary-subtle border-y border-translucent py-4">
            <div class=" container-medium d-flex flex-between-center justify-content-center">
                <ul class="nav nav-underline fs-9 horizontal-nav" id="myTab" role="tablist">
                    <?php foreach ($locations as $key => $cityHotel):
                        $citySlug = Slug::slugify($cityHotel['city']); ?>
                        <li class="nav-item">
                            <a class="nav-link px-3 fs-8 <?= $key == 0 ? 'active' : '' ?>" id="<?= $citySlug ?>-tab" data-bs-toggle="tab" href="#tab-<?= $citySlug ?>" role="tab" aria-controls="tab-<?= $citySlug ?>" aria-selected="true"><?= $cityHotel['city'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <section class="tab-content pt-0" id="myTabContent">
            <?php foreach ($locations as $key => $cityHotel):
                $citySlug = Slug::slugify($cityHotel['city']); ?>
                <div class="tab-pane overflow-x-hidden fade<?= $key == 0 ? 'show active' : '' ?>" id="tab-<?= $citySlug ?>" role="tabpanel" aria-labelledby="<?= $citySlug ?>-tab">
                    <section class="pt-10 pb-0" id="feature">
                        <div class="container-small px-lg-7 px-xxl-3">
                            <div class="position-relative z-2">
                                <?php foreach ($cityHotel['hotels'] as $hotel): ?>
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 text-center text-lg-start pe-xxl-3">
                                            <h2 class="mb-3 text-body-emphasis lh-base"><?= $hotel['property_name'] ?></h2>
                                            <p class="mb-5"><?= $hotel['description'] ?></p>
                                            <a class="btn btn-lg btn-outline-primary rounded-pill me-2" href="<?= base_url('hotel/' . $hotel['property_name_slug']) ?>" role="button">See Hotel<i class="fa-solid fa-angle-right ms-2"></i></a>
                                        </div>
                                        <div class="col-sm-6 mt-7 text-center text-lg-start">
                                            <div class="hoverbox rounded">
                                                <a href="<?= base_url('hotel/' . $hotel['property_name_slug']) ?>">
                                                    <img class="img-fluid" src="<?= base_url('image/hotel_thumbnail/' . $hotel['id'] . "/" . $hotel['thumbnail']) ?>" alt="<?= $hotel['property_name'] ?> thumbnail" />
                                                    <div class="backdrop-faded">
                                                        <!-- <h3 class="text-underline fs-7 fs-lg-6 text-white fw-bold mb-2">abcd</h3> -->
                                                        <div class="d-sm-flex d-md-block d-lg-flex flex-between-center">
                                                            <h5 class="text-secondary-lighter fw-normal mb-3"><span class="fa-solid fa-map-marker-alt text-primary me-2"></span><?= $cityHotel['city'] ?></h5>
                                                            <div class="d-flex gap-3">
                                                                <h5 class="text-secondary-lighter fw-normal">
                                                                    <span class="fa-solid fa-star fs-9 me-2"></span><?= $hotel['rating'] ?>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </section>
                </div>
            <?php endforeach; ?>
        </section>
    <?php endif; ?>
<?php endif; ?>

<section class="py-10">
    <div class="bg-holder d-none d-xl-block" style="background-image:url(assets/img/bg/bg-left-29.png);background-size:auto;background-position:-15%;"></div>
    <div class="container-medium position-relative">
        <h3 class="mb-2 text-body-emphasis text-center text-xl-start">The best of our hotel</h3>
        <div class="d-xl-flex justify-content-between mb-5 text-center">
            <p class="mb-0 text-body-tertiary">This list will help you get insights into how much you’ll need to spend to afford accommodation.</p>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-sm-11 col-md-8 col-lg-6 col-xl-12">
                <div class="row gy-5 gx-xl-7 justify-content-between pe-4">
                    <div class="col-xl-4">
                        <div class="card card-img-shift border-0 mx-auto">
                            <div class="rounded-3 overflow-hidden w-100 position-relative z-5"><img class="w-100" src="assets/img/gallery/45.png" alt="" height="250" /><button class="btn btn-wish position-absolute top-0 end-0 mt-3 me-3"><span class="far fa-heart"></span></button></div>
                            <div class="card-body p-0">
                                <div class="card-content">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                                        <div><span class="badge badge-phoenix px-1 me-2 badge-phoenix-warning">promoted</span><span class="badge badge-phoenix px-1 badge-phoenix-info">Couple package</span></div>
                                        <h6><span class="fa-solid fa-star text-warning me-1"></span>4.8 (1.4k stay)</h6>
                                    </div><a class="fw-bold fs-7 text-body-emphasis mb-2 text-primary-hover" href="#!">Royal Mansour Marrakech</a><a class="fw-semibold text-body-tertiary mb-3 d-block" href="#!"><span class="me-1" data-feather="map-pin"></span>Morocco</a>
                                    <h6 class="fe-semibold text-body-tertiary d-flex align-items-center gap-1 mb-4">From <span class="fw-bolder fs-7 text-body-highlight">$60.00</span>/ per night</h6><button class="btn btn-primary px-5">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-img-shift border-0 mx-auto">
                            <div class="rounded-3 overflow-hidden w-100 position-relative z-5"><img class="w-100" src="assets/img/gallery/46.png" alt="" height="250" /><button class="btn btn-wish position-absolute top-0 end-0 mt-3 me-3"><span class="far fa-heart"></span></button></div>
                            <div class="card-body p-0">
                                <div class="card-content">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                                        <div><span class="badge badge-phoenix px-1 me-2 badge-phoenix-warning">promoted</span><span class="badge badge-phoenix px-1 badge-phoenix-info">Couple package</span></div>
                                        <h6><span class="fa-solid fa-star text-warning me-1"></span>4.8 (1.4k stay)</h6>
                                    </div><a class="fw-bold fs-7 text-body-emphasis mb-2 text-primary-hover" href="#!">Mandarin Oriental Jumeira</a><a class="fw-semibold text-body-tertiary mb-3 d-block" href="#!"><span class="me-1" data-feather="map-pin"></span>Abu dhabi</a>
                                    <h6 class="fe-semibold text-body-tertiary d-flex align-items-center gap-1 mb-4">From <span class="fw-bolder fs-7 text-body-highlight">$90.00</span>/ per night</h6><button class="btn btn-primary px-5">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="card card-img-shift border-0 mx-auto">
                            <div class="rounded-3 overflow-hidden w-100 position-relative z-5"><img class="w-100" src="assets/img/gallery/47.png" alt="" height="250" /><button class="btn btn-wish position-absolute top-0 end-0 mt-3 me-3"><span class="far fa-heart"></span></button></div>
                            <div class="card-body p-0">
                                <div class="card-content">
                                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                                        <div><span class="badge badge-phoenix px-1 me-2 badge-phoenix-warning">promoted</span><span class="badge badge-phoenix px-1 badge-phoenix-info">Couple package</span></div>
                                        <h6><span class="fa-solid fa-star text-warning me-1"></span>4.8 (1.4k stay)</h6>
                                    </div><a class="fw-bold fs-7 text-body-emphasis mb-2 text-primary-hover" href="#!">Swissotel Bangkok</a><a class="fw-semibold text-body-tertiary mb-3 d-block" href="#!"><span class="me-1" data-feather="map-pin"></span>Bangkok</a>
                                    <h6 class="fe-semibold text-body-tertiary d-flex align-items-center gap-1 mb-4">From <span class="fw-bolder fs-7 text-body-highlight">$70.00</span>/ per night</h6><button class="btn btn-primary px-5">Book Now</button>
                                </div>
                            </div>
                        </div>
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

<?= $this->include('fronts/user/components/Find-hotel-js'); ?>

<?= $this->endSection() ?>