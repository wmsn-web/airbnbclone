<script>
    document.addEventListener("DOMContentLoaded", () => {
        const datePicker = '.datetimepicker';
        const dateValue = "<?= isset($query['date']) ? esc($query['date']) : '' ?>";

        const flatpickrOptions = {
            mode: "range",
            dateFormat: "d/m/Y",
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
        // Fix +/- buttons
        const dataType = document.querySelectorAll("[data-type]");
        if (dataType) {
            dataType.forEach(btn => {
                btn.addEventListener("click", () => {
                    const target = document.getElementById(btn.dataset.target);
                    let value = parseInt(target.value);

                    if (btn.dataset.type === "minus" && value > 0) {
                        value--;
                    }
                    if (btn.dataset.type === "plus") {
                        value++;
                    }
                    target.value = value;
                });
            });
        }

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

                let url = `<?= base_url() ?>hotel/${encodeURIComponent(location)}`;
                if ([...params].length > 0) {
                    url += "?" + params.toString();
                }

                window.location.href = url;
            });
        }

    });
</script>
<!-- data-options='{
"mode":"range",
"dateFormat":"d/m/Y",
"disableMobile":true,
}' -->