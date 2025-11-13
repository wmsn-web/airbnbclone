<div class="tab-pane <?= ($activeTab == 'tab6') ? 'active show' : '' ?>" role="tabpanel" aria-labelledby="add-property-wizard-tab6" id="add-property-wizard-tab6">
    <form action="<?= base_url('admin/save-policies/' . $hotelId) ?>" method="post" id="addPropertyWizardForm6" data-wizard-form="6">
        <?= csrf_field() ?>

        <h3 class="mb-6">Policies</h3>

        <!-- Check-in Policy -->
        <?php
        // Pre-fill check-in data if available
        $checkInValue = $hpoData['ci_type'] ?? 0;
        $cinValue = $hpoData['ci_start_time'] ?? '';
        $cieValue = $hpoData['ci_end_time'] ?? '';
        $lateCiValue = $hpoData['late_ci'] ?? 0;
        ?>
        <div class="form-check form-check-inline me-5 mb-3">
            <input class="form-check-input" id="limitedCheckIn" type="radio" name="checkIn" value="0" <?= $checkInValue == 0 ? 'checked' : '' ?> />
            <label class="form-check-label fs-8" for="limitedCheckIn">Limited Check-in</label>
        </div>
        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input" id="24HrCheckIn" type="radio" name="checkIn" value="1" <?= $checkInValue == 1 ? 'checked' : '' ?> />
            <label class="form-check-label fs-8" for="24HrCheckIn">24hr Check-in</label>
        </div>
        <div class="row g-3 align-items-center">
            <div class="col-12 col-sm-6 col-md-auto flex-md-grow-1">
                <div class="form-floating">
                    <input class="form-control datetimepicker" id="checkInStarts" type="text" placeholder="H:i"
                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}'
                        name="cin" value="<?= $cinValue ?>" />
                    <label for="checkInStarts">Check-in Starts</label>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-auto flex-md-grow-1">
                <div class="form-floating">
                    <input class="form-control datetimepicker" id="checkInEnds" type="text" placeholder="H:i"
                        data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}'
                        name="cie" value="<?= $cieValue ?>" />
                    <label for="checkInEnds">Check-in Ends</label>
                </div>
            </div>
            <div class="col-12 col-md-auto">
                <div class="form-check mb-0">
                    <input class="form-check-input" id="lateCheckIn" type="checkbox" name="late_ci" value="1" <?= $lateCiValue ? 'checked' : '' ?> />
                    <label class="form-check-label fw-normal fs-8" for="lateCheckIn">Late Check-in</label>
                </div>
            </div>
        </div>

        <!-- Age Restriction, Deposit, Documentation -->
        <?php
        $ageRestrictionValue = $hpoData['age_restriction'] ?? 0;
        $depositValue = $hpoData['deposit_at_ci'] ?? 0;
        $docValue = $hpoData['doc_at_ci'] ?? 0;
        ?>
        <div class="border p-3 rounded-2 mt-3">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="ageRestriction" type="checkbox" name="age_restriction" value="1" <?= $ageRestrictionValue ? 'checked' : '' ?> />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="ageRestriction">Age Restriction</label>
            </div>
        </div>
        <div class="border p-3 rounded-2 my-3">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="deposit" type="checkbox" name="deposit_at_ci" value="1" <?= $depositValue ? 'checked' : '' ?> />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="deposit">Deposit at Check-in</label>
            </div>
        </div>
        <div class="border p-3 rounded-2">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="documentation" type="checkbox" name="doc_at_ci" value="1" <?= $docValue ? 'checked' : '' ?> />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="documentation">Documentation at Check-in</label>
            </div>
        </div>

        <!-- Checkout Policy -->
        <?php
        $coBeforeValue = $hpoData['co_before'] ?? '';
        $flexCoStatusValue = $hpoData['flexible_co_status'] ?? 0;
        $flexCoTypeValue = $hpoData['flexible_co_type'] ?? 'free';
        $flexCoConditionValue = $hpoData['flexible_co_condition'] ?? '';
        ?>
        <h4 class="mb-4 mt-6">Checkout Policy</h4>
        <div class="form-floating mb-3">
            <input class="form-control datetimepicker" id="chcckOutBefore" type="text" placeholder="H:i"
                data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i","disableMobile":true}'
                name="co_before" value="<?= $coBeforeValue ?>" />
            <label for="chcckOutBefore">Checkout Before</label>
        </div>
        <div class="form-price-tier border p-3 rounded-2" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="flexible-checkout" type="checkbox" data-price-toggle="data-price-toggle"
                        name="flexible_co_status" value="1" <?= $flexCoStatusValue ? 'checked' : '' ?> />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="flexible-checkout">Flexible Checkout</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="flexible-checkout-free" name="flexible_checkout_radio"
                            value="free" <?= $flexCoTypeValue == 'free' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="flexible-checkout-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="flexible-checkout-paid" name="flexible_checkout_radio"
                            value="paid" <?= $flexCoTypeValue == 'paid' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="flexible-checkout-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse <?= $flexCoTypeValue == 'paid' ? 'show' : '' ?>" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="flexible_co_condition" id="fcp-condition"
                            placeholder="Condition" value="<?= $flexCoConditionValue ?>">
                        <label for="fcp-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cancellation Policy -->
        <?php
        $refundPolicyValue = $hpoData['refund_policy_type'] ?? 0;
        $fullRefundValue = $hpoData['full_refund_allowed'] ?? 0;
        $partialRefundValue = $hpoData['partial_refund_allowed'] ?? 0;
        ?>
        <h4 class="mb-4 mt-6">Cancellation Policy</h4>
        <div class="form-check form-check-inline me-5 mb-0">
            <input class="form-check-input" id="nonRefundable" type="radio" name="refund_policy_type"
                value="0" <?= $refundPolicyValue == 0 ? 'checked' : '' ?> />
            <label class="form-check-label fs-8" for="nonRefundable">Non Refundable</label>
        </div>
        <div class="form-check form-check-inline mb-0">
            <input class="form-check-input" id="optionalRefund" type="radio" name="refund_policy_type"
                value="1" <?= $refundPolicyValue == 1 ? 'checked' : '' ?> />
            <label class="form-check-label fs-8" for="optionalRefund">Optional Refund</label>
        </div>
        <div class="border p-3 rounded-2 my-3">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="fullRefund" type="checkbox" name="full_refund_allowed"
                    value="1" <?= $fullRefundValue ? 'checked' : '' ?> />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="fullRefund">Full Refund</label>
            </div>
        </div>
        <div class="border p-3 rounded-2">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="partialRefund" type="checkbox" name="partial_refund_allowed"
                    value="1" <?= $partialRefundValue ? 'checked' : '' ?> />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="partialRefund">Partial Refund</label>
            </div>
        </div>

        <!-- Pet Policy -->
        <?php
        $petPolicyValue = $hpoData['pet_policy_type'] ?? 0;
        $petRestrictedValue = $hpoData['pet_restricted_zones'] ?? 0;
        $petChargesValue = $hpoData['pet_additional_charges'] ?? 0;
        ?>
        <h4 class="mb-4 mt-6">Pet Policy</h4>
        <div class="form-check form-check-inline me-5 mb-0">
            <input class="form-check-input" id="notAllowed" type="radio" name="pet_policy_type"
                value="0" <?= $petPolicyValue == 0 ? 'checked' : '' ?> />
            <label class="form-check-label fs-8" for="notAllowed">Not allowed</label>
        </div>
        <div class="form-check form-check-inline mb-0">
            <input class="form-check-input" id="allowed" type="radio" name="pet_policy_type"
                value="1" <?= $petPolicyValue == 1 ? 'checked' : '' ?> />
            <label class="form-check-label fs-8" for="allowed">Allowed</label>
        </div>
        <div class="border p-3 rounded-2 my-3">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="petRestrickedZone" type="checkbox" name="pet_restricted_zones"
                    value="1" <?= $petRestrictedValue ? 'checked' : '' ?> />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="petRestrickedZone">Pet Restricted Zones</label>
            </div>
        </div>
        <div class="border p-3 rounded-2">
            <div class="form-check form-switch mb-0">
                <input class="form-check-input" id="AdditionalCharges" type="checkbox" name="pet_additional_charges"
                    value="1" <?= $petChargesValue ? 'checked' : '' ?> />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="AdditionalCharges">Additional Charges</label>
            </div>
        </div>

        <!-- Child Policy -->
        <?php
        $childDocValue = $hpoData['child_doc_requirement'] ?? 0;
        $ageSegmentsValue = !empty($hpoData['age_segments']) ? json_decode($hpoData['age_segments'], true) : [['from' => 0, 'to' => 7]];
        ?>
        <h4 class="mb-4 mt-6">Child Policy</h4>
        <div id="addagesegment">
            <?php foreach ($ageSegmentsValue as $index => $segment): ?>
                <div class="age-segment-box">
                    <h5 class="mb-2 text-body">Age Segment <?= $index + 1 ?></h5>
                    <?php if ($index > 0): ?>
                        <button class="btn btn-link p-0 ms-1 remove-seg" type="button">Remove</button>
                    <?php endif; ?>
                    <div class="row align-items-center g-3">
                        <div class="col-6 col-sm-auto">
                            <div class="form-floating age-segment-input">
                                <input class="form-control input-spin-none" type="number" id="addsegfr<?= $index + 1 ?>"
                                    name="age_segments[<?= $index ?>][from]" value="<?= $segment['from'] ?? 0 ?>" />
                                <label for="addsegfr<?= $index + 1 ?>">From (Yrs)</label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-auto flex-1 order-1 order-sm-0">
                            <div class="noUi-target-primary noUi-handle-primary noUi-slider-slim noUi-handle-circle px-2"
                                id="asi<?= $index + 1 ?>"></div>
                        </div>
                        <div class="col-6 col-sm-auto">
                            <div class="form-floating age-segment-input">
                                <input class="form-control input-spin-none" type="number" id="addsegto<?= $index + 1 ?>"
                                    name="age_segments[<?= $index ?>][to]" value="<?= $segment['to'] ?? 7 ?>" />
                                <label for="addsegto<?= $index + 1 ?>">To (Yrs)</label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="btn btn-link p-0 mt-3 fs-8" id="addsegment">
            <span class="fa-solid fa-plus me-2"></span>Add Segment
        </button>

        <div class="border px-3 py-2 rounded-2 mt-4">
            <div class="form-check form-switch mb-0 py-1">
                <input class="form-check-input" id="documentation-requirement" type="checkbox" name="child_doc_requirement"
                    value="1" <?= $childDocValue ? 'checked' : '' ?> />
                <label class="form-check-label fs-8 fw-bold text-body ms-2" for="documentation-requirement">Documentation Requirement</label>
            </div>
        </div>

        <!-- Taxes -->
        <?php
        $vatIncludedValue = $hpoData['vat_included'] ?? 0;
        $vatRadioValue = $hpoData['vat_radio'] ?? 'free';
        $vatConditionValue = $hpoData['vat_condition'] ?? '';

        $gstIncludedValue = $hpoData['gst_included'] ?? 0;
        $gstRadioValue = $hpoData['gst_radio'] ?? 'free';
        $gstConditionValue = $hpoData['gst_condition'] ?? '';

        $hotelTaxIncludedValue = $hpoData['hotel_tax_included'] ?? 0;
        $hotelTaxRadioValue = $hpoData['hotel_tax_radio'] ?? 'free';
        $hotelTaxConditionValue = $hpoData['hotel_tax_condition'] ?? '';

        $cityTaxIncludedValue = $hpoData['city_dist_tax_included'] ?? 0;
        $cityTaxRadioValue = $hpoData['regional_location_tax_radio'] ?? 'free';
        $cityTaxConditionValue = $hpoData['cdt_condition'] ?? '';

        $touristTaxIncludedValue = $hpoData['tourist_tax_included'] ?? 0;
        $touristTaxRadioValue = $hpoData['tourist_tax_radio'] ?? 'free';
        $touristTaxConditionValue = $hpoData['tourist_tax_condition'] ?? '';
        ?>
        <h4 class="mb-4 mt-6">Included Taxes in your rate</h4>

        <!-- VAT -->
        <div class="form-price-tier border p-3 rounded-2 mb-3" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="vat" type="checkbox" data-price-toggle="data-price-toggle"
                        name="vat_included" value="1" <?= $vatIncludedValue ? 'checked' : '' ?> />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="vat">VAT</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="vat-free" name="vat_radio"
                            value="free" <?= $vatRadioValue == 'free' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="vat-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="vat-paid" name="vat_radio"
                            value="paid" <?= $vatRadioValue == 'paid' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="vat-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse <?= $vatRadioValue == 'paid' ? 'show' : '' ?>" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="vat_condition" id="vat-condition"
                            placeholder="Condition" value="<?= $vatConditionValue ?>">
                        <label for="vat-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- GST -->
        <div class="form-price-tier border p-3 rounded-2 mb-3" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="gst" type="checkbox" data-price-toggle="data-price-toggle"
                        name="gst_included" value="1" <?= $gstIncludedValue ? 'checked' : '' ?> />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="gst">GST</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="gst-free" name="gst_radio"
                            value="free" <?= $gstRadioValue == 'free' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="gst-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="gst-paid" name="gst_radio"
                            value="paid" <?= $gstRadioValue == 'paid' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="gst-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse <?= $gstRadioValue == 'paid' ? 'show' : '' ?>" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="gst_condition" id="gst-condition"
                            placeholder="Condition" value="<?= $gstConditionValue ?>">
                        <label for="gst-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hotel Tax -->
        <div class="form-price-tier border p-3 rounded-2 mb-3" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="holet-tax" type="checkbox" data-price-toggle="data-price-toggle"
                        name="hotel_tax_included" value="1" <?= $hotelTaxIncludedValue ? 'checked' : '' ?> />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="holet-tax">Hotel tax</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="holet-tax-free" name="hotel_tax_radio"
                            value="free" <?= $hotelTaxRadioValue == 'free' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="holet-tax-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="holet-tax-paid" name="hotel_tax_radio"
                            value="paid" <?= $hotelTaxRadioValue == 'paid' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="holet-tax-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse <?= $hotelTaxRadioValue == 'paid' ? 'show' : '' ?>" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="hotel_tax_condition" id="hotel-tax-condition"
                            placeholder="Condition" value="<?= $hotelTaxConditionValue ?>">
                        <label for="hotel-tax-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- City/District Tax -->
        <div class="form-price-tier border p-3 rounded-2 mb-3" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="city-tax" type="checkbox" data-price-toggle="data-price-toggle"
                        name="city_dist_tax_included" value="1" <?= $cityTaxIncludedValue ? 'checked' : '' ?> />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="city-tax">City / District tax</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="city-tax-free" name="regional_location_tax_radio"
                            value="free" <?= $cityTaxRadioValue == 'free' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="city-tax-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="city-tax-paid" name="regional_location_tax_radio"
                            value="paid" <?= $cityTaxRadioValue == 'paid' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="city-tax-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse <?= $cityTaxRadioValue == 'paid' ? 'show' : '' ?>" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="cdt_condition" id="cdt-condition"
                            placeholder="Condition" value="<?= $cityTaxConditionValue ?>">
                        <label for="cdt-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tourist Tax -->
        <div class="form-price-tier border p-3 rounded-2" data-form-price-tier="data-form-price-tier">
            <div class="d-sm-flex align-items-center gap-3">
                <div class="form-check form-switch mb-0">
                    <input class="form-check-input" id="tourist-tax" type="checkbox" data-price-toggle="data-price-toggle"
                        name="tourist_tax_included" value="1" <?= $touristTaxIncludedValue ? 'checked' : '' ?> />
                    <label class="form-check-label fs-8 fw-bold text-body ms-2" for="tourist-tax">Tourist tax</label>
                </div>
                <div class="pricings ms-auto mt-2 mt-sm-0">
                    <div class="form-check form-check-inline me-3 mb-0">
                        <input class="form-check-input" type="radio" id="tourist-tax-free" name="tourist_tax_radio"
                            value="free" <?= $touristTaxRadioValue == 'free' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="tourist-tax-free">Free</label>
                    </div>
                    <div class="form-check form-check-inline me-0 mb-0">
                        <input class="form-check-input" type="radio" id="tourist-tax-paid" name="tourist_tax_radio"
                            value="paid" <?= $touristTaxRadioValue == 'paid' ? 'checked' : '' ?> data-pricing="data-pricing" />
                        <label class="form-check-label" for="tourist-tax-paid">Paid</label>
                    </div>
                </div>
            </div>
            <div class="collapse <?= $touristTaxRadioValue == 'paid' ? 'show' : '' ?>" data-pricing-collapse="data-pricing-collapse">
                <div class="p-4 bg-primary-subtle rounded-3 mt-3">
                    <div class="form-floating">
                        <input class="form-control" type="text" name="tourist_tax_condition" id="tourist-tax-condition"
                            placeholder="Condition" value="<?= $touristTaxConditionValue ?>">
                        <label for="tourist-tax-condition">Condition</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Documentations -->
        <?php
        $propertyRegValue = $hpoData['property_registration_no'] ?? '';
        $businessRegValue = $hpoData['business_registration_no'] ?? '';
        $taxpayerValue = $hpoData['taxpayer_identification_no'] ?? '';
        ?>
        <h4 class="mb-4 mt-6">Your Documentations</h4>
        <div class="form-floating">
            <input class="form-control input-spin-none" type="number" name="property_registration_no"
                id="add-property-wizardwizard-property-registrations" placeholder="Property Registration No. (OPTIONAL)"
                value="<?= $propertyRegValue ?>" />
            <label for="add-property-wizardwizard-property-registrations">Property Registration No. (OPTIONAL)</label>
        </div>
        <div class="form-floating my-3">
            <input class="form-control input-spin-none" type="number" name="business_registration_no"
                id="add-property-wizardwizard-business-registration" placeholder="Business Registration No."
                value="<?= $businessRegValue ?>" />
            <label for="add-property-wizardwizard-business-registration">Business Registration No.</label>
        </div>
        <div class="form-floating">
            <input class="form-control input-spin-none" type="number" name="taxpayer_identification_no"
                id="add-property-wizardwizard-taxpaper" placeholder="Taxpayer Indentification No."
                value="<?= $taxpayerValue ?>" />
            <label for="add-property-wizardwizard-taxpaper">Taxpayer Indentification No.</label>
        </div>

        <!-- Hidden submit button -->
        <div class="d-none">
            <button type="submit" class="btn btn-primary">Save Policies</button>
        </div>
    </form>
</div>