<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\HotelModel;
use App\Models\HotelLocationModel;
use App\Models\RoomModel;

class FindHotel extends BaseController
{
    public function index($location)
    {
        $query = $this->request->getGet();
        // Extract date range
        $dateRange = $query['date'] ?? '';

        $startDate = null;
        $endDate = null;

        if ($dateRange) {
            // Split by "to"
            $parts = explode(' to ', $dateRange);

            if (count($parts) === 2) {
                $startDate = trim($parts[0]);
                $endDate   = trim($parts[1]);

                // Convert to Y-m-d if needed
                $startDate = date('Y-m-d', strtotime(str_replace('/', '-', $startDate)));
                $endDate   = date('Y-m-d', strtotime(str_replace('/', '-', $endDate)));
            }
        }
        if (empty($location)) {
            return view('no-hotels-found', ['message' => 'Please select a location.']);
        }

        $location = urldecode($location);

        // 1. Get hotel IDs in this location
        $hotelLocationModel = new HotelLocationModel();
        $places = $hotelLocationModel
            ->distinct()
            ->select("COALESCE(city, state, country_or_region) AS place")
            ->where("COALESCE(city, state, country_or_region) !=", "")
            ->orderBy('place', 'ASC')
            ->findAll();

        $hotelIds = $hotelLocationModel
            ->where('city', $location)
            ->findColumn('hotel_id');

        if (empty($hotelIds)) {
            return view('no-hotels-found', ['message' => "No hotels found in $location"]);
        }

        // 2. Get hotels
        $hotelModel = new HotelModel();
        $hotels = $hotelModel->whereIn('id', $hotelIds)->findAll();

        // 3. Get rooms
        $roomModel = new RoomModel();
        $rooms = $roomModel->whereIn('hotel_id', $hotelIds)->findAll();

        // 4. Get addresses
        $addresses = $hotelLocationModel
            ->whereIn('hotel_id', $hotelIds)
            ->findAll();

        // Group rooms by hotel
        $roomsByHotel = [];
        foreach ($rooms as $room) {
            $roomsByHotel[$room['hotel_id']][] = $room;
        }

        // Group addresses by hotel
        $addrByHotel = [];
        foreach ($addresses as $addr) {
            $addrByHotel[$addr['hotel_id']] = $addr;
        }

        // Build final structured list
        $finalHotels = [];
        foreach ($hotels as $hotel) {
            $id = $hotel['id'];

            $finalHotels[] = [
                'hotel'   => $hotel,
                'address' => $addrByHotel[$id] ?? null,
                'rooms'   => $roomsByHotel[$id] ?? []
            ];
        }
        // $data = [
        //     $places,
        //     $location,
        //     $query,
        //     $finalHotels
        // ];
        // echo "<pre>";
        // print_r($data);
        return view('fronts/user/Find-hotel-room', [
            'places' => $places,
            'location' => $location,
            'query'    => $query,
            'startDate' => $startDate,
            'endDate'   => $endDate,
            'hotels'   => $finalHotels
        ]);
    }
}
