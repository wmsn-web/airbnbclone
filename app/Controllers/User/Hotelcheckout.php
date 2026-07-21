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
        $get = $this->request->getGet();

        $hotelM = new HotelModel();
        $roomM = new RoomModel();

        $hotels = $hotelM->find((int)$get['hotelId']);
        $room = $roomM->roomByIds($get['roomSlug'], $get['hotelId']);
        $dates = [
            'check_in'  => $get['checkIn'] ?? null,
            'check_out' => $get['checkOut'] ?? null,
        ];
        $pricing = $this->calculateRoomTotal($room, $dates);
        $data = [
            'pageTitle' => 'Checkout',
            'mode'      => 'single',
            'hotel' => $hotels,
            'rooms' => [$room],
            'query' => $get,
            'grandTotal' => $pricing['total'],
            'totalNights' => $pricing['nights'],
        ];
        // dd($data);
        return view('fronts/user/Checkout1', $data);
    }
    public function checkoutCart()
    {
        $cart = $this->cart->all();

        if (empty($cart['rooms'])) {
            return redirect()->to('/')->with('error', 'Cart is empty');
        }

        $hotelM = new HotelModel();
        $roomM  = new RoomModel();

        $rooms  = [];
        $hotel  = null;
        $grandTotal  = 0;
        $totalNights = 0;

        foreach ($cart['rooms'] as $item) {
            $room = $roomM->find($item['room_id']);
            if (!$room) continue;

            if (!$hotel) {
                $hotel = $hotelM->find($item['hotel_id']);
            }
            $pricing = $this->calculateRoomTotal($room, $item['dates']);
            $room['cart'] = $item; // attach cart meta
            $room['pricing'] = $pricing;

            $grandTotal  += $pricing['total'];
            $totalNights += $pricing['nights'];

            $rooms[] = $room;
        }
        $data = [
            'pageTitle' => 'Checkout',
            'mode'      => 'cart',
            'hotel'     => $hotel,
            'rooms'     => $rooms,
            'cart'      => $cart,
            'grandTotal'  => $grandTotal,
            'totalNights' => $totalNights,
        ];
        // dd($data);
        return view('fronts/user/Checkout1', $data);
    }

    private function calculateRoomTotal(array $room, array $dates)
    {
        // dates are already YYYY-MM-DD (safe)
        $checkIn  = new \DateTime($dates['check_in']);
        $checkOut = new \DateTime($dates['check_out']);

        $nights = max(1, $checkIn->diff($checkOut)->days);

        $pricePerNight = (float) $room['price'];

        $total = $pricePerNight * $nights;

        return [
            'nights' => $nights,
            'price_per_night' => $pricePerNight,
            'total' => $total
        ];
    }

    public function payment()
    {
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
