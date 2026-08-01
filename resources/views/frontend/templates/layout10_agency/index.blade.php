@extends('frontend.layouts.app')

@section('content')
<!-- Agency Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-black py-3 px-4 shadow-sm border-bottom border-dark">
    <div class="container">
        <a class="navbar-brand fw-extrabold fs-4 text-white text-uppercase tracking-widest" href="#">
            <i class="fa-solid fa-bolt me-2" style="color: #6366f1;"></i> AGENCY.
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navAgency">
            <i class="fa-solid fa-bars text-white"></i>
        </button>
        <div class="collapse navbar-collapse" id="navAgency">
            <ul class="navbar-nav ms-auto gap-3 text-uppercase fw-bold" style="font-size: 13px; letter-spacing: 1px;">
                @foreach($sections as $sec)
                    <li class="nav-item">
                        <a href="#{{ $sec->key }}" class="nav-link text-white-50" style="transition: 0.3s;" onmouseover="this.style.color='#6366f1'" onmouseout="this.style.color=''">{{ $sec->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

<!-- Agency Hero -->
<section id="hero" class="min-vh-100 d-flex align-items-center pt-5 bg-dark">
    <div class="container pt-5 text-center" data-aos="fade-up">
        <span class="badge text-white px-4 py-2 rounded-0 mb-4 tracking-widest" style="background: #6366f1; font-weight: 500;">PREMIUM DIGITAL STUDIO</span>
        <h1 class="fw-extrabold mb-4 text-white text-uppercase" style="font-size: clamp(3rem, 8vw, 6rem); letter-spacing: -2px;">
            We Engineer <br><span style="color: #6366f1;">Digital Dominance.</span>
        </h1>
        <h4 class="fw-bold text-white-50 mb-4 tracking-wider text-uppercase">Led by {{ $portfolio->full_name }}</h4>
        <p class="lead text-secondary max-w-2xl mx-auto mb-5 fw-light">{{ $portfolio->short_bio }}</p>
        <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
            <a href="#projects" class="btn text-white btn-lg px-5 py-3 rounded-0 fw-bold text-uppercase tracking-wider" style="background: #6366f1; border: none;">Our Work</a>
            <a href="#contact" class="btn btn-outline-light btn-lg rounded-0 px-5 py-3 fw-bold text-uppercase tracking-wider">Start Project</a>
        </div>
    </div>
</section>

<!-- Stats Matrix -->
<section class="py-5 bg-black border-top border-bottom border-dark">
    <div class="container py-4">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="fw-extrabold display-5 mb-2" style="color: #6366f1;">{{ $portfolio->years_of_experience }}+</h2>
                    <span class="text-secondary small text-uppercase tracking-widest fw-bold">Years Industry</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 border-start border-dark">
                    <h2 class="fw-extrabold display-5 mb-2" style="color: #6366f1;">{{ $portfolio->completed_projects }}</h2>
                    <span class="text-secondary small text-uppercase tracking-widest fw-bold">Enterprise Projects</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 border-start border-dark">
                    <h2 class="fw-extrabold display-5 mb-2" style="color: #6366f1;">{{ $portfolio->happy_clients }}</h2>
                    <span class="text-secondary small text-uppercase tracking-widest fw-bold">Global Clients</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 border-start border-dark">
                    <h2 class="fw-extrabold display-5 mb-2" style="color: #6366f1;">{{ $portfolio->awards_count }}</h2>
                    <span class="text-secondary small text-uppercase tracking-widest fw-bold">Awards Won</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="p-3 bg-black">
                    <img src="{{ $portfolio->cover_image }}" class="w-100" style="filter: grayscale(80%); object-fit: cover; max-height: 500px;" alt="">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h6 class="text-uppercase tracking-widest fw-bold mb-3" style="color: #6366f1;">About The Agency</h6>
                <h2 class="display-5 fw-extrabold text-uppercase mb-4" style="letter-spacing: -1px;">Who We Are</h2>
                <p class="fs-5 text-secondary leading-relaxed fw-light">{{ $portfolio->about_me }}</p>
                <div class="mt-5">
                    <a href="#services" class="text-white text-uppercase tracking-widest fw-bold text-decoration-none border-bottom pb-1" style="border-color: #6366f1 !important;">View Capabilities &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="py-5 bg-black text-white">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5 border-bottom border-dark pb-3">
            <h2 class="display-6 fw-extrabold text-uppercase mb-0">Leadership Education</h2>
            <span class="text-secondary text-uppercase tracking-widest small d-none d-md-block">Academic Excellence</span>
        </div>
        <div class="row g-4">
            @foreach($educations as $edu)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-dark p-5 h-100">
                        <span class="text-uppercase tracking-widest small fw-bold mb-3 d-block" style="color: #6366f1;">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</span>
                        <h4 class="fw-extrabold text-uppercase mb-2">{{ $edu->degree }}</h4>
                        <h6 class="text-secondary fw-light tracking-wider mb-4">{{ $edu->institute }}</h6>
                        <p class="text-white-50 small mb-0">{{ $edu->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5 border-bottom border-secondary pb-3">
            <h2 class="display-6 fw-extrabold text-uppercase mb-0">Agency Experience</h2>
            <span class="text-secondary text-uppercase tracking-widest small d-none d-md-block">Professional Timeline</span>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                @foreach($experiences as $exp)
                    <div class="d-flex flex-column flex-md-row justify-content-between py-4 border-bottom border-secondary" data-aos="fade-up">
                        <div class="mb-3 mb-md-0" style="min-width: 250px;">
                            <span class="text-uppercase tracking-widest fw-bold small" style="color: #6366f1;">{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                        </div>
                        <div class="flex-grow-1 ps-md-4 border-start border-secondary">
                            <h4 class="fw-extrabold text-uppercase mb-1">{{ $exp->designation }}</h4>
                            <h6 class="text-secondary fw-light tracking-wider mb-3">{{ $exp->company }}</h6>
                            <p class="text-white-50 mb-0 small">{{ $exp->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-5 bg-black text-white">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5 border-bottom border-dark pb-3">
            <h2 class="display-6 fw-extrabold text-uppercase mb-0">Technical Arsenal</h2>
            <span class="text-secondary text-uppercase tracking-widest small d-none d-md-block">Core Tools</span>
        </div>
        <div class="row g-5">
            @foreach($skillCategories as $cat)
                <div class="col-md-6" data-aos="fade-up">
                    <h5 class="fw-extrabold text-uppercase tracking-widest mb-4" style="color: #6366f1;">{{ $cat->name }}</h5>
                    @foreach($cat->skills as $skill)
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-bold text-uppercase tracking-wider small">{{ $skill->name }}</span>
                                <span class="fw-bold text-secondary small">{{ $skill->proficiency }}%</span>
                            </div>
                            <div class="progress rounded-0 bg-dark" style="height: 4px;">
                                <div class="progress-bar" style="width: {{ $skill->proficiency }}%; background: #6366f1;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Agency Services -->
<section id="services" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5 border-bottom border-secondary pb-3">
            <h2 class="display-6 fw-extrabold text-uppercase mb-0">Studio Capabilities</h2>
            <span class="text-secondary text-uppercase tracking-widest small d-none d-md-block">What We Do</span>
        </div>
        <div class="row g-4">
            @foreach($services as $svc)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="bg-black p-5 h-100 border border-dark transition-all hover-border-indigo">
                        <div class="mb-4"><i class="{{ $svc->icon ?? 'fa-solid fa-cube' }} fa-2x" style="color: #6366f1;"></i></div>
                        <h4 class="fw-extrabold text-uppercase mb-3">{{ $svc->title }}</h4>
                        <p class="text-secondary small fw-light mb-0">{{ $svc->short_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects -->
<section id="projects" class="py-5 bg-black text-white">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-end mb-5 border-bottom border-dark pb-3">
            <h2 class="display-6 fw-extrabold text-uppercase mb-0">Case Studies</h2>
            <span class="text-secondary text-uppercase tracking-widest small d-none d-md-block">Selected Work</span>
        </div>
        <div class="row g-4">
            @foreach($projects as $proj)
                <div class="col-md-6" data-aos="fade-up">
                    <div class="bg-dark p-4 border border-secondary h-100 group cursor-pointer" onclick="window.location='{{ $proj->live_url ?? '#' }}'">
                        <img src="{{ $proj->cover_image }}" class="w-100 mb-4 filter-grayscale transition-all" style="height: 300px; object-fit: cover;" alt="">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="fw-extrabold text-uppercase mb-1">{{ $proj->title }}</h4>
                                <span class="text-secondary text-uppercase tracking-widest small fw-bold" style="color: #6366f1 !important;">{{ $proj->category->name ?? 'Project' }}</span>
                            </div>
                            <div>
                                <i class="fa-solid fa-arrow-right fs-4 text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5 bg-dark text-white">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5">
                <h2 class="display-4 fw-extrabold text-uppercase mb-4" style="letter-spacing: -2px;">Partner<br>With Us.</h2>
                <p class="text-secondary fw-light fs-5 mb-5">Ready to engineer digital dominance? Let's discuss your next big move.</p>
                
                <div class="mb-4">
                    <h6 class="text-uppercase tracking-widest fw-bold mb-2" style="color: #6366f1;">Email</h6>
                    <p class="fs-5">{{ $portfolio->email }}</p>
                </div>
                <div class="mb-4">
                    <h6 class="text-uppercase tracking-widest fw-bold mb-2" style="color: #6366f1;">Phone</h6>
                    <p class="fs-5">{{ $portfolio->phone }}</p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="bg-black p-4 p-md-5 border border-secondary">
                    <form id="ajaxContactForm">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label text-uppercase tracking-widest small fw-bold text-secondary">Company / Name</label>
                                <input type="text" name="name" class="form-control bg-transparent border-0 border-bottom border-secondary text-white rounded-0 px-0 py-2" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-uppercase tracking-widest small fw-bold text-secondary">Business Email</label>
                                <input type="email" name="email" class="form-control bg-transparent border-0 border-bottom border-secondary text-white rounded-0 px-0 py-2" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-uppercase tracking-widest small fw-bold text-secondary">Project Details / Scope</label>
                                <textarea name="message" class="form-control bg-transparent border-0 border-bottom border-secondary text-white rounded-0 px-0 py-2" rows="4" required></textarea>
                            </div>
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn w-100 py-4 text-white text-uppercase tracking-widest fw-bold" style="background: #6366f1; border: none;">Initiate Discussion &rarr;</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.filter-grayscale { filter: grayscale(100%); }
.group:hover .filter-grayscale { filter: grayscale(0%); }
</style>
@endsection
