<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\HotelModel;

class FindHotel extends BaseController
{
    public function index()
    {
        $query = $this->request->getGet();
        echo '<pre>';
        print_r($query);
    }
}
