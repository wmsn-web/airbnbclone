<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'full_name'        => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'username'       => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email'       => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'unique' => true
            ],
            'password'    => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'role'        => [
                'type' => 'ENUM',
                'constraint' => ['superadmin', 'admin', 'editor'],
                'default' => 'admin'
            ],
            'remember_token'=>[
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'created_at'  => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at'  => [
                'type' => 'DATETIME',
                'null' => true
            ],
        ]);

        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
