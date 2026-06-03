<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Commitment extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'start',
        'user_id',
        'commitment_type_id',
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
            ->useDisk("public")
            ->singleFile();

        $this->addMediaCollection('gallery')
            ->useDisk("public");
    }
}
