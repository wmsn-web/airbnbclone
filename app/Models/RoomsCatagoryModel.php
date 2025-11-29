<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomsCatagoryModel extends Model
{
    protected $table            = 'rooms_catagory';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        "cat",
        "room_name",
        "cat_slug",
        "room_slug"
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation rules (optional)
    protected $validationRules    = [];
    protected $validationMessages = [];

    protected $skipValidation     = false;

    public function getRoomsWithCat()
    {
        $mainData = [];
        $this->distinct();
        $this->select("cat_slug");
        $get = $this->get()->getResult();
        if (!empty($get)) {
            foreach ($get as $val) {
                $cat = $this->where("cat_slug", $val->cat_slug)->get()->getRow();
                $allRooms = $this->where("cat_slug", $val->cat_slug)->get()->getResult();
                $mainData[] = [
                    "category"     => $cat->cat,
                    "rooms"    => $allRooms
                ];
            }
        }
        return $mainData;
    }
}
