<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'active_layout',
        'primary_color',
        'secondary_color',
        'accent_color',
        'dark_mode',
        'font_family',
        'border_radius',
        'button_style',
        'animation_style',
        'enable_particles',
        'enable_preloader',
        'enable_cursor_effect',
        'enable_glassmorphism',
        'custom_css',
        'custom_js',
    ];

    protected function casts(): array
    {
        return [
            'enable_particles' => 'boolean',
            'enable_preloader' => 'boolean',
            'enable_cursor_effect' => 'boolean',
            'enable_glassmorphism' => 'boolean',
        ];
    }
}
