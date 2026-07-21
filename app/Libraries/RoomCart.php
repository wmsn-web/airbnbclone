<?php

namespace App\Libraries;

class RoomCart
{
    protected string $key = 'room_cart';

    protected function cart(): array
    {
        return session()->get($this->key) ?? [];
    }

    protected function save(array $cart): void
    {
        session()->set($this->key, $cart);
    }

    public function all(): array
    {
        return $this->cart();
    }

    public function clear(): void
    {
        session()->remove($this->key);
    }

    public function add(array $room): array
    {
        $cart = $this->cart();

        /** 
         * Rule:
         * If cart exists AND hotel_id differs → reset cart
         */
        if (!empty($cart) && isset($cart['hotel_id']) && $cart['hotel_id'] !== $room['hotel_id']) {
            $cart = [];
        }

        // Initialize cart
        $currency = setting('currency_method');
        if (empty($cart)) {
            $cart = [
                'hotel_id' => $room['hotel_id'],
                'rooms' => [],
                'meta' => [
                    'currency' => $currency['currency'],
                    'created_at' => time()
                ]
            ];
        }

        // Add / overwrite room
        $cart['rooms'][$room['room_id']] = $room;

        $this->save($cart);
        return $cart;
    }

    public function remove(int $roomId): array
    {
        $cart = $this->cart();

        if (isset($cart['rooms'][$roomId])) {
            unset($cart['rooms'][$roomId]);
        }

        // If no rooms left → clear cart
        if (empty($cart['rooms'])) {
            $this->clear();
            return [];
        }

        $this->save($cart);
        return $cart;
    }
}
