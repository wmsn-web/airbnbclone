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
            <!-- <source src="<?= base_url() ?>assets/video/travel.mp4" type="video/mp4" /> -->
            <source src="https://images.mirai.com/VIDEOS/500343/Hoteles-Center-Barcelona.mp4" type="video/mp4" />
        </video>
    </div>
    <!-- <div class="container-medium position-relative z-5">
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
    </div> -->
</div>

<div class="bg-primary-subtle border-y border-translucent py-4 sticky-top">
    <div class=" container-medium d-flex flex-between-center justify-content-center">
        <ul class="nav nav-underline fs-9" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link px-3 fs-8 active" id="barcelona-tab" data-bs-toggle="tab" href="#tab-barcelona" role="tab" aria-controls="tab-barcelona" aria-selected="true">Hotel
                    Barcelona Center</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="granada-tab" data-bs-toggle="tab" href="#tab-granada" role="tab" aria-controls="tab-granada" aria-selected="false">Rooms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="contact-tab" data-bs-toggle="tab" href="#tab-contact" role="tab" aria-controls="tab-contact" aria-selected="false">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="contact-tab" data-bs-toggle="tab" href="#tab-contact" role="tab" aria-controls="tab-contact" aria-selected="false">Weddings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="contact-tab" data-bs-toggle="tab" href="#tab-contact" role="tab" aria-controls="tab-contact" aria-selected="false">Gastronomy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="contact-tab" data-bs-toggle="tab" href="#tab-contact" role="tab" aria-controls="tab-contact" aria-selected="false">Offers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3 fs-8" id="contact-tab" data-bs-toggle="tab" href="#tab-contact" role="tab" aria-controls="tab-contact" aria-selected="false">Gallery</a>
            </li>
        </ul>
    </div>
</div>

