<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes
$routes->get('/', 'User\Home::index', ['as' => 'home']);

$routes->group('hotel', static function ($routes): void {
    $routes->get('details', 'User\Hoteldetails::details', ['as' => 'hotel.details']);
    $routes->get('checkout', 'User\Hotelcheckout::index', ['as' => 'hotel.checkout', 'filter' => 'AuthFilter:user']);
});

// Auth routes (guest only)
$routes->group('', ['filter' => 'AuthFilter:auth'], static function ($routes) {
    
    // Google auth 
    $routes->get('auth/google', 'AuthController::redirectToGoogle', ['as' => 'google.login']);
    $routes->get('auth/google-callback', 'AuthController::handleGoogleCallback', ['as' => 'google.callback']);

    // Manual auth with verification
    $routes->post('register', 'AuthController::register', ['as' => 'user.register.post']);
    $routes->post('login', 'AuthController::login', ['as' => 'user.login.post']);
    $routes->post('user/forgot', 'AuthController::forgotPassword', ['as' => 'user.forgot.post']);
    $routes->post('user/forgot/verify', 'AuthController::verifyForgotOtp', ['as' => 'user.otp.verify.post']);
    $routes->post('user/reset-password', 'AuthController::resetPassword', ['as' => 'user.reset.password']);
    $routes->post('verify-otp', 'AuthController::verifyOTP', ['as' => 'user.otp.verify.post']);
    $routes->get('auth/verify-magic', 'AuthController::verifyMagicLink', ['as' => 'user.magic.verify']);
});

// Authenticated users only
$routes->group('', ['filter' => 'AuthFilter:user'], static function ($routes) {
    $routes->get('logout', 'AuthController::logout', ['as' => 'user.logout']);
});



// ---------------------------------------------- Admin routes -------------------------------------------------
// Custom route for uploded images(uri)
$routes->get('image/hotel_thumbnail/(:num)/(:segment)', 'Admin\ImageController::hotelThumbnail/$1/$2');
$routes->get('image/hotel_gallery/(:num)/(:segment)', 'Admin\ImageController::hotelGallery/$1/$2');

// Admin Authentication routes - accessible only if NOT logged in
$routes->group('admin', ['filter' => 'AdminFilter:auth'], static function ($routes) {
    $routes->get('', 'Admin\Login::index', ['as' => 'admin.login']);
    $routes->post('', 'Admin\Login::loginHandler', ['as' => 'admin.login.handler']);
});

// Admin Dashboard and other admin routes - accessible only if logged in as admin
$routes->group('admin', ['filter' => 'AdminFilter:admin'], static function ($routes) {
    $routes->get('home', 'Admin\Home::index', ['as' => 'admin.home']);

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
    $routes->get('add_room', 'Admin\Addroom::index', ['as' => 'admin.addRoom']);
    $routes->get('members', 'Admin\Members::index', ['as' => 'admin.members']);
    $routes->get('add_admin', 'Admin\Addadmin::index', ['as' => 'admin.addadmin']);
    $routes->post('add_admin', 'Admin\Addadmin::registerHandler', ['as' => 'admin.addadmin.handler']);
    $routes->get('logout', 'Admin\Logout::logoutHandler', ['as' => 'admin.logout.handler']);
    $routes->get('forgot_password', 'Admin\Forgotpassword::index', ['as' => 'admin.forgot.password']);
    $routes->post('forgot_password', 'Admin\Forgotpassword::forgotPasswordHandler', ['as' => 'admin.forgot.password.handler']);
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
