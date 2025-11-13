<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelPoliciesModel extends Model
{
    protected $table            = 'hotel_policies';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'hotel_id',
        'ci_type',
        'ci_start_time',
        'ci_end_time',
        'late_ci',
        'age_restriction',
        'deposit_at_ci',
        'doc_at_ci',
        'co_before',
        'flexible_co_status',
        'flexible_co_type',
        'flexible_co_condition',
        'refund_policy_type',
        'full_refund_allowed',
        'partial_refund_allowed',
        'pet_policy_type',
        'pet_restricted_zones',
        'pet_additional_charges',
        'age_segments',
        'child_doc_requirement',
        'vat_included',
        'vat-condition',
        'gst_included',
        'gst-condition',
        'hotel_tax_included',
        'hotel-tax-condition',
        'city_dist_tax_included',
        'cdt-condition',
        'tourist_tax_included',
        'tourist-tax-condition',
        'property_registration_no',
        'business_registration_no',
        'taxpayer_identification_no',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getHotelPolicies($id)
    {
        $hotel = $this->find($id);
        return $hotel;
    }
}
