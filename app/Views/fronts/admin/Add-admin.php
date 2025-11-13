<?= $this->extend('fronts\templates\Adminlayout') ?>

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
<div class="c-err d-none" id="succal">
    <div class="alert alert-subtle-success d-flex align-items-center gap-2" role="alert">
        <span class="fas fa-check-circle text-success fs-6"></span>
        <div class="d-flex flex-column ">
            <span class="mb-0" id="succalmsg"></span>
            <span class="mb-0 text-black fw-bold fs-9" id="succun"></span>
        </div>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
<div class="row flex-center">
    <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
        <h2 class="fs-5 mb-4 mb-xl-5">Add New Admin</h2>
        <form action="<?= base_url('admin/add_admin') ?>" method="post" id="addadmin">
            <?= csrf_field() ?>
            <div class="mb-3 text-start">
                <label class="form-label" for="full_name">Name</label>
                <input class="form-control" id="full_name" type="text" name="full_name" minlength="0" maxlength="50" value="<?= set_value('full_name') ?>" placeholder="Full Name" />
                <p class="ntv d-none" id="name"></p>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" id="email" type="email" name="email" minlength="0" maxlength="50"
                    value="<?= set_value('email') ?>" placeholder="name@example.com" />
                <p class="ntv d-none" id="emerr"></p>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label" for="inputState">Role <span class="text-danger">*</span></label>
                <select class="form-select" id="inputState" name="role">
                    <option value="superadmin" <?= set_select('role', 'superadmin') ?>>Super Admin</option>
                    <option value="admin" <?= set_select('role', 'admin') ?>>Admin</option>
                    <option value="editor" <?= set_select('role', 'editor') ?>>Editor</option>
                </select>
            </div>
            <div class="row g-3 mb-3">
                <div class="col-sm-6">
                    <label class="form-label" for="password">Password</label>
                    <div class="position-relative" data-password="data-password">
                        <input class="form-control form-icon-input pe-6" id="password" type="password"
                            name="password" placeholder="Password" data-password-input="data-password-input"
                            minlength="5" />
                        <button type="button" class="btn px-3 py-0 position-absolute top-50 end-0 translate-middle-y fs-9 text-body-tertiary"
                            data-password-toggle="data-password-toggle">
                            <span class="far fa-eye show"></span>
                            <span class="far fa-eye-slash hide"></span>
                        </button>
                    </div>
                    <p class="ntv d-none" id="pwd"></p>
                </div>
                <div class="col-sm-6">
                    <label class="form-label" for="confirm_password">Confirm Password</label>
                    <div class="position-relative" data-password="data-password">
                        <input class="form-control form-icon-input pe-6" id="confirm_password" type="password"
                            name="confirm_password" placeholder="Confirm Password"
                            data-password-input="data-password-input" minlength="5" />
                        <button type="button" class="btn px-3 py-0 position-absolute top-50 end-0 translate-middle-y fs-9 text-body-tertiary"
                            data-password-toggle="data-password-toggle">
                            <span class="far fa-eye show"></span>
                            <span class="far fa-eye-slash hide"></span>
                        </button>
                    </div>
                    <p class="ntv d-none" id="cpwd"></p>
                </div>
            </div>
            <button class="btn btn-primary w-100 mb-3">Register Admin</button>
        </form>
        <div class="text-center"><a class="fs-9 fw-bold" href="<?= route_to('admin.forgot.password') ?>">Forgot Password</a></div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector("#addadmin");

        // Alerts 
        const succal = document.querySelector("#succal");
        const succalmsg = document.querySelector("#succalmsg");
        const succun = document.querySelector("#succun");
        const erral = document.querySelector("#erral");
        const erralmsg = document.querySelector("#erralmsg");

        // Errors span 
        const nameErr = document.querySelector("#name");
        const emailErr = document.querySelector("#emerr");
        const pwdErr = document.querySelector("#pwd");
        const cpwdErr = document.querySelector("#cpwd");
        if (form) {
            form.addEventListener("submit", function(e) {
                e.preventDefault();

                // Clear all previous errors
                [succal, erral, nameErr, emailErr, pwdErr, cpwdErr].forEach(el => {
                    el?.classList?.add("d-none");
                    if (el?.tagName === "P") el.textContent = '';
                    if (el?.id === "succalmsg" || el?.id === "erralmsg") el.textContent = '';
                });

                const formData = new FormData(form);

                fetch("<?= base_url('admin/add_admin') ?>", {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    })
                    .then(resp => resp.json())
                    .then(data => {
                        if (data.error) {
                            switch (data.type) {
                                case 'email':
                                    emailErr.textContent = data.msg;
                                    emailErr.classList.remove("d-none");
                                    break;
                                case 'pwd':
                                    pwdErr.textContent = data.msg;
                                    pwdErr.classList.remove("d-none");
                                    break;
                                case 'general':
                                    erralmsg.textContent = data.msg;
                                    erral.classList.remove("d-none");
                                    break;
                                case 'validation':
                                    const errors = data.msg;
                                    if (errors.full_name) {
                                        nameErr.textContent = errors.full_name;
                                        nameErr.classList.remove("d-none");
                                    }
                                    if (errors.email) {
                                        emailErr.textContent = errors.email;
                                        emailErr.classList.remove("d-none");
                                    }
                                    if (errors.password) {
                                        pwdErr.textContent = errors.password;
                                        pwdErr.classList.remove("d-none");
                                    }
                                    if (errors.confirm_password) {
                                        cpwdErr.textContent = errors.confirm_password;
                                        cpwdErr.classList.remove("d-none");
                                    }
                                    break;
                            }
                        }

                        if (data.success) {
                            succalmsg.textContent = data.msg;
                            succun.innerHTML =
                                `Username: ${data.username} `;
                            succal.classList.remove("d-none");
                            form.reset();
                        }
                    })
                    .catch(err => {
                        console.error("Fetch error:", err);
                        erralmsg.textContent = "Something went wrong. Please try again.";
                        erral.classList.remove("d-none");
                    })
            });
        }
    });
</script>

<?= $this->endSection() ?>