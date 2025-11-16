<?= $this->extend('fronts\templates\Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link href="<?= base_url('vendors/glightbox/glightbox.min.css') ?>" rel="stylesheet">

<?= $this->endSection() ?>

<?= $this->section('content') ?>


<section class="pb-7 pt-0 mt-10">
    <div class="container-medium">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Page 1</a></li>
                <li class="breadcrumb-item"><a href="#">Page 2</a></li>
                <li class="breadcrumb-item active" aria-current="page">Default</li>
            </ol>
        </nav>
        <h2 class="mb-5">Gallery</h2>
        <div class="row g-2 g-sm-3">
            <div class="col-md-6">
                <div class="row g-2 g-sm-3">
                    <div class="undefined"><a href="../../../../assets/img/hotels/84.jpg" data-gallery="default-gallery"><img class="img-fluid rounded-2" src="../../../../assets/img/hotels/74.png" alt=""></a></div>
                    <div class="col-6"><a href="../../../../assets/img/hotels/85.jpg" data-gallery="default-gallery"><img class="img-fluid rounded-2" src="../../../../assets/img/hotels/75.png" alt=""></a></div>
                    <div class="col-6"><a href="../../../../assets/img/hotels/86.jpg" data-gallery="default-gallery"><img class="img-fluid rounded-2" src="../../../../assets/img/hotels/76.png" alt=""></a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="video-container h-100"><a href="../../../../assets/video/3.mp4" data-gallery="default-gallery"><video class="video w-100 h-100 object-fit-cover overflow-hidden rounded-2" muted data-play-on-hover>
                            <source src="../../../../assets/video/3.mp4" type="video/mp4">
                        </video>
                        <div class="circle-icon-item position-absolute top-50 start-50 translate-middle bg-body-emphasis rounded-pill bg-opacity-50"><span class="fa-solid fa-video text-body fs-9 fs-sm-8"></span></div>
                    </a></div>
            </div>
            <div class="col-sm-6"><a href="../../../../assets/img/hotels/87.jpg" data-gallery="default-gallery"><img class="img-fluid rounded-2" src="../../../../assets/img/hotels/78.png" alt=""></a></div>
            <div class="col-sm-6"><a href="../../../../assets/img/hotels/88.jpg" data-gallery="default-gallery"><img class="img-fluid rounded-2" src="../../../../assets/img/hotels/79.png" alt=""></a></div>
            <div class="col-md-6"><a href="../../../../assets/img/hotels/89.jpg" data-gallery="default-gallery"><img class="img-fluid rounded-2" src="../../../../assets/img/hotels/80.png" alt=""></a></div>
            <div class="col-md-6">
                <div class="row g-2 g-sm-3">
                    <div class="undefined"><a href="../../../../assets/img/hotels/90.jpg" data-gallery="default-gallery"><img class="img-fluid rounded-2" src="../../../../assets/img/hotels/81.png" alt=""></a></div>
                    <div class="col-6"><a href="../../../../assets/img/hotels/91.jpg" data-gallery="default-gallery"><img class="img-fluid rounded-2" src="../../../../assets/img/hotels/82.png" alt=""></a></div>
                    <div class="col-6"><a href="../../../../assets/img/hotels/92.jpg" data-gallery="default-gallery"><img class="img-fluid rounded-2" src="../../../../assets/img/hotels/83.png" alt=""></a></div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('vendors/glightbox/glightbox.min.js') ?>"> </script>



<?= $this->endSection() ?>