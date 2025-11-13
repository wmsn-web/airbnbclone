<?php

namespace App\Database\Seeds;

use App\Models\AdminModel;
use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $hashedPwd = password_hash('123456', PASSWORD_BCRYPT);
        $data = [
            [
                'full_name' => 'Super Admin',
                'username' => 'admin',
                'email' => 'admin@booking.com',
                'password' => $hashedPwd,
                'role' => 'superadmin'
            ],
            [
                'full_name' => 'Admin',
                'username' => 'admin2',
                'email' => 'admin@admin.com',
                'password' => $hashedPwd,
                'role' => 'admin'
            ],
        ];
        $admin = new AdminModel;
        $admin->insertBatch($data);
    }
}
