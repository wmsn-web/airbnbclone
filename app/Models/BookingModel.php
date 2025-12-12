<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table            = 'bookings';
    protected $primaryKey       = 'id';

    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'pnr_no',
        'user_id',
        'hotel_id',
        'room_id',
        'name',
        'email',
        'phone',
        'check_in',
        'check_out',
        'adults',
        'children',
        'infants',
        'amount',
        'payment_status',
        'payment_method',
        'payment_id',
        'transaction_id',
        'booking_status',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Validation Rules
     */
    protected $validationRules = [
        'hotel_id' => 'required|integer',
        'room_id'  => 'required|integer',
        'check_in' => 'required|valid_date',
        'check_out' => 'required|valid_date',
        'amount'   => 'required'
    ];

    protected $validationMessages = [
        'hotel_id' => [
            'required' => 'Hotel is required.'
        ],
        'room_id' => [
            'required' => 'Room is required.'
        ]
    ];

    /**
     * Generate internal transaction ID
     * Example: BOOK-20251204-XY12AB
     */
    public function generateTransactionId()
    {
        return 'BOOK-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));
    }

    public function generatePnr()
    {
        return 'PNR' . strtoupper(substr(md5(time() . random_bytes(2)), 0, 8));
    }
    
    /**
     * Get all bookings for a specific user
     */
    public function getBookingsByUser($userId)
    {
        return $this->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    /**
     * Mark booking as paid
     */
    public function markPaid($bookingId, $paymentId, $method = 'stripe')
    {
        return $this->update($bookingId, [
            'payment_status' => 'paid',
            'payment_id'     => $paymentId,
            'payment_method' => $method,
            'booking_status' => 'confirmed',
        ]);
    }

    /**
     * Mark booking as failed
     */
    public function markFailed($bookingId)
    {
        return $this->update($bookingId, [
            'payment_status' => 'failed',
            'booking_status' => 'cancelled'
        ]);
    }

    /**
     * Mark booking as refunded
     */
    public function markRefunded($bookingId)
    {
        return $this->update($bookingId, [
            'payment_status' => 'refunded',
            'booking_status' => 'cancelled'
        ]);
    }
}
