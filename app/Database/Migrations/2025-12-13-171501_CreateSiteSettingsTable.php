<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiteSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'setting_key' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
                'unique'     => true,
                'comment'    => 'Setting identifier (ex: site_name)',
            ],

            'value' => [
                'type'    => 'TEXT',
                'null'    => true,
            ],

            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['string', 'text', 'number', 'boolean', 'json'],
                'default'    => 'string',
            ],

            'setting_group' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'default'    => 'general',
            ],

            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('site_settings', true);
    }

    public function down()
    {
        $this->forge->dropTable('site_settings', true);
    }
}
