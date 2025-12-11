<?php

use App\Models\UserModel;

/**
 * Return the authenticated user object
 */
function currentUser()
{
    static $cachedUser = null;

    if ($cachedUser !== null) {
        return $cachedUser;
    }

    $userId = session('user_id');

    if (!$userId) return null;

    $model = new UserModel();
    return $cachedUser = $model->find($userId);
}

/**
 * Check logged in
 */
function isLoggedIn()
{
    return session()->has('user_id');
}
