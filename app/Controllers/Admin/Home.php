<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;

class Home extends BaseController
{
    protected $helpers = ['url', 'form', 'CIMail'];

    public function index()
    {
        $admindata = CiAdmin::admin();
        $data = [
            'pageTitle' => 'Home',
            'admindata' => $admindata,
        ];
        return view('fronts/admin/Admin-home', $data);
    }
    public function test(){
        $data = [
            'pageTitle' => 'test',
        ];
        return view('fronts/admin/test', $data);
    }
}
