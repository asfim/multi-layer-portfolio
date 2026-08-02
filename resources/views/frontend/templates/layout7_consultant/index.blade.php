@extends('frontend.layouts.app')

@push('styles')
<style>
    .max-w-2xl {
        max-width: 600px;
    }
    
    /* Dark Mode support */
    .dark body {
        background-color: #0b0f19 !important;
        color: #cbd5e1 !important;
    }
    .dark .bg-white, .dark #about, .dark #education, .dark #skills, .dark #projects {
        background-color: #1e293b !important;
        color: #cbd5e1 !important;
    }
    .dark #experience, .dark #contact, .dark .bg-light {
        background-color: #0f172a !important;
        color: #cbd5e1 !important;
    }
    .dark h1, .dark h2, .dark h3, .dark h4, .dark .text-dark {
        color: #ffffff !important;
    }
    .dark .card, .dark .border {
        border-color: rgba(255, 255, 255, 0.08) !important;
    }
    .dark .navbar-toggler {
        filter: invert(1);
    }
</style>
@endpush

@section('content')
<!-- Consultant Navbar -->
<nav class="navbar navbar-expand-lg fixed-top py-3 px-4 shadow-sm" style="background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(10px);">
    <div class="container">
        <a class="navbar-brand fw-extrabold fs-4 text-white" href="#">
            <span style="color: #fbbf24;">//</span> {{ $portfolio->full_name }}
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navConsult">
            <i class="fa-solid fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navConsult">
            <ul class="navbar-nav ms-auto gap-3 fw-semibold">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a href="#{{ $sec->key }}" class="nav-link text-white-50" style="transition: 0.3s;" onmouseover="this.style.color='#fbbf24'" onmouseout="this.style.color=''">{{ $sec->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="hero" class="min-vh-100 d-flex align-items-center text-white pt-5" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);">
    <div class="container pt-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right">
                <span class="badge px-3 py-2 rounded-pill fw-bold mb-3 shadow" style="background: #fbbf24; color: #0f172a;">EXECUTIVE ADVISORY & CONSULTING</span>
                <h1 class="display-3 fw-extrabold mb-3">{{ $portfolio->full_name }}</h1>
                <h4 class="mb-4" style="color: #fbbf24;">{{ $portfolio->profession }}</h4>
                <p class="lead text-secondary mb-4">{{ $portfolio->short_bio }}</p>
                <div class="d-flex gap-3">
                    <a href="#services" class="btn btn-lg rounded-3 fw-bold text-dark px-4 shadow" style="background: #fbbf24; border: none;">Advisory Services</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg rounded-3 px-4">Schedule Consultation</a>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <div class="position-relative p-3 rounded-4" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(251, 191, 36, 0.3);">
                    <img src="{{ $portfolio->profile_photo }}" class="img-fluid rounded-3 w-100" style="max-height: 480px; object-fit: cover;" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5" style="background: #f8fafc; color: #0f172a;">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5" data-aos="fade-right">
                <img src="{{ $portfolio->cover_image }}" class="img-fluid rounded-4 shadow-lg w-100" alt="About" style="object-fit: cover; max-height: 400px;">
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <h6 class="fw-bold text-uppercase mb-2" style="color: #d97706;">Professional Overview</h6>
                <h2 class="fw-extrabold display-6 mb-4">About Me</h2>
                <p class="text-secondary leading-relaxed mb-4 fs-5">{{ $portfolio->about_me }}</p>
                <div class="row g-3">
                    <div class="col-6 col-md-4">
                        <div class="bg-white p-3 rounded-3 shadow-sm border text-center">
                            <h3 class="fw-bold mb-0" style="color: #d97706;">{{ $portfolio->years_of_experience }}+</h3>
                            <small class="text-muted fw-semibold">Years Exp.</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="bg-white p-3 rounded-3 shadow-sm border text-center">
                            <h3 class="fw-bold mb-0" style="color: #d97706;">{{ $portfolio->happy_clients }}</h3>
                            <small class="text-muted fw-semibold">Enterprise Clients</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h6 class="fw-bold text-uppercase" style="color: #d97706;">Academic Foundation</h6>
            <h2 class="fw-extrabold display-6">Education & Credentials</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($educations as $edu)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="p-4 rounded-4 bg-light border h-100 position-relative overflow-hidden">
                        <div class="position-absolute top-0 start-0 w-100" style="height: 4px; background: #fbbf24;"></div>
                        <h4 class="fw-bold mt-2" style="color: #0f172a;">{{ $edu->degree }}</h4>
                        <h6 class="fw-semibold text-secondary mb-3">{{ $edu->institute }}</h6>
                        <span class="badge bg-dark text-white px-3 py-2 rounded-pill mb-3">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</span>
                        @if($edu->description)
                            <p class="text-muted small mb-0">{{ $edu->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5" style="background: #f8fafc;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h6 class="fw-bold text-uppercase" style="color: #d97706;">Career Trajectory</h6>
            <h2 class="fw-extrabold display-6">Professional Experience</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach($experiences as $exp)
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border mb-4" data-aos="fade-up">
                        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                            <div>
                                <h4 class="fw-bold" style="color: #0f172a;">{{ $exp->designation }}</h4>
                                <h6 class="text-secondary fw-semibold">{{ $exp->company }}</h6>
                            </div>
                            <span class="badge px-3 py-2 rounded-pill" style="background: #fef3c7; color: #b45309;">{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                        </div>
                        <p class="text-secondary mb-0">{{ $exp->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h6 class="fw-bold text-uppercase" style="color: #d97706;">Core Competencies</h6>
            <h2 class="fw-extrabold display-6">Skills & Expertise</h2>
        </div>
        <div class="row g-4">
            @foreach($skillCategories as $cat)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-light p-4 rounded-4 border h-100">
                        <h5 class="fw-bold mb-4 pb-2 border-bottom" style="color: #0f172a;">{{ $cat->name }}</h5>
                        @foreach($cat->skills as $skill)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="fw-semibold text-secondary small">{{ $skill->name }}</span>
                                    <span class="fw-bold small" style="color: #d97706;">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="progress rounded-pill bg-white border" style="height: 8px;">
                                    <div class="progress-bar rounded-pill" style="width: {{ $skill->proficiency }}%; background: #fbbf24;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Services Tiers -->
<section id="services" class="py-5" style="background: #0f172a; color: white;">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h6 class="fw-bold text-uppercase" style="color: #fbbf24;">Value Proposition</h6>
            <h2 class="fw-extrabold display-6">Strategic Advisory Services</h2>
        </div>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="p-5 border rounded-4 h-100" style="background: rgba(255,255,255,0.02); border-color: rgba(255,255,255,0.1) !important;">
                        <div class="mb-4"><i class="{{ $svc->icon ?? 'fa-solid fa-briefcase' }} fa-2xl" style="color: #fbbf24;"></i></div>
                        <h4 class="fw-bold mb-3">{{ $svc->title }}</h4>
                        <p class="text-white-50 small mb-4">{{ $svc->short_description }}</p>
                        <span class="badge px-3 py-2 fw-bold" style="background: #fbbf24; color: #0f172a;">{{ $svc->price ?? 'Consultation' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects -->
<section id="projects" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h6 class="fw-bold text-uppercase" style="color: #d97706;">Case Studies</h6>
            <h2 class="fw-extrabold display-6">Consulting Projects</h2>
        </div>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="bg-light rounded-4 border overflow-hidden h-100">
                        <img src="{{ $proj->cover_image }}" class="w-100 border-bottom" style="height: 200px; object-fit: cover;" alt="">
                        <div class="p-4">
                            <span class="badge mb-2" style="background: #fef3c7; color: #b45309;">{{ $proj->category->name ?? 'Case Study' }}</span>
                            <h5 class="fw-bold mb-2 text-dark">{{ $proj->title }}</h5>
                            <p class="text-secondary small">{{ $proj->short_description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Form -->
<section id="contact" class="py-5" style="background: #f8fafc;">
    <div class="container py-5">
        <div class="max-w-2xl mx-auto p-5 bg-white rounded-4 shadow-sm border">
            <h3 class="fw-extrabold text-center mb-4 display-6" style="color: #0f172a;">Request a Strategy Session</h3>
            <p class="text-center text-secondary mb-5">Fill out the form below and our team will get back to you within 24 hours.</p>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Full Name</label>
                    <input type="text" name="name" class="form-control bg-light py-2" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Business Email</label>
                    <input type="email" name="email" class="form-control bg-light py-2" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold text-dark">Business Challenge / Goals</label>
                    <textarea name="message" class="form-control bg-light py-2" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn fw-bold w-100 py-3 shadow" style="background: #fbbf24; color: #0f172a; border: none; font-size: 1.1rem;">Book Consultation</button>
            </form>
        </div>
    </div>
</section>
@endsection
