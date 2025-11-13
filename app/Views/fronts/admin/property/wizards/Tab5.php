<div class="tab-pane <?= ($activeTab == 'tab5') ? 'active show' : '' ?>" role="tabpanel" aria-labelledby="add-property-wizard-tab5" id="add-property-wizard-tab5">
    <form action="<?= base_url('admin/add-property/save-finance/' . $hotelId) ?>" method="post" id="addPropertyWizardForm5" data-wizard-form="5">
        <?= csrf_field() ?>
        <h3 class="mb-6">Finance</h3>
        <h4 class="mt-6 mb-4">Payment from Guests (On property)</h4>

        <?php
        $chpay = '';
        $cdpay = '';
        $onpay = '';

        if (!empty($hfData)) {
            if (isset($hfData['cash_payment']) && $hfData['cash_payment'] == 1) {
                $chpay = 'checked';
            }
            if (isset($hfData['card_payment']) && $hfData['card_payment'] == 1) {
                $cdpay = 'checked';
            }
            if (isset($hfData['online_payment']) && $hfData['online_payment'] == 1) {
                $onpay = 'checked';
            }
        } ?>

        <div class="border p-3 rounded-2">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="cashPayment" name="cashPayment" type="checkbox" value="1" <?= $chpay; ?>>
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="cashPayment">Cash payment</label>
            </div>
        </div>

        <div class="border p-3 rounded-2 my-3">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="cardPayment" name="cardPayment" type="checkbox" value="1" <?= $cdpay; ?>>
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="cardPayment">Card Payment</label>
            </div>
        </div>

        <div class="border p-3 rounded-2">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="onlinePayment" name="onlinePayment" type="checkbox" value="1" <?= $onpay; ?>>
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="onlinePayment">MFS / Online Payment</label>
            </div>
        </div>

        <!-- Hidden submit button -->
        <div class="d-none">
            <button type="submit" class="btn btn-primary">Save Payment Methods</button>
        </div>
    </form>
</div>