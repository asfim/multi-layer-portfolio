<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'institute',
        'degree',
        'department',
        'result',
        'start_year',
        'end_year',
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
