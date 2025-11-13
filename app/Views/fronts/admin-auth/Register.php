<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3"><a
                class="d-flex flex-center text-decoration-none mb-4" href="../../../index-2.html">
                <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block"><img
                        src="../../../assets/img/icons/logo.png" alt="phoenix" width="58" /></div>
            </a>
            <div class="text-center mb-4">
                <h3 class="text-body-highlight">Sign Up</h3>
                <p class="text-body-tertiary">Create your account today</p>
            </div>
            <form>
                <?= csrf_field() ?>
                <div class="mb-3 text-start"><label class="form-label" for="name">Name</label><input
                        class="form-control" id="name" type="text" placeholder="Full Name" /></div>
                <div class="mb-3 text-start"><label class="form-label" for="email">Email address</label><input
                        class="form-control" id="email" type="email" placeholder="name@example.com" /></div>
                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="password">Password</label>
                        <div class="position-relative" data-password="data-password">
                            <input class="form-control form-icon-input pe-6" id="password" type="password"
                                placeholder="Password" data-password-input="data-password-input" />
                            <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary"
                                data-password-toggle="data-password-toggle">
                                <span class="uil uil-eye show"></span>
                                <span class="uil uil-eye-slash hide"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-6"><label class="form-label" for="confirmPassword">Confirm Password</label>
                        <div class="position-relative" data-password="data-password">
                            <input class="form-control form-icon-input pe-6" id="confirmPassword" type="password"
                                placeholder="Confirm Password" data-password-input="data-password-input" />
                            <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 fs-7 text-body-tertiary"
                                data-password-toggle="data-password-toggle">
                                <span class="uil uil-eye show"></span>
                                <span class="uil uil-eye-slash hide"></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" id="termsService" type="checkbox" />
                    <label class="form-label fs-9 text-transform-none" for="termsService">I accept the <a
                            href="#!">terms
                        </a>and <a href="#!">privacy policy</a>
                    </label>
                </div>
                <button class="btn btn-primary w-100 mb-3">Sign up</button>
                <div class="text-center"><a class="fs-9 fw-bold" href="<?= route_to('user.login') ?>">Sign in to an
                        existing
                        account</a></div>
            </form>
        </div>
    </div>
</div>