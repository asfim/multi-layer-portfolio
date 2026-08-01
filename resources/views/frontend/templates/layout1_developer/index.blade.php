@extends('frontend.layouts.app')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top glass-card py-3 px-4 mx-3 mt-3">
    <div class="container">
        <a class="navbar-brand fw-extrabold text-gradient fs-4" href="#">
            <i class="fa-solid fa-code me-2"></i> {{ $portfolio->full_name }}
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="fa-solid fa-bars text-white fs-4"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto gap-3">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a class="nav-link text-white-50 fw-semibold hover-white" href="#{{ $sec->key }}">{{ $sec->name }}</a>
                    </li>
                @endforeach
            </ul>
            <a href="#contact" class="btn btn-custom-primary ms-lg-4">Hire Me</a>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="hero" class="min-vh-100 d-flex align-items-center pt-5">
    <div class="container pt-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-primary-subtle text-primary fw-bold small mb-3">
                    <span class="pulse-dot"></span> {{ $portfolio->availability }}
                </div>
                <h1 class="display-3 fw-extrabold mb-3">
                    Hello, I'm <br><span class="text-gradient">{{ $portfolio->full_name }}</span>
                </h1>
                <h4 class="text-muted fw-semibold mb-4">{{ $portfolio->profession }}</h4>
                <p class="lead text-secondary mb-4">{{ $portfolio->short_bio }}</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#projects" class="btn btn-custom-primary">View Projects <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    <a href="#contact" class="btn btn-outline-light rounded-pill px-4">Contact Me</a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <!-- Terminal Window UI -->
                <div class="glass-card p-4 font-monospace shadow-lg" style="border-left: 4px solid var(--primary-color);">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="rounded-circle bg-danger d-inline-block" style="width: 12px; height: 12px;"></span>
                        <span class="rounded-circle bg-warning d-inline-block" style="width: 12px; height: 12px;"></span>
                        <span class="rounded-circle bg-success d-inline-block" style="width: 12px; height: 12px;"></span>
                        <small class="text-muted ms-2">developer.config.js</small>
                    </div>
                    <pre class="text-success mb-0" style="font-size: 0.9rem;">
<span class="text-primary">const</span> developer = {
    name: <span class="text-warning">"{{ $portfolio->full_name }}"</span>,
    role: <span class="text-warning">"{{ $portfolio->profession }}"</span>,
    experience: <span class="text-info">{{ $portfolio->years_of_experience }}</span> + <span class="text-warning">"Years"</span>,
    skills: [<span class="text-warning">"Laravel 12"</span>, <span class="text-warning">"Vue.js"</span>, <span class="text-warning">"Tailwind"</span>, <span class="text-warning">"MySQL"</span>],
    hardWorker: <span class="text-primary">true</span>
};

