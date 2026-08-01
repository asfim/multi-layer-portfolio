@extends('frontend.layouts.app')

@section('content')
<!-- Academic Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-white py-3 px-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-extrabold fs-4" href="#" style="color: #8b5cf6;">
            <i class="fa-solid fa-graduation-cap me-2"></i> {{ $portfolio->full_name }}
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navAcademic">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navAcademic">
            <ul class="navbar-nav ms-auto gap-3">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a href="#{{ $sec->key }}" class="nav-link fw-semibold text-dark hover-purple" style="transition: 0.3s;" onmouseover="this.style.color='#8b5cf6'" onmouseout="this.style.color=''">{{ $sec->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section id="hero" class="min-vh-100 d-flex align-items-center pt-5" style="background-color: #faf5ff;">
    <div class="container pt-5 text-center" data-aos="fade-up">
        <span class="badge text-white px-3 py-2 rounded-pill mb-3" style="background: #8b5cf6;">Academic & Researcher</span>
        <h1 class="display-3 fw-extrabold mb-3 text-dark">{{ $portfolio->full_name }}</h1>
        <p class="lead text-secondary max-w-2xl mx-auto mb-4">{{ $portfolio->short_bio }}</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#education" class="btn text-white rounded-pill px-4" style="background: #8b5cf6;">View Qualifications</a>
            <a href="#contact" class="btn btn-outline-dark rounded-pill px-4">Contact Researcher</a>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-white">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ $portfolio->profile_photo }}" class="img-fluid rounded-4 shadow" alt="Profile" style="width: 100%; object-fit: cover; max-height: 500px;">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h6 class="fw-bold text-uppercase mb-2" style="color: #8b5cf6;">Biography</h6>
                <h2 class="fw-extrabold text-dark mb-4">About Me</h2>
                <p class="text-secondary leading-relaxed mb-4">{{ $portfolio->about_me }}</p>
                <div class="d-flex flex-wrap gap-4 mt-4">
                    <div class="border rounded-3 p-3 text-center bg-light">
                        <h4 class="fw-bold mb-0" style="color: #8b5cf6;">{{ $portfolio->years_of_experience }}+</h4>
                        <small class="text-muted">Years Study</small>
                    </div>
                    <div class="border rounded-3 p-3 text-center bg-light">
                        <h4 class="fw-bold mb-0" style="color: #8b5cf6;">{{ $portfolio->completed_projects }}</h4>
                        <small class="text-muted">Publications</small>
                    </div>
                    <div class="border rounded-3 p-3 text-center bg-light">
                        <h4 class="fw-bold mb-0" style="color: #8b5cf6;">{{ $portfolio->awards_count }}</h4>
                        <small class="text-muted">Awards</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-5" style="background-color: #faf5ff;">
    <div class="container py-5">
        <h2 class="fw-extrabold text-center mb-5 text-dark">Education & Degrees</h2>
        <div class="row g-4">
            @foreach($educations as $edu)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-white p-4 h-100 rounded-4 shadow-sm border-start border-4" style="border-left-color: #8b5cf6 !important;">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="fw-bold mb-1 text-dark">{{ $edu->degree }}</h4>
                            <span class="badge text-white" style="background: #8b5cf6;">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</span>
                        </div>
                        <h6 class="mb-2" style="color: #8b5cf6;">{{ $edu->institute }}</h6>
                        <p class="text-muted small mb-2">{{ $edu->department }}</p>
                        <p class="text-dark fw-semibold mb-2">Result: {{ $edu->result }}</p>
                        @if($edu->description)
                            <p class="text-secondary small mb-0">{{ $edu->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5 bg-white">
    <div class="container py-5">
        <h2 class="fw-extrabold text-center mb-5 text-dark">Academic & Work Experience</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="timeline position-relative">
                    @foreach($experiences as $exp)
                        <div class="timeline-item mb-4 ps-4 position-relative border-start border-2" style="border-color: #e2e8f0 !important;" data-aos="fade-up">
                            <div class="position-absolute rounded-circle" style="width: 16px; height: 16px; background: #8b5cf6; left: -9px; top: 0;"></div>
                            <h5 class="fw-bold text-dark mb-1">{{ $exp->designation }}</h5>
                            <h6 class="text-secondary mb-2">{{ $exp->company }} | <small>{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</small></h6>
                            <p class="text-muted small">{{ $exp->description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5" style="background-color: #faf5ff;">
    <div class="container py-5">
        <h2 class="fw-extrabold text-center mb-5 text-dark">Research Skills & Tools</h2>
        <div class="row g-4">
            @foreach($skillCategories as $cat)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                        <h5 class="fw-bold mb-4" style="color: #8b5cf6;">{{ $cat->name }}</h5>
                        @foreach($cat->skills as $skill)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-dark fw-semibold small">{{ $skill->name }}</span>
                                    <span class="small" style="color: #8b5cf6;">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar" style="width: {{ $skill->proficiency }}%; background: #8b5cf6;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Services / Offerings Section -->
<section id="services" class="py-5 bg-white">
    <div class="container py-5">
        <h2 class="fw-extrabold text-center mb-5 text-dark">What I Offer</h2>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="bg-light p-4 rounded-4 text-center border h-100">
                        <i class="{{ $svc->icon ?? 'fa-solid fa-book' }} fa-2x mb-3" style="color: #8b5cf6;"></i>
                        <h5 class="fw-bold text-dark mb-3">{{ $svc->title }}</h5>
                        <p class="text-secondary small">{{ $svc->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects / Publications Section -->
<section id="projects" class="py-5" style="background-color: #faf5ff;">
    <div class="container py-5">
        <h2 class="fw-extrabold text-center mb-5 text-dark">Publications & Projects</h2>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="bg-white rounded-4 shadow-sm overflow-hidden h-100 border">
                        <img src="{{ $proj->cover_image }}" class="w-100" style="height: 180px; object-fit: cover;" alt="{{ $proj->title }}">
                        <div class="p-4">
                            <h5 class="fw-bold text-dark mb-2">{{ $proj->title }}</h5>
                            <p class="text-secondary small mb-3">{{ $proj->short_description }}</p>
                            @if($proj->live_url)
                                <a href="{{ $proj->live_url }}" target="_blank" class="btn btn-sm text-white rounded-pill" style="background: #8b5cf6;">View Paper / Link</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>
</section>

<!-- Certificates Section -->
<section id="certificates" class="py-5 bg-white">
    <div class="container py-5">
        <h2 class="fw-extrabold text-dark text-center mb-5">Certifications & Courses</h2>
        <div class="row g-4 justify-content-center">
            @foreach($certificates as $cert)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="bg-light p-4 rounded-4 h-100 shadow-sm border text-center">
                        <i class="fa-solid fa-certificate fa-3x mb-3" style="color: #8b5cf6;"></i>
                        <h5 class="fw-bold text-dark mb-2">{{ $cert->title }}</h5>
                        <h6 class="text-secondary small mb-2">{{ $cert->issuer }}</h6>
                        <span class="badge bg-white text-dark border mb-3">{{ $cert->issue_date }}</span>
                        @if($cert->verification_url)
                            <div class="mt-2">
                                <a href="{{ $cert->verification_url }}" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill">View Certificate</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" class="py-5" style="background: #ede9fe;">
    <div class="container py-5">
        <h2 class="fw-extrabold text-dark text-center mb-5">Student Blog & Notes</h2>
        <div class="row g-4">
            @foreach($recentBlogs as $blog)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="bg-white rounded-4 shadow-sm border overflow-hidden h-100 d-flex flex-column">
                        <img src="{{ $blog->cover_image }}" class="w-100" style="height: 180px; object-fit: cover;" alt="{{ $blog->title }}">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="small fw-bold mb-2" style="color: #8b5cf6;">{{ $blog->created_at->format('M d, Y') }}</span>
                            <h5 class="fw-bold text-dark mb-2">{{ Str::limit($blog->title, 45) }}</h5>
                            <p class="text-secondary small flex-grow-1">{{ Str::limit(strip_tags($blog->content), 90) }}</p>
                            <a href="#" class="text-decoration-none fw-bold mt-2" style="color: #8b5cf6;">Read More <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5 bg-white">
    <div class="container py-5">
        <div class="bg-light p-5 max-w-2xl mx-auto rounded-4 shadow border">
            <h3 class="fw-bold mb-4 text-center text-dark">Get in Touch</h3>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control bg-white" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control bg-white" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control bg-white" rows="4" placeholder="Message" required></textarea>
                </div>
                <button type="submit" class="btn text-white w-100 py-3 rounded-pill" style="background: #8b5cf6;">Send Message</button>
            </form>
        </div>
    </div>
</section>
@endsection
