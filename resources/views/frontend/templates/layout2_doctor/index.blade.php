@extends('frontend.layouts.app')

@section('content')
<!-- Google Fonts for Premium Medical Look -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    :root {
        --med-primary: #0F766E;
        --med-primary-light: #14B8A6;
        --med-secondary: #0284C7;
        --med-accent: #38BDF8;
        --med-dark: #0F172A;
        --med-text: #475569;
        --med-bg-light: #F0FDFA;
        --med-white: #FFFFFF;
        --med-ease: cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--med-text);
        background-color: #F8FAFC;
    }

    h1, h2, h3, h4, h5, h6 {
        color: var(--med-dark);
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    /* Header / Nav */
    .med-header {
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(12px);
        box-shadow: 0 4px 25px rgba(0,0,0,0.05);
        padding: 16px 0;
        transition: all 0.3s var(--med-ease);
        z-index: 1000;
    }
    .med-brand {
        color: var(--med-primary);
        font-weight: 800;
        font-size: 1.4rem;
        display: flex;
        align-items: center;
        gap: 12px;
        text-decoration: none;
    }
    .med-brand i {
        background: linear-gradient(135deg, var(--med-primary-light) 0%, var(--med-primary) 100%);
        color: #fff;
        padding: 12px;
        border-radius: 14px;
        font-size: 1.1rem;
        box-shadow: 0 4px 15px rgba(15,118,110,0.25);
    }

    .med-nav { display: flex; align-items: center; gap: 32px; }
    .med-nav-link {
        color: var(--med-dark);
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        position: relative;
        padding: 5px 0;
        transition: color 0.3s ease;
    }
    .med-nav-link::after {
        content: ''; position: absolute; width: 0; height: 2.5px; bottom: 0; left: 0;
        background-color: var(--med-primary); transition: width 0.3s ease;
        border-radius: 2px;
    }
    .med-nav-link:hover { color: var(--med-primary); }
    .med-nav-link:hover::after { width: 100%; }

    .med-btn-primary {
        background: linear-gradient(135deg, var(--med-primary-light) 0%, var(--med-primary) 100%);
        color: var(--med-white) !important;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 15px;
        text-decoration: none;
        box-shadow: 0 8px 20px rgba(15, 118, 110, 0.25);
        transition: all 0.3s ease;
        display: inline-flex; align-items: center; gap: 8px;
        border: none;
    }
    .med-btn-primary:hover {
        background: linear-gradient(135deg, var(--med-primary) 0%, #0d5f59 100%);
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(15, 118, 110, 0.35);
    }
    .med-btn-outline {
        border: 2px solid var(--med-primary);
        color: var(--med-primary) !important;
        padding: 12px 28px;
        border-radius: 50px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        background: transparent;
    }
    .med-btn-outline:hover {
        background: var(--med-primary);
        color: var(--med-white) !important;
        box-shadow: 0 8px 20px rgba(15, 118, 110, 0.2);
    }

    /* Hero */
    .med-hero {
        position: relative;
        padding: 180px 0 120px;
        background: linear-gradient(135deg, var(--med-bg-light) 0%, #E0F2FE 100%);
        overflow: hidden;
    }
    .med-hero::before {
        content: ''; position: absolute; width: 800px; height: 800px;
        background: radial-gradient(circle, rgba(20,184,166,0.12) 0%, transparent 60%);
        top: -200px; right: -200px; border-radius: 50%; z-index: 0;
    }
    .med-hero::after {
        content: ''; position: absolute; width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(2,132,199,0.08) 0%, transparent 60%);
        bottom: -100px; left: -100px; border-radius: 50%; z-index: 0;
    }
    .med-badge {
        background: rgba(255,255,255,0.9); color: var(--med-primary); padding: 10px 20px; border-radius: 50px;
        font-weight: 700; font-size: 13px; letter-spacing: 1px; text-transform: uppercase;
        display: inline-flex; align-items: center; gap: 8px; box-shadow: 0 8px 20px rgba(0,0,0,0.04);
        margin-bottom: 28px; position: relative; z-index: 1;
        border: 1px solid rgba(20,184,166,0.2);
    }
    .med-hero-title { font-size: clamp(42px, 5vw, 68px); line-height: 1.15; margin-bottom: 24px; position: relative; z-index: 1; }
    .med-hero-title span { color: var(--med-primary); }
    .med-hero-img-wrap {
        position: relative; z-index: 2; border-radius: 30px; overflow: hidden;
        box-shadow: 0 30px 60px rgba(15,118,110,0.2);
        border: 8px solid rgba(255,255,255,0.6);
        backdrop-filter: blur(4px);
    }
    .med-hero-img-wrap img { width: 100%; height: 550px; object-fit: cover; }

    /* Global Section Styles */
    .med-section { padding: 110px 0; }
    .med-section-title { text-align: center; margin-bottom: 60px; max-width: 600px; margin-left: auto; margin-right: auto; }
    .med-section-title span { color: var(--med-primary); font-weight: 800; text-transform: uppercase; letter-spacing: 2.5px; font-size: 13px; display: block; margin-bottom: 12px; }
    .med-section-title h2 { font-size: 40px; margin-bottom: 20px; }
    .med-section-title p { color: var(--med-text); font-size: 17px; }

    /* Cards */
    .med-card {
        background: #fff; border-radius: 24px; padding: 40px 32px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        transition: all 0.4s var(--med-ease); border: 1px solid rgba(0,0,0,0.03);
        height: 100%; position: relative; overflow: hidden;
    }
    .med-card::before {
        content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 4px;
        background: linear-gradient(90deg, var(--med-primary-light), var(--med-primary));
        opacity: 0; transition: opacity 0.3s ease;
    }
    .med-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(15,118,110,0.1);
    }
    .med-card:hover::before { opacity: 1; }

    .med-icon-box {
        width: 70px; height: 70px; background: var(--med-bg-light); color: var(--med-primary);
        border-radius: 20px; display: flex; align-items: center; justify-content: center;
        font-size: 28px; margin-bottom: 28px; transition: all 0.3s ease;
    }
    .med-card:hover .med-icon-box {
        background: var(--med-primary); color: white; transform: scale(1.05);
    }

    /* Custom Timeline */
    .med-timeline-item {
        display: flex; gap: 28px; margin-bottom: 35px;
    }
    .med-timeline-icon {
        width: 56px; height: 56px; background: linear-gradient(135deg, var(--med-primary-light), var(--med-primary)); color: white; border-radius: 50%;
        display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 8px 20px rgba(15,118,110,0.3);
        font-size: 20px;
    }
    .med-timeline-content {
        background: white; padding: 28px; border-radius: 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.04); flex-grow: 1; border: 1px solid #f1f5f9;
        transition: all 0.3s ease; position: relative;
    }
    .med-timeline-content:hover {
        box-shadow: 0 15px 35px rgba(15,118,110,0.08); border-color: var(--med-primary-light);
    }

    /* Stats */
    .med-stat-box {
        background: white; padding: 30px 20px; border-radius: 20px; text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04); border: 1px solid #f1f5f9;
    }
    .med-stat-box h3 { color: var(--med-primary); font-size: 42px; font-weight: 800; margin-bottom: 5px; }

    /* Forms */
    .med-form-wrap {
        background: white; border-radius: 30px; padding: 50px;
        box-shadow: 0 20px 50px rgba(15,118,110,0.08); border: 1px solid #f1f5f9;
    }
    .med-form-control {
        background: #F8FAFC; border: 1px solid #E2E8F0; padding: 16px 24px; border-radius: 16px;
        color: var(--med-dark); font-weight: 500; transition: all 0.3s ease; width: 100%;
    }
    .med-form-control:focus {
        outline: none; border-color: var(--med-primary); background: white; box-shadow: 0 0 0 4px rgba(20,184,166,0.15);
    }

    @media(max-width: 991px) {
        .med-nav {
            display: none; flex-direction: column; position: absolute; top: 100%; left: 0; right: 0;
            background: rgba(255,255,255,0.98); backdrop-filter: blur(10px); padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1); border-top: 1px solid #eee;
        }
        .med-nav.active { display: flex; }
        .med-hero { padding: 140px 0 60px; text-align: center; }
        .med-hero-img-wrap { margin-top: 50px; }
        .med-badge { margin-left: auto; margin-right: auto; }
        .med-form-wrap { padding: 30px; }
    }