<span class="text-primary">console</span>.log(<span class="text-warning">"Ready to build awesome products!"</span>);
                    </pre>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <img src="{{ $portfolio->profile_photo }}" class="img-fluid rounded-4 shadow-lg w-100" alt="{{ $portfolio->full_name }}" style="object-fit: cover; max-height: 480px;">
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <h6 class="text-primary fw-bold text-uppercase tracking-wider">Biography</h6>
                <h2 class="fw-extrabold mb-4">About Me</h2>
                <p class="text-secondary leading-relaxed mb-4">{{ $portfolio->about_me }}</p>
                
                <div class="row g-4 mb-4">
                    <div class="col-6 col-md-3">
                        <div class="glass-card p-3 text-center">
                            <h3 class="fw-extrabold text-gradient mb-0">{{ $portfolio->years_of_experience }}+</h3>
                            <small class="text-muted">Years Exp.</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="glass-card p-3 text-center">
                            <h3 class="fw-extrabold text-gradient mb-0">{{ $portfolio->completed_projects }}+</h3>
                            <small class="text-muted">Projects</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="glass-card p-3 text-center">
                            <h3 class="fw-extrabold text-gradient mb-0">{{ $portfolio->happy_clients }}+</h3>
                            <small class="text-muted">Happy Clients</small>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="glass-card p-3 text-center">
                            <h3 class="fw-extrabold text-gradient mb-0">{{ $portfolio->awards_count }}+</h3>
                            <small class="text-muted">Awards</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5 bg-opacity-10">
    <div class="container py-5">
        <div class="text-center max-w-2xl mx-auto mb-5" data-aos="fade-up">
            <h6 class="text-primary fw-bold text-uppercase">Expertise</h6>
            <h2 class="fw-extrabold">Technical Skills</h2>
        </div>

        <div class="row g-4">
            @foreach($skillCategories as $cat)
                <div class="col-lg-4" data-aos="fade-up">
                    <div class="glass-card p-4 h-100">
                        <h5 class="fw-bold mb-4 border-bottom pb-3"><i class="fa-solid fa-code me-2 text-primary"></i> {{ $cat->name }}</h5>
                        @foreach($cat->skills as $skill)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="fw-semibold small">{{ $skill->name }}</span>
                                    <span class="fw-bold text-primary small">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar bg-gradient-primary" style="width: {{ $skill->proficiency }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-5">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
            <div>
                <h6 class="text-primary fw-bold text-uppercase">Portfolio</h6>
                <h2 class="fw-extrabold mb-0">Featured Projects</h2>
            </div>
        </div>

        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="glass-card h-100 overflow-hidden d-flex flex-column">
                        <img src="{{ $proj->cover_image }}" class="w-100" style="height: 220px; object-fit: cover;" alt="{{ $proj->title }}">
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="badge bg-primary-subtle text-primary w-fit mb-2">{{ $proj->category->name ?? 'Project' }}</span>
                            <h5 class="fw-bold mb-2">{{ $proj->title }}</h5>
                            <p class="text-secondary small flex-grow-1">{{ $proj->short_description }}</p>
                            
                            <div class="d-flex gap-2 mt-3">
                                @if($proj->live_url)
                                    <a href="{{ $proj->live_url }}" target="_blank" class="btn btn-sm btn-custom-primary flex-grow-1">Live Demo</a>
                                @endif
                                @if($proj->github_url)
                                    <a href="{{ $proj->github_url }}" target="_blank" class="btn btn-sm btn-outline-light"><i class="fa-brands fa-github"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <h6 class="text-primary fw-bold text-uppercase">Get In Touch</h6>
                <h2 class="fw-extrabold mb-4">Let's Work Together</h2>
                <p class="text-secondary mb-4">Have a project in mind or looking for a full stack engineer? Send a message and let's get started.</p>

                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="glass-card p-3 text-primary"><i class="fa-solid fa-envelope fa-xl"></i></div>
                    <div>
                        <small class="text-muted d-block">Email Address</small>
                        <span class="fw-bold">{{ $portfolio->email }}</span>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="glass-card p-3 text-primary"><i class="fa-solid fa-phone fa-xl"></i></div>
                    <div>
                        <small class="text-muted d-block">Phone Number</small>
                        <span class="fw-bold">{{ $portfolio->phone }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left">
                <div class="glass-card p-5">
                    <h4 class="fw-bold mb-4">Send a Message</h4>
                    <form id="ajaxContactForm">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Your Name</label>
                                <input type="text" name="name" class="form-control bg-transparent text-white border-secondary" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Your Email</label>
                                <input type="email" name="email" class="form-control bg-transparent text-white border-secondary" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Subject</label>
                                <input type="text" name="subject" class="form-control bg-transparent text-white border-secondary">
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Message</label>
                                <textarea name="message" class="form-control bg-transparent text-white border-secondary" rows="4" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-custom-primary w-100 py-3">
                                    <i class="fa-solid fa-paper-plane me-2"></i> Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
