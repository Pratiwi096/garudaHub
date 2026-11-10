<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Project extends Model
{
    protected $fillable = [
        'client_id', 'title', 'description', 'category',
        'budget', 'bid_deadline', 'status',
    ];

    protected function casts(): array
    {
        return [
            'bid_deadline' => 'datetime',
            'budget' => 'integer',
        ];
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'client_id');
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }

    public function winningBid(): HasOne
    {
        return $this->hasOne(Bid::class)->where('status', 'accepted');
    }

    public function isOpen(): bool
    {
        return $this->status === 'open' && $this->bid_deadline->isFuture();
    }
}
