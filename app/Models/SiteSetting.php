<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'google_analytics_id',
        'facebook_pixel_id',
        'smtp_host',
        'smtp_port',
        'smtp_username',
        'smtp_password',
        'smtp_encryption',
        'mail_from_address',
        'mail_from_name',
        'google_map_iframe',
        'whatsapp_number',
        'telegram_username',
    ];

    public function getLogoAttribute($value)
    {
        if (empty($value)) return $value;
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }

    public function getFaviconAttribute($value)
    {
        if (empty($value)) return $value;
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }

    public function getMetaImageAttribute($value)
    {
        if (empty($value)) return $value;
        return str_starts_with($value, 'http') ? $value : asset('storage/' . $value);
    }
}
