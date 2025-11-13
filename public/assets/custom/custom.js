document.addEventListener("DOMContentLoaded", function () {
    const input = document.querySelector("#phone");
    const iti = window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json")
                .then(res => res.json())
                .then(data => {
                    callback(data.country_code);
                })
                .catch(() => {
                    callback("us"); // fallback
                });
        },
        utilsScript: "<?= base_url('vendors/telephoneinput/js/utils.js') ?>", // include only if you need formatting/validation
        separateDialCode: true
    });

    // Optional: validation on blur
    input.addEventListener("blur", function () {
        if (input.value.trim()) {
            if (iti.isValidNumber()) {
                input.classList.remove("is-invalid");
                input.classList.add("is-valid");
            } else {
                input.classList.remove("is-valid");
                input.classList.add("is-invalid");
            }
        }
    });

    // Optional: get number on form submit
    const form = document.querySelector("form"); // adjust if needed
    if (form) {
        form.addEventListener("submit", function (e) {
            const fullPhone = iti.getNumber(); // e.g. +919898989898
            console.log("Full phone number:", fullPhone);
            // You can also set it to a hidden input if needed
        });
    }
});
