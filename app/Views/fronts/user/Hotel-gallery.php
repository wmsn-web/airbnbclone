<?= $this->extend('fronts/templates/Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link href="<?= base_url('vendors/glightbox/glightbox.min.css') ?>" rel="stylesheet">

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="pb-7 pt-0 mt-10">
    <div class="container-medium">
        <h2 class="mb-5">Gallery</h2>

        <?php if (!empty($photos)): ?>

            <?php
            // Safe array access helper
            function imgOrNull($arr, $index)
            {
                return isset($arr[$index]) ? $arr[$index] : null;
            }

            $img1 = imgOrNull($photos, 0);
            $img2 = imgOrNull($photos, 1);
            $img3 = imgOrNull($photos, 2);
            $img4 = imgOrNull($photos, 3);
            $img5 = imgOrNull($photos, 4);
            $img6 = imgOrNull($photos, 5);
            $img7 = imgOrNull($photos, 6);
            $img8 = imgOrNull($photos, 7);
            $img9 = imgOrNull($photos, 8);
            ?>

            <div class="row g-2 g-sm-3">

                <!-- LEFT TOP (3 images) -->
                <div class="col-md-6">
                    <div class="row g-2 g-sm-3">

                        <?php if ($img1): ?>
                            <div class="col-12">
                                <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img1) ?>" data-gallery="default-gallery">
                                    <img class="img-fluid rounded-2" src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img1) ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($img2): ?>
                            <div class="col-6">
                                <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img2) ?>" data-gallery="default-gallery">
                                    <img class="img-fluid rounded-2" src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img2) ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($img3): ?>
                            <div class="col-6">
                                <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img3) ?>" data-gallery="default-gallery">
                                    <img class="img-fluid rounded-2" src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img3) ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <!-- RIGHT BIG IMAGE -->
                <div class="col-md-6">
                    <?php if ($img4): ?>
                        <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img4) ?>" data-gallery="default-gallery">
                            <img class="img-fluid rounded-2 w-100 h-100 object-fit-cover"
                                src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img4) ?>" alt="">
                        </a>
                    <?php endif; ?>
                </div>

                <!-- BOTTOM ROW 2 -->
                <?php if ($img5): ?>
                    <div class="col-sm-6">
                        <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img5) ?>" data-gallery="default-gallery">
                            <img class="img-fluid rounded-2" src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img5) ?>" alt="">
                        </a>
                    </div>
                <?php endif; ?>

                <?php if ($img6): ?>
                    <div class="col-sm-6">
                        <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img6) ?>" data-gallery="default-gallery">
                            <img class="img-fluid rounded-2" src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img6) ?>" alt="">
                        </a>
                    </div>
                <?php endif; ?>

                <!-- BOTTOM 2 (split into 3) -->
                <div class="col-md-6">
                    <div class="row g-2 g-sm-3">

                        <?php if ($img7): ?>
                            <div class="col-12">
                                <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img7) ?>" data-gallery="default-gallery">
                                    <img class="img-fluid rounded-2" src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img7) ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($img8): ?>
                            <div class="col-6">
                                <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img8) ?>" data-gallery="default-gallery">
                                    <img class="img-fluid rounded-2" src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img8) ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($img9): ?>
                            <div class="col-6">
                                <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img9) ?>" data-gallery="default-gallery">
                                    <img class="img-fluid rounded-2" src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $img9) ?>" alt="">
                                </a>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            </div>

            <!-- Show *EXTRA* images below (future proof) -->
            <?php if (count($photos) > 9): ?>
                <div class="row g-2 mt-3">
                    <?php foreach (array_slice($photos, 9) as $extra): ?>
                        <div class="col-6 col-sm-4 col-md-3">
                            <a href="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $extra) ?>" data-gallery="default-gallery">
                                <img class="img-fluid rounded-2" src="<?= base_url('image/hotel_gallery/' . $hotelId . '/' . $extra) ?>" alt="">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php else: ?>

            <!-- If no images -->
            <div class="text-center py-5">
                <h4 class="text-muted">No Gallery Images Available</h4>
            </div>

        <?php endif; ?>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?= base_url('vendors/glightbox/glightbox.min.js') ?>"> </script>



<?= $this->endSection() ?>