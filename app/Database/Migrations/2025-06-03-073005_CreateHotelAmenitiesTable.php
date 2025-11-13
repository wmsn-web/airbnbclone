<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHotelAmenitiesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'hotel_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'amenities' => [
                'type'       => 'JSON',
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
        $this->forge->createTable('hotel_amenities');
    }

    public function down()
    {
        $this->forge->dropTable('hotel_amenities');
    }
}
