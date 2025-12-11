<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\HotelLocationModel;

class Destinations extends BaseController
{
    public function index()
    {
        $hotelLocation = new HotelLocationModel();
        $places = $hotelLocation
            ->distinct()
            ->select("COALESCE(city, state, country_or_region) AS place")
            ->where("COALESCE(city, state, country_or_region) !=", "")
            ->orderBy('place', 'ASC')
            ->findAll();
        $data = [
            'pageTitle' => 'Destinations',
            'places' => $places,
        ];
        return view('fronts/user/Destinations', $data);
    }
}
