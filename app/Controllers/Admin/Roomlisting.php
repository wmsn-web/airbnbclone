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
        return view('fronts/admin/templates/Layout', $data)
            . view('fronts/admin/templates/Vertical-nav')
            . view('fronts/admin/templates/Top-nav')
            . view('fronts/admin/templates/Page-js')
            . view('fronts/admin/Room-listing')
            . view('fronts/admin/templates/Footer')
            . view('fronts/admin/templates/Jsmain');
    }
}
