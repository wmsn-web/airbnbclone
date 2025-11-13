<?php

namespace App\Models;

use CodeIgniter\Model;

class AmenitiesModel extends Model
{
    protected $table            = 'amenities';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array'; 

    protected $allowedFields = [
        "cat",
        "am_name",
        "cat_slug",
        "am_slug"
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation rules (optional)
    protected $validationRules    = [];
    protected $validationMessages = [];

    protected $skipValidation     = false;

    public function getAmsWithCat()
    {
        $mainData = [];
        $this->distinct();
        $this->select("cat_slug");
        $get = $this->get()->getResult();
        if (!empty($get)) {
            foreach ($get as $val) {
                $cat = $this->where("cat_slug", $val->cat_slug)->get()->getRow();
                $allams = $this->where("cat_slug", $val->cat_slug)->get()->getResult();
                $mainData[] = [
                    "category"     => $cat->cat,
                    "amenities"    => $allams
                ];
            }
        }
        return $mainData;
    }
}
