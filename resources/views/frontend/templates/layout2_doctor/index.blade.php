@extends('frontend.layouts.app')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

<style>
  :root{
    --blue-700:#0f5bd6;
    --blue-600:#1461e0;
    --blue-500:#2f7bf6;
    --navy:#0b1f3a;
    --ink:#16213e;
    --muted:#5b6b85;
    --bg-soft:#eaf3fd;
    --bg-soft-2:#f4f8fe;
    --line:#e4ebf5;
  }

  body{
    font-family:'Inter', sans-serif;
    color:var(--ink);
    background:#ffffff;
  }
  h1,h2,h3,h4,.brand-name{
    font-family:'Poppins', sans-serif;
  }

  a{text-decoration:none;}

  /* ---------- Navbar ---------- */
  .navbar-custom{
    padding:18px 0;
    background:#fff;
  }
  .logo-badge{
    width:44px;height:44px;
    background:var(--blue-600);
    border-radius:12px;
    display:flex;align-items:center;justify-content:center;
    color:#fff;font-size:20px;
    flex-shrink:0;
  }
  .brand-name{
    font-weight:700;
    font-size:1.15rem;
    color:var(--blue-700);
    line-height:1.15;
  }
  .brand-sub{
    font-size:.72rem;
    color:var(--muted);
    font-weight:500;
  }
  .nav-link-custom{
    color:var(--ink);
    font-weight:500;
    font-size:.95rem;
    margin:0 14px;
  }
  .nav-link-custom:hover{color:var(--blue-600);}
  .btn-primary-custom{
    background:var(--blue-600);
    border:none;
    color:#fff;
    font-weight:600;
    padding:10px 22px;
    border-radius:10px;
    font-size:.92rem;
  }
  .btn-primary-custom:hover{background:var(--blue-700); color:#fff;}
  .btn-outline-custom{
    background:#fff;
    border:1.5px solid var(--line);
    color:var(--ink);
    font-weight:600;
    padding:10px 22px;
    border-radius:10px;
    font-size:.92rem;
  }
  .btn-outline-custom:hover{border-color:var(--blue-600); color:var(--blue-600);}

  /* ---------- Hero ---------- */
  .hero-section{
    background:linear-gradient(180deg, var(--bg-soft) 0%, #dceafb 100%);
    padding:70px 0 40px;
    overflow:hidden;
    margin-top: 80px; /* Add margin for fixed navbar */
  }
  .eyebrow{
    color:var(--blue-600);
    font-weight:600;
    font-size:1.05rem;
  }
  .hero-title{
    font-size:3.4rem;
    font-weight:800;
    color:var(--navy);
    line-height:1.05;
    margin:6px 0 14px;
  }
  .hero-credential{
    color:var(--blue-600);
    font-weight:700;
    font-size:1.15rem;
    margin-bottom:2px;
  }
  .hero-role{
    font-weight:600;
    color:var(--ink);
    font-size:1.15rem;
    margin-bottom:16px;
  }
  .hero-desc{
    color:var(--muted);
    font-size:1.02rem;
    max-width:460px;
    margin-bottom:28px;
  }
  .stat-item{
    display:flex;
    align-items:center;
    gap:10px;
  }
  .stat-icon{
    width:38px;height:38px;
    border-radius:50%;
    background:#fff;
    display:flex;align-items:center;justify-content:center;
    color:var(--blue-600);
    font-size:1.1rem;
    flex-shrink:0;
  }
  .stat-num{
    font-weight:800;
    font-size:1.15rem;
    color:var(--navy);
    line-height:1.1;
  }
  .stat-label{
    font-size:.8rem;
    color:var(--muted);
    font-weight:500;
  }
  .hero-img-wrap{
    position:relative;
    display:flex;
    justify-content:center;
  }
  .hero-img-wrap img{
    max-width:100%;
    height:auto;
    position:relative;
    z-index:2;
  }
  .heartbeat-line{
    position:absolute;
    top:35%;
    right:-5%;
    width:110%;
    opacity:.55;
    z-index:1;
  }

  /* ---------- Services ---------- */
  .section-pad{padding:80px 0;}
  .section-title{
    font-weight:800;
    color:var(--navy);
    font-size:2.1rem;
    position:relative;
    padding-bottom:14px;
  }
  .section-title::after{
    content:"";
    position:absolute;
    left:0;bottom:0;
    width:52px;height:4px;
    background:var(--blue-600);
    border-radius:4px;
  }
  .service-card{
    background:#fff;
    border:1px solid var(--line);
    border-radius:16px;
    padding:32px 26px;
    height:100%;
    transition:transform .2s ease, box-shadow .2s ease;
  }
  .service-card:hover{
    transform:translateY(-6px);
    box-shadow:0 16px 34px rgba(20,50,120,.1);
  }
  .service-icon{
    width:56px;height:56px;
    border-radius:14px;
    background:var(--bg-soft);
    color:var(--blue-600);
    display:flex;align-items:center;justify-content:center;
    font-size:1.5rem;
    margin-bottom:18px;
  }
  .service-card h5{
    font-weight:700;
    color:var(--navy);
    margin-bottom:10px;
  }
  .service-card p{
    color:var(--muted);
    font-size:.92rem;
    margin-bottom:0;
  }

  /* ---------- About ---------- */
  .about-img-wrap img{
    border-radius:18px;
    width:100%;
    height:auto;
    object-fit:cover;
  }
  .about-list{
    list-style:none;
    padding:0;margin:0 0 22px;
  }
  .about-list li{
    display:flex;
    align-items:center;
    gap:10px;
    font-weight:500;
    color:var(--ink);
    margin-bottom:12px;
  }
  .about-list i{
    color:#fff;
    background:var(--blue-600);
    border-radius:50%;
    width:20px;height:20px;
    font-size:.7rem;
    display:flex;align-items:center;justify-content:center;
    flex-shrink:0;
  }
  .exp-badge{
    border:1.5px solid var(--blue-500);
    border-radius:14px;
    padding:20px;
    display:flex;
    align-items:center;
    gap:14px;
    max-width:260px;
  }
  .exp-badge .icon{
    width:46px;height:46px;
    border-radius:50%;
    background:var(--bg-soft);
    color:var(--blue-600);
    display:flex;align-items:center;justify-content:center;
    font-size:1.3rem;
    flex-shrink:0;
  }
  .exp-badge .num{
    font-weight:800;
    color:var(--navy);
    font-size:1.3rem;
    line-height:1.1;
  }
  .exp-badge .lbl{
    font-size:.8rem;
    color:var(--muted);
    font-weight:500;
  }

  /* ---------- Trust + Booking ---------- */
  .trust-section{
    background:var(--bg-soft-2);
    padding:70px 0;
  }
  .trust-card{
    background:#fff;
    border-radius:14px;
    padding:26px 18px;
    text-align:center;
    border:1px solid var(--line);
    height:100%;
  }
  .trust-card i{
    font-size:1.7rem;
    color:var(--blue-600);
    margin-bottom:10px;
    display:block;
  }
  .trust-card .num{
    font-weight:800;
    font-size:1.3rem;
    color:var(--navy);
  }
  .trust-card .lbl{
    font-size:.8rem;
    color:var(--muted);
    font-weight:500;
  }

  .booking-card{
    background:var(--blue-600);
    background:linear-gradient(135deg, var(--blue-600), #0b3fae);
    border-radius:18px;
    padding:34px;
    color:#fff;
  }
  .booking-card h3{
    font-weight:700;
    margin-bottom:20px;
  }
  .booking-card .form-control,
  .booking-card .form-select{
    background:#fff;
    border:none;
    border-radius:10px;
    padding:12px 16px;
    font-size:.92rem;
    margin-bottom:16px;
  }
  .booking-card .form-control::placeholder{color:#8a94a6;}
  .btn-book-now{
    background:var(--navy);
    color:#fff;
    font-weight:600;
    border:none;
    border-radius:10px;
    padding:12px 0;
    width:100%;
    font-size:.95rem;
  }
  .btn-book-now:hover{background:#081733; color:#fff;}

  @media (max-width: 991px){
    .hero-title{font-size:2.4rem;}
    .hero-img-wrap{margin-top:40px;}
    .navbar-collapse {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
    }
  }
</style>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#">
      <div class="logo-badge"><i class="fa-solid fa-heart-pulse"></i></div>
      <div>
        <div class="brand-name">Dr. {{ $portfolio->full_name }}</div>
        <div class="brand-sub">{{ $portfolio->profession }}</div>
      </div>
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link nav-link-custom" href="#hero">Home</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom" href="#services">Services</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom" href="#experience">Experience</a></li>
        <li class="nav-item"><a class="nav-link nav-link-custom" href="#booking">Contact</a></li>
      </ul>
      <a href="#booking" class="btn btn-primary-custom">Book Appointment</a>
    </div>
  </div>
</nav>

<!-- ================= HERO ================= -->
<section class="hero-section" id="hero">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="eyebrow">Hello, I'm</div>
        <h1 class="hero-title">Dr. {{ $portfolio->full_name }}</h1>
        <div class="hero-credential">Specialist in Patient Care</div>
        <div class="hero-role">{{ $portfolio->profession }}</div>
        <p class="hero-desc">{{ $portfolio->short_bio }}</p>

        <div class="d-flex gap-3 mb-4 flex-wrap">
          <a href="#booking" class="btn btn-primary-custom"><i class="fa-solid fa-calendar-check me-2"></i>Book Appointment</a>
          <a href="#about" class="btn btn-outline-custom"><i class="fa-solid fa-user-doctor me-2"></i>About Me</a>
        </div>

        <div class="d-flex gap-4 flex-wrap">
          <div class="stat-item">
            <div class="stat-icon"><i class="fa-solid fa-user-tie"></i></div>
            <div>
              <div class="stat-num">{{ $portfolio->years_of_experience }}+</div>
              <div class="stat-label">Years Experience</div>
            </div>
          </div>
          <div class="stat-item">
            <div class="stat-icon"><i class="fa-solid fa-heart-circle-check"></i></div>
            <div>
              <div class="stat-num">{{ $portfolio->happy_clients }}+</div>
              <div class="stat-label">Happy Patients</div>
            </div>
          </div>
          <div class="stat-item">
            <div class="stat-icon"><i class="fa-solid fa-award"></i></div>
            <div>
              <div class="stat-num">{{ $portfolio->completed_projects ?? 10 }}+</div>
              <div class="stat-label">Awards / Cases</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="hero-img-wrap">
          <svg class="heartbeat-line" viewBox="0 0 500 100" xmlns="http://www.w3.org/2000/svg">
            <polyline points="0,50 100,50 120,20 140,80 160,50 500,50" fill="none" stroke="#ffffff" stroke-width="3"/>
          </svg>

          <!-- We will use the photo because usually users want their photo -->
          <img src="{{ $portfolio->cover_image ?? 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?q=80&w=1000&auto=format&fit=crop' }}" class="img-fluid" style="border-radius: 30px; border: 8px solid white; box-shadow: 0 30px 60px rgba(20,97,224,0.15);" alt="{{ $portfolio->full_name }}">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= SERVICES ================= -->
<section class="section-pad" id="services">
  <div class="container">
    <div class="eyebrow">My Services</div>
    <h2 class="section-title mb-5">How I Can Help You</h2>

    <div class="row g-4">
      @forelse($services as $svc)
      <div class="col-md-6 col-lg-3">
        <div class="service-card">
          <div class="service-icon"><i class="{{ $svc->icon ?? 'fa-solid fa-stethoscope' }}"></i></div>
          <h5>{{ $svc->title }}</h5>
          <p>{{ $svc->short_description }}</p>
        </div>
      </div>
      @empty
      <div class="col-md-6 col-lg-3">
        <div class="service-card">
          <div class="service-icon"><i class="fa-solid fa-heart-pulse"></i></div>
          <h5>Heart Consultation</h5>
          <p>Comprehensive evaluation and personalized treatment for heart-related conditions.</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="service-card">
          <div class="service-icon"><i class="fa-solid fa-file-medical"></i></div>
          <h5>Medical Checkup</h5>
          <p>Advanced diagnostic testing for accurate health assessment.</p>
        </div>
      </div>
      @endforelse
    </div>
  </div>
</section>

<!-- ================= ABOUT ================= -->
<section class="section-pad pt-0" id="about">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5">
        <div class="about-img-wrap" style="background:var(--bg-soft);border-radius:18px;padding:24px;">
            <img src="{{ $portfolio->profile_photo ?? 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?q=80&w=800&auto=format&fit=crop' }}" class="img-fluid" alt="About Doctor">
        </div>
      </div>
      <div class="col-lg-7">
        <div class="eyebrow">About Me</div>
        <h2 class="section-title mb-4">Best Medical Care With Personal Touch</h2>
        <p class="hero-desc" style="max-width:600px;">
          {{ $portfolio->about_me }}
        </p>

        <ul class="about-list">
            @foreach($educations as $edu)
                <li><i class="fa-solid fa-check"></i> {{ $edu->degree }} - {{ $edu->institute }}</li>
            @endforeach
        </ul>

        <div class="exp-badge mt-4">
          <div class="icon"><i class="fa-solid fa-award"></i></div>
          <div>
            <div class="num">{{ $portfolio->years_of_experience }}+</div>
            <div class="lbl">Years of Experience</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= EXPERIENCE ================= -->
<section class="section-pad bg-light" id="experience">
    <div class="container">
        <div class="eyebrow">Professional Background</div>
        <h2 class="section-title mb-5">Clinical Experience</h2>

        <div class="row g-4">
            @forelse($experiences as $exp)
            <div class="col-md-6">
                <div class="service-card d-flex gap-3 h-100">
                    <div class="service-icon" style="flex-shrink: 0; width: 48px; height: 48px; font-size: 1.2rem;"><i class="fa-solid fa-hospital-user"></i></div>
                    <div>
                        <h5>{{ $exp->designation }}</h5>
                        <p class="fw-bold mb-1" style="color: var(--blue-700);">{{ $exp->company }}</p>
                        <p class="small text-muted mb-2"><i class="fa-regular fa-calendar me-1"></i> {{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</p>
                        <p>{{ $exp->description }}</p>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-12 text-center text-muted">
                    No experience records found.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ================= TRUST + BOOKING ================= -->
<section class="trust-section" id="booking">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6">
        <div class="eyebrow">Why Patients Trust Me</div>
        <h2 class="section-title mb-4">Committed to Excellence</h2>

        <div class="row g-3">
          <div class="col-6">
            <div class="trust-card">
              <i class="fa-solid fa-users"></i>
              <div class="num">{{ $portfolio->happy_clients }}+</div>
              <div class="lbl">Happy Patients</div>
            </div>
          </div>
          <div class="col-6">
            <div class="trust-card">
              <i class="fa-solid fa-stethoscope"></i>
              <div class="num">{{ $portfolio->years_of_experience }}+</div>
              <div class="lbl">Years Experience</div>
            </div>
          </div>
          <div class="col-6">
            <div class="trust-card">
              <i class="fa-solid fa-medal"></i>
              <div class="num">{{ $portfolio->completed_projects ?? 15 }}+</div>
              <div class="lbl">Awards Won</div>
            </div>
          </div>
          <div class="col-6">
            <div class="trust-card">
              <i class="fa-solid fa-face-smile"></i>
              <div class="num">24/7</div>
              <div class="lbl">Patient Support</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="booking-card">
          <h3>Book an Appointment</h3>
          <form id="ajaxContactForm">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
              </div>
              <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
              </div>
              <div class="col-12">
                <input type="text" name="subject" class="form-control" placeholder="Reason for Visit (Subject)" required>
              </div>
              <div class="col-12">
                <textarea name="message" class="form-control" rows="3" placeholder="Message or Details" required></textarea>
              </div>
              <div class="col-12 mt-2">
                <button type="submit" class="btn-book-now"><i class="fa-solid fa-calendar-check me-2"></i>Book Now</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
