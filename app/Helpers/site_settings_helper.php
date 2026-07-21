<?php

use App\Models\SiteSettingModel;

if (!function_exists('setting')) {

    function setting(string $key, $default = null)
    {
        $cacheKey = 'site_settings_all';
        $cache = cache();

        $settings = $cache->get($cacheKey);

        if ($settings === null) {
            $model = new SiteSettingModel();
            $settings = [];

            foreach ($model->findAll() as $row) {
                $settings[$row['setting_key']] =
                    $model->castValue($row['value'], $row['type']);
            }

            $cache->save($cacheKey, $settings, 86400);
        }

        return $settings[$key] ?? $default;
    }
}

if (!function_exists('clear_setting_cache')) {
    function clear_setting_cache(): void
    {
        cache()->delete('site_settings_all');
    }
}
