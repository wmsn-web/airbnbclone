<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Config\Database;

class NHotelSeeder extends Seeder
{
    public function run()
    {
        $db = Database::connect();

        $hotels = [
            // -------------------- INDIA HOTELS --------------------
            [
                'property_name' => 'Taj Palace Hotel',
                'description'   => 'A luxury 5-star hotel located in the heart of New Delhi.',
                'rating'        => 5,
                'email'         => 'contact@tajpalacedelhi.com',
                'phone'         => '+91 11 23456789',
                'chain_name'    => 'Taj Hotels',
                'thumbnail'     => 'taj.webp',
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
                'description'   => 'Premium sea-facing hotel located at Marine Drive.',
                'rating'        => 5,
                'email'         => 'reservations@oberoimumbai.com',
                'phone'         => '+91 22 66326060',
                'chain_name'    => 'Oberoi Hotels',
                'thumbnail'     => 'oberoi.webp',
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
                'description'   => 'Business friendly hotel near MG Road.',
                'rating'        => 4,
                'email'         => 'info@grandblr.com',
                'phone'         => '+91 80 22446688',
                'chain_name'    => 'Grand Hotels',
                'thumbnail'     => 'blr.webp',
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
                'description'   => 'Mid-range hotel near Hitech City.',
                'rating'        => 4,
                'email'         => 'contact@pearlhyderabad.com',
                'phone'         => '+91 40 22551199',
                'chain_name'    => 'Pearl Group',
                'thumbnail'     => 'hyd.webp',
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
                'description'   => 'Beachside property with calm ambience.',
                'rating'        => 4,
                'email'         => 'info@chennairest.com',
                'phone'         => '+91 44 33445566',
                'chain_name'    => 'Seaside Group',
                'thumbnail'     => 'che.webp',
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
                'description'   => 'Colonial style lodging near Park Street.',
                'rating'        => 3,
                'email'         => 'contact@kolheritage.com',
                'phone'         => '+91 33 22118855',
                'chain_name'    => 'Heritage Hotels',
                'thumbnail'     => 'kol.webp',
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
                'description'   => 'Modern hotel near Koregaon Park.',
                'rating'        => 4,
                'email'         => 'support@punestay.com',
                'phone'         => '+91 20 24241122',
                'chain_name'    => 'Urban Hotels',
                'thumbnail'     => 'pune.webp',
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
                'description'   => 'Traditional Rajasthani themed property.',
                'rating'        => 4,
                'email'         => 'info@jaipurroyal.com',
                'phone'         => '+91 141 2323232',
                'chain_name'    => 'Royal Group',
                'thumbnail'     => 'jai.webp',
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
                'description'   => 'Family-friendly hotel near SG Highway.',
                'rating'        => 3,
                'email'         => 'contact@ahdcomfort.com',
                'phone'         => '+91 79 44556677',
                'chain_name'    => 'Comfort Hotels',
                'thumbnail'     => 'amd.webp',
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
                'description'   => 'Resort located on Calangute Beach.',
                'rating'        => 4,
                'email'         => 'contact@goaparadise.com',
                'phone'         => '+91 832 2244556',
                'chain_name'    => 'Paradise Resorts',
                'thumbnail'     => 'goa.webp',
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

            // -------------------- USA HOTELS --------------------
            [
                'property_name' => 'Hilton Times Square',
                'description'   => 'Hotel located in Times Square, New York.',
                'rating'        => 5,
                'email'         => 'contact@hiltontimessq.com',
                'phone'         => '+1 212-555-7812',
                'chain_name'    => 'Hilton Hotels',
                'thumbnail'     => 'nyc.webp',
                'location'      => [
                    'street_name' => '7th Avenue',
                    'city' => 'New York',
                    'state' => 'NY',
                    'zip_code' => '10036',
                    'country_or_region' => 'USA',
                    'latitude' => 40.7580,
                    'longitude' => -73.9855,
                ],
            ],
            [
                'property_name' => 'Los Angeles Grand Suites',
                'description'   => 'Elegantly designed suites near Hollywood.',
                'rating'        => 4,
                'email'         => 'info@lagrandsuites.com',
                'phone'         => '+1 310-555-2299',
                'chain_name'    => 'Grand Suites',
                'thumbnail'     => 'la.webp',
                'location'      => [
                    'street_name' => 'Hollywood Blvd',
                    'city' => 'Los Angeles',
                    'state' => 'CA',
                    'zip_code' => '90028',
                    'country_or_region' => 'USA',
                    'latitude' => 34.1015,
                    'longitude' => -118.3269,
                ],
            ],
            [
                'property_name' => 'Chicago Lakeview Hotel',
                'description'   => '4-star hotel with stunning lake views.',
                'rating'        => 4,
                'email'         => 'support@lakeviewchicago.com',
                'phone'         => '+1 312-555-4477',
                'chain_name'    => 'Lakeview Hotels',
                'thumbnail'     => 'chi.webp',
                'location'      => [
                    'street_name' => 'Lake Shore Drive',
                    'city' => 'Chicago',
                    'state' => 'IL',
                    'zip_code' => '60611',
                    'country_or_region' => 'USA',
                    'latitude' => 41.8924,
                    'longitude' => -87.6130,
                ],
            ],
            [
                'property_name' => 'Miami Beach Resort',
                'description'   => 'Beachfront resort with pool and spa.',
                'rating'        => 5,
                'email'         => 'contact@miamiresort.com',
                'phone'         => '+1 305-555-8844',
                'chain_name'    => 'Beach Resorts',
                'thumbnail'     => 'miami.webp',
                'location'      => [
                    'street_name' => 'Collins Ave',
                    'city' => 'Miami',
                    'state' => 'FL',
                    'zip_code' => '33139',
                    'country_or_region' => 'USA',
                    'latitude' => 25.7907,
                    'longitude' => -80.1300,
                ],
            ],
            [
                'property_name' => 'Las Vegas Strip Hotel',
                'description'   => 'Casino hotel located directly on Las Vegas Strip.',
                'rating'        => 4,
                'email'         => 'info@vegasstrip.com',
                'phone'         => '+1 702-555-9911',
                'chain_name'    => 'Strip Hotels',
                'thumbnail'     => 'lv.webp',
                'location'      => [
                    'street_name' => 'Las Vegas Blvd',
                    'city' => 'Las Vegas',
                    'state' => 'NV',
                    'zip_code' => '89109',
                    'country_or_region' => 'USA',
                    'latitude' => 36.1147,
                    'longitude' => -115.1728,
                ],
            ],
            [
                'property_name' => 'Houston Comfort Stay',
                'description'   => 'Comfortable family hotel in uptown Houston.',
                'rating'        => 3,
                'email'         => 'support@houstoncomfort.com',
                'phone'         => '+1 713-555-6611',
                'chain_name'    => 'Comfort Chain',
                'thumbnail'     => 'hou.webp',
                'location'      => [
                    'street_name' => 'Post Oak Blvd',
                    'city' => 'Houston',
                    'state' => 'TX',
                    'zip_code' => '77056',
                    'country_or_region' => 'USA',
                    'latitude' => 29.7485,
                    'longitude' => -95.4613,
                ],
            ],
            [
                'property_name' => 'San Francisco Bayview Hotel',
                'description'   => 'Hotel offering panoramic views of the bay.',
                'rating'        => 5,
                'email'         => 'info@sf-bayview.com',
                'phone'         => '+1 415-555-2334',
                'chain_name'    => 'Bayview Hotels',
                'thumbnail'     => 'sf.webp',
                'location'      => [
                    'street_name' => 'Embarcadero',
                    'city' => 'San Francisco',
                    'state' => 'CA',
                    'zip_code' => '94111',
                    'country_or_region' => 'USA',
                    'latitude' => 37.7993,
                    'longitude' => -122.3977,
                ],
            ],
            [
                'property_name' => 'Seattle Skyview Inn',
                'description'   => 'Comfortable rooms near Space Needle.',
                'rating'        => 4,
                'email'         => 'contact@seattleskyinn.com',
                'phone'         => '+1 206-555-8821',
                'chain_name'    => 'Skyview Hotels',
                'thumbnail'     => 'sea.webp',
                'location'      => [
                    'street_name' => 'Broad Street',
                    'city' => 'Seattle',
                    'state' => 'WA',
                    'zip_code' => '98109',
                    'country_or_region' => 'USA',
                    'latitude' => 47.6205,
                    'longitude' => -122.3493,
                ],
            ],
            [
                'property_name' => 'Boston Harbor Hotel',
                'description'   => 'Classic waterfront luxury property.',
                'rating'        => 5,
                'email'         => 'reservations@bostonharbor.com',
                'phone'         => '+1 617-555-1220',
                'chain_name'    => 'Harbor Group',
                'thumbnail'     => 'bos.webp',
                'location'      => [
                    'street_name' => 'Rowes Wharf',
                    'city' => 'Boston',
                    'state' => 'MA',
                    'zip_code' => '02110',
                    'country_or_region' => 'USA',
                    'latitude' => 42.3565,
                    'longitude' => -71.0491,
                ],
            ],
            [
                'property_name' => 'Denver Mountain Retreat',
                'description'   => 'Nature-themed retreat near the Rockies.',
                'rating'        => 4,
                'email'         => 'info@denverretreat.com',
                'phone'         => '+1 720-555-3390',
                'chain_name'    => 'Retreat Hotels',
                'thumbnail'     => 'den.webp',
                'location'      => [
                    'street_name' => 'Rocky Road',
                    'city' => 'Denver',
                    'state' => 'CO',
                    'zip_code' => '80202',
                    'country_or_region' => 'USA',
                    'latitude' => 39.7486,
                    'longitude' => -104.9956,
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
                    "hotel{$hotelId}_1.jpg",
                    "hotel{$hotelId}_2.jpg",
                    "hotel{$hotelId}_3.jpg",
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
