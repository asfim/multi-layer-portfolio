<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'profession',
        'profile_photo',
        'cover_image',
        'short_bio',
        'about_me',
        'availability',
        'location',
        'phone',
        'email',
        'website',
        'resume_pdf',
        'years_of_experience',
        'completed_projects',
        'happy_clients',
        'awards_count',
        'github',
        'gitlab',
        'linkedin',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'behance',
        'dribbble',
        'medium',
        'stackoverflow',
        'researchgate',
        'google_scholar',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getProfilePhotoAttribute($value)
    {
        if (empty($value)) return $value;
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }

    public function getCoverImageAttribute($value)
    {
        if (empty($value)) return $value;
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }
}