</style>

<!-- HEADER -->
<header class="med-header fixed-top">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Brand -->
        <div class="d-flex align-items-center" style="flex: 1;">
            <a href="#hero" class="med-brand">
                <i class="fa-solid fa-stethoscope"></i>
                <span class="d-none d-sm-inline">Dr. {{ $portfolio->full_name }}</span>
            </a>
        </div>

        <!-- Center Nav -->
        <nav class="med-nav justify-content-center" id="mainNav" style="flex: 2;">
            <a href="#about" class="med-nav-link" onclick="document.getElementById('mainNav').classList.remove('active')">About</a>
            <a href="#services" class="med-nav-link" onclick="document.getElementById('mainNav').classList.remove('active')">Services</a>
            <a href="#experience" class="med-nav-link" onclick="document.getElementById('mainNav').classList.remove('active')">Experience</a>
            <a href="#contact" class="med-nav-link" onclick="document.getElementById('mainNav').classList.remove('active')">Contact</a>
            
            <!-- Mobile CTA (Visible only on mobile dropdown) -->
            <a href="#contact" class="med-btn-primary d-lg-none mt-2" onclick="document.getElementById('mainNav').classList.remove('active')">
                <i class="fa-solid fa-calendar-check"></i> Book Appointment
            </a>
        </nav>

        <!-- Right CTA (Desktop) -->
        <div class="d-none d-lg-flex justify-content-end" style="flex: 1;">
            <a href="#contact" class="med-btn-primary">
                <i class="fa-solid fa-calendar-check"></i> Book Appointment
            </a>
        </div>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler d-lg-none border-0 bg-transparent p-0" type="button" onclick="document.getElementById('mainNav').classList.toggle('active')">
            <i class="fa-solid fa-bars-staggered fs-2 text-dark"></i>
        </button>
    </div>
