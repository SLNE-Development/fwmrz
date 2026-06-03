<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Station extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function getRouteKeyName(): string
    {
        return "slug";
    }

    public function commitments(): BelongsToMany
    {
        return $this->belongsToMany(Commitment::class, 'commitment_station')
            ->withTimestamps();
    }
}

