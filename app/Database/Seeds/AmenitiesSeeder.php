<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class AmenitiesSeeder extends Seeder
{
    /**
     * Runs the database seeds to populate the amenities table.
     *
     * @return void
     */
    public function run()
    {
        // Truncate the table to ensure a clean slate on re-seeding
        // This will remove all existing records from the 'amenities' table.
        $this->db->table('amenities')->truncate();

        // Define the data to be inserted
        $data = [
            [
                'id' => 1,
                'cat' => 'Popular amenities',
                'am_name' => 'Wifi',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'wifi',
                'created_at' => '2025-06-04 07:27:11',
                'updated_at' => '2025-06-04 07:27:11',
            ],
            [
                'id' => 2,
                'cat' => 'Popular amenities',
                'am_name' => 'Breakfast',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'breakfast',
                'created_at' => '2025-06-04 07:28:12',
                'updated_at' => '2025-06-04 07:28:12',
            ],
            [
                'id' => 3,
                'cat' => 'Popular amenities',
                'am_name' => 'Gym',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'gym',
                'created_at' => '2025-06-04 07:28:22',
                'updated_at' => '2025-06-04 07:28:22',
            ],
            [
                'id' => 4,
                'cat' => 'Popular amenities',
                'am_name' => 'Swimming pool',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'swimming-pool',
                'created_at' => '2025-06-04 07:28:34',
                'updated_at' => '2025-06-04 07:28:34',
            ],
            [
                'id' => 5,
                'cat' => 'Popular amenities',
                'am_name' => 'In-room coffee/tea',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'in-room-coffee-tea',
                'created_at' => '2025-06-04 07:28:47',
                'updated_at' => '2025-06-04 07:28:47',
            ],
            [
                'id' => 6,
                'cat' => 'Popular amenities',
                'am_name' => 'Daily housekeeping',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'daily-housekeeping',
                'created_at' => '2025-06-04 07:28:55',
                'updated_at' => '2025-06-04 07:28:55',
            ],
            [
                'id' => 7,
                'cat' => 'Popular amenities',
                'am_name' => 'Bar / Lounge',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'bar-lounge',
                'created_at' => '2025-06-04 07:29:02',
                'updated_at' => '2025-06-04 07:29:02',
            ],
            [
                'id' => 8,
                'cat' => 'Popular amenities',
                'am_name' => 'Laundry',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'laundry',
                'created_at' => '2025-06-04 07:29:12',
                'updated_at' => '2025-06-04 07:29:12',
            ],
            [
                'id' => 9,
                'cat' => 'Popular amenities',
                'am_name' => 'Newspaper',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'newspaper',
                'created_at' => '2025-06-04 07:29:21',
                'updated_at' => '2025-06-04 07:29:21',
            ],
            [
                'id' => 10,
                'cat' => 'Popular amenities',
                'am_name' => 'Bicycle',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'bicycle',
                'created_at' => '2025-06-04 07:29:30',
                'updated_at' => '2025-06-04 07:29:30',
            ],
            [
                'id' => 11,
                'cat' => 'Popular amenities',
                'am_name' => 'Air conditioning',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'air-conditioning',
                'created_at' => '2025-06-04 07:29:45',
                'updated_at' => '2025-06-04 07:29:45',
            ],
            [
                'id' => 12,
                'cat' => 'Popular amenities',
                'am_name' => 'Games room',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'games-room',
                'created_at' => '2025-06-04 07:29:56',
                'updated_at' => '2025-06-04 07:29:56',
            ],
            [
                'id' => 13,
                'cat' => 'Popular amenities',
                'am_name' => 'Beach view',
                'cat_slug' => 'popular-amenities',
                'am_slug' => 'beach-view',
                'created_at' => '2025-06-04 07:30:05',
                'updated_at' => '2025-06-04 07:30:05',
            ],
            [
                'id' => 14,
                'cat' => 'Food & Drink',
                'am_name' => 'Restaurants',
                'cat_slug' => 'food-drink',
                'am_slug' => 'restaurants',
                'created_at' => '2025-06-04 07:39:06',
                'updated_at' => '2025-06-04 07:39:06',
            ],
            [
                'id' => 15,
                'cat' => 'Food & Drink',
                'am_name' => 'Bars',
                'cat_slug' => 'food-drink',
                'am_slug' => 'bars',
                'created_at' => '2025-06-04 07:39:15',
                'updated_at' => '2025-06-04 07:39:15',
            ],
            [
                'id' => 16,
                'cat' => 'Food & Drink',
                'am_name' => 'In-Room Dining',
                'cat_slug' => 'food-drink',
                'am_slug' => 'in-room-dining',
                'created_at' => '2025-06-04 07:39:25',
                'updated_at' => '2025-06-04 07:39:25',
            ],
            [
                'id' => 17,
                'cat' => 'Food & Drink',
                'am_name' => 'Family-Friendly Dining',
                'cat_slug' => 'food-drink',
                'am_slug' => 'family-friendly-dining',
                'created_at' => '2025-06-04 07:39:34',
                'updated_at' => '2025-06-04 07:39:34',
            ],
            [
                'id' => 18,
                'cat' => 'Food & Drink',
                'am_name' => 'Breakfast Buffet',
                'cat_slug' => 'food-drink',
                'am_slug' => 'breakfast-buffet',
                'created_at' => '2025-06-04 07:39:41',
                'updated_at' => '2025-06-04 07:39:41',
            ],
            [
                'id' => 19,
                'cat' => 'Outdoor & View',
                'am_name' => 'Garden or Courtyard',
                'cat_slug' => 'outdoor-view',
                'am_slug' => 'garden-or-courtyard',
                'created_at' => '2025-06-04 07:40:09',
                'updated_at' => '2025-06-04 07:40:09',
            ],
            [
                'id' => 20,
                'cat' => 'Outdoor & View',
                'am_name' => 'Scenic Views',
                'cat_slug' => 'outdoor-view',
                'am_slug' => 'scenic-views',
                'created_at' => '2025-06-04 07:40:14',
                'updated_at' => '2025-06-04 07:40:14',
            ],
            [
                'id' => 21,
                'cat' => 'Outdoor & View',
                'am_name' => 'Sunbathing Areas',
                'cat_slug' => 'outdoor-view',
                'am_slug' => 'sunbathing-areas',
                'created_at' => '2025-06-04 07:40:34',
                'updated_at' => '2025-06-04 07:40:34',
            ],
            [
                'id' => 22,
                'cat' => 'Outdoor & View',
                'am_name' => 'Outdoor Lounge Areas',
                'cat_slug' => 'outdoor-view',
                'am_slug' => 'outdoor-lounge-areas',
                'created_at' => '2025-06-04 07:40:43',
                'updated_at' => '2025-06-04 07:40:43',
            ],
            [
                'id' => 23,
                'cat' => 'Entertainment & Family Services',
                'am_name' => 'Game Room',
                'cat_slug' => 'entertainment-family-services',
                'am_slug' => 'game-room',
                'created_at' => '2025-06-04 07:41:33',
                'updated_at' => '2025-06-04 07:41:33',
            ],
            [
                'id' => 24,
                'cat' => 'Entertainment & Family Services',
                'am_name' => 'Children\'s Play Area',
                'cat_slug' => 'entertainment-family-services',
                'am_slug' => 'children-s-play-area',
                'created_at' => '2025-06-04 07:41:41',
                'updated_at' => '2025-06-04 07:41:41',
            ],
            [
                'id' => 25,
                'cat' => 'Entertainment & Family Services',
                'am_name' => 'Sports Facilities',
                'cat_slug' => 'entertainment-family-services',
                'am_slug' => 'sports-facilities',
                'created_at' => '2025-06-04 07:41:49',
                'updated_at' => '2025-06-04 07:41:49',
            ],
            [
                'id' => 26,
                'cat' => 'Entertainment & Family Services',
                'am_name' => 'Babysitting Services',
                'cat_slug' => 'entertainment-family-services',
                'am_slug' => 'babysitting-services',
                'created_at' => '2025-06-04 07:41:55',
                'updated_at' => '2025-06-04 07:41:55',
            ],
            [
                'id' => 27,
                'cat' => 'Media & Technology',
                'am_name' => 'High-Speed Internet',
                'cat_slug' => 'media-technology',
                'am_slug' => 'high-speed-internet',
                'created_at' => '2025-06-04 07:42:12',
                'updated_at' => '2025-06-04 07:42:12',
            ],
            [
                'id' => 28,
                'cat' => 'Media & Technology',
                'am_name' => 'Business Center',
                'cat_slug' => 'media-technology',
                'am_slug' => 'business-center',
                'created_at' => '2025-06-04 07:42:23',
                'updated_at' => '2025-06-04 07:42:23',
            ],
            [
                'id' => 29,
                'cat' => 'Media & Technology',
                'am_name' => 'Video Conferencing Facilities',
                'cat_slug' => 'media-technology',
                'am_slug' => 'video-conferencing-facilities',
                'created_at' => '2025-06-04 07:42:31',
                'updated_at' => '2025-06-04 07:42:31',
            ],
            [
                'id' => 30,
                'cat' => 'Media & Technology',
                'am_name' => 'Virtual Reality (VR) Experiences',
                'cat_slug' => 'media-technology',
                'am_slug' => 'virtual-reality-vr-experiences',
                'created_at' => '2025-06-04 07:42:39',
                'updated_at' => '2025-06-04 07:42:39',
            ],
            [
                'id' => 31,
                'cat' => 'Accessibility',
                'am_name' => 'Accessible Common Areas',
                'cat_slug' => 'accessibility',
                'am_slug' => 'accessible-common-areas',
                'created_at' => '2025-06-04 07:42:48',
                'updated_at' => '2025-06-04 07:42:48',
            ],
            [
                'id' => 32,
                'cat' => 'Accessibility',
                'am_name' => 'Accessible Parking Spaces',
                'cat_slug' => 'accessibility',
                'am_slug' => 'accessible-parking-spaces',
                'created_at' => '2025-06-04 07:42:55',
                'updated_at' => '2025-06-04 07:42:55',
            ],
            [
                'id' => 33,
                'cat' => 'Accessibility',
                'am_name' => 'Accessible Fitness Center',
                'cat_slug' => 'accessibility',
                'am_slug' => 'accessible-fitness-center',
                'created_at' => '2025-06-04 07:43:03',
                'updated_at' => '2025-06-04 07:43:03',
            ],
            [
                'id' => 34,
                'cat' => 'Accessibility',
                'am_name' => 'Accessible Swimming Pool',
                'cat_slug' => 'accessibility',
                'am_slug' => 'accessible-swimming-pool',
                'created_at' => '2025-06-04 07:43:10',
                'updated_at' => '2025-06-04 07:43:10',
            ],
        ];

        // Insert the data into the 'amenities' table
        // We use insertBatch for efficiency with multiple rows.
        // The `false` parameter as the second argument ensures CI4 escapes data as usual.
        $this->db->table('amenities')->insertBatch($data);

        // Simple echo for console output
        echo 'Amenities seeded successfully!' . PHP_EOL;
        // If you specifically want to use CLI::write for formatted output,
        // you would uncomment the use statement at the top and use:
        // \CodeIgniter\CLI\CLI::write('Amenities seeded successfully!', 'green');
    }
}
