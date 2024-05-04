<?php

namespace App\Models;

use App\Models\UserType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
        'avatar',
        'user_type_id',
        'is_socialite_user',
        'timezone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function socialiteConnections(): HasMany {
        return $this->hasMany(SocialiteConnection::class);
    }

    public function isAdmin(): bool {
        return $this->user_type_id === UserType::ADMIN;
    }

    public function getRegisteredAtAttribute(): string {
        return Carbon::parse($this->attributes['created_at'])->tz(auth()->user()->timezone)->format('m/d/Y');
    }
}
