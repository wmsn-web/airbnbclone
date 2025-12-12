<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BookingModel;

class Bookings extends BaseController
{
    public function index()
    {
        $userId = session()->get('user_id');

        $bookingModel = new BookingModel();

        // Get paginated data (10 per page)
        $bookings = $bookingModel
            ->where('user_id', $userId)
            ->orderBy('id', 'DESC')
            ->paginate(3, 'list-group');

        $pager = $bookingModel->pager;

        $data = [
            'pageTitle' => 'Your Bookings',
            'bookings'  => $bookings,
            'pager'     => $pager,
        ];
        return view('fronts/user/Bookings', $data);
    }
    
}
