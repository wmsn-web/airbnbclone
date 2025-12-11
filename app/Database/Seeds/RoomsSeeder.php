<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\RoomModel;

class RoomsSeeder extends Seeder
{
    public function run()
    {
        $roomModel = new RoomModel();

        $rooms = [];

        for ($hotelId = 1; $hotelId <= 10; $hotelId++) {
            $rooms[] = [
                'room_name' => 'King room',
                'room_slug' => 'king-room',
                'price' => rand(2500, 6000),
                'hotel_id' => $hotelId,
                'amenities' => json_encode([
                    'Air Conditioning',
                    'Free Wi-Fi',
                    'Television',
                    'Work Desk'
                ]),
                'description' => 'A comfortable standard room with essential amenities.',
            ];

            $rooms[] = [
                'room_name' => 'Twin room',
                'room_slug' => 'twin-room',
                'price' => rand(5000, 12000),
                'hotel_id' => $hotelId,
                'amenities' => json_encode([
                    'Mini Bar',
                    'Room Heater',
                    'Premium Bedding',
                    'City View'
                ]),
                'description' => 'Spacious deluxe room with premium features.',
            ];
        }

        $roomModel->insertBatch($rooms);
    }
}
