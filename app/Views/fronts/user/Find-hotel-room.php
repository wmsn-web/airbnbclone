<?= $this->extend('fronts/templates/Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($location); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link href="<?= base_url('vendors/glightbox/glightbox.min.css'); ?>" rel="stylesheet">
<link href="<?= base_url('vendors/mapbox-gl/mapbox-gl.css'); ?>" rel="stylesheet">
<link href="<?= base_url('vendors/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-medium-md px-0 px-md-3">
    <div class="px-3 py-8 position-relative">
        <div class="bg-holder overlay rounded-md-2" style="background-image:url(<?= base_url() ?>assets/img/bg/42.png);background-position: center; background-size: cover;"></div>
        <?= $this->include('fronts/user/components/Find-hotel-temp'); ?>
    </div>
</div>
<section class="pt-4 pb-9">
    <div class="container-medium">
        <div class="row g-3">
            <div class="col-xl-8">
                <?php if ($hotels): ?>
                    <?php foreach ($hotels as $h): ?>
                        <?php
                        $hotel   = $h['hotel'];
                        $address = $h['address'];
                        $rooms   = $h['rooms']; ?>
                        <?php if (!empty($rooms)): ?>
                            <?php foreach ($rooms as $room): ?>
                                <hr class="my-3" />
                                <div class="row g-3 mb-4">
                                    <div class="col-lg-8 col-xxl-7">
                                        <div class="row flex-lg-nowrap g-3 mb-2">
                                            <div class="col-md-auto">
                                                <h4 class="mb-0 fw-semibold"><span class="fa-solid fa-circle fs-9 text-body-quaternary me-2" data-fa-transform="up-1"></span><?= $room['room_name'] ?></h4>
                                            </div>
                                            <div class="col-md-auto d-flex align-items-center">
                                                <div class="vr bg-body-secondary me-3 d-none d-md-block"></div><span class="fa-solid fa-bed text-primary fs-9 me-1"></span><span class="fa-solid fa-bed text-primary fs-9"></span>
                                                <div class="vr bg-body-secondary mx-3"></div><span class="fa-solid fa-user text-primary fs-9 me-1"></span><span class="fa-solid fa-user text-primary fs-9"></span>
                                                <div class="vr bg-body-secondary mx-3"></div><span class="fa-solid fa-mug-saucer text-primary fs-9"></span>
                                                <div class="vr bg-body-secondary mx-3"></div><span class="badge badge-phoenix badge-phoenix-info">10% OFF</span>
                                            </div>
                                        </div>
                                        <p class="mb-0"><?= $room['description'] ?></p>
                                    </div>
                                    <div class="col-lg-4 col-xxl-5">
                                        <h3 class="mb-2 d-flex align-items-center justify-content-lg-end gap-2"><span class="fs-9 text-body-quaternary fw-normal text-decoration-line-through">$1,456.65</span>$<?= $room['price'] ?></h3>
                                        <h5 class="text-body text-lg-end fw-normal">+$123 for tax and fees</h5>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-7">
                                        <div class="row gx-2 h-100">
                                            <div class="col-4"><a href="<?= base_url() ?>assets/img/hotels/33.png" data-gallery="room-gallery-0"><img class="w-100 h-100 object-fit-cover rounded-2" src="<?= base_url() ?>assets/img/hotels/33.png" alt="" /></a></div>
                                            <div class="col-4"><a href="<?= base_url() ?>assets/img/hotels/34.png" data-gallery="room-gallery-0"><img class="w-100 h-100 object-fit-cover rounded-2" src="<?= base_url() ?>assets/img/hotels/34.png" alt="" /></a></div>
                                            <div class="col-4"><a href="<?= base_url() ?>assets/img/hotels/35.png" data-gallery="room-gallery-0"><img class="w-100 h-100 object-fit-cover rounded-2" src="<?= base_url() ?>assets/img/hotels/35.png" alt="" /></a></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-5 col-xxl-4 ms-auto">
                                        <div class="card bg-body-highlight">
                                            <div class="card-body">
                                                <ul class="mb-2 list-unstyled d-flex list flex-wrap gap-2">
                                                    <li class="text-body-highlight fs-9 me-1 mb-0 lh-1"><span class="fa-solid fa-check text-success me-1"> </span>wifi</li>
                                                    <li class="text-body-highlight fs-9 me-1 mb-0 lh-1"><span class="fa-solid fa-check text-success me-1"> </span>tv</li>
                                                    <li class="text-body-highlight fs-9 me-1 mb-0 lh-1"><span class="fa-solid fa-check text-success me-1"> </span>common area</li>
                                                    <li class="text-body-highlight fs-9 me-1 mb-0 lh-1"><span class="fa-solid fa-check text-success me-1"> </span>bathtub</li>
                                                    <li class="text-body-highlight fs-9 me-1 mb-0 lh-1"><span class="fa-solid fa-check text-success me-1"> </span>Heating</li>
                                                    <li class="text-body-highlight fs-9 me-1 mb-0 lh-1"><span class="fa-solid fa-check text-success me-1"> </span>Telephone</li>
                                                </ul><a class="fw-bold fs-9" href="#!">Show other amenities </a>
                                            </div>
                                        </div>

                                        <button class="btn btn-outline-primary w-100 mt-3 add-room-btn" data-room-id="<?= $room['id']; ?>"
                                            data-room-name="<?= esc($room['room_name']); ?>"
                                            data-room-price="<?= esc($room['price']); ?>"
                                            data-room-in="<?= esc($startDate); ?>"
                                            data-room-out="<?= esc($endDate); ?>"
                                            data-room-adults="<?= esc($query['adults']); ?>"
                                            data-room-infants="<?= esc($query['infants']); ?>"
                                            data-room-children="<?= esc($query['children']); ?>">
                                            Add room
                                        </button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="row g-3 mb-4">
                                <h3>Sorry! No room available at this moment.</h3>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="row g-3 mb-6 text-center">
                        <h3>Coming soon</h3>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-xl-4">
                <div class="card mt-3 mt-xl-0">
                    <div class="card-body">
                        <h5 class="mb-3">Summary</h5>
                        <div id="summary-rooms"></div>
                        <!-- <div class="card mb-3">
                            <div class="card-body">
                                <button class="btn p-0 position-absolute end-0 fs-8 mt-n5 me-n2 text-body-tertiary"><span class="fa-solid fa-circle-xmark"></span></button>
                                <div class="d-flex justify-content-between gap-3 mb-4">
                                    <div>
                                        <h5 class="text-body-highlight">Room 1</h5>
                                        <p class="mb-0 text-body-tertiary">King-Super deluxe</p>
                                    </div>
                                    <h4 class="mb-0">$2,056.75</h4>
                                </div>
                                <div class="row align-items-center g-0">
                                    <div class="col-3">
                                        <h5 class="text-body text-nowrap mb-0">Check in</h5>
                                    </div>
                                    <div class="col-auto"><span class="px-2">:</span></div>
                                    <div class="col-auto"><span>25 January, 2023</span></div>
                                </div>
                                <div class="row align-items-center g-0 mb-4">
                                    <div class="col-3">
                                        <h5 class="text-body text-nowrap mb-0">Check out</h5>
                                    </div>
                                    <div class="col-auto"><span class="px-2">:</span></div>
                                    <div class="col-auto"><span>27 January, 2023</span></div>
                                </div>
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span class="fa-solid fa-bed fs-9 me-2"></span><span>Double bed</span></span><span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span class="fa-solid fa-user fs-9 me-2"></span><span>2 Adults</span></span><span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span class="fa-solid fa-moon fs-9 me-2"></span><span>2 Nights</span></span></div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body"><button class="btn p-0 position-absolute end-0 fs-8 mt-n5 me-n2 text-body-tertiary"><span class="fa-solid fa-circle-xmark"></span></button>
                                <div class="d-flex justify-content-between gap-3 mb-4">
                                    <div>
                                        <h5 class="text-body-highlight">Room 2</h5>
                                        <p class="mb-0 text-body-tertiary">Standard double queen</p>
                                    </div>
                                    <h4 class="mb-0">$1,456.65</h4>
                                </div>
                                <div class="row align-items-center g-0">
                                    <div class="col-3">
                                        <h5 class="text-body text-nowrap mb-0">Check in</h5>
                                    </div>
                                    <div class="col-auto"><span class="px-2">:</span></div>
                                    <div class="col-auto"><span>25 January, 2023</span></div>
                                </div>
                                <div class="row align-items-center g-0 mb-4">
                                    <div class="col-3">
                                        <h5 class="text-body text-nowrap mb-0">Check out</h5>
                                    </div>
                                    <div class="col-auto"><span class="px-2">:</span></div>
                                    <div class="col-auto"><span>28 January, 2023</span></div>
                                </div>
                                <div class="d-flex flex-wrap gap-2"><span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span class="fa-solid fa-bed fs-9 me-2"></span><span>Double bed</span></span><span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span class="fa-solid fa-user fs-9 me-2"></span><span>2 Adults</span></span><span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span class="fa-solid fa-baby fs-9 me-2"></span><span>1 Childs</span></span><span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span class="fa-solid fa-moon fs-9 me-2"></span><span>3 Nights</span></span></div>
                            </div>
                        </div> -->
                        <div class="px-4 py-3 bg-body-highlight rounded-2">
                            <!-- <div class="d-flex flex-between-center mb-2">
                                <h6 class="text-body-tertiary fw-semibold">Sub-total</h6>
                                <h6 class="text-body-highlight fw-semibold">$3,513.40</h6>
                            </div>
                            <div class="d-flex flex-between-center">
                                <h6 class="text-body-tertiary fw-semibold">Discount</h6>
                                <h6 class="text-body-tertiary fw-semibold">-$50</h6>
                            </div> -->
                            <hr />
                            <div class="d-flex flex-between-center">
                                <h4 class="text-body">Total</h4>
                                <h4 class="text-body" id="summary-total">$0.00</h4>
                            </div>
                        </div>
                        <a class=" btn btn-primary mt-3 w-100" href="<?= base_url(); ?>">Proceed with booking</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('vendors/glightbox/glightbox.min.js'); ?>"> </script>
<script src="<?= base_url('vendors/mapbox-gl/mapbox-gl.js'); ?>"></script>
<script src="<?= base_url('vendors/swiper/swiper-bundle.min.js'); ?>"></script>
<?= $this->include('fronts/user/components/Add-to-cart-js'); ?>

<?= $this->endSection() ?>