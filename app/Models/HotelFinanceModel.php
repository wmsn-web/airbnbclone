<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelFinanceModel extends Model
{
    protected $table            = 'hotel_finance';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; 

    protected $allowedFields = [
        "hotel_id",
        "cash_payment",
        "card_payment",
        "online_payment",
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getHotelFinances($id)
    {
        $hotel = $this->find($id);
        return $hotel;
    }
}
