<?= $this->extend('fronts/templates/Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<script src="https://js.stripe.com/v3/"></script>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?php $session = session(); ?>

<section class="pt-4 pb-9">
    <div class="container-medium">
        <h2 class="mb-5">Check out</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- STRIPE PAYMENT FORM -->
                <form id="payment-form" action="<?= base_url('confirm-payment') ?>" method="POST">
                    <?= csrf_field() ?>
                    <input type="hidden" name="user_id" value="<?= $query['user_id'] ?>">
                    <input type="hidden" name="name" value="<?= $query['name'] ?>">
                    <input type="hidden" name="email" value="<?= $query['email'] ?>">
                    <input type="hidden" name="phone" value="<?= $query['phone'] ?>">
                    <input type="hidden" name="adults" value="<?= $query['adults'] ?>">
                    <input type="hidden" name="children" value="<?= $query['children'] ?>">
                    <input type="hidden" name="infants" value="<?= $query['infants'] ?>">
                    <input type="hidden" name="check_in" value="<?= $query['check_in'] ?>">
                    <input type="hidden" name="check_out" value="<?= $query['check_out'] ?>">
                    <input type="hidden" name="hotel_id" value="<?= $query['hotel_id'] ?>">
                    <input type="hidden" name="room_id" value="<?= $query['room_id'] ?>">
                    <input type="hidden" name="price" value="<?= $query['price'] ?>">
                    <input type="hidden" id="payment-intent-id" name="payment_intent_id">

                    <div id="payment-element" class="form-control mb-3"></div>
                    <div id="payment-message" class="hidden text-danger mb-2"></div>
                    <input type="hidden" name="stripeToken" id="stripe-token">
                    <button id="submit-button" class="btn btn-primary w-100" type="submit">
                        Pay
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>


<?= $this->section('script') ?>

<script>
    document.addEventListener("DOMContentLoaded", async function() {

        /* ============================================================
            STRIPE SETUP
        ============================================================ */
        const stripe = Stripe("<?= env('stripe.key') ?>");


        const response = await fetch("<?= base_url('create-intent') ?>", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                user_id: "<?= $query['user_id'] ?>",
                email: "<?= $query['email'] ?>",
                phone: "<?= $query['phone'] ?>",
                adults: "<?= $query['adults'] ?>",
                children: "<?= $query['children'] ?>",
                infants: "<?= $query['infants'] ?>",
                check_in: "<?= $query['check_in'] ?>",
                check_out: "<?= $query['check_out'] ?>",
                nights: "<?= $query['nights'] ?>",
                hotel_id: "<?= $query['hotel_id'] ?>",
                room_id: "<?= $query['room_id'] ?>",
                price: "<?= $query['price'] ?>",
            }),
        });
        const resp = await response.json();
        // console.log(resp);

        const clientSecret = resp.paymentIntent.client_secret;
        const elements = stripe.elements({
            clientSecret
        });
        const paymentElement = elements.create("payment");
        paymentElement.mount("#payment-element");

        /* ============================================================
            PAYMENT + BOOKING SUBMIT
        ============================================================ */
        const paymentForm = document.querySelector("#payment-form");
        const submitbtn = document.querySelector("#submit-button");

        if (paymentForm) {

            // Prevent Enter key from submitting
            paymentForm.addEventListener("keydown", function(e) {
                if (e.key === "Enter") {
                    e.preventDefault();
                }
            });

            // Prevent default form submission
            paymentForm.addEventListener("submit", function(e) {
                e.preventDefault();
            });

            // Handle Stripe + Booking
            async function payAndBook(e) {
                e.preventDefault();

                submitbtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
                submitbtn.disabled = true;

                document.getElementById("payment-intent-id").value = clientSecret;

                const {
                    paymentIntent,
                    error
                } = await stripe.confirmPayment({
                    elements,
                    redirect: "if_required",
                });

                if (error) {
                    notyf.open({
                        type: "error",
                        message: error.message
                    });
                    submitbtn.disabled = false;
                    submitbtn.innerHTML = "Pay Now";
                    return;
                }

                try {
                    const formData = new FormData(paymentForm);
                    const postPayment = await fetch(paymentForm.action, {
                        method: "POST",
                        body: formData,
                    });

                    const resp = await postPayment.json();

                    if (resp.success) {
                        notyf.open({
                            type: "success",
                            message: "Payment Successful"
                        });
                        setTimeout(() => window.location.href = resp.redirect, 1000);
                    } else {
                        for (const msg of Object.values(resp.errors || {})) {
                            notyf.open({
                                type: "error",
                                message: msg
                            });
                        }
                    }
                } catch (error) {
                    notyf.open({
                        type: "error",
                        message: "Something went wrong!"
                    });
                } finally {
                    submitbtn.disabled = false;
                    submitbtn.innerHTML = "Pay Now";
                }
            }

            // 4️⃣ Only this triggers the payment flow
            submitbtn.addEventListener("click", payAndBook);
        }

    });
</script>

<?= $this->endSection() ?>