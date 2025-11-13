<div class="content pt-0">
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#!">Page 1</a></li>
            <li class="breadcrumb-item"><a href="#!">Page 2</a></li>
            <li class="breadcrumb-item active">Default</li>
        </ol>
    </nav>
    <div class="mb-7">
        <h2>Hotel Listing</h2>
        <div data-list='{"valueNames":["name","beds","guest","bathRooms","amenities","totalRooms"],"page":8}'>
            <div class="d-md-flex mt-5 mb-4">
                <a href="<?= route_to('admin.addProperty'); ?>" class="btn btn-primary me-4">
                    <span class="fas fa-plus me-2"></span>Create Listing
                </a>
                <!-- <button class="btn btn-link text-body me-4 px-0">
                    <span class="fa-solid fa-file-export fs-9 me-2"></span>Export
                </button> -->
                <div class="d-flex gap-2 ms-md-auto mt-3 mt-md-0">
                    <div class="search-box">
                        <form class="position-relative">
                            <input class="form-control search-input search" type="search" placeholder="Search hotel" aria-label="Search" />
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>
                    <button class="btn btn-phoenix-primary px-3">
                        <span class="fa-solid fa-filter" data-fa-transform="down-2"></span>
                    </button>
                </div>
            </div>
            <?php
            if (!is_null($hotels) && is_iterable($hotels)): ?>
                <div class="table-responsive scrollbar mx-n1 px-1">
                    <table class="table fs-9 mb-0">
                        <thead>
                            <tr>
                                <th class="white-space-nowrap fs-9 align-middle ps-0" style="max-width:20px; width:18px;">
                                    <div class="form-check mb-0 fs-8">
                                        <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"room-listing-table-body"}' />
                                    </div>
                                </th>
                                <th class="sort text-body-tertiary align-middle white-space-nowrap" scope="col" data-sort="name" style="width:300px;">HOTEL INFORMATION</th>
                                <th class="sort text-body-tertiary align-middle px-4" scope="col" style="width:200px;" data-sort="beds">NO. OF BEDS</th>
                                <th class="sort text-body-tertiary align-middle px-4" scope="col" data-sort="guest" style="width:200px;">NO. OF GUESTS</th>
                                <th class="sort text-body-tertiary align-middle px-4" scope="col" data-sort="bathRooms" style="width:140px;">BATHROOM</th>
                                <th class="text-body-tertiary align-middle ps-4" scope="col" data-sort="amenities" style="min-width:300px;">AMENITIES</th>
                                <th class="sort text-body-tertiary align-middle ps-4 text-end" scope="col" data-sort="totalRooms" style="width:180px;">TOTAL ROOM</th>
                                <th class="sort text-body-tertiary text-end align-middle pe-0 ps-4" scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list" id="room-listing-table-body">
                            <?php foreach ($hotels as $key => $hotel): ?>
                                <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                    <td class="fs-9 align-middle ps-0">
                                        <div class="form-check mb-0 fs-8">
                                            <input class="form-check-input" type="checkbox" data-bulk-select-row='{"name":"Bunk Bed","category":"Standard Room","price":332.67,"img":"/img/hotels/17.png","bedRooms":"01","beds":"02","guest":"02","child":"01","bathRooms":"01","totalRooms":65,"amenities":["wifi","tv","common area","bathtub","Heating","Telephone","Television","common area","Kettle","iron","Coffee maker","refrigerator","Room service","Coffee maker","refrigerator","Room service","common area","bathtub","Heating","Telephone"]}' />
                                        </div>
                                    </td>
                                    <td class="align-middle py-4 name">
                                        <div class="d-flex align-items-center gap-3">
                                            <a href="#!">
                                                <img class="rounded-1 border border-translucent" src="<?= base_url('image/hotel_thumbnail/' . $hotel['id'] . '/' . $hotel['thumbnail']) ?>" alt="" height="80" />
                                            </a>
                                            <div>
                                                <a class="fs-8 fw-bolder text-body-emphasis text-nowrap" href="#!"><?= $hotel['property_name']; ?></a>
                                                <?php if (!is_null($hotel['chain_name'])): ?>
                                                    <h6 class="fw-seibold text-body text-nowrap mt-1 mb-1">
                                                        <span class="fa-solid fa-border-all me-2"></span><?= $hotel['chain_name']; ?>
                                                    </h6>
                                                <?php endif; ?>
                                                <?php if (!is_null('rating')): ?>
                                                    <h5 class="fw-bolder mb-0 mt-1"><span><?= $hotel['rating'] ?></span>
                                                        <span>
                                                            <svg class="svg-inline--fa fa-star text-warning form-icon " aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                                                <path fill="currentColor" d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                                </path>
                                                            </svg>
                                                        </span>
                                                    </h5>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle px-4 beds">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center justify-content-center bg-primary-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-person-shelter text-primary-darker"></span></div>
                                            <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                            <div class="d-flex align-items-center justify-content-center bg-success-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bed text-success-darker"></span></div>
                                            <h5 class="text-body-emphasis fw-semibold mb-0">02</h5>
                                        </div>
                                    </td>
                                    <td class="align-middle px-4 guest">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center justify-content-center bg-warning-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-user text-warning-darker"></span></div>
                                            <h5 class="text-body-emphasis fw-semibold mb-0 me-3">02</h5>
                                            <div class="d-flex align-items-center justify-content-center bg-info-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-baby text-info-darker"></span></div>
                                            <h5 class="text-body-emphasis fw-semibold mb-0">01</h5>
                                        </div>
                                    </td>
                                    <td class="align-middle px-4 bathRooms">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center justify-content-center bg-danger-subtle rounded me-2" style="height:24px; width: 24px"><span class="fa-solid fa-bath text-danger-darker"></span></div>
                                            <h5 class="text-body-emphasis fw-semibold mb-0 me-3">01</h5>
                                        </div>
                                    </td>
                                    <td class="align-middle ps-4 amenities">
                                        <div class="d-flex flex-wrap gap-2">
                                            <?php if (!empty($hotel['amenities'])):
                                                $hotelAms = json_decode($hotel['amenities'], true);
                                                if (is_array($hotelAms)):

                                                    $visibleAms = array_slice($hotelAms, 0, 5, true);
                                                    $remainingAms = array_slice($hotelAms, 5, null, true);
                                            ?>

                                                    <?php foreach ($visibleAms as $key => $hAm): ?>
                                                        <span class="badge badge-phoenix badge-phoenix-info text-body-highlight py-1 fs-10 border"><?= esc($key); ?></span>
                                                    <?php endforeach; ?>

                                                    <?php if (count($remainingAms) > 0): ?>
                                                        <a class="fw-bold fs-9 text-decoration-underline text-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#allAmenitiesModal<?= $hotel['id'] ?>">
                                                            +<?= count($remainingAms); ?> More
                                                        </a>
                                                    <?php endif; ?>
                                                    <?php if (!empty($remainingAms)): ?>
                                                        <div class="modal fade" id="allAmenitiesModal<?= $hotel['id'] ?>" tabindex="-1" aria-labelledby="allAmenitiesLabel<?= $hotel['id'] ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header border-bottom-0">
                                                                        <h5 class="modal-title fs-8" id="allAmenitiesLabel<?= $hotel['id'] ?>">All Amenities of <?= $hotel['property_name'] ?></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php foreach ($hotelAms as $key => $hAm): ?>
                                                                            <span class="badge badge-phoenix badge-phoenix-info text-dark fw-semibold m-1 fs-9 "><?= esc($key); ?></span>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <h5 class="text-muted">No amenities</h5>
                                                <?php endif;
                                            else: ?>
                                                <h5 class="text-muted">No amenities</h5>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center ps-4 totalRooms">
                                        <h2 class="text-body-secondary">65</h2>
                                    </td>
                                    <td class="align-middle ps-4">
                                        <div class="btn-reveal-trigger position-static">
                                            <button class="btn btn-phoenix-info dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                                Actions
                                                <!-- <span class="fas fa-ellipsis-h fs-11"></span> -->
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="javascript:void(0)">View</a>
                                                <a class="dropdown-item" href="<?= base_url('admin/add_property/tab7/' . $hotel['id']) ?>">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <form action="<?= base_url('admin/delete_hotel/' . $hotel['id']); ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this hotel?');" style="display:inline;">
                                                    <?= csrf_field(); ?>
                                                    <button type="submit" class="dropdown-item text-danger">Remove</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="row align-items-center py-2 g-0">
                    <div class="pagination d-none"></div>
                    <div class="col d-flex fs-9">
                        <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less</a>
                    </div>
                    <div class="col-auto d-flex">
                        <button class="btn btn-link px-1 me-1" type="button" title="Previous" data-list-pagination="prev"><span class="fas fa-chevron-left me-2"></span>Previous</button><button class="btn btn-link px-1 ms-1" type="button" title="Next" data-list-pagination="next">Next<span class="fas fa-chevron-right ms-2"></span></button>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>