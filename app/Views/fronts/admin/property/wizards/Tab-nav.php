<?php
$tabs = ['tab1', 'tab2', 'tab3', 'tab4', 'tab5', 'tab6', 'tab7'];
$currentIndex = array_search($activeTab, $tabs);

function tabClass($key, $currentIndex, $tabs)
{
    $i = array_search($key, $tabs);
    if ($i < $currentIndex) return 'done disabled';
    if ($i === $currentIndex) return 'active';
    return 'disabled';
}

// Generate URLs for each tab
$tabUrls = [];
foreach ($tabs as $tab) {
    $tabUrls[$tab] = "/admin/add_property/{$tab}/" . ($hotelId ?? '');
}
?>
<div class="col-xl-4 order-xl-1">
    <div class="scrollbar mb-4">
        <ul class="nav justify-content-between flex-nowrap nav-wizard nav-wizard-vertical-xl" data-tab-map-container="data-tab-map-container">
            <?php foreach ($tabs as $index => $tab): ?>
                <?php
                $tabNumber = $index + 1;
                $icons = [
                    'tab1' => 'fa-file',
                    'tab2' => 'fa-location-dot',
                    'tab3' => 'fa-mug-saucer',
                    'tab4' => 'fa-images',
                    'tab5' => 'fa-usd',
                    'tab6' => 'fa-shield-halved',
                    'tab7' => 'fa-check'
                ];
                $titles = [
                    'tab1' => 'Info',
                    'tab2' => 'Location',
                    'tab3' => 'Amenities',
                    'tab4' => 'Photos',
                    'tab5' => 'Finance',
                    'tab6' => 'Policies',
                    'tab7' => 'Done'
                ];
                ?>
                <li class="nav-item">
                    <a class="nav-link <?= tabClass($tab, $currentIndex, $tabs) ?> py-0 py-xl-3"
                        href="<?= $tabUrls[$tab] ?>"
                        data-tab="<?= $tab ?>"
                        data-wizard-step="<?= $tabNumber ?>">
                        <div class="text-center d-inline-block d-xl-flex align-items-center gap-3">
                            <span class="nav-item-circle-parent">
                                <span class="nav-item-circle">
                                    <span class="fa-solid <?= $icons[$tab] ?> nav-item-icon"></span>
                                    <span class="fa-solid fa-check check-icon"></span>
                                </span>
                            </span>
                            <span class="nav-item-title fs-9 fs-xl-8"><?= $titles[$tab] ?></span>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>