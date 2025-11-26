<?= $this->extend('fronts/templates/Adminlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row flex-center">
    <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
        <h2 class="text-bold text-body-emphasis mb-5">Forgot Password</h2>
        <form action="<?= base_url('admin/forgot_password') ?>" method="post" id="forgotpwd">
            <?= csrf_field() ?>
            <input type="hidden" name="step" id="step" value="<?= esc($step); ?>" />
            <?php if ($step === 'old_verification'): ?>
                <div class="col-md-8 mb-3 text-start">
                    <label class="form-label" for="email">Email address</label>
                    <div class="form-icon-container">
                        <input class="form-control form-icon-input" id="email" type="email" name="email"
                            value="" placeholder="name@example.com">
                        <span class="fas fa-user text-body fs-9 form-icon"></span>
                    </div>
                </div>
                <div class="col-md-8 mb-3 text-start">
                    <label class="form-label" for="password">Current Password</label>
                    <div class="position-relative" data-password>
                        <div class="form-icon-container">
                            <input class="form-control form-icon-input pe-6" id="password" type="password" name="password"
                                placeholder="Current Password" data-password-input />
                            <span class="fas fa-key text-900 fs-9 form-icon"></span>
                        </div>
                        <button type="button" class="btn px-3 py-0 position-absolute top-50 end-0 translate-middle-y fs-9 text-body-tertiary"
                            data-password-toggle>
                            <span class="far fa-eye show"></span>
                            <span class="far fa-eye-slash hide"></span>
                        </button>
                    </div>
                </div>
                <div class="col-6">
                    <button class="btn btn-primary mb-3" type="submit">Next</button>
                </div>
            <?php elseif ($step === 'new_update'): ?>
                <div class="col-md-8 mb-3 text-start">
                    <label class="form-label" for="newpwd">New Password</label>
                    <div class="position-relative" data-password>
                        <div class="form-icon-container">
                            <input class="form-control form-icon-input pe-6" id="newpwd" type="password" name="newpwd"
                                placeholder="New Password" data-password-input />
                            <span class="fas fa-key text-900 fs-9 form-icon"></span>
                        </div>
                        <button type="button" class="btn px-3 py-0 position-absolute top-50 end-0 translate-middle-y fs-9 text-body-tertiary"
                            data-password-toggle>
                            <span class="far fa-eye show"></span>
                            <span class="far fa-eye-slash hide"></span>
                        </button>
                    </div>
                </div>
                <div class="col-md-8 mb-3 text-start">
                    <label class="form-label" for="repwd">Confirm Password</label>
                    <div class="position-relative" data-password>
                        <div class="form-icon-container">
                            <input class="form-control form-icon-input pe-6" id="repwd" type="password" name="repwd"
                                placeholder="Confirm Password" data-password-input />
                            <span class="fas fa-key text-900 fs-9 form-icon"></span>
                        </div>
                        <button type="button" class="btn px-3 py-0 position-absolute top-50 end-0 translate-middle-y fs-9 text-body-tertiary"
                            data-password-toggle>
                            <span class="far fa-eye show"></span>
                            <span class="far fa-eye-slash hide"></span>
                        </button>
                    </div>
                </div>
                <div class="col-6">
                    <button class="btn btn-primary mb-3" type="submit">Update Password</button>
                </div>
            <?php endif; ?>
        </form>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("#forgotpwd");
        const newupdate = document.querySelector("#newupdate");
        const step = document.querySelector("#step");
        if (form) {
            form.addEventListener("submit", async function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                try {
                    const spw = await fetch("<?= base_url('admin/forgot_password') ?>", {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });
                    const resp = await spw.json();
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
                            window.location.href = resp.redirect;
                        }, 1000);
                        console.log(resp);
                    } else {
                        console.log(resp);
                        notyf.open({
                            type: 'error',
                            message: resp.msg
                        });
                    }
                } catch (error) {
                    console.log(`Error : ${error}`);

                }
            });
        }
    });
</script>
<?= $this->endSection() ?>