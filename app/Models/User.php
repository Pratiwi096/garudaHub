<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return ['password' => 'hashed'];
    }

    // Proyek yang dipasang user ini (sebagai klien)
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'client_id');
    }

    // Penawaran yang diajukan user ini (sebagai developer)
    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class, 'developer_id');
    }

    public function isClient(): bool
    {
        return $this->role === 'client';
    }

    public function isDeveloper(): bool
    {
        return $this->role === 'developer';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
