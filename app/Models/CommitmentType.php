<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommitmentType extends Model
{
    protected $fillable = [
        'short',
        'slug',
        'name',
        'aaoName',
    ];

    public function getRouteKeyName(): string
    {
        return "slug";
    }

    public function commitments(): HasMany
    {
        return $this->hasMany(Commitment::class);
    }
}

