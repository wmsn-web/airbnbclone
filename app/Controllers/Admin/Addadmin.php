<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;
use App\Models\AdminModel;
use App\Libraries\Hash;
use Config\Services;

class Addadmin extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        $admindata = CiAdmin::admin();
        $data = [
            'pageTitle' => 'members',
            'admindata' => $admindata,
        ];
        return view('fronts/admin/Add-admin', $data);
    }

    public function registerHandler()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON([
                'error' => true,
                'type' => 'general',
                'msg' => 'Invalid request type.'
            ]);
        }
        $data = $this->request->getPost();
        $validation = Services::validation();
        $model = new AdminModel();
        $rules = [
            'full_name'         => 'required|min_length[3]|max_length[50]',
            'email'             => 'required|valid_email|is_unique[admins.email]',
            'role'              => 'required|in_list[superadmin,admin,editor]',
            'password'          => 'required|min_length[6]',
            'confirm_password'  => 'required|matches[password]',
        ];
        $vdMsg = [
            'full_name' => [
                'required'    => 'Full name is required.',
                'min_length'  => 'Full name too short.',
                'max_length'  => 'Full name too long.'
            ],
            'email' => [
                'required'    => 'Email is required.',
                'valid_email' => 'Invalid email format.',
                'is_unique'   => 'Email already exists.'
            ],
            'role' => [
                'required' => 'Role is required.',
                'in_list' => 'Invalid role selected.'
            ],
            'password' => [
                'required'   => 'Password is required.',
                'min_length' => 'Password too short (min 6).'
            ],
            'confirm_password' => [
                'required' => 'Please confirm your password.',
                'matches'  => 'Passwords do not match.'
            ]
        ];
        if (!$validation->setRules($rules, $vdMsg)->run($data)) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'validation',
                'msg' => $validation->getErrors()
            ]);
        }

        // Filter + extra check (optional if validation passed)
        $data['email'] = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        if ($model->where('email', $data['email'])->first()) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'email',
                'msg' => 'Email already exists.'
            ]);
        }
        // Double-check match (not needed if rules are good, but okay)
        if ($data['password'] !== $data['confirm_password']) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'pwd',
                'msg' => 'Passwords do not match.'
            ]);
        }
        // Hash password
        $hashedPassword = Hash::make($data['password']);
        $baseUsername = strtolower(preg_replace('/\s+/', '', $data['full_name']));
        $username = $baseUsername . '_' . bin2hex(random_bytes(2));

        // Ensure username is unique
        while ($model->where('username', $username)->first()) {
            $username = $baseUsername . '_' . bin2hex(random_bytes(2));
        }

        $insertableData = [
            'full_name'  => esc($data['full_name']),
            'username'   => $username,
            'email'      => $data['email'],
            'password'   => $hashedPassword,
            'role'       => $data['role'],
            'created_at' => date('Y-m-d H:i:s'),
        ];
        if (!$model->insert($insertableData)) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'general',
                'msg' => 'Failed to register admin.'
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'type' => 'general',
            'msg' => 'Admin registered successfully.',
            'username' => $username
        ]);
    }
}
