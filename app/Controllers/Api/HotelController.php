<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\HotelModel;

class HotelController extends BaseController
{
    public function allHotels($limit = 16)
    {
        try {
            // $limit = $this->request->getGet('limit');
            $limit = is_numeric($limit) ? (int) $limit : null;

            $hotelModel = new HotelModel();
            $hotels = $hotelModel->getHotelFullListing($limit);
            if (empty($hotels)) {
                return $this->response->setJSON([
                    'error' => true,
                    'message' => 'No hotel found!'
                ])->setStatusCode(200);
            }
            return $this->response->setJSON([
                'success' => true,
                'count'   => count($hotels),
                'data'    => $hotels,
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Something went wrong.',
                'error'   => ENVIRONMENT !== 'production' ? $e->getMessage() : null
            ])->setStatusCode(500);
        }
    }
    public function singleHotel($id)
    {
        $hotelModel = new HotelModel();
        $hotel = $hotelModel->getSingleHotel($id);

        if (!empty($hotel)) {
            return $this->response->setJSON([
                'success' => true,
                'data'    => $hotel
            ]);
        } else {
            return $this->response->setJSON([
                'error' => true,
                'id' => $id,
                'message' => 'Hotel do not exist!',
            ])->setStatusCode(200);
        }
    }
}
