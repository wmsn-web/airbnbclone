<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHotelPoliciesTable extends Migration
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
            'ci_type' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'ci_start_time' => [
                'type'       => 'TIME',
                'null'       => true,
            ],
            'ci_end_time' => [
                'type'       => 'TIME',
                'null'       => true,
            ],
            'late_ci' => [
                'type'       => 'TINYINT', 
                'constraint' => 1,
                'default'    => 0,
            ],
            'age_restriction' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'deposit_at_ci' => [
                'type'       => 'TINYINT', 
                'constraint' => 1,
                'default'    => 0,
            ],
            'doc_at_ci' => [
                'type'       => 'TINYINT', 
                'constraint' => 1,
                'default'    => 0,
            ],
            'co_before' => [
                'type'       => 'TIME',
                'null'       => true,
            ],
            'flexible_co_status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'flexible_co_type' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'flexible_co_condition' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'refund_policy_type' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'full_refund_allowed' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'partial_refund_allowed' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'pet_policy_type' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'pet_restricted_zones' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'pet_additional_charges' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'age_segments' => [ 
                'type' => 'JSON',
                'null' => true,
            ],
            'child_doc_requirement' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'vat_included' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'vat_radio' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'vat_condition'=>[
                'type'      => 'VARCHAR',
                'constraint' => '100', 
                'null'      => true,
            ],
            'gst_included' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'gst_radio' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'gst_condition'=>[
                'type'      => 'VARCHAR',
                'constraint' => '100', 
                'null'      => true,
            ],
            'hotel_tax_included' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'hotel_tax_radio' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'hotel_tax_condition'=>[
                'type'      => 'VARCHAR',
                'constraint' => '100', 
                'null'      => true,
            ],
            'city_dist_tax_included' => [ 
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'regional_location_tax_radio' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'cdt_condition'=>[
                'type'      => 'VARCHAR',
                'constraint' => '100', 
                'null'      => true,
            ],
            'tourist_tax_included' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'tourist_tax_radio' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'tourist_tax_condition'=>[
                'type'      => 'VARCHAR',
                'constraint' => '100', 
                'null'      => true,
            ],
            'property_registration_no' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'business_registration_no' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'taxpayer_identification_no' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
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
        // Add a unique key for hotel_id, ensuring each hotel has only one policy record
        $this->forge->addUniqueKey('hotel_id');
        $this->forge->addForeignKey('hotel_id', 'hotels', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('hotel_policies');
    }

    public function down()
    {
        $this->forge->dropTable('hotel_policies');
    }
}
