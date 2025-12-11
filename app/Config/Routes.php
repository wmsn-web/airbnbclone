<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes
$routes->get('/', 'User\Home::index', ['as' => 'home']);
$routes->get('bookings', 'User\Bookings::index');
$routes->get('destinations', 'User\Destinations::index');
$routes->get('events', function () {
    echo "Coming soon";
});
$routes->get('offers', function () {
    echo "Coming soon";
});

// Public hotel pages
$routes->get('hotel/(:segment)', 'User\HotelRoomDetails::details/$1');
$routes->get('hotel/(:segment)/rooms', 'User\HotelRoomDetails::rooms/$1');
$routes->get('hotels/(:segment)', 'User\FindHotel::index/$1');
$routes->get('hotel/gallery/(:num)', 'User\HotelGallery::index/$1');

// Custom route for uploded images(uri)
$routes->get('image/hotel_thumbnail/(:num)/(:segment)', 'User\ImageController::hotelThumbnail/$1/$2');
$routes->get('image/hotel_gallery/(:num)/(:segment)', 'User\ImageController::hotelGallery/$1/$2');

// Guest-only: login/register/forgot
$routes->group('', ['filter' => 'AuthFilter:auth'], function ($routes) {

    // Google Login
    $routes->get('auth/google', 'AuthController::redirectToGoogle');
    $routes->get('auth/google-callback', 'AuthController::handleGoogleCallback');

    // Manual Login/Register
    $routes->post('register', 'AuthController::register');
    $routes->post('verify-otp', 'AuthController::verifyOTP');
    $routes->post('login', 'AuthController::login');
    $routes->post('user/forgot', 'AuthController::forgotPassword');
    $routes->post('user/forgot/verify', 'AuthController::verifyForgotOtp');
    $routes->post('user/reset-password', 'AuthController::resetPassword');

    // Magic link
    $routes->get('auth/verify-magic', 'AuthController::verifyMagicLink');
});

// User-only protected routes
$routes->group('', ['filter' => 'AuthFilter:user'], function ($routes) {

    // User Checkout Process
    $routes->get('hotel/(:segment)/checkout', 'User\Hotelcheckout::checkout/$1');
    $routes->get('hotel/(:segment)/payment', 'User\Hotelcheckout::payment/$1');

    // Stripe Payment
    $routes->post('create-intent', 'User\PaymentController::crateIntent');
    $routes->match(['GET', 'POST'], 'confirm-payment', 'User\PaymentController::confirmPayment');

    // Booking pages
    $routes->get('booking-confirmation/(:any)', 'User\PaymentController::confirmation/$1');
    $routes->get('download-invoice/(:any)', 'User\PaymentController::invoicePDF/$1');

    // Contact form (only logged in users)
    $routes->post('contact/post', 'User\Contact::getContact');

    // Logout
    $routes->get('logout', 'AuthController::logout');
});
// Cart
$routes->get('cart', 'User\Cart::index');
$routes->post('cart/addRoom', 'User\Cart::addRoom');
$routes->get('cart/getRooms', 'User\Cart::getRooms');
$routes->post('cart/removeRoom', 'User\Cart::removeRoom');
$routes->post('cart/addroom/(:segment)', 'User\Cart::addRoomId/$1');
$routes->post('cart/remove/(:segment)', 'User\Cart::removeRoomId/$1');

// Public view pages
$routes->get('contact', 'User\Contact::index');




// ---------------------------------------------- Admin routes -------------------------------------------------



// Admin Authentication routes - accessible only if NOT logged in
$routes->group('admin', ['filter' => 'AdminFilter:auth'], static function ($routes) {
    $routes->get('', 'Admin\Login::index', ['as' => 'admin.login']);
    $routes->post('', 'Admin\Login::loginHandler', ['as' => 'admin.login.handler']);
});

