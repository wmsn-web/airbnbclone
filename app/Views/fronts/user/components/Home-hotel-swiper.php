<!-- <?= $this->setVar('cityHotel', $cityHotel)->include('fronts/user/components/Home-hotel-swiper') ?> -->
<?php if (count($hotels) <= 2): ?>
    <section class="pt-15 pb-0" id="feature">
        <div class="container-small px-lg-7 px-xxl-3">
            <div class="position-relative z-2">
                <?php foreach ($hotels as $hotel): ?>
                    <div class="row align-items-center">
                        <div class="col-lg-6 text-center text-lg-start pe-xxl-3">
                            <h2 class="mb-3 text-body-emphasis lh-base">Seamless Payments: A Fully <br class="d-md-none" />Integrated Suite</h2>
                            <p class="mb-5">With the power of Phoenix, you can now focus only on functionaries for your digital products, while leaving the UI design on us!With the power of Phoenix, you can now focus only on functionaries for your digital products, while leaving the UI design on us!</p><a class="btn btn-lg btn-outline-primary rounded-pill me-2" href="#!" role="button">Find out more<i class="fa-solid fa-angle-right ms-2"></i></a>
                        </div>
                        <div class="col-sm-6 mt-7 text-center text-lg-start">
                            <div class="hoverbox rounded">
                                <a href="trip-details.html">
                                    <img class="img-fluid" src="../../../assets/img/trip/1.png" alt="" />
                                    <div class="backdrop-faded">
                                        <h3 class="text-underline fs-7 fs-lg-6 text-white fw-bold mb-2">abcd</h3>
                                        <div class="d-sm-flex d-md-block d-lg-flex flex-between-center">
                                            <h5 class="text-secondary-lighter fw-normal mb-3"><span class="fa-solid fa-map-marker-alt text-primary me-2"></span>abcd</h5>
                                            <div class="d-flex gap-3">
                                                <h5 class="text-secondary-lighter fw-normal">
                                                    <span class="fa-solid fa-star fs-9 me-2"></span>abcd
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
<?php else: ?>
    <div class="swiper-theme-container swiper-zooming-slider mt-13">
        <div class="swiper-container theme-slider" data-swiper='{"loop":true,"slidesPerView":1.3,"spaceBetween":32,"speed":3000,"autoplay":true,"centeredSlides":true,"simulateTouch":false,"breakpoints":{"540":{"slidesPerView":1.5},"768":{"slidesPerView":1.8},"1200":{"slidesPerView":2},"1530":{"slidesPerView":2.8}}}'>
            <div class="swiper-wrapper">
                <?php foreach ($hotels as $hotel): ?>
                    <div class="swiper-slide rounded-3 overflow-hidden">
                        <div class="position-relative w-100 h-100">
                            <img class="w-100 h-100 object-fit-cover" src="<?= base_url() ?>assets/img/gallery/48.png" alt="">
                            <div class="backdrop-faded p-4 p-md-6">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-secondary-lighter me-2" data-feather="calendar"></span>
                                    <h6 class="mb-0 fw-semibold text-secondary-lighter pe-3 me-3 border-end">Monday, Nov 07, 2022</h6>
                                    <span class="fa-solid fa-star text-warning fs-9 me-2"></span>
                                    <h6 class="mb-0 text-secondary-lighter fw-semibold"><?= $hotel['rating'] ?: 'N/A' ?></h6>
                                </div>
                                <a class="text-white fw-bold fs-7" href="<?= base_url('hotels') ?>"><?= esc($hotel['property_name']) ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="swiper-nav">
            <div class="swiper-button-next"><span class="fas fa-chevron-right text-primary" data-fa-transform="shrink-3"></span></div>
            <div class="swiper-button-prev"><span class="fas fa-chevron-left text-primary" data-fa-transform="shrink-3"></span></div>
        </div>
    </div>
<?php endif; ?>
<!-- <div class="text-center mt-12 position-relative z-2">
    <button class="btn btn-link p-0 fs-8">View all<span class="fa-solid fa-chevron-right ms-2" data-fa-transform="shrink-1"></span>
    </button>
</div> -->