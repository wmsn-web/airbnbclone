<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\HotelModel;

class SearchHotel extends BaseController
{
    public function searchHotel()
    {
        $keyword = $this->request->getGet('keyword');
        if (empty($keyword)) {
            return $this->response->setJSON([
                'error' => true,
                'message'=> 'Empty keyword'
            ]);
        }

        if (!$keyword || strlen($keyword) < 3) {
            return $this->response->setJSON([
                'keyword' => $keyword,
                'hotels' => []
            ]);
        }

        $hotelModel = new HotelModel();

        $hotelsQuery = $hotelModel
            ->select('hotels.id, hotels.property_name, hotels.thumbnail, hotels.description')
            ->join('hotel_amenities', 'hotel_amenities.hotel_id = hotels.id', 'left')
            ->join('hotel_locations', 'hotel_locations.hotel_id = hotels.id', 'left');

        $hotelsQuery->groupStart()
            ->like('hotels.property_name', $keyword, 'both')
            ->orLike('hotel_amenities.amenities', $keyword, 'both')
            ->orLike('hotel_locations.street_name', $keyword, 'both')
            ->orLike('hotel_locations.city', $keyword, 'both')
            ->orLike('hotel_locations.state', $keyword, 'both')
            ->orLike('hotel_locations.zip_code', $keyword, 'both')
            ->orLike('hotel_locations.country_or_region', $keyword, 'both')
            ->groupEnd();
        $hotelsQuery->distinct();
        $hotels = $hotelsQuery->findAll(20);
        /*
        $hotels = $hotelModel
            ->like('property_name', $keyword)
            ->select('id, property_name, thumbnail, description') // Adjust fields as per your table
            ->findAll(20); // Limit results*/

        if ($hotels) {
            return $this->response->setJSON([
                'success' => true,
                'keyword' => $keyword,
                'hotels' => $hotels
            ])->setStatusCode(200);
        } else {
            return $this->response->setJSON([
                'error' => true,
                'keyword' => $keyword,
                'message'=>'No hotel found!',
            ])->setStatusCode(200);
        }
    }
}

