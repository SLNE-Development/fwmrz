<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Commitment extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'start',
        'user_id',
        'commitment_type_id',
        'thumbnail',
        'publicity',
    ];

    protected function casts(): array
    {
        return [
            'start' => 'datetime',
            'publicity' => 'integer',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(CommitmentType::class, 'commitment_type_id');
    }

    public function stations(): BelongsToMany
    {
        return $this->belongsToMany(Station::class, 'commitment_station')
            ->withTimestamps();
    }

    public function getRouteKeyName(): string
    {
        return "slug";
    }
}

