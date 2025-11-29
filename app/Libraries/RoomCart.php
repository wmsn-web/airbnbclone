<?php

namespace App\Libraries;

class RoomCart
{
    protected $session;
    protected $key = 'room_cart';

    public function __construct()
    {
        $this->session = session();
    }

    public function all()
    {
        return $this->session->get($this->key) ?? [];
    }

    public function add($room)
    {
        $cart = $this->all();
        $cart[$room['id']] = $room;
        $this->session->set($this->key, $cart);
        return $cart;
    }

    public function remove($id)
    {
        $cart = $this->all();
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        $this->session->set($this->key, $cart);
        return $cart;
    }

    public function clear()
    {
        $this->session->remove($this->key);
    }
}
