@extends('frontend.layouts.app')

@section('content')
<!-- Custom Styles for ShakerTech Vibe -->
<style>
    :root {
        --st-bg: #030014;
        --st-bg-glass: rgba(10, 10, 25, 0.7);
        --st-primary: #00d2ff;
        --st-secondary: #9b51e0;
        --st-text: #e2e8f0;
        --st-text-muted: #94a3b8;
        --st-grad: linear-gradient(135deg, #00d2ff 0%, #3a7bd5 50%, #9b51e0 100%);
        --st-glow: 0 0 20px rgba(0, 210, 255, 0.3);
    }
    
    body {
        background-color: var(--st-bg);
        color: var(--st-text);
        font-family: 'Inter', sans-serif;
    }

    /* Gradient Text */
    .text-gradient {
        background: var(--st-grad);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Glowing Buttons */
    .btn-glow {
        background: var(--st-grad);
        color: white;
        border: none;
        box-shadow: var(--st-glow);
        transition: all 0.3s ease;
    }
    .btn-glow:hover {
        transform: translateY(-2px);
        box-shadow: 0 0 30px rgba(155, 81, 224, 0.6);
        color: white;
    }

    /* Glass Cards */
    .glass-card {
        background: var(--st-bg-glass);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 16px;
        transition: all 0.3s ease;
    }
    .glass-card:hover {
        border-color: rgba(0, 210, 255, 0.3);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5), inset 0 0 15px rgba(155, 81, 224, 0.1);
        transform: translateY(-5px);
    }

    /* Hero Background Code Animation Removed */

    /* Navbar */
    .navbar-st {
        background: rgba(3, 0, 20, 0.8) !important;
        backdrop-filter: blur(15px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
    .nav-link-st {
        color: var(--st-text-muted) !important;
        font-weight: 500;
        transition: 0.3s;
    }
    .nav-link-st:hover {
        color: var(--st-primary) !important;
        text-shadow: var(--st-glow);
    }

    /* Services Expanding Panels equivalent (Grid) */
    .service-panel {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        height: 250px;
        display: flex;
        align-items: flex-end;
        border: 1px solid rgba(255,255,255,0.1);
        transition: 0.4s;
    }
    .service-panel::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to top, rgba(3,0,20,1) 0%, rgba(3,0,20,0.2) 100%);
        z-index: 1;
    }
    .service-panel:hover {
        border-color: var(--st-primary);
        box-shadow: 0 0 25px rgba(0, 210, 255, 0.2);
    }
    .service-panel-content {
        position: relative;
        z-index: 2;
        padding: 2rem;
        width: 100%;
    }
    
    .floating-icon {
        animation: floatIcon 4s ease-in-out infinite;
    }
    @keyframes floatIcon {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    @media (max-width: 991px) {
        .navbar-st .navbar-collapse {
            background: rgba(3, 0, 20, 0.95);
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .display-3 {
            font-size: 2.5rem;
        }
    }
    .max-w-2xl {
        max-width: 600px;
    }
</style>

<!-- Engineering Header -->
<nav class="navbar navbar-expand-lg fixed-top navbar-st py-3 px-4">
    <div class="container">
        <a class="navbar-brand fw-extrabold fs-4 text-white" href="#">
            <i class="fa-solid fa-code" style="color: var(--st-primary);"></i> <span class="ms-1">{{ $portfolio->full_name }}</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="fa-solid fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto gap-3">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a href="#{{ $sec->key }}" class="nav-link nav-link-st text-uppercase">{{ $sec->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section id="hero" class="min-vh-100 d-flex align-items-center position-relative" style="padding-top: 100px;">
    <!-- Background Code Animation Removed -->
    
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right">
                <div class="d-inline-block px-3 py-1 mb-4 rounded-pill" style="border: 1px solid rgba(155, 81, 224, 0.5); background: rgba(155, 81, 224, 0.1);">
                    <span class="text-white small fw-semibold"><span style="color: var(--st-primary);">●</span> Elite Core Engineering</span>
                </div>
                <h1 class="display-3 fw-extrabold text-white mb-3">
                    Engineering the <br>
                    <span class="text-gradient">Future.</span>
                </h1>
                <p class="lead mb-4" style="color: var(--st-text-muted); max-width: 600px;">
                    We transform complex challenges into robust physical infrastructure and mechanical systems. {{ $portfolio->short_bio }}
                </p>
                <div class="d-flex gap-3">
                    <a href="#contact" class="btn btn-glow rounded-pill px-4 py-3 fw-bold">
                        <i class="fa-solid fa-rocket me-2"></i> Start a Project
                    </a>
                    <a href="#services" class="btn btn-outline-light rounded-pill px-4 py-3 fw-bold" style="border-color: rgba(255,255,255,0.2);">
                        Explore Services
                    </a>
                </div>
            </div>
            
            <div class="col-lg-5" data-aos="fade-left">
                <div class="position-relative text-center">
                    <div class="position-absolute top-50 start-50 translate-middle w-100 h-100 rounded-circle" style="background: var(--st-grad); filter: blur(60px); opacity: 0.25; z-index: 0;"></div>
                    <img src="{{ $portfolio->cover_image ?? 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800&auto=format&fit=crop' }}" class="img-fluid rounded-4 position-relative z-1 glass-card p-1" style="max-height: 500px; object-fit: cover;" alt="Core Engineering">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Strip -->
<section class="py-4" style="background: rgba(255,255,255,0.02); border-bottom: 1px solid rgba(255,255,255,0.05);">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <h3 class="text-white fw-extrabold mb-0">{{ $portfolio->years_of_experience }}+ YRS</h3>
                <p class="small mb-0 text-uppercase" style="color: var(--st-primary); letter-spacing: 2px;">Experience</p>
            </div>
            <div class="col-md-4">
                <h3 class="text-white fw-extrabold mb-0">{{ $portfolio->completed_projects }}</h3>
                <p class="small mb-0 text-uppercase" style="color: var(--st-secondary); letter-spacing: 2px;">Completed Projects</p>
            </div>
            <div class="col-md-4">
                <h3 class="text-white fw-extrabold mb-0">{{ $portfolio->happy_clients }}</h3>
                <p class="small mb-0 text-uppercase" style="color: #ff007f; letter-spacing: 2px;">Happy Clients</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="position-relative">
                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4" style="background: var(--st-grad); filter: blur(20px); opacity: 0.3; transform: scale(0.95);"></div>
                    <img src="{{ $portfolio->cover_image }}" class="img-fluid rounded-4 position-relative z-1" alt="Profile" style="width: 100%; object-fit: cover; max-height: 500px; border: 1px solid rgba(255,255,255,0.1);">
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <h6 class="text-uppercase fw-bold" style="color: var(--st-secondary); letter-spacing: 2px;">About Me</h6>
                <h2 class="fw-extrabold text-white mb-4 display-6">Architecting <span class="text-gradient">Digital Solutions</span></h2>
                <p class="leading-relaxed mb-4" style="color: var(--st-text-muted); font-size: 1.1rem;">{{ $portfolio->about_me }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Education & Experience (Process Tree) -->
<section id="education" class="py-5">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--st-primary); letter-spacing: 2px;">My Journey</h6>
            <h2 class="fw-extrabold text-white display-6">From <span class="text-gradient">Learning</span> to <span class="text-gradient">Leading</span></h2>
        </div>
        
        <div class="row g-5">
            <div class="col-md-6" data-aos="fade-right">
                <h4 class="text-white mb-4 fw-bold"><i class="fa-solid fa-graduation-cap me-2 text-gradient"></i> Education</h4>
                @foreach($educations as $edu)
                    <div class="glass-card p-4 mb-4 position-relative border-start border-4" style="border-left-color: var(--st-primary) !important;">
                        <h5 class="fw-bold text-white mb-1">{{ $edu->degree }}</h5>
                        <h6 class="mb-2" style="color: var(--st-text-muted);">{{ $edu->institute }}</h6>
                        <span class="badge rounded-pill mb-2" style="background: rgba(0, 210, 255, 0.1); color: var(--st-primary); border: 1px solid rgba(0,210,255,0.2);">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</span>
                        @if($edu->description)
                            <p class="small mb-0" style="color: var(--st-text-muted);">{{ $edu->description }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <h4 class="text-white mb-4 fw-bold"><i class="fa-solid fa-briefcase me-2 text-gradient"></i> Experience</h4>
                @foreach($experiences as $exp)
                    <div class="glass-card p-4 mb-4 position-relative border-start border-4" style="border-left-color: var(--st-secondary) !important;">
                        <h5 class="fw-bold text-white mb-1">{{ $exp->designation }}</h5>
                        <h6 class="mb-2" style="color: var(--st-text-muted);">{{ $exp->company }}</h6>
                        <span class="badge rounded-pill mb-2" style="background: rgba(155, 81, 224, 0.1); color: var(--st-secondary); border: 1px solid rgba(155,81,224,0.2);">{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                        <p class="small mb-0" style="color: var(--st-text-muted);">{{ $exp->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5" style="background: rgba(255,255,255,0.02);">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--st-primary); letter-spacing: 2px;">Capabilities</h6>
            <h2 class="fw-extrabold text-white display-6">Technical <span class="text-gradient">Arsenal</span></h2>
        </div>
        <div class="row g-4">
            @foreach($skillCategories as $cat)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="glass-card p-5 h-100">
                        <h4 class="fw-bold text-white mb-4 border-bottom border-secondary pb-3" style="border-color: rgba(255,255,255,0.1) !important;">{{ $cat->name }}</h4>
                        @foreach($cat->skills as $skill)
                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="fw-semibold text-white">{{ $skill->name }}</span>
                                    <span class="fw-bold" style="color: var(--st-primary);">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="progress rounded-pill bg-dark" style="height: 8px;">
                                    <div class="progress-bar" style="width: {{ $skill->proficiency }}%; background: var(--st-grad); box-shadow: var(--st-glow);"></div>
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
<section id="services" class="py-5">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--st-secondary); letter-spacing: 2px;">What We Do</h6>
            <h2 class="fw-extrabold text-white display-6">Core <span class="text-gradient">Services</span></h2>
        </div>
        <div class="row g-4">
            @forelse($services as $svc)
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-panel glass-card">
                        <div class="service-panel-content">
                            <i class="{{ $svc->icon ?? 'fa-solid fa-tools' }} fa-2x mb-3" style="color: var(--st-primary);"></i>
                            <h4 class="fw-bold text-white mb-2">{{ $svc->title }}</h4>
                            <p class="small mb-0" style="color: var(--st-text-muted);">{{ $svc->short_description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-panel glass-card">
                        <div class="service-panel-content">
                            <i class="fa-solid fa-building fa-2x mb-3" style="color: var(--st-primary);"></i>
                            <h4 class="fw-bold text-white mb-2">Civil Engineering</h4>
                            <p class="small mb-0" style="color: var(--st-text-muted);">Structural design, analysis, and construction management for sustainable infrastructure.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-panel glass-card">
                        <div class="service-panel-content">
                            <i class="fa-solid fa-cogs fa-2x mb-3" style="color: var(--st-secondary);"></i>
                            <h4 class="fw-bold text-white mb-2">Mechanical Engineering</h4>
                            <p class="small mb-0" style="color: var(--st-text-muted);">Machine design, HVAC systems, and dynamic mechanical solutions for industrial applications.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="service-panel glass-card">
                        <div class="service-panel-content">
                            <i class="fa-solid fa-bolt fa-2x mb-3" style="color: #ff007f;"></i>
                            <h4 class="fw-bold text-white mb-2">Electrical Engineering</h4>
                            <p class="small mb-0" style="color: var(--st-text-muted);">Power generation, transmission grids, and advanced electrical system design.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Projects -->
<section id="projects" class="py-5" style="background: rgba(255,255,255,0.02);">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--st-primary); letter-spacing: 2px;">Portfolio</h6>
            <h2 class="fw-extrabold text-white display-6">Featured <span class="text-gradient">Deployments</span></h2>
        </div>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="glass-card overflow-hidden h-100 d-flex flex-column group">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ $proj->cover_image }}" class="w-100 transition-all" style="height: 220px; object-fit: cover; transition: transform 0.5s;" alt="{{ $proj->title }}" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge rounded-pill px-3 py-2" style="background: rgba(3,0,20,0.8); border: 1px solid rgba(255,255,255,0.1); color: var(--st-primary);">{{ $proj->category->name ?? 'Project' }}</span>
                            </div>
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <h4 class="fw-bold text-white mb-2">{{ $proj->title }}</h4>
                            <p class="small flex-grow-1" style="color: var(--st-text-muted);">{{ $proj->short_description }}</p>
                            @if($proj->live_url || $proj->github_url)
                                <div class="d-flex gap-2 mt-3 pt-3 border-top" style="border-color: rgba(255,255,255,0.1) !important;">
                                    @if($proj->live_url)
                                        <a href="{{ $proj->live_url }}" target="_blank" class="btn btn-sm btn-glow rounded-pill px-3">Live Demo</a>
                                    @endif
                                    @if($proj->github_url)
                                        <a href="{{ $proj->github_url }}" target="_blank" class="btn btn-sm btn-outline-light rounded-pill px-3" style="border-color: rgba(255,255,255,0.2);">Source <i class="fa-brands fa-github ms-1"></i></a>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Certificates Section -->
<section id="certificates" class="py-5">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--st-secondary); letter-spacing: 2px;">Credentials</h6>
            <h2 class="fw-extrabold text-white display-6">Verified <span class="text-gradient">Certifications</span></h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($certificates as $cert)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="glass-card p-4 h-100 text-center hover-border-info transition-all position-relative overflow-hidden">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: radial-gradient(circle at center, rgba(155, 81, 224, 0.1) 0%, transparent 70%); pointer-events: none;"></div>
                        <i class="fa-solid fa-certificate fa-3x mb-3 floating-icon" style="color: var(--st-primary);"></i>
                        <h5 class="fw-bold text-white mb-2">{{ $cert->title }}</h5>
                        <h6 class="mb-2" style="color: var(--st-text-muted);">{{ $cert->issuer }}</h6>
                        <span class="badge rounded-pill mb-3" style="background: rgba(0, 210, 255, 0.1); border: 1px solid rgba(0, 210, 255, 0.2); color: var(--st-primary);">{{ $cert->issue_date }}</span>
                        @if($cert->verification_url)
                            <div class="mt-2">
                                <a href="{{ $cert->verification_url }}" target="_blank" class="btn btn-sm btn-outline-light rounded-pill" style="border-color: rgba(255,255,255,0.2);">Verify <i class="fa-solid fa-arrow-up-right-from-square ms-1" style="font-size: 0.8em;"></i></a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" class="py-5" style="background: rgba(255,255,255,0.02);">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: var(--st-primary); letter-spacing: 2px;">Engineering Log</h6>
            <h2 class="fw-extrabold text-white display-6">Latest <span class="text-gradient">Articles</span></h2>
        </div>
        <div class="row g-4">
            @foreach($recentBlogs as $blog)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="glass-card overflow-hidden h-100 d-flex flex-column group">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ $blog->cover_image }}" class="w-100 transition-all" style="height: 200px; object-fit: cover; transition: transform 0.5s;" alt="{{ $blog->title }}" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="small fw-bold mb-2" style="color: var(--st-secondary);">{{ $blog->created_at->format('M d, Y') }}</span>
                            <h5 class="fw-bold text-white mb-3">{{ Str::limit($blog->title, 50) }}</h5>
                            <p class="small flex-grow-1" style="color: var(--st-text-muted);">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                            <a href="#" class="text-decoration-none fw-bold mt-3" style="color: var(--st-primary);">Read Post <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5 position-relative">
    <div class="container py-5 position-relative z-2">
        <div class="glass-card p-4 p-md-5 max-w-2xl mx-auto" data-aos="zoom-in">
            <div class="text-center mb-5">
                <i class="fa-solid fa-paper-plane fa-3x mb-3 text-gradient"></i>
                <h2 class="fw-extrabold text-white">Start a <span class="text-gradient">Project</span></h2>
                <p style="color: var(--st-text-muted);">Ready to build something amazing? Let's talk.</p>
            </div>
            
            <form id="ajaxContactForm">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control px-4 py-3 text-white" placeholder="Your Name" required style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px;">
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control px-4 py-3 text-white" placeholder="Your Email" required style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px;">
                    </div>
                    <div class="col-12">
                        <textarea name="message" class="form-control px-4 py-3 text-white" rows="5" placeholder="Tell us about your project..." required style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px;"></textarea>
                    </div>
                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-glow rounded-pill px-5 py-3 fw-bold fs-5 w-100">
                            Send Message <i class="fa-solid fa-arrow-right ms-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
