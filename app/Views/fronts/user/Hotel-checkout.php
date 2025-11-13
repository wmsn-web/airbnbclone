<?= $this->extend('fronts\templates\Viewlayout') ?>

<?= $this->section('pageTitle') ?>
<?= esc($pageTitle); ?>
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="pt-4 pb-9">
    <div class="container-medium">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= route_to('home') ?>" class="<?= uri_string() == 'home' ? ' text-decoration-underline text-primary' : 'text-black' ?>">Hotels</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('hotelDetails') ?>" class="<?= uri_string() == 'details' ? ' text-decoration-underline text-primary' : 'text-black' ?>">Details</a></li>
                <li class="breadcrumb-item"><a href="<?= route_to('hotelCheckOut') ?>" class="<?= uri_string() == 'checkout' ? ' text-decoration-underline text-primary' : 'text-black' ?>">Check Out</a></li>
            </ol>
        </nav>
        <h2 class="mb-5">Check out</h2>
        <div class="row justify-content-between">
            <div class="col-lg-7 col-xl-6">
                <form id="checkoutForm1">
                    <hr class="mt-0 mb-7">
                    <h3 class="fw-bold mb-5">Enter your details</h3>
                    <h5 class="mb-3">Are you travelling for work?</h5>
                    <div class="form-check form-check-inline me-4"><input class="form-check-input" id="no" type="radio"
                            name="tripTypeRadio" value="no" checked><label class="form-check-label" for="no">No</label>
                    </div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="yes" type="radio"
                            name="tripTypeRadio" value="yes"><label class="form-check-label" for="yes">Yes</label></div>
                    <div class="row g-3 mb-5 mt-1">
                        <div class="col-sm-6"><label class="fw-bold text-body-highlight mb-1" for="first-name">First
                                name</label><input class="form-control" type="text" id="first-name"
                                placeholder="First name"></div>
                        <div class="col-sm-6"><label class="fw-bold text-body-highlight mb-1" for="last-name">Last
                                name</label><input class="form-control" type="text" id="last-name"
                                placeholder="Last name"></div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6"><label class="fw-bold text-body-highlight mb-1" for="email-address">Email
                                address</label><input class="form-control" type="email" id="email-address"
                                placeholder="Email address"></div>
                        <div class="col-sm-6"><label class="fw-bold text-body-highlight mb-1"
                                for="confirm-email-address">Confirm email address</label><input class="form-control"
                                type="email" id="confirm-email-address" placeholder="Confirm email address"></div>
                    </div>
                    <h5 class="mb-3 mt-7">Who are you booking for?</h5>
                    <div class="form-check form-check-inline me-4"><input class="form-check-input" id="me" type="radio"
                            name="bookingPersonRadio" value="no" checked><label class="form-check-label" for="me">I am
                            the main guest</label></div>
                    <div class="form-check form-check-inline"><input class="form-check-input" id="else" type="radio"
                            name="bookingPersonRadio" value="yes"><label class="form-check-label" for="else">I am
                            booking for somebody else</label></div>
                    <h5 class="mb-3 mt-6">Add to your stay</h5>
                    <div class="form-check mb-4"><input class="form-check-input" id="airportShuttle"
                            type="checkbox"><label class="form-check-label fw-normal fs-8 text-body"
                            for="airportShuttle"> I am interested in requesting an airport shuttle<span
                                class="d-block fs-9 text-body-tertiary">We'll tell your accommodation what you're
                                interested in so they can provide details and costs.</span></label></div>
                    <div class="form-check"><input class="form-check-input" id="rentingCar" type="checkbox"><label
                            class="form-check-label fw-normal fs-8 text-body" for="rentingCar"> I'm interested in
                            renting a car<span class="d-block fs-9 text-body-tertiary">Make the most of your trip and
                                check the car rental options in your booking confirmation.</span></label></div>
                    <h5 class="mb-3 mt-6">Your arrival time</h5>
                    <div class="row gx-2">
                        <div class="col-6 col-sm-3"><select class="form-select">
                                <option value="1">12:00</option>
                                <option value="2">03:00</option>
                                <option value="3">06:00</option>
                                <option value="4">09:00</option>
                            </select></div>
                        <div class="col-6 col-sm-3"><select class="form-select">
                                <option value="am">AM</option>
                                <option value="pm">PM</option>
                            </select></div>
                    </div>
                    <h5 class="mb-3 mt-7">Review house rules</h5>
                    <p>Your host would like you to agree to the following house rules:</p>
                    <p class="mb-2"><span class="fa-solid fa-circle text-body-quaternary fs-10 me-2"
                            data-fa-transform="up-2"></span>No smoking</p>
                    <p><span class="fa-solid fa-circle text-body-quaternary fs-10 me-2"
                            data-fa-transform="up-2"></span>Pets are not allowed </p>
                    <p class="text-info mb-7">By continuing to the next step, you are agreeing to these house rules.</p>
                    <h5 class="mb-3">Special requests</h5>
                    <p class="fs-9 text-body-tertiary mb-4">Special requests cannot be guaranteed, but the property will
                        do its best to meet your needs. You can always make a special request after your booking is
                        complete!</p><textarea class="form-control" name="requestText" rows="5" id="requestText"
                        placeholder="Type your request"></textarea>
                    <hr class="mt-7 mb-5"><a class="btn btn-primary" href="payment.html">Final details<span
                            class="fa-solid fa-chevron-right ms-2" data-fa-transform="shrink-3"></span></a>
                </form>
            </div>
            <div class="col-lg-5 col-xl-4">
                <div class="card mt-5 mt-lg-0">
                    <div class="card-body">
                        <h5 class="mb-3">Summary</h5><img class="rounded-2 mb-3"
                            src="../../../../assets/img/hotels/39.png" alt="" width="208" />
                        <h4 class="text-body-highlight mb-2">Radisson Blu Water Garden Hotel, Dhaka</h4>
                        <p class="mb-5 text-body-tertiary">Airport Rd, Dhaka Cantonment, Dhaka, 1206, Bangladesh</p>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-3 mb-4">
                                    <div>
                                        <h5 class="text-body-highlight">Room 1</h5>
                                        <p class="mb-0 text-body-tertiary">King-Super deluxe</p>
                                    </div>
                                    <h4 class="mb-0">$2,056.75</h4>
                                </div>
                                <div class="row align-items-center g-0">
                                    <div class="col-3">
                                        <h5 class="text-body text-nowrap mb-0">Check in</h5>
                                    </div>
                                    <div class="col-auto"><span class="px-2">:</span></div>
                                    <div class="col-auto"><span>25 January, 2023</span></div>
                                </div>
                                <div class="row align-items-center g-0 mb-4">
                                    <div class="col-3">
                                        <h5 class="text-body text-nowrap mb-0">Check out</h5>
                                    </div>
                                    <div class="col-auto"><span class="px-2">:</span></div>
                                    <div class="col-auto"><span>27 January, 2023</span></div>
                                </div>
                                <div class="d-flex flex-wrap gap-2"><span
                                        class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span
                                            class="fa-solid fa-bed fs-9 me-2"></span><span>Double bed</span></span><span
                                        class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span
                                            class="fa-solid fa-user fs-9 me-2"></span><span>2 Adults</span></span><span
                                        class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span
                                            class="fa-solid fa-moon fs-9 me-2"></span><span>2 Nights</span></span></div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-3 mb-4">
                                    <div>
                                        <h5 class="text-body-highlight">Room 2</h5>
                                        <p class="mb-0 text-body-tertiary">Standard double queen</p>
                                    </div>
                                    <h4 class="mb-0">$1,456.65</h4>
                                </div>
                                <div class="row align-items-center g-0">
                                    <div class="col-3">
                                        <h5 class="text-body text-nowrap mb-0">Check in</h5>
                                    </div>
                                    <div class="col-auto"><span class="px-2">:</span></div>
                                    <div class="col-auto"><span>25 January, 2023</span></div>
                                </div>
                                <div class="row align-items-center g-0 mb-4">
                                    <div class="col-3">
                                        <h5 class="text-body text-nowrap mb-0">Check out</h5>
                                    </div>
                                    <div class="col-auto"><span class="px-2">:</span></div>
                                    <div class="col-auto"><span>28 January, 2023</span></div>
                                </div>
                                <div class="d-flex flex-wrap gap-2"><span
                                        class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span
                                            class="fa-solid fa-bed fs-9 me-2"></span><span>Double bed</span></span><span
                                        class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span
                                            class="fa-solid fa-user fs-9 me-2"></span><span>2 Adults</span></span><span
                                        class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span
                                            class="fa-solid fa-baby fs-9 me-2"></span><span>1 Childs</span></span><span
                                        class="badge badge-phoenix badge-phoenix-secondary py-1 border-0 text-capitalize"><span
                                            class="fa-solid fa-moon fs-9 me-2"></span><span>3 Nights</span></span></div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-body-highlight rounded-2">
                            <div class="d-flex flex-between-center mb-2">
                                <h6 class="text-body-tertiary fw-semibold">Sub-total</h6>
                                <h6 class="text-body-highlight fw-semibold">$3,513.40</h6>
                            </div>
                            <div class="d-flex flex-between-center">
                                <h6 class="text-body-tertiary fw-semibold">Discount</h6>
                                <h6 class="text-body-tertiary fw-semibold">-$50</h6>
                            </div>
                            <hr />
                            <div class="d-flex flex-between-center">
                                <h4 class="text-body">Total</h4>
                                <h4 class="text-body">1,756.70</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>