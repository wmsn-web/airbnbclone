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
        <?= $this->include('fronts/user/components/Find-hotel-search-bar'); ?>
    </div>
</div>
<section class="pt-4 pb-9">
    <div class="container-medium">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if (!empty($hotels)): ?>
                    <?php foreach ($hotels as $value): ?>
                        <?php
                        $hotel = $value['hotel'];
                        $address = $value['address'];
                        $rooms = $value['rooms'];
                        ?>
                        <div class="row">
                            <div class="col-lg-8 col-xxl-7">
                                <a href="<?= base_url('hotel/' . $hotel['property_name_slug']) ?>" target="_blank" class="position-relative fs-4 mb-0 fw-bold text-decoration-none text-black">
                                    <?= $hotel['property_name'] ?>
                                    <i class="fas fa-link position-absolute text-primary" style="font-size: 16px;"></i>
                                </a>
                            </div>
                        </div>
                        <?php if (!empty($rooms)): ?>
                            <?php foreach ($rooms as $room): ?>
                                <hr class="my-4" />
                                <div class="row g-3 mb-4">
                                    <div class="col-lg-8 col-xxl-7">
                                        <div class="row flex-lg-nowrap g-3 mb-2">
                                            <div class="col-md-auto">
                                                <h4 class="mb-0 fw-semibold">
                                                    <span class="fa-solid fa-circle fs-9 text-body-quaternary me-2" data-fa-transform="up-1"></span><?= $room['room_name'] ?>
                                                </h4>
                                            </div>
                                            <!-- <div class="col-md-auto d-flex align-items-center">
                                                <div class="vr bg-body-secondary me-3 d-none d-md-block"></div>
                                                <span class="fa-solid fa-bed text-primary fs-9 me-1"></span>
                                                <span class="fa-solid fa-bed text-primary fs-9"></span>
                                                <div class="vr bg-body-secondary mx-3"></div>
                                                <span class="fa-solid fa-user text-primary fs-9 me-1"></span>
                                                <span class="fa-solid fa-user text-primary fs-9"></span>
                                                <div class="vr bg-body-secondary mx-3"></div>
                                                <span class="fa-solid fa-mug-saucer text-primary fs-9"></span>
                                                <div class="vr bg-body-secondary mx-3"></div>
                                                <span class="badge badge-phoenix badge-phoenix-info">10% OFF</span>
                                            </div> -->
                                        </div>
                                        <p class="mb-0"><?= $room['description'] ?></p>
                                    </div>
                                    <div class="col-lg-4 col-xxl-5">
                                        <?php
                                        $cm = setting('currency_method');
                                        $symbol = $cm['symbol'] ?>
                                        <h3 class="mb-2 d-flex align-items-center justify-content-lg-end gap-2">
                                            <!-- <span class="fs-9 text-body-quaternary fw-normal text-decoration-line-through">$1,456.65</span> -->
                                            <?= $cm['symbol'] ?><?= $room['price'] ?> / Night
                                        </h3>
                                        <!-- <h5 class="text-body text-lg-end fw-normal">+$123 for tax and fees</h5> -->
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-7">
                                        <div class="row gx-2 h-100">
                                            <div class="col-4">
                                                <a href="<?= base_url() ?>assets/img/hotels/33.png" data-gallery="room-gallery-0">
                                                    <img class="w-100 h-100 object-fit-cover rounded-2" src="<?= base_url() ?>assets/img/hotels/33.png" alt="" />
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?= base_url() ?>assets/img/hotels/34.png" data-gallery="room-gallery-0">
                                                    <img class="w-100 h-100 object-fit-cover rounded-2" src="<?= base_url() ?>assets/img/hotels/34.png" alt="" />
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?= base_url() ?>assets/img/hotels/35.png" data-gallery="room-gallery-0">
                                                    <img class="w-100 h-100 object-fit-cover rounded-2" src="<?= base_url() ?>assets/img/hotels/35.png" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-5 col-xxl-4 ms-auto">
                                        <div class="card bg-body-highlight">
                                            <div class="card-body">
                                                <ul class="mb-2 list-unstyled d-flex list flex-wrap gap-2">
                                                    <?php
                                                    $amns = json_decode($room['amenities']);
                                                    foreach ($amns as $value): ?>
                                                        <li class="text-body-highlight fs-9 me-1 mb-0 lh-1">
                                                            <span class="fa-solid fa-check text-success me-1"></span><?= $value ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <!-- <a class="fw-bold fs-9" href="#!">Show other amenities </a> -->
                                            </div>
                                        </div>
                                        <div class="d-flex gap-1">
                                            <button class="btn btn-outline-primary w-100 mt-3 book-room" type="submit"
                                                data-hotel-id="<?= esc($hotel['id']); ?>"
                                                data-room-slug="<?= $room['room_slug']; ?>"
                                                data-room-price="<?= esc($room['price']); ?>"
                                                data-room-in="<?= esc($startDate); ?>"
                                                data-room-out="<?= esc($endDate); ?>"
                                                data-room-adults="<?= esc($query['adults']); ?>"
                                                data-room-infants="<?= esc($query['infants']); ?>"
                                                data-room-children="<?= esc($query['children']); ?>">Book now</button>
                                            <a class="btn btn-primary w-100 mt-3 add-to-cart" href="<?= base_url('cart/addroom/' . $room['id']) ?>"
                                                data-room-in="<?= esc($startDate) ?>"
                                                data-room-out="<?= esc($endDate) ?>"
                                                data-room-adults="<?= esc($query['adults'] ?? 1) ?>"
                                                data-room-infants="<?= esc($query['infants'] ?? 0) ?>"
                                                data-room-children="<?= esc($query['children'] ?? 0) ?>">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="card border border-warning">
                                <div class="card-body text-center">
                                    <i class="fas fa-exclamation-triangle text-warning fs-5"></i>
                                    <h6>Can't find any room right now!</h6>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="card border border-warning">
                        <div class="card-body text-center">
                            <i class="fas fa-exclamation-triangle text-warning fs-5"></i>
                            <h6>Can't find any hotel right now!</h6>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- end of .container-->
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('vendors/glightbox/glightbox.min.js'); ?>"> </script>
<script src="<?= base_url('vendors/mapbox-gl/mapbox-gl.js'); ?>"></script>
<script src="<?= base_url('vendors/swiper/swiper-bundle.min.js'); ?>"></script>
<?= $this->include('fronts/user/components/Find-hotel-js'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addToCartBtns = document.querySelectorAll('.add-to-cart');
        if (addToCartBtns) {
            addToCartBtns.forEach(btn => {
                btn.addEventListener('click', async function(e) {
                    e.preventDefault();

                    const dataToSend = {
                        check_in: "<?= $startDate ?? '' ?>",
                        check_out: "<?= $endDate ?? '' ?>",
                        adults: "<?= $query['adults'] ?? 0 ?>",
                        infants: "<?= $query['infants'] ?? 0 ?>",
                        children: "<?= $query['children'] ?? 0 ?>",
                    };

                    const addToSession = await fetch(btn.getAttribute('href'), {
                        method: 'POST',
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify(dataToSend)
                    });

                    const resp = await addToSession.json();


                    if (resp.success) {
                        notyf.open({
                            type: 'success',
                            message: "Room added to cart!"
                        });
                    } else {
                        notyf.open({
                            type: 'error',
                            message: "Failed to add room to cart!"
                        });
                    }
                });
            });
        }

        function getRoomPayload(btn) {
            // prefer dataset, fallback to page-level inputs (if available)
            const hotelId = btn.dataset.hotelId;
            const roomSlug = btn.dataset.roomSlug;
            const roomPrice = btn.dataset.roomPrice;
            const checkIn = btn.dataset.roomIn;
            const checkOut = btn.dataset.roomOut;
            const adults = btn.dataset.roomAdults;
            const infants = btn.dataset.roomInfants;
            const children = btn.dataset.roomChildren;

            return {
                hotelId,
                roomSlug,
                roomPrice,
                checkIn,
                checkOut,
                adults,
                infants,
                children,
            };
        }
        document.addEventListener('click', (e) => {
            const btn = e.target.closest('.book-room');
            if (!btn) return;

            const payload = getRoomPayload(btn);

            const qs = new URLSearchParams(payload).toString();

            // correct URL format
            const url = `<?= base_url('hotel') ?>/${payload.roomSlug}/checkout?${qs}`;

            location.href = url;
        });

    });
</script>
<?= $this->endSection() ?>