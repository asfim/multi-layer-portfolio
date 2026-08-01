@extends('frontend.layouts.app')

@section('content')
<!-- Engineering Header -->
<nav class="navbar navbar-expand-lg fixed-top bg-black py-3 px-4 border-bottom border-secondary">
    <div class="container">
        <a class="navbar-brand fw-extrabold fs-4 font-monospace text-info" href="#">
            <i class="fa-solid fa-microchip me-2"></i> >_{{ $portfolio->full_name }}
        </a>
        <button class="navbar-toggler border-secondary rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <i class="fa-solid fa-bars text-info"></i>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto gap-3 font-monospace">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a href="#{{ $sec->key }}" class="nav-link text-white-50 hover-info text-uppercase" style="transition: 0.2s;" onmouseover="this.classList.add('text-info');this.classList.remove('text-white-50');" onmouseout="this.classList.add('text-white-50');this.classList.remove('text-info');">[ {{ $sec->name }} ]</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Hero -->
<section id="hero" class="min-vh-100 d-flex align-items-center bg-dark text-white pt-5">
    <div class="container pt-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="badge bg-primary px-3 py-2 rounded-0 mb-3 font-monospace">ENGINEERING SPECIFICATIONS</div>
                <h1 class="display-4 fw-extrabold mb-3">{{ $portfolio->full_name }}</h1>
                <h4 class="text-info font-monospace mb-4">{{ $portfolio->profession }}</h4>
                <p class="text-secondary leading-relaxed mb-4">{{ $portfolio->short_bio }}</p>
                <div class="d-flex gap-3">
                    <a href="#projects" class="btn btn-primary rounded-0 px-4 py-2 font-monospace">VIEW PROJECTS</a>
                    <a href="#contact" class="btn btn-outline-info rounded-0 px-4 py-2 font-monospace">INITIATE CONTACT</a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="border border-info p-4 font-monospace bg-black position-relative shadow-lg">
                    <div class="position-absolute top-0 start-0 p-1 bg-info text-black fw-bold" style="font-size: 10px;">SYS_MONITOR</div>
                    <h6 class="text-info border-bottom border-info pb-2 mt-3">[ SYSTEM DIAGNOSTIC METRICS ]</h6>
                    <div class="d-flex justify-content-between py-2 border-bottom border-secondary">
                        <span class="text-secondary">EXPERIENCE_YEARS:</span>
                        <span class="text-warning">{{ $portfolio->years_of_experience }} YRS</span>
                    </div>
                    <div class="d-flex justify-content-between py-2 border-bottom border-secondary">
                        <span class="text-secondary">COMPLETED_PROJECTS:</span>
                        <span class="text-success">{{ $portfolio->completed_projects }}</span>
                    </div>
                    <div class="d-flex justify-content-between py-2">
                        <span class="text-secondary">SYSTEM_STATUS:</span>
                        <span class="text-info">{{ $portfolio->availability }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-black text-white">
    <div class="container py-5 border border-secondary p-4 p-md-5 bg-dark">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <img src="{{ $portfolio->cover_image }}" class="img-fluid border border-info p-2" alt="Profile" style="width: 100%; object-fit: cover; max-height: 400px;">
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <h6 class="text-info font-monospace mb-2">// CORE_ARCHITECTURE</h6>
                <h2 class="fw-extrabold text-white mb-4">About the Engineer</h2>
                <p class="text-secondary leading-relaxed mb-4 font-monospace">{{ $portfolio->about_me }}</p>
                <div class="d-flex flex-wrap gap-4 mt-4 font-monospace">
                    <div class="border border-secondary p-3 text-center bg-black">
                        <h4 class="text-info mb-0">{{ $portfolio->years_of_experience }}+</h4>
                        <small class="text-secondary">YRS_EXP</small>
                    </div>
                    <div class="border border-secondary p-3 text-center bg-black">
                        <h4 class="text-info mb-0">{{ $portfolio->completed_projects }}</h4>
                        <small class="text-secondary">DEPLOYMENTS</small>
                    </div>
                    <div class="border border-secondary p-3 text-center bg-black">
                        <h4 class="text-info mb-0">{{ $portfolio->happy_clients }}</h4>
                        <small class="text-secondary">CLIENT_NODES</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <h2 class="fw-bold text-center text-info mb-5 font-monospace">// ACADEMIC_QUALIFICATIONS</h2>
        <div class="row g-4">
            @foreach($educations as $edu)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="border border-secondary p-4 bg-black h-100 position-relative">
                        <div class="position-absolute top-0 start-0 p-1 bg-secondary text-white font-monospace" style="font-size: 10px;">EDU_NODE_{{ $loop->iteration }}</div>
                        <h5 class="fw-bold text-info font-monospace mt-3">{{ $edu->degree }}</h5>
                        <h6 class="text-secondary mb-2">{{ $edu->institute }}</h6>
                        <p class="text-white-50 font-monospace small mb-2">[{{ $edu->start_year }} - {{ $edu->end_year ?? 'PRESENT' }}]</p>
                        <p class="text-success font-monospace small mb-2">RESULT: {{ $edu->result }}</p>
                        @if($edu->description)
                            <p class="text-secondary small mb-0">{{ $edu->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5 bg-black text-white">
    <div class="container py-5 border border-secondary p-4 p-md-5 bg-dark">
        <h2 class="fw-bold text-center text-info mb-5 font-monospace">// PROFESSIONAL_TIMELINE</h2>
        <div class="row justify-content-center font-monospace">
            <div class="col-lg-8">
                @foreach($experiences as $exp)
                    <div class="mb-4 border-start border-info ps-4 position-relative" data-aos="fade-up">
                        <div class="position-absolute bg-info" style="width: 12px; height: 12px; left: -7px; top: 0;"></div>
                        <h5 class="text-primary fw-bold mb-1">{{ $exp->designation }}</h5>
                        <h6 class="text-white mb-2">{{ $exp->company }} <span class="text-secondary ms-2">[{{ $exp->start_date }} - {{ $exp->is_current ? 'PRESENT' : $exp->end_date }}]</span></h6>
                        <p class="text-secondary small">{{ $exp->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <h2 class="fw-bold text-center text-info mb-5 font-monospace">// TECHNICAL_STACK</h2>
        <div class="row g-4">
            @foreach($skillCategories as $cat)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="border border-secondary p-4 bg-black h-100 font-monospace">
                        <h5 class="fw-bold text-info border-bottom border-secondary pb-2 mb-4">[{{ $cat->name }}]</h5>
                        @foreach($cat->skills as $skill)
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span class="text-secondary small">{{ $skill->name }}</span>
                                    <span class="text-success small">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="progress rounded-0 bg-dark border border-secondary" style="height: 8px;">
                                    <div class="progress-bar bg-info" style="width: {{ $skill->proficiency }}%;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5 bg-black text-white">
    <div class="container py-5 border border-secondary p-4 p-md-5 bg-dark">
        <h2 class="fw-bold text-center text-info mb-5 font-monospace">// SYSTEM_CAPABILITIES</h2>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="border border-secondary p-4 bg-black text-center h-100 hover-border-info transition-all">
                        <i class="{{ $svc->icon ?? 'fa-solid fa-microchip' }} fa-2x text-info mb-3"></i>
                        <h5 class="fw-bold text-white font-monospace mb-3">{{ $svc->title }}</h5>
                        <p class="text-secondary small">{{ $svc->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects -->
<section id="projects" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <h2 class="fw-bold text-center text-info mb-5 font-monospace">// ENGINEERING SHOWCASE</h2>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="border border-secondary p-3 bg-black h-100 position-relative">
                        <div class="position-absolute top-0 end-0 p-1 bg-primary text-white font-monospace" style="font-size: 10px; z-index: 10;">{{ $proj->category->name ?? 'MODULE' }}</div>
                        <img src="{{ $proj->cover_image }}" class="w-100 mb-3 border border-secondary" style="height: 180px; object-fit: cover;" alt="">
                        <h5 class="fw-bold text-info font-monospace">{{ $proj->title }}</h5>
                        <p class="text-secondary small font-monospace">{{ $proj->short_description }}</p>
                        @if($proj->github_url)
                            <a href="{{ $proj->github_url }}" target="_blank" class="text-white-50 small text-decoration-none font-monospace mt-2 d-inline-block hover-info">>_ SOURCE_CODE</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5 bg-black text-white">
    <div class="container py-5">
        <div class="border border-info p-5 max-w-2xl mx-auto bg-dark">
            <h3 class="fw-bold text-info font-monospace mb-4 text-center">// INITIATE_CONNECTION</h3>
            <form id="ajaxContactForm">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control bg-black text-white border-secondary rounded-0 font-monospace" placeholder="> NAME" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control bg-black text-white border-secondary rounded-0 font-monospace" placeholder="> EMAIL" required>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control bg-black text-white border-secondary rounded-0 font-monospace" rows="4" placeholder="> SPECIFICATIONS / MESSAGE" required></textarea>
                </div>
                <button type="submit" class="btn btn-info rounded-0 w-100 fw-bold font-monospace">TRANSMIT</button>
            </form>
        </div>
    </div>
</section>
@endsection
