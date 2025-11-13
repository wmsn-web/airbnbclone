<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAmenitiesTable extends Migration
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
            'am_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'cat_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'am_slug' => [
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
        $this->forge->createTable('amenities');
    }

    public function down()
    {
        $this->forge->dropTable('amenities');
    }
}
