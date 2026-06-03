<?php

namespace App\Policies;

use App\Models\Station;
use SLNE\FilamentAuthorization\Policies\FilamentPolicy;

/**
 * @extends FilamentPolicy<Station>
 */
class StationPolicy extends FilamentPolicy
{
    public static string $model = Station::class;
    public static string $permissionPrefix = 'stations';
}

