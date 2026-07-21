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
                <?php if (!empty($cart)): ?>
                    <div class="card mt-3 mt-xl-0">
                        <div class="card-body" id="cartItems">
                            <h4 class="mb-3">Cart</h4>
                            <?php foreach ($cart['rooms'] as $key => $item): ?>
                                <?php
                                $guests = $item['guests'];
                                $dates = $item['dates'];
                                $checkIn  = $dates['check_in'];
                                $checkOut = $dates['check_out'];

                                $nights = 0;

                                if ($checkIn && $checkOut) {
                                    $nights = (new \DateTime($checkIn))
                                        ->diff(new \DateTime($checkOut))
                                        ->days;
                                }
                                ?>
                                <div class="card mb-3 cart-item" data-room-id="<?= $item['room_id'] ?>">
                                    <div class="card-body">
                                        <button class="btn p-0 position-absolute end-0 fs-8 mt-n5 me-n2 text-body-tertiary remove-btn" data-id="<?= $item['room_id'] ?>">
                                            <span class="fa-solid fa-circle-xmark"></span>
                                        </button>
                                        <div class="d-flex justify-content-between gap-3 mb-4">
                                            <div>
                                                <h5 class="text-body-highlight">Room 1</h5>
                                                <p class="mb-0 text-body-tertiary"><?= $item['name'] ?></p>
                                            </div>
                                            <h4 class="mb-0"><?= setting('currency_method')['symbol'] ?><?= $item['price'] ?> / Night</h4>
                                        </div>
                                        <?php if ($dates['check_in']): ?>
                                            <div class="row align-items-center g-0">
                                                <div class="col-3">
                                                    <h5 class="text-body text-nowrap mb-0">Check in</h5>
                                                </div>
                                                <div class="col-auto"><span class="px-2">:</span></div>
                                                <div class="col-auto"><span><?= $dates['check_in'] ?></span></div>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($dates['check_out']): ?>
                                            <div class="row align-items-center g-0 mb-4">
                                                <div class="col-3">
                                                    <h5 class="text-body text-nowrap mb-0">Check out</h5>
                                                </div>
                                                <div class="col-auto"><span class="px-2">:</span></div>
                                                <div class="col-auto"><span><?= $dates['check_out'] ?></span></div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                                <span class="fa-solid fa-user fs-9 me-1"></span>
                                                <span><?= $guests['adults'] ?> Adults</span>
                                            </span>
                                            <?php if ($guests['children'] > 0): ?>
                                                <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                                    <span class="fa-solid fa-child fs-9 me-1"></span>
                                                    <span><?= $guests['children'] ?> Children</span>
                                                </span>
                                            <?php endif; ?>
                                            <?php if ($guests['infants'] > 0): ?>
                                                <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                                    <span class="fa-solid fa-baby-carriage fs-9 me-1"></span>
                                                    <span><?= $guests['infants'] ?> Infants</span>
                                                </span>
                                            <?php endif; ?>
                                            <?php if ($nights > 0): ?>
                                                <span class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize">
                                                    <span class="fa-solid fa-moon fs-9 me-2"></span>
                                                    <span><?= $nights ?> Night<?= $nights > 1 ? 's' : '' ?></span>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <a class="btn btn-primary mt-3 w-100" href="<?= base_url('rooms/checkout') ?>">Proceed with booking</a>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="card border border-warning">
                        <div class="card-body text-center">
                            <i class="fas fa-exclamation-triangle text-warning fs-5"></i>
                            <h4>Your cart is empty.</h4>
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

        document.addEventListener('click', async function(e) {
            const btn = e.target.closest('.remove-btn');
            if (!btn) return;

            e.preventDefault();

            const roomId = btn.dataset.id;
            const cartItem = btn.closest('.cart-item');
            const cartItemsContainer = document.getElementById('cartItems');
            try {
                const res = await fetch(`<?= base_url('cart/remove/') ?>${roomId}`, {
                    method: "POST",
                    headers: {
                        "Accept": "application/json"
                    }
                });

                const resp = await res.json();

                if (resp.success) {
                    notyf.open({
                        type: 'success',
                        message: resp.message
                    });

                    // REMOVE FROM UI
                    cartItem.remove();

                    // If cart is empty → show empty message
                    if (!cartItemsContainer.querySelector('.cart-item')) {
                        cartItemsContainer.innerHTML = `
                        <div class="card border border-warning">
                            <div class="card-body text-center">
                                <i class="fas fa-exclamation-triangle text-warning fs-5"></i>
                                <h4>Your cart is empty.</h4>
                            </div>
                        </div>
                    `;
                    }
                } else {
                    notyf.open({
                        type: 'error',
                        message: resp.message || 'Failed to remove item'
                    });
                }

            } catch (err) {
                console.error(err);
                notyf.open({
                    type: 'error',
                    message: 'Something went wrong'
                });
            }
        });

    });
</script>

<?= $this->endSection() ?>