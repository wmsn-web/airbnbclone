<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiteSettingModel;

class SiteSettings extends BaseController
{
    public function index()
    {
        $model = new SiteSettingModel();

        return view('fronts/admin/Settings', [
            'pageTitle' => 'Site Settings',
            'settings'  => $model->getAll(),
        ]);
    }

    public function save()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $model = new SiteSettingModel();

        $key   = $this->request->getPost('setting_key');
        $value = $this->request->getPost('value');
        $type  = $this->request->getPost('type');
        $group = $this->request->getPost('setting_group');

        if (!$key) {
            return $this->response->setJSON([
                'error' => true,
                'message' => 'Invalid setting key'
            ]);
        }

        $model->setValue($key, $value, $type, $group);

        // 🔥 Clear cache after update
        clear_setting_cache($key);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Setting updated successfully'
        ]);
    }
}
