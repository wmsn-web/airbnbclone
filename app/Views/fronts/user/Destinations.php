<?= $this->extend('fronts/templates/Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<style>
    .place-card {
        position: relative;
        width: 100%;
        height: 320px;
        border-radius: 15px;
        overflow: hidden;
        cursor: pointer;
    }

    /* Image */
    .place-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .4s ease-in-out;
    }

    /* Overlay */
    .place-card .overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.45);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity .4s ease;
    }

    /* Hover zoom & fade */
    .place-card:hover img {
        transform: scale(1.08);
    }

    .place-card:hover .overlay {
        opacity: 1;
    }

    /* Text inside overlay */
    .place-card .overlay-text {
        color: #fff;
        font-size: 26px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: capitalize;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="pb-7 pt-0 mt-10">
    <div class="container-medium">
        <div class="row justify-content-center">
            <?php
            $cityImages = [
                "Ahmedabad" => "ahmedabad.webp",
                "Bengaluru" => "bengaluru.webp",
                "Calangute" => "calangute.webp",
                "Chennai" => "chennai.webp",
                "Hyderabad",
                "Jaipur",
                "Kolkata",
                "Mumbai",
                "New Delhi",
                "Pune"
            ];

            // fallback image when city not found
            $defaultImage = "default-city.webp";
            ?>
            <?php foreach ($places as $p): ?>
                <?php
                $city = $p['place'];
                $image = $cityImages[$city] ?? $defaultImage;
                ?>

                <div class="col-md-4 py-2">
                    <a href="#!">
                        <div class="place-card">
                            <img src="<?= base_url('assets/img/cities/' . $image) ?>" alt="<?= esc($city) ?>">

                            <div class="overlay">
                                <div class="overlay-text"><?= esc($city) ?></div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>