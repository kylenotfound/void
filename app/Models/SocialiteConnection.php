<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialiteConnection extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'socialite_type_id',
        'external_id',
        'external_token',
        'external_refresh_token'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function socialiteType(): HasOne {
        return $this->hasOne(SocialiteType::class);
    }
}
