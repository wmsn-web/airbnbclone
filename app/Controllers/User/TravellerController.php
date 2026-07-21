<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\TravellerModel;
use CodeIgniter\HTTP\ResponseInterface;

class TravellerController extends BaseController
{
    protected TravellerModel $travellerModel;

    public function __construct()
    {
        $this->travellerModel = new TravellerModel();
    }
    
    /**
     * GET /api/travellers
     */
    public function index()
    {
        $userId = session('user_id');

        if (!$userId) {
            return $this->response->setStatusCode(401)->setJSON([
                'error' => true,
                'message' => 'Unauthorized'
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'travellers' => $this->travellerModel->getByUser($userId),
        ]);
    }

    /**
     * POST /api/travellers/create
     */
    public function create(): ResponseInterface
    {
        $userId = session('user_id');
        $data   = $this->request->getJSON(true);

        if (!$userId) {
            return $this->response->setStatusCode(401)->setJSON([
                'error' => true,
                'message' => 'Unauthorized'
            ]);
        }

        $data['user_id'] = $userId;

        if (!$this->travellerModel->insert($data)) {
            return $this->response->setStatusCode(422)->setJSON([
                'error' => true,
                'errors' => $this->travellerModel->errors(),
            ]);
        }

        return $this->response->setStatusCode(201)->setJSON([
            'success' => true,
            'id' => $this->travellerModel->getInsertID(),
        ]);
    }

    /**
     * POST /api/travellers/update/{id}
     */
    public function update(int $id): ResponseInterface
    {
        $userId = session('user_id');
        $data   = $this->request->getJSON(true);

        if (!$userId) {
            return $this->response->setStatusCode(401)->setJSON([
                'error' => true,
                'message' => 'Unauthorized'
            ]);
        }

        $traveller = $this->travellerModel
            ->where('id', $id)
            ->where('user_id', $userId)
            ->first();

        if (!$traveller) {
            return $this->response->setStatusCode(404)->setJSON([
                'error' => true,
                'message' => 'Traveller not found'
            ]);
        }

        if (!$this->travellerModel->update($id, $data)) {
            return $this->response->setStatusCode(422)->setJSON([
                'error' => true,
                'errors' => $this->travellerModel->errors(),
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Traveller updated',
        ]);
    }

    /**
     * DELETE /api/travellers/delete/{id}
     */
    public function delete(int $id): ResponseInterface
    {
        $userId = session('user_id');

        if (!$userId) {
            return $this->response->setStatusCode(401)->setJSON([
                'error' => true,
                'message' => 'Unauthorized'
            ]);
        }

        $deleted = $this->travellerModel
            ->where('id', $id)
            ->where('user_id', $userId)
            ->delete();

        if (!$deleted) {
            return $this->response->setStatusCode(404)->setJSON([
                'error' => true,
                'message' => 'Traveller not found'
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Traveller deleted',
        ]);
    }
}
