@extends('frontend.layouts.app')

@section('content')
<!-- Photographer Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-black py-3 px-4 border-bottom border-secondary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-extrabold fs-4 tracking-widest text-uppercase text-white" href="#">
            <i class="fa-solid fa-camera-retro me-2"></i> {{ $portfolio->full_name }}
        </a>
        <button class="navbar-toggler border-secondary rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#navPhoto">
            <i class="fa-solid fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navPhoto">
            <ul class="navbar-nav ms-auto gap-3 text-uppercase tracking-wider small">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a href="#{{ $sec->key }}" class="nav-link text-white-50 hover-white" style="transition: 0.3s;" onmouseover="this.classList.add('text-white');this.classList.remove('text-white-50');" onmouseout="this.classList.add('text-white-50');this.classList.remove('text-white');">{{ $sec->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="hero" class="min-vh-100 d-flex align-items-center bg-black text-white pt-5" style="background-image: url('{{ $portfolio->cover_image }}'); background-size: cover; background-position: center; background-blend-mode: overlay; background-color: rgba(0,0,0,0.7);">
    <div class="container text-center pt-5" data-aos="fade-up">
        <h1 class="display-1 fw-extrabold tracking-widest text-uppercase mb-3">{{ $portfolio->full_name }}</h1>
        <p class="lead text-light tracking-wider text-uppercase mb-5">{{ $portfolio->profession }} & Visual Artist</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#gallery" class="btn btn-outline-light rounded-0 px-5 py-3 text-uppercase fw-bold border-2">Explore Gallery</a>
            <a href="#contact" class="btn btn-light rounded-0 px-5 py-3 text-uppercase fw-bold text-dark">Book Session</a>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <img src="{{ $portfolio->profile_photo }}" class="img-fluid border border-secondary p-1" style="width: 100%; object-fit: cover; max-height: 500px; filter: grayscale(100%);" alt="Profile">
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <h6 class="text-uppercase tracking-widest text-secondary mb-2">Behind The Lens</h6>
                <h2 class="fw-extrabold display-5 mb-4 text-uppercase">About Me</h2>
                <p class="text-light leading-relaxed mb-4" style="font-weight: 300;">{{ $portfolio->about_me }}</p>
                <div class="d-flex flex-wrap gap-4 mt-4">
                    <div class="border border-secondary p-4 text-center" style="min-width: 120px;">
                        <h3 class="fw-light mb-0">{{ $portfolio->years_of_experience }}+</h3>
                        <small class="text-uppercase tracking-widest text-secondary" style="font-size: 10px;">Years</small>
                    </div>
                    <div class="border border-secondary p-4 text-center" style="min-width: 120px;">
                        <h3 class="fw-light mb-0">{{ $portfolio->completed_projects }}</h3>
                        <small class="text-uppercase tracking-widest text-secondary" style="font-size: 10px;">Shoots</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-5 bg-black text-white border-top border-secondary">
    <div class="container py-5">
        <h2 class="fw-extrabold text-uppercase tracking-widest text-center mb-5">Education / Training</h2>
        <div class="row g-4 justify-content-center">
            @foreach($educations as $edu)
                <div class="col-md-5" data-aos="fade-up">
                    <div class="border border-secondary p-4 h-100 text-center hover-border-light transition-all">
                        <h5 class="fw-bold text-uppercase mb-2">{{ $edu->degree }}</h5>
                        <h6 class="text-secondary fw-light text-uppercase tracking-wider mb-3">{{ $edu->institute }}</h6>
                        <span class="badge border border-secondary text-light px-3 py-2 rounded-0 mb-3">{{ $edu->start_year }} - {{ $edu->end_year ?? 'PRESENT' }}</span>
                        @if($edu->description)
                            <p class="text-secondary small fw-light mb-0">{{ $edu->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5 bg-dark text-white border-top border-secondary">
    <div class="container py-5">
        <h2 class="fw-extrabold text-uppercase tracking-widest text-center mb-5">Experience</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @foreach($experiences as $exp)
                    <div class="mb-5 pb-5 border-bottom border-secondary text-center" data-aos="fade-up">
                        <h4 class="fw-bold text-uppercase mb-1">{{ $exp->designation }}</h4>
                        <h6 class="text-secondary tracking-widest text-uppercase mb-3">{{ $exp->company }} | {{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</h6>
                        <p class="text-light fw-light max-w-2xl mx-auto">{{ $exp->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5 bg-black text-white border-top border-secondary">
    <div class="container py-5">
        <h2 class="fw-extrabold text-uppercase tracking-widest text-center mb-5">Equipment & Skills</h2>
        <div class="row g-4">
            @foreach($skillCategories as $cat)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="p-4 border border-secondary h-100">
                        <h5 class="fw-bold text-uppercase tracking-wider mb-4 border-bottom border-secondary pb-3">{{ $cat->name }}</h5>
                        @foreach($cat->skills as $skill)
                            <div class="mb-4">
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="text-uppercase tracking-wider small">{{ $skill->name }}</span>
                                </div>
                                <div class="progress rounded-0 bg-dark" style="height: 2px;">
                                    <div class="progress-bar bg-light" style="width: {{ $skill->proficiency }}%;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Masonry Gallery (Projects / Gallery Items) -->
<section id="gallery" class="py-5 bg-dark border-top border-secondary">
    <div class="container py-5">
        <h2 class="fw-extrabold text-uppercase tracking-widest text-center mb-5 text-white">Selected Works</h2>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-6 col-lg-4" data-aos="zoom-in">
                    <div class="position-relative overflow-hidden group">
                        <img src="{{ $proj->cover_image }}" class="w-100 rounded-0" style="height: 320px; object-fit: cover; filter: grayscale(50%); transition: 0.5s;" onmouseover="this.style.filter='grayscale(0%)'" onmouseout="this.style.filter='grayscale(50%)'" alt="{{ $proj->title }}">
                        <div class="p-3 text-white text-center bg-black border-top border-secondary">
                            <h6 class="fw-bold text-uppercase tracking-wider mb-1">{{ $proj->title }}</h6>
                            <small class="text-secondary text-uppercase" style="font-size: 10px;">{{ $proj->category->name ?? 'Photography' }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5 bg-black text-white border-top border-secondary">
    <div class="container py-5">
        <h2 class="fw-extrabold text-uppercase tracking-widest text-center mb-5">Services & Packages</h2>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="p-5 border border-secondary text-center h-100 hover-border-light transition-all">
                        <h4 class="fw-bold text-uppercase tracking-wider mb-3">{{ $svc->title }}</h4>
                        <p class="text-secondary fw-light small mb-4">{{ $svc->short_description }}</p>
                        <span class="text-white fw-bold tracking-widest text-uppercase border-bottom border-light pb-1">{{ $svc->price ?? 'Custom Quote' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Booking -->
<section id="contact" class="py-5 bg-dark border-top border-secondary">
    <div class="container py-5">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="fw-extrabold text-white text-uppercase tracking-wider mb-4">Book a Shoot</h2>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-4">
                    <input type="text" name="name" class="form-control bg-black text-white border-secondary rounded-0 py-3 text-center text-uppercase tracking-wider" placeholder="YOUR NAME" required>
                </div>
                <div class="mb-4">
                    <input type="email" name="email" class="form-control bg-black text-white border-secondary rounded-0 py-3 text-center text-uppercase tracking-wider" placeholder="YOUR EMAIL" required>
                </div>
                <div class="mb-4">
                    <textarea name="message" class="form-control bg-black text-white border-secondary rounded-0 py-3 text-center text-uppercase tracking-wider" rows="4" placeholder="EVENT / SHOOT DETAILS" required></textarea>
                </div>
                <button type="submit" class="btn btn-outline-light rounded-0 w-100 py-3 text-uppercase fw-bold tracking-widest">Send Booking Inquiry</button>
            </form>
        </div>
    </div>
</section>
@endsection
