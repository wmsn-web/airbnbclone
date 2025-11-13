<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => ['type' => 'BIGINT', 'auto_increment' => true],
            'email'           => ['type' => 'VARCHAR', 'constraint' => 191, 'unique' => true],
            'name'            => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'password_hash'   => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'remember_token'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'is_verified'     => ['type' => 'BOOLEAN', 'default' => false, 'null' => true,],
            'created_at'      => ['type' => 'DATETIME', 'null' => true],
            'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
