<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-room/Add-room'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>
<div class="tab-pane active" role="tabpanel" aria-labelledby="add-room-wizard-tab1" id="add-room-wizard-tab1">
    <div class="row g-0">
        <div class="col-xxl-8">

            <!-- Add General Room Category -->
            <form class="mb-6" action="<?= base_url('admin/add_room/add-room-type') ?>" method="post" id="addRoomCatForm" novalidate="novalidate">
                <?= csrf_field() ?>
                <h5 class="mb-3">Add General Room Category</h5>

                <div class="row g-3">
                    <div class="col-sm-auto flex-sm-fill">
                        <div class="form-floating">
                            <input class="form-control" type="text" name="room-category" id="room-category-input" placeholder="Room Category">
                            <label for="room-category-input">Room Category</label>
                        </div>
                    </div>

                    <div class="col-sm-auto flex-sm-fill">
                        <div class="form-floating">
                            <input class="form-control" type="text" name="room-name-input" id="room-name-input" placeholder="Room">
                            <label for="room-name-input">Room</label>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <button class="btn btn-phoenix-primary w-100 h-100 fs-8" id="add_ame" type="submit">
                            <span class="fa-solid fa-plus me-2"></span>Add amenity
                        </button>
                    </div>
                </div>
            </form>

            <!-- Room Details Form -->
            <h3 class="mb-6">Room Details</h3>

            <form id="addPropertyWizardForm1" action="<?= base_url('admin/add_room/add-room-details') ?>" method="post" data-wizard-form="1" novalidate="novalidate">

                <!-- Room Category + Name -->
                <div class="row g-3 g-sm-4 mb-6">
                    <div class="col-sm-6 col-md-7">
                        <label class="mb-1 text-body-highlight fw-bold" for="room-category">Room category</label>
                        <select class="form-select" name="room-category" id="room-category">
                            <option value="">Select Category</option>
                            <?php foreach ($roomcats as $cat): ?>
                                <option value="<?= esc($cat['category']) ?>"><?= esc($cat['category']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-sm-6 col-md-5">
                        <label class="mb-1 text-body-highlight fw-bold" for="room-name">Room Name</label>
                        <select class="form-select" name="room-name" id="room-name">
                            <option value="">Select Room</option>
                        </select>
                    </div>
                </div>

                <!-- Bed type + adult + child + bed count -->
                <div class="row gx-3 gx-sm-4 gy-3 mb-6">

                    <div class="col-6 col-sm-4">
                        <label class="mb-1 text-body-highlight fw-bold" for="bed-type">Bed type</label>
                        <select class="form-select" name="bed-type" id="bed-type">
                            <option>Twin bed</option>
                            <option>King bed</option>
                            <option>Queen bed</option>
                            <option>Single bed</option>
                            <option>Double bed</option>
                            <option>Twin XL bed</option>
                            <option>Quad Bed</option>
                            <option>Executive Suite</option>
                            <option>Bunk Bed</option>
                        </select>
                    </div>

                    <div class="col-6 col-sm-4">
                        <label class="mb-1 text-body-highlight fw-bold" for="adult">Adult</label>
                        <div class="input-group" data-quantity="data-quantity">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                            <input class="form-control input-spin-none text-center" name="adult" id="adult" type="number" value="0">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4">
                        <label class="mb-1 text-body-highlight fw-bold" for="child-allow">Children allowed</label>
                        <div class="input-group" data-quantity="data-quantity">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                            <input class="form-control input-spin-none text-center" name="child-allow" id="child-allow" type="number" value="0">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4">
                        <label class="mb-1 text-body-highlight fw-bold" for="number-of-bed">Number of bed</label>
                        <div class="input-group" data-quantity="data-quantity">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                            <input class="form-control input-spin-none text-center" name="number-of-bed" id="number-of-bed" type="number" value="0">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4">
                        <label class="mb-1 text-body-highlight fw-bold" for="bathroom">Bathroom</label>
                        <div class="input-group" data-quantity="data-quantity">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                            <input class="form-control input-spin-none text-center" name="bathroom" id="bathroom" type="number" value="0">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                        </div>
                    </div>

                    <div class="col-6 col-sm-4">
                        <label class="mb-1 text-body-highlight fw-bold" for="balcony">Balcony</label>
                        <div class="input-group" data-quantity="data-quantity">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                            <input class="form-control input-spin-none text-center" name="balcony" id="balcony" type="number" value="0">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                        </div>
                    </div>

                </div>

                <!-- Room size -->
                <div class="row g-3 g-sm-4">
                    <div class="col-6">
                        <label class="mb-1 text-body-highlight fw-bold" for="room-of-this-type">Room of this type</label>
                        <div class="input-group" data-quantity="data-quantity">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus"><span class="fa-solid fa-minus"></span></button>
                            <input class="form-control input-spin-none text-center" name="room-of-this-type" id="room-of-this-type" type="number" value="0">
                            <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus"><span class="fa-solid fa-plus"></span></button>
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="mb-1 text-body-highlight fw-bold">Room size (OPT)</label>
                        <div class="input-group">
                            <input class="form-control form-icon-input" name="room-size" id="room-size" type="text" placeholder="Size">
                            <button class="btn px-3 bg-body-emphasis bg-body-hover rounded rounded-start-0 border" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                <span class="me-2">sq. m</span><span class="fa-solid fa-chevron-down fs-10"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#!">sq. m</a></li>
                                <li><a class="dropdown-item" href="#!">sq. ft</a></li>
                                <li><a class="dropdown-item" href="#!">sq. in</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Sleeping Arrangements -->
                <h4 class="mt-7 mb-2">Sleeping arrangements</h4>
                <p class="mb-4 text-body-tertiary">Sleep well in our comfortable rooms with modern amenities.</p>

                <div class="row gx-3 gx-sm-4 gy-3">
                    <?php
                    $beds = [
                        'single-bed' => 'Single bed',
                        'double-bed' => 'Double bed',
                        'queen-bed' => 'Queen bed',
                        'king-bed' => 'King bed',
                        'sofa-bed' => 'Sofa bed',
                        'extra-bed' => 'Extra bed'
                    ];
                    foreach ($beds as $id => $label): ?>
                        <div class="col-6 col-sm-4">
                            <label class="mb-1 text-body-highlight fw-bold" for="<?= $id ?>"><?= $label ?></label>
                            <div class="input-group" data-quantity="data-quantity">
                                <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="minus">
                                    <span class="fa-solid fa-minus"></span>
                                </button>
                                <input class="form-control input-spin-none text-center" name="<?= $id ?>" id="<?= $id ?>" type="number" value="0">
                                <button class="btn border px-3 bg-body-emphasis bg-body-hover lh-1" data-type="plus">
                                    <span class="fa-solid fa-plus"></span>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-6 d-flex flex-wrap gap-2">
                    <button class="btn btn-primary px-6 px-sm-11" type="submit">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>

<!-- individual Js -->
<?= $this->section('wizard-script'); ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById('addPropertyWizardForm1');

        if (form) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                try {
                    const submitForm = await fetch(this.action, {
                        method: "POST",
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: formData
                    });

                    const resp = await submitForm.json();
                    if (!resp) {
                        notyf.open({
                            type: 'error',
                            message: "Network error. Try again"
                        });
                    }
                    if (resp.success) {
                        notyf.open({
                            type: 'successs',
                            message: resp.msg
                        });
                        setTimeout(() => {
                            window.location.href = resp.redirect;
                        }, 1000);
                    } else {
                        notyf.open({
                            type: 'error',
                            message: resp.msg
                        });
                    }
                } catch (error) {
                    console.error(`Error : ${error}`);
                }

            })
        }
    });
</script>
<?= $this->endSection(); ?>