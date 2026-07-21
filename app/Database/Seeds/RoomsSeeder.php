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

            // KING ROOM
            $maxAdultKing = rand(2, 3);
            $maxChildrenKing = rand(1, 2);
            $maxInfantsKing = rand(0, 1);

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

                // NEW COLUMNS
                'min_adult' => 1,
                'max_adult' => $maxAdultKing,
                'min_children' => 0,
                'max_children' => $maxChildrenKing,
                'min_infants' => 0,
                'max_infants' => $maxInfantsKing,
                'max_occupancy' => $maxAdultKing + $maxChildrenKing + $maxInfantsKing,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // TWIN ROOM
            $maxAdultTwin = rand(3, 4);
            $maxChildrenTwin = rand(1, 3);
            $maxInfantsTwin = rand(1, 2);

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

                // NEW COLUMNS
                'min_adult' => 1,
                'max_adult' => $maxAdultTwin,
                'min_children' => 0,
                'max_children' => $maxChildrenTwin,
                'min_infants' => 0,
                'max_infants' => $maxInfantsTwin,
                'max_occupancy' => $maxAdultTwin + $maxChildrenTwin + $maxInfantsTwin,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        $roomModel->insertBatch($rooms);
    }
}
