<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserEmailVerificationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'BIGINT', 'auto_increment' => true],
            'user_id'    => ['type' => 'BIGINT'],
            'token'      => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'otp_code'   => ['type' => 'VARCHAR', 'constraint' => 6, 'null' => true],
            'expires_at' => ['type' => 'DATETIME'],
            'type'       => ['type' => 'ENUM', 'constraint' => ['otp', 'magic_link', 'mix']],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_email_verifications');
    }

    public function down()
    {
        $this->forge->dropTable('user_email_verifications');
    }
}
