<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table            = 'bookings';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $allowedFields = [
        'pnr_no',
        'user_id',
        'hotel_id',
        'rooms',
        'name',
        'email',
        'phone',
        'check_in',
        'check_out',
        'adults',
        'children',
        'infants',
        'amount',
        'currency',
        'payment_status',
        'payment_method',
        'payment_id',
        'transaction_id',
        'booking_status',
    ];

    protected $validationRules = [
        'hotel_id'  => 'required|integer',
        'rooms'     => 'required',
        'check_in'  => 'required|valid_date',
        'check_out' => 'required|valid_date',
        'amount'    => 'required|decimal',
    ];

    protected $validationMessages = [
        'rooms' => [
            'required' => 'At least one room is required.',
        ],
    ];

    /* ---------------- HELPERS ---------------- */

    public function generatePnr(): string
    {
        return 'PNR' . strtoupper(substr(md5(uniqid('', true)), 0, 8));
    }

    public function generateTransactionId(): string
    {
        return 'BOOK-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));
    }

    public function getBookingsByUser(int $userId): array
    {
        return $this->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    public function markPaid(int $bookingId, string $paymentId, string $method = 'stripe')
    {
        return $this->update($bookingId, [
            'payment_status' => 'paid',
            'payment_id'     => $paymentId,
            'payment_method' => $method,
            'booking_status' => 'confirmed',
        ]);
    }

    public function markFailed(int $bookingId)
    {
        return $this->update($bookingId, [
            'payment_status' => 'failed',
            'booking_status' => 'cancelled',
        ]);
    }

    public function markRefunded(int $bookingId)
    {
        return $this->update($bookingId, [
            'payment_status' => 'refunded',
            'booking_status' => 'cancelled',
        ]);
    }

    /**
     * Decode rooms JSON safely
     */
    public function getRooms(array $booking): array
    {
        return json_decode($booking['rooms'], true) ?? [];
    }
}
