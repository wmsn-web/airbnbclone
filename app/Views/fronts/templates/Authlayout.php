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
    <title><?= $this->renderSection('pageTitle') ?></title>

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

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
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
    <link href="<?= base_url('assets/custom/custom.css'); ?>" rel="stylesheet">
</head>

<body>
    <div id="global-loader" class="light-loader">
        <img src="<?= base_url('assets/img/spinner/loader.png') ?>" class="loader-img" alt="Loader">
    </div>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <?= $this->renderSection('content') ?>
    </main>
    <!-- ===============================================-->
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
    <script src="<?= base_url('assets/js/phoenix.js'); ?>"></script>
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
    <?= $this->renderSection('script') ?>
</body>

</html>