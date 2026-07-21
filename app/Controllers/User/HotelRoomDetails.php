<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AmenitiesModel;
use App\Models\HotelModel;
use App\Models\RoomModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class HotelRoomDetails extends BaseController
{
    public function details($slug)
    {
        $hotelM = new HotelModel();
        $roomM = new RoomModel();
        $getFullH = $hotelM->getSingleHotel($slug);
        $roomsByHotel = $roomM->roomsByHotel($getFullH['id']);
        $data = [
            'pageTitle' => 'Hotel Details',
            'hotelDetails' => $getFullH,
            'roomsByHotel' => $roomsByHotel
        ];
        // dd($data);
        return view('fronts/user/Hotel-details', $data);
    }
    public function rooms($slug)
    {

        $hotelM = new HotelModel();
        $roomM = new RoomModel();
        $amModel = new AmenitiesModel();
        $getFullH = $hotelM->getSingleHotel($slug);
        $roomsByHotel = $roomM->roomsByHotel($getFullH['id']);
        $allAms = $amModel->getAmsWithCat();
        // if (empty($hotel)) {
        //     throw PageNotFoundException::forPageNotFound("Hotel not found");
        // }
        $data = [
            'pageTitle' => 'Hotel Details',
            'groupHeader' => null,
            'amenities'=> $allAms, 
            'hotel' => $getFullH,
            'rooms' => $roomsByHotel
        ];
        return view('fronts/user/Hotel-room-details', $data);
    }
}
