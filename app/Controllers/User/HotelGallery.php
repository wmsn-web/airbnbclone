<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

class HotelGallery extends BaseController
{
    public function index(): string
    {
        $data = [
            'pageTitle' => 'Room',
            'groupHeader' => null,
        ];
        return view('fronts/user/Hotel-gallery', $data);
    }
}
