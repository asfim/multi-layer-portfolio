<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'short_description',
        'description',
        'cover_image',
        'gallery_images',
        'client_name',
        'project_date',
        'live_url',
        'github_url',
        'technologies',
        'is_featured',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'gallery_images' => 'array',
            'technologies' => 'array',
            'is_featured' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }

    public function getCoverImageAttribute($value)
    {
        if (empty($value)) return $value;
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }
}
