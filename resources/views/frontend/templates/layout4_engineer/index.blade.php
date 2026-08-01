@extends('frontend.layouts.app')

@section('content')
<section class="min-vh-100 d-flex align-items-center bg-dark text-white pt-5">
    <div class="container pt-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="badge bg-primary px-3 py-2 rounded-0 mb-3 font-monospace">ENGINEERING SPECIFICATIONS</div>
                <h1 class="display-4 fw-extrabold mb-3">{{ $portfolio->full_name }}</h1>
                <h4 class="text-info font-monospace mb-4">{{ $portfolio->profession }}</h4>
                <p class="text-secondary leading-relaxed mb-4">{{ $portfolio->short_bio }}</p>
                <div class="d-flex gap-3">
                    <a href="#projects" class="btn btn-primary rounded-0 px-4 py-2">Technical Projects</a>
                    <a href="#contact" class="btn btn-outline-info rounded-0 px-4 py-2">Get Quote</a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="border border-info p-4 font-monospace bg-black">
                    <h6 class="text-info border-bottom border-info pb-2">[ SYSTEM DIAGNOSTIC METRICS ]</h6>
                    <div class="d-flex justify-content-between py-2 border-bottom border-secondary">
                        <span>EXPERIENCE_YEARS:</span>
                        <span class="text-warning">{{ $portfolio->years_of_experience }} YRS</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom border-secondary">
                        <span>COMPLETED_PROJECTS:</span>
                        <span class="text-success">{{ $portfolio->completed_projects }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span>SYSTEM_STATUS:</span>
                        <span class="text-info">{{ $portfolio->availability }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Projects -->
<section id="projects" class="py-5 bg-black">
    <div class="container py-5">
        <h2 class="fw-bold text-center text-white mb-5 font-monospace">// ENGINEERING SHOWCASE</h2>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-4">
                    <div class="border border-secondary p-4 bg-dark h-100">
                        <img src="{{ $proj->cover_image }}" class="w-100 mb-3" style="height: 180px; object-fit: cover;" alt="">
                        <h5 class="fw-bold text-info font-monospace">{{ $proj->title }}</h5>
                        <p class="text-secondary small">{{ $proj->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5 bg-dark">
    <div class="container py-5">
        <div class="border border-info p-5 max-w-2xl mx-auto bg-black">
            <h3 class="fw-bold text-info font-monospace mb-4">// INITIATE CONTACT</h3>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control bg-dark text-white border-secondary rounded-0" placeholder="NAME" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control bg-dark text-white border-secondary rounded-0" placeholder="EMAIL" required>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control bg-dark text-white border-secondary rounded-0" rows="4" placeholder="SPECIFICATIONS / MESSAGE" required></textarea>
                </div>
                <button type="submit" class="btn btn-info rounded-0 w-100 fw-bold">TRANSMIT MESSAGE</button>
            </form>
        </div>
    </div>
</section>
@endsection
