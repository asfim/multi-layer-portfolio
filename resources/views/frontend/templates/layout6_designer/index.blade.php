@extends('frontend.layouts.app')

@section('content')
<section class="min-vh-100 d-flex align-items-center bg-white text-dark pt-5">
    <div class="container pt-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-8" data-aos="fade-up">
                <span class="text-secondary fw-bold text-uppercase tracking-wider d-block mb-3">{{ $portfolio->profession }}</span>
                <h1 class="display-2 fw-extrabold mb-4" style="letter-spacing: -2px; color: #18181b;">{{ $portfolio->full_name }}</h1>
                <p class="fs-4 text-secondary leading-relaxed mb-5" style="max-width: 680px;">{{ $portfolio->short_bio }}</p>
                <div class="d-flex gap-4 align-items-center">
                    <a href="#work" class="btn btn-dark rounded-0 px-5 py-3 fw-bold">View Selected Work</a>
                    <a href="#contact" class="text-dark fw-bold text-decoration-none border-bottom border-dark border-2 pb-1">Get in Touch &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Selected Work -->
<section id="work" class="py-5 bg-light">
    <div class="container py-5">
        <h6 class="text-uppercase fw-bold text-secondary mb-5">Selected Case Studies</h6>
        <div class="row g-5">
            @foreach($projects as $proj)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-white p-4 border rounded-0">
                        <img src="{{ $proj->cover_image }}" class="w-100 mb-4" style="height: 260px; object-fit: cover;" alt="">
                        <h4 class="fw-bold mb-2">{{ $proj->title }}</h4>
                        <p class="text-secondary small mb-3">{{ $proj->short_description }}</p>
                        <a href="{{ $proj->live_url ?? '#' }}" class="text-dark fw-bold text-decoration-none">View Case Study &rarr;</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Minimal Contact -->
<section id="contact" class="py-5 bg-white">
    <div class="container py-5">
        <div class="max-w-2xl mx-auto">
            <h2 class="display-5 fw-extrabold mb-4" style="letter-spacing: -1px;">Let's create something minimal & meaningful.</h2>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase">Your Name</label>
                    <input type="text" name="name" class="form-control border-0 border-bottom rounded-0 px-0 fs-5" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold small text-uppercase">Your Email</label>
                    <input type="email" name="email" class="form-control border-0 border-bottom rounded-0 px-0 fs-5" required>
                </div>
                <div class="mb-5">
                    <label class="form-label fw-bold small text-uppercase">Your Project Details</label>
                    <textarea name="message" class="form-control border-0 border-bottom rounded-0 px-0 fs-5" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark rounded-0 px-5 py-3 fw-bold text-uppercase">Send Inquiry</button>
            </form>
        </div>
    </div>
</section>
@endsection
