<?= $this->extend('fronts/templates/Adminlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="row">
    <h2 class="text-bold text-body-emphasis mb-5">All Admins</h2>
    <div class="d-flex align-items-center justify-content-end my-3">
        <div id="bulk-select-replace-element">
            <button class="btn btn-phoenix-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#newadmin">
                <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                <span class="ms-1">New Admin</span>
            </button>
        </div>
        <div class="d-none ms-3" id="bulk-select-actions">
            <div class="d-flex">
                <select class="form-select form-select-sm" aria-label="Bulk actions">
                    <option selected="selected">Bulk actions</option>
                    <option value="Delete">Delete</option>
                    <option value="Archive">Archive</option>
                </select>
                <button class="btn btn-phoenix-danger btn-sm ms-2" type="button">Apply</button>
            </div>
        </div>
    </div>
    <?php if (!empty($allAdmin)) : ?>
        <div id="tableExample" data-list='{"valueNames":["name","email","role","update"],"page":5,"pagination":true}'>
            <div class="table-responsive mx-n1 px-1">
                <table class="table table-sm border-top border-translucent fs-9 mb-0">
                    <thead>
                        <tr>
                            <th class="white-space-nowrap fs-9 align-middle ps-0" style="max-width:20px; width:18px;">
                                <div class="form-check mb-0 fs-8">
                                    <input class="form-check-input" id="bulk-select-example" type="checkbox" data-bulk-select='{"body":"bulk-select-body","actions":"bulk-select-actions","replacedElement":"bulk-select-replace-element"}' />
                                </div>
                            </th>
                            <th class="sort align-middle ps-3" data-sort="name">Name</th>
                            <th class="sort align-middle" data-sort="email">Email</th>
                            <th class="sort align-middle" data-sort="role">ROLE</th>
                            <th class="sort align-middle" data-sort="update">LAST UPDATE</th>
                            <th class="sort text-end align-middle pe-0" scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="bulk-select-body">
                        <?php foreach ($allAdmin as $admin): ?>
                            <tr>
                                <td class="fs-9 align-middle">
                                    <div class="form-check mb-0 fs-8">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            data-bulk-select-row='{"name":"<?= $admin['full_name'] ?>","email":"<?= $admin['email'] ?>","role":"<?= $admin['role'] ?>","update":"<?= $admin['updated_at'] ?>"}'>
                                    </div>
                                </td>

                                <td class="align-middle ps-3 name">
                                    <?= esc($admin['full_name']) ?>
                                </td>

                                <td class="align-middle email">
                                    <?= esc($admin['email']) ?>
                                </td>

                                <td class="align-middle role">
                                    <?= esc($admin['role']) ?>
                                </td>
                                <td class="align-middle update">
                                    <?= esc($admin['updated_at']) ?>
                                </td>

                                <td class="align-middle white-space-nowrap text-end pe-0">
                                    <div class="btn-reveal-trigger position-static">
                                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window">
                                            <span class="fas fa-ellipsis-h fs-10"></span>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-end py-2">
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#verticallyCentered">Update</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-danger" href="#">Remove</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex flex-between-center pt-3 mb-3">
                <div class="pagination d-none"></div>
                <p class="mb-0 fs-9">
                    <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
                    <span class="d-none d-sm-inline-block"> &mdash; </span>
                    <a class="fw-semibold" href="#!" data-list-view="*">
                        View all
                        <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                    </a><a class="fw-semibold d-none" href="#!" data-list-view="less">
                        View Less
                        <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span>
                    </a>
                </p>
                <div class="d-flex">
                    <button class="btn btn-sm btn-primary" type="button" data-list-pagination="prev"><span>Previous</span></button>
                    <button class="btn btn-sm btn-primary px-4 ms-2" type="button" data-list-pagination="next"><span>Next</span></button>
                </div>
            </div>
            <div class="d-none">
                <p class="mb-2">Click the button to get selected rows</p>
                <button class="btn btn-warning" data-selected-rows="data-selected-rows">Get Selected Rows</button>
                <pre id="selectedRows"></pre>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="modal fade" id="newadmin" tabindex="-1" data-phoenix-modal='{"autoShow":false}' aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-body position- p-6">
                <div class="position-absolute end-0 top-0">
                    <button class="btn btn-link text-danger px-3" data-bs-dismiss="modal" aria-label="Close">
                        <span class="fa-solid fa-times" data-fa-transform="down-2"></span>
                    </button>
                </div>
                <div class="row flex-center">
                    <div class="col-sm-10 col-md-8">
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
                        <div class="text-center"><a class="fs-9 fw-bold" href="<?= base_url('admin/forgot_password') ?>">Forgot Password</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addAdminForm = document.querySelector("#addadmin");
        if (addAdminForm) {
            addAdminForm.addEventListener("submit", async function(e) {
                e.preventDefault();
                const formData = new FormData(addAdminForm);
                try {
                    const submitfFrom = await fetch("<?= base_url('admin/add_admin') ?>", {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });

                    const resp = await submitfFrom.json();
                    if (resp.success) {
                        notyf.open({
                            type: 'success',
                            message: massage
                        });
                    }
                    if (resp.error) {
                        Object.values(resp.msg).forEach(massage => {
                            notyf.open({
                                type: 'error',
                                message: massage
                            });
                        });
                    }

                } catch (error) {
                    notyf.open({
                        type: 'error',
                        message: error
                    });
                    console.log(`Error : ${error}`);
                }
            });
        }
    });
</script>

<?= $this->endSection() ?>