<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\HotelGalleryModel;

class HotelGallery extends BaseController
{
    public function index($id): string
    {
        $hgM = new HotelGalleryModel();
        $gallery = $hgM->select('photos')->where('hotel_id', $id)->first();
        $photos = [];
        if ($gallery && !empty($gallery['photos'])) {
            $photos = json_decode($gallery['photos'], true);
        }
        $data = [
            'pageTitle' => 'Room',
            'hotelId' => $id,
            'photos' => $photos
        ];
        // dd($data);
        return view('fronts/user/Hotel-gallery', $data);
    }
}
