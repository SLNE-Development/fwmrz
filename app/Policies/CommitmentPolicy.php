<?php

namespace App\Policies;

use App\Models\Commitment;
use SLNE\FilamentAuthorization\Policies\FilamentPolicy;

/**
 * @extends FilamentPolicy<Commitment>
 */
class CommitmentPolicy extends FilamentPolicy
{
    public static string $model = Commitment::class;
    public static string $permissionPrefix = 'commitments';
}

