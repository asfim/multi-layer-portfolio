<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            $table->string('active_layout')->default('layout1_developer');
            $table->string('primary_color')->default('#3b82f6');
            $table->string('secondary_color')->default('#1e293b');
            $table->string('accent_color')->default('#06b6d4');
            $table->string('dark_mode')->default('auto'); // dark, light, auto
            $table->string('font_family')->default('Inter');
            $table->string('border_radius')->default('8px');
            $table->string('button_style')->default('rounded');
            $table->string('animation_style')->default('fade');
            $table->boolean('enable_particles')->default(true);
            $table->boolean('enable_preloader')->default(true);
            $table->boolean('enable_cursor_effect')->default(false);
            $table->boolean('enable_glassmorphism')->default(true);
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
