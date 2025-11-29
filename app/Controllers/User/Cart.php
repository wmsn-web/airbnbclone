<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Libraries\RoomCart;

class Cart extends BaseController
{
    protected $cart;

    public function __construct()
    {
        $this->cart = new RoomCart();
    }

    public function addRoom()
    {
        $room = [
            'id'    => $this->request->getPost('id'),
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'startDate' => $this->request->getPost('startDate'),
            'endDate' => $this->request->getPost('endDate'),
            'adults' => $this->request->getPost('adults'),
            'infants' => $this->request->getPost('infants'),
            'children' => $this->request->getPost('children'),
        ];

        $rooms = $this->cart->add($room);

        return $this->response->setJSON([
            'status' => 'success',
            'rooms'  => $rooms
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
