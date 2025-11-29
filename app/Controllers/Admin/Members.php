<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;

class Members extends BaseController
{
    public function index()
    {
        $admindata = CiAdmin::admin();
        $data = [
            'pageTitle' => 'members',
            'admindata' => $admindata,
        ];
        return view('fronts/admin/Members', $data);
    }
}
