<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Booking - Admin | <?= esc($pageTitle ?? ''); ?></title>

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

    <link href="<?= base_url('vendors/mapbox-gl/mapbox-gl.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('vendors/flatpickr/flatpickr.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('vendors/dropzone/dropzone.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('vendors/swiper/swiper-bundle.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('vendors/nouislider/nouislider.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('vendors/simplebar/simplebar.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/theme-rtl.min.css'); ?>" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="<?= base_url('assets/css/theme.min.css'); ?>" type="text/css" rel="stylesheet" id="style-default">
    <link href="<?= base_url('assets/css/user-rtl.min.css'); ?>" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="<?= base_url('assets/css/user.min.css'); ?>" type="text/css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" defer>
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
</head>

<body>
    <main class="main" id="top">