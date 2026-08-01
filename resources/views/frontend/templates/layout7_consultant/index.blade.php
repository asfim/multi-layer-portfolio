@extends('frontend.layouts.app')

@section('content')
<section class="min-vh-100 d-flex align-items-center text-white pt-5" style="background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 100%);">
    <div class="container pt-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right">
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill fw-bold mb-3" style="background: #d97706 !important; color: #fff !important;">EXECUTIVE ADVISORY & CONSULTING</span>
                <h1 class="display-3 fw-extrabold mb-3">{{ $portfolio->full_name }}</h1>
                <h4 class="text-warning mb-4" style="color: #fbbf24 !important;">{{ $portfolio->profession }}</h4>
                <p class="lead text-secondary mb-4">{{ $portfolio->short_bio }}</p>
                <div class="d-flex gap-3">
                    <a href="#services" class="btn btn-warning btn-lg rounded-3 fw-bold text-dark px-4" style="background: #d97706; border: none; color: #fff !important;">Advisory Services</a>
                    <a href="#contact" class="btn btn-outline-light btn-lg rounded-3 px-4">Schedule Consultation</a>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left">
                <img src="{{ $portfolio->profile_photo }}" class="img-fluid rounded-4 shadow-lg border border-warning" style="max-height: 480px; object-fit: cover;" alt="">
            </div>
        </div>
    </div>
</section>

<!-- Services Tiers -->
<section id="services" class="py-5 bg-light text-dark">
    <div class="container py-5">
        <h2 class="fw-extrabold text-center mb-5">Strategic Advisory Services</h2>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="p-4 bg-white border rounded-4 shadow-sm h-100">
                        <div class="text-warning mb-3"><i class="{{ $svc->icon ?? 'fa-solid fa-briefcase' }} fa-2xl"></i></div>
                        <h4 class="fw-bold mb-2">{{ $svc->title }}</h4>
                        <p class="text-secondary small mb-3">{{ $svc->short_description }}</p>
                        <span class="badge bg-dark text-white p-2">{{ $svc->price ?? 'Consultation' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Form -->
<section id="contact" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <div class="max-w-2xl mx-auto p-5 glass-card">
            <h3 class="fw-bold text-center mb-4">Request a Strategy Session</h3>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-3"><input type="text" name="name" class="form-control" placeholder="Full Name" required></div>
                <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Business Email" required></div>
                <div class="mb-3"><textarea name="message" class="form-control" rows="4" placeholder="Business Challenge / Goals" required></textarea></div>
                <button type="submit" class="btn btn-warning text-dark fw-bold w-100 py-3" style="background: #d97706; color: #fff !important;">Book Consultation</button>
            </form>
        </div>
    </div>
</section>
@endsection
