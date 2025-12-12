<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true
            ],

            'pnr_no' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true
            ],

            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],

            'hotel_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'room_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true
            ],

            'check_in' => ['type' => 'DATE'],
            'check_out' => ['type' => 'DATE'],

            'adults' => ['type' => 'INT', 'constraint' => 3, 'default' => 1],
            'children' => ['type' => 'INT', 'constraint' => 3, 'default' => 0],
            'infants' => ['type' => 'INT', 'constraint' => 3, 'default' => 0],

            'amount' => ['type' => 'DECIMAL', 'constraint' => '10,2'],

            'payment_status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'paid', 'failed', 'refunded'],
                'default'    => 'pending',
            ],

            'payment_method' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true
            ],

            'payment_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],

            'transaction_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true
            ],

            'booking_status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'confirmed', 'cancelled', 'completed'],
                'default'    => 'pending',
            ],

            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('bookings');
    }

    public function down()
    {
        //
    }
}
