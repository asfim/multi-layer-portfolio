@extends('frontend.layouts.app')

@section('content')
<!-- Academic Navbar -->
<nav class="navbar navbar-expand-lg fixed-top glass-card py-3 px-4 mx-3 mt-3">
    <div class="container">
        <a class="navbar-brand fw-extrabold text-gradient fs-4" href="#">
            <i class="fa-solid fa-graduation-cap me-2"></i> {{ $portfolio->full_name }}
        </a>
        <div class="collapse navbar-collapse" id="navAcademic">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item"><a href="#about" class="nav-link text-white-50">About</a></li>
                <li class="nav-item"><a href="#education" class="nav-link text-white-50">Education</a></li>
                <li class="nav-item"><a href="#research" class="nav-link text-white-50">Research & Projects</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link text-white-50">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section class="min-vh-100 d-flex align-items-center pt-5">
    <div class="container pt-5 text-center" data-aos="fade-up">
        <span class="badge bg-purple text-white px-3 py-2 rounded-pill mb-3" style="background: #8b5cf6;">Academic Portfolio & Researcher</span>
        <h1 class="display-3 fw-extrabold mb-3">{{ $portfolio->full_name }}</h1>
        <p class="lead text-secondary max-w-2xl mx-auto mb-4">{{ $portfolio->short_bio }}</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="#education" class="btn btn-custom-primary">View Qualifications</a>
            <a href="#contact" class="btn btn-outline-light rounded-pill px-4">Contact Researcher</a>
        </div>
    </div>
</section>

<!-- Education Cards -->
<section id="education" class="py-5">
    <div class="container py-5">
        <h2 class="fw-extrabold text-center mb-5">Education & Degrees</h2>
        <div class="row g-4">
            @foreach($educations as $edu)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="glass-card p-4 h-100 border-start border-4" style="border-left-color: #8b5cf6 !important;">
                        <h4 class="fw-bold mb-1">{{ $edu->degree }}</h4>
                        <h6 class="text-primary mb-2">{{ $edu->institute }}</h6>
                        <p class="text-muted small mb-2">{{ $edu->department }} | {{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</p>
                        <span class="badge bg-light text-dark border">{{ $edu->result }}</span>
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
            <h3 class="fw-bold mb-4 text-center">Get in Touch</h3>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control bg-transparent text-white" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control bg-transparent text-white" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control bg-transparent text-white" rows="4" placeholder="Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-custom-primary w-100">Send Message</button>
            </form>
        </div>
    </div>
</section>
@endsection
