@extends('frontend.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <!-- Sidebar Profile -->
        <div class="col-lg-4" data-aos="fade-right">
            <div class="glass-card p-4 text-center sticky-top" style="top: 2rem;">
                <img src="{{ $portfolio->profile_photo }}" class="rounded-circle mb-3 border border-3 border-primary" style="width: 150px; height: 150px; object-fit: cover;" alt="">
                <h3 class="fw-bold mb-1">{{ $portfolio->full_name }}</h3>
                <p class="text-primary fw-semibold mb-3">{{ $portfolio->profession }}</p>
                <p class="text-secondary small mb-4">{{ $portfolio->short_bio }}</p>
                
                <div class="text-start border-top pt-3 mb-4">
                    <p class="mb-2 small"><i class="fa-solid fa-envelope me-2 text-primary"></i> {{ $portfolio->email }}</p>
                    <p class="mb-2 small"><i class="fa-solid fa-phone me-2 text-primary"></i> {{ $portfolio->phone }}</p>
                    <p class="mb-0 small"><i class="fa-solid fa-location-dot me-2 text-primary"></i> {{ $portfolio->location }}</p>
                </div>

                <a href="#contact" class="btn btn-custom-primary w-100 mb-2">Get in Touch</a>
                <button class="btn btn-outline-light w-100 small" onclick="window.print()"><i class="fa-solid fa-print me-2"></i> Print Resume</button>
            </div>
        </div>

        <!-- Main CV Timeline -->
        <div class="col-lg-8" data-aos="fade-left">
            <!-- Biography -->
            <div class="glass-card p-4 mb-4">
                <h4 class="fw-bold border-bottom pb-2 mb-3"><i class="fa-solid fa-user me-2 text-primary"></i> Executive Summary</h4>
                <p class="text-secondary leading-relaxed">{{ $portfolio->about_me }}</p>
            </div>

            <!-- Experience -->
            <div class="glass-card p-4 mb-4">
                <h4 class="fw-bold border-bottom pb-2 mb-3"><i class="fa-solid fa-briefcase me-2 text-primary"></i> Work Experience</h4>
                @foreach($experiences as $exp)
                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-bold mb-1">{{ $exp->designation }}</h5>
                            <span class="badge bg-primary-subtle text-primary">{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                        </div>
                        <h6 class="text-secondary small mb-2">{{ $exp->company }} | {{ $exp->location }}</h6>
                        <p class="text-secondary small mb-0">{{ $exp->description }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Education -->
            <div class="glass-card p-4 mb-4">
                <h4 class="fw-bold border-bottom pb-2 mb-3"><i class="fa-solid fa-graduation-cap me-2 text-primary"></i> Education</h4>
                @foreach($educations as $edu)
                    <div class="mb-3">
                        <h5 class="fw-bold mb-1">{{ $edu->degree }}</h5>
                        <h6 class="text-primary small mb-1">{{ $edu->institute }}</h6>
                        <small class="text-muted">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }} | {{ $edu->result }}</small>
                    </div>
                @endforeach
            </div>

            <!-- Contact -->
            <div id="contact" class="glass-card p-4">
                <h4 class="fw-bold border-bottom pb-2 mb-3"><i class="fa-solid fa-envelope me-2 text-primary"></i> Send Message</h4>
                <form id="ajaxContactForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6"><input type="text" name="name" class="form-control bg-transparent text-white" placeholder="Name" required></div>
                        <div class="col-md-6"><input type="email" name="email" class="form-control bg-transparent text-white" placeholder="Email" required></div>
                        <div class="col-12"><textarea name="message" class="form-control bg-transparent text-white" rows="3" placeholder="Message" required></textarea></div>
                        <div class="col-12"><button type="submit" class="btn btn-custom-primary w-100">Submit Inquiry</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