</header>

<!-- HERO -->
<section id="hero" class="med-hero">
    <div class="container position-relative z-1">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="med-badge">
                    <i class="fa-solid fa-heart-pulse"></i> {{ $portfolio->profession ?? 'Medical Specialist' }}
                </div>
                <h1 class="med-hero-title">
                    Compassionate Care, <br><span>Advanced Medicine.</span>
                </h1>
                <p class="lead text-secondary mb-5" style="max-width: 500px;">
                    {{ $portfolio->short_bio }} Providing personalized healthcare solutions with state-of-the-art expertise and genuine empathy.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#contact" class="med-btn-primary">Book Consultation <i class="fa-solid fa-arrow-right ms-1"></i></a>
                    <a href="#services" class="med-btn-outline">Explore Services</a>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="med-hero-img-wrap">
                    <img src="{{ $portfolio->cover_image ?? 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?q=80&w=1000&auto=format&fit=crop' }}" alt="{{ $portfolio->full_name }}">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="med-section bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <img src="{{ $portfolio->profile_photo ?? 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?q=80&w=800&auto=format&fit=crop' }}" class="img-fluid rounded-4 shadow-lg w-100" style="object-fit: cover; max-height: 500px;" alt="About Doctor">
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="mb-4">
                    <span style="color: var(--med-primary); font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 13px;">Doctor Profile</span>
                    <h2 style="font-size: 38px; margin-top: 10px;">Committed to Your Health & Well-being</h2>
                </div>
                <p class="text-secondary leading-relaxed mb-5" style="font-size: 17px;">{{ $portfolio->about_me }}</p>

                <div class="row g-4">
                    <div class="col-6 col-md-4">
                        <div class="med-stat-box">
                            <h3>{{ $portfolio->years_of_experience }}+</h3>
                            <span class="text-muted fw-bold">Years Exp.</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="med-stat-box">
                            <h3>{{ $portfolio->happy_clients }}+</h3>
                            <span class="text-muted fw-bold">Happy Patients</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="med-stat-box">
                            <h3>{{ $portfolio->completed_projects ?? '500' }}+</h3>
                            <span class="text-muted fw-bold">Surgeries/Cases</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES / EXPERTISE -->
<section id="services" class="med-section" style="background: #F8FAFC;">
    <div class="container">
        <div class="med-section-title" data-aos="fade-up">
            <span>Clinical Expertise</span>
            <h2>Treatments & Services</h2>
            <p>We offer a comprehensive range of medical services designed to meet your specific health needs with the highest standard of care.</p>
        </div>
        <div class="row g-4">
            @forelse($services as $svc)
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="med-card">
                        <div class="med-icon-box">
                            <i class="{{ $svc->icon ?? 'fa-solid fa-notes-medical' }}"></i>
                        </div>
                        <h4 class="mb-3">{{ $svc->title }}</h4>
                        <p class="text-secondary mb-0">{{ $svc->short_description }}</p>
                    </div>
                </div>
            @empty
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="med-card">
                        <div class="med-icon-box"><i class="fa-solid fa-heart-circle-check"></i></div>
                        <h4 class="mb-3">General Checkup</h4>
                        <p class="text-secondary mb-0">Comprehensive health screenings to monitor your overall well-being and prevent future issues.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="med-card">
                        <div class="med-icon-box"><i class="fa-solid fa-scalpel-line-dashed"></i></div>
                        <h4 class="mb-3">Surgical Procedures</h4>
                        <p class="text-secondary mb-0">Advanced, minimally invasive surgical options ensuring faster recovery and better outcomes.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="fade-up">
                    <div class="med-card">
                        <div class="med-icon-box"><i class="fa-solid fa-tooth"></i></div>
                        <h4 class="mb-3">Specialized Care</h4>
                        <p class="text-secondary mb-0">Targeted treatments tailored specifically to your unique medical conditions and history.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- EXPERIENCE & EDUCATION -->
<section id="experience" class="med-section bg-white">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="mb-5" data-aos="fade-right">
                    <span style="color: var(--med-primary); font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 13px;">Journey</span>
                    <h2 style="font-size: 32px; margin-top: 10px;">Clinical Experience</h2>
                </div>
                @foreach($experiences as $exp)
                    <div class="med-timeline-item" data-aos="fade-up">
                        <div class="med-timeline-icon"><i class="fa-solid fa-briefcase-medical"></i></div>
                        <div class="med-timeline-content">
                            <h5 class="mb-1">{{ $exp->designation }}</h5>
                            <h6 class="text-secondary mb-3">{{ $exp->company }}</h6>
                            <span class="badge bg-light text-dark border mb-3 px-3 py-2 rounded-pill">{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                            <p class="text-muted small mb-0">{{ $exp->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-lg-6">
                <div class="mb-5" data-aos="fade-left">
                    <span style="color: var(--med-primary); font-weight: 800; text-transform: uppercase; letter-spacing: 2px; font-size: 13px;">Background</span>
                    <h2 style="font-size: 32px; margin-top: 10px;">Medical Education</h2>
                </div>
                @foreach($educations as $edu)
                    <div class="med-timeline-item" data-aos="fade-up">
                        <div class="med-timeline-icon" style="background: linear-gradient(135deg, #0284C7, #0369A1);"><i class="fa-solid fa-user-graduate"></i></div>
                        <div class="med-timeline-content">
                            <h5 class="mb-1">{{ $edu->degree }}</h5>
                            <h6 class="text-secondary mb-3">{{ $edu->institute }}</h6>
                            <span class="badge bg-light text-dark border mb-3 px-3 py-2 rounded-pill">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</span>
                            @if($edu->description)
                                <p class="text-muted small mb-0">{{ $edu->description }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- CONTACT & BOOKING -->
<section id="contact" class="med-section" style="background: linear-gradient(135deg, var(--med-primary) 0%, #0d5f59 100%); position: relative; overflow: hidden;">
    <!-- Abstract Bg Shapes -->
    <div style="position: absolute; top: -50px; right: -50px; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>
    <div style="position: absolute; bottom: -100px; left: -100px; width: 400px; height: 400px; background: rgba(255,255,255,0.05); border-radius: 50%;"></div>

    <div class="container position-relative z-1">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 text-white" data-aos="fade-right">
                <span class="badge bg-white text-dark px-3 py-2 rounded-pill mb-4 font-bold">Book a Visit</span>
                <h2 class="text-white display-5 fw-extrabold mb-4">Schedule Your Consultation Today</h2>
                <p class="mb-5" style="opacity: 0.9; font-size: 18px;">Don't delay your health. Fill out the form to request an appointment, and our clinic staff will get back to you to confirm the time.</p>

                <div class="d-flex align-items-center gap-4 mb-4">
                    <div class="med-timeline-icon bg-white text-dark" style="box-shadow: none;"><i class="fa-solid fa-phone"></i></div>
                    <div>
                        <span class="d-block small" style="opacity: 0.8;">Emergency Contact</span>
                        <h4 class="text-white mb-0">+1 (800) 123-4567</h4>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-4">
                    <div class="med-timeline-icon bg-white text-dark" style="box-shadow: none;"><i class="fa-solid fa-location-dot"></i></div>
                    <div>
                        <span class="d-block small" style="opacity: 0.8;">Clinic Location</span>
                        <h5 class="text-white mb-0">123 Health Ave, Medical District</h5>
                    </div>
                </div>
            </div>

            <div class="col-lg-7" data-aos="fade-left">
                <div class="med-form-wrap">
                    <h3 class="mb-4">Request Appointment</h3>
                    <form id="ajaxContactForm">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted fw-bold small">Full Name</label>
                                <input type="text" name="name" class="med-form-control" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted fw-bold small">Email Address</label>
                                <input type="email" name="email" class="med-form-control" placeholder="john@example.com" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted fw-bold small">Reason for Visit</label>
                                <input type="text" name="subject" class="med-form-control" placeholder="e.g. General Checkup, Pain Consultation">
                            </div>
                            <div class="col-12">
                                <label class="form-label text-muted fw-bold small">Additional Details / Symptoms</label>
                                <textarea name="message" class="med-form-control" rows="4" placeholder="Describe how you are feeling..." required></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="med-btn-primary w-100 justify-content-center py-3" style="font-size: 16px;">
                                    Confirm Request <i class="fa-solid fa-paper-plane ms-2"></i>
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
