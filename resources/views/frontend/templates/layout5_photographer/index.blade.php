@extends('frontend.layouts.app')

@section('content')
<section class="min-vh-100 d-flex align-items-center bg-black text-white pt-5">
    <div class="container text-center pt-5" data-aos="fade-up">
        <h1 class="display-2 fw-extrabold tracking-widest text-uppercase mb-3">{{ $portfolio->full_name }}</h1>
        <p class="lead text-secondary tracking-wider text-uppercase mb-4">{{ $portfolio->profession }} & Visual Artist</p>
        <a href="#gallery" class="btn btn-outline-light rounded-0 px-5 py-3 text-uppercase">Explore Gallery</a>
    </div>
</section>

<!-- Masonry Gallery -->
<section id="gallery" class="py-5 bg-black">
    <div class="container py-5">
        <div class="row g-4">
            @foreach($galleryItems as $item)
                <div class="col-md-6 col-lg-4" data-aos="zoom-in">
                    <div class="position-relative overflow-hidden group">
                        <img src="{{ $item->media_url }}" class="w-100 rounded-0" style="height: 320px; object-fit: cover;" alt="{{ $item->title }}">
                        <div class="p-3 text-white text-center bg-dark">
                            <h6 class="fw-bold mb-0">{{ $item->title }}</h6>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Booking -->
<section id="contact" class="py-5 bg-black border-top border-secondary">
    <div class="container py-5">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="fw-extrabold text-white text-uppercase tracking-wider mb-4">Book a Shoot</h2>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control bg-dark text-white border-secondary rounded-0 py-3" placeholder="YOUR NAME" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control bg-dark text-white border-secondary rounded-0 py-3" placeholder="YOUR EMAIL" required>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control bg-dark text-white border-secondary rounded-0 py-3" rows="4" placeholder="EVENT / SHOOT DETAILS" required></textarea>
                </div>
                <button type="submit" class="btn btn-light rounded-0 w-100 py-3 text-uppercase fw-bold">Send Booking Inquiry</button>
            </form>
        </div>
    </div>
</section>
@endsection
