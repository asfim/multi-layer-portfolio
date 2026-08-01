<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'designation',
        'company',
        'client_photo',
        'rating',
        'review',
        'order',
    ];

    public function getClientPhotoAttribute($value)
    {
        if (empty($value)) return $value;
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }
}
