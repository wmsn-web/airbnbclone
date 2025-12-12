<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Libraries\RoomCart;
use App\Models\HotelModel;
use App\Models\RoomModel;

class Hotelcheckout extends BaseController
{
    protected $cart;
    public function __construct()
    {
        $this->cart = new RoomCart();
    }
    
    public function checkout()
    {
        $getData = $this->request->getGet();
        $hotelM = new HotelModel();
        $roomM = new RoomModel();
        $getHotels = $hotelM->find((int)$getData['hotelId']);
        $getRooms = $roomM->roomByIds($getData['roomId'], $getData['hotelId']);
        $data = [
            'pageTitle' => 'Checkout',
            'query' => $getData,
            'hotel' => $getHotels,
            'room' => $getRooms
        ];
        // dd($data);
        return view('fronts/user/Checkout', $data);
    }
    public function payment(){
        $getData = $this->request->getGet();
        $hotelM = new HotelModel();
        $roomM = new RoomModel();
        $getHotels = $hotelM->find((int)$getData['hotel_id']);
        $getRooms = $roomM->roomByIds($getData['room_id'], $getData['hotel_id']);
        $data = [
            'pageTitle' => 'Checkout',
            'query' => $getData,
            'hotel' => $getHotels,
            'room' => $getRooms,
        ];
        // dd($getData);
        return view('fronts/user/Payment', $data);
    }
}
