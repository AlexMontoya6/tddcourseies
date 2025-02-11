<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $casts = [
        'learnings' => 'array',
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image_name',
        'learnings',
        'paddle_product_id',
        'tagline',
        'released_at',
    ];

    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }

    public function scopeReleased(Builder $query): Builder
    {
        return $query->whereNotNull('released_at');
    }

    public function categoryCourses(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_courses');
    }
}
