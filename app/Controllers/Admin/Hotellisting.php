<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;
use App\Models\HotelModel;


class Hotellisting extends BaseController
{
    public function index()
    {
        $admindata = CiAdmin::admin();
        $hotelModel = new HotelModel();
        $hotels = $hotelModel->getHotelFullListing();
        // $singleHotel = $hotelModel->getSingleHotel(4);
        $data = [
            'pageTitle' => 'Room-listing',
            'admindata' => $admindata,
            'hotels'    => $hotels,
            // 'hotel'    => $singleHotel,

        ];
        return view('fronts/admin/templates/Layout', $data)
            . view('fronts/admin/templates/Vertical-nav')
            . view('fronts/admin/templates/Top-nav')
            . view('fronts/admin/templates/Page-js')
            . view('fronts/admin/Hotel-listing')
            . view('fronts/admin/templates/Footer')
            . view('fronts/admin/templates/Jsmain');
    }
}
