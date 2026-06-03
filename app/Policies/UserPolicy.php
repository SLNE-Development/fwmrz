<?php

namespace App\Policies;

use App\Models\User;
use SLNE\FilamentAuthorization\Policies\FilamentPolicy;

/**
 * @extends FilamentPolicy<User>
 */
class UserPolicy extends FilamentPolicy
{
    public static string $model = User::class;
    public static string $permissionPrefix = 'users';
}

