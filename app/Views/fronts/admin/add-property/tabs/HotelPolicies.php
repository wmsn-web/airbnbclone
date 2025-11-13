<!-- Add Property layout -->
<?= $this->extend('fronts/admin/add-property/AddProperty.php'); ?>

<!-- Wizards  -->
<?= $this->section('wizard-tab'); ?>
<div class="tab-pane" role="tabpanel" aria-labelledby="add-property-wizard-tab6" id="add-property-wizard-tab6">
    <form id="addPropertyWizardForm6" novalidate="novalidate" data-wizard-form="6">
        <?= csrf_field() ?>
        <div class="form-check form-check-inline me-5 mb-3">
            <input class="form-check-input" id="limitedCheckIn" type="radio" name="checkIn" value="0" checked="checked" />
            <label class="form-check-label fs-8" for="limitedCheckIn">Limited Check-in</label>
        </div>
        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input" id="24HrCheckIn" type="radio" name="checkIn" value="1" />
            <label class="form-check-label fs-8" for="24HrCheckIn">24hr Check-in</label>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-12 col-sm-6 col-md-auto flex-md-grow-1">
                <div class="form-floating">
                    <input class="form-control datetimepicker" id="checkInStarts" type="text" placeholder="H:i" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' name="cin" />
                    <label for="checkInStarts">Check-in Starts</label>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-auto flex-md-grow-1">
                <div class="form-floating">
                    <input class="form-control datetimepicker" id="checkInEnds" type="text" placeholder="H:i" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' name="cie" />
                    <label for="checkInEnds">Check-in Ends</label>
                </div>
            </div>
            <div class="col-12 col-md-auto">
                <div class="form-check mb-0">
                    <input class="form-check-input" id="lateCheckIn" type="checkbox" name="late_ci" value="1" />
                    <label class="form-check-label fw-normal fs-8" for="lateCheckIn">Late Check-in</label>
                </div>
            </div>
        </div>
        <div class="border p-3 rounded-2 mt-3">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="ageRestriction" type="checkbox" name="age_restriction" value="1" />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="ageRestriction">Age Restriction</label>
            </div>
        </div>
        <div class="border p-3 rounded-2 my-3">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="deposit" type="checkbox" name="deposit_at_ci" value="1" />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="deposit">Deposit at Check-in</label>
            </div>
        </div>
        <div class="border p-3 rounded-2">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="documentation" type="checkbox" name="doc_at_ci" value="1" />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="documentation">Documentation at Check-in</label>
            </div>
        </div>
        <h4 class="mb-4 mt-6">Checkout Policy</h4>
        <div class="form-floating mb-3">
            <input class="form-control datetimepicker" id="chcckOutBefore" type="text" placeholder="H:i" data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}' name="co_before" />
            <label for="chcckOutBefore">Checkout Before</label>
        </div>
        <div class="form-price-tier border p-3 rounded-2" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="flexible-checkout" type="checkbox" data-price-toggle="data-price-toggle" name="flexible_co_status" value="1" />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="flexible-checkout">Flexible Checkout</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="flexible-checkout-free" name="flexible_checkout_radio" value="free" data-pricing="data-pricing" />
                        <label class="form-check-label" for="flexible-checkout-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="flexible-checkout-paid" name="flexible_checkout_radio" value="paid" data-pricing="data-pricing" />
                        <label class="form-check-label" for="flexible-checkout-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="flexible_co_condition" id="fcp-condition" placeholder="Search amenities">
                        <label for="fcp-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="mb-4 mt-6">Cancellation Policy</h4>
        <div class="form-check form-check-inline me-5 mb-0">
            <input class="form-check-input" id="nonRefundable" type="radio" name="refund_policy_type" value="0" />
            <label class="form-check-label fs-8" for="nonRefundable">Non Refundable</label>
        </div>
        <div class="form-check form-check-inline mb-0">
            <input class="form-check-input" id="optionalRefund" type="radio" name="refund_policy_type" value="1" />
            <label class="form-check-label fs-8" for="optionalRefund">Optional Refund</label>
        </div>
        <div class="border p-3 rounded-2 my-3">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="fullRefund" type="checkbox" name="full_refund_allowed" value="1" />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="fullRefund">Full Refund</label>
            </div>
        </div>
        <div class="border p-3 rounded-2">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="partialRefund" type="checkbox" name="partial_refund_allowed" value="1" />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="partialRefund">Partial Refund</label>
            </div>
        </div>
        <h4 class="mb-4 mt-6">Pet Policy</h4>
        <div class="form-check form-check-inline me-5 mb-0">
            <input class="form-check-input" id="notAllowed" type="radio" name="pet_policy_type" value="0" />
            <label class="form-check-label fs-8" for="notAllowed">Not allowed</label>
        </div>
        <div class="form-check form-check-inline mb-0">
            <input class="form-check-input" id="allowed" type="radio" name="pet_policy_type" value="1" />
            <label class="form-check-label fs-8" for="allowed">Allowed</label>
        </div>
        <div class="border p-3 rounded-2 my-3">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="petRestrickedZone" type="checkbox" name="pet_restricted_zones" value="1" />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="petRestrickedZone">Pet Restricted Zones</label>
            </div>
        </div>
        <div class="border p-3 rounded-2">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="AdditionalCharges" type="checkbox" name="pet_additional_charges" value="1" />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="AdditionalCharges">Additional Charges</label>
            </div>
        </div>
        <h4 class="mb-4 mt-6">Child Policy</h4>
        <div id="addagesegment">
            <div class="age-segment-box">
                <h5 class="mb-2 text-body">Age Segment 1</h5>
                <div class="row align-items-center g-3">
                    <div class="col-6 col-sm-auto">
                        <div class="form-floating age-segment-input">
                            <input class="form-control input-spin-none" type="number" id="addsegfr1" name="age_segments[0][from]" value="0" />
                            <label for="addsegfr1">From (Yrs)</label>
                        </div>
                    </div>
                    <div class="col-12 col-sm-auto flex-1 order-1 order-sm-0">
                        <div class="noUi-target-primary noUi-handle-primary noUi-slider-slim noUi-handle-circle px-2" id="asi1"></div>
                    </div>
                    <div class="col-6 col-sm-auto">
                        <div class="form-floating age-segment-input">
                            <input class="form-control input-spin-none" type="number" id="addsegto1" name="age_segments[0][to]" value="7" />
                            <label for="addsegto1">To (Yrs)</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-link p-0 mt-3 fs-8" id="addsegment">
            <span class="fa-solid fa-plus me-2"></span>Add Segment
        </button>

        <div class="border px-3 py-2 rounded-2 mt-4">
            <div class="form-check form-switch mb-0 py-1">
                <input class="form-check-input" id="documentation-requirement" type="checkbox" name="child_doc_requirement" value="1" />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="documentation-requirement">Documentation Requirement</label>
            </div>
        </div>
        <h4 class="mb-4 mt-6">Included Taxes in your rate</h4>
        <div class="form-price-tier border p-3 rounded-2 mb-3" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="vat" type="checkbox" data-price-toggle="data-price-toggle" name="vat_included" value="1" />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="vat">VAT</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="vat-free" name="vat_radio" value="free" data-pricing="data-pricing" />
                        <label class="form-check-label" for="vat-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="vat-paid" name="vat_radio" value="paid" data-pricing="data-pricing" />
                        <label class="form-check-label" for="vat-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="vat_condition" id="vat-condition" placeholder="Search amenities">
                        <label for="vat-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-price-tier border p-3 rounded-2 mb-3" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="gst" type="checkbox" data-price-toggle="data-price-toggle" name="gst_included" value="1" />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="gst">GST</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="gst-free" name="gst_radio" value="free" data-pricing="data-pricing" />
                        <label class="form-check-label" for="gst-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="gst-paid" name="gst_radio" value="paid" data-pricing="data-pricing" />
                        <label class="form-check-label" for="gst-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="gst_condition" id="gst-condition" placeholder="Search amenities">
                        <label for="gst-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-price-tier border p-3 rounded-2 mb-3" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="holet-tax" type="checkbox" data-price-toggle="data-price-toggle" name="hotel_tax_included" value="1" />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="holet-tax">Hotel tax</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="holet-tax-free" name="hotel_tax_radio" value="free" data-pricing="data-pricing" />
                        <label class="form-check-label" for="holet-tax-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="holet-tax-paid" name="hotel_tax_radio" value="paid" data-pricing="data-pricing" />
                        <label class="form-check-label" for="holet-tax-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="hotel_tax_condition" id="hotel-tax-condition" placeholder="Search amenities">
                        <label for="hotel-tax-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-price-tier border p-3 rounded-2 mb-3" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="city-tax" type="checkbox" data-price-toggle="data-price-toggle" name="city_dist_tax_included" value="1" />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="city-tax">City / District tax</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="city-tax-free" name="regional_location_tax_radio" value="free" data-pricing="data-pricing" />
                        <label class="form-check-label" for="city-tax-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="city-tax-paid" name="regional_location_tax_radio" value="paid" data-pricing="data-pricing" />
                        <label class="form-check-label" for="city-tax-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="cdt_condition" id="cdt-condition" placeholder="Search amenities">
                        <label for="cdt-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-price-tier border p-3 rounded-2" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="tourist-tax" type="checkbox" data-price-toggle="data-price-toggle" name="tourist_tax_included" value="1" />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="tourist-tax">Tourist tax</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="tourist-tax-free" name="tourist_tax_radio" value="free" data-pricing="data-pricing" />
                        <label class="form-check-label" for="tourist-tax-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="tourist-tax-paid" name="tourist_tax_radio" value="paid" data-pricing="data-pricing" />
                        <label class="form-check-label" for="tourist-tax-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="tourist_tax_condition" id="tourist-tax-condition" placeholder="Search amenities">
                        <label for="tourist-tax-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="mb-4 mt-6">Your Documentations</h4>
        <div class="form-floating">
            <input class="form-control input-spin-none" type="number" name="property_registration_no" id="add-property-wizardwizard-property-registrations" placeholder="Property Registration No. (OPTIONAL)" />
            <label for="add-property-wizardwizard-property-registrations">Property Registration No. (OPTIONAL)</label>
        </div>
        <div class="form-floating my-3">
            <input class="form-control input-spin-none" type="number" name="business_registration_no" id="add-property-wizardwizard-business-registration" placeholder="Business Registration No." />
            <label for="add-property-wizardwizard-business-registration">Business Registration No.</label>
        </div>
        <div class="form-floating">
            <input class="form-control input-spin-none" type="number" name="taxpayer_identification_no" id="add-property-wizardwizard-taxpaper" placeholder="Taxpayer Indentification No." />
            <label for="add-property-wizardwizard-taxpaper">Taxpayer Indentification No.</label>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>

<!-- individual Js -->
<?= $this->section('wizard-script'); ?>
<?= $this->endSection(); ?>