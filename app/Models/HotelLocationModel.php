<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelLocationModel extends Model
{
    protected $table            = 'hotel_locations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; 

    protected $allowedFields = [
        'hotel_id',
        'street_name',
        'city',
        'state',
        'zip_code',
        'country_or_region',
        'latitude',
        'latitude',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation rules (optional)
    protected $validationRules    = [];
    protected $validationMessages = [];

    protected $skipValidation     = false;

    public function getHotelLocation($id)
    {
        $hotel = $this->find($id);
        return $hotel;
    }
}
