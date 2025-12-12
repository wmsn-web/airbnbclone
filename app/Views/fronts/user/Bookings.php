<?= $this->extend('fronts/templates/Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section>
    <div class="container-small cart">
        <div class="row justify-content-center">
            <div class="col-12">

                <h4 class="mb-4">Your Bookings</h4>

                <div id="tableExample3"
                    data-list='{"valueNames":["pnr","hotel","checkin","checkout","price"],}'>

                    <!-- Search -->
                    <div class="search-box mb-3 mx-auto">
                        <form class="position-relative">
                            <input class="form-control search-input search form-control-sm"
                                type="search" placeholder="Search by PNR / Hotel">
                            <span class="fas fa-search search-box-icon"></span>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped table-sm fs-9 mb-0">
                            <thead>
                                <tr>
                                    <th class="sort border-top ps-3" data-sort="pnr">PNR</th>
                                    <th class="sort border-top d-none d-sm-table-cell" data-sort="hotel">Hotel</th>
                                    <th class="sort border-top d-none d-sm-table-cell" data-sort="checkin">Check In</th>
                                    <th class="sort border-top d-none d-sm-table-cell" data-sort="checkout">Check Out</th>
                                    <th class="sort border-top" data-sort="price">Amount</th>
                                    <th class="text-end border-top">Action</th>
                                </tr>
                            </thead>

                            <tbody class="list">
                                <?php if (!empty($bookings)): ?>
                                    <?php foreach ($bookings as $b): ?>
                                        <tr>
                                            <td class="align-middle ps-3 pnr"><?= esc($b['pnr_no']) ?></td>
                                            <td class="align-middle hotel d-none d-sm-table-cell"><?= esc($b['hotel_id']) ?></td>
                                            <td class="align-middle checkin d-none d-sm-table-cell"><?= esc($b['check_in']) ?></td>
                                            <td class="align-middle checkout d-none d-sm-table-cell"><?= esc($b['check_out']) ?></td>
                                            <td class="align-middle price">$ <?= esc($b['amount']) ?></td>

                                            <td class="align-middle text-end pe-0 white-space-nowrap">
                                                <div class="btn-reveal-trigger position-static">
                                                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none btn-reveal fs-10"
                                                        type="button" data-bs-toggle="dropdown">
                                                        <span class="fas fa-ellipsis-h"></span>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-end py-2">

                                                        <a class="dropdown-item"
                                                            href="<?= base_url('booking-confirmation/' . $b['pnr_no']) ?>">
                                                            View Booking
                                                        </a>

                                                        <a class="dropdown-item"
                                                            href="<?= base_url('download-invoice/' . $b['pnr_no']) ?>">
                                                            Download Invoice
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center py-4">
                                            No bookings found.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        <?= $pager->links('list-group', 'custom_pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<?= $this->endSection() ?>