<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostView extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'post_id',
        'user_id',
        'ip',
    ];

    public function post(): HasOne {
        return $this->hasOne(Post::class);
    }
    

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function getReadAtAttribute(): string {
        return Carbon::parse($this->attributes['created_at'])->tz(auth()->user()->timezone)->format('m/d/Y g:i A T');
    }
}
