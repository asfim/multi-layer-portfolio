@extends('frontend.layouts.app')

@section('content')
<!-- Resume Navbar -->
<nav class="navbar navbar-expand-lg fixed-top py-3 px-4 shadow-sm bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand fw-extrabold fs-4 text-primary" href="#">
            <i class="fa-solid fa-file-invoice me-2"></i> {{ $portfolio->full_name }}
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navResume">
            <i class="fa-solid fa-bars text-dark"></i>
        </button>
        <div class="collapse navbar-collapse" id="navResume">
            <ul class="navbar-nav ms-auto gap-3 text-uppercase fw-bold small">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a href="#{{ $sec->key }}" class="nav-link text-secondary" style="transition: 0.3s;" onmouseover="this.classList.add('text-primary');this.classList.remove('text-secondary');" onmouseout="this.classList.add('text-secondary');this.classList.remove('text-primary');">{{ $sec->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<div class="container" style="padding-top: 100px; padding-bottom: 50px;">
    <div class="row g-4">
        <!-- Sidebar Profile -->
        <div class="col-lg-4" data-aos="fade-right">
            <div class="bg-white rounded-4 shadow-sm p-4 text-center border sticky-top" style="top: 100px;">
                <img src="{{ $portfolio->profile_photo }}" class="rounded-circle mb-3 border border-4 border-primary shadow-sm" style="width: 160px; height: 160px; object-fit: cover;" alt="">
                <h3 class="fw-bold mb-1 text-dark">{{ $portfolio->full_name }}</h3>
                <p class="text-primary fw-semibold mb-3">{{ $portfolio->profession }}</p>
                <p class="text-secondary small mb-4">{{ $portfolio->short_bio }}</p>
                
                <div class="text-start border-top pt-4 mb-4">
                    <p class="mb-3 small text-dark fw-semibold"><i class="fa-solid fa-envelope me-3 text-primary fs-5"></i> {{ $portfolio->email }}</p>
                    <p class="mb-3 small text-dark fw-semibold"><i class="fa-solid fa-phone me-3 text-primary fs-5"></i> {{ $portfolio->phone }}</p>
                    <p class="mb-0 small text-dark fw-semibold"><i class="fa-solid fa-location-dot me-3 text-primary fs-5"></i> {{ $portfolio->location }}</p>
                </div>

                <a href="#contact" class="btn btn-primary w-100 mb-2 py-2 fw-bold text-uppercase shadow-sm">Get in Touch</a>
                <button class="btn btn-outline-dark w-100 py-2 fw-bold text-uppercase" onclick="window.print()"><i class="fa-solid fa-print me-2"></i> Print Resume</button>
            </div>
        </div>

        <!-- Main CV Timeline -->
        <div class="col-lg-8" data-aos="fade-left">
            
            <!-- Hero / About -->
            <div id="about" class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4 border">
                <h4 class="fw-extrabold border-bottom border-2 border-light pb-3 mb-4 text-dark"><i class="fa-solid fa-user me-2 text-primary"></i> Executive Summary</h4>
                <p class="text-secondary leading-relaxed fs-6">{{ $portfolio->about_me }}</p>
                <div class="row g-3 mt-4">
                    <div class="col-sm-4">
                        <div class="bg-light p-3 rounded-3 text-center border">
                            <h4 class="fw-bold text-primary mb-0">{{ $portfolio->years_of_experience }}+</h4>
                            <small class="text-muted fw-semibold">Years Exp.</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="bg-light p-3 rounded-3 text-center border">
                            <h4 class="fw-bold text-primary mb-0">{{ $portfolio->completed_projects }}</h4>
                            <small class="text-muted fw-semibold">Projects</small>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="bg-light p-3 rounded-3 text-center border">
                            <h4 class="fw-bold text-primary mb-0">{{ $portfolio->happy_clients }}</h4>
                            <small class="text-muted fw-semibold">Clients</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Education -->
            <div id="education" class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4 border">
                <h4 class="fw-extrabold border-bottom border-2 border-light pb-3 mb-4 text-dark"><i class="fa-solid fa-graduation-cap me-2 text-primary"></i> Education</h4>
                @foreach($educations as $edu)
                    <div class="mb-4 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start mb-2">
                            <h5 class="fw-bold text-dark mb-1">{{ $edu->degree }}</h5>
                            <span class="badge bg-primary text-white rounded-pill px-3 py-2 mt-2 mt-md-0">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</span>
                        </div>
                        <h6 class="text-primary fw-semibold mb-2">{{ $edu->institute }}</h6>
                        <p class="text-dark fw-bold small mb-2">Result: {{ $edu->result }}</p>
                        @if($edu->description)
                            <p class="text-secondary small mb-0">{{ $edu->description }}</p>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Experience -->
            <div id="experience" class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4 border">
                <h4 class="fw-extrabold border-bottom border-2 border-light pb-3 mb-4 text-dark"><i class="fa-solid fa-briefcase me-2 text-primary"></i> Work Experience</h4>
                @foreach($experiences as $exp)
                    <div class="mb-4 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-start mb-2">
                            <h5 class="fw-bold text-dark mb-1">{{ $exp->designation }}</h5>
                            <span class="badge bg-light text-dark border rounded-pill px-3 py-2 mt-2 mt-md-0">{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                        </div>
                        <h6 class="text-secondary fw-semibold mb-3">{{ $exp->company }} | {{ $exp->location ?? 'Remote' }}</h6>
                        <p class="text-secondary small mb-0">{{ $exp->description }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Skills -->
            <div id="skills" class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4 border">
                <h4 class="fw-extrabold border-bottom border-2 border-light pb-3 mb-4 text-dark"><i class="fa-solid fa-screwdriver-wrench me-2 text-primary"></i> Skills</h4>
                <div class="row g-4">
                    @foreach($skillCategories as $cat)
                        <div class="col-md-6">
                            <h6 class="fw-bold text-dark mb-3">{{ $cat->name }}</h6>
                            @foreach($cat->skills as $skill)
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-secondary fw-semibold small">{{ $skill->name }}</span>
                                        <span class="text-primary fw-bold small">{{ $skill->proficiency }}%</span>
                                    </div>
                                    <div class="progress rounded-pill" style="height: 6px;">
                                        <div class="progress-bar bg-primary rounded-pill" style="width: {{ $skill->proficiency }}%;"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Services -->
            <div id="services" class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4 border">
                <h4 class="fw-extrabold border-bottom border-2 border-light pb-3 mb-4 text-dark"><i class="fa-solid fa-hand-holding-hand me-2 text-primary"></i> Services</h4>
                <div class="row g-3">
                    @foreach($services as $svc)
                        <div class="col-md-6">
                            <div class="bg-light p-4 rounded-3 border h-100">
                                <h6 class="fw-bold text-dark mb-2">{{ $svc->title }}</h6>
                                <p class="text-secondary small mb-0">{{ $svc->short_description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Projects -->
            <div id="projects" class="bg-white rounded-4 shadow-sm p-4 p-md-5 mb-4 border">
                <h4 class="fw-extrabold border-bottom border-2 border-light pb-3 mb-4 text-dark"><i class="fa-solid fa-folder-open me-2 text-primary"></i> Projects</h4>
                <div class="row g-4">
                    @foreach($projects as $proj)
                        <div class="col-md-6">
                            <div class="border rounded-3 overflow-hidden h-100">
                                <img src="{{ $proj->cover_image }}" class="w-100" style="height: 150px; object-fit: cover;" alt="">
                                <div class="p-3">
                                    <h6 class="fw-bold text-dark mb-2">{{ $proj->title }}</h6>
                                    <p class="text-secondary small mb-0">{{ $proj->short_description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Contact -->
            <div id="contact" class="bg-white rounded-4 shadow-sm p-4 p-md-5 border">
                <h4 class="fw-extrabold border-bottom border-2 border-light pb-3 mb-4 text-dark"><i class="fa-solid fa-paper-plane me-2 text-primary"></i> Send Message</h4>
                <form id="ajaxContactForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6"><input type="text" name="name" class="form-control bg-light border-0 py-2" placeholder="Full Name" required></div>
                        <div class="col-md-6"><input type="email" name="email" class="form-control bg-light border-0 py-2" placeholder="Email Address" required></div>
                        <div class="col-12"><textarea name="message" class="form-control bg-light border-0 py-2" rows="4" placeholder="Your Message" required></textarea></div>
                        <div class="col-12"><button type="submit" class="btn btn-primary w-100 fw-bold text-uppercase py-3">Submit Inquiry</button></div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection
