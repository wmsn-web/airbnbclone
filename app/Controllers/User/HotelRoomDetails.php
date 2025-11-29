<?php

namespace App\Controllers\User;

use App\Models\HotelModel;


use App\Controllers\BaseController;
use App\Models\RoomModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class HotelRoomDetails extends BaseController
{
    public function details(): string
    {


        $data = [
            'pageTitle' => 'Hotel Details',
            'groupHeader' => null,
        ];
        return view('fronts/user/Hotel-details', $data);
    }
    public function rooms($id = 1): string
    {

        $model = new HotelModel();
        $hotel = $model->getSingleHotel($id);
        // if (empty($hotel)) {
        //     throw PageNotFoundException::forPageNotFound("Hotel not found");
        // }
        $roomModel = new RoomModel();
        $rooms = $roomModel->where('hotel_id', $id)->findAll();
        $data = [
            'pageTitle' => 'Hotel Details',
            'groupHeader' => null,
            'hotel' => $hotel,
            'rooms' => $rooms
        ];
        return view('fronts/user/Hotel-Room-Details', $data);
    }
}
