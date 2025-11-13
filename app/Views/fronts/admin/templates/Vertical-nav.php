<?php
$isActive = uri_string();
$hotelRoutes = [
    'admin/add_property',
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
                                    <a class="nav-link <?= $isActive == 'admin/hotel_listing' ? 'active' : ''; ?>" href="<?= route_to('admin.hotel.listing') ?>">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Hotel listing</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= (str_starts_with($isActive, 'admin/add_property')) ? 'active' : ''; ?>" href="<?= route_to('admin.addProperty'); ?>">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Add property</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $isActive == 'admin/add_room' ? 'active' : ''; ?>" href="<?= route_to('admin.addRoom') ?>">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text">Add room</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $isActive == 'admin/room_listing' ? 'active' : ''; ?>" href="<?= route_to('admin.room.listing') ?>">
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
                            href="<?= route_to('admin.members') ?>" role="button" data-bs-toggle="" aria-expanded="false">
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
                            <a class="nav-link <?= $isActive == 'admin/add_admin' ? 'active' : '' ?> label-1" href="<?= route_to('admin.addadmin'); ?>" role="button" data-bs-toggle="" aria-expanded="false">
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
                        <a class="nav-link <?= $isActive == 'admin/forgot_password' ? 'active' : '' ?> label-1" href="<?= route_to('admin.forgot.password'); ?>" role="button" data-bs-toggle="" aria-expanded="false">
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