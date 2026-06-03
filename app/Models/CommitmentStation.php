<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommitmentStation extends Model
{
    protected $table = 'commitment_station';

    protected $fillable = [
        'commitment_id',
        'station_id',
    ];

    public function commitment(): BelongsTo
    {
        return $this->belongsTo(Commitment::class);
    }

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
}

