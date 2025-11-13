<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'email',
        'name',
        'password_hash',
        'remember_token',
        'is_verified',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[users.email]',
        'name'  => 'permit_empty|min_length[2]',
        'password_hash' => 'permit_empty|min_length[6]',
    ];

    public function getUser($data)
    {
        return $this->where('email', $data['email'])->first() ?? [];
    }
}
