<?= $this->extend('fronts/templates/Authlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row flex-center min-vh-100 py-5">
        <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
            <a class="d-flex flex-center text-decoration-none mb-4" href="<?= base_url() ?>">
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
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label" for="password">Password</label>
                    <div class="form-icon-container" data-password="data-password">
                        <input class="form-control form-icon-input pe-6" id="password" type="password" name="password" placeholder="Password" data-password-input="data-password-input">
                        <span class="fas fa-key text-body fs-9 form-icon"></span>
                        <button type="button" class="btn px-3 py-0 position-absolute top-50 end-0 translate-middle-y fs-9 text-body-tertiary"
                            data-password-toggle="data-password-toggle">
                            <span class="far fa-eye show"></span>
                            <span class="far fa-eye-slash hide"></span>
                        </button>
                    </div>
                </div>

                <div class="row flex-between-center mb-3">
                    <div class="col-auto">
                        <div class="form-check mb-0">
                            <input class="form-check-input" id="rememberMe" type="checkbox" name="rememberMe" value="1">
                            <label class="form-check-label mb-0" for="rememberMe">Remember me</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary w-100 mb-3" type="submit">Sign In</button>
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
            form.addEventListener("submit", async function(e) {
                e.preventDefault();
                const logbtn = form.querySelector('button[type="submit"]');
                const originalText = logbtn.innerHTML;

                logbtn.disabled = true;
                logbtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
                try {
                    const formData = new FormData(form);
                    const submitLogin = await fetch("<?= base_url('admin') ?>", {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });
                    const resp = await submitLogin.json();
                    if (!resp) return notyf.open({
                        type: 'error',
                        message: 'Network error, try again.'
                    });
                    if (resp.success) {
                        notyf.open({
                            type: 'success',
                            message: resp.msg
                        });
                        setTimeout(() => {
                            if (resp.redirect) {
                                window.location.href = resp.redirect;
                            } else {
                                location.reload();
                            }
                        }, 1000);
                    } else {
                        notyf.open({
                            type: 'error',
                            message: resp.msg
                        });
                        console.log(resp.msg);
                    }
                } catch (error) {
                    console.log(`Error : ${error}`);
                }
                logbtn.disabled = false;
                logbtn.innerHTML = originalText;
            });
        }
    });
</script>
<?= $this->endSection() ?>