<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;
use App\Models\HotelModel;


class Searchhotel extends BaseController
{
    public function searchHotel()
    {
        $searchTerm = $this->request->getGet('srcitem');

        $hotelModel = new HotelModel();
        $results = $hotelModel->like('name', $searchTerm)->findAll();

        // If AJAX, return partial view
        if ($this->request->isAJAX()) {
            return view('fronts/admin/partials/hotel_results', ['hotels' => $results]);
        }

        // Fallback: render whole page
        return view('fronts/admin/Hotel-listing', ['hotels' => $results]);
    }
}
