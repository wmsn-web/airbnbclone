<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;
use App\Models\AdminModel;

class Logout extends BaseController
{
    public function logoutHandler()
    {
        // Remove remember me cookie
        if (isset($_COOKIE['remember_token'])) {
            setcookie('remember_token', '', time() - 3600, '/'); // delete cookie
        }

        // Remove token from DB
        $admin = CiAdmin::admin();
        if ($admin) {
            $adminModel = new AdminModel();
            $adminModel->update($admin['id'], ['remember_token' => null]);
        }
        // echo 'logout';
        CiAdmin::forget();
        return redirect()->route('admin.login')->with('success', 'You are logged out!')->withInput();
    }
}
