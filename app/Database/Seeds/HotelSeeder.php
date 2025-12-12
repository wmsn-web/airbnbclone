<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Config\Database;

class HotelSeeder extends Seeder
{
    public function run()
    {
        $db = Database::connect();

        $hotels = [
            // -------------------- INDIA HOTELS --------------------
            [
                'property_name' => 'Taj Palace Hotel',
                'property_name_slug' => 'taj-Palace-Hotel',
                'description'   => 'A luxury 5-star hotel located in the heart of New Delhi.',
                'rating'        => 5,
                'email'         => 'contact@tajpalacedelhi.com',
                'phone'         => '+91 11 23456789',
                'chain_name'    => 'Taj Hotels',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'Sardar Patel Marg',
                    'city' => 'New Delhi',
                    'state' => 'Delhi',
                    'zip_code' => '110021',
                    'country_or_region' => 'India',
                    'latitude' => 28.5962,
                    'longitude' => 77.1735,
                ],
            ],
            [
                'property_name' => 'The Oberoi Mumbai',
                'property_name_slug' => 'the-oberoi-mumbai',
                'description'   => 'Premium sea-facing hotel located at Marine Drive.',
                'rating'        => 5,
                'email'         => 'reservations@oberoimumbai.com',
                'phone'         => '+91 22 66326060',
                'chain_name'    => 'Oberoi Hotels',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'Marine Drive',
                    'city' => 'Mumbai',
                    'state' => 'Maharashtra',
                    'zip_code' => '400020',
                    'country_or_region' => 'India',
                    'latitude' => 18.9353,
                    'longitude' => 72.8259,
                ],
            ],
            [
                'property_name' => 'Bengaluru Grand Residency',
                'property_name_slug' => 'bengaluru-grand-residency',
                'description'   => 'Business friendly hotel near MG Road.',
                'rating'        => 4,
                'email'         => 'info@grandblr.com',
                'phone'         => '+91 80 22446688',
                'chain_name'    => 'Grand Hotels',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'MG Road',
                    'city' => 'Bengaluru',
                    'state' => 'Karnataka',
                    'zip_code' => '560001',
                    'country_or_region' => 'India',
                    'latitude' => 12.9755,
                    'longitude' => 77.6030,
                ],
            ],
            [
                'property_name' => 'Hyderabad Pearl Inn',
                'property_name_slug' => 'hyderabad-pearl-inn',
                'description'   => 'Mid-range hotel near Hitech City.',
                'rating'        => 4,
                'email'         => 'contact@pearlhyderabad.com',
                'phone'         => '+91 40 22551199',
                'chain_name'    => 'Pearl Group',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'Hitech City Road',
                    'city' => 'Hyderabad',
                    'state' => 'Telangana',
                    'zip_code' => '500081',
                    'country_or_region' => 'India',
                    'latitude' => 17.4483,
                    'longitude' => 78.3908,
                ],
            ],
            [
                'property_name' => 'Chennai Seaside Resort',
                'property_name_slug' => 'chennai-seaside-resort',
                'description'   => 'Beachside property with calm ambience.',
                'rating'        => 4,
                'email'         => 'info@chennairest.com',
                'phone'         => '+91 44 33445566',
                'chain_name'    => 'Seaside Group',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'ECR Road',
                    'city' => 'Chennai',
                    'state' => 'Tamil Nadu',
                    'zip_code' => '600041',
                    'country_or_region' => 'India',
                    'latitude' => 12.9121,
                    'longitude' => 80.2274,
                ],
            ],
            [
                'property_name' => 'Kolkata Heritage Suites',
                'property_name_slug' => 'kolkata-heritage-suites',
                'description'   => 'Colonial style lodging near Park Street.',
                'rating'        => 3,
                'email'         => 'contact@kolheritage.com',
                'phone'         => '+91 33 22118855',
                'chain_name'    => 'Heritage Hotels',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'Park Street',
                    'city' => 'Kolkata',
                    'state' => 'West Bengal',
                    'zip_code' => '700016',
                    'country_or_region' => 'India',
                    'latitude' => 22.5524,
                    'longitude' => 88.3535,
                ],
            ],
            [
                'property_name' => 'Pune Urban Stay',
                'property_name_slug' => 'pune-urban-stay',
                'description'   => 'Modern hotel near Koregaon Park.',
                'rating'        => 4,
                'email'         => 'support@punestay.com',
                'phone'         => '+91 20 24241122',
                'chain_name'    => 'Urban Hotels',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'Koregaon Park',
                    'city' => 'Pune',
                    'state' => 'Maharashtra',
                    'zip_code' => '411001',
                    'country_or_region' => 'India',
                    'latitude' => 18.5362,
                    'longitude' => 73.8938,
                ],
            ],
            [
                'property_name' => 'Jaipur Royal Inn',
                'property_name_slug' => 'jaipur-royal-inn',
                'description'   => 'Traditional Rajasthani themed property.',
                'rating'        => 4,
                'email'         => 'info@jaipurroyal.com',
                'phone'         => '+91 141 2323232',
                'chain_name'    => 'Royal Group',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'MI Road',
                    'city' => 'Jaipur',
                    'state' => 'Rajasthan',
                    'zip_code' => '302001',
                    'country_or_region' => 'India',
                    'latitude' => 26.9124,
                    'longitude' => 75.7873,
                ],
            ],
            [
                'property_name' => 'Ahmedabad Comfort Hotel',
                'property_name_slug' => 'ahmedabad-comfort-hotel',
                'description'   => 'Family-friendly hotel near SG Highway.',
                'rating'        => 3,
                'email'         => 'contact@ahdcomfort.com',
                'phone'         => '+91 79 44556677',
                'chain_name'    => 'Comfort Hotels',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'SG Highway',
                    'city' => 'Ahmedabad',
                    'state' => 'Gujarat',
                    'zip_code' => '380054',
                    'country_or_region' => 'India',
                    'latitude' => 23.0225,
                    'longitude' => 72.5714,
                ],
            ],
            [
                'property_name' => 'Goa Beach Paradise',
                'property_name_slug' => 'goa-beach-paradise',
                'description'   => 'Resort located on Calangute Beach.',
                'rating'        => 4,
                'email'         => 'contact@goaparadise.com',
                'phone'         => '+91 832 2244556',
                'chain_name'    => 'Paradise Resorts',
                'thumbnail'     => '84.jpg',
                'location'      => [
                    'street_name' => 'Calangute Beach Road',
                    'city' => 'Calangute',
                    'state' => 'Goa',
                    'zip_code' => '403516',
                    'country_or_region' => 'India',
                    'latitude' => 15.5439,
                    'longitude' => 73.7553,
                ],
            ],
        ];

        foreach ($hotels as $hotel) {
            $location = $hotel['location'];
            unset($hotel['location']);

            $db->table('hotels')->insert($hotel);
            $hotelId = $db->insertID();

            // Insert Location
            $location['hotel_id'] = $hotelId;
            $db->table('hotel_locations')->insert($location);

            // Amenities
            $amenities = [
                'wifi' => ['type' => 'free'],
                'parking' => ['type' => 'paid'],
                'breakfast' => ['type' => 'paid'],
            ];
            $db->table('hotel_amenities')->insert([
                'hotel_id' => $hotelId,
                'amenities' => json_encode($amenities),
            ]);

            // Gallery
            $db->table('hotel_gallery')->insert([
                'hotel_id' => $hotelId,
                'photos' => json_encode([
                    "40.png",
                    "51.png",
                    "52.png",
                ]),
            ]);

            // Finance
            $db->table('hotel_finance')->insert([
                'hotel_id' => $hotelId,
                'cash_payment' => 1,
                'card_payment' => 1,
                'online_payment' => 1,
            ]);

            // Policies
            $db->table('hotel_policies')->insert([
                'hotel_id' => $hotelId,
                'ci_type' => 1,
                'ci_start_time' => '12:00',
                'ci_end_time' => '14:00',
                'late_ci' => 0,
                'age_restriction' => 0,
                'deposit_at_ci' => 0,
                'doc_at_ci' => 1,
                'co_before' => '11:00',
                'flexible_co_status' => 1,
                'flexible_co_type' => 1,
                'flexible_co_condition' => 0,
                'refund_policy_type' => 1,
                'full_refund_allowed' => 1,
                'partial_refund_allowed' => 1,
                'pet_policy_type' => 0,
                'pet_restricted_zones' => 0,
                'pet_additional_charges' => 0,
                'age_segments' => json_encode([
                    ['from' => 0, 'to' => 5, 'policy' => 'free'],
                    ['from' => 6, 'to' => 12, 'policy' => 'half'],
                ]),
                'child_doc_requirement' => 0,
                'vat_included' => 1,
                'gst_included' => 1,
                'hotel_tax_included' => 1,
                'city_dist_tax_included' => 1,
                'tourist_tax_included' => 0,
                'property_registration_no' => 'PROP' . rand(10000, 99999),
                'business_registration_no' => 'BUSS' . rand(10000, 99999),
                'taxpayer_identification_no' => 'TAX' . rand(10000, 99999),
            ]);
        }
    }
}
