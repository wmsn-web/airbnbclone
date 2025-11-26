<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\HotelModel;

class Contact extends BaseController
{
    public function index(): string
    {
        $data = [
            'pageTitle' => 'Contact',
        ];
        return view('fronts/user/Contact', $data);
    }
    public function getContact(){
        $data = $this->request->getPost();
        if (!empty($data)) {
            return redirect()->to('contact')->with('success', 'We will get back to you!');
        }
    }
}
