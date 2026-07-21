<?php

namespace App\Models;

use CodeIgniter\Model;

class TravellerModel extends Model
{
    protected $table            = 'travellers';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'user_id',
        'full_name',
        'age',
        'type',
    ];
    protected $validationRules = [
        'user_id'   => 'required|integer',
        'full_name' => 'required|min_length[2]|max_length[150]',
        'age'       => 'permit_empty|integer|greater_than_equal_to[0]|less_than_equal_to[100]',
        'type'      => 'required|in_list[adult,child,infant]',
    ];

    protected $validationMessages = [
        'type' => [
            'in_list' => 'Traveller type must be adult, child or infant',
        ],
        'age' => [
            'less_than_equal_to' => 'Age cannot exceed 100 years',
        ],
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getByUser(int $userId): array
    {
        return $this->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }

    /**
     *  Get travellers grouped by type
     * (adult / child / infant)
     */
    public function getGroupedByType(int $userId): array
    {
        $travellers = $this->getByUser($userId);

        $grouped = [
            'adult'  => [],
            'child'  => [],
            'infant' => [],
        ];

        foreach ($travellers as $t) {
            $grouped[$t['type']][] = $t;
        }

        return $grouped;
    }

    /**
     *  Create or update traveller (AJAX safe)
     * Used for add/edit traveller modal
     */
    public function saveTraveller(array $data): bool|int
    {
        if (isset($data['id']) && $this->find($data['id'])) {
            return $this->update($data['id'], $data);
        }

        return $this->insert($data);
    }

    /**
     *  Delete traveller (only owner allowed)
     */
    public function deleteForUser(int $travellerId, int $userId): bool
    {
        return (bool) $this->where([
            'id'      => $travellerId,
            'user_id' => $userId,
        ])->delete();
    }

    /**
     *  Validate traveller assignment per room
     * Prevent over-assignment (server-side)
     */
    public function validateRoomTravellers(array $travellers, array $room): bool
    {
        $counts = [
            'adult'  => 0,
            'child'  => 0,
            'infant' => 0,
        ];

        foreach ($travellers as $t) {
            if (!isset($counts[$t['type']])) {
                return false;
            }
            $counts[$t['type']]++;
        }

        return
            $counts['adult']  <= ($room['adults'] ?? 0) &&
            $counts['child']  <= ($room['children'] ?? 0) &&
            $counts['infant'] <= ($room['infants'] ?? 0);
    }

    /**
     *  Prepare traveller snapshot for booking JSON
     * (Immutable copy)
     */
    public function toBookingSnapshot(array $travellers): array
    {
        return array_map(fn($t) => [
            'full_name' => $t['full_name'],
            'age'       => $t['age'],
            'type'      => $t['type'],
        ], $travellers);
    }

    /**
     *  Count travellers by type (for checkout validation)
     */
    public function countByType(array $travellers): array
    {
        return [
            'adult'  => count(array_filter($travellers, fn($t) => $t['type'] === 'adult')),
            'child'  => count(array_filter($travellers, fn($t) => $t['type'] === 'child')),
            'infant' => count(array_filter($travellers, fn($t) => $t['type'] === 'infant')),
        ];
    }
}
