<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-room/Add-room'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>
<div class="tab-pane" role="tabpanel" aria-labelledby="add-room-wizard-tab5"
    id="add-room-wizard-tab5">
    <div class="row g-0">
        <div class="col-xxl-10">
            <h3 class="mb-2">We’re building your listing</h3>
            <p class="mb-5 text-body-tertiary">We're working on getting your property set up and
                ready for guests. Stay tuned for updates and start accepting bookings soon!</p>
            <div class="alert alert-subtle-success alert-dismissible fade show mb-5" role="alert">
                <p class="mb-0 flex-1 fw-semibold fs-9 fs-sm-8">Congratulations on your
                    successful listing! Join a community of hospitality professionals as a host.
                    Your hard work will turn your home into a sought-after destination. We
                    anticipate hearing about your achievements.</p><button class="btn-close"
                    type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <h4 class="text-body mb-3"> Room information<a class="fs-9 mx-2" href="#!">Edit</a>
            </h4>
            <div class="row gx-7 gx-xl-4 gx-xxl-7">
                <div class="col-md-7 col-xxl-6">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="p-0" style="width: 155px"></th>
                                <th class="p-0" style="width: 16px"></th>
                                <th class="p-0"></th>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-border-all fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="border-all" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M384 96V224H256V96H384zm0 192V416H256V288H384zM192 224H64V96H192V224zM64 288H192V416H64V288zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-border-all"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Room type</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Presidential
                                        suite</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-file-pen fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="file-pen" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-file-pen"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Room name</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Kempinski
                                        Jakarta</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-file-pen fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="file-pen" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V299.6l-94.7 94.7c-8.2 8.2-14 18.5-16.8 29.7l-15 60.1c-2.3 9.4-1.8 19 1.4 27.8H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-file-pen"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Bedroom’s</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">01</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-bed fs-9" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="bed"
                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M32 32c17.7 0 32 14.3 32 32V320H288V160c0-17.7 14.3-32 32-32H544c53 0 96 43 96 96V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V416H352 320 64v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V64C0 46.3 14.3 32 32 32zm144 96a80 80 0 1 1 0 160 80 80 0 1 1 0-160z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-bed"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Number of beds</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">01</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-person-shelter fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="person-shelter" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M271.9 4.2c-9.8-5.6-21.9-5.6-31.8 0l-224 128C6.2 137.9 0 148.5 0 160V480c0 17.7 14.3 32 32 32s32-14.3 32-32V178.6L256 68.9 448 178.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V160c0-11.5-6.2-22.1-16.1-27.8l-224-128zM256 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zm-8 280V400h16v88c0 13.3 10.7 24 24 24s24-10.7 24-24V313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3H246.2c-32.4 0-62.1 17.8-77.5 46.3l-37.9 70.3c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L200 313.5V488c0 13.3 10.7 24 24 24s24-10.7 24-24z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-person-shelter"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Room size</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">2.13 x 3.66
                                        sq.m</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5 col-xxl-6">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="p-0" style="width: 155px"></th>
                                <th class="p-0" style="width: 16px"></th>
                                <th class="p-0"></th>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-user fs-9" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="user"
                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-user"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Adults</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">02</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-children fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="children" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M160 0a64 64 0 1 1 0 128A64 64 0 1 1 160 0zM88 480V400H70.2c-10.9 0-18.6-10.7-15.2-21.1l31.1-93.4L57.5 323.3c-10.7 14.1-30.8 16.8-44.8 6.2s-16.8-30.7-6.2-44.8L65.4 207c22.4-29.6 57.5-47 94.6-47s72.2 17.4 94.6 47l58.9 77.7c10.7 14.1 7.9 34.2-6.2 44.8s-34.2 7.9-44.8-6.2l-28.6-37.8L265 378.9c3.5 10.4-4.3 21.1-15.2 21.1H232v80c0 17.7-14.3 32-32 32s-32-14.3-32-32V400H152v80c0 17.7-14.3 32-32 32s-32-14.3-32-32zM480 0a64 64 0 1 1 0 128A64 64 0 1 1 480 0zm-8 384v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V300.5L395.1 321c-9.4 15-29.2 19.4-44.1 10s-19.4-29.2-10-44.1l51.7-82.1c17.6-27.9 48.3-44.9 81.2-44.9h12.3c33 0 63.7 16.9 81.2 44.9L619.1 287c9.4 15 4.9 34.7-10 44.1s-34.7 4.9-44.1-10L552 300.5V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V384H472z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-children"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Childs</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">01</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-bath fs-9" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="bath"
                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-bath"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Bathroom’s</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">02</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-person-booth fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="person-booth" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V192h64V32zm320 0c0-17.7-14.3-32-32-32s-32 14.3-32 32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM224 512c17.7 0 32-14.3 32-32V320H192V480c0 17.7 14.3 32 32 32zM320 0c-9.3 0-18.1 4-24.2 11s-8.8 16.3-7.5 25.5l31.2 218.6L288.6 409.7c-3.5 17.3 7.8 34.2 25.1 37.7s34.2-7.8 37.7-25.1l.7-3.6c1.3 16.4 15.1 29.4 31.9 29.4c17.7 0 32-14.3 32-32c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM112 80A48 48 0 1 0 16 80a48 48 0 1 0 96 0zm0 261.3V269.3l4.7 4.7c9 9 21.2 14.1 33.9 14.1H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H157.3l-41.6-41.6c-14.3-14.3-33.8-22.4-54-22.4C27.6 160 0 187.6 0 221.6v55.7l0 .9V480c0 17.7 14.3 32 32 32s32-14.3 32-32V384l32 42.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V421.3c0-10.4-3.4-20.5-9.6-28.8L112 341.3z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-person-booth"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Balcony</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">01</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="text-body mb-4 mt-5">Pricing<a class="fs-9 mx-2" href="#!">Edit</a></h4>
            <h6 class="mb-2">Across all days</h6>
            <h3 class="mb-0">$894</h3>
            <h4 class="text-body mb-3 mt-7">Amenities<a class="fs-9 mx-2" href="#!">Edit</a>
            </h4>
            <div class="row gx-7 gx-xl-4 gx-xxl-7">
                <div class="col-md-7 col-xxl-6">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="p-0" style="width: 155px"></th>
                                <th class="p-0" style="width: 16px"></th>
                                <th class="p-0"></th>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-wifi fs-9" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="wifi"
                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M54.2 202.9C123.2 136.7 216.8 96 320 96s196.8 40.7 265.8 106.9c12.8 12.2 33 11.8 45.2-.9s11.8-33-.9-45.2C549.7 79.5 440.4 32 320 32S90.3 79.5 9.8 156.7C-2.9 169-3.3 189.2 8.9 202s32.5 13.2 45.2 .9zM320 256c56.8 0 108.6 21.1 148.2 56c13.3 11.7 33.5 10.4 45.2-2.8s10.4-33.5-2.8-45.2C459.8 219.2 393 192 320 192s-139.8 27.2-190.5 72c-13.3 11.7-14.5 31.9-2.8 45.2s31.9 14.5 45.2 2.8c39.5-34.9 91.3-56 148.2-56zm64 160a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-wifi"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Wifi</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Free</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-utensils fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="utensils" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-utensils"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Restaurant</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Launch &amp;
                                        Dinner</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-person-swimming fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="person-swimming" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M309.5 178.4L447.9 297.1c-1.6 .9-3.2 2-4.8 3c-18 12.4-40.1 20.3-59.2 20.3c-19.6 0-40.8-7.7-59.2-20.3c-22.1-15.5-51.6-15.5-73.7 0c-17.1 11.8-38 20.3-59.2 20.3c-10.1 0-21.1-2.2-31.9-6.2C163.1 193.2 262.2 96 384 96h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384c-26.9 0-52.3 6.6-74.5 18.4zM160 160A64 64 0 1 1 32 160a64 64 0 1 1 128 0zM306.5 325.9C329 341.4 356.5 352 384 352c26.9 0 55.4-10.8 77.4-26.1l0 0c11.9-8.5 28.1-7.8 39.2 1.7c14.4 11.9 32.5 21 50.6 25.2c17.2 4 27.9 21.2 23.9 38.4s-21.2 27.9-38.4 23.9c-24.5-5.7-44.9-16.5-58.2-25C449.5 405.7 417 416 384 416c-31.9 0-60.6-9.9-80.4-18.9c-5.8-2.7-11.1-5.3-15.6-7.7c-4.5 2.4-9.7 5.1-15.6 7.7c-19.8 9-48.5 18.9-80.4 18.9c-33 0-65.5-10.3-94.5-25.8c-13.4 8.4-33.7 19.3-58.2 25c-17.2 4-34.4-6.7-38.4-23.9s6.7-34.4 23.9-38.4c18.1-4.2 36.2-13.3 50.6-25.2c11.1-9.4 27.3-10.1 39.2-1.7l0 0C136.7 341.2 165.1 352 192 352c27.5 0 55-10.6 77.5-26.1c11.1-7.9 25.9-7.9 37 0z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-person-swimming"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Pool</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Paid</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-ban-smoking fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="ban-smoking" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M99.5 144.8L178.7 224l96 96 92.5 92.5C335.9 434.9 297.5 448 256 448C150 448 64 362 64 256c0-41.5 13.1-79.9 35.5-111.2zM333.3 288l-32-32H384v32H333.3zm32 32H400c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16H269.3L144.8 99.5C176.1 77.1 214.5 64 256 64c106 0 192 86 192 192c0 41.5-13.1 79.9-35.5 111.2L365.3 320zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM272 96c-8.8 0-16 7.2-16 16c0 26.5 21.5 48 48 48h32c8.8 0 16 7.2 16 16s7.2 16 16 16s16-7.2 16-16c0-26.5-21.5-48-48-48H304c-8.8 0-16-7.2-16-16s-7.2-16-16-16zM229.5 320l-96-96H112c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H229.5z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-ban-smoking"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">No smoking</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Available
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-square-parking fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="square-parking" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM192 256h48c17.7 0 32-14.3 32-32s-14.3-32-32-32H192v64zm48 64H192v32c0 17.7-14.3 32-32 32s-32-14.3-32-32V288 168c0-22.1 17.9-40 40-40h72c53 0 96 43 96 96s-43 96-96 96z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-square-parking"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Parking</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Paid</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-umbrella-beach fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="umbrella-beach" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M346.3 271.8l-60.1-21.9L214 448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H544c17.7 0 32-14.3 32-32s-14.3-32-32-32H282.1l64.1-176.2zm121.1-.2l-3.3 9.1 67.7 24.6c18.1 6.6 38-4.2 39.6-23.4c6.5-78.5-23.9-155.5-80.8-208.5c2 8 3.2 16.3 3.4 24.8l.2 6c1.8 57-7.3 113.8-26.8 167.4zM462 99.1c-1.1-34.4-22.5-64.8-54.4-77.4c-.9-.4-1.9-.7-2.8-1.1c-33-11.7-69.8-2.4-93.1 23.8l-4 4.5C272.4 88.3 245 134.2 226.8 184l-3.3 9.1L434 269.7l3.3-9.1c18.1-49.8 26.6-102.5 24.9-155.5l-.2-6zM107.2 112.9c-11.1 15.7-2.8 36.8 15.3 43.4l71 25.8 3.3-9.1c19.5-53.6 49.1-103 87.1-145.5l4-4.5c6.2-6.9 13.1-13 20.5-18.2c-79.6 2.5-154.7 42.2-201.2 108z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-umbrella-beach"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Beach view</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Available
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-person-booth fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="person-booth" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V192h64V32zm320 0c0-17.7-14.3-32-32-32s-32 14.3-32 32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V32zM224 512c17.7 0 32-14.3 32-32V320H192V480c0 17.7 14.3 32 32 32zM320 0c-9.3 0-18.1 4-24.2 11s-8.8 16.3-7.5 25.5l31.2 218.6L288.6 409.7c-3.5 17.3 7.8 34.2 25.1 37.7s34.2-7.8 37.7-25.1l.7-3.6c1.3 16.4 15.1 29.4 31.9 29.4c17.7 0 32-14.3 32-32c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM112 80A48 48 0 1 0 16 80a48 48 0 1 0 96 0zm0 261.3V269.3l4.7 4.7c9 9 21.2 14.1 33.9 14.1H224c17.7 0 32-14.3 32-32s-14.3-32-32-32H157.3l-41.6-41.6c-14.3-14.3-33.8-22.4-54-22.4C27.6 160 0 187.6 0 221.6v55.7l0 .9V480c0 17.7 14.3 32 32 32s32-14.3 32-32V384l32 42.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V421.3c0-10.4-3.4-20.5-9.6-28.8L112 341.3z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-person-booth"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Balcony</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Sea View</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-5 col-xxl-6">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <th class="p-0" style="width: 155px"></th>
                                <th class="p-0" style="width: 16px"></th>
                                <th class="p-0"></th>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-wine-glass fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="wine-glass" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M32.1 29.3C33.5 12.8 47.4 0 64 0H256c16.6 0 30.5 12.8 31.9 29.3l14 168.4c6 72-42.5 135.2-109.9 150.6V448h48c17.7 0 32 14.3 32 32s-14.3 32-32 32H160 80c-17.7 0-32-14.3-32-32s14.3-32 32-32h48V348.4C60.6 333 12.1 269.8 18.1 197.8l14-168.4zm56 98.7H231.9l-5.3-64H93.4l-5.3 64z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-wine-glass"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Hotel bar</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Paid</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-people-roof fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="people-roof" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M335.5 4l288 160c15.4 8.6 21 28.1 12.4 43.5s-28.1 21-43.5 12.4L320 68.6 47.5 220c-15.4 8.6-34.9 3-43.5-12.4s-3-34.9 12.4-43.5L304.5 4c9.7-5.4 21.4-5.4 31.1 0zM320 160a40 40 0 1 1 0 80 40 40 0 1 1 0-80zM144 256a40 40 0 1 1 0 80 40 40 0 1 1 0-80zm312 40a40 40 0 1 1 80 0 40 40 0 1 1 -80 0zM226.9 491.4L200 441.5V480c0 17.7-14.3 32-32 32H120c-17.7 0-32-14.3-32-32V441.5L61.1 491.4c-6.3 11.7-20.8 16-32.5 9.8s-16-20.8-9.8-32.5l37.9-70.3c15.3-28.5 45.1-46.3 77.5-46.3h19.5c16.3 0 31.9 4.5 45.4 12.6l33.6-62.3c15.3-28.5 45.1-46.3 77.5-46.3h19.5c32.4 0 62.1 17.8 77.5 46.3l33.6 62.3c13.5-8.1 29.1-12.6 45.4-12.6h19.5c32.4 0 62.1 17.8 77.5 46.3l37.9 70.3c6.3 11.7 1.9 26.2-9.8 32.5s-26.2 1.9-32.5-9.8L552 441.5V480c0 17.7-14.3 32-32 32H472c-17.7 0-32-14.3-32-32V441.5l-26.9 49.9c-6.3 11.7-20.8 16-32.5 9.8s-16-20.8-9.8-32.5l36.3-67.5c-1.7-1.7-3.2-3.6-4.3-5.8L376 345.5V400c0 17.7-14.3 32-32 32H296c-17.7 0-32-14.3-32-32V345.5l-26.9 49.9c-1.2 2.2-2.6 4.1-4.3 5.8l36.3 67.5c6.3 11.7 1.9 26.2-9.8 32.5s-26.2 1.9-32.5-9.8z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-people-roof"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Common areas</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Available
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-table-tennis-paddle-ball fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="table-tennis-paddle-ball" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M480 288c-50.1 0-93.6 28.8-114.6 70.8L132.9 126.3l.6-.6 60.1-60.1c87.5-87.5 229.3-87.5 316.8 0c67.1 67.1 82.7 166.3 46.8 248.3C535.8 297.6 509 288 480 288zM113.3 151.9L354.1 392.7c-1.4 7.5-2.1 15.3-2.1 23.3c0 23.2 6.2 44.9 16.9 63.7c-3 .2-6.1 .3-9.2 .3H357c-33.9 0-66.5-13.5-90.5-37.5l-9.8-9.8c-13.1-13.1-34.6-12.4-46.8 1.7L152.2 501c-5.8 6.7-14.2 10.7-23 11s-17.5-3.1-23.8-9.4l-32-32c-6.3-6.3-9.7-14.9-9.4-23.8s4.3-17.2 11-23l66.6-57.7c14-12.2 14.8-33.7 1.7-46.8l-9.8-9.8c-24-24-37.5-56.6-37.5-90.5v-2.7c0-22.8 6.1-44.9 17.3-64.3zM480 320a96 96 0 1 1 0 192 96 96 0 1 1 0-192z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-table-tennis-paddle-ball"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Tennis courts</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Free</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-snowflake fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="snowflake" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M224 0c17.7 0 32 14.3 32 32V62.1l15-15c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-49 49v70.3l61.4-35.8 17.7-66.1c3.4-12.8 16.6-20.4 29.4-17s20.4 16.6 17 29.4l-5.2 19.3 23.6-13.8c15.3-8.9 34.9-3.7 43.8 11.5s3.8 34.9-11.5 43.8l-25.3 14.8 21.7 5.8c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17l-67.7-18.1L287.5 256l60.9 35.5 67.7-18.1c12.8-3.4 26 4.2 29.4 17s-4.2 26-17 29.4l-21.7 5.8 25.3 14.8c15.3 8.9 20.4 28.5 11.5 43.8s-28.5 20.4-43.8 11.5l-23.6-13.8 5.2 19.3c3.4 12.8-4.2 26-17 29.4s-26-4.2-29.4-17l-17.7-66.1L256 311.7v70.3l49 49c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-15-15V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V449.9l-15 15c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l49-49V311.7l-61.4 35.8-17.7 66.1c-3.4 12.8-16.6 20.4-29.4 17s-20.4-16.6-17-29.4l5.2-19.3L48.1 395.6c-15.3 8.9-34.9 3.7-43.8-11.5s-3.7-34.9 11.5-43.8l25.3-14.8-21.7-5.8c-12.8-3.4-20.4-16.6-17-29.4s16.6-20.4 29.4-17l67.7 18.1L160.5 256 99.6 220.5 31.9 238.6c-12.8 3.4-26-4.2-29.4-17s4.2-26 17-29.4l21.7-5.8L15.9 171.6C.6 162.7-4.5 143.1 4.4 127.9s28.5-20.4 43.8-11.5l23.6 13.8-5.2-19.3c-3.4-12.8 4.2-26 17-29.4s26 4.2 29.4 17l17.7 66.1L192 200.3V129.9L143 81c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l15 15V32c0-17.7 14.3-32 32-32z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-snowflake"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Air conditioning</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Available
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg
                                            class="svg-inline--fa fa-bath fs-9" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="bath"
                                            role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M96 77.3c0-7.3 5.9-13.3 13.3-13.3c3.5 0 6.9 1.4 9.4 3.9l14.9 14.9C130 91.8 128 101.7 128 112c0 19.9 7.2 38 19.2 52c-5.3 9.2-4 21.1 3.8 29c9.4 9.4 24.6 9.4 33.9 0L289 89c9.4-9.4 9.4-24.6 0-33.9c-7.9-7.9-19.8-9.1-29-3.8C246 39.2 227.9 32 208 32c-10.3 0-20.2 2-29.2 5.5L163.9 22.6C149.4 8.1 129.7 0 109.3 0C66.6 0 32 34.6 32 77.3V256c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H96V77.3zM32 352v16c0 28.4 12.4 54 32 71.6V480c0 17.7 14.3 32 32 32s32-14.3 32-32V464H384v16c0 17.7 14.3 32 32 32s32-14.3 32-32V439.6c19.6-17.6 32-43.1 32-71.6V352H32z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-bath"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Bathtub</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Available
                                    </h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap py-2">
                                    <div class="d-flex gap-2"><svg class="svg-inline--fa fa-tv fs-9"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="tv" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M64 64V352H576V64H64zM0 64C0 28.7 28.7 0 64 0H576c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zM128 448H512c17.7 0 32 14.3 32 32s-14.3 32-32 32H128c-17.7 0-32-14.3-32-32s14.3-32 32-32z">
                                            </path>
                                        </svg><!-- <span class="fs-9 fa-solid fa-tv"></span> Font Awesome fontawesome.com -->
                                        <h5 class="mb-0">Flat-screen TV</h5>
                                    </div>
                                </td>
                                <td class="py-2 pe-1 px-sm-3">
                                    <h5 class="fw-normal mb-0">:</h5>
                                </td>
                                <td class="py-2">
                                    <h5 class="fw-normal mb-0 text-body-secondary">Paid</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h4 class="text-body mb-4 mt-7">Picture<a class="fs-9 mx-2" href="#!">Edit</a></h4>
            <div class="row g-3">
                <div class="col-sm-4"><img class="rounded-2 w-100 object-fit-cover"
                        src="<?= base_url() ?>assets/img/gallery/59.png" alt="" height="160"></div>
                <div class="col-sm-4"><img class="rounded-2 w-100 object-fit-cover"
                        src="<?= base_url() ?>assets/img/gallery/60.png" alt="" height="160"></div>
                <div class="col-sm-4"><img class="rounded-2 w-100 object-fit-cover"
                        src="<?= base_url() ?>assets/img/gallery/61.png" alt="" height="160"></div>
                <div class="col-sm-4"><img class="rounded-2 w-100 object-fit-cover"
                        src="<?= base_url() ?>assets/img/gallery/62.png" alt="" height="160"></div>
                <div class="col-sm-4"><img class="rounded-2 w-100 object-fit-cover"
                        src="<?= base_url() ?>assets/img/gallery/63.png" alt="" height="160"></div>
            </div>
            <div class="mt-6 d-flex flex-wrap gap-2"><button class="btn btn-phoenix-danger"
                    type="button">Discard</button><button class="btn btn-phoenix-primary"
                    type="button">Save draft</button><button class="btn btn-primary px-6 px-sm-11"
                    type="submit">Open for
                    Booking</button></div>
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
                    if (resp) {
                        console.log(resp);

                    }

                } catch (error) {
                    console.error(`Error : ${error}`);
                }

            })
        }
    });
</script>
<?= $this->endSection(); ?>