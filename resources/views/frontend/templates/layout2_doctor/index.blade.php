@extends('frontend.layouts.app')

@section('content')
<!-- Medical Header -->
<header class="bg-white border-bottom py-3 fixed-top shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand fw-extrabold fs-4 text-teal" href="#" style="color: #0d9488;">
            <i class="fa-solid fa-user-doctor me-2"></i> Dr. {{ $portfolio->full_name }}
        </a>
        <div class="d-none d-lg-flex gap-4">
            <a href="#services" class="text-decoration-none text-secondary fw-semibold">Services</a>
            <a href="#experience" class="text-decoration-none text-secondary fw-semibold">Clinical Background</a>
            <a href="#contact" class="text-decoration-none text-secondary fw-semibold">Appointment</a>
        </div>
        <a href="#contact" class="btn text-white fw-bold px-4 rounded-pill" style="background: #0d9488;">
            <i class="fa-solid fa-calendar-check me-2"></i> Book Appointment
        </a>
    </div>
</header>

<!-- Hero Section -->
<section class="min-vh-100 d-flex align-items-center pt-5" style="background: linear-gradient(135deg, #f0fdf4 0%, #ccfbf1 100%); color: #0f172a;">
    <div class="container pt-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="badge bg-white text-teal px-3 py-2 rounded-pill shadow-sm mb-3 font-semibold" style="color: #0d9488;">
                    <i class="fa-solid fa-stethoscope me-1"></i> Medical Specialist & Consultant
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
                <img src="{{ $portfolio->profile_photo }}" class="img-fluid rounded-4 shadow-lg w-100" style="max-height: 480px; object-fit: cover;" alt="Doctor">
            </div>
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
                    <div class="p-4 rounded-4 border bg-light h-100 shadow-sm">
                        <div class="p-3 rounded-circle text-white d-inline-block mb-3" style="background: #0d9488;">
                            <i class="{{ $svc->icon ?? 'fa-solid fa-heart-pulse' }} fa-xl"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2">{{ $svc->title }}</h5>
                        <p class="text-secondary small mb-0">{{ $svc->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact & Appointment -->
<section id="contact" class="py-5" style="background: #f0fdf4;">
    <div class="container py-5">
        <div class="max-w-2xl mx-auto p-5 bg-white rounded-4 shadow-sm border">
            <h3 class="fw-bold text-center mb-4 text-dark"><i class="fa-solid fa-calendar-days me-2" style="color: #0d9488;"></i> Schedule a Consultation</h3>
            <form id="ajaxContactForm">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label text-dark fw-semibold">Patient Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-dark fw-semibold">Patient Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label text-dark fw-semibold">Consultation Subject</label>
                        <input type="text" name="subject" class="form-control">
                    </div>
                    <div class="col-12">
                        <label class="form-label text-dark fw-semibold">Medical Symptoms / Message</label>
                        <textarea name="message" class="form-control" rows="4" required></textarea>
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
