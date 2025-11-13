<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = [
        'full_name',
        'username',
        'email',
        'password',
        'role',
        'remember_token',
        'created_at'
    ];


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'full_name' => 'required|min_length[3]|max_length[100]',
        'username' => 'required|alpha_dash|min_length[3]|max_length[50]|is_unique[admins.username,id,{id}]',
        'email' => 'required|valid_email|is_unique[admins.email,id,{id}]',
        'password' => 'required|min_length[6]|max_length[255]',
        'role' => 'required|in_list[superadmin,admin,editor]',
    ];

    // ✅ Custom validation messages (optional)
    protected $validationMessages = [
        'username' => [
            'is_unique' => 'This username is already taken.',
        ],
        'email' => [
            'is_unique' => 'This email is already registered.',
            'valid_email' => 'Please provide a valid email address.',
        ],
        'password' => [
            'min_length' => 'Password must be at least 6 characters long.',
        ],
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
