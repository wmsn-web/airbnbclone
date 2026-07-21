<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\HotelModel;
use App\Models\HotelLocationModel;

class Home extends BaseController
{
    public function index($limit = null)
    {
        $hotel = new HotelModel();
        $hotelsByLocation = $hotel->hotelsByLocation($limit);
        $hotelLocation = new HotelLocationModel();
        $places = $hotelLocation
            ->distinct()
            ->select("COALESCE(city, state, country_or_region) AS place")
            ->where("COALESCE(city, state, country_or_region) !=", "")
            ->orderBy('place', 'ASC')
            ->findAll();
        $data = [
            'pageTitle' => 'Home',
            'places' => $places,
            'totalHotels' => $hotelsByLocation['total_hotels'],
            'totalCities' => $hotelsByLocation['total_cities'],
            'locations' => $hotelsByLocation['locations'],
            'helper'=> setting('currency_method')
            
        ];
        // dd($data);
        return view('fronts/user/Home', $data);
    }
}
