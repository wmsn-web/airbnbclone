<?= $this->extend('fronts/templates/Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link href="<?= base_url('vendors/glightbox/glightbox.min.css'); ?>" rel="stylesheet">
<link href="<?= base_url('vendors/mapbox-gl/mapbox-gl.css'); ?>" rel="stylesheet">
<link href="<?= base_url('vendors/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
$addressParts = [
    $hotel['street_name'] ?? '',
    $hotel['city'] ?? '',
    $hotel['state'] ?? ''
];
$fullAddress = implode(', ', array_filter($addressParts));
$rating = (float)$hotel['rating'];
$ratingColor = "";
$ratingBgColor = "";
if ($rating >= 4) {
    $label = 'Excellent';
    $ratingColor = "text-success";
    $ratingBgColor = "text-bg-success";
} elseif ($rating >= 3) {
    $label = 'Good';
    $ratingColor = "text-primary";
    $ratingBgColor = "text-bg-primary";
} elseif ($rating >= 2) {
    $label = 'Average';
    $ratingColor = "text-warning";
    $ratingBgColor = "text-bg-warning";
} else {
    $label = 'Poor';
    $ratingColor = "text-danger";
    $ratingBgColor = "text-bg-danger";
}
$hPhotos = json_decode($hotel['photos'], true);
function timeConvert($dbTime)
{
    $time = new DateTime($dbTime);
    $fomated = $time->format('h:i A');
    return $fomated;
}
?>
<section class="pt-4 pb-9">
    <div class="container-medium">
        <div class="row g-3">
            <div class="col-12">
                <div class="row g-3 mb-3 align-items-center">
                    <!-- 1st col and if 2 hphoto then same as this-->
                    <div class="col-md-6">
                        <h1 class="mb-2 fw-semibold"><?= $hotel['property_name'] ?></h1>
                        <h5 class="mb-2 text-nowrap">
                            <span class="text-body-tertiary me-2 fw-normal">Rated</span>
                            <span class="<?= $ratingColor; ?> me-2"><?= $label; ?></span>
                            <span class="badge <?= $ratingBgColor; ?>"><?= $hotel['rating']; ?></span>
                        </h5>
                        <div class="mb-2">
                            <a class="text-body-tertiary" href="#!">
                                <span class="fa-solid fa-map-marker-alt me-2 text-body"></span>
                                <?= $fullAddress; ?>
                            </a>
                        </div>
                        <?php if ($hotel['phone']): ?>
                            <div class="mb-1">
                                <a class="text-body-tertiary" href="tel:+910123456789">
                                    <span class="fa-solid fa-phone me-2 text-body"></span>
                                    <?= $hotel['phone']; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($hotel['email']): ?>
                            <div class="mb-1">
                                <a class="text-body-tertiary" href="mailto:sales.dhaka@radisson.com">
                                    <span class="fa-solid fa-envelope me-2 text-body" data-fa-transform="down-1"></span>
                                    <?= $hotel['email']; ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="">
                            <a class="btn btn-phoenix-primary px-5 px-lg-8 w-100 w-md-auto" href="#!">
                                <span class="fa-solid fa-map me-2"></span>Show in map</a>
                        </div>
                    </div>
                    <?php
                    $photos = !empty($hotel['photos']) ? json_decode($hotel['photos'], true) : [];
                    $total = count($photos);
                    $imgUrl = base_url('image/hotel_gallery/' . $hotel['id'] . '/');
                    ?>
                    <div class="col-6 d-none d-md-block">
                        <div class="row g-3">

                            <?php if ($total >= 1): ?>
                                <!-- First Photo -->
                                <div class="col-12">
                                    <a href="<?= $imgUrl . $photos[0] ?>" data-gallery="hotel-details-gallery">
                                        <img class="w-100 object-fit-cover rounded-2" src="<?= $imgUrl . $photos[0] ?>" alt="" height="200" />
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php if ($total >= 2): ?>
                                <!-- Second Photo -->
                                <div class="col-6">
                                    <a href="<?= $imgUrl . $photos[1] ?>" data-gallery="hotel-details-gallery">
                                        <img class="img-fluid rounded-2" src="<?= $imgUrl . $photos[1] ?>" alt="" />
                                    </a>
                                </div>
                            <?php endif; ?>

                            <?php if ($total == 3): ?>
                                <!-- Third Photo -->
                                <div class="col-6">
                                    <a href="<?= $imgUrl . $photos[2] ?>" data-gallery="hotel-details-gallery">
                                        <img class="img-fluid rounded-2" src="<?= $imgUrl . $photos[2] ?>" alt="" />
                                    </a>
                                </div>

                            <?php elseif ($total > 3): ?>
                                <!-- Third Photo but shaded with "Show All" -->
                                <div class="col-6">
                                    <div class="position-relative rounded-2 overflow-hidden">
                                        <a href="<?= $imgUrl . $photos[2] ?>" data-gallery="hotel-details-gallery">
                                            <img class="w-100 h-md-100 object-fit-cover" src="<?= $imgUrl . $photos[2] ?>" alt="" />
                                        </a>
                                        <div class="position-absolute w-100 h-100 left-0 top-0 d-flex flex-center bg-black bg-opacity-50">
                                            <a class="text-white stretched-link" href="<?= base_url('hotel/gallery/' . $hotel['id']) ?>">Show all</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
                <div class="scrollbar mt-5 mb-3 pb-3">
                    <ul class="nav nav-pills flex-nowrap" data-tab-map-container="data-tab-map-container" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="pills-availability-tab" data-bs-toggle="pill" data-bs-target="#pills-availability" type="button" role="tab" aria-controls="pills-availability" aria-selected="true">
                                Availability
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-description-tab" data-bs-toggle="pill" data-bs-target="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item"><button class="nav-link" id="pills-policy-tab" data-bs-toggle="pill" data-bs-target="#pills-policy" type="button" role="tab" aria-controls="pills-policy" aria-selected="true">Policy</button></li>
                        <li class="nav-item">
                            <button class="nav-link" id="pills-facilities-tab" data-bs-toggle="pill" data-bs-target="#pills-facilities" type="button" role="tab" aria-controls="pills-facilities" aria-selected="true">Facilities</button>
                        </li>
                        <li class="nav-item"><button class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" data-bs-target="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="true">Reviews</button></li>
                    </ul>
                </div>
                <div class="tab-content" id="hotel-details-tab-content">
                    <div class="tab-pane fade show active" id="pills-availability" role="tabpanel" aria-labelledby="pills-availability-tab" tabindex="0">
                        <h3 class="mb-3 fw-bold">Availability</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-sm-6 col-lg-3">
                                        <label class="fw-bold text-body-tertiary mb-1" for="checkIn">Check in</label>
                                        <div class="form-icon-container flatpickr-input-container">
                                            <input class="form-control form-icon-input datetimepicker" id="checkIn" type="text" name="checkIn" placeholder="<?= date('Y/m/d') ?>" value="<?= date('Y/m/d') ?>" />
                                            <span class="fa-solid fa-calendar text-body fs-9 form-icon"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-3">
                                        <label class="fw-bold text-body-tertiary mb-1" for="checkOut">Check out</label>
                                        <div class="form-icon-container flatpickr-input-container">
                                            <input class="form-control form-icon-input datetimepicker" id="checkOut" type="text" name="checkOut" placeholder="<?= date('Y/m/d') ?>" value="<?= date('Y/m/d') ?>" />
                                            <span class="fa-solid fa-calendar text-body fs-9 form-icon"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-lg-2">
                                        <label class="fw-bold text-body-tertiary mb-1">Adults</label>
                                        <div class="input-group gap-2" data-quantity="data-quantity">
                                            <button class="btn btn-phoenix-primary rounded px-3" data-type="minus">
                                                <span class="fa-solid fa-minus"></span>
                                            </button>
                                            <input class="form-control border-translucent input-spin-none text-center rounded" id="adult" type="number" value="2" min="1" />
                                            <button class="btn btn-phoenix-primary rounded px-3" data-type="plus">
                                                <span class="fa-solid fa-plus"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-lg-2">
                                        <label class="fw-bold text-body-tertiary mb-1">Infants</label>
                                        <div class="input-group gap-2" data-quantity="data-quantity">
                                            <button class="btn btn-phoenix-primary rounded px-3" data-type="minus">
                                                <span class="fa-solid fa-minus"></span>
                                            </button>
                                            <input class="form-control border-translucent input-spin-none text-center rounded" id="infants" type="number" value="0" min="0" />
                                            <button class="btn btn-phoenix-primary rounded px-3" data-type="plus">
                                                <span class="fa-solid fa-plus"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-lg-2">
                                        <label class="fw-bold text-body-tertiary mb-1">Children</label>
                                        <div class="input-group gap-2" data-quantity="data-quantity">
                                            <button class="btn btn-phoenix-primary rounded px-3" data-type="minus">
                                                <span class="fa-solid fa-minus"></span>
                                            </button>
                                            <input class="form-control border-translucent input-spin-none text-center rounded" id="children" type="number" value="0" min="0" />
                                            <button class="btn btn-phoenix-primary rounded px-3" data-type="plus">
                                                <span class="fa-solid fa-plus"></span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="d-none col-sm-auto ms-auto align-self-end ">
                                        <button class="btn btn-primary w-100">Update Results</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (!empty($rooms)): ?>
                            <?php foreach ($rooms as $room): ?>
                                <hr class="my-6" />
                                <div class="row g-3 mb-4">
                                    <div class="col-lg-8 col-xxl-7">
                                        <div class="row flex-lg-nowrap g-3 mb-2">
                                            <div class="col-md-auto">
                                                <h4 class="mb-0 fw-semibold"><span class="fa-solid fa-circle fs-9 text-body-quaternary me-2" data-fa-transform="up-1"></span><?= $room['room_name'] ?></h4>
                                            </div>
                                            <div class="col-md-auto d-flex align-items-center">
                                                <div class="vr bg-body-secondary me-3 d-none d-md-block"></div>
                                                <span class="fa-solid fa-bed text-primary fs-9 me-1"></span><span class="fa-solid fa-bed text-primary fs-9"></span>
                                                <div class="vr bg-body-secondary mx-3"></div>
                                                <span class="fa-solid fa-user text-primary fs-9 me-1"></span><span class="fa-solid fa-user text-primary fs-9"></span>
                                                <div class="vr bg-body-secondary mx-3"></div>
                                                <span class="fa-solid fa-mug-saucer text-primary fs-9"></span>
                                                <div class="vr bg-body-secondary mx-3"></div>
                                                <span class="badge badge-phoenix badge-phoenix-info">10% OFF</span>
                                            </div>
                                        </div>
                                        <p class="mb-0"><?= $room['description'] ?></p>
                                    </div>
                                    <div class="col-lg-4 col-xxl-5">
                                        <?php
                                        $cm = setting('currency_method');
                                        $symbol = $cm['symbol'] ?>
                                        <h3 class="mb-2 d-flex align-items-center justify-content-lg-end gap-2"><span class="fs-9 text-body-quaternary fw-normal text-decoration-line-through"><?= $symbol ?>1,456.65</span><?= $symbol ?><?= $room['price'] ?></h3>
                                        <h5 class="text-body text-lg-end fw-normal">+<?= $symbol ?>123 for tax and fees</h5>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-lg-7">
                                        <div class="row gx-2 h-100">
                                            <div class="col-4">
                                                <a href="<?= base_url() ?>assets/img/hotels/33.png" data-gallery="room-gallery-0"><img class="w-100 h-100 object-fit-cover rounded-2" src="<?= base_url() ?>assets/img/hotels/33.png" alt="" /></a>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?= base_url() ?>assets/img/hotels/34.png" data-gallery="room-gallery-0"><img class="w-100 h-100 object-fit-cover rounded-2" src="<?= base_url() ?>assets/img/hotels/34.png" alt="" /></a>
                                            </div>
                                            <div class="col-4">
                                                <a href="<?= base_url() ?>assets/img/hotels/35.png" data-gallery="room-gallery-0"><img class="w-100 h-100 object-fit-cover rounded-2" src="<?= base_url() ?>assets/img/hotels/35.png" alt="" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-xl-5 col-xxl-4 ms-auto">
                                        <div class="card bg-body-highlight">
                                            <div class="card-body">
                                                <ul class="mb-2 list-unstyled d-flex list flex-wrap gap-2">
                                                    <?php
                                                    $roomAms = json_decode($room['amenities']);
                                                    foreach ($roomAms as $value): ?>
                                                        <li class="text-body-highlight fs-9 me-1 mb-0 lh-1">
                                                            <span class="fa-solid fa-check text-success me-1"></span><?= $value ?>
                                                        </li>
                                                    <?php endforeach; ?>

                                                </ul>
                                                <a class="fw-bold fs-9" href="#!">Show other amenities </a>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-3">
                                            <button class="btn btn-outline-primary w-100 mt-3 book-room"
                                                data-hotel-name="<?= esc($hotel['property_name_slug']); ?>"
                                                data-room-id="<?= $room['id']; ?>"
                                                data-room-slug="<?= esc($room['room_slug']); ?>"
                                                data-room-price="<?= esc($room['price']); ?>"

                                                data-hotel-id="<?= esc($hotel['id']); ?>"
                                                data-room-id="<?= $room['id']; ?>"
                                                data-room-price="<?= esc($room['price']); ?>">Book room</button>
                                            <a class="btn btn-primary w-100 mt-3 add-to-cart" href="<?= base_url('cart/addroom/' . $room['id']) ?>">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab" tabindex="0">
                        <?php if ($hotel['description']): ?>
                            <h3 class="mb-3 fw-bold">Description</h3>
                            <p class="text-body">
                                <?= $hotel['description']; ?>
                            </p>
                        <?php endif; ?>
                        <div class="p-3 border bg-body-highlight border-translucent rounded-2 d-flex flex-between-center flex-wrap gap-3">
                            <h5 class="mb-0"><span class="text-body-tertiary fw-normal">Number of rooms : </span><?= count($rooms) ?></h5>
                            <!-- <h5 class="mb-0"><span class="text-body-tertiary fw-normal">Number of floors : </span>14</h5>
                            <h5 class="mb-0"><span class="text-body-tertiary fw-normal">Construction year : </span>2018</h5> -->
                        </div>
                        <?php if ($hotel['longitude'] && $hotel['latitude']): ?>
                            <div class="card bg-body mt-5">
                                <div class="card-body">
                                    <div class="mapbox-container rounded-2 border border-translucent mb-4">
                                        <div id="mapbox" data-mapbox='{"attributionControl":false,"center":[<?= $hotel['longitude'] ?>,<?= $hotel['latitude'] ?>],"zoom":14,"scrollZoom":false}' style="height: 300px; width: 100%;"></div>
                                    </div>
                                    <!-- <p class="mb-2 text-body-tertiary text-uppercase"><span class="fa-solid fa-map-marker-alt text-body-emphasis me-2"></span>Museum</p>
                                    <h5>1.5 km <span class="text-body-tertiary fw-normal">from </span>Museum of Liberation War, Dhaka</h5>
                                    <hr class="my-4" />
                                    <p class="mb-2 text-body-tertiary text-uppercase"><span class="fa-solid fa-map-marker-alt text-body-emphasis me-2"></span>Historical monument</p>
                                    <h5>3.5 km <span class="text-body-tertiary fw-normal">from </span>Lalbagh Kella</h5> -->
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="tab-pane fade" id="pills-policy" role="tabpanel" aria-labelledby="pills-policy-tab" tabindex="0">
                        <h3 class="mb-5">Policy</h3>
                        <?php if ($hotel['ci_start_time'] && $hotel['ci_end_time']): ?>

                            <div class="card bg-body-highlight mb-3">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-sm-3">
                                            <h5 class="mb-0"><span class="fa-solid fa-clock fs-9 me-1" data-fa-transform="up-1"></span>Check in</h5>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="progress overflow-visible" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="height: 8px;">
                                                <div class="progress-bar position-relative ms-auto overflow-visible rounded" style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="d-flex flex-between-center w-100">
                                                <span class="text-info text-body fs-10 mt-1"><?= timeConvert($hotel['ci_start_time']); ?></span>
                                                <span class="text-info text-body fs-10 mt-1"><?= timeConvert($hotel['ci_end_time']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($hotel['co_before']): ?>
                            <div class="card bg-body-highlight mb-3">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-sm-3">
                                            <h5 class="mb-0"><span class="fa-solid fa-clock fs-9 me-1" data-fa-transform="up-1"></span>Check out</h5>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="progress overflow-visible" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 8px;">
                                                <div class="progress-bar position-relative overflow-visible rounded" style="width: 100%;"></div>
                                            </div>
                                            <div class="d-flex flex-between-center w-100">
                                                <span class="text-info text-body fs-10 mt-1"><?= timeConvert($hotel['co_before']); ?></span>
                                                <span class="text-info text-body fs-10 mt-1"><?= timeConvert($hotel['co_before']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($hotel['age_segments'])):
                            $ageSeg = json_decode($hotel['age_segments'], true);
                        ?>
                            <div class="card bg-body-highlight mb-3">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-sm-3">
                                            <h5 class="mb-0"><span class="fa-solid fa-baby fs-9 me-1" data-fa-transform="up-1"></span>Baby policy</h5>
                                        </div>
                                        <div class="col-sm-9">
                                            <h5 class="mb-2 text-success">Allowed</h5>
                                            <p class="mb-0 text-body">
                                                Allowed
                                                <?php foreach ($ageSeg as $seg): ?>
                                                    Allowed child age <?= $seg['from'] ?> to <?= $seg['to'] ?> - <?= $seg['policy'] . ' price' ?? '' ?><br>
                                                <?php endforeach; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="card bg-body-highlight mb-3">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-5 col-sm-3">
                                        <h5 class="mb-0"><span class="fa-solid fa-paw fs-9 me-1" data-fa-transform="up-1"></span>Pet policy</h5>
                                    </div>
                                    <div class="col-7 col-sm-9">
                                        <?php if ($hotel['pet_policy_type'] > 0) : ?>
                                            <h5 class="mb-0 text-success">Allowed</h5>
                                        <?php else: ?>
                                            <h5 class="mb-0 text-warning">Not Allowed</h5>
                                        <?php endif; ?>
                                        <?php if ($hotel['pet_additional_charges'] > 0) : ?>
                                            <p class="mb-0 text-body">
                                                Additional charges applicable
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card bg-body-highlight">
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-5 col-sm-3">
                                        <h5 class="mb-0"><span class="fa-solid fa-credit-card fs-9 me-1" data-fa-transform="up-1"></span>Payment</h5>
                                    </div>
                                    <div class="col-7 col-sm-9">
                                        <?php if ($hotel['card_payment']): ?>
                                            <img class="me-3" src="<?= base_url('assets/img/logos/mastercard.png') ?>" alt="" />
                                            <img class="me-3" src="<?= base_url('assets/img/logos/american_express.png') ?>" alt="" />
                                            <img class="me-3" src="<?= base_url('assets/img/logos/visa.png') ?>" alt="" />
                                        <?php endif; ?>

                                        <?php if ($hotel['online_payment']): ?>
                                            <img class="me-3" src="<?= base_url('assets/img/logos/upi-icon.png') ?>" alt="" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-facilities" role="tabpanel" aria-labelledby="pills-facilities-tab" tabindex="0">
                        <?php
                        /**
                         * Facilities Tab – Optimized Full Version
                         */

                        // Decode hotel amenities
                        $hotelAmenities = json_decode($hotel['amenities'], true);

                        // ICON MAP (extend as needed)
                        $iconMap = [
                            'wifi' => 'fa-wifi',
                            'parking' => 'fa-square-parking',
                            'breakfast' => 'fa-utensils',
                            'restaurant' => 'fa-utensils',
                            'room_service' => 'fa-bell-concierge',
                            'airport_shuttle' => 'fa-car',
                            'pet_friendly' => 'fa-dog',
                            'bar' => 'fa-wine-glass',
                            'beach_front' => 'fa-umbrella-beach',
                            'disabled_facilities' => 'fa-wheelchair',
                        ];

                        // FINAL processed array
                        $finalAmenities = [];

                        foreach ($amenities as $catData) {

                            $categoryName = $catData['category'];

                            // Structure
                            $finalAmenities[$categoryName] = [
                                'free' => [],
                                'paid' => [],
                            ];

                            foreach ($catData['amenities'] as $am) {

                                $slug = $am->am_slug;

                                if (isset($hotelAmenities[$slug])) {

                                    $type = $hotelAmenities[$slug]['type'];

                                    if ($type === 'free') {
                                        $finalAmenities[$categoryName]['free'][] = [
                                            'name' => $am->am_name,
                                            'slug' => $slug
                                        ];
                                    }

                                    if ($type === 'paid') {
                                        $finalAmenities[$categoryName]['paid'][] = [
                                            'name' => $am->am_name,
                                            'slug' => $slug
                                        ];
                                    }
                                }
                            }
                        }
                        ?>

                        <h3 class="mb-5 fw-bold">Facilities</h3>

                        <!-- ====================== FREE AMENITIES (GRID) ====================== -->
                        <h5 class="mb-3">Most popular</h5>

                        <div class="row g-0">
                            <?php foreach ($finalAmenities as $cat => $types): ?>
                                <?php foreach ($types['free'] as $am): ?>
                                    <?php
                                    $slug = $am['slug'];
                                    $icon = $iconMap[$slug] ?? 'fa-check';
                                    ?>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="d-flex align-items-center gap-2 px-4 py-3 h-100 border-translucent border">
                                            <span class="fs-9 text-warning fa-solid <?= $icon ?>"></span>
                                            <h5 class="text-body-tertiary mb-0 fw-normal"><?= esc($am['name']) ?></h5>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        </div>

                        <!-- ====================== PAID AMENITIES ====================== -->
                        <h6 class="text-warning text-uppercase fw-normal my-5">
                            <span class="me-2">*</span>ADDITIONAL CHARGES
                        </h6>

                        <div class="row g-3">

                            <?php foreach ($finalAmenities as $category => $types): ?>
                                <?php if (empty($types['paid'])) continue; ?>

                                <div class="col-auto col-md-4">

                                    <h5 class="mb-3">
                                        <?php
                                        $catSlug = strtolower(str_replace(' ', '_', $category));
                                        $categoryIcon = $iconMap[$catSlug] ?? 'fa-circle-info';
                                        ?>
                                        <span class="fs-9 me-2 fa-solid <?= $categoryIcon ?>"></span>
                                        <?= esc($category) ?>
                                    </h5>

                                    <ul class="list-unstyled mb-5">
                                        <?php foreach ($types['paid'] as $am): ?>
                                            <li class="text-body-highlight">
                                                <span class="fa-solid fa-check fs-9 text-success me-2"></span>
                                                <?= esc($am['name']) ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>

                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">
                        <h3 class="mb-5">Reviews</h3>
                        <div class="row gx-md-6 gx-xl-8 gy-2">
                            <div class="col-md-6 col-lg-5">
                                <div class="row align-items-center g-0">
                                    <div class="col-4">
                                        <h5 class="mb-0 text-body text-nowrap">Staff</h5>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge text-bg-primary fs-8">4.0</span>
                                            <div class="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="row align-items-center g-0">
                                    <div class="col-4">
                                        <h5 class="mb-0 text-body text-nowrap">Comfort</h5>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge text-bg-primary fs-8">4.0</span>
                                            <div class="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="row align-items-center g-0">
                                    <div class="col-4">
                                        <h5 class="mb-0 text-body text-nowrap">Facilities</h5>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge text-bg-primary fs-8">4.5</span>
                                            <div class="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded" style="width: 90%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="row align-items-center g-0">
                                    <div class="col-4">
                                        <h5 class="mb-0 text-body text-nowrap">Location</h5>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge text-bg-primary fs-8">3.5</span>
                                            <div class="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded" style="width: 70%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="row align-items-center g-0">
                                    <div class="col-4">
                                        <h5 class="mb-0 text-body text-nowrap">Cleanliness</h5>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge text-bg-primary fs-8">4.8</span>
                                            <div class="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded" style="width: 96%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5">
                                <div class="row align-items-center g-0">
                                    <div class="col-4">
                                        <h5 class="mb-0 text-body text-nowrap">Free WiFi</h5>
                                    </div>
                                    <div class="col-8">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="badge text-bg-primary fs-8">5.0</span>
                                            <div class="progress w-100" role="progressbar" aria-label="review" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar rounded" style="width: 100%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5 mb-8" />
                        <div class="d-flex align-items-center position-relative gap-2 mb-3">
                            <div class="avatar avatar-s">
                                <!-- <img class="rounded-circle" src="<?= base_url() ?>assets/img/team/59.webp" alt="" /> -->
                            </div>
                            <a class="fw-semibold text-body-emphasis stretched-link" href="#!">Navina Koothrapali</a><img src="<?= base_url() ?>assets/img/country/india.png" alt="" />
                        </div>
                        <div class="d-flex align-items-center flex-wrap gap-5 mb-5">
                            <div class="d-flex align-items-center gap-4">
                                <div class="border-end pe-4"><span class="badge text-bg-primary fs-8">4.5</span></div>
                                <a class="text-body-tertiary" href="#!"><span class="fa-solid fa-bed me-2 fs-9"></span>Single Room with Private Bathroom</a>
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <h5 class="fw-normal text-body-tertiary"><span class="fa-solid fa-calendar me-2 fs-9"></span>January, 2023</h5>
                                <h5 class="fw-normal text-body-tertiary"><span class="fa-solid fa-user me-2 fs-9"></span>Solo traveler</h5>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-5">
                            <span class="fa-solid fa-thumbs-up text-success" data-fa-transform="down-5"></span>
                            <p class="mb-0">
                                The amazing facilities at this hotel just left me speechless. Modern and equipped with everything I needed to maintain my workout schedule while on vacation, the fitness center was state-of-the-art. Another highlight
                                was the indoor pool, which had crystal-clear water and lots of lounge couches for relaxation.
                            </p>
                        </div>
                        <div class="d-flex gap-3 mb-5">
                            <span class="fa-solid fa-thumbs-down text-body-quaternary" data-fa-transform="down-5"></span>
                            <p class="mb-0">It is necessary to provide some amenities for guests, such as drinking water and toothpaste.</p>
                        </div>
                        <div class="card bg-body-highlight">
                            <div class="card-body">
                                <h6 class="mb-2 fw-bolder text-body-quaternary text-uppercase"><span class="fa-solid fa-reply me-2"></span>Hotel's Reply:</h6>
                                <p class="mb-0">Thank you for choosing us. We will try to improve accordingly.</p>
                            </div>
                        </div>
                        <hr class="mt-8 mb-8" />
                        <div class="d-flex align-items-center position-relative gap-2 mb-3">
                            <div class="avatar avatar-s">
                                <!-- <img class="rounded-circle" src="<?= base_url() ?>assets/img/team/58.webp" alt="" /> -->
                            </div>
                            <a class="fw-semibold text-body-emphasis stretched-link" href="#!">Weston Ryan</a><img src="<?= base_url() ?>assets/img/country/norway.png" alt="" />
                        </div>
                        <div class="d-flex align-items-center flex-wrap gap-5 mb-5">
                            <div class="d-flex align-items-center gap-4">
                                <div class="border-end pe-4"><span class="badge text-bg-primary fs-8">3.5</span></div>
                                <a class="text-body-tertiary" href="#!"><span class="fa-solid fa-bed me-2 fs-9"></span>Double Room with Private Bathroom</a>
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <h5 class="fw-normal text-body-tertiary"><span class="fa-solid fa-calendar me-2 fs-9"></span>February, 2023</h5>
                                <h5 class="fw-normal text-body-tertiary"><span class="fa-solid fa-user me-2 fs-9"></span>Couple traveler</h5>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-5">
                            <span class="fa-solid fa-thumbs-up text-success" data-fa-transform="down-5"></span>
                            <p class="mb-0">
                                The amenities at this hotel were excellent during my most recent time there. The gym was up-to-date and well-stocked, allowing me to continue my exercise regimen while I was away from home. The spa was another
                                noteworthy aspect that offered a restful and revitalising experience.
                            </p>
                        </div>
                        <div class="d-flex gap-3 mb-5">
                            <span class="fa-solid fa-thumbs-down text-body-quaternary" data-fa-transform="down-5"></span>
                            <p class="mb-0">It was a letdown to stay at this motel. Small, out-of-date, and lacking in comforts, the room. The staff was unwelcoming.</p>
                        </div>
                        <div class="card bg-body-highlight">
                            <div class="card-body">
                                <h6 class="mb-2 fw-bolder text-body-quaternary text-uppercase"><span class="fa-solid fa-reply me-2"></span>Hotel's Reply:</h6>
                                <p class="mb-0">Thank you for choosing us. We will try to improve accordingly.</p>
                            </div>
                        </div>
                        <hr class="mt-8 mb-8" />
                        <div class="d-flex align-items-center position-relative gap-2 mb-3">
                            <div class="avatar avatar-s">
                                <img class="rounded-circle" src="<?= base_url() ?>assets/img/team/30.webp" alt="" />
                            </div>
                            <a class="fw-semibold text-body-emphasis stretched-link" href="#!">Travis Adams</a><img src="<?= base_url() ?>assets/img/country/canada.png" alt="" />
                        </div>
                        <div class="d-flex align-items-center flex-wrap gap-5 mb-5">
                            <div class="d-flex align-items-center gap-4">
                                <div class="border-end pe-4"><span class="badge text-bg-primary fs-8">4.6</span></div>
                                <a class="text-body-tertiary" href="#!"><span class="fa-solid fa-bed me-2 fs-9"></span>Single Room with Private Bathroom</a>
                            </div>
                            <div class="d-flex align-items-center gap-5">
                                <h5 class="fw-normal text-body-tertiary"><span class="fa-solid fa-calendar me-2 fs-9"></span>March, 2023</h5>
                                <h5 class="fw-normal text-body-tertiary"><span class="fa-solid fa-user me-2 fs-9"></span>Solo traveler</h5>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-5">
                            <span class="fa-solid fa-thumbs-up text-success" data-fa-transform="down-5"></span>
                            <p class="mb-0">
                                At this hotel, I had a fantastic time! The amenities were excellent, including a lovely pool, a cutting-edge gym, and a soothing spa. Also, the staff went above and beyond to make sure my stay was nice. They were
                                really friendly. My stay was made comfortable and enjoyable by the room's size, comfort, and facilities. Also, the on-site restaurant was outstanding, with delectable fare and first-rate service.
                            </p>
                        </div>
                        <div class="d-flex gap-3 mb-5">
                            <span class="fa-solid fa-thumbs-down text-body-quaternary" data-fa-transform="down-5"></span>
                            <p class="mb-0">Due to the uncleanliness and subpar treatment, I was quite dissatisfied with my stay at this hotel.</p>
                        </div>
                        <div class="card bg-body-highlight">
                            <div class="card-body">
                                <h6 class="mb-2 fw-bolder text-body-quaternary text-uppercase"><span class="fa-solid fa-reply me-2"></span>Hotel's Reply:</h6>
                                <p class="mb-0">Sorry for the inconvenience. We'll investigate.</p>
                            </div>
                        </div>
                        <hr class="mt-8 mb-0" />
                        <button class="btn bg-body border-translucent text-body-quaternary fw-bolder mt-n4">Show 2 more replies</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('vendors/glightbox/glightbox.min.js'); ?>"> </script>
<script src="<?= base_url('vendors/mapbox-gl/mapbox-gl.js'); ?>"></script>
<script src="<?= base_url('vendors/swiper/swiper-bundle.min.js'); ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        flatpickr('.datetimepicker', {
            mode: "single",
            dateFormat: "Y/m/d",
            disableMobile: true,
            minDate: "today",
            maxDate: new Date().fp_incr(180),
            monthSelectorType: "static",
            yearSelectorType: "static"
        });
        const addToCartBtns = document.querySelectorAll('.add-to-cart');

        if (!addToCartBtns.length) return;

        const getValue = (id, fallback = '') =>
            document.getElementById(id)?.value || fallback;

        addToCartBtns.forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.preventDefault();

                const payload = {
                    check_in: getValue('checkIn'),
                    check_out: getValue('checkOut'),
                    adults: getValue('adult') || parseInt(getValue('adult', 1), 10),
                    children: getValue('children') || parseInt("<?= $query['children'] ?? 0 ?>", 10),
                    infants: getValue('infants') || parseInt("<?= $query['infants'] ?? 0 ?>", 10),
                };
                console.log(payload);

                // Basic validation
                if (!payload.check_in || !payload.check_out) {
                    notyf.open({
                        type: 'error',
                        message: 'Please select check-in and check-out dates'
                    });
                    return;
                }

                try {
                    const response = await fetch(btn.href, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify(payload),
                    });

                    const result = await response.json();

                    if (result.success) {
                        notyf.open({
                            type: 'success',
                            message: result.message || 'Room added to cart!'
                        });
                    } else {
                        throw new Error(result.message || 'Add to cart failed');
                    }
                } catch (error) {
                    console.error(error);
                    notyf.open({
                        type: 'error',
                        message: error.message || 'Something went wrong'
                    });
                }
            });
        });

        function getRoomPayload(btn) {
            // prefer dataset, fallback to page-level inputs (if available)
            const hotelId = btn.dataset.hotelId;
            const roomId = btn.dataset.roomId;
            const roomSlug = btn.dataset.roomSlug;
            const roomPrice = btn.dataset.roomPrice;
            const checkIn = getValue('checkIn');
            const checkOut = getValue('checkOut');
            const adults = getValue('adult');
            const infants = getValue('infants');
            const children = getValue('children');



            return {
                hotelId,
                roomId,
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
            if (!payload.checkIn || !payload.checkOut) {
                notyf.open({
                    type: 'error',
                    message: 'Please select check-in and check-out dates'
                });
                return;
            }
            const qs = new URLSearchParams(payload).toString();

            // correct URL format
            const url = `<?= base_url('hotel') ?>/${payload.roomSlug}/checkout?${qs}`;

            location.href = url;
        });
    });
</script>

<?= $this->endSection() ?>