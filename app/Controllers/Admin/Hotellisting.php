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
            'pageTitle' => 'Hotel Listing',
            'admindata' => $admindata,
            'hotels'    => $hotels,
            // 'hotel'    => $singleHotel,

        ];
        return view('fronts/admin/Hotel-listing', $data);
    }
}
