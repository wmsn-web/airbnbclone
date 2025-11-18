<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Booking - <?= $this->renderSection('pageTitle') ?></title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/favicons/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicons/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicons/favicon-16x16.png'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/favicons/favicon.ico'); ?>">
    <!-- <link rel="manifest" href="<?= base_url('assets/img/favicons/manifest.json'); ?>"> -->
    <meta name="msapplication-TileImage" content="<?= base_url('assets/img/favicons/mstile-150x150.png'); ?>">
    <meta name="theme-color" content="#ffffff">
    <script src="<?= base_url('vendors/simplebar/simplebar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config.js'); ?>"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="<?= base_url('vendors/flatpickr/flatpickr.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('vendors/nouislider/nouislider.min.css'); ?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="<?= base_url('vendors/simplebar/simplebar.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="<?= base_url('assets/css/theme-rtl.min.css'); ?>" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="<?= base_url('assets/css/theme.min.css'); ?>" type="text/css" rel="stylesheet" id="style-default">
    <link href="<?= base_url('assets/css/user-rtl.min.css'); ?>" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="<?= base_url('assets/css/user.min.css'); ?>" type="text/css" rel="stylesheet" id="user-style-default">

    <link rel="stylesheet" href="<?= base_url('vendors/notyf@3/notyf.min.css') ?>">

    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>

    <style>
        #global-loader {
            position: fixed;
            z-index: 50000;
            background: white;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            height: 100%;
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        .loader-img {
            position: absolute;
            right: 0;
            bottom: 0;
            top: 43%;
            left: 0;
            margin: 0 auto;
            text-align: center;
        }
    </style>
    <?= $this->renderSection('head') ?>
    <link href="<?= base_url('vendors/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/custom/custom.css'); ?>" rel="stylesheet">
</head>

<body>
    <div id="global-loader" class="light-loader">
        <img src="<?= base_url('assets/img/spinner/loader.png') ?>" class="loader-img" alt="Loader">
    </div>
    <?php $current = uri_string();
    $session = session();
    ?>

    <main class="main" id="top">
        <div class="bg-primary-subtle py-2">
            <div class="container-medium d-flex align-items-center justify-content-between">
                <a class="btn btn-link p-0 text-body d-none d-md-block" href="<?= base_url() ?>">
                    <img src="<?= base_url('assets/img/icons/logo.png'); ?>" alt="phoenix" width="27" />
                </a>
                <div class="dropdown">
                    <button class="btn btn-sm p-0 d-md-none fs-8" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                        <span class="fas fa-ellipsis-h"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="z-index: 9999">
                        <li><a class="dropdown-item" href="#!"><span class="fa-brands fa-whatsapp me-2"></span>+01 123 456 7890</a></li>
                        <li><a class="dropdown-item" href="#!"><span class="fa fa-phone me-2"></span>+01 123 456 7890</a></li>
                        <li><a class="dropdown-item" href="#!">Contact</a></li>
                    </ul>
                </div>
                <ul class="d-none d-md-flex align-items-center gap-5 list-unstyled mb-0">
                    <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="tel:+01123581321"> <span class="fa-brands fa-whatsapp me-2"></span>+01 123 456 7890</a></li>
                    <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="tel:+01123581321"> <span class="fa fa-phone me-2"></span>+01 123 456 7890</a></li>
                    <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="mailto:example@gmail.com">Contact</a></li>
                    <?php if (session()->has('user_id')): ?>
                        <?php
                        $userModel = new \App\Models\UserModel();
                        $user = $userModel->find(session('user_id'));
                        ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                                <div class="avatar avatar-l ">
                                    <img class="rounded-circle border border-success " src="<?= base_url('assets/img/team/avatar-placeholder.webp') ?>" alt="" />
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border" aria-labelledby="navbarDropdownUser">
                                <div class="card position-relative border-0">
                                    <div class="card-body p-0">
                                        <div class="text-center pt-4 pb-3">
                                            <div class="avatar avatar-xl ">
                                                <img class="rounded-circle " src="<?= base_url('assets/img/team/avatar-placeholder.webp') ?>" alt="" />
                                            </div>
                                            <h6 class="mt-2 text-body-emphasis"><?= esc($user['name'] ?? $user['email']) ?> </h6>
                                        </div>
                                    </div>
                                    <div class="overflow-auto scrollbar" style="height: 10rem;">
                                        <ul class="nav d-flex flex-column mb-2 pb-1">
                                            <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="user"></span><span>Profile</span></a></li>
                                            <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"><span class="me-2 text-body align-bottom" data-feather="pie-chart"></span>Bookings</a></li>
                                            <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="lock"></span>Posts &amp; Activity</a></li>
                                            <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                                            <li class="nav-item"><a class="nav-link px-3 d-block" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#forgotpwdmodal"> <span class="me-2 text-body align-bottom" data-feather="key"></span>Forgot password</a></li>
                                            <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help Center</a></li>
                                            <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="globe"></span>Language</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-footer p-0 border-top border-translucent">
                                        <div class="px-3 mt-2">
                                            <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="<?= base_url('logout') ?>"> <span class="me-2" data-feather="log-out"> </span>Sign out</a>
                                        </div>
                                        <div class="my-2 text-center fw-bold fs-10 text-body-quaternary">
                                            <a class="text-body-quaternary me-1" href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a class="text-body-quaternary ms-1" href="#!">Cookies</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php else: ?>
                        <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModel"><span class="fa fa-user-plus me-1"></span>Log in</a></li>
                    <?php endif; ?>

                </ul>
                <?php if (session()->has('user_id')): ?>
                    <ul class="d-flex d-md-none gap-5 list-unstyled mb-0">
                        <a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-l ">
                                <img class="rounded-circle border border-success " src="<?= base_url('assets/img/team/avatar-placeholder.webp') ?>" alt="" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border" aria-labelledby="navbarDropdownUser">
                            <div class="card position-relative border-0">
                                <div class="card-body p-0">
                                    <div class="text-center pt-4 pb-3">
                                        <div class="avatar avatar-xl ">
                                            <img class="rounded-circle " src="<?= base_url('assets/img/team/avatar-placeholder.webp') ?>" alt="" />
                                        </div>
                                        <h6 class="mt-2 text-body-emphasis"><?= esc($user['name'] ?? $user['email']) ?> </h6>
                                    </div>
                                </div>
                                <div class="overflow-auto scrollbar" style="height: 10rem;">
                                    <ul class="nav d-flex flex-column mb-2 pb-1">
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="user"></span><span>Profile</span></a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"><span class="me-2 text-body align-bottom" data-feather="pie-chart"></span>Bookings</a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="lock"></span>Posts &amp; Activity</a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#forgotpwdmodal"> <span class="me-2 text-body align-bottom" data-feather="key"></span>Forgot password</a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help Center</a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span class="me-2 text-body align-bottom" data-feather="globe"></span>Language</a></li>
                                    </ul>
                                </div>
                                <div class="card-footer p-0 border-top border-translucent">
                                    <div class="px-3 mt-2">
                                        <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="<?= base_url('logout') ?> <span class=" me-2" data-feather="log-out"> </span>Sign out</a>
                                    </div>
                                    <div class="my-2 text-center fw-bold fs-10 text-body-quaternary">
                                        <a class="text-body-quaternary me-1" href="#!">Privacy policy</a>&bull;<a class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a class="text-body-quaternary ms-1" href="#!">Cookies</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                <?php else: ?>
                    <ul class="d-flex d-md-none gap-5 list-unstyled mb-0">
                        <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModel"><span class="fa fa-user-plus me-1"></span>Log in</a></li>
                        <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#registerModal"><span class="fa fa-user me-1"></span>Sign up</a></li>
                    </ul>

                <?php endif; ?>
            </div>
        </div>
        <div class="bg-body-emphasis sticky-top" data-navbar-shadow-on-scroll="data-navbar-shadow-on-scroll">
            <nav class="navbar navbar-landing navbar-expand-lg container-medium">
                <!-- <a class="navbar-brand flex-1 flex-lg-grow-0 me-lg-8 me-xl-13" href="<?= base_url() ?>">
                    <div class="d-flex align-items-center">
                        <img src="<?= base_url('assets/img/icons/logo.png'); ?>" alt="phoenix" width="27" />
                        <h5 class="logo-text ms-2">Hotel Barcelona</h5>
                    </div>
                </a> -->
                <div class="d-flex d-md-none align-items-center gap-2 gap-sm-3 gap-md-4 my-2 order-lg-1">
                    <div class="d-flex align-items-center">
                        <img src="<?= base_url('assets/img/icons/logo.png'); ?>" alt="phoenix" width="27" />
                        <h5 class="logo-text ms-2">Hotel Barcelona</h5>
                    </div>
                </div>
                <button class="navbar-toggler fs-8 ps-1 ps-sm-3 pe-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mt-3 mt-lg-0">
                        <li class="nav-item border-bottom border-translucent border-bottom-lg-0">
                            <a class="nav-link <?= $current == '' ? 'text-primary' : '' ?>" href="#">Hotels</a>
                        </li>
                        <li class="nav-item border-bottom border-translucent border-bottom-lg-0">
                            <a class="nav-link" href="#">Destinations</a>
                        </li>
                        <li class="nav-item border-bottom border-translucent border-bottom-lg-0">
                            <a class="nav-link" href="#">Weddings</a>
                        </li>
                        <li class="nav-item border-bottom border-translucent border-bottom-lg-0">
                            <a class="nav-link" href="#">Events</a>
                        </li>
                        <li class="nav-item border-bottom border-translucent border-bottom-lg-0">
                            <a class="nav-link" href="#">Gastronomy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Christmas 2025</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Offers</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <?= $this->renderSection('content') ?>
    </main>
    <section class="py-0 mb-9">
        <div class="container-medium-md px-0 px-md-3">
            <div class="p-5 p-sm-7 py-xl-12 px-xl-15 rounded-md-2 overflow-hidden position-relative">
                <div class="bg-holder bg-holder overlay bg-opacity-85"
                    style="background-image:url(<?= base_url('assets/img/bg/43.png') ?>);background-position: center; background-size: cover;">
                </div>
                <!--/.bg-holder-->
                <div class="row g-5 position-relative justify-content-between">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-3">Discover</h5>
                        <div class="row g-3">
                            <div class="col">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1"><a class="text-secondary-lighter" href="#!">Home</a></li>
                                    <li class="mb-1"><a class="text-secondary-lighter" href="#!">Terms</a></li>
                                    <li class="mb-1"><a class="text-secondary-lighter" href="#!">Talent &amp; culture</a>
                                    </li>
                                    <li class="mb-1"><a class="text-secondary-lighter" href="#!">Destination</a></li>
                                    <li class="mb-1"><a class="text-secondary-lighter" href="#!">Sitemap</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-1"><a class="text-secondary-lighter" href="#!">Refund policy</a></li>
                                    <li class="mb-1"><a class="text-secondary-lighter" href="#!">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-3">Contact</h5><a class="d-block text-secondary-lighter mb-1 text-nowrap"
                            href="mailto:example@gmail.com"><span
                                class="fa-solid fa-envelope me-2 me-lg-1 me-xl-2"></span>example@gmail.com</a><a
                            class="d-block text-secondary-lighter mb-1" href="tel:+911234567890"><span
                                class="fa-solid fa-phone me-2 me-lg-1 me-xl-2"> </span>+911234567890</a>
                    </div>
                    <div class="col-lg-5">
                        <h2 class="text-white mb-2 fw-semibold">Enjoy your trip to the fullest</h2>
                        <p class="mb-5 text-secondary-lighter">Sign up and get notified<br />about best deals immediately
                        </p>
                        <div class="d-flex gap-2">
                            <div class="form-icon-container flex-1"><input class="form-control form-icon-input" type="text"
                                    placeholder="Your email address" /><span
                                    class="fa-solid fa-envelope form-icon text-body fs-9" data-fa-transform="up-2"></span>
                            </div><button class="btn btn-primary rounded">Sign up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container-medium">
        <div class="d-flex align-items-center justify-content-between mb-3"><a class="navbar-brand"
                href="">
                <div class="d-flex align-items-center"><img src="<?= base_url() ?>assets/img/icons/logo.png" alt="phoenix"
                        width="27" />
                    <h5 class="logo-text ms-2">firebnb</h5>
                </div>
            </a>
            <div class="dropdown"><button class="btn btn-sm p-0 d-md-none fs-8" type="button" data-bs-toggle="dropdown"
                    data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span
                        class="fas fa-ellipsis-h"></span></button>
                <ul class="dropdown-menu dropdown-menu-end" style="z-index: 9999">
                    <li><a class="dropdown-item" href="#!">Become a Host</a></li>
                    <li><a class="dropdown-item" href="#!">Blog</a></li>
                    <li><a class="dropdown-item" href="#!">Career</a></li>
                    <li><a class="dropdown-item" href="#!">Support</a></li>
                    <li><a class="dropdown-item" href="#!">+01 123 581321</a></li>
                </ul>
            </div>
            <ul class="d-none d-md-flex gap-5 list-unstyled mb-0">
                <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="#!">Become a Host</a></li>
                <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="#!">Blog</a></li>
                <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="#!">Career</a></li>
                <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="mailto:example@gmail.com"> <span
                            class="fa-regular fa-envelope me-2" data-fa-transform="down-1"></span>Support</a></li>
                <li><a class="lh-1 text-body-tertiary fw-semibold fs-9" href="tel:+911234567890"> <span
                            class="fa-brands fa-whatsapp me-2"></span>+91 123 456 7890</a></li>
            </ul>
        </div>
        <footer class="footer position-relative px-0">
            <div class="row g-0 justify-content-between align-items-center h-100">
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 mt-2 mt-sm-0 text-body">
                        <br class="d-sm-none" />&copy; <?= date('Y') ?> <a class="mx-1" href="<?= base_url('admin') ?>">Firebnb</a>
                        <!-- <span class="d-none d-sm-inline-block"></span>
                    <span class="d-none d-sm-inline-block mx-1">|</span> -->
                        All Rights Reserved.
                    </p>
                </div>
                <div class="col-12 col-sm-auto text-center">
                    <p class="mb-0 text-body-tertiary text-opacity-85">v1.0.0</p>
                </div>
            </div>
        </footer>
    </div>
    <?= $this->include('fronts/user/components/Modal-auth'); ?>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?= base_url('vendors/popper/popper.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/anchorjs/anchor.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/is/is.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/fontawesome/all.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/lodash/lodash.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/list.js/list.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/feather-icons/feather.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/dayjs/dayjs.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/phoenix.js'); ?>"></script>
    <script src="<?= base_url('vendors/flatpickr/flatpickr.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/nouislider/nouislider.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/isotope-layout/isotope.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('vendors/imagesloaded/imagesloaded.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('vendors/isotope-packery/packery-mode.pkgd.min.js') ?>"></script>
    <script src="<?= base_url('vendors/bigpicture/BigPicture.js') ?>"></script>
    <script src="<?= base_url('vendors/typed.js/typed.umd.js') ?>"></script>
    <script src="<?= base_url('vendors/swiper/swiper-bundle.min.js'); ?>"></script>
    <script src="<?= base_url('vendors/notyf@3/notyf.min.js') ?>"></script>
    <script>
        window.addEventListener('load', function() {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(() => loader.style.display = 'none', 500);
            }
        });
        const notyf = new Notyf({
            // duration: 0,
            duration: 5000,
            dismissible: true,
            position: {
                x: 'right',
                y: 'top',
            },
            types: [{
                    type: 'success',
                    background: 'rgba(24, 206, 15, 0.9)',
                    icon: {
                        className: 'fa-solid fa-circle-check',
                        tagName: 'i',
                        text: '',
                        color: '#fff'
                    },
                },
                {
                    type: 'error',
                    background: 'rgba(255, 54, 54, 0.9)',
                    icon: {
                        className: 'fa-solid fa-circle-xmark',
                        tagName: 'i',
                        text: '',
                        color: '#fff'
                    },
                },
                {
                    type: 'warning',
                    background: 'rgba(255, 178, 54, 0.9)',
                    icon: {
                        className: 'fa-solid fa-triangle-exclamation',
                        tagName: 'i',
                        text: '',
                        color: '#fff'
                    },
                },
                {
                    type: 'info',
                    background: 'rgba(44, 168, 255, 0.9)',
                    icon: {
                        className: 'fa-solid fa-circle-info',
                        tagName: 'i',
                        text: '',
                        color: '#fff'
                    },
                },
                {
                    type: 'general',
                    background: 'rgba(44, 168, 255, 0.9)',
                    icon: {
                        className: 'fa-solid fa-bell',
                        tagName: 'i',
                        text: '',
                        color: '#fff'
                    },
                },
            ],
        });
    </script>
    <?php if (session()->getFlashdata('success')): ?>
        <script>
            notyf.open({
                type: 'success',
                message: "<?= esc(session()->getFlashdata('success')) ?>"
            });
        </script>
    <?php elseif (session()->getFlashdata('error')): ?>
        <script>
            notyf.open({
                type: 'error',
                message: "<?= esc(session()->getFlashdata('error')) ?>"
            });
        </script>
    <?php endif; ?>
    <!-- <?php if (!session()->has('user_id')): ?> -->
    <?= $this->include('fronts/user/components/Modal-auth-js'); ?>
    <!-- <?php endif; ?> -->
    <?= $this->renderSection('script') ?>
</body>