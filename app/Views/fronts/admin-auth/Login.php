<?= $this->extend('fronts\templates\Authlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
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
                    <img src="<?= base_url('assets/img/icons/logo.png'); ?>" alt="phoenix" width="58">
                </div>
            </a>
            <div class="text-center mb-7">
                <h3 class="text-body-highlight">Admin Login</h3>
            </div>
            <form action="<?= base_url('admin') ?>" method="post" id="loginform">
                <?= csrf_field(); ?>
                <div class="mb-3 text-start">
                    <label class="form-label" for="login_id">Email address or Username</label>
                    <div class="form-icon-container">
                        <input class="form-control form-icon-input" id="login_id" type="text" name="login_id"
                            placeholder="name@example.com">
                        <span class="fas fa-user text-body fs-9 form-icon"></span>
                    </div>
                    <p class="ntv d-none" id="emerr">sadfasf</p>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label" for="password">Password</label>
                    <div class="form-icon-container" data-password="data-password">
                        <input class="form-control form-icon-input pe-6" id="password" type="password" name="password"
                            placeholder="Password" data-password-input="data-password-input">
                        <span class="fas fa-key text-body fs-9 form-icon"></span>
                        <button type="button" class="btn px-3 py-0 position-absolute top-50 end-0 translate-middle-y fs-9 text-body-tertiary"
                            data-password-toggle="data-password-toggle">
                            <span class="far fa-eye show"></span>
                            <span class="far fa-eye-slash hide"></span>
                        </button>
                    </div>
                    <p class="ntv d-none" id="pwderr"></p>
                </div>

                <div class="row flex-between-center mb-3">
                    <div class="col-auto">
                        <div class="form-check mb-0">
                            <input class="form-check-input" id="rememberMe" type="checkbox" name="rememberMe" value="1" <?= old('rememberMe') ? 'checked' : '' ?>>
                            <label class="form-check-label mb-0" for="rememberMe">Remember me</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit">Sign In</button>
                <div class="text-center">
                    <a class="fs-9 fw-bold" href="#">Forgot password</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("#loginform");
        if (form) {
            form.addEventListener("submit", function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                fetch("<?= base_url('admin') ?>", {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    })
                    .then(resp => resp.json())
                    .then(data => {
                        console.log(data);
                        if (data.success) {
                            localStorage.setItem('loginSuccessMessage', data.msg);
                            window.location.href = data.redirect;
                        } else {
                            document.querySelector("#erral").classList.add("d-none");
                            document.querySelector("#emerr").classList.add("d-none");
                            document.querySelector("#pwderr").classList.add("d-none");
                            if (data.type === 'loginid') {
                                document.querySelector("#emerr").innerText = data.msg;
                                document.querySelector("#emerr").classList.remove("d-none");
                            } else if (data.type === 'password') {
                                document.querySelector("#pwderr").innerText = data.msg;
                                document.querySelector("#pwderr").classList.remove("d-none");
                            } else {
                                document.querySelector("#erralmsg").innerText = data.msg;
                                document.querySelector("#erral").classList.remove("d-none");
                            }
                        }
                    })
                    .catch(err => {
                        console.error("Login error:", err);
                        document.querySelector("#erralmsg").innerText = "Something went wrong!";
                        document.querySelector("#erral").classList.remove("d-none");
                    })
            });
        }
    });
</script>
<?= $this->endSection() ?>