<?= $this->extend('fronts/templates/Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="pt-5 pb-9">
    <div class="container-small cart">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if (session()->has('room_cart')): ?>
                    <div class="card mt-3 mt-xl-0">
                        <div class="card-body">
                            <h4 class="mb-3">Cart</h4>
                            <?php foreach (session()->get('room_cart') as $roomId => $item) : ?>
                                <?php
                                $room = $item['room'];
                                $guest = $item['guest_data'];

                                // Calculate nights
                                $nights = (new DateTime($guest['startDate']))->diff(new DateTime($guest['endDate']))->days;

                                // Total
                                $total = $room['price'] * $nights;
                                ?>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <button class="btn p-0 position-absolute end-0 fs-8 mt-n5 me-n2 text-body-tertiary remove-btn" data-id="<?= $roomId ?>">
                                            <span class="fa-solid fa-circle-xmark"></span>
                                        </button>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-between gap-3 mb-4">
                                                    <div>
                                                        <h5 class="text-body-highlight">Room 1</h5>
                                                        <p class="mb-0 text-body-tertiary"><?= $room['room_name'] ?></p>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center g-0 mb-2">
                                                    <div class="col-3">
                                                        <h5 class="text-body text-nowrap mb-0">Check in</h5>
                                                    </div>
                                                    <div class="col-auto"><span class="px-2">:</span></div>
                                                    <div class="col-8">
                                                        <input class="form-control datetimepicker form-icon-input border-y-0 border-start-0 border-start-md py-0 shadow-none border-translucent fs-8 rounded-0" type="text" placeholder="Pick a date" name="date" value="<?= $guest['startDate'] ?>">
                                                    </div>
                                                </div>
                                                <div class="row align-items-center g-0 mb-4">
                                                    <div class="col-3">
                                                        <h5 class="text-body text-nowrap mb-0">Check out</h5>
                                                    </div>
                                                    <div class="col-auto"><span class="px-2">:</span></div>
                                                    <div class="col-8">
                                                        <input class="form-control datetimepicker form-icon-input border-y-0 border-start-0 border-start-md py-0 shadow-none border-translucent fs-8 rounded-0" type="text" placeholder="Pick a date" name="date" value="<?= $guest['endDate'] ?>">
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-wrap gap-2 mb-4">
                                                    <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                                        <span class="fa-solid fa-user fs-9 me-2"></span>
                                                        <span>2 Adults</span>
                                                    </span>
                                                    <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                                        <span class="fa-solid fa-moon fs-9 me-2"></span>
                                                        <span>2 Nights</span>
                                                    </span>
                                                </div>
                                                <div class="d-flex justify-content-between gap-3 mb-4">
                                                    <h4 class="mb-0">Price: <?= $room['price'] ?></h4>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row align-items-center g-0 pb-3 border-bottom border-translucent">
                                                    <div class="col-5">
                                                        <h5 class="mb-0 text-body">Adults</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="input-group gap-2">
                                                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="minus" data-target="adults">
                                                                <span class="fa-solid fa-minus px-1"></span>
                                                            </button>
                                                            <input class="form-control text-center" id="adults" name="adults" type="number" min="1" value="<?= $guest['adults'] ?>">
                                                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="plus" data-target="adults">
                                                                <span class="fa-solid fa-plus px-1"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row align-items-center g-0 py-3 border-bottom border-translucent">
                                                    <div class="col-5">
                                                        <h5 class="mb-0 text-body">Infants</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="input-group gap-2">
                                                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="minus" data-target="infants">
                                                                <span class="fa-solid fa-minus px-1"></span>
                                                            </button>
                                                            <input class="form-control text-center" id="infants" name="infants" type="number" min="0" value="<?= $guest['infants'] ?>">
                                                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="plus" data-target="infants">
                                                                <span class="fa-solid fa-plus px-1"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row align-items-center g-0 pt-3">
                                                    <div class="col-5">
                                                        <h5 class="mb-0 text-body">Children</h5>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="input-group gap-2">
                                                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="minus" data-target="children">
                                                                <span class="fa-solid fa-minus px-1"></span>
                                                            </button>
                                                            <input class="form-control text-center" id="children" name="children" type="number" min="0" value="<?= $guest['children'] ?>">
                                                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="plus" data-target="children">
                                                                <span class="fa-solid fa-plus px-1"></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <!-- <div class="px-4 py-3 bg-body-highlight rounded-2">
                                <div class="d-flex flex-between-center mb-2">
                                    <h6 class="text-body-tertiary fw-semibold">Sub-total</h6>
                                    <h6 class="text-body-highlight fw-semibold">$3,513.40</h6>
                                </div>
                                <div class="d-flex flex-between-center">
                                    <h6 class="text-body-tertiary fw-semibold">Discount</h6>
                                    <h6 class="text-body-tertiary fw-semibold">-$50</h6>
                                </div>
                                <hr />
                                <div class="d-flex flex-between-center">
                                    <h4 class="text-body">Total</h4>
                                    <h4 class="text-body">$000</h4>
                                </div>
                            </div> -->
                            <a class="btn btn-primary mt-3 w-100" href="#!">Proceed with booking</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card border border-warning">
                        <div class="card-body text-center">
                            <i class="fas fa-exclamation-triangle text-warning fs-5"></i>
                            <h4>Your cart is empty.</h4>
                            <button class="btn mt-2" onclick="window.location.reload()">Refresh</button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- end of .container-->
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const removeFCarts = document.querySelectorAll('.remove-btn');
        if (removeFCarts) {
            removeFCarts.forEach(btn => {
                btn.addEventListener('click', async function(e) {
                    e.preventDefault();
                    try {
                        const roomId = btn.dataset.id;
                        const post = await fetch(`<?= base_url('cart/remove/') ?>${roomId}`, {
                            method: "POST"
                        });
                        const resp = await post.json();
                        if (resp.success) {
                            notyf.open({
                                type: 'success',
                                message: resp.message
                            });
                        }
                        if (resp.error) {
                            notyf.open({
                                type: 'error',
                                message: resp.message
                            });
                        }
                    } catch (error) {
                        console.log(`Error : ${error}`);

                    }

                })
            });
        }
    })
</script>
<?= $this->endSection() ?>