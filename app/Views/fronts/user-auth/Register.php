<?= $this->extend('fronts\templates\Authlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<!-- Internal TelephoneInput css-->
<link rel="stylesheet" href="<?= base_url('vendors/telephoneinput/css/intlTelInput.css'); ?>" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="c-err d-none" id="erral">
    <div class="alert alert-outline-danger d-flex align-items-center gap-2" role="alert">
        <span class="fas fa-times-circle text-danger fs-6"></span>
        <span class="mb-0 flex-1" id="erralmsg"></span>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
            <a class="d-flex flex-center text-decoration-none mb-4" href="<?= route_to('home') ?>">
                <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                    <img src="<?= base_url('assets/img/icons/logo.png') ?>" alt="phoenix" width="58" />
                </div>
            </a>
            <div class="text-center mb-4">
                <h3 class="text-body-highlight">Sign Up</h3>
                <p class="text-body-tertiary">Create your account today</p>
            </div>
            <form action="<?= route_to('user.register.post') ?>" method="post" id="registerform">
                <?= csrf_field() ?>
                <div class="mb-3 text-start">
                    <label class="form-label" for="full_name">Name</label>
                    <input class="form-control" id="full_name" type="text" name="full_name" minlength="0" maxlength="50"
                        value="" placeholder="Full Name" required />
                    <p class="ntv d-none" id="nerr"></p>

                </div>
                <div class="mb-3 text-start">
                    <label class="form-label" for="email">Email address</label>
                    <input class="form-control" id="email" type="email" name="email" minlength="0" maxlength="50"
                        value="" placeholder="name@example.com" required />
                    <p class="ntv d-none" id="emerr"></p>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label" for="phone">Phone no</label>
                    <input class="form-control" id="phone" type="tel" name="phone" min="0" max="20" value=""
                        placeholder="mobile no" required />
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="password">Password</label>
                        <div class="position-relative" data-password="data-password">
                            <input class="form-control form-icon-input pe-6" id="password" type="password" name="password" placeholder="Password" data-password-input="data-password-input" minlength="5" required />
                            <button type="button" class="btn px-3 py-0 position-absolute top-50 end-0 translate-middle-y fs-9 text-body-tertiary"
                                data-password-toggle="data-password-toggle">
                                <span class="far fa-eye show"></span>
                                <span class="far fa-eye-slash hide"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="confirm_password">Confirm Password</label>
                        <div class="position-relative" data-password="data-password">
                            <input class="form-control form-icon-input pe-6" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm Password" data-password-input="data-password-input" minlength="5" required />
                            <button type="button" class="btn px-3 py-0 position-absolute top-50 end-0 translate-middle-y fs-9 text-body-tertiary"
                                data-password-toggle="data-password-toggle">
                                <span class="far fa-eye show"></span>
                                <span class="far fa-eye-slash hide"></span>
                            </button>
                        </div>
                    </div>
                    <p class="ntv d-none" id="pwderr"></p>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" id="terms" type="checkbox" name="terms" value="1" />
                    <label class="form-label fs-9 text-transform-none" for="terms">
                        I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a>
                    </label>
                    <p class="ntv d-none" id="pperr"></p>
                </div>
                <button class="btn btn-primary w-100 mb-3">Sign up</button>
            </form>
            <div class="text-center">
                <a class="fs-9 fw-bold" href="<?= route_to('user.login') ?>">Sign in to an existing account</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('vendors/telephoneinput/js/intlTelInputWithUtils.min.js') ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                fetch("https://ipapi.co/json")
                    .then(res => res.json())
                    .then(data => {
                        callback(data.country_code);
                    })
                    .catch(() => {
                        callback("us"); // fallback
                    });
            },
            utilsScript: "<?= base_url('vendors/telephoneinput/js/utils.js') ?>",
            separateDialCode: true
        });

        // Optional: validation on blur
        input.addEventListener("blur", function() {
            if (input.value.trim()) {
                if (iti.isValidNumber()) {
                    input.classList.remove("is-invalid");
                    input.classList.add("is-valid");
                } else {
                    input.classList.remove("is-valid");
                    input.classList.add("is-invalid");
                }
            }
        });

        // Handle form submission
        const form = document.querySelector("#registerform");

        if (form) {
            form.addEventListener("submit", (e) => {
                e.preventDefault();

                // Add international number to input
                input.value = iti.getNumber();

                const formData = new FormData(form);

                fetch("<?= base_url('user/register') ?>", {
                        method: "POST",
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest' // Required to detect AJAX in CI4
                        },
                        body: formData,
                    })
                    .then(resp => resp.json())
                    .then(resp => {
                        // Handle server response
                        if (resp.success) {
                            form.reset();
                            if (resp.redirect) {
                                window.location.href = resp.redirect;
                            }
                        } else if (resp.err) {
                            // Handle specific errors
                            if (resp.type === 'fname') {
                                const nerr = document.querySelector('#nerr');
                                nerr.classList.remove('d-none');
                                nerr.innerHTML = resp.msg;
                            }
                            if (resp.type === 'email') {
                                const emerr = document.querySelector('#emerr');
                                emerr.classList.remove('d-none');
                                emerr.innerHTML = resp.msg;
                            }
                            if (resp.type === 'pass') {
                                const pwderr = document.querySelector('#pwderr');
                                pwderr.classList.remove('d-none');
                                pwderr.innerHTML = resp.msg;
                            }
                            if (resp.type === 'terms') {
                                const pperr = document.querySelector('#pperr');
                                pperr.classList.remove('d-none');
                                pperr.innerHTML = resp.msg;
                            }
                            if (resp.type === 'exist') {
                                const emerr = document.querySelector('#emerr');
                                emerr.classList.remove('d-none');
                                emerr.innerHTML = resp.msg;

                            }
                        } else {
                            const erral = document.querySelector('#erral');
                            const erralmsg = document.querySelector('#erralmsg');
                            erral.classList.remove('d-none');
                            erralmsg.innerHTML = resp.msg;
                        }
                    }).catch(err => {
                        console.error("Error:", err);
                        const erral = document.querySelector('#erral');
                        const erralmsg = document.querySelector('#erralmsg');
                        exerr.classList.remove('d-none');
                        erralmsg.innerHTML = resp.msg;
                    });
            });
        }
    });
</script>
<?= $this->endSection() ?>