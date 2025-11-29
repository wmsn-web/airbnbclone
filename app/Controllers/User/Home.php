<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\HotelLocationModel;
use App\Models\HotelModel;

class Home extends BaseController
{
    public function index(): string
    {
        $hotelLocation = new HotelLocationModel();
        $places = $hotelLocation
            ->distinct()
            ->select("COALESCE(city, state, country_or_region) AS place")
            ->where("COALESCE(city, state, country_or_region) !=", "")
            ->orderBy('place', 'ASC')
            ->findAll();
        $data = [
            'pageTitle' => 'Home',
            'places' => $places
        ];
        return view('fronts/user/Home', $data);
    }
}
