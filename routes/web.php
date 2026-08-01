<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\LayoutController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ThemeSettingController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\ContactSubmissionController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// ----------------------------------------------------
// Public Frontend Routes
// ----------------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact/submit', [ContactSubmissionController::class, 'submit'])->name('contact.submit');

// ----------------------------------------------------
// Authentication Routes
// ----------------------------------------------------
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------------------------------------
// Protected Admin Panel Routes
// ----------------------------------------------------
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Portfolio Info
    Route::get('/portfolio', [PortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio', [PortfolioController::class, 'update'])->name('portfolio.update');

    // Layout Manager & Live Theme Switcher
    Route::get('/layouts', [LayoutController::class, 'index'])->name('layouts.index');
    Route::post('/layouts/select', [LayoutController::class, 'select'])->name('layouts.select');

    // Theme Customizer & Dynamic Styling
    Route::get('/theme-settings', [ThemeSettingController::class, 'edit'])->name('theme_settings.edit');
    Route::put('/theme-settings', [ThemeSettingController::class, 'update'])->name('theme_settings.update');

    // Drag & Drop Section Builder
    Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
    Route::post('/sections/{id}/toggle', [SectionController::class, 'toggleStatus'])->name('sections.toggle');
    Route::post('/sections/update-orders', [SectionController::class, 'updateOrders'])->name('sections.orders');
    Route::put('/sections/{id}/titles', [SectionController::class, 'updateTitles'])->name('sections.titles');

    // Projects CRUD
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Skills CRUD
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
    Route::put('/skills/{id}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{id}', [SkillController::class, 'destroy'])->name('skills.destroy');

    // Experience CRUD
    Route::get('/experience', [ExperienceController::class, 'index'])->name('experience.index');
    Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');
    Route::put('/experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');
    Route::delete('/experience/{id}', [ExperienceController::class, 'destroy'])->name('experience.destroy');

    // Education CRUD
    Route::get('/education', [EducationController::class, 'index'])->name('education.index');
    Route::post('/education', [EducationController::class, 'store'])->name('education.store');
    Route::put('/education/{id}', [EducationController::class, 'update'])->name('education.update');
    Route::delete('/education/{id}', [EducationController::class, 'destroy'])->name('education.destroy');

    // Certificates CRUD
    Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::post('/certificates', [CertificateController::class, 'store'])->name('certificates.store');
    Route::put('/certificates/{id}', [CertificateController::class, 'update'])->name('certificates.update');
    Route::delete('/certificates/{id}', [CertificateController::class, 'destroy'])->name('certificates.destroy');

    // Services CRUD
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // Testimonials CRUD
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::put('/testimonials/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
    Route::delete('/testimonials/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

    // Blog CRUD
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    // Contacts & Messages
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::post('/contacts/{id}/read', [ContactController::class, 'markAsRead'])->name('contacts.read');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Site Settings & SEO
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
});
