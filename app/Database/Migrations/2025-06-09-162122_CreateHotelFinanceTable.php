<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHotelFinanceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'hotel_id' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'cash_payment' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0, 
            ],
            'card_payment' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'online_payment' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
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
        $this->forge->addForeignKey('hotel_id', 'hotels', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('hotel_finance');
    }

    public function down()
    {
        $this->forge->dropTable('hotel_finance');
    }
}
