<script>
    document.addEventListener("DOMContentLoaded", () => {
        const datePicker = '.datetimepicker';
        const dateValue = "<?= isset($query['date']) ? esc($query['date']) : '' ?>";

        const flatpickrOptions = {
            mode: "range",
            dateFormat: "Y/m/d",
            disableMobile: true,

            // Restrict date to today → +60 days
            minDate: "today",
            maxDate: new Date().fp_incr(180),

            // Hide month dropdown + hide year selector
            monthSelectorType: "static",
            yearSelectorType: "static"
        };

        // If user already selected date → set defaultDate
        if (dateValue) {
            flatpickrOptions.defaultDate = dateValue.split(" to ");
        }

        flatpickr(datePicker, flatpickrOptions);


        // --- DEFAULT VALUES ---
        const guestFields = {
            adults: document.getElementById("adults"),
            children: document.getElementById("children"),
            infants: document.getElementById("infants")
        };

        function updateGuestButton() {
            let a = parseInt(guestFields.adults.value) || 0;
            let c = parseInt(guestFields.children.value) || 0;
            let i = parseInt(guestFields.infants.value) || 0;

            let parts = [];

            if (a > 0) parts.push(`${a} adult${a > 1 ? "s" : ""}`);
            if (c > 0) parts.push(`${c} child${c > 1 ? "ren" : ""}`);
            if (i > 0) parts.push(`${i} infant${i > 1 ? "s" : ""}`);

            // If no value at all
            if (parts.length === 0) {
                parts.push("Guests");
            }

            const guestDropdownBtn = document.getElementById("guestDropdownBtn");
            if (guestDropdownBtn) {
                guestDropdownBtn.innerHTML = `<span class="fa-solid fa-user me-2"></span>${parts.join(", ")}`;
            }
        }

        // --- PLUS / MINUS BUTTONS ---
        document.querySelectorAll("[data-type]").forEach(btn => {
            btn.addEventListener("click", () => {
                const field = guestFields[btn.dataset.target];
                let value = parseInt(field.value);

                if (btn.dataset.type === "minus" && value > 0) {
                    value--;
                }
                if (btn.dataset.type === "plus") {
                    value++;
                }

                // Adults must be minimum 1
                if (btn.dataset.target === "adults" && value < 1) value = 1;

                field.value = value;

                updateGuestButton();
            });
        });

        // --- Update initially on page load ---
        updateGuestButton();
        // Form submit
        const form = document.getElementById("getHotel");
        if (form) {
            form.addEventListener("submit", function(e) {
                e.preventDefault();

                const location = document.getElementById("place").value;

                if (!location) {
                    notyf.open({
                        type: "error",
                        message: "Please select a location"
                    });
                    return;
                }

                const params = new URLSearchParams(new FormData(this));
                params.delete("location");

                let url = `<?= base_url() ?>hotels/${encodeURIComponent(location)}`;
                if ([...params].length > 0) {
                    url += "?" + params.toString();
                }

                window.location.href = url;
            });
        }

    });
</script>