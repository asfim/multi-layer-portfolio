@extends('frontend.layouts.app')

@section('content')
<!-- Medical Header -->
<header class="bg-white border-bottom py-3 fixed-top shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-extrabold fs-4 text-teal" href="#" style="color: #0d9488;">
            <i class="fa-solid fa-user-doctor me-2"></i> Dr. {{ $portfolio->full_name }}
        </a>
        <button class="navbar-toggler d-lg-none border-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="fa-solid fa-bars fs-4 text-dark"></i>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end gap-4" id="navMenu">
            <div class="d-flex flex-column flex-lg-row gap-3 mt-3 mt-lg-0 align-items-lg-center">
                @foreach($sections as $sec)
                    <a href="#{{ $sec->key }}" class="text-decoration-none text-secondary fw-semibold" style="transition: 0.3s;" onmouseover="this.style.color='#0d9488'" onmouseout="this.style.color=''">{{ $sec->name }}</a>
                @endforeach
                <a href="#contact" class="btn text-white fw-bold px-4 rounded-pill mt-2 mt-lg-0" style="background: #0d9488;">
                    <i class="fa-solid fa-calendar-check me-2"></i> Book Appointment
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Hero Section -->
<section id="hero" class="min-vh-100 d-flex align-items-center pt-5" style="background: linear-gradient(135deg, #f0fdf4 0%, #ccfbf1 100%); color: #0f172a;">
    <div class="container pt-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="badge bg-white text-teal px-3 py-2 rounded-pill shadow-sm mb-3 font-semibold" style="color: #0d9488;">
                    <i class="fa-solid fa-stethoscope me-1"></i> {{ $portfolio->profession ?? 'Medical Specialist' }}
                </span>
                <h1 class="display-4 fw-extrabold text-dark mb-3">
                    Compassionate Care, <br><span style="color: #0d9488;">Advanced Medicine.</span>
                </h1>
                <p class="lead text-secondary mb-4">{{ $portfolio->short_bio }}</p>
                <div class="d-flex gap-3">
                    <a href="#contact" class="btn text-white btn-lg rounded-pill px-4" style="background: #0d9488;">Book Consultation</a>
                    <a href="#services" class="btn btn-outline-dark btn-lg rounded-pill px-4">Medical Services</a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <img src="{{ $portfolio->profile_photo }}" class="img-fluid rounded-4 shadow-lg w-100" style="max-height: 480px; object-fit: cover;" alt="{{ $portfolio->full_name }}">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <img src="{{ $portfolio->cover_image }}" class="img-fluid rounded-4 shadow w-100" alt="About Doctor" style="object-fit: cover; max-height: 400px;">
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <h6 class="text-uppercase fw-bold" style="color: #0d9488;">Doctor Profile</h6>
                <h2 class="fw-extrabold text-dark mb-4">About Me</h2>
                <p class="text-secondary leading-relaxed mb-4">{{ $portfolio->about_me }}</p>
                <div class="row g-4">
                    <div class="col-6 col-md-4">
                        <div class="p-3 bg-light rounded-3 text-center border">
                            <h3 class="fw-bold mb-0" style="color: #0d9488;">{{ $portfolio->years_of_experience }}+</h3>
                            <small class="text-muted">Years Experience</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="p-3 bg-light rounded-3 text-center border">
                            <h3 class="fw-bold mb-0" style="color: #0d9488;">{{ $portfolio->happy_clients }}+</h3>
                            <small class="text-muted">Happy Patients</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-5" style="background: #f8fafc;">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: #0d9488;">Academic Background</h6>
            <h2 class="fw-extrabold text-dark">Medical Education</h2>
        </div>
        <div class="row g-4">
            @foreach($educations as $edu)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="p-4 bg-white rounded-4 shadow-sm border-start border-4 h-100" style="border-left-color: #0d9488 !important;">
                        <h5 class="fw-bold text-dark">{{ $edu->degree }}</h5>
                        <h6 class="text-secondary mb-2">{{ $edu->institute }}</h6>
                        <p class="text-muted small mb-2">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</p>
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
<section id="experience" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: #0d9488;">Professional Journey</h6>
            <h2 class="fw-extrabold text-dark">Clinical Experience</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8">
                @foreach($experiences as $exp)
                    <div class="d-flex mb-4" data-aos="fade-up">
                        <div class="flex-shrink-0">
                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px; background: #0d9488;">
                                <i class="fa-solid fa-briefcase medical"></i>
                            </div>
                        </div>
                        <div class="ms-4 pb-4 border-bottom w-100">
                            <h5 class="fw-bold text-dark mb-1">{{ $exp->designation }}</h5>
                            <h6 class="text-secondary">{{ $exp->company }}</h6>
                            <span class="badge bg-light text-dark border mb-2">{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                            <p class="text-muted small mb-0">{{ $exp->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5" style="background: #f0fdf4;">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: #0d9488;">Specialties</h6>
            <h2 class="fw-extrabold text-dark">Medical Skills</h2>
        </div>
        <div class="row g-4">
            @foreach($skillCategories as $cat)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="p-4 bg-white rounded-4 shadow-sm h-100 border">
                        <h5 class="fw-bold mb-4" style="color: #0d9488;">{{ $cat->name }}</h5>
                        @foreach($cat->skills as $skill)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-semibold text-dark small">{{ $skill->name }}</span>
                                    <span class="fw-bold small" style="color: #0d9488;">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="progress" style="height: 8px;">
                                    <div class="progress-bar" style="width: {{ $skill->proficiency }}%; background: #0d9488;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Medical Services -->
<section id="services" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: #0d9488;">Treatments & Services</h6>
            <h2 class="fw-extrabold text-dark">Clinical Expertise</h2>
        </div>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="p-4 rounded-4 border bg-light h-100 shadow-sm text-center">
                        <div class="p-3 rounded-circle text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background: #0d9488;">
                            <i class="{{ $svc->icon ?? 'fa-solid fa-heart-pulse' }} fa-2x"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-3">{{ $svc->title }}</h5>
                        <p class="text-secondary small mb-0">{{ $svc->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects / Publications -->
<section id="projects" class="py-5" style="background: #f8fafc;">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: #0d9488;">Research & Cases</h6>
            <h2 class="fw-extrabold text-dark">Medical Contributions</h2>
        </div>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="bg-white rounded-4 shadow-sm border overflow-hidden h-100">
                        <img src="{{ $proj->cover_image }}" class="w-100" style="height: 200px; object-fit: cover;" alt="{{ $proj->title }}">
                        <div class="p-4">
                            <span class="badge mb-2" style="background: #ccfbf1; color: #0d9488;">{{ $proj->category->name ?? 'Case Study' }}</span>
                            <h5 class="fw-bold text-dark mb-2">{{ $proj->title }}</h5>
                            <p class="text-secondary small">{{ $proj->short_description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Certificates Section -->
<section id="certificates" class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: #0d9488;">Credentials</h6>
            <h2 class="fw-extrabold text-dark">Medical Board Certifications</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($certificates as $cert)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="p-4 rounded-4 border bg-light h-100 shadow-sm text-center">
                        <i class="fa-solid fa-certificate fa-3x mb-3" style="color: #0d9488;"></i>
                        <h5 class="fw-bold text-dark mb-2">{{ $cert->title }}</h5>
                        <h6 class="text-secondary small mb-2">{{ $cert->issuer }}</h6>
                        <span class="badge bg-white text-dark border mb-3">{{ $cert->issue_date }}</span>
                        @if($cert->verification_url)
                            <div class="mt-2">
                                <a href="{{ $cert->verification_url }}" target="_blank" class="btn btn-sm btn-outline-dark rounded-pill">Verify Credential</a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" class="py-5" style="background: #f0fdf4;">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <h6 class="text-uppercase fw-bold" style="color: #0d9488;">Health Insights</h6>
            <h2 class="fw-extrabold text-dark">Medical Articles</h2>
        </div>
        <div class="row g-4">
            @foreach($recentBlogs as $blog)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="bg-white rounded-4 shadow-sm border overflow-hidden h-100 d-flex flex-column">
                        <img src="{{ $blog->cover_image }}" class="w-100" style="height: 200px; object-fit: cover;" alt="{{ $blog->title }}">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="small fw-bold mb-2" style="color: #0d9488;">{{ $blog->created_at->format('M d, Y') }}</span>
                            <h5 class="fw-bold text-dark mb-3">{{ Str::limit($blog->title, 50) }}</h5>
                            <p class="text-secondary small flex-grow-1">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                            <a href="#" class="text-decoration-none fw-bold mt-3" style="color: #0d9488;">Read Article <i class="fa-solid fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Contact & Appointment -->
<section id="contact" class="py-5 bg-white">
    <div class="container py-5">
        <div class="max-w-2xl mx-auto p-5 bg-light rounded-4 shadow border">
            <h3 class="fw-bold text-center mb-4 text-dark"><i class="fa-solid fa-calendar-days me-2" style="color: #0d9488;"></i> Schedule a Consultation</h3>
            <form id="ajaxContactForm">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-dark fw-semibold">Patient Name</label>
                        <input type="text" name="name" class="form-control bg-white" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-dark fw-semibold">Patient Email</label>
                        <input type="email" name="email" class="form-control bg-white" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-dark fw-semibold">Consultation Subject</label>
                        <input type="text" name="subject" class="form-control bg-white">
                    </div>
                    <div class="col-12">
                        <label class="form-label text-dark fw-semibold">Medical Symptoms / Message</label>
                        <textarea name="message" class="form-control bg-white" rows="4" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn text-white w-100 py-3 rounded-3 fw-bold" style="background: #0d9488;">
                            Submit Appointment Request
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
