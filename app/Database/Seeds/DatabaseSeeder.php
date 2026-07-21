<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
        $this->call('AdminSeeder');
        $this->call('SiteSettingsSeeder');
        $this->call('AmenitiesSeeder');
        $this->call('HotelSeeder');
        $this->call('RoomsSeeder');
        echo 'Seeded successfully!' . PHP_EOL;
    }
}
