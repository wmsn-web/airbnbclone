<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailVerificationModel extends Model
{
    protected $table            = 'user_email_verifications';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $allowedFields    = [
        'user_id',
        'token',
        'otp_code',
        'expires_at',
        'type'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function createOTP($userId)
    {
        $otp = rand(100000, 999999);
        $this->insert([
            'user_id' => $userId,
            'otp_code' => $otp,
            'type' => 'otp',
            'expires_at' => date('Y-m-d H:i:s', strtotime('+3 minutes')),
        ]);
        return $otp; // ✅ return actual OTP, not insert ID
    }

    public function createMagicLink($userId)
    {
        $token = bin2hex(random_bytes(32));
        $this->insert([
            'user_id' => $userId,
            'token' => $token,
            'type' => 'magic_link',
            'expires_at' => date('Y-m-d H:i:s', strtotime('+10 minutes')),
        ]);
        return $token; // ✅ return token value
    }

    public function createMagicOtp($userId)
    {
        $this->where('user_id', $userId)->delete();
        $otp   = rand(100000, 999999);
        $token = bin2hex(random_bytes(32));

        $this->insert([
            'user_id'    => $userId,
            'token'      => $token,
            'otp_code'   => $otp,
            'type'       => 'mix',
            'expires_at' => date('Y-m-d H:i:s', strtotime('+5 minutes')),
        ]);

        return [
            'otp'   => $otp,
            'token' => $token,
        ];
    }
    public function cleanOldRecords($userId = null)
    {
        // Delete expired or old verification records
        $builder = $this->where('expires_at <', date('Y-m-d H:i:s'));

        if ($userId) {
            $builder->where('user_id', $userId);
        }

        $builder->delete();
    }
}
