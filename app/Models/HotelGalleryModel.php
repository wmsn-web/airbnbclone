<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelGalleryModel extends Model
{
    protected $table            = 'hotel_gallery';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; 

    protected $allowedFields = [
        "hotel_id",
        "photos"
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getHotelPhotos($id)
    {
        $hotel = $this->find($id);
        return $hotel;
    }
}
