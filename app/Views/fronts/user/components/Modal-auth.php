<?php if (!session()->has('user_id')): ?>
    <?php $isHome = trim(uri_string(), '/') === ''; ?>

    <div class="modal fade" tabindex="-1" id="registerModal" data-phoenix-modal='{"autoShow":<?= $isHome ? 'true' : 'false' ?>}' aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body position- p-6">
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
                        <div class="row flex-center">
                            <div class="col-sm-10 col-md-6">
                                <a href="<?= base_url('auth/google') ?>" class="btn btn-phoenix-secondary w-100"><span class="fab fa-google text-danger me-2 fs-9"></span>Sign up with google</a>
                                <div class="position-relative">
                                    <hr class="bg-body-secondary mt-5 mb-4">
                                    <div class="divider-content-center">or</div>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url('register') ?>" method="post" id="registerform">
                            <?= csrf_field(); ?>
                            <div class="d-flex gap-2 align-items-center mb-4">
                                <input class="form-control" type="email" name="email" placeholder="Your email address" required />
                                <button class="btn btn-primary rounded text-nowrap px-sm-6" type="submit">Sign-up</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <a class="fs-9 fw-bold" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModel">Already have an account</a>
                        </div>
                        <p class="mb-1 fs-9 text-body-quaternary">
                            Subscribe for exclusive offers. <a href="#!" target="_blank">Privacy Policy</a>
                        </p>
                        <button class="btn btn-link p-0 fs-10 text-decoration-underline text-body-tertiary" data-bs-dismiss="modal" data-disable-modal-auto-show="data-disable-modal-auto-show" aria-label="Close">Don’t show it again</button>
                    </div>

                    <!-- STEP 2: OTP form (hidden initially) -->
                    <div class="text-center d-none" id="otp-step">
                        <h3 class="mb-2 text-body">Enter the 6-digit code sent to your email</h3>
                        <p class="mb-4 fs-9" id="timer">Time remaining: 03:00</p>

                        <form action="<?= base_url('user/forgot/verify') ?>" method="post" id="verifyotp">
                            <?= csrf_field(); ?>
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
    <div class="modal fade" id="loginModel" tabindex="-1" data-phoenix-modal='{"autoShow":false}' aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-body position- p-6">
                    <div class="position-absolute end-0 top-0">
                        <button class="btn btn-link text-danger px-3" data-bs-dismiss="modal" aria-label="Close">
                            <span class="fa-solid fa-times" data-fa-transform="down-2"></span>
                        </button>
                    </div>
                    <div class="text-center">
                        <!-- <img class="img-fluid mb-2" src="<?= base_url('assets/img/icons/illustrations/shield.png') ?>" width="130" alt="shield" /> -->
                        <h1 class="text-success mb-2">Log in</h1>
                        <div class="row flex-center">
                            <div class="col-sm-10 col-md-6">
                                <a href="<?= base_url('auth/google') ?>" class="btn btn-phoenix-secondary w-100"><span class="fab fa-google text-danger me-2 fs-9"></span>Continue with google</a>
                                <div class="position-relative">
                                    <hr class="bg-body-secondary mt-5 mb-4">
                                    <div class="divider-content-center">or use email</div>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url('login') ?>" method="post" id="loginform">
                            <div class="row flex-center">
                                <div class="col-sm-10 col-md-6">
                                    <div class="mb-3 text-start">
                                        <label class="form-label" for="email">Email address</label>
                                        <div class="form-icon-container">
                                            <input class="form-control form-icon-input" name="email" id="email" type="email" placeholder="name@example.com">
                                            <span class="fas fa-user text-body fs-9 form-icon"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3 text-start">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="form-icon-container" data-password="data-password">
                                            <input class="form-control form-icon-input pe-6" name="password" id="password" type="password" placeholder="Password" data-password-input="data-password-input">
                                            <span class="fas fa-key text-body fs-9 form-icon"></span>
                                            <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" type="button" data-password-toggle="data-password-toggle">
                                                <span class="uil uil-eye show"></span>
                                                <span class="uil uil-eye-slash hide"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row flex-between-center mb-4">
                                        <div class="col-auto">
                                            <div class="form-check mb-0">
                                                <input class="form-check-input" id="basic-checkbox" type="checkbox" name="rememberMe" <?= old('rememberMe') ? 'checked' : '' ?>><label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a class="fs-9 fw-semibold" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#forgotpwdmodal">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100 mb-3" type="submit">Sign In</button>

                                    <div class="text-center">
                                        <a class="fs-9 fw-bold" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#registerModal">Create an account</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button class="d-none" data-bs-dismiss="modal" data-disable-modal-auto-show="data-disable-modal-auto-show" aria-label="Close">Don’t show it again</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="modal fade" id="forgotpwdmodal" tabindex="-1" data-phoenix-modal='{"autoShow":false}' aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body position- p-6">
                <div class="position-absolute end-0 top-0">
                    <button class="btn btn-link text-danger px-3" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fa-solid fa-times" data-fa-transform="down-2"></span>
                    </button>
                </div>
                <div class="text-center" id="f-user">
                    <h1 class="text-success mb-2">Forgot password</h1>
                    <form action="<?= base_url('user/forgot') ?>" method="post" id="forgotpwdform">
                        <div class="row flex-center">
                            <div class="col-sm-10 col-md-6">
                                <div class="mb-3 text-start">
                                    <label class="form-label" for="femail">Email address</label>
                                    <div class="form-icon-container">
                                        <?php if (session()->has('user_id')): ?>
                                            <?php
                                            $userModel = new \App\Models\UserModel();
                                            $user = $userModel->find(session('user_id'));
                                            ?>
                                            <input class="form-control form-icon-input" name="email" id="femail" type="email" placeholder="name@example.com" value="<?= $user['email'] ? $user['email'] : '' ?> " <?= $user['email'] ? 'readonly ' : '' ?>>
                                        <?php else: ?>
                                            <input class="form-control form-icon-input" name="email" id="femail" type="email" placeholder="name@example.com">
                                        <?php endif; ?>
                                        <span class="fas fa-user text-body fs-9 form-icon"></span>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100 mb-3" type="submit">Submit</button>

                                <div class="text-center">
                                    <a class="fs-9 fw-bold" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModel">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <button class="d-none" data-bs-dismiss="modal" data-disable-modal-auto-show="data-disable-modal-auto-show" aria-label="Close">Don’t show it again</button>
                </div>
                <!-- STEP 2: OTP form (hidden initially) -->
                <div class="text-center d-none" id="v-otp-step">
                    <h3 class="mb-2 text-body">Enter the 6-digit code sent to your email</h3>
                    <p class="mb-4 fs-9" id="fptimer">Time remaining: 03:00</p>

                    <form action="<?= base_url('user/forgot/verify') ?>" method="post" id="f-verify-otp">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="email" value="<?= esc($email ?? '') ?>">
                        <div id="f-otp" class="otp-inputs d-flex flex-row justify-content-center mt-2">
                            <?php for ($i = 1; $i <= 6; $i++): ?>
                                <input class="m-2 text-center form-control rounded otp-input" type="number" maxlength="1" />
                            <?php endfor; ?>
                        </div>
                        <div class="my-4">
                            <button id="fpvalidateOtp" class="btn btn-primary rounded text-nowrap px-sm-6">Verify</button>
                            <button id="f-resendBtn" type="button" class="btn btn-outline-primary rounded text-nowrap px-sm-6 ms-2" disabled>Resend email</button>
                        </div>
                    </form>

                    <p class="mb-1 fs-9 text-body-quaternary">
                        Didn't receive the code? Wait or <a href="#!" id="resendLink">resend</a>.
                    </p>
                </div>
                <!-- STEP 2: OTP form (hidden initially) -->
                <div class="text-center d-none" id="n-pwd-step">
                    <form action="<?= base_url('user/reset-password') ?>" method="post" id="newpwd">
                        <div class="row flex-center">
                            <div class="col-sm-10 col-md-6">
                                <div class="mb-3 text-start">
                                    <label class="form-label" for="new-password">New Password</label>
                                    <div class="form-icon-container" data-password="data-password">
                                        <input class="form-control form-icon-input pe-6" name="new-password" id="new-password" type="password" placeholder="Password" data-password-input="data-password-input">
                                        <span class="fas fa-key text-body fs-9 form-icon"></span>
                                        <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" type="button" data-password-toggle="data-password-toggle">
                                            <span class="uil uil-eye show"></span>
                                            <span class="uil uil-eye-slash hide"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-3 text-start">
                                    <label class="form-label" for="re-new-password">Retype New Password</label>
                                    <div class="form-icon-container" data-password="data-password">
                                        <input class="form-control form-icon-input pe-6" name="re-new-password" id="re-new-password" type="password" placeholder="Password" data-password-input="data-password-input">
                                        <span class="fas fa-key text-body fs-9 form-icon"></span>
                                        <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary" type="button" data-password-toggle="data-password-toggle">
                                            <span class="uil uil-eye show"></span>
                                            <span class="uil uil-eye-slash hide"></span>
                                        </button>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100 mb-3" type="submit">Submit</button>
                                <?php if (!session()->has('user_id')): ?>
                                    <div class="text-center">
                                        <a class="fs-9 fw-bold" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModel">Back</a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                    <button class="d-none" data-bs-dismiss="modal" data-disable-modal-auto-show="data-disable-modal-auto-show" aria-label="Close">Don’t show it again</button>
                </div>
            </div>
        </div>
    </div>
</div>