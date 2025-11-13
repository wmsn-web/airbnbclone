<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\HotelModel;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'pageTitle' => 'Home',
            'groupHeader' => null,
        ];
        return view('fronts/user/Home', $data);
    }
}