// Admin Dashboard and other admin routes - accessible only if logged in as admin
// Logged-in (all roles allowed)
$routes->group('admin', ['filter' => 'AdminFilter:login'], static function ($routes) {
    $routes->get('home', 'Admin\Home::index', ['as' => 'admin.home']);
    $routes->get('test', 'Admin\Home::test');

    $routes->group('add-property', static function ($routes) {
        $routes->get('info', 'Admin\AddProperty::info', ['as' => 'admin.addProperty']);
        $routes->get('info/(:num)', 'Admin\AddProperty::info/$1');
        $routes->get('location/(:num)', 'Admin\AddProperty::location/$1');
        $routes->get('amenities/(:num)', 'Admin\AddProperty::amenities/$1');
        $routes->get('photos/(:num)', 'Admin\AddProperty::photos/$1');
        $routes->get('finance/(:num)', 'Admin\AddProperty::finance/$1');
        $routes->get('policies/(:num)', 'Admin\AddProperty::policies/$1');
        $routes->get('review/(:num)', 'Admin\AddProperty::review/$1');
        //$routes->get('', 'Admin\AddProperty::index', ['as' => 'admin.addProperty']);
        //$routes->get('(:segment)', 'Admin\Addproperty::index/$1'); // Example: tab2
        //$routes->get('(:segment)/(:num)', 'Admin\Addproperty::index/$1/$2'); // Example: tab2 + hotel_id

        $routes->post('save-hotel', 'Admin\AddProperty::saveHotel');
        $routes->post('save-hotel/(:num)', 'Admin\Addproperty::saveHotel/$1');
        $routes->post('save-location/(:num)', 'Admin\Addproperty::saveLocation/$1');
        $routes->post('add-amenities', 'Admin\Addproperty::addAmenities');
        $routes->post('save-amenities/(:num)', 'Admin\Addproperty::saveHotelAmenities');
    });

    // Tab form submissions end
    // $routes->get('search_hotel', 'Admin\Searchhotel::searchHotel', ['as' => 'admin.search.hotel']);

    $routes->get('room_listing', 'Admin\Roomlisting::index', ['as' => 'admin.room.listing']);
    $routes->get('hotel_listing', 'Admin\Hotellisting::index', ['as' => 'admin.hotel.listing']);
    $routes->group('add_room', static function ($routes) {
        $routes->get('', 'Admin\Addroom::index', ['as' => 'admin.addRoom']);
        $routes->post('add-room-type', 'Admin\Addroom::addRoomCatagory');
        $routes->post('add-room-details', 'Admin\Addroom::addRoomDetails');
    });
    $routes->get('members', 'Admin\Members::index', ['as' => 'admin.members']);

    // Super Admin Only
    $routes->group('', ['filter' => 'AdminFilter:superadmin'], static function ($routes) {
        $routes->get('add_admin', 'Admin\Addadmin::index', ['as' => 'admin.addadmin']);
        $routes->post('add_admin', 'Admin\Addadmin::registerHandler', ['as' => 'admin.addadmin.handler']);
        $routes->get('forgot_password', 'Admin\Forgotpassword::index', ['as' => 'admin.forgot.password']);
        $routes->post('forgot_password', 'Admin\Forgotpassword::forgotPasswordHandler', ['as' => 'admin.forgot.password.handler']);
    });

    $routes->get('logout', 'Admin\Logout::logoutHandler', ['as' => 'admin.logout.handler']);
});

// API
$routes->group('api', static function ($routes) {
    $routes->get('hotels', 'Api\HotelController::allHotels', ['as' => 'api.hotels']);
    $routes->get('hotels/(:num)', 'Api\HotelController::allHotels/$1');
    $routes->get('hotel/(:num)', 'Api\HotelController::singleHotel/$1');
    $routes->get('search', 'Api\SearchHotel::searchHotel', ['as' => 'search.hotel']);
});

// 404 override - custom page for not found routes
$routes->set404Override(function () {
    return view('fronts/Error_404.php');
});
