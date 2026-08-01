@extends('frontend.layouts.app')

@section('content')
<section class="min-vh-100 d-flex align-items-center pt-5">
    <div class="container text-center pt-5" data-aos="zoom-in">
        <span class="badge bg-pink text-white px-4 py-2 rounded-pill mb-3" style="background: #ec4899;">CREATIVE & FREELANCE DESIGNER</span>
        <h1 class="display-1 fw-extrabold mb-3">
            Designing <span class="text-gradient">Magic.</span>
        </h1>
        <h3 class="fw-bold text-white mb-4">{{ $portfolio->full_name }}</h3>
        <p class="lead text-secondary max-w-2xl mx-auto mb-5">{{ $portfolio->short_bio }}</p>
        <a href="#projects" class="btn btn-custom-primary btn-lg px-5 py-3">Explore Work</a>
    </div>
</section>

<!-- Floating Work Cards -->
<section id="projects" class="py-5">
    <div class="container py-5">
        <h2 class="fw-extrabold text-center mb-5">Creative Showcase</h2>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="glass-card p-3 h-100 border-0 shadow-lg" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img src="{{ $proj->cover_image }}" class="w-100 rounded-3 mb-3" style="height: 220px; object-fit: cover;" alt="">
                        <h5 class="fw-bold mb-2">{{ $proj->title }}</h5>
                        <p class="text-secondary small mb-3">{{ $proj->short_description }}</p>
                        <a href="{{ $proj->live_url ?? '#' }}" class="btn btn-sm btn-custom-primary w-100">View Project</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5">
    <div class="container py-5">
        <div class="glass-card p-5 max-w-2xl mx-auto border-0">
            <h3 class="fw-bold text-center mb-4">Let's Create Magic Together</h3>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-3"><input type="text" name="name" class="form-control bg-transparent text-white" placeholder="Name" required></div>
                <div class="mb-3"><input type="email" name="email" class="form-control bg-transparent text-white" placeholder="Email" required></div>
                <div class="mb-3"><textarea name="message" class="form-control bg-transparent text-white" rows="4" placeholder="Your Vision / Message" required></textarea></div>
                <button type="submit" class="btn btn-custom-primary w-100 py-3">Send Inquiry</button>
            </form>
        </div>
    </div>
</section>
@endsection
