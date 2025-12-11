<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Libraries\RoomCart;
use App\Models\RoomModel;

class Cart extends BaseController
{
    protected $cart;

    public function __construct()
    {
        $this->cart = new RoomCart();
    }

    public function index() {
        $data = [
            'pageTitle' => 'Cart'
        ];
        return view('fronts/user/Cart', $data);
    }
    public function addRoom()
    {
        $id = $this->request->getPost('id');
        if (empty($id)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'missing room id']);
        }

        $room = [
            'id'    => $id,
            'name'  => $this->request->getPost('name') ?? 'Room',
            'hotel' => $this->request->getPost('hotel') ?? '',
            'price' => (float)($this->request->getPost('price') ?? 0),
            'startDate' => $this->request->getPost('startDate') ?? '',
            'endDate'   => $this->request->getPost('endDate') ?? '',
            'adults' => (int)($this->request->getPost('adults') ?? 1),
            'infants' => (int)($this->request->getPost('infants') ?? 0),
            'children' => (int)($this->request->getPost('children') ?? 0),
        ];

        // If dates empty, try populate from session default search
        if (empty($room['startDate']) && session()->has('search_start')) {
            $room['startDate'] = session('search_start');
            $room['endDate'] = session('search_end');
        }

        $rooms = $this->cart->add($room);

        return $this->response->setJSON([
            'status' => 'success',
            'rooms'  => $rooms
        ]);
    }
    public function addRoomId($id)
    {
        // Read JSON from fetch()
        $data = $this->request->getJSON(true);

        if (!$data) {
            return $this->response->setJSON([
                'error' => true,
                'message' => 'Invalid JSON received'
            ]);
        }

        $rModel = new RoomModel();
        $room = $rModel->select(['id', 'room_name', 'room_slug', 'description', 'price', 'hotel_id'])
            ->find($id);

        if (!$room) {
            return $this->response->setJSON([
                'error' => true,
                'message' => 'Room not found'
            ]);
        }

        // SESSION STRUCTURE
        $cart = session()->get('room_cart') ?? [];

        // Add/Update room
        $cart[$room['id']] = [
            'room' => $room,
            'guest_data' => $data,
        ];

        session()->set('room_cart', $cart);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Room added to cart!'
        ]);
    }
    public function removeRoomId($id){
        // Get the current cart
        $cart = session()->get('room_cart');

        // If cart empty
        if (!$cart || !is_array($cart)) {
            return $this->response->setJSON([
                'error' => true,
                'message' => 'Cart is empty'
            ]);
        }

        // If room exists in cart
        if (array_key_exists($id, $cart)) {

            unset($cart[$id]); // remove the room

            // If cart becomes empty → destroy session key
            if (empty($cart)) {
                session()->remove('room_cart');
            } else {
                session()->set('room_cart', $cart);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Room removed from cart'
            ]);
        }

        return $this->response->setJSON([
            'error' => true,
            'message' => 'Room does not exist in cart'
        ]);
    }

    public function getRooms()
    {
        return $this->response->setJSON([
            'rooms' => $this->cart->all()
        ]);
    }

    public function removeRoom()
    {
        $id = $this->request->getPost('id');
        $rooms = $this->cart->remove($id);

        return $this->response->setJSON([
            'status' => 'success',
            'rooms'  => $rooms
        ]);
    }
}
