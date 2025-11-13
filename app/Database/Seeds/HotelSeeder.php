<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use Config\Database;

class HotelSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $db = Database::connect();

        for ($i = 0; $i < 10; $i++) {
            // 1. Insert into hotels table
            $hotelData = [
                'property_name' => $faker->company,
                'description'   => $faker->paragraph,
                'rating'        => $faker->numberBetween(1, 5),
                'email'         => $faker->companyEmail,
                'phone'         => $faker->phoneNumber,
                'chain_name'    => $faker->company,
                'thumbnail'     => '1750796732_dc54ddddd48843787be1.webp',
            ];
            $db->table('hotels')->insert($hotelData);
            $hotelId = $db->insertID();

            // 2. hotel_locations
            $locationData = [
                'hotel_id'         => $hotelId,
                'street_name'      => $faker->streetAddress,
                'city'             => $faker->city,
                'state'            => $faker->state,
                'zip_code'         => $faker->postcode,
                'country_or_region' => $faker->country,
                'latitude'         => $faker->latitude,
                'longitude'        => $faker->longitude,
            ];
            $db->table('hotel_locations')->insert($locationData);

            // 3. hotel_amenities (JSON)
            $amenities = [
                'wifi' => (object)['type' => 'free', 'condition' => ''],
                'breakfast' => (object)['type' => 'paid', 'condition' => 'included with deluxe rooms'],
                'parking' => (object)['type' => 'free', 'condition' => 'limited slots']
            ];
            $db->table('hotel_amenities')->insert([
                'hotel_id' => $hotelId,
                'amenities' => json_encode($amenities),
            ]);

            // 4. hotel_gallery (photos as JSON)
            $photos = [];
            for ($j = 0; $j < 5; $j++) {
                $photos[] = $faker->image(WRITEPATH . 'uploads/hotel-thumbnails', 750, 550, null, false);
            }
            $db->table('hotel_gallery')->insert([
                'hotel_id' => $hotelId,
                'photos' => json_encode($photos),
            ]);

            // 5. hotel_finance
            $db->table('hotel_finance')->insert([
                'hotel_id'      => $hotelId,
                'cash_payment'  => $faker->boolean,
                'card_payment'  => $faker->boolean,
                'online_payment' => $faker->boolean,
            ]);

            // 6. hotel_policies
            $db->table('hotel_policies')->insert([
                'hotel_id'                  => $hotelId,
                'ci_type'                   => $faker->boolean,
                'ci_start_time'             => $faker->time('H:i'),
                'ci_end_time'               => $faker->time('H:i'),
                'late_ci'                   => $faker->boolean,
                'age_restriction'           => $faker->boolean,
                'deposit_at_ci'             => $faker->boolean,
                'doc_at_ci'                 => $faker->boolean,
                'co_before'                 => $faker->time('H:i'),
                'flexible_co_status'        => $faker->boolean,
                'flexible_co_type'          => $faker->boolean,
                'flexible_co_condition'     => $faker->boolean,
                'refund_policy_type'        => $faker->boolean,
                'full_refund_allowed'       => $faker->boolean,
                'partial_refund_allowed'    => $faker->boolean,
                'pet_policy_type'           => $faker->boolean,
                'pet_restricted_zones'      => $faker->boolean,
                'pet_additional_charges'    => $faker->boolean,
                'age_segments'              => json_encode([
                    ['from' => 0, 'to' => 5, 'policy' => 'free'],
                    ['from' => 6, 'to' => 12, 'policy' => 'half-price']
                ]),
                'child_doc_requirement'     => $faker->boolean,
                'vat_included'              => $faker->boolean,
                'gst_included'              => $faker->boolean,
                'hotel_tax_included'        => $faker->boolean,
                'city_dist_tax_included'    => $faker->boolean,
                'tourist_tax_included'      => $faker->boolean,
                'property_registration_no'  => strtoupper($faker->bothify('PROP#####')),
                'business_registration_no'  => strtoupper($faker->bothify('BUSS#####')),
                'taxpayer_identification_no' => strtoupper($faker->bothify('TAX#####')),
            ]);
        }
    }
}
