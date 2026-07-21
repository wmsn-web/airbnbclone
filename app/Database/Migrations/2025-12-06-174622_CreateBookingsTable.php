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
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'pnr_no' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],

            'user_id' => [
                'type'     => 'INT',
                'unsigned' => true,
                'null'     => true,
            ],

            'hotel_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],

            /**
             * ✅ ROOMS + GUEST SNAPSHOT
             */
            'rooms' => [
                'type' => 'JSON',
                'null' => false,
                'comment' => 'Rooms with guests snapshot'
            ],

            /**
             * Booker / Contact Person
             */
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],

            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 150,
            ],

            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],

            /**
             * Primary date range (earliest / latest)
             */
            'check_in'  => ['type' => 'DATE'],
            'check_out' => ['type' => 'DATE'],

            /**
             * Totals (derived from rooms JSON)
             * Kept for reporting & backward compatibility
             */
            'adults'   => ['type' => 'INT', 'default' => 1],
            'children' => ['type' => 'INT', 'default' => 0],
            'infants'  => ['type' => 'INT', 'default' => 0],

            /**
             * ✅ VERIFIED PAYMENT AMOUNT
             */
            'amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2'
            ],

            'currency' => [
                'type'       => 'VARCHAR',
                'constraint' => 5,
                'default'    => 'INR'
            ],

            'payment_status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'paid', 'failed', 'refunded'],
                'default'    => 'pending',
            ],

            'payment_method' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],

            'payment_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],

            'transaction_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
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
        $this->forge->addUniqueKey('pnr_no');
        $this->forge->addKey('user_id');
        $this->forge->addKey('payment_id');

        $this->forge->createTable('bookings');
    }

    public function down()
    {
        $this->forge->dropTable('bookings');
    }
}
