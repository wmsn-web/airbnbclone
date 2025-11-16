<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email' => 'admin@test.com',
            'name' => 'admin',
            'password_hash' => password_hash('123456', PASSWORD_BCRYPT),
            'is_verified' => true,
        ];
        $this->db->table('users')->insert($data);
    }
}
