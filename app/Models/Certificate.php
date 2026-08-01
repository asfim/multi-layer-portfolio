<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'issuer',
        'issue_date',
        'image',
        'verification_url',
        'order',
    ];

    public function getImageAttribute($value)
    {
        if (empty($value)) return $value;
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }
}
