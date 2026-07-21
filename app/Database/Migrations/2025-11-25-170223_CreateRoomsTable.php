<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'room_name' => ['type' => 'VARCHAR', 'constraint' => 255],
            'room_slug' => ['type' => 'VARCHAR', 'constraint' => 100],
            'price' => ['type' => 'DECIMAL', 'constraint' => '10,2', 'default' => 0.00, 'comment' => 'Per night cost for allowed guest.',],
            'hotel_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true,],
            'amenities' => ['type' => 'JSON', 'null' => true,],
            'description' => ['type' => 'TEXT', 'null' => true],
            'min_adult' => ['type' => 'INT', 'constraint' => 11,'unsigned' => true, 'default' => 1, 'comment' => 'Minimum allowed adult.',],
            'max_adult' => ['type' => 'INT', 'constraint' => 11,'unsigned' => true, 'null' => true, 'comment' => 'Maximum allowed adult.',],
            'min_infants' => ['type' => 'INT', 'constraint' => 11,'unsigned' => true, 'default' => 0, 'comment' => 'Minimum allowed infants.',],
            'max_infants' => ['type' => 'INT', 'constraint' => 11,'unsigned' => true, 'null' => true, 'comment' => 'Maximum allowed infants.',],
            'min_children' => ['type' => 'INT', 'constraint' => 11,'unsigned' => true, 'default' => 0, 'comment' => 'Minimum allowed children.',],
            'max_children' => ['type' => 'INT', 'constraint' => 11,'unsigned' => true, 'null' => true, 'comment' => 'Maximum allowed children.',],
            'max_occupancy' => ['type' => 'INT', 'constraint' => 11,'unsigned' => true, 'null' => true, 'comment' => 'Total max guests allowed',],
            'status' => [ 'type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active',],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('hotel_id');
        $this->forge->addUniqueKey(['hotel_id', 'room_slug']);
        $this->forge->addForeignKey('hotel_id', 'hotels', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rooms');
    }

    public function down()
    {
        $this->forge->dropTable('rooms');
    }
}
