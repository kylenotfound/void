<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialiteType extends Model
{
    use HasFactory;
    use SoftDeletes;

    const GITHUB_ID = 1;
    const GOOGLE_ID = 2;

    protected $fillable = [
        'name'
    ];

    public function socialiteConnection(): BelongsTo {
        return $this->belongsTo(SocialiteConnection::class);
    }
}
