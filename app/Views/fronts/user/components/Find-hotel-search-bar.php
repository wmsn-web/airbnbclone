<?php $location = $location ?? ''; ?>
<form id="getHotel">
    <div class="row gx-0 gy-3 gy-md-0 align-items-center mx-auto p-3 bg-body-emphasis rounded-5 rounded-md-pill position-relative border w-lg-75">

        <!-- LOCATION -->
        <div class="col-12 col-md">
            <div class="form-icon-container border-bottom border-bottom-md-0 border-translucent pb-3 pb-md-0">
                <select class="form-control form-icon-input border-0 py-0 shadow-none fs-8 form-select"
                    name="location" id="place">
                    <option value="">Pick a place</option>
                    <?php foreach ($places as $p): ?>
                        <option
                            <?= ($location === $p['place']) ? 'selected' : '' ?>
                            value="<?= esc($p['place']) ?>">
                            <?= esc($p['place']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <span class="fa-solid fa-map-marker-alt form-icon text-body-tertiary top-0" data-fa-transform="down-2"></span>
            </div>
        </div>

        <!-- DATE -->
        <div class="col-6 col-md">
            <div class="form-icon-container flatpickr-input-container">
                <input class="form-control datetimepicker form-icon-input border-y-0 border-start-0 border-start-md py-0 shadow-none border-translucent fs-8 rounded-0"
                    type="text" placeholder="Pick a date" name="date" value="<?= isset($query['date']) ? esc($query['date']) : '' ?>">
                <span class=" fa-solid fa-calendar form-icon top-0 text-body-tertiary" data-fa-transform="down-2"></span>
            </div>
        </div>

        <!-- GUEST DROPDOWN -->
        <div class="col-6 col-md">
            <button class="btn px-3 fs-8 fw-semibold text-body-tertiary" id="guestDropdownBtn" type="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                data-bs-auto-close="outside">
                <span class="fa-solid fa-user me-2"></span> Guests
            </button>

            <div class="dropdown-menu dropdown-menu-start p-4" style="max-width: 320px">

                <!-- Adults -->
                <div class="row align-items-center g-0 pb-3 border-bottom border-translucent">
                    <div class="col-5">
                        <h5 class="mb-0 text-body">Adults</h5>
                    </div>
                    <div class="col-7">
                        <div class="input-group gap-2">
                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="minus" data-target="adults">
                                <span class="fa-solid fa-minus px-1"></span>
                            </button>
                            <input class="form-control text-center" id="adults" name="adults" type="number" min="1" value="<?= $query['adults'] ?? '2' ?>">
                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="plus" data-target="adults">
                                <span class="fa-solid fa-plus px-1"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Infants -->
                <div class="row align-items-center g-0 py-3 border-bottom border-translucent">
                    <div class="col-5">
                        <h5 class="mb-0 text-body">Infants</h5>
                    </div>
                    <div class="col-7">
                        <div class="input-group gap-2">
                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="minus" data-target="infants">
                                <span class="fa-solid fa-minus px-1"></span>
                            </button>
                            <input class="form-control text-center" id="infants" name="infants" type="number" min="0" value="<?= $query['infants'] ?? '0' ?>">
                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="plus" data-target="infants">
                                <span class="fa-solid fa-plus px-1"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Children -->
                <div class="row align-items-center g-0 pt-3">
                    <div class="col-5">
                        <h5 class="mb-0 text-body">Children</h5>
                    </div>
                    <div class="col-7">
                        <div class="input-group gap-2">
                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="minus" data-target="children">
                                <span class="fa-solid fa-minus px-1"></span>
                            </button>
                            <input class="form-control text-center" id="children" name="children" type="number" min="0" value="<?= $query['children'] ?? '0' ?>">
                            <button type="button" class="btn btn-phoenix-primary px-2 rounded" data-type="plus" data-target="children">
                                <span class="fa-solid fa-plus px-1"></span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="col-12 col-md-auto">
            <button class="btn btn-lg btn-phoenix-primary rounded-pill w-100" type="submit">
                <span class="fa-solid fa-search me-2"></span>Search
            </button>
        </div>
    </div>
</form>