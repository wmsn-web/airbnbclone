<script>
    document.addEventListener("DOMContentLoaded", function() {
        /* ============================================================
            CONFIG / DEFAULTS (these can be filled from DB via PHP)
            - DEFAULT.persons.* : default person counts (adults/children/infants)
            - DEFAULT.prices.*  : per-night price + extras
        ============================================================ */
        const DEFAULT = {
            persons: {
                adults: <?= isset($room['default_adults']) ? (int)$room['default_adults'] : 2 ?>,
                children: <?= isset($room['default_children']) ? (int)$room['default_children'] : 0 ?>,
                infants: <?= isset($room['default_infants']) ? (int)$room['default_infants'] : 0 ?>
            },
            prices: {
                perNight: <?= isset($room['price']) ? (float)$room['price'] : 0 ?>,
                extraAdult: <?= isset($room['extra_adult']) ? (float)$room['extra_adult'] : 300 ?>,
                extraChild: <?= isset($room['extra_child']) ? (float)$room['extra_child'] : 150 ?>,
                infant: <?= isset($room['infant_price']) ? (float)$room['infant_price'] : 0 ?>
            }
        };

        /* ============================================================
            1) DATE PICKER (flatpickr)
            - Applies flatpickr to inputs with .datetimepicker class.
            - Keeps the options you already had.
        ============================================================ */
        const datePickerSelector = ".datetimepicker";
        const dateValue = "<?= isset($query['date']) ? esc($query['date']) : '' ?>";

        const flatpickrOptions = {
            mode: "single",
            dateFormat: "Y/m/d",
            disableMobile: true,
            minDate: "today",
            maxDate: new Date().fp_incr(180),
            monthSelectorType: "static",
            yearSelectorType: "static"
        };

        if (dateValue) {
            // if you passed a "from to to" value earlier — keep behavior consistent
            flatpickrOptions.defaultDate = dateValue.split(" to ");
        }

        try {
            if (typeof flatpickr === "function") {
                flatpickr(datePickerSelector, flatpickrOptions);
            } else {
                console.warn("flatpickr not available on the page.");
            }
        } catch (err) {
            console.error("flatpickr init error:", err);
        }

        /* ============================================================
            2) ELEMENT REFERENCES + SAFE GUARDS
        ============================================================ */
        const el = {
            adults: document.getElementById("adults"),
            children: document.getElementById("children"),
            infants: document.getElementById("infants"),
            baseRoomPriceEl: document.getElementById("baseRoomPrice"),
            finalPriceEl: document.getElementById("final-price"),
            checkin: document.querySelector("input[name='check_in']"),
            checkout: document.querySelector("input[name='check_out']"),
            payBtn: document.getElementById("submit-button"),
            nameInput: document.getElementById("uname"),
            emailInput: document.getElementById("uemail"),
            phoneInput: document.getElementById("phone"),
            verifyuser: document.getElementById("verifyuser"),
            sendOtpBtn: document.getElementById("sendOtpBtn"),
            verifyotpform: document.getElementById("verifyotpform"),
            verifyOtpBtn: document.getElementById("verifyOtpBtn"),
        };

        // Fallback base price: use DEFAULT.prices.perNight unless data-base-price exists
        let basePrice = DEFAULT.prices.perNight;
        if (el.baseRoomPriceEl && el.baseRoomPriceEl.dataset && el.baseRoomPriceEl.dataset.basePrice) {
            const parsed = parseFloat(el.baseRoomPriceEl.dataset.basePrice);
            if (!isNaN(parsed)) basePrice = parsed;
        }

        // Charges object derived from DEFAULT (so you can change DB later)
        const CHARGES = {
            extraAdult: DEFAULT.prices.extraAdult,
            extraChild: DEFAULT.prices.extraChild,
            infant: DEFAULT.prices.infant
        };

        // Limits (can be loaded from DB later)
        const LIMITS = {
            adults: {
                min: 1,
                max: 10
            },
            children: {
                min: 0,
                max: 10
            },
            infants: {
                min: 0,
                max: 5
            }
        };

        /* ============================================================
            3) Initialize guest inputs with DEFAULT values (if inputs exist)
            - This allows future DB-driven defaults to be applied automatically.
        ============================================================ */
        if (el.adults) el.adults.value = el.adults.value || DEFAULT.persons.adults;
        if (el.children) el.children.value = el.children.value || DEFAULT.persons.children;
        if (el.infants) el.infants.value = el.infants.value || DEFAULT.persons.infants;

        /* ============================================================
            4) NIGHT CALCULATION
            - parse dates from the "Y/m/d" format and compute number of nights.
            - returns at least 1 night as a safety.
        ============================================================ */
        function parseDateYmd(value) {
            // handle empty / invalid values
            if (!value) return null;
            // Accepts "YYYY/MM/DD" or "YYYY-M-D" etc.
            // new Date("YYYY/MM/DD") works in most browsers; fallback to manual parse if needed.
            const d = new Date(value);
            if (!isNaN(d)) return d;

            // manual parse: split by non-digit
            const parts = value.split(/\D+/).filter(Boolean);
            if (parts.length >= 3) {
                const [y, m, day] = parts.map(Number);
                return new Date(y, m - 1, day);
            }
            return null;
        }

        function getNumberOfNights() {
            if (!el.checkin || !el.checkout) return 1;

            const start = parseDateYmd(el.checkin.value);
            const end = parseDateYmd(el.checkout.value);

            if (!start || !end) return 1;

            const ms = end - start;
            const days = Math.floor(ms / (1000 * 60 * 60 * 24));
            return days > 0 ? days : 1; // at least 1 night
        }

        /* ============================================================
            5) PRICE CALCULATOR
            - total = (basePrice * nights) + extra adult charges + child charges + infant charges
            - uses DEFAULT.persons.adults as "included adults" count (so you can change from DB)
        ============================================================ */
        function formatCurrencyINR(amount) {
            // format with Indian grouping for readability
            try {
                return "₹" + amount.toLocaleString("en-IN");
            } catch (err) {
                return "₹" + amount;
            }
        }

        function calculateFinalPrice() {
            // guard
            if (!el.finalPriceEl) return 0;

            const adults = el.adults ? (parseInt(el.adults.value, 10) || 0) : DEFAULT.persons.adults;
            const children = el.children ? (parseInt(el.children.value, 10) || 0) : DEFAULT.persons.children;
            const infants = el.infants ? (parseInt(el.infants.value, 10) || 0) : DEFAULT.persons.infants;

            const nights = getNumberOfNights();

            // how many adults are included in base fare? use DEFAULT.persons.adults
            const includedAdults = DEFAULT.persons.adults || 2;
            const extraAdults = adults > includedAdults ? adults - includedAdults : 0;

            let total = (basePrice * nights);

            // add extra person charges (these are flat fees per booking; change if you want per-night fees)
            total += extraAdults * CHARGES.extraAdult;
            total += children * CHARGES.extraChild;
            total += infants * CHARGES.infant;

            // update UI
            el.finalPriceEl.innerHTML = formatCurrencyINR(total);

            return total;
        }

        /* Initial calculation */
        calculateFinalPrice();

        /* ============================================================
            6) PLUS / MINUS BUTTONS (data-type & data-target attributes)
            - keeps values within LIMITS and recalculates
        ============================================================ */
        document.querySelectorAll("[data-type]").forEach((btn) => {
            btn.addEventListener("click", () => {
                const target = btn.dataset.target;
                const field = target && el[target] ? el[target] : document.getElementById(target);
                if (!field) return;

                let value = parseInt(field.value, 10) || 0;
                const {
                    min,
                    max
                } = LIMITS[target] || {
                    min: 0,
                    max: 9999
                };

                if (btn.dataset.type === "minus" && value > min) value--;
                if (btn.dataset.type === "plus" && value < max) value++;

                // safety: adults cannot be below 1
                if (target === "adults" && value < 1) value = 1;

                field.value = value;
                calculateFinalPrice();
            });
        });

        // Recalculate on manual input (typing)
        ["adults", "children", "infants"].forEach((id) => {
            const input = document.getElementById(id);
            if (!input) return;
            input.addEventListener("input", () => {
                // sanitize to integers only
                input.value = input.value.replace(/[^\d]/g, "");
                calculateFinalPrice();
            });
        });

        /* ============================================================
            7) Recalculate when dates change
            - Also validate pay button when dates change
        ============================================================ */
        if (el.checkin) el.checkin.addEventListener("change", () => {
            calculateFinalPrice();
            validateDates();
        });
        if (el.checkout) el.checkout.addEventListener("change", () => {
            calculateFinalPrice();
            validateDates();
        });

        /* ============================================================
            8) OTP inputs helper (kept as-is)
        ============================================================ */
        function setupOTPInputs(containerSelector) {
            const inputs = document.querySelectorAll(`${containerSelector} .otp-input`);
            inputs.forEach((input, index) => {
                input.addEventListener("input", () => {
                    input.value = input.value.replace(/\D/g, "").slice(0, 1);
                    if (input.value && index < inputs.length - 1) inputs[index + 1].focus();
                });

                input.addEventListener("keydown", (e) => {
                    if (e.key === "Backspace" && !input.value && index > 0) inputs[index - 1].focus();
                });
            });
        }

        function clearOTPInputs(containerSelector) {
            document.querySelectorAll(`${containerSelector} .otp-input`).forEach((input) => (input.value = ""));
        }

        setupOTPInputs("#otp");

        /* ============================================================
            9) DISABLE PAY BUTTON UNTIL BOTH DATES SELECTED
            - toggles disabled property and CSS class "disabled"
        ============================================================ */
        function validateDates() {
            if (!el.payBtn || !el.checkin || !el.checkout) return false;

            const cin = el.checkin.value;
            const cout = el.checkout.value;

            if (!cin || !cout) {
                el.payBtn.disabled = true;
                el.payBtn.classList.add("disabled");
                return false;
            }

            el.payBtn.disabled = false;
            el.payBtn.classList.remove("disabled");
            return true;
        }

        // initial validation on load
        validateDates();

        // also revalidate when any of the date inputs change (already wired above)
        if (el.checkin) el.checkin.addEventListener("change", validateDates);
        if (el.checkout) el.checkout.addEventListener("change", validateDates);

        /* ===============================================================
            10) USERT AUTH & SEND OTP FORM
        =============================================================== */
        if (el.verifyuser) {

            el.verifyuser.addEventListener("submit", async function(e) {
                e.preventDefault();

                el.sendOtpBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
                el.sendOtpBtn.disabled = true;

                try {
                    const formData = new FormData(el.verifyuser);

                    const post = await fetch(el.verifyuser.action, {
                        method: "POST",
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                    });

                    const resp = await post.json();

                    if (resp.status === 'success') {
                        notyf.open({
                            type: 'success',
                            message: resp.message
                        });

                        // Copy email into verify OTP form
                        el.verifyotpform.querySelector('input[name="email"]').value =
                            el.verifyuser.querySelector('input[name="email"]').value;

                        // Hide sendOTP form, show OTP form
                        setTimeout(() => {
                            el.sendOtpBtn.style.display = 'none';
                            el.verifyotpform.style.display = 'block';

                            // Clear previous OTP
                            clearOTPInputs('#otp');
                        }, 600);

                    } else {
                        notyf.open({
                            type: 'error',
                            message: resp.message
                        });
                    }

                } catch (error) {
                    notyf.open({
                        type: 'error',
                        message: 'Something went wrong!'
                    });
                    console.error('Send OTP Error:', error);

                } finally {
                    el.sendOtpBtn.disabled = false;
                    el.sendOtpBtn.innerHTML = 'Send OTP';
                }
            });
        }



        /* ===============================================================
           VERIFY OTP FORM
        =============================================================== */
        if (el.verifyotpform) {

            el.verifyotpform.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Safety check for button existence
                if (!el.verifyOtpBtn) return;

                el.verifyOtpBtn.disabled = true;
                el.verifyOtpBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';

                // Collect OTP digits
                let otp = '';
                document.querySelectorAll('#otp .otp-input').forEach(i => otp += i.value);

                if (otp.length !== 6) {
                    notyf.open({
                        type: 'error',
                        message: 'Enter valid 6-digit OTP!'
                    });
                    el.verifyOtpBtn.disabled = false;
                    el.verifyOtpBtn.innerHTML = 'Verify OTP';
                    return;
                }

                try {
                    const formData = new FormData(el.verifyotpform);
                    formData.append('otp', otp);

                    const post = await fetch(el.verifyotpform.action, {
                        method: "POST",
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    const resp = await post.json();

                    if (resp.status === "success") {
                        notyf.open({
                            type: 'success',
                            message: resp.message || 'OTP Verified!'
                        });

                        setTimeout(() => {
                            window.location.reload();
                        }, 800);

                    } else {
                        notyf.open({
                            type: 'error',
                            message: resp.message || 'Invalid OTP!'
                        });

                        // Clear OTP fields
                        clearOTPInputs('#otp');
                    }

                } catch (error) {
                    notyf.open({
                        type: 'error',
                        message: 'Something went wrong!'
                    });
                    console.error("Verify OTP Error:", error);

                } finally {
                    el.verifyOtpBtn.disabled = false;
                    el.verifyOtpBtn.innerHTML = 'Verify OTP';
                }
            });
        }




        /* ============================================================
            11)Click handler to forward to payment page
            - Note: your HTML currently uses type="submit" on the button.
            - If you prefer client-side redirect with booking details in query params,
                change button to type="button" or handle form submit on server.
            - The snippet below is commented out — enable only if you want client redirect.
        ============================================================ */


        if (el.payBtn) {
            el.payBtn.addEventListener("click", function(e) {
                // if button is a submit inside a form, remove this preventDefault
                e.preventDefault();

                if (!validateDates()) {
                    alert("Please select check-in and check-out dates.");
                    return;
                }

                const data = {
                    user_id: "<?= isset($user['id']) ? $user['id'] : 0 ?>",
                    name: el.nameInput ? el.nameInput.value : "",
                    email: el.emailInput ? el.emailInput.value : "",
                    phone: el.phoneInput ? el.phoneInput.value : "",
                    adults: el.adults ? el.adults.value : DEFAULT.persons.adults,
                    children: el.children ? el.children.value : DEFAULT.persons.children,
                    infants: el.infants ? el.infants.value : DEFAULT.persons.infants,
                    check_in: el.checkin ? el.checkin.value : "",
                    check_out: el.checkout ? el.checkout.value : "",
                    nights: getNumberOfNights(),
                    hotel_id: "<?= isset($hotel['id']) ? $hotel['id'] : '' ?>",
                    room_id: "<?= isset($room['id']) ? $room['id'] : '' ?>",
                    price: calculateFinalPrice()
                };

                let missing = false;
                Object.values(data).forEach(value => {
                    if (value === "" || value === null || value === undefined) {
                        missing = true;
                    }
                });

                if (missing) {
                    notyf.open({
                        type: 'error',
                        message: "Please fill all details!"
                    });
                    return;
                }
                const query = new URLSearchParams(data).toString();
                window.location.href = url + "?" + query;

            });
        }


    }); // DOMContentLoaded
</script>