<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model {
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'content',
        'view_count'
    ];

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function viewers(): HasMany {
        return $this->hasMany(PostView::class, 'post_id', 'id');
    }

    public function getViewCountAttribute(): string {
        return number_format($this->attributes['view_count'], 0, '.', ',');
    }

    public function addView(): self {
        if (
            (auth()->check() && $this->viewers->firstWhere('user_id', auth()->id()) === null) ||
            (! auth()->check() && $this->viewers->firstWhere('ip', request()->ip()) === null)
        ) {
            $this->viewers()->create([
                'post_id' => $this->getKey(), 
                'user_id' => auth()->id() ?? null, 
                'ip' => request()->ip()
            ]);

            $this->update(['view_count' => $this->attributes['view_count'] += 1 ]);
        }

        return $this;
    }
}
