<?php

namespace App\Policies;

use App\Models\CommitmentStation;
use SLNE\FilamentAuthorization\Policies\FilamentPolicy;

/**
 * @extends FilamentPolicy<CommitmentStation>
 */
class CommitmentStationPolicy extends FilamentPolicy
{
    public static string $model = CommitmentStation::class;
    public static string $permissionPrefix = 'commitment_stations';
}

