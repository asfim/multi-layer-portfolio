<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('profession');
            $table->string('profile_photo')->nullable();
            $table->string('cover_image')->nullable();
            $table->text('short_bio')->nullable();
            $table->longText('about_me')->nullable();
            $table->string('availability')->default('Available for Hire');
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('resume_pdf')->nullable();
            $table->integer('years_of_experience')->default(0);
            $table->integer('completed_projects')->default(0);
            $table->integer('happy_clients')->default(0);
            $table->integer('awards_count')->default(0);

            // Social Links
            $table->string('github')->nullable();
            $table->string('gitlab')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('behance')->nullable();
            $table->string('dribbble')->nullable();
            $table->string('medium')->nullable();
            $table->string('stackoverflow')->nullable();
            $table->string('researchgate')->nullable();
            $table->string('google_scholar')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
