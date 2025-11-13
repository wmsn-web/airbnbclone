<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Libraries\Hash;

class Forgotpassword extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function index()
    {
        $step = session()->get('step') ?? 'old_verification';
        $data = [
            'pageTitle'   => 'Forgot Password',
            'step'        => $step,
        ];
        session()->remove('step');
        return view('fronts/admin/Forgot-password', $data);
    }

    public function forgotPasswordHandler()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'error' => true,
                'msg' => 'Invalid request type.'
            ]);
        }

        $data = $this->request->getPost();
        $adminModel = new AdminModel();
        // STEP 1: Old password verification
        if ($data['step'] === 'old_verification') {
            $admin = $adminModel->where('email', $data['email'])->first();

            if (empty($admin)) {
                return $this->response->setJSON([
                    'error' => true,
                    'type' => 'email',
                    'msg' => "Email doesn't exist."
                ]);
            }

            if (!Hash::check($data['password'], $admin['password'])) {
                return $this->response->setJSON([
                    'error' => true,
                    'type' => 'pwd',
                    'msg' => "Wrong password."
                ]);
            }

            // Store session for next step
            session()->set([
                'step' => 'new_update',
                'reset_admin_id' => $admin['id']
            ]);

            return $this->response->setJSON([
                'success' => true,
                'redirect' => base_url('admin/forgot_password'),
                'msg' => "Admin verified!"
            ]);
        }
        if ($data['step'] === 'new_update') {
            $adminId = session()->get('reset_admin_id');

            if (!$adminId) {
                return $this->response->setJSON([
                    'error' => true,
                    'type' => 'session',
                    'msg' => "Session expired or invalid."
                ]);
            }

            if (strlen($data['newpwd']) < 6) {
                return $this->response->setJSON([
                    'error' => true,
                    'type' => 'newrepwd',
                    'msg' => "Password must be at least 6 characters."
                ]);
            }

            if ($data['newpwd'] !== $data['repwd']) {
                return $this->response->setJSON([
                    'error' => true,
                    'type' => 'newrepwd',
                    'msg' => "Passwords do not match."
                ]);
            }

            // Update password
            $adminModel->update($adminId, ['password' => Hash::make($data['repwd'])]);

            // Clear session
            session()->remove(['step', 'reset_admin_id']);

            return $this->response->setJSON([
                'success' => true,
                'redirect' => base_url('admin/forgot_password'),
                'msg' => 'Password changed successfully.'
            ]);
        }

        // Unknown step fallback
        return $this->response->setJSON([
            'error' => true,
            'msg' => 'Invalid step.'
        ]);
    }
}
