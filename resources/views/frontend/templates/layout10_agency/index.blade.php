@extends('frontend.layouts.app')

@section('content')
<!-- Agency Navbar -->
<nav class="navbar navbar-expand-lg fixed-top glass-card py-3 px-4 mx-3 mt-3">
    <div class="container">
        <a class="navbar-brand fw-extrabold text-gradient fs-4" href="#">
            <i class="fa-solid fa-bolt me-2"></i> STUDIO / AGENCY
        </a>
        <div class="collapse navbar-collapse" id="navAgency">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item"><a href="#about" class="nav-link text-white-50">Studio</a></li>
                <li class="nav-item"><a href="#services" class="nav-link text-white-50">Capabilities</a></li>
                <li class="nav-item"><a href="#projects" class="nav-link text-white-50">Case Studies</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link text-white-50">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Agency Hero -->
<section class="min-vh-100 d-flex align-items-center pt-5">
    <div class="container pt-5 text-center" data-aos="fade-up">
        <span class="badge bg-indigo text-white px-4 py-2 rounded-pill mb-3" style="background: #6366f1;">PREMIUM DIGITAL STUDIO</span>
        <h1 class="display-1 fw-extrabold mb-3">
            We Engineer <span class="text-gradient">Digital Dominance.</span>
        </h1>
        <h3 class="fw-bold text-white mb-4">Led by {{ $portfolio->full_name }}</h3>
        <p class="lead text-secondary max-w-2xl mx-auto mb-5">{{ $portfolio->short_bio }}</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#projects" class="btn btn-custom-primary btn-lg px-5 py-3">Our Work</a>
            <a href="#contact" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3">Start Project</a>
        </div>
    </div>
</section>

<!-- Stats Matrix -->
<section class="py-5 bg-black">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="glass-card p-4">
                    <h2 class="fw-extrabold text-gradient display-5">{{ $portfolio->years_of_experience }}+</h2>
                    <span class="text-secondary small">Years Industry Leadership</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="glass-card p-4">
                    <h2 class="fw-extrabold text-gradient display-5">{{ $portfolio->completed_projects }}+</h2>
                    <span class="text-secondary small">Delivered Enterprise Projects</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="glass-card p-4">
                    <h2 class="fw-extrabold text-gradient display-5">{{ $portfolio->happy_clients }}+</h2>
                    <span class="text-secondary small">Global Corporate Clients</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="glass-card p-4">
                    <h2 class="fw-extrabold text-gradient display-5">{{ $portfolio->awards_count }}+</h2>
                    <span class="text-secondary small">International Awards</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Agency Services -->
<section id="services" class="py-5">
    <div class="container py-5">
        <h2 class="fw-extrabold text-center mb-5">Studio Capabilities</h2>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="glass-card p-4 h-100">
                        <div class="text-primary mb-3"><i class="{{ $svc->icon ?? 'fa-solid fa-cube' }} fa-2xl"></i></div>
                        <h4 class="fw-bold mb-2">{{ $svc->title }}</h4>
                        <p class="text-secondary small mb-0">{{ $svc->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5">
    <div class="container py-5">
        <div class="glass-card p-5 max-w-2xl mx-auto">
            <h3 class="fw-bold text-center mb-4">Partner with Our Studio</h3>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-3"><input type="text" name="name" class="form-control bg-transparent text-white" placeholder="Company / Your Name" required></div>
                <div class="mb-3"><input type="email" name="email" class="form-control bg-transparent text-white" placeholder="Business Email" required></div>
                <div class="mb-3"><textarea name="message" class="form-control bg-transparent text-white" rows="4" placeholder="Project Scope / Budget / Details" required></textarea></div>
                <button type="submit" class="btn btn-custom-primary w-100 py-3">Initiate Discussion</button>
            </form>
        </div>
    </div>
</section>
@endsection
