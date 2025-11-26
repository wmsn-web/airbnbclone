<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'BIGINT', 'auto_increment' => true],
            'room_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'room_slug' => ['type' => 'VARCHAR', 'constraint' => 100],
            'price' => ['type' => 'INT', 'constraint' => 11],
            'hotel_id' => ['type' => 'INT', 'constraint' => 11],
            'amenities' => ['type' => 'JSON', 'null' => true,],
            'description' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('room_slug');
        $this->forge->addForeignKey('hotel_id', 'hotels', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rooms');
    }

    public function down()
    {
        $this->forge->dropTable('rooms');
    }
}
