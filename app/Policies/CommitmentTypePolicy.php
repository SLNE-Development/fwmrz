<?php

namespace App\Policies;

use App\Models\CommitmentType;
use SLNE\FilamentAuthorization\Policies\FilamentPolicy;

/**
 * @extends FilamentPolicy<CommitmentType>
 */
class CommitmentTypePolicy extends FilamentPolicy
{
    public static string $model = CommitmentType::class;
    public static string $permissionPrefix = 'commitment_types';
}

