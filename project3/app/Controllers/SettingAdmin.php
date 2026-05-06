<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SettingModel;

class SettingAdmin extends BaseController
{
    public function index()
    {
        $settingModel = new SettingModel();

        $data = [
            'title'    => 'Site Parameters',
            'settings' => $settingModel->findAll(),
        ];

        return view('admin/setting_admin', $data);
    }

    public function update()
    {
        $settingModel = new SettingModel();
        $settings     = $this->request->getPost('settings');

        if ($settings) {
            foreach ($settings as $id => $value) {
                $settingModel->update($id, ['setting_value' => $value]);
            }
        }

        return redirect()->to('admin/setting')->with('success', 'Configuration updated successfully.');
    }
}
