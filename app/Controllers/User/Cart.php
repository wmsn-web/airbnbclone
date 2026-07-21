<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Libraries\RoomCart;
use App\Models\RoomModel;

class Cart extends BaseController
{
    protected RoomCart $cart;

    public function __construct()
    {
        $this->cart = new RoomCart();
    }

    public function index()
    {
        return view('fronts/user/Cart-2', [
            'pageTitle' => 'Your Cart',
            'cart' => $this->cart->all()
        ]);
    }

    public function getRooms()
    {
        return $this->response->setJSON([
            'success' => true,
            'cart' => $this->cart->all()
        ]);
    }

    public function addRoomId($id)
    {
        $data = $this->request->getJSON(true);

        if (!$data) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request'
            ]);
        }

        $room = (new RoomModel())
            ->select('id, room_name, price, hotel_id')
            ->find($id);

        if (!$room) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Room not found'
            ]);
        }
        $checkIn  = $data['check_in']  ?? session('search_start');
        $checkOut = $data['check_out'] ?? session('search_end');

        $checkIn  = $this->normalizeDate($checkIn);
        $checkOut = $this->normalizeDate($checkOut);

        if (!$checkIn || !$checkOut) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid date format'
            ]);
        }

        $roomData = [
            'room_id' => (int)$room['id'],
            'hotel_id' => (int)$room['hotel_id'],
            'name' => esc($room['room_name']),
            'price' => (float)$room['price'],
            'guests' => [
                'adults' => max(1, (int)($data['adults'] ?? 1)),
                'children' => max(0, (int)($data['children'] ?? 0)),
                'infants' => max(0, (int)($data['infants'] ?? 0)),
            ],
            'dates' => [
                'check_in' => $checkIn,   // ALWAYS Y-m-d
                'check_out' => $checkOut, // ALWAYS Y-m-d
            ]
        ];

        $cart = $this->cart->add($roomData);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Room added to cart',
            'cart' => $cart
        ]);
    }
    private function normalizeDate(?string $date): ?string
    {
        if (!$date) {
            return null;
        }

        // ISO
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            return $date;
        }

        // Convert DD/MM/YYYY → Y-m-d
        $dt = \DateTime::createFromFormat('d/m/Y', $date)
            ?: \DateTime::createFromFormat('Y/m/d', $date);

        return $dt ? $dt->format('Y/m/d') : null;
        return null;
    }

    public function removeRoomId($id)
    {
        $cart = $this->cart->remove((int)$id);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Room removed',
            'cart' => $cart
        ]);
    }
}
