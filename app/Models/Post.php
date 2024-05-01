<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            if (auth()->check()) {
                $model->user_id = auth()->id();
                $model->slug = Str::kebab(request()->title);
            }
        });

        static::updating(function ($model) {
            if (request()->title) {
                $model->slug = Str::kebab(request()->title);
            }
        });
    }

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
        $this->viewers()->updateOrCreate([
            'post_id' => $this->getKey(), 
            'ip' => request()->ip()
        ], [
            'user_id' => auth()->id() ?? null, 
        ]);

        $this->update(['view_count' => $this->viewers->count()]);

        return $this;
    }
}
