<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHotelsLocationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'hotel_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'street_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'city' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'state' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'zip_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'country_or_region' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'latitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,7',
                'null'       => true,
            ],
            'longitude' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,7',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('hotel_id', 'hotels', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('hotel_locations');
    }

    public function down()
    {
        $this->forge->dropTable('hotel_locations');
    }
}
