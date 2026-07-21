<?= $this->extend('fronts/templates/Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php
$session = session();
$cm = setting('currency_method');
$symbol = $cm['symbol'];
function formattedDate($str)
{
    $date = DateTime::createFromFormat('Y/m/d', $str);
    return $date->format('Y/m/d');
}
?>
<section class="pt-4 pb-9">
    <div class="container-medium">
        <h2 class="mb-5">Review & Check out</h2>
        <div class="row justify-content-center g-1">
            <div class="col-12 col-md-7">
                <div class="card mt-5 mt-lg-0">
                    <div class="card-body">
                        <h5 class="mb-3">Booking Summary</h5>
                        <?php foreach (($mode === 'cart' ? $cart['rooms'] : $rooms) as $rIndex => $room): ?>
                            <?php
                            $guestLimit = $mode === 'cart'
                                ? $room['guests']
                                : ['adults' => $query['adults'], 'children' => $query['children'], 'infants' => $query['infants']];
                            ?>
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5>
                                        <?= esc($room['name'] ?? $room['room_name']) ?> – Guests
                                    </h5>

                                    <small class="text-muted">
                                        <?= $guestLimit['adults'] ?> Adults,
                                        <?= $guestLimit['children'] ?> Children,
                                        <?= $guestLimit['infants'] ?> Infants
                                    </small>
                                    <div id="travellerList" class="mb-3"></div>
                                    <div
                                        class="mt-3"
                                        id="room-guests-<?= $rIndex ?>"
                                        data-adults="<?= $guestLimit['adults'] ?>"
                                        data-children="<?= $guestLimit['children'] ?>"
                                        data-infants="<?= $guestLimit['infants'] ?>">
                                    </div>
                                    <button
                                        class="btn btn-outline-primary btn-sm mt-2 add-guest-btn"
                                        data-room="<?= $rIndex ?>"
                                        data-bs-toggle="modal"
                                        data-bs-target="#guestlistModal">
                                        + Add Guest
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7">
                <?php if (!session()->has('user_id')): ?>
                    <div class="card">
                        <div class="card-header border-0 pb-1">
                            <h3 class="fw-bold">Enter your details</h3>
                        </div>
                        <div class="card-body px-0 px-md-2">
                            <form action="<?= base_url('register') ?>" method="post" id="verifyuser">
                                <?= csrf_field() ?>
                                <div class="col-12 mt-1">
                                    <a href="<?= base_url('auth/google') ?>" class="btn btn-phoenix-secondary w-100"><span class="fab fa-google text-danger me-2 fs-9"></span>Sign up with google</a>
                                    <div class="position-relative">
                                        <hr class="bg-body-secondary mt-5 mb-4">
                                        <div class="divider-content-center">or</div>
                                    </div>
                                </div>
                                <div class="col-12 form-floating ">
                                    <input class="form-control" type="text" id="uname" name="name" placeholder="Name" required>
                                    <label for="uname">Full name</label>
                                </div>
                                <input type="hidden" name="method" id="otp" value="otp">
                                <div class="col-12 form-floating mt-2">
                                    <input class="form-control" type="email" id="uemail" placeholder="uemail" name="email" required>
                                    <label for="uemail">Email</label>
                                    <button class="btn btn-primary w-100 mt-2" id="sendOtpBtn">Send otp</button>
                                </div>
                            </form>
                            <form action="<?= base_url('verify-otp') ?>" method="post" id="verifyotpform" style="display:none;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="email" value="<?= esc($email ?? '') ?>">
                                <div class="col-12 form-floating" id="otp-section">
                                    <div id="otp" class="otp-inputs d-flex flex-row justify-content-center mt-2">
                                        <?php for ($i = 1; $i <= 6; $i++): ?>
                                            <input class="mx-2 text-center form-control rounded otp-input" type="text" maxlength="1" inputmode="numeric" pattern="\d*" />
                                        <?php endfor; ?>
                                    </div>
                                    <button class="btn btn-primary w-100 mt-2" id="verifyOtpBtn">Verify otp</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="card mt-5 mt-lg-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center ">
                                <h3>
                                    <span>Final checkout price : </span><?= $symbol ?><?= $grandTotal ?>
                                    <!-- <span id="final-price"></span> -->
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-5">
                <!-- GO TO STRIPE PAYMENT FORM -->
                <?php if (session()->has('user_id')): ?>
                    <button id="submit-button" class="btn btn-primary w-100" type="submit">
                        <span id="button-text">Confirm and pay</span>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="guestModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h4 id="guestModalTitle">Add Guest</h4>

                <input type="hidden" id="guestRoomIndex">
                <input type="hidden" id="editGuestId">

                <label class="form-label">Full Name</label>
                <input id="guestName" class="form-control">

                <label class="form-label">Age</label>
                <input id="guestAge" class="form-control">

                <label class="form-label mt-2">Guest Type</label>
                <select id="guestType" class="form-select">
                    <option value="adult">Adult</option>
                    <option value="child">Child</option>
                    <option value="infant">Infant</option>
                </select>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="saveGuestBtn">Save</button>
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="guestlistModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <h5 class="modal-title" id="">Saved Guests</h5>
                <button class="btn text-primary addguestbtn">
                    + Add New Guests
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="addguestbox">
                    <div class="card p-3 mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Full Name</label>
                                <input id="guestname" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Age</label>
                                <input id="guestage" class="form-control">
                            </div>
                            <div class="col">
                                <label class="form-label mt-2">Guest Type</label>
                                <select id="guesttype" class="form-select">
                                    <option value="adult">Adult</option>
                                    <option value="child">Child</option>
                                    <option value="infant">Infant</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <button class="col btn btn-subtle-primary" type="submit">Save guest</button>
                                <button class="col btn btn-subtle-warning cancleform">Cancle</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form action="" class="listcheckbox">
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" id="">Done</button>
                <button class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        const API = "<?= base_url('api/travellers') ?>";
        const TYPE_MAP = {
            adult: 'adults',
            child: 'children',
            infant: 'infants'
        };

        let travellers = [];
        let roomGuests = {};
        const elements = {
            listcheckboxes: document.querySelectorAll('.listcheckbox'),
            addguestbtn: document.querySelector('.addguestbtn'),
            addguestbox: document.querySelector('.addguestbox'),
            cancleform: document.querySelector('.cancleform'),
        };
        const modal = new bootstrap.Modal(document.getElementById('guestModal'));

        /* ================= LOAD ================= */
        elements.addguestbox.classList.add('d-none');
        elements.addguestbtn.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('clicked');
            elements.addguestbox.classList.remove('d-none');
            elements.addguestbtn.classList.add('d-none');
        });
        elements.cancleform.addEventListener('click', e => {
            e.preventDefault()
            elements.addguestbox.classList.add('d-none');
            elements.addguestbtn.classList.remove('d-none');
        })
        async function loadTravellers() {
            try {
                const res = await fetch(API);
                const json = await res.json();

                if (json.success && json.travellers?.length > 0) {
                    const travellers = json.travellers;

                    // 1. Build the HTML string once (for performance)
                    let htmlContent = "";
                    travellers.forEach((t, index) => {
                        const uniqueId = `traveller-${t.id || index}`;
                        htmlContent += `
                            <div class="form-check">
                                <input class="form-check-input" id="${uniqueId}" type="checkbox" value="${t.id || ''}">
                                <label class="form-check-label" for="${uniqueId}">${t.full_name}</label>
                            </div>`;
                    });

                    // 2. Loop through every container found on the page
                    elements.listcheckboxes.forEach(container => {
                        container.innerHTML = htmlContent;
                    });
                }
                if (json.error) {
                    notyf.open({
                        type: 'error',
                        message: json.message
                    });
                }
                renderTravellerList();

            } catch (err) {
                console.error('Api fetch error', err)
            }
        }
        loadTravellers();

        /* ================= GLOBAL TRAVELLER LIST ================= */
        function renderTravellerList() {
            const box = document.getElementById('travellerList');
            box.innerHTML = '';

            if (travellers.length === 0) {
                box.innerHTML = `<p class="text-muted">No guests added yet</p>`;
                return;
            }

            travellers.forEach(t => {
                box.innerHTML += `
                <div class="d-flex justify-content-between align-items-center border rounded p-2 mb-2">
                    <div>
                        <strong>${t.full_name}</strong>
                        <small class="text-muted">(${t.type})</small>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-outline-primary me-1"
                            onclick="editTraveller(${t.id})">Edit</button>
                        <button class="btn btn-sm btn-outline-danger"
                            onclick="deleteTraveller(${t.id})">Delete</button>
                    </div>
                </div>
            `;
            });
        }

        /* ================= DELETE (DB) ================= */
        window.deleteTraveller = async function(id) {
            if (!confirm('Delete this traveller?')) return;

            await fetch(`${API}/delete/${id}`, {
                method: 'DELETE'
            });

            // remove from room assignments too
            Object.values(roomGuests).forEach(room => {
                Object.values(room).forEach(arr => {
                    const i = arr.indexOf(id);
                    if (i !== -1) arr.splice(i, 1);
                });
            });

            await loadTravellers();
            renderAllRooms();
        };

        function renderRoom(index) {
            const box = document.getElementById(`room-guests-${index}`);
            box.innerHTML = '';

            Object.entries(roomGuests[index] || {}).forEach(([key, ids]) => {
                ids.forEach(id => {
                    const t = travellers.find(x => x.id === id);
                    if (!t) return;

                    box.innerHTML += `
                    <span class="badge bg-secondary me-1 mb-1">
                        ${t.full_name}
                        <i class="fas fa-times ms-1"
                            onclick="unassignTraveller(${index}, '${key}', ${id})"></i>
                    </span>
                `;
                });
            });
        }

        window.unassignTraveller = function(room, key, id) {
            roomGuests[room][key] =
                roomGuests[room][key].filter(x => x !== id);
            renderRoom(room);
        };

        function renderAllRooms() {
            Object.keys(roomGuests).forEach(renderRoom);
        }

        /* ================= ADD / EDIT ================= */
        window.editTraveller = function(id) {
            const t = travellers.find(x => x.id === id);
            if (!t) return;

            guestName.value = t.full_name;
            guestType.value = t.type;
            editGuestId.value = id;
            modal.show();
        };

        saveGuestBtn.onclick = async () => {
            const id = editGuestId.value;
            const payload = {
                full_name: guestName.value.trim(),
                type: guestType.value
            };

            const url = id ? `${API}/update/${id}` : `${API}/create`;

            await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(payload)
            });

            modal.hide();
            editGuestId.value = '';
            await loadTravellers();
        };

    });
</script>


<?= $this->endSection() ?>