<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelAmenitiesModel extends Model
{
    protected $table            = 'hotel_amenities';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; 

    protected $allowedFields = [
        "hotel_id",
        "amenities"
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getHotelAmenities($hotel_id)
    {
        $hotel = $this->find($hotel_id);
        return $hotel;
    }

}
