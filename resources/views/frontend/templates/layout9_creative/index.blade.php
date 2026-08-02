@extends('frontend.layouts.app')

@push('styles')
<style>
    .max-w-2xl {
        max-width: 600px;
    }
    @media (max-width: 991px) {
        .navbar-collapse {
            background: #111827;
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    }
</style>
@endpush

@section('content')
<!-- Creative Navbar -->
<nav class="navbar navbar-expand-lg fixed-top py-3 px-4 shadow-sm" style="background: rgba(255,255,255,0.05); backdrop-filter: blur(15px);">
    <div class="container">
        <a class="navbar-brand fw-extrabold text-gradient fs-4" href="#">
            <i class="fa-solid fa-wand-magic-sparkles me-2" style="color: #ec4899;"></i> {{ $portfolio->full_name }}
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navCreative">
            <i class="fa-solid fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navCreative">
            <ul class="navbar-nav ms-auto gap-4 fw-bold text-uppercase small">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a href="#{{ $sec->key }}" class="nav-link text-white-50 hover-pink" style="transition: 0.3s;" onmouseover="this.style.color='#ec4899'" onmouseout="this.style.color=''">{{ $sec->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="hero" class="min-vh-100 d-flex align-items-center pt-5 bg-dark">
    <div class="container text-center pt-5" data-aos="zoom-in">
        <span class="badge text-white px-4 py-2 rounded-pill mb-4 shadow" style="background: linear-gradient(45deg, #ec4899, #8b5cf6);">CREATIVE & DESIGN</span>
        <h1 class="display-1 fw-extrabold mb-4 text-white">
            Designing <span class="text-gradient" style="background: linear-gradient(45deg, #ec4899, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Magic.</span>
        </h1>
        <h3 class="fw-bold text-white mb-4">{{ $portfolio->full_name }} - {{ $portfolio->profession }}</h3>
        <p class="lead text-secondary max-w-2xl mx-auto mb-5">{{ $portfolio->short_bio }}</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#projects" class="btn text-white btn-lg px-5 py-3 rounded-pill fw-bold shadow-lg" style="background: linear-gradient(45deg, #ec4899, #8b5cf6); border: none;">Explore Work</a>
            <a href="#contact" class="btn btn-outline-light btn-lg px-5 py-3 rounded-pill fw-bold">Let's Talk</a>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5" style="background: #111827;">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="position-relative p-2 rounded-5" style="background: linear-gradient(45deg, #ec4899, #8b5cf6);">
                    <img src="{{ $portfolio->profile_photo }}" class="img-fluid rounded-5 w-100" style="max-height: 480px; object-fit: cover;" alt="">
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <h6 class="fw-bold text-uppercase mb-2" style="color: #ec4899;">Behind The Magic</h6>
                <h2 class="fw-extrabold display-5 mb-4 text-white">About Me</h2>
                <p class="fs-5 text-secondary leading-relaxed mb-4">{{ $portfolio->about_me }}</p>
                <div class="row g-4 mt-2 text-white">
                    <div class="col-6 col-md-4">
                        <div class="glass-card p-3 rounded-4 text-center border-0" style="background: rgba(255,255,255,0.05);">
                            <h3 class="fw-bold mb-0" style="color: #ec4899;">{{ $portfolio->years_of_experience }}+</h3>
                            <small class="text-white-50">Years Magic</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="glass-card p-3 rounded-4 text-center border-0" style="background: rgba(255,255,255,0.05);">
                            <h3 class="fw-bold mb-0" style="color: #8b5cf6;">{{ $portfolio->completed_projects }}</h3>
                            <small class="text-white-50">Projects</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-5 bg-dark">
    <div class="container py-5">
        <h2 class="fw-extrabold display-6 text-center text-white mb-5">Creative Journey & Education</h2>
        <div class="row g-4 justify-content-center">
            @foreach($educations as $edu)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="glass-card p-5 rounded-5 border-0 shadow-lg h-100 position-relative overflow-hidden text-white" style="background: rgba(255,255,255,0.03);">
                        <div class="position-absolute top-0 end-0 p-3">
                            <span class="badge rounded-pill" style="background: rgba(236, 72, 153, 0.2); color: #ec4899;">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</span>
                        </div>
                        <h4 class="fw-bold mb-3 mt-3">{{ $edu->degree }}</h4>
                        <h6 class="mb-3" style="color: #8b5cf6;">{{ $edu->institute }}</h6>
                        <p class="text-white-50 small mb-0">{{ $edu->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5" style="background: #111827;">
    <div class="container py-5">
        <h2 class="fw-extrabold display-6 text-center text-white mb-5">Work Experience</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach($experiences as $exp)
                    <div class="glass-card p-4 p-md-5 rounded-5 border-0 mb-4 text-white" style="background: rgba(255,255,255,0.03);" data-aos="fade-up">
                        <div class="d-flex justify-content-between align-items-center border-bottom border-secondary pb-3 mb-3">
                            <div>
                                <h4 class="fw-bold mb-1" style="color: #ec4899;">{{ $exp->designation }}</h4>
                                <h6 class="text-white-50">{{ $exp->company }}</h6>
                            </div>
                            <span class="badge rounded-pill border border-secondary text-white px-3 py-2">{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                        </div>
                        <p class="text-secondary mb-0">{{ $exp->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <h2 class="fw-extrabold display-6 text-center mb-5">Superpowers</h2>
        <div class="row g-4">
            @foreach($skillCategories as $cat)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="glass-card p-4 p-md-5 rounded-5 border-0 h-100" style="background: rgba(255,255,255,0.03);">
                        <h5 class="fw-bold mb-4 pb-2 border-bottom border-secondary" style="color: #8b5cf6;">{{ $cat->name }}</h5>
                        @foreach($cat->skills as $skill)
                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="fw-semibold small">{{ $skill->name }}</span>
                                    <span class="fw-bold small" style="color: #ec4899;">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="progress rounded-pill bg-dark" style="height: 8px;">
                                    <div class="progress-bar rounded-pill" style="width: {{ $skill->proficiency }}%; background: linear-gradient(45deg, #ec4899, #8b5cf6);"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5" style="background: #111827;">
    <div class="container py-5">
        <h2 class="fw-extrabold display-6 text-center text-white mb-5">What I Do</h2>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="glass-card p-5 rounded-5 border-0 text-center h-100 text-white hover-up" style="background: rgba(255,255,255,0.03); transition: 0.3s;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div class="mb-4 d-inline-flex p-4 rounded-circle" style="background: rgba(236, 72, 153, 0.1);">
                            <i class="{{ $svc->icon ?? 'fa-solid fa-wand-magic' }} fa-2x" style="color: #ec4899;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">{{ $svc->title }}</h4>
                        <p class="text-secondary small">{{ $svc->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Floating Work Cards -->
<section id="projects" class="py-5 bg-dark">
    <div class="container py-5">
        <h2 class="fw-extrabold display-6 text-center text-white mb-5">Creative Showcase</h2>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="glass-card p-3 h-100 border-0 shadow-lg text-white rounded-4" style="background: rgba(255,255,255,0.03); transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img src="{{ $proj->cover_image }}" class="w-100 rounded-3 mb-3" style="height: 220px; object-fit: cover;" alt="">
                        <div class="p-2">
                            <h5 class="fw-bold mb-2">{{ $proj->title }}</h5>
                            <p class="text-white-50 small mb-4">{{ $proj->short_description }}</p>
                            <a href="{{ $proj->live_url ?? '#' }}" class="btn w-100 text-white rounded-pill fw-bold" style="background: rgba(139, 92, 246, 0.5);">View Project</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5" style="background: #111827;">
    <div class="container py-5">
        <div class="glass-card p-4 p-md-5 max-w-2xl mx-auto border-0 rounded-5 shadow-lg" style="background: rgba(255,255,255,0.05);">
            <h3 class="fw-extrabold text-center mb-4 text-white display-6">Let's Create Magic Together</h3>
            <p class="text-center text-secondary mb-5">Have a crazy idea? Let's talk.</p>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-4">
                    <input type="text" name="name" class="form-control bg-transparent text-white border-secondary py-3 rounded-pill px-4" placeholder="Your Name" required>
                </div>
                <div class="mb-4">
                    <input type="email" name="email" class="form-control bg-transparent text-white border-secondary py-3 rounded-pill px-4" placeholder="Your Email" required>
                </div>
                <div class="mb-4">
                    <textarea name="message" class="form-control bg-transparent text-white border-secondary py-3 rounded-4 px-4" rows="5" placeholder="Your Vision / Message" required></textarea>
                </div>
                <button type="submit" class="btn text-white w-100 py-3 rounded-pill fw-bold text-uppercase shadow-lg" style="background: linear-gradient(45deg, #ec4899, #8b5cf6); border: none; letter-spacing: 1px;">Send Inquiry</button>
            </form>
        </div>
    </div>
</section>
@endsection
