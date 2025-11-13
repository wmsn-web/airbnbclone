<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class Hotelcheckout extends BaseController
{
    public function index(): string
    {
        $data = [
            'pageTitle' => 'Checkout',
            'groupHeader' => null,
        ];
        return view('fronts/user/Hotel-checkout', $data);
    }
}
