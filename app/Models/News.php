<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id',
        'publicity',
        'thumbnail',
        'static',
    ];

    protected function casts(): array
    {
        return [
            'publicity' => 'integer',
            'static' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

