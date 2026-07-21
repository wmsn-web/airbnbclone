<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteSettingModel extends Model
{
    protected $table = 'site_settings';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'setting_key',
        'value',
        'type',
        'setting_group',
    ];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getAll(?string $group = null): array
    {
        if ($group !== null) {
            return $this->where('setting_group', $group)->findAll();
        }

        return $this->findAll();
    }
    public function getValue(string $key, $default = null)
    {
        $row = $this->where('setting_key', $key)->first();
        if (!$row) return $default;

        return $this->castValue($row['value'], $row['type']);
    }

    public function setValue(string $key, $value, string $type = 'string', string $group = 'general'): bool
    {
        $data = [
            'setting_key'   => $key,
            'value'         => $this->prepareValue($value, $type),
            'type'          => $type,
            'setting_group' => $group,
        ];

        $exists = $this->where('setting_key', $key)->first();

        if ($exists) {
            return (bool) $this->where('setting_key', $key)->update(null, $data);
        }

        return (bool) $this->insert($data);
    }

    public function castValue($value, string $type)
    {
        return match ($type) {
            'boolean' => (bool) $value,
            'number'  => is_numeric($value) ? $value + 0 : 0,
            'json'    => json_decode($value, true),
            default   => $value,
        };
    }

    public function prepareValue($value, string $type): string
    {
        return match ($type) {
            'boolean' => $value ? '1' : '0',
            'json'    => json_encode($value, JSON_UNESCAPED_UNICODE),
            default   => (string) $value,
        };
    }
}
