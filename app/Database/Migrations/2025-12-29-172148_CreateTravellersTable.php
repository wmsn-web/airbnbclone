<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTravellersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],

            'user_id' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true, // ✅ guest checkout support
            ],

            'full_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 150
            ],

            'age' => [
                'type'     => 'TINYINT',
                'unsigned' => true,
                'null'     => true,
                'comment'  => 'Age in years (0–100)',
            ],

            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['adult', 'child', 'infant'],
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey(['user_id', 'type']);
        $this->forge->addUniqueKey(['user_id', 'full_name', 'type']); // ⭐ optional
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('travellers');
    }

    public function down()
    {
        $this->forge->dropTable('travellers');
    }
}
