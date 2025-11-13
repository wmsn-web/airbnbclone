<div class="modal fade" id="hotelPromoModal" data-phoenix-modal='{"autoShow":true}' tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body position-relative p-6">
                <div class="position-absolute end-0 top-0">
                    <button class="btn btn-link text-danger px-3" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fa-solid fa-times" data-fa-transform="down-2"></span>
                    </button>
                </div>

                <!-- STEP 1: Register form -->
                <div class="text-center" id="register-step">
                    <img class="img-fluid mb-4" src="<?= base_url() ?>assets/img/spot-illustrations/44.png" width="130" alt="" />
                    <h1 class="text-success">Save 20%</h1>
                    <h3 class="mb-2 text-body">on your first booking - Join now!</h3>
                    <p class="mb-4 fs-9">Sign up now to save up to 20% on rooms with our free membership program!</p>

                    <form action="<?= route_to('user.register.post') ?>" method="post" id="registerform">
                        <?= csrf_field(); ?>
                        <div class="d-flex gap-2 align-items-center mb-4">
                            <input class="form-control" type="email" name="email" placeholder="Your email address" required />
                            <button class="btn btn-primary rounded text-nowrap px-sm-6" type="submit">Sign-up</button>
                        </div>
                    </form>

                    <p class="mb-1 fs-9 text-body-quaternary">
                        Subscribe for exclusive offers. <a href="#!" target="_blank">Privacy Policy</a>
                    </p>
                </div>

                <!-- STEP 2: OTP form (hidden initially) -->
                <div class="text-center d-none" id="otp-step">
                    <h3 class="mb-2 text-body">Enter the 6-digit code sent to your email</h3>
                    <p class="mb-4 fs-9" id="timer">Time remaining: 03:00</p>

                    <form action="<?= route_to('user.otp.verify.post') ?>" method="post" id="verifyotp">
                        <input type="hidden" name="email" value="<?= esc($email ?? '') ?>">
                        <div id="otp" class="otp-inputs d-flex flex-row justify-content-center mt-2">
                            <?php for ($i = 1; $i <= 6; $i++): ?>
                                <input class="m-2 text-center form-control rounded otp-input" type="number" maxlength="1" />
                            <?php endfor; ?>
                        </div>
                        <div class="my-4">
                            <button id="validateBtn" class="btn btn-primary rounded text-nowrap px-sm-6">Validate</button>
                            <button id="resendBtn" type="button" class="btn btn-outline-primary rounded text-nowrap px-sm-6 ms-2" disabled>Resend email</button>
                        </div>
                    </form>

                    <p class="mb-1 fs-9 text-body-quaternary">
                        Didn't receive the code? Wait or <a href="#!" id="resendLink">resend</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>