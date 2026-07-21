<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModel extends Model
{
    protected $table            = 'rooms';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'room_name',
        'room_slug',
        'price',
        'hotel_id',
        'amenities',
        'description',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation rules (optional)
    protected $validationRules    = [];
    protected $validationMessages = [];

    protected $skipValidation     = false;

    public function hotelByRooms($roomId = null)
    {
        return $this->select('rooms.*, hotels.*')
            ->join('hotels', 'hotels.id = rooms.hotel_id', 'left')
            ->where('rooms.id', $roomId)
            ->first();
    }
    public function roomsByHotel($id)
    {
        return $this->select()->where('hotel_id', $id)->findAll();
    }
    public function exactRoom($slug, $id)
    {
        return $this->select()->where(['room_slug' => $slug, 'id' => $id])->first();
    }
    public function roomByIds($roomSlug, $hotelId){
        return $this->select()->where(['room_slug' => $roomSlug, 'hotel_id' => $hotelId])->first();
    }
}
