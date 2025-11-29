<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;
use App\Libraries\Slug;
use App\Models\RoomsCatagoryModel;

class Addroom extends BaseController
{
    public function index()
    {
        $admindata = CiAdmin::admin();
        $rcdata = new RoomsCatagoryModel();
        $data = [
            'pageTitle' => 'add-room',
            'admindata' => $admindata,
            'roomcats' => $rcdata->getRoomsWithCat()
        ];
        // return view('fronts/admin/add-room/Add-room', $data);
        return view('fronts/admin/add-room/tabs/Details.php', $data);
    }
    public function addRoomCatagory()
    {
        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'response',
                'msg' => 'Invalid request!'
            ])->setStatusCode(400);
        }

        // Get form data
        $formData = $this->request->getPost();

        // Define validation rules
        $rules = [
            'room-catagory' => 'required|max_length[255]',
            'room'          => 'required|max_length[255]',
        ];

        // Custom error messages
        $messages = [
            'room-catagory' => [
                'required'   => 'room category is required.',
                'max_length' => 'room category must not exceed 255 characters.',
            ],
            'room' => [
                'required'   => 'room name is required.',
                'max_length' => 'room name must not exceed 255 characters.',
            ],
        ];

        // Validate the form data
        if (!$this->validate($rules, $messages)) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'validation',
                'msg'   => $this->validator->getErrors(),
            ]);
        }

        // Check for duplicate amenity
        $rcModel = new RoomsCatagoryModel();
        $room_slug = $rcModel->where('room_slug', Slug::slugify($formData['room']))->first();

        if ($room_slug) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'duplicate',
                'msg'   => 'Room type already exists!'
            ]);
        }

        // Prepare data for database
        $insertableData = [
            'cat'       => $formData['room-catagory'],
            'room_name'   => $formData['room'],
            'cat_slug'  => Slug::slugify($formData['room-catagory']),
            'room_slug'   => Slug::slugify($formData['room']),
        ];

        // Save to database
        try {
            if ($rcModel->insert($insertableData)) {
                return $this->response->setJSON([
                    'success' => true,
                    'msg'     => 'Room Catagory added successfully!',
                ]);
            } else {
                return $this->response->setJSON([
                    'error' => true,
                    'type'  => 'database',
                    'msg'   => 'Failed to add amenity!'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'exception',
                'msg'   => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }
    public function addRoomDetails()
    {
        $formData = $this->request->getPost();
        return $this->response->setJSON([
            'success' => true,
            'msg' => 'Room details save successfully!',
            'redirect' => base_url("admin/home")
        ]);
    }
}
