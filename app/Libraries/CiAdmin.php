<?php

namespace App\Libraries;

class CiAdmin
{
    public static function setCiAdmin(array $admin): void
    {
        session()->set([
            'admin_logged_in' => true,
            'admindata' => $admin,
        ]);
    }

    public static function id(): ?int
    {
        return self::check() ? session('admindata.id') : null;
    }

    public static function check(): bool
    {
        return session()->has('admin_logged_in') && session('admin_logged_in') === true;
    }

    public static function forget(): void
    {
        session()->remove(['admin_logged_in', 'admindata']);
    }

    public static function admin(): ?array
    {
        return self::check() ? session('admindata') : null;
    }
}
