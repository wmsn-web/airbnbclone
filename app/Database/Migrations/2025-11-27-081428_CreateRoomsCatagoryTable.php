<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoomsCatagoryTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'cat' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'room_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'cat_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'room_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
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
        $this->forge->createTable('rooms_catagory');
    }

    public function down()
    {
        $this->forge->dropTable('rooms_catagory');
    }
}
