<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'designation',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'description',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'is_current' => 'boolean',
        ];
    }
}