<section class="tab-content pt-0" id="myTabContent">
    <div class="tab-pane overflow-x-hidden fade show active" id="tab-barcelona" role="tabpanel" aria-labelledby="barcelona-tab">
        <div class="py-8 pb-0" id="feature">
            <div class="container-small px-lg-7 px-xxl-3">
                <div class="position-relative z-2">
                    <div class="row justify-content-center">
                        <div class="col col-md-9 text-center pe-xxl-3">
                            <h4 class="text-primary fw-bolder mb-2">Hotel</h4>
                            <h2 class="mb-3 text-body-emphasis lh-base">Barcelona Center</h2>
                            <p class="mb-5">Hotel Barcelona Center, is a <b>4 star</b> category hotel located in the heart of the Eixample district. It combines to perfection its fantastic central location with an <b>accommodation offer of the highest quality, exquisite gastronomy and the most modern technology</b> .</p>
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-between text-center text-lg-start my-6 mb-lg-0">
                        <div class="col-lg-6">
                            <img class=" img-fluid mb-9 mb-lg-0 d-dark-none" src="<?= base_url('assets/img/hotels/90.jpg') ?>" alt="" />
                        </div>
                        <div class="col-lg-6">
                            <!-- <h6 class="text-primary mb-2 ls-2">SIGNAL</h6> -->
                            <!-- <h3 class="fw-bolder mb-3">Recieve the signals instantly</h3> -->
                            <p class="mb-4 px-md-7 px-lg-0">Hotel Barcelona Center, with 132 rooms, was born with the purpose of becoming a unique reference in its category. Added to its perfect accommodation offer is an excellent offer of rooms to hold events and banquets, all of which with large capacity and with state-of-the-art technology to ensure that every event is a success. Its proximity to the famous Paseo de Gracia and the shopping and financial centre of the city make this hotel an alternative and complementary proposal to Hotel Casa Fuster.</p><a class="btn btn-link me-2 p-0 fs-8" href="#!" role="button">See Rooms<i class="fa-solid fa-angle-right ms-2"></i></a>
                        </div>
                    </div>
                    <div class="row my-7 g-0">
                        <div class="col-6 col-md-3">
                            <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-bottom border-black border-end">
                                <img class="w-25" src="<?= base_url('assets/img/realistic-icon/jacuzzi.png') ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-bottom border-black border-end-md">
                                <img class="w-25" src="<?= base_url('assets/img/realistic-icon/wifi.png') ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-bottom border-black border-end border-end-md">
                                <img class="w-25" src="<?= base_url('assets/img/realistic-icon/gym.png') ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-bottom border-black border-end-lg-0">
                                <img class="w-25" src="<?= base_url('assets/img/realistic-icon/business.png') ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-end border-bottom border-black border-bottom-md-0">
                                <img class="w-25" src="<?= base_url('assets/img/realistic-icon/room-service.png') ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-end-md border-bottom border-black border-bottom-md-0">
                                <img class="w-25" src="<?= base_url('assets/img/realistic-icon/dining.png') ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-end border-black">
                                <img class="w-25" src="<?= base_url('assets/img/realistic-icon/parking.png') ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-6 col-md-3">
                            <div class="p-2 p-lg-5 d-flex flex-center h-100 border-1 border-dashed border-end-lg-0 border-black">
                                <img class="w-25" src="<?= base_url('assets/img/realistic-icon/stroller.png') ?>" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="row my-7 g-3">
                        <div class="col-md-6 ">
                            <div class="img-zoom-hover rounded-3 overflow-hidden position-relative">
                                <a href="#!">
                                    <img class="latest-img w-100 object-fit-cover" src="<?= base_url('assets/img/hotels/84.jpg') ?>" alt="" />
                                </a>
                                <div class="backdrop-faded">
                                    <a class="fw-semibold mb-0 text-secondary-lighter stretched-link" href="#!">
                                        Weddings and Celebrations
                                    </a>
                                    <h5 class="text-light mb-0">Celebrate your wedding or banquet in style</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="img-zoom-hover rounded-3 overflow-hidden position-relative">
                                <a href="#!">
                                    <img class="latest-img w-100 object-fit-cover" src="<?= base_url('assets/img/hotels/40.png') ?>" alt="" />
                                </a>
                                <div class="backdrop-faded">
                                    <a class="fw-semibold mb-0 text-secondary-lighter stretched-link" href="#!">
                                        Conventions and events
                                    </a>
                                    <h5 class="text-light mb-0">A wide range of rooms for events</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="img-zoom-hover rounded-3 overflow-hidden position-relative">
                                <a href="#!">
                                    <img class="latest-img w-100 object-fit-cover" src="<?= base_url('assets/img/hotels/41.png') ?>" alt="" />
                                </a>
                                <div class="backdrop-faded">
                                    <a class="fw-semibold mb-0 text-secondary-lighter stretched-link" href="#!">
                                        Dining
                                    </a>
                                    <h5 class="text-light mb-0">Creative and innovative cuisine</h5>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="img-zoom-hover rounded-3 overflow-hidden position-relative">
                                <a href="#!">
                                    <img class="latest-img w-100 object-fit-cover" src="<?= base_url('assets/img/hotels/78.png') ?>" alt="" />
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
                    <div class="row my-7">
                        <div class="position-relative overflow-hidden rounded-md-2">
                            <div class="bg-holder bg-holder overlay bg-opacity-75" style="background-image:url(<?= base_url('assets/img/hotels/44.png') ?>);background-position: center; background-size: cover;"></div>
                            <!--/.bg-holder-->
                            <div class="row g-lg-0 gy-3 position-relative justify-content-center py-9 px-3 px-sm-6">
                                <div class="col-md-4 hotel-promo text-center">
                                    <h1 class="text-white">Exclusive offers</h1>
                                    <a class="btn" href="<?= route_to('user.register') ?>">SEE ALL OFFERS</a>
                                </div>
                                <div class="col-md-8 left-border">
                                    <div class="swiper-theme-container">
                                        <div class="swiper theme-slider text-white" data-swiper='{"autoplay":true,"spaceBetween":5,"speed":3000,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <div class="hp-offer">
                                                        <h2>Non refundable rate</h2>
                                                        <h2>10%</h2>
                                                        <a class="btn btn-link me-2 p-0 fs-8" href="#!" role="button">More info<i class="fa-solid fa-angle-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="hp-offer">
                                                        <h2>Early bird offer</h2>
                                                        <h2>10%</h2>
                                                        <a class="btn btn-link me-2 p-0 fs-8" href="#!" role="button">More info<i class="fa-solid fa-angle-right ms-2"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-nav sn-cstm">
                                            <div class="swiper-button-prev">
                                                <span class="fas fa-chevron-right nav-icon"></span>
                                            </div>
                                            <div class="swiper-button-next">
                                                <span class="fas fa-chevron-left nav-icon"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tab-granada" role="tabpanel" aria-labelledby="granada-tab">
        <div class="py-8 pb-0" id="feature">
            <div class="container-small px-lg-7 px-xxl-3">
                <div class="position-relative z-2">
                    <div class="row justify-content-center">
                        <div class="col col-md-9 text-center pe-xxl-3">
                            <h4 class="text-primary fw-bolder mb-2">Hotel Barcelona Center</h4>
                            <h2 class="mb-3 text-body-emphasis lh-base">Cosy and comfortable rooms</h2>
                            <p class="mb-5"><b>From 95€ per night - 132 rooms of 10 types.</b></p>
                        </div>
                    </div>
                    <div class="row mt-5 align-items-center justify-content-between text-center text-lg-start mb-6 mb-lg-0">
                        <?php
                        $amenities = [
                            "Desk",
                            "Television",
                            "Telephone",
                            "Air conditioning",
                            "Heating",
                            "Mini-bar (extra cost)",
                            "Free safe",
                            "Free Wi-Fi Internet",
                            "Parquet floor",
                            "Wake-up service",
                            "Laundry service (surcharge)",
                            "Toiletries",
                            "Pillow menu",
                            "Bath with shower",
                            "Bidet",
                            "Hairdryer",
                            "Magnifying mirror"
                        ];
                        ?>
                        <ul class="h-ams-list">
                            <?php foreach ($amenities as $ams): ?>
                                <li>
                                    <i class="far fa-star text-info pe-2"></i>
                                    <?= $ams ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="row mt-12 align-items-center justify-content-between text-center text-lg-start mb-6 mb-lg-0">
                        <div class="col-lg-5">
                            <a href="<?= base_url('assets/img/hotels/26.png') ?>" data-gallery="default-gallery">
                                <img class="img-fluid rounded-2" src="<?= base_url('assets/img/hotels/26.png') ?>" alt="">
                            </a>
                            <!-- <img class="feature-image img-fluid mb-9 mb-lg-0 d-dark-none" src="<?= base_url('assets/img/hotels/26.png') ?>" alt=""> -->
                        </div>
                        <div class="col-lg-6 room-box">
                            <a class="text-primary room-title mb-2 ls-2">Standard Room</a>
                            <ul>
                                <li>Max. 3 people</li>
                                <li>Different compositions</li>
                            </ul>
                            <p class="mb-4 px-md-7 px-lg-0">Phoenix makes it possible for you to quickly and effectively receive every signal. No need for drawn-out waiting.</p>
                            <a class="btn btn-primary rounded text-nowrap px-sm-6" href="#!" role="button">More information<i class="fa-solid fa-angle-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tab-contact" role="tabpanel" aria-labelledby="contact-tab">Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</div>
</section>




<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('vendors/glightbox/glightbox.min.js') ?>"> </script>

<?= $this->endSection() ?>