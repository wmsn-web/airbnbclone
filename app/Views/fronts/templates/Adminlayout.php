<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Booking - Admin | <?= $this->renderSection('pageTitle') ?></title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/favicons/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicons/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicons/favicon-16x16.png'); ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/img/favicons/favicon.ico'); ?>">
    <link rel="manifest" href="<?= base_url('assets/img/favicons/manifest.json'); ?>">
    <meta name="msapplication-TileImage" content="<?= base_url('assets/img/favicons/mstile-150x150.png'); ?>">
    <meta name="theme-color" content="#ffffff">
    <script src="<?= base_url('vendors/simplebar/simplebar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config.js'); ?>"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <?= $this->renderSection('headUtilities') ?>
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
    <link href="<?= base_url('assets/custom/customadmin.css'); ?>" type="text/css" rel="stylesheet">
    <?= $this->renderSection('assets') ?>
</head>

<body>
    <div id="global-loader" class="light-loader">
        <img src="<?= base_url('assets/img/spinner/loader.png') ?>" class="loader-img" alt="Loader">
    </div>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <?php
        $isActive = uri_string();
        $hotelRoutes = [
            'admin/add-property',
            'admin/add_room',
            'admin/room_listing',
            'admin/hotel_listing',
        ];

        $hotelCollapsed = true; // Default to collapsed

        foreach ($hotelRoutes as $route) {
            if (strpos($isActive, $route) === 0) {
                $hotelCollapsed = false;
                break;
            }
        }
        $admindata = session()->get('admindata');
        ?>
        <nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                <!-- scrollbar removed-->
                <div class="navbar-vertical-content">
                    <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                        <li class="nav-item">
                            <!-- label-->
                            <p class="navbar-vertical-label">Travel Agency</p>
                            <hr class="navbar-vertical-line">
                            <!-- parent pages-->
                            <div class="nav-item-wrapper">
                                <a class="nav-link dropdown-indicator label-1 <?= $hotelCollapsed ? 'collapsed' : '' ?>" href="#nv-customization" role="button" data-bs-toggle="collapse" aria-expanded="<?= $hotelCollapsed ? 'false' : 'true' ?>" aria-controls="nv-customization">
                                    <div class="d-flex align-items-center">
                                        <div class="dropdown-indicator-icon-wrapper">
                                            <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon"
                                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-right"
                                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
                                                data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span class="nav-link-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-briefcase">
                                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                            </svg>
                                        </span>
                                        <span class="nav-link-text">Hotel</span>
                                    </div>
                                </a>
                                <div class="parent-wrapper label-1">
                                    <ul class="nav collapse parent <?= $hotelCollapsed ? '' : 'show' ?>" data-bs-parent="#navbarVerticalCollapse"
                                        id="nv-customization">
                                        <li class="hotelCollapsed-nav-item-title d-none">Hotel</li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $isActive == 'admin/hotel_listing' ? 'active' : ''; ?>" href="<?= url(route_to('admin.hotel.listing')) ?>">
                                                <div class="d-flex align-items-center">
                                                    <span class="nav-link-text">Hotel listing</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= (str_starts_with($isActive, 'admin/add-property/info')) ? 'active' : ''; ?>" href="<?= url(route_to('admin.addProperty')); ?>">
                                                <div class="d-flex align-items-center">
                                                    <span class="nav-link-text">Add property</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $isActive == 'admin/add_room' ? 'active' : ''; ?>" href="<?= url(route_to('admin.addRoom')) ?>">
                                                <div class="d-flex align-items-center">
                                                    <span class="nav-link-text">Add room</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link <?= $isActive == 'admin/room_listing' ? 'active' : ''; ?>" href="<?= url(route_to('admin.room.listing')) ?>">
                                                <div class="d-flex align-items-center">
                                                    <span class="nav-link-text">Room listing</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="../documentation/customization/dark-mode.html">
                                                <div class="d-flex align-items-center"><span class="nav-link-text">Search room</span></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- parent pages-->
                            <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-layouts-doc"
                                    role="button" data-bs-toggle="collapse" aria-expanded="false"
                                    aria-controls="nv-layouts-doc">
                                    <div class="d-flex align-items-center">
                                        <div class="dropdown-indicator-icon-wrapper"><svg
                                                class="svg-inline--fa fa-caret-right dropdown-indicator-icon" aria-hidden="true"
                                                focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                                <path fill="currentColor"
                                                    d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                                </path>
                                            </svg>
                                        </div><span class="nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16px"
                                                height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-globe">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                                <path
                                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                                </path>
                                            </svg></span>
                                        <span class="nav-link-text">Trip</span>
                                    </div>
                                </a>
                                <div class="parent-wrapper label-1">
                                    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse"
                                        id="nv-layouts-doc">
                                        <li class="hotelCollapsed-nav-item-title d-none">Trip</li>
                                        <li class="nav-item"><a class="nav-link"
                                                href="../documentation/layouts/vertical-navbar.html">
                                                <div class="d-flex align-items-center"><span class="nav-link-text">Add
                                                        trip</span></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- parent pages-->
                            <div class="nav-item-wrapper">
                                <a class="nav-link <?= $isActive == 'admin/members' ? 'active' : '' ?> label-1"
                                    href="<?= url(route_to('admin.members')) ?>" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-users">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            </svg>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Members </span>
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <?php if ($admindata['role'] === 'superadmin'): ?>
                                <div class="nav-item-wrapper">
                                    <a class="nav-link <?= $isActive == 'admin/add_admin' ? 'active' : '' ?> label-1" href="<?= url(route_to('admin.addadmin')); ?>" role="button" data-bs-toggle="" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus">
                                                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="8.5" cy="7" r="4"></circle>
                                                    <line x1="20" y1="8" x2="20" y2="14"></line>
                                                    <line x1="23" y1="11" x2="17" y2="11"></line>
                                                </svg>
                                            </span>
                                            <span class="nav-link-text-wrapper">
                                                <span class="nav-link-text">Add Admin </span>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="nav-item-wrapper">
                                <a class="nav-link <?= $isActive == 'admin/forgot_password' ? 'active' : '' ?> label-1" href="<?= url(route_to('admin.forgot.password')); ?>" role="button" data-bs-toggle="" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                            </svg>
                                        </span>
                                        <span class="nav-link-text-wrapper">
                                            <span class="nav-link-text">Forgot Password </span>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="navbar-vertical-footer">
                <button
                    class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center">
                    <span class="uil uil-left-arrow-to-left fs-8"></span>
                    <span class="uil uil-arrow-from-right fs-8"></span>
                    <span class="navbar-vertical-footer-text ms-2">Collapsed View</span>

                </button>
            </div>
        </nav>
        <nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault" style="display:none;">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="navbar-logo">
                    <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                        data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                        aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                            class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="<?= url(route_to('admin.home')); ?>">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center"><img src="<?= base_url('assets/img/icons/logo.png'); ?>"
                                    alt="phoenix" width="27" />
                                <h5 class="logo-text ms-2 d-none d-sm-block">firebnb</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="search-box navbar-top-search-box d-none d-lg-block"
                    style="width:25rem;">
                    <form action="<?= base_url('api/search'); ?>" id="searchForm" method="get" class="position-relative" data-bs-toggle="search" data-bs-display="static" aria-expanded="false">
                        <?= csrf_field(); ?>
                        <input class="form-control search-input fuzzy-search rounded-pill form-control-sm" id="searchInput" type="search" placeholder="Search..." aria-label="Search" name="keyword" value="">
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                    <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search">
                        <button class="btn btn-link p-0" aria-label="Close"></button>
                    </div>
                    <div id="dropdownmenu" class="dropdown-menu border start-0 py-0 overflow-hidden w-100 m-0">
                        <div class="scrollbar-overlay" style="max-height: 30rem;" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: 0px;">
                                <div class="simplebar-height-auto-observer-wrapper">
                                    <div class="simplebar-height-auto-observer"></div>
                                </div>
                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                            <div class="simplebar-content" style="padding: 0px;">
                                                <div class="list pb-3" id="searchResults">
                                                    <div id="keywordwrapper">
                                                        <hr class="my-0">
                                                        <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Search result for "<span id="keyword"></span>"</h6>
                                                    </div>
                                                    <div class="py-2" id="drdwrapper">

                                                    </div>
                                                    <div id="fallbackwrapper">
                                                        <hr class="my-0">
                                                        <div class="text-center">
                                                            <p class="fallback fw-bold fs-7 my-3">No Result Found.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                            </div>
                            <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                            </div>
                            <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                <div class="simplebar-scrollbar" style="height: 0px; display: none; transform: translate3d(0px, 0px, 0px);"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-icons flex-row">
                    <li class="nav-item">
                        <a href="<?= url(route_to('home')); ?>" target="_blank" class="nav-link text-black mb-1" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Back to home">
                            <span class="icon" data-feather="home"></span>
                        </a>
                        <div class="theme-control-toggle fa-icon-wait px-2">
                            <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                                data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                            <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                                data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                                style="height:32px;width:32px;">
                                <span class="icon" data-feather="moon"></span>
                            </label>
                            <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                                data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                                style="height:32px;width:32px;">
                                <span class="icon" data-feather="sun"></span>
                            </label>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" style="min-width: 2.25rem" role="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span class="d-block"
                                style="height:20px;width:20px;"><span data-feather="bell"
                                    style="height:20px;width:20px;"></span></span></a>
                        <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
                            id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                            <div class="card position-relative border-0">
                                <div class="card-header p-2">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="text-body-emphasis mb-0">Notifications</h5><button
                                            class="btn btn-link p-0 fs-9 fw-normal" type="button">Mark all as
                                            read</button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="scrollbar-overlay" style="height: 27rem;">
                                        <div class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                                            src="<?= base_url('assets/img/team/40x40/30.webp'); ?>" alt="" />
                                                    </div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                                                        <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs-10'>💬</span>Mentioned you in a
                                                            comment.<span
                                                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span>
                                                        </p>
                                                        <p class="text-body-secondary fs-9 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM
                                                            </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="dropdown notification-dropdown"><button
                                                        class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                                                    <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as
                                                            unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3">
                                                        <div class="avatar-name rounded-circle"><span>J</span></div>
                                                    </div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs-9 text-body-emphasis">Jane Foster</h4>
                                                        <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs-10'>📅</span>Created an event.<span
                                                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">20m</span>
                                                        </p>
                                                        <p class="text-body-secondary fs-9 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM
                                                            </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="dropdown notification-dropdown"><button
                                                        class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                                                    <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as
                                                            unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img
                                                            class="rounded-circle avatar-placeholder"
                                                            src="<?= base_url('assets/img/team/40x40/avatar.webp'); ?>"
                                                            alt="" /></div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs-9 text-body-emphasis">Jessie Samson</h4>
                                                        <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs-10'>👍</span>Liked your comment.<span
                                                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">1h</span>
                                                        </p>
                                                        <p class="text-body-secondary fs-9 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM
                                                            </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="dropdown notification-dropdown"><button
                                                        class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                                                    <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as
                                                            unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                                            src="<?= base_url('assets/img/team/40x40/57.webp'); ?>" alt="" />
                                                    </div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs-9 text-body-emphasis">Kiera Anderson</h4>
                                                        <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs-10'>💬</span>Mentioned you in a
                                                            comment.<span
                                                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span>
                                                        </p>
                                                        <p class="text-body-secondary fs-9 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM
                                                            </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="dropdown notification-dropdown"><button
                                                        class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                                                    <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as
                                                            unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                                            src="<?= base_url('assets/img/team/40x40/59.webp'); ?>" alt="" />
                                                    </div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs-9 text-body-emphasis">Herman Carter</h4>
                                                        <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs-10'>👤</span>Tagged you in a
                                                            comment.<span
                                                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span>
                                                        </p>
                                                        <p class="text-body-secondary fs-9 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM
                                                            </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="dropdown notification-dropdown"><button
                                                        class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                                                    <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as
                                                            unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <div class="d-flex">
                                                    <div class="avatar avatar-m status-online me-3"><img class="rounded-circle"
                                                            src="<?= base_url('assets/img/team/40x40/58.webp'); ?>" alt="" />
                                                    </div>
                                                    <div class="flex-1 me-sm-3">
                                                        <h4 class="fs-9 text-body-emphasis">Benjamin Button</h4>
                                                        <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs-10'>👍</span>Liked your comment.<span
                                                                class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span>
                                                        </p>
                                                        <p class="text-body-secondary fs-9 mb-0"><span
                                                                class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM
                                                            </span>August 7,2021</p>
                                                    </div>
                                                </div>
                                                <div class="dropdown notification-dropdown"><button
                                                        class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                        type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        data-bs-reference="parent"><span
                                                            class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                                                    <div class="dropdown-menu py-2"><a class="dropdown-item" href="#!">Mark as
                                                            unread</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-0 border-top border-translucent border-0">
                                    <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a
                                            class="fw-bolder" href="pages/notifications.html">Notification history</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-l ">
                                <img class="rounded-circle " src="<?= base_url('assets/img/team/40x40/57.webp') ?>" alt="" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
                            aria-labelledby="navbarDropdownUser">
                            <div class="card position-relative border-0">
                                <div class="card-body p-0">
                                    <div class="text-center pt-4 pb-3">
                                        <div class="avatar avatar-xl ">
                                            <img class="rounded-circle " src="<?= base_url('assets/img/team/72x72/57.webp') ?>"
                                                alt="" />
                                        </div>
                                        <h6 class="mt-2 text-body-emphasis"><?= $admindata['email'] ? $admindata['email'] : "admin"; ?></h6>
                                        <span class="admin-role"><?= $admindata['role'] ? $admindata['role'] : "admin"; ?></span>
                                    </div>

                                </div>
                                <div class="overflow-auto scrollbar" style="height: 10rem;">
                                    <ul class="nav d-flex flex-column mb-2 pb-1">
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                                    class="me-2 text-body align-bottom"
                                                    data-feather="user"></span><span>Profile</span></a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"><span
                                                    class="me-2 text-body align-bottom"
                                                    data-feather="pie-chart"></span>Dashboard</a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                                    class="me-2 text-body align-bottom" data-feather="lock"></span>Posts
                                                &amp; Activity</a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                                    class="me-2 text-body align-bottom" data-feather="settings"></span>Settings
                                                &amp; Privacy </a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                                    class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help
                                                Center</a></li>
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                                    class="me-2 text-body align-bottom" data-feather="globe"></span>Language</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer p-0 border-top border-translucent">
                                    <ul class="nav d-flex flex-column my-3">
                                        <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                                    class="me-2 text-body align-bottom" data-feather="user-plus"></span>Add
                                                another account</a></li>
                                    </ul>
                                    <hr />
                                    <a class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100" href="<?= url(route_to('admin.logout.handler')) ?>">
                                            <span class="me-2" data-feather="log-out"> </span>Sign out</a>
                                    </a>
                                    <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a
                                            class="text-body-quaternary me-1" href="#!">Privacy policy</a>&bull;<a
                                            class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a
                                            class="text-body-quaternary ms-1" href="#!">Cookies</a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <script>
            var navbarTopShape = window.config.config.phoenixNavbarTopShape;
            var navbarPosition = window.config.config.phoenixNavbarPosition;
            var body = document.querySelector('body');
            var navbarDefault = document.querySelector('#navbarDefault');
            var navbarTop = document.querySelector('#navbarTop');
            var topNavSlim = document.querySelector('#topNavSlim');
            var navbarTopSlim = document.querySelector('#navbarTopSlim');
            var navbarCombo = document.querySelector('#navbarCombo');
            var navbarComboSlim = document.querySelector('#navbarComboSlim');
            var dualNav = document.querySelector('#dualNav');

            var documentElement = document.documentElement;
            var navbarVertical = document.querySelector('.navbar-vertical');

            if (navbarPosition === 'dual-nav') {
                topNavSlim?.remove();
                navbarTop?.remove();
                navbarTopSlim?.remove();
                navbarCombo?.remove();
                navbarComboSlim?.remove();
                navbarDefault?.remove();
                navbarVertical?.remove();
                dualNav.removeAttribute('style');
                document.documentElement.setAttribute('data-navigation-type', 'dual');

            } else if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
                navbarDefault?.remove();
                navbarTop?.remove();
                navbarTopSlim?.remove();
                navbarCombo?.remove();
                navbarComboSlim?.remove();
                topNavSlim.style.display = 'block';
                navbarVertical.style.display = 'inline-block';
                document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');

            } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
                navbarDefault?.remove();
                navbarVertical?.remove();
                navbarTop?.remove();
                topNavSlim?.remove();
                navbarCombo?.remove();
                navbarComboSlim?.remove();
                dualNav?.remove();
                navbarTopSlim.removeAttribute('style');
                document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');
            } else if (navbarTopShape === 'slim' && navbarPosition === 'combo') {
                navbarDefault?.remove();
                navbarTop?.remove();
                topNavSlim?.remove();
                navbarCombo?.remove();
                navbarTopSlim?.remove();
                dualNav?.remove();
                navbarComboSlim.removeAttribute('style');
                navbarVertical.removeAttribute('style');
                document.documentElement.setAttribute('data-navbar-horizontal-shape', 'slim');
            } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
                navbarDefault?.remove();
                topNavSlim?.remove();
                navbarVertical?.remove();
                navbarTopSlim?.remove();
                navbarCombo?.remove();
                navbarComboSlim?.remove();
                dualNav?.remove();
                navbarTop.removeAttribute('style');
                document.documentElement.setAttribute('data-navigation-type', 'horizontal');
            } else if (navbarTopShape === 'default' && navbarPosition === 'combo') {
                topNavSlim?.remove();
                navbarTop?.remove();
                navbarTopSlim?.remove();
                navbarDefault?.remove();
                navbarComboSlim?.remove();
                dualNav?.remove();
                navbarCombo.removeAttribute('style');
                navbarVertical.removeAttribute('style');
                document.documentElement.setAttribute('data-navigation-type', 'combo');
            } else {
                topNavSlim?.remove();
                navbarTop?.remove();
                navbarTopSlim?.remove();
                navbarCombo?.remove();
                navbarComboSlim?.remove();
                dualNav?.remove();
                navbarDefault.removeAttribute('style');
                navbarVertical.removeAttribute('style');
            }

            var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
            var navbarTop = document.querySelector('.navbar-top');
            if (navbarTopStyle === 'darker') {
                navbarTop.setAttribute('data-navbar-appearance', 'darker');
            }

            var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
            var navbarVertical = document.querySelector('.navbar-vertical');
            if (navbarVerticalStyle === 'darker') {
                navbarVertical.setAttribute('data-navbar-appearance', 'darker');
            }
        </script>
        <div class="content">
            <?= $this->renderSection('content') ?>
            <footer class="footer position-absolute">
                <div class="row g-0 justify-content-between align-items-center h-100">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 mt-2 mt-sm-0 text-body">All Right Reserved
                            <span class="d-none d-sm-inline-block"></span>
                            <span class="d-none d-sm-inline-block mx-1">|</span>
                            <br class="d-sm-none" />2025 &copy;<a class="mx-1" href="<?= base_url('admin') ?>">Codersketch</a>
                        </p>
                    </div>
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-body-tertiary text-opacity-85">v1.0.0</p>
                    </div>
                </div>
            </footer>
        </div>
    </main><!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

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
    <script src="<?= base_url('vendors/notyf@3/notyf.min.js') ?>"></script>

    <?= $this->renderSection('jsUtls'); ?>
    <script src="<?= base_url('assets/js/phoenix.js'); ?>"></script>
    <script>
        window.addEventListener('load', function() {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.style.opacity = '0';
                setTimeout(() => loader.style.display = 'none', 500);
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Collect Element
            const searchForm = document.querySelector('form[action="<?= base_url('api/search'); ?>"]');
            const searchInput = document.querySelector('#searchInput');
            const dropdownMenu = searchInput.closest('.search-box').querySelector('#dropdownmenu');

            const keywordWrapper = document.querySelector('#keywordwrapper');
            const keyword = document.querySelector('#keyword');
            const drdWrapper = document.querySelector('#drdwrapper');
            const fallbackWrapper = document.querySelector('#fallbackwrapper');
            const fallback = document.querySelector('.fallbackwrapper');

            let debounceTimer;

            // Initial state
            keywordWrapper.style.display = 'none';
            keyword.textContent = '';
            drdWrapper.innerHTML = '';
            fallbackWrapper.style.display = 'none';
            dropdownMenu.classList.remove('show');

            const getSearchedHotel = function(e) {
                e.preventDefault();
                const query = searchInput.value.trim();

                clearTimeout(debounceTimer);

                drdWrapper.innerHTML = '';
                keywordWrapper.style.display = 'none';
                fallbackWrapper.style.display = 'none';


                if (query.length < 3) {
                    drdWrapper.innerHTML = ''; // Ensure clear if short query
                    fallbackWrapper.style.display = 'block'; // Show "No Result Found"
                    keyword.textContent = ''; // Clear previous keyword
                    keywordWrapper.style.display = 'none'; // Hide keyword header
                    dropdownMenu.classList.add('show'); // Keep dropdown visible for fallback
                    return;
                }

                drdWrapper.innerHTML +=
                    `<div class="dropdown-item py-2 d-flex align-items-center skeleton-hotel">
                        <div class="file-thumbnail me-2 skeleton-img"></div>
                        <div class="flex-1">
                            <div class="skeleton-text w-75 mb-2"></div>
                            <div class="skeleton-text w-100"></div>
                        </div>
                    </div>`;

                dropdownMenu.classList.add('show');

                debounceTimer = setTimeout(function() {
                    fetch(`<?= base_url('api/search'); ?>?keyword=${encodeURIComponent(query)}`, {
                            method: "GET",
                            headers: {
                                "X-Requested-With": "XMLHttpRequest"
                            }
                        })
                        .then(resp => {
                            if (!resp.ok) { // Check for HTTP errors
                                throw new Error(`HTTP error! status: ${resp.status}`);
                            }
                            return resp.json();
                        })
                        .then(resp => {
                            // console.log(resp);
                            drdWrapper.innerHTML = '';
                            keyword.textContent = resp.keyword;
                            keywordWrapper.style.display = 'block';

                            if (resp.hotels && resp.hotels.length > 0) {
                                fallbackWrapper.style.display = 'none';
                                resp.hotels.forEach(hotel => {
                                    const link = document.createElement('a');
                                    link.className = 'dropdown-item py-2 d-flex align-items-center';
                                    link.href = `<?= base_url('hotel/details/'); ?>${hotel.id}`;
                                    link.innerHTML =
                                        `<div class="file-thumbnail me-2">
                                            <img class="h-100 w-100 object-fit-cover rounded-3" src="<?= base_url('image/hotel_thumbnail/'); ?>${hotel.id+'/'+hotel.thumbnail}" alt="${hotel.property_name}">
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-body-highlight title">${hotel.property_name}</h6>
                                            <p class="fs-10 mb-0 d-flex text-body-tertiary">
                                                <span class="fw-medium text-body-tertiary text-opacity-85">
                                            ${hotel.description.substring(0, 30)}...
                                            </span>
                                            </p>
                                        </div>
                                        `;
                                    drdWrapper.appendChild(link);
                                });

                            } else {
                                // No results found for the query
                                drdWrapper.innerHTML = ''; // Ensure drdWrapper is empty
                                fallbackWrapper.style.display = 'block'; // Show fallback message
                                keywordWrapper.style.display = 'block'; // Still show keyword header
                            }
                            dropdownMenu.classList.add('show');
                        })
                        .catch(err => {
                            console.error('Fetch error:', err);
                            drdWrapper.style.display = 'none';
                            drdWrapper.innerHTML = ''; // Clear any skeletons or previous content
                            keyword.textContent = ''; // Clear keyword
                            keywordWrapper.style.display = 'none'; // Hide keyword header on error
                            fallbackWrapper.style.display = 'block'; // Show fallback on error
                            fallbackWrapper.querySelector('p.fallback').textContent = 'Error loading results. Please try again.'; // Update fallback message
                            dropdownMenu.classList.add('show'); // Ensure dropdown stays open for error message
                        });
                }, 500);
            };

            searchForm.addEventListener('submit', getSearchedHotel);
            searchInput.addEventListener('keyup', getSearchedHotel);

            document.addEventListener('click', function(e) {
                // Check if the click is outside the search box AND the dropdown menu itself
                if (!searchInput.closest('.search-box').contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                    // Reset initial state when closed
                    keywordwrapper.style.display = 'none';
                    keyword.textContent = '';
                    drdWrapper.innerHTML = '';
                    fallbackWrapper.style.display = 'none';
                }
            });

            // Also hide dropdown if search input is focused out AND empty
            searchInput.addEventListener('blur', function() {
                if (searchInput.value.trim() === '') {
                    dropdownMenu.classList.remove('show');
                    keywordwrapper.style.display = 'none';
                    keyword.textContent = '';
                    drdWrapper.innerHTML = '';
                    fallbackWrapper.style.display = 'none';
                }
            });
            document.addEventListener('click', function(e) {
                if (!searchInput.closest('.search-box').contains(e.target)) {
                    dropdownMenu.classList.remove('show');
                }
            });
        });
        // duration: 5000,
        const notyf = new Notyf({
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

        // Now you can use different types:
        // notyf.open({
        //     type: 'success',
        //     message: 'success notification'
        // });
        // notyf.open({
        //     type: 'error',
        //     message: 'error notification'
        // });
        // notyf.open({
        //     type: 'warning',
        //     message: 'warning notification'
        // });
        // notyf.open({
        //     type: 'info',
        //     message: 'Info notification'
        // });
        // notyf.open({
        //     type: 'general',
        //     message: 'general notification'
        // });
    </script>
    <?= $this->renderSection('script'); ?>

</body>

</html>