<div class="tab-pane <?= ($activeTab == 'tab7') ? 'active show' : '' ?>" role="tabpanel" aria-labelledby="add-property-wizard-tab7" id="add-property-wizard-tab7">
    <h3 class="mb-2">We're building your property</h3>
    <p class="mb-5 text-body-tertiary">We're working on getting your property set up and ready for guests. Stay tuned for updates and start accepting bookings soon!</p>

    <div class="alert alert-subtle-success alert-dismissible fade show mb-5" role="alert">
        <p class="mb-0 flex-1 fw-semibold fs-9 fs-sm-8">Congratulations on your successful listing! Join a community of hospitality professionals as a host. Your hard work will turn your home into a sought-after destination. We anticipate hearing about your achievements.</p>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="accordion-button-arrow-icon accordion mt-2" id="previewAccordion">
        <?php if (!empty($hData)) : ?>
            <div class="accordion-item border rounded-3 bg-body-emphasis p-3 p-sm-4 mb-5">
                <h5 class="accordion-header">
                    <button class="accordion-button py-0 text-body-highlight" type="button" data-bs-toggle="collapse" data-bs-target="#basicInfo" aria-expanded="true" aria-controls="basicInfo">
                        <img class="me-2 d-dark-none" src="<?= base_url('assets/img/icons/info.svg'); ?>" alt="">
                        <img class="me-2 d-light-none" src="<?= base_url('assets/img/icons/info_dark.svg'); ?>" alt=""><span class="fs-sm-7">Basic Information</span>
                    </button>
                </h5>
                <div class="accordion-collapse collapse show" id="basicInfo" data-bs-parent="#previewAccordion">
                    <div class="mt-4 scrollbar">
                        <a class="fs-9 fw-semibold mb-2 d-inline-block" href="<?= base_url('admin/add_property/tab1/' . $hotelId) ?>">Edit info</a>
                        <table class="w-100">
                            <tbody>
                                <tr>
                                    <th style="width: 176px"></th>
                                    <th style="width: 32px"></th>
                                    <th style="min-width: 300px"></th>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Property name</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= $hData['property_name'] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Property Information</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 ">
                                        <p class="mb-0 text-body-secondary"><?= !empty($hData['description']) ? $hData['description'] : 'Not available' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Rating</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= $hData['rating'] . ' star' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Email address</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= $hData['email'] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Mobile number</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= $hData['phone'] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Property chain</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= !empty($hData['chain_name']) ? $hData['chain_name'] : 'Not available' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Thumbnail</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <?php if (!empty($hData['thumbnail'])): ?>
                                            <img src="<?= base_url('writable/uploads/hotel-thumbnails/' . $hData['thumbnail']) ?>" alt="Property thumbnail" class="img-thumbnail" width="200">
                                        <?php else: ?>
                                            <p class="mb-0 text-body-secondary">No thumbnail available</p>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($hlData)) : ?>
            <div class="accordion-item border rounded-3 bg-body-emphasis p-3 p-sm-4 mb-5">
                <h5 class="accordion-header">
                    <button class="accordion-button py-0 text-body-highlight collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#location" aria-expanded="true" aria-controls="location">
                        <img class="me-2 d-dark-none" src="<?= base_url('assets/img/icons/location.svg') ?>" alt="">
                        <img class="me-2 d-light-none" src="<?= base_url('assets/img/icons/location_dark.svg') ?>" alt=""><span class="fs-sm-7">Location</span>
                    </button>
                </h5>
                <div class="accordion-collapse collapse" id="location" data-bs-parent="#previewAccordion">
                    <div class="mt-4 scrollbar">
                        <a class="fs-9 fw-semibold mb-2 d-inline-block" href="<?= base_url('admin/add_property/tab2/' . $hotelId) ?>">Edit location</a>
                        <table class="w-100">
                            <tbody>
                                <tr>
                                    <th style="width: 176px"></th>
                                    <th style="width: 32px"></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Apartment / Street</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= !empty($hlData['street_name']) ? $hlData['street_name'] : 'Not available' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">State</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= !empty($hlData['state']) ? $hlData['state'] : 'Not available' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Country / Region</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= !empty($hlData['country_or_region']) ? $hlData['country_or_region'] : 'Not available' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap  pb-3">
                                        <h5 class="fw-semibold text-body-highlight mb-0">City</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  pb-3 text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= !empty($hlData['city']) ? $hlData['city'] : 'Not available' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-top pt-3 text-nowrap">
                                        <h5 class="fw-semibold text-body-highlight mb-0">Zip code</h5>
                                    </td>
                                    <td class="border-top px-3 pt-3 w-max-content">
                                        <p class="mb-0 w-max-content">:</p>
                                    </td>
                                    <td class="border-top pt-3  text-nowrap">
                                        <p class="mb-0 text-body-secondary"><?= !empty($hlData['zip_code']) ? $hlData['zip_code'] : 'Not available' ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($hamData)) : ?>
            <div class="accordion-item border rounded-3 bg-body-emphasis p-3 p-sm-4 mb-5">
                <h5 class="accordion-header">
                    <button class="accordion-button py-0 text-body-highlight collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#generalAmenities" aria-expanded="true" aria-controls="generalAmenities">
                        <img class="me-2 d-dark-none" src="<?= base_url('assets/img/icons/bed-double.svg'); ?>" alt="">
                        <img class="me-2 d-light-none" src="<?= base_url('assets/img/icons/bed-double_dark.svg'); ?>" alt=""><span class="fs-sm-7">General Amenities</span>
                    </button>
                </h5>
                <div class="accordion-collapse collapse" id="generalAmenities" data-bs-parent="#previewAccordion">
                    <div class="mt-4 scrollbar">
                        <a class="fs-9 fw-semibold mb-2 d-inline-block" href="<?= base_url('admin/add_property/tab3/' . $hotelId) ?>">Edit amenities</a>
                        <div class="w-100">
                            <?php
                            $amenities = !empty($hamData['amenities']) ? json_decode($hamData['amenities'], true) : [];
                            if (!empty($amenities)) :
                                foreach ($amenities as $key => $value):
                                    $type = isset($value['type']) ? $value['type'] : '';
                                    $condition = isset($value['condition']) ? $value['condition'] : '';
                                    $isFree = ($type === 'free' && ($condition === '' || strtolower($condition) === 'none'));
                            ?>
                                    <span class="badge badge-phoenix <?= $isFree ? 'badge-phoenix-success' : 'badge-phoenix-danger' ?> mb-2 me-2">
                                        <?= htmlspecialchars($key) ?>
                                    </span>
                                <?php
                                endforeach;
                            else:
                                ?>
                                <p class="text-body-secondary">No amenities added</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($hgData)) : ?>
            <div class="accordion-item border rounded-3 bg-body-emphasis p-3 p-sm-4 mb-5">
                <h5 class="accordion-header">
                    <button class="accordion-button py-0 text-body-highlight collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pictures" aria-expanded="true" aria-controls="pictures">
                        <img class="me-2 d-dark-none" src="<?= base_url('assets/img/icons/picture.svg') ?>" alt="">
                        <img class="me-2 d-light-none" src="<?= base_url('assets/img/icons/picture_dark.svg') ?>" alt=""><span class="fs-sm-7">Pictures</span>
                    </button>
                </h5>
                <div class="accordion-collapse collapse" id="pictures" data-bs-parent="#previewAccordion">
                    <div class="mt-4">
                        <a class="fs-9 fw-semibold mb-2 d-inline-block" href="<?= base_url('admin/add_property/tab4/' . $hotelId) ?>">Edit pictures</a>
                        <div class="row g-2 g-sm-3">
                            <?php
                            $photos = !empty($hgData['photos']) ? json_decode($hgData['photos'], true) : [];
                            if (!empty($photos)) :
                                foreach ($photos as $photo):
                            ?>
                                    <div class="col-sm-4 mb-3">
                                        <img class="rounded-2 w-100 object-fit-cover" src="<?= base_url('writable/uploads/hotel-gallery/' . $photo) ?>" alt="Hotel Photo" height="160">
                                    </div>
                                <?php
                                endforeach;
                            else:
                                ?>
                                <p class="text-body-secondary">No photos added</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($hfData)) : ?>
            <div class="accordion-item border rounded-3 bg-body-emphasis p-3 p-sm-4 mb-5">
                <h5 class="accordion-header">
                    <button class="accordion-button py-0 text-body-highlight collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#finance" aria-expanded="true" aria-controls="finance">
                        <img class="me-2 d-dark-none" src="<?= base_url('assets/img/icons/dollar-alt.svg'); ?>" alt="">
                        <img class="me-2 d-light-none" src="<?= base_url('assets/img/icons/dollar-alt_dark.svg'); ?>" alt=""><span class="fs-sm-7">Finance</span>
                    </button>
                </h5>
                <div class="accordion-collapse collapse" id="finance" data-bs-parent="#previewAccordion">
                    <div class="mt-4">
                        <a class="fs-9 fw-semibold mb-2 d-inline-block" href="<?= base_url('admin/add_property/tab5/' . $hotelId) ?>">Edit finance</a>
                        <h5 class="fw-bolder mb-3 mt-4">Payment from Guests (On property)</h5>
                        <div class="scrollbar">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th style="width: 176px"></th>
                                        <th style="width: 32px"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Cash payment</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= !empty($hfData['cash_payment']) ? "Yes" : "No" ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Card Payment</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= !empty($hfData['card_payment']) ? "Yes" : "No" ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap">
                                            <h5 class="fw-semibold text-body-highlight mb-0">MFS / Online Payment</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= !empty($hfData['online_payment']) ? "Yes" : "No" ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (!empty($hpoData)) : ?>
            <div class="accordion-item border rounded-3 bg-body-emphasis p-3 p-sm-4 mb-5">
                <h5 class="accordion-header">
                    <button class="accordion-button py-0 text-body-highlight collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#policy" aria-expanded="true" aria-controls="policy">
                        <img class="me-2 d-dark-none" src="<?= base_url('assets/img/icons/file-check-alt.svg'); ?>" alt="">
                        <img class="me-2 d-light-none" src="<?= base_url('assets/img/icons/file-check-alt_dark.svg'); ?>" alt=""><span class="fs-sm-7">Policy</span>
                    </button>
                </h5>
                <div class="accordion-collapse collapse" id="policy" data-bs-parent="#previewAccordion">
                    <div class="mt-4">
                        <a class="fs-9 fw-semibold mb-2 d-inline-block" href="<?= base_url('admin/add_property/tab6/' . $hotelId) ?>">Edit policies</a>

                        <!-- Check-in Policy -->
                        <h5 class="mb-3 fw-bolder">Check-in Policy</h5>
                        <div class="scrollbar">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th style="width: 176px"></th>
                                        <th style="width: 32px"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Check-in type</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary">
                                                <?= (!empty($hpoData['ci_type']) && $hpoData['ci_type'] == 1) ? '24hr Check-in' : 'Limited Check-in'; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Check-in start</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= !empty($hpoData['ci_start_time']) ? date('h:i A', strtotime($hpoData['ci_start_time'])) : 'Not set' ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Check-in end</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= !empty($hpoData['ci_end_time']) ? date('h:i A', strtotime($hpoData['ci_end_time'])) : 'Not set' ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Late check-in</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['late_ci']) && $hpoData['late_ci'] == 1) ? 'Yes' : 'No'; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Age Restriction</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['age_restriction']) && $hpoData['age_restriction'] == 1) ? 'Yes' : 'No'; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Deposit at Check-in</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['deposit_at_ci']) && $hpoData['deposit_at_ci'] == 1) ? 'Yes' : 'No'; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Documentation at Check-in</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['doc_at_ci']) && $hpoData['doc_at_ci'] == 1) ? 'Yes' : 'No'; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Checkout Policy -->
                        <h5 class="mb-3 fw-bolder mt-4">Checkout Policy</h5>
                        <div class="scrollbar">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th style="width: 176px"></th>
                                        <th style="width: 32px"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Checkout before</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= !empty($hpoData['co_before']) ? date('h:i A', strtotime($hpoData['co_before'])) : 'Not set' ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Flexible Checkout</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['flexible_co_status']) && $hpoData['flexible_co_status'] == 1) ? 'Available' : 'Not Available'; ?></p>
                                        </td>
                                    </tr>
                                    <?php if (!empty($hpoData['flexible_co_status']) && $hpoData['flexible_co_status'] == 1): ?>
                                        <tr>
                                            <td class="border-top pt-3 text-nowrap  pb-3">
                                                <h5 class="fw-semibold text-body-highlight mb-0">Type</h5>
                                            </td>
                                            <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                                <p class="mb-0 w-max-content">:</p>
                                            </td>
                                            <td class="border-top pt-3  pb-3 text-nowrap">
                                                <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['flexible_co_type']) && $hpoData['flexible_co_type'] == 1) ? 'Paid' : 'Free'; ?></p>
                                            </td>
                                        </tr>
                                        <?php if (!empty($hpoData['flexible_co_type']) && $hpoData['flexible_co_type'] == 1 && !empty($hpoData['flexible_co_condition'])): ?>
                                            <tr>
                                                <td class="border-top pt-3 text-nowrap">
                                                    <h5 class="fw-semibold text-body-highlight mb-0">Condition</h5>
                                                </td>
                                                <td class="border-top px-3 pt-3 w-max-content">
                                                    <p class="mb-0 w-max-content">:</p>
                                                </td>
                                                <td class="border-top pt-3  text-nowrap">
                                                    <p class="mb-0 text-body-secondary"><?= $hpoData['flexible_co_condition']; ?></p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Cancellation Policy -->
                        <h5 class="mb-3 fw-bolder mt-4">Cancellation Policy</h5>
                        <div class="scrollbar">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th style="width: 176px"></th>
                                        <th style="width: 32px"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Type</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['refund_policy_type']) && $hpoData['refund_policy_type'] == 1) ? 'Optional Refund' : 'Non Refundable'; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Full refund</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['full_refund_allowed']) && $hpoData['full_refund_allowed'] == 1) ? 'Yes' : 'No'; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Partial refund</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['partial_refund_allowed']) && $hpoData['partial_refund_allowed'] == 1) ? 'Yes' : 'No'; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pet Policy -->
                        <h5 class="mb-3 fw-bolder mt-4">Pet Policy</h5>
                        <div class="scrollbar">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th style="width: 176px"></th>
                                        <th style="width: 32px"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Type</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['pet_policy_type']) && $hpoData['pet_policy_type'] == 1) ? 'Allowed' : 'Not Allowed'; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Pet Restricted Zones</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['pet_restricted_zones']) && $hpoData['pet_restricted_zones'] == 1) ? 'Available' : 'Not Available'; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Additional Charges</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['pet_additional_charges']) && $hpoData['pet_additional_charges'] == 1) ? 'Yes' : 'No'; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Child Policy -->
                        <h5 class="mb-3 fw-bolder mt-4">Child Policy</h5>
                        <div class="scrollbar">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th style="width: 176px"></th>
                                        <th style="width: 32px"></th>
                                        <th></th>
                                    </tr>
                                    <?php
                                    $ageSeg = !empty($hpoData['age_segments']) ? json_decode($hpoData['age_segments'], true) : [];
                                    if (!empty($ageSeg)): ?>
                                        <?php foreach ($ageSeg as $index => $segment): ?>
                                            <tr>
                                                <td class="border-top pt-3 text-nowrap  pb-3">
                                                    <h5 class="fw-semibold text-body-highlight mb-0">Age Segment <?= $index + 1; ?></h5>
                                                </td>
                                                <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                                    <p class="mb-0 w-max-content">:</p>
                                                </td>
                                                <td class="border-top pt-3  pb-3 text-nowrap">
                                                    <p class="mb-0 text-body-secondary"><?= $segment['from'] ?? 0; ?> - <?= $segment['to'] ?? 0; ?> Years</p>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="pt-3 pb-3 text-muted">No age segments defined.</td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Documentation Requirement</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['child_doc_requirement']) && $hpoData['child_doc_requirement'] == 1) ? 'Available' : 'Not Available'; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Taxes -->
                        <h5 class="mb-3 fw-bolder mt-4">Included Taxes in your rate</h5>
                        <div class="scrollbar">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th style="width: 176px"></th>
                                        <th style="width: 32px"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">VAT</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['vat_included']) && $hpoData['vat_included'] == 1) ? 'Available' : 'Not Available'; ?></p>
                                        </td>
                                    </tr>
                                    <?php if (!empty($hpoData['vat_included']) && $hpoData['vat_included'] == 1): ?>
                                        <tr>
                                            <td class="border-top pt-3 text-nowrap  pb-3">
                                                <h5 class="fw-semibold text-body-highlight mb-0">Type</h5>
                                            </td>
                                            <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                                <p class="mb-0 w-max-content">:</p>
                                            </td>
                                            <td class="border-top pt-3  pb-3 text-nowrap">
                                                <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['vat_radio']) && $hpoData['vat_radio'] == 1) ? 'Paid' : 'Free'; ?></p>
                                            </td>
                                        </tr>
                                        <?php if (!empty($hpoData['vat_radio']) && $hpoData['vat_radio'] == 1 && !empty($hpoData['vat_condition'])): ?>
                                            <tr>
                                                <td class="border-top pt-3 text-nowrap">
                                                    <h5 class="fw-semibold text-body-highlight mb-0">Condition</h5>
                                                </td>
                                                <td class="border-top px-3 pt-3 w-max-content">
                                                    <p class="mb-0 w-max-content">:</p>
                                                </td>
                                                <td class="border-top pt-3  text-nowrap">
                                                    <p class="mb-0 text-body-secondary"><?= $hpoData['vat_condition']; ?></p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">GST</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['gst_included']) && $hpoData['gst_included'] == 1) ? 'Available' : 'Not Available'; ?></p>
                                        </td>
                                    </tr>
                                    <?php if (!empty($hpoData['gst_included']) && $hpoData['gst_included'] == 1): ?>
                                        <tr>
                                            <td class="border-top pt-3 text-nowrap  pb-3">
                                                <h5 class="fw-semibold text-body-highlight mb-0">Type</h5>
                                            </td>
                                            <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                                <p class="mb-0 w-max-content">:</p>
                                            </td>
                                            <td class="border-top pt-3  pb-3 text-nowrap">
                                                <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['gst_radio']) && $hpoData['gst_radio'] == 1) ? 'Paid' : 'Free'; ?></p>
                                            </td>
                                        </tr>
                                        <?php if (!empty($hpoData['gst_radio']) && $hpoData['gst_radio'] == 1 && !empty($hpoData['gst_condition'])): ?>
                                            <tr>
                                                <td class="border-top pt-3 text-nowrap">
                                                    <h5 class="fw-semibold text-body-highlight mb-0">Condition</h5>
                                                </td>
                                                <td class="border-top px-3 pt-3 w-max-content">
                                                    <p class="mb-0 w-max-content">:</p>
                                                </td>
                                                <td class="border-top pt-3  text-nowrap">
                                                    <p class="mb-0 text-body-secondary"><?= $hpoData['gst_condition']; ?></p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Hotel tax</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['hotel_tax_included']) && $hpoData['hotel_tax_included'] == 1) ? 'Available' : 'Not Available'; ?></p>
                                        </td>
                                    </tr>
                                    <?php if (!empty($hpoData['hotel_tax_included']) && $hpoData['hotel_tax_included'] == 1): ?>
                                        <tr>
                                            <td class="border-top pt-3 text-nowrap  pb-3">
                                                <h5 class="fw-semibold text-body-highlight mb-0">Type</h5>
                                            </td>
                                            <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                                <p class="mb-0 w-max-content">:</p>
                                            </td>
                                            <td class="border-top pt-3  pb-3 text-nowrap">
                                                <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['hotel_tax_radio']) && $hpoData['hotel_tax_radio'] == 1) ? 'Paid' : 'Free'; ?></p>
                                            </td>
                                        </tr>
                                        <?php if (!empty($hpoData['hotel_tax_radio']) && $hpoData['hotel_tax_radio'] == 1 && !empty($hpoData['hotel_tax_condition'])): ?>
                                            <tr>
                                                <td class="border-top pt-3 text-nowrap">
                                                    <h5 class="fw-semibold text-body-highlight mb-0">Condition</h5>
                                                </td>
                                                <td class="border-top px-3 pt-3 w-max-content">
                                                    <p class="mb-0 w-max-content">:</p>
                                                </td>
                                                <td class="border-top pt-3  text-nowrap">
                                                    <p class="mb-0 text-body-secondary"><?= $hpoData['hotel_tax_condition']; ?></p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">City / District tax</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['city_dist_tax_included']) && $hpoData['city_dist_tax_included'] == 1) ? 'Available' : 'Not Available'; ?></p>
                                        </td>
                                    </tr>
                                    <?php if (!empty($hpoData['city_dist_tax_included']) && $hpoData['city_dist_tax_included'] == 1): ?>
                                        <tr>
                                            <td class="border-top pt-3 text-nowrap  pb-3">
                                                <h5 class="fw-semibold text-body-highlight mb-0">Type</h5>
                                            </td>
                                            <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                                <p class="mb-0 w-max-content">:</p>
                                            </td>
                                            <td class="border-top pt-3  pb-3 text-nowrap">
                                                <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['regional_location_tax_radio']) && $hpoData['regional_location_tax_radio'] == 1) ? 'Paid' : 'Free'; ?></p>
                                            </td>
                                        </tr>
                                        <?php if (!empty($hpoData['regional_location_tax_radio']) && $hpoData['regional_location_tax_radio'] == 1 && !empty($hpoData['cdt_condition'])): ?>
                                            <tr>
                                                <td class="border-top pt-3 text-nowrap">
                                                    <h5 class="fw-semibold text-body-highlight mb-0">Condition</h5>
                                                </td>
                                                <td class="border-top px-3 pt-3 w-max-content">
                                                    <p class="mb-0 w-max-content">:</p>
                                                </td>
                                                <td class="border-top pt-3  text-nowrap">
                                                    <p class="mb-0 text-body-secondary"><?= $hpoData['cdt_condition']; ?></p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Tourist tax</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['tourist_tax_included']) && $hpoData['tourist_tax_included'] == 1) ? 'Available' : 'Not Available'; ?></p>
                                        </td>
                                    </tr>
                                    <?php if (!empty($hpoData['tourist_tax_included']) && $hpoData['tourist_tax_included'] == 1): ?>
                                        <tr>
                                            <td class="border-top pt-3 text-nowrap  pb-3">
                                                <h5 class="fw-semibold text-body-highlight mb-0">Type</h5>
                                            </td>
                                            <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                                <p class="mb-0 w-max-content">:</p>
                                            </td>
                                            <td class="border-top pt-3  pb-3 text-nowrap">
                                                <p class="mb-0 text-body-secondary"><?= (!empty($hpoData['tourist_tax_radio']) && $hpoData['tourist_tax_radio'] == 1) ? 'Paid' : 'Free'; ?></p>
                                            </td>
                                        </tr>
                                        <?php if (!empty($hpoData['tourist_tax_radio']) && $hpoData['tourist_tax_radio'] == 1 && !empty($hpoData['tourist_tax_condition'])): ?>
                                            <tr>
                                                <td class="border-top pt-3 text-nowrap">
                                                    <h5 class="fw-semibold text-body-highlight mb-0">Condition</h5>
                                                </td>
                                                <td class="border-top px-3 pt-3 w-max-content">
                                                    <p class="mb-0 w-max-content">:</p>
                                                </td>
                                                <td class="border-top pt-3  text-nowrap">
                                                    <p class="mb-0 text-body-secondary"><?= $hpoData['tourist_tax_condition']; ?></p>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Documentations -->
                        <h5 class="mb-3 fw-bolder mt-4">Your Documentations</h5>
                        <div class="scrollbar">
                            <table class="w-100">
                                <tbody>
                                    <tr>
                                        <th style="width: 176px"></th>
                                        <th style="width: 32px"></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Property Registration No.</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= !empty($hpoData['property_registration_no']) ? $hpoData['property_registration_no'] : 'Not available'; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap  pb-3">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Business Registration No.</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content  pb-3">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  pb-3 text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= !empty($hpoData['business_registration_no']) ? $hpoData['business_registration_no'] : 'Not available'; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-top pt-3 text-nowrap">
                                            <h5 class="fw-semibold text-body-highlight mb-0">Taxpayer Identification No.</h5>
                                        </td>
                                        <td class="border-top px-3 pt-3 w-max-content">
                                            <p class="mb-0 w-max-content">:</p>
                                        </td>
                                        <td class="border-top pt-3  text-nowrap">
                                            <p class="mb-0 text-body-secondary"><?= !empty($hpoData['taxpayer_identification_no']) ? $hpoData['taxpayer_identification_no'] : 'Not available'; ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-6">
        <button class="btn btn-primary px-6 px-sm-11" id="finished">Done</button>
    </div>
</div>
