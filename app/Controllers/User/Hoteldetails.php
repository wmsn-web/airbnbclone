<?php

namespace App\Controllers\User;

use App\Models\HotelModel;


use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;

class Hoteldetails extends BaseController
{
    public function index($id): string
    {

        $model = new HotelModel();
        $hotel = $model->getSingleHotel($id);
        // if (empty($hotel)) {
        //     throw PageNotFoundException::forPageNotFound("Hotel not found");
        // }
        $data = [
            'pageTitle' => 'Hotel Details',
            'groupHeader' => null,
            'hotel' => $hotel
        ];
        return view('fronts/user/Hotel-details', $data);
    }
    public function details(): string
    {

        
        $data = [
            'pageTitle' => 'Hotel Details',
            'groupHeader' => null,
        ];
        return view('fronts/user/Hotel-details-new', $data);
    }
}
