@extends('frontend.layouts.app')

@section('content')
<!-- Designer Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-white py-3 px-4 shadow-sm border-bottom">
    <div class="container">
        <a class="navbar-brand fw-extrabold fs-4" href="#" style="letter-spacing: -1px; color: #18181b;">
            <i class="fa-solid fa-pen-nib me-2"></i> {{ $portfolio->full_name }}
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navDesign">
            <i class="fa-solid fa-bars text-dark"></i>
        </button>
        <div class="collapse navbar-collapse" id="navDesign">
            <ul class="navbar-nav ms-auto gap-4 fw-bold text-uppercase small" style="letter-spacing: 1px;">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a href="#{{ $sec->key }}" class="nav-link text-secondary" style="transition: 0.3s;" onmouseover="this.classList.add('text-dark');this.classList.remove('text-secondary');" onmouseout="this.classList.add('text-secondary');this.classList.remove('text-dark');">{{ $sec->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="hero" class="min-vh-100 d-flex align-items-center bg-light text-dark pt-5">
    <div class="container pt-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-8" data-aos="fade-up">
                <span class="text-secondary fw-bold text-uppercase tracking-wider d-block mb-3 px-3 py-2 bg-white border d-inline-block rounded-pill">{{ $portfolio->profession }}</span>
                <h1 class="display-2 fw-extrabold mb-4" style="letter-spacing: -2px; color: #18181b;">{{ $portfolio->full_name }}</h1>
                <p class="fs-4 text-secondary leading-relaxed mb-5" style="max-width: 680px; font-weight: 300;">{{ $portfolio->short_bio }}</p>
                <div class="d-flex gap-4 align-items-center">
                    <a href="#projects" class="btn btn-dark rounded-pill px-5 py-3 fw-bold shadow">View Selected Work</a>
                    <a href="#contact" class="text-dark fw-bold text-decoration-none border-bottom border-dark border-2 pb-1">Get in Touch &rarr;</a>
                </div>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ $portfolio->profile_photo }}" class="img-fluid rounded-4 shadow-lg w-100" style="object-fit: cover; max-height: 500px;" alt="">
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-white">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4" data-aos="fade-right">
                <h2 class="display-6 fw-extrabold" style="letter-spacing: -1px;">About <br>The Designer</h2>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <p class="fs-5 text-secondary leading-relaxed mb-4">{{ $portfolio->about_me }}</p>
                <div class="row g-4 mt-2">
                    <div class="col-sm-4">
                        <div class="p-4 bg-light rounded-4 text-center border">
                            <h2 class="fw-extrabold mb-0">{{ $portfolio->years_of_experience }}+</h2>
                            <small class="text-uppercase fw-bold text-secondary tracking-wider" style="font-size: 10px;">Years Experience</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="p-4 bg-light rounded-4 text-center border">
                            <h2 class="fw-extrabold mb-0">{{ $portfolio->completed_projects }}</h2>
                            <small class="text-uppercase fw-bold text-secondary tracking-wider" style="font-size: 10px;">Projects Delivered</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="p-4 bg-light rounded-4 text-center border">
                            <h2 class="fw-extrabold mb-0">{{ $portfolio->awards_count }}</h2>
                            <small class="text-uppercase fw-bold text-secondary tracking-wider" style="font-size: 10px;">Design Awards</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-5 bg-light">
    <div class="container py-5">
        <h2 class="display-6 fw-extrabold mb-5 text-center" style="letter-spacing: -1px;">Education</h2>
        <div class="row g-4">
            @foreach($educations as $edu)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-white p-5 rounded-4 shadow-sm h-100 border">
                        <span class="badge bg-dark text-white px-3 py-2 rounded-pill mb-3">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</span>
                        <h4 class="fw-extrabold mb-2">{{ $edu->degree }}</h4>
                        <h6 class="text-secondary fw-bold mb-3">{{ $edu->institute }}</h6>
                        <p class="text-muted small mb-0">{{ $edu->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5 bg-white">
    <div class="container py-5">
        <h2 class="display-6 fw-extrabold mb-5 text-center" style="letter-spacing: -1px;">Experience</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach($experiences as $exp)
                    <div class="p-4 p-md-5 bg-light rounded-4 mb-4 border" data-aos="fade-up">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start mb-3">
                            <div>
                                <h4 class="fw-extrabold mb-1">{{ $exp->designation }}</h4>
                                <h6 class="text-secondary fw-bold">{{ $exp->company }}</h6>
                            </div>
                            <span class="badge bg-white text-dark border px-3 py-2 rounded-pill mt-2 mt-md-0">{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                        </div>
                        <p class="text-secondary mb-0">{{ $exp->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5 bg-light">
    <div class="container py-5">
        <h2 class="display-6 fw-extrabold mb-5 text-center" style="letter-spacing: -1px;">Expertise & Tools</h2>
        <div class="row g-4">
            @foreach($skillCategories as $cat)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-white p-5 rounded-4 border h-100">
                        <h5 class="fw-extrabold mb-4 pb-3 border-bottom">{{ $cat->name }}</h5>
                        @foreach($cat->skills as $skill)
                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="fw-bold text-dark small">{{ $skill->name }}</span>
                                    <span class="fw-bold text-secondary small">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="progress rounded-pill bg-light border" style="height: 10px;">
                                    <div class="progress-bar bg-dark rounded-pill" style="width: {{ $skill->proficiency }}%;"></div>
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
<section id="services" class="py-5 bg-white">
    <div class="container py-5">
        <h2 class="display-6 fw-extrabold mb-5 text-center" style="letter-spacing: -1px;">Design Services</h2>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="p-5 bg-light rounded-4 border h-100">
                        <i class="{{ $svc->icon ?? 'fa-solid fa-bezier-curve' }} fa-2x text-dark mb-4"></i>
                        <h4 class="fw-extrabold mb-3">{{ $svc->title }}</h4>
                        <p class="text-secondary small">{{ $svc->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Selected Work -->
<section id="projects" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <h2 class="display-6 fw-extrabold mb-5 text-center" style="letter-spacing: -1px;">Selected Case Studies</h2>
        <div class="row g-5">
            @foreach($projects as $proj)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-white text-dark p-4 rounded-4">
                        <img src="{{ $proj->cover_image }}" class="w-100 rounded-3 mb-4 shadow-sm" style="height: 300px; object-fit: cover;" alt="">
                        <h4 class="fw-extrabold mb-2">{{ $proj->title }}</h4>
                        <p class="text-secondary small mb-4">{{ $proj->short_description }}</p>
                        <a href="{{ $proj->live_url ?? '#' }}" class="btn btn-outline-dark rounded-pill px-4 fw-bold text-uppercase" style="font-size: 12px; letter-spacing: 1px;">View Case Study</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Minimal Contact -->
<section id="contact" class="py-5 bg-white">
    <div class="container py-5">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="display-4 fw-extrabold mb-4" style="letter-spacing: -1px;">Let's create something minimal & meaningful.</h2>
            <p class="text-secondary mb-5">Have a project in mind? Reach out below.</p>
            <form id="ajaxContactForm" class="text-start">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase tracking-wider">Your Name</label>
                    <input type="text" name="name" class="form-control border-0 border-bottom border-2 rounded-0 px-0 fs-5 py-2 bg-transparent" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase tracking-wider">Your Email</label>
                    <input type="email" name="email" class="form-control border-0 border-bottom border-2 rounded-0 px-0 fs-5 py-2 bg-transparent" required>
                </div>
                <div class="mb-5">
                    <label class="form-label fw-bold small text-uppercase tracking-wider">Your Project Details</label>
                    <textarea name="message" class="form-control border-0 border-bottom border-2 rounded-0 px-0 fs-5 py-2 bg-transparent" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark rounded-pill px-5 py-3 fw-bold text-uppercase shadow w-100" style="letter-spacing: 1px;">Send Inquiry</button>
            </form>
        </div>
    </div>
</section>
@endsection
