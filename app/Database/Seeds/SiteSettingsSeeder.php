<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'setting_key'   => 'site_name',
                'value' => 'FireBnB',
                'type'  => 'string',
                'setting_group' => 'general'
            ],
            [
                'setting_key'   => 'site_version',
                'value' => '2.5.0',
                'type'  => 'string',
                'setting_group' => 'general'
            ],
            [
                'setting_key'   => 'site_email',
                'value' => 'support@firebnb.com',
                'type'  => 'string',
                'setting_group' => 'email'
            ],
            [
                'setting_key'   => 'site_phone',
                'value' => '+1234567890',
                'type'  => 'string',
                'setting_group' => 'phone'
            ],
            [
                'setting_key'   => 'site_whatsapp',
                'value' => '+1234567890',
                'type'  => 'string',
                'setting_group' => 'whatsapp'
            ],
            [
                'setting_key'   => 'currency_method',
                'value' => json_encode(['currency'=> 'usd', 'symbol'=> "$"]),
                'type'  => 'json',
                'setting_group' => 'payment'
            ],
            [
                'setting_key'   => 'stripe_keys',
                'value' => json_encode(['key'=>'key', 'secret'=> 'secret']),
                'type'  => 'json',
                'setting_group' => 'payment'
            ],
        ];

        $this->db->table('site_settings')->insertBatch($data);
    }
}
