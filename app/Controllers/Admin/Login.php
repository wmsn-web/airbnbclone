<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Libraries\Hash;
use App\Libraries\CiAdmin;

class Login extends BaseController
{
    protected $helpers = ['url', 'form', 'cookie'];
    public function index()
    {
        $data= [
            'pageTitle' => 'Admin - LogIn',
        ];
        return view('fronts/admin-auth/Login', $data);
    }
    
    public function loginHandler()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost();
            $loginID = $data['login_id'];
            $password = $data['password'];
            $rememberMe = isset($data['rememberMe']) ? $data['rememberMe'] : false;

            $fieldType = filter_var($loginID, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            if (empty($loginID)) {
                return $this->response->setJSON([
                    'err' => true,
                    'type' => 'loginid',
                    'msg'  => 'Email or Username required.'
                ]);
            }
            if (empty($password)) {
                return $this->response->setJSON([
                    'err' => true,
                    'type' => 'password',
                    'msg'  => 'Password is required.'
                ]);
            }
            $adminModel = new AdminModel();
            $admin = $adminModel->where($fieldType, $loginID)->first();
            if (!$admin) {
                return $this->response->setJSON([
                    'err' => true,
                    'type' => 'loginid',
                    'msg'  => $fieldType. " doesn't exist."
                ]);
            }
            if (!Hash::check($password, $admin['password'])) {
                return $this->response->setJSON([
                    'err' => true,
                    'type' => 'password',
                    'msg'  => 'Invalid password.'
                ]);
            }
            CiAdmin::setCiAdmin($admin);
            if ($rememberMe) {
                $token = bin2hex(random_bytes(32));
                $adminModel->update($admin['id'], ['remember_token' => $token]);
                setcookie('remember_token', $token, [
                    'expires' => time() + 60 * 60 * 24 * 30, // 30 days
                    'path' => '/',
                    'secure' => isset($_SERVER['HTTPS']),
                    'httponly' => true,
                    'samesite' => 'Lax',
                ]);
            }
            $redirectUrl = session('redirect_url') ?? base_url("admin/home");
            return $this->response->setJSON([
                'success' => true,
                'msg'     => 'Welcome back, ' . $admin['full_name'] . '!',
                'redirect' => $redirectUrl
            ]);
        } else {
            // Fallback if accessed normally (non-AJAX)
            return $this->response->setJSON([
                'err' => true,
                'msg' => 'Invalid request type.'
            ]);
        }
    }
}
