<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;

class Roomlisting extends BaseController
{
    public function index()
    {
        $admindata = CiAdmin::admin();
        $data = [
            'pageTitle' => 'Room-listing',
            'admindata' => $admindata,

        ];
        return view('fronts/admin/Room-listing', $data);
    }
}
