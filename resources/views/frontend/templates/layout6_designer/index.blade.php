@extends('frontend.layouts.app')

@section('content')
<!-- Bootstrap 5.3 + Icons + Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet" />
<style>
/* CSS Variables & Reset */
:root {
  --primary: #2563EB;
  --secondary: #7C3AED;
  --accent: #06B6D4;
  --bg: #F8FAFC;
  --card: #FFFFFF;
  --dark: #0F172A;
  --text: #1E293B;
  --success: #10B981;
  --radius: 24px;
  --shadow-soft: 0 20px 40px -12px rgba(0,0,0,0.08), 0 8px 24px -6px rgba(0,0,0,0.02);
  --shadow-glass: 0 8px 32px rgba(0,0,0,0.04);
  --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}
body { font-family: 'Inter', sans-serif; background: var(--bg); color: var(--text); line-height: 1.6; scroll-behavior: smooth; }
h1,h2,h3,h4,h5,h6 { font-family: 'Poppins', sans-serif; font-weight: 700; letter-spacing: -0.02em; }
.bg-primary { background-color: var(--primary) !important; }
.btn-primary { background: var(--primary); border: none; }
.btn-primary:hover { background: #1d4ed8; }
.btn-outline-primary { border-color: var(--primary); color: var(--primary); }
.btn-outline-primary:hover { background: var(--primary); color: #fff; }
.rounded-4 { border-radius: var(--radius) !important; }
.shadow-soft { box-shadow: var(--shadow-soft); }
.glass { background: rgba(255,255,255,0.6); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.3); box-shadow: var(--shadow-glass); }
.section-title { font-size: 2.8rem; font-weight: 700; letter-spacing: -0.03em; }
.section-sub { color: #64748b; max-width: 600px; }
/* navbar */
.navbar { background: rgba(255,255,255,0.7); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px); border-bottom: 1px solid rgba(255,255,255,0.3); }
.navbar .nav-link { font-weight: 500; color: var(--text); margin: 0 8px; }
.navbar .nav-link:hover { color: var(--primary); }
/* hero */
.hero { min-height: 100vh; background: linear-gradient(145deg, #f0f5ff 0%, #e6eeff 100%); position: relative; overflow: hidden; padding-top: 100px; }
.hero .glass-card { background: rgba(255,255,255,0.5); backdrop-filter: blur(8px); border-radius: var(--radius); border: 1px solid rgba(255,255,255,0.5); padding: 1.5rem; box-shadow: var(--shadow-glass); }
.floating { animation: floatY 6s ease-in-out infinite; }
@keyframes floatY { 0% { transform: translateY(0px); } 50% { transform: translateY(-12px); } 100% { transform: translateY(0px); } }
.stat-number { font-size: 2.8rem; font-weight: 800; color: var(--dark); }
/* cards & hover */
.service-card, .team-card, .pricing-card, .blog-card { transition: var(--transition); border-radius: var(--radius); background: var(--card); box-shadow: var(--shadow-soft); border: none; overflow: hidden; }
.service-card:hover, .team-card:hover, .pricing-card:hover, .blog-card:hover { transform: translateY(-8px); box-shadow: 0 40px 60px -20px rgba(0,0,0,0.12); }
.service-icon { width: 64px; height: 64px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, var(--primary), var(--secondary)); border-radius: 20px; color: #fff; font-size: 28px; }
.testimonial-card { background: var(--card); border-radius: var(--radius); padding: 2rem; box-shadow: var(--shadow-soft); }
.portfolio-item { border-radius: var(--radius); overflow: hidden; position: relative; transition: var(--transition); }
.portfolio-item img { width: 100%; height: 280px; object-fit: cover; transition: var(--transition); }
.portfolio-item:hover img { transform: scale(1.05); }
.portfolio-overlay { position: absolute; inset: 0; background: rgba(15,23,42,0.6); backdrop-filter: blur(4px); display: flex; align-items: center; justify-content: center; opacity: 0; transition: var(--transition); color: #fff; }
.portfolio-item:hover .portfolio-overlay { opacity: 1; }
/* footer */
.footer { background: var(--dark); color: #cbd5e1; border-top: 1px solid #1e293b; }
.footer a { color: #94a3b8; text-decoration: none; transition: var(--transition); }
.footer a:hover { color: #fff; }
.social-icon { width: 44px; height: 44px; border-radius: 40px; background: rgba(255,255,255,0.05); display: inline-flex; align-items: center; justify-content: center; color: #cbd5e1; transition: var(--transition); margin-right: 8px; }
.social-icon:hover { background: var(--primary); color: #fff; }
@media (max-width: 768px) { .section-title { font-size: 2.2rem; } .hero { padding-top: 100px; } .stat-number { font-size: 2.2rem; } }
/* custom badge */
.badge-ux { background: var(--primary); color: #fff; padding: 6px 16px; border-radius: 40px; font-size: 0.75rem; font-weight: 600; letter-spacing: 0.5px; }

/* Mobile Floating Stats & Responsiveness */
@media (max-width: 768px) {
  .display-3 { font-size: 2.5rem !important; }
  .hero .position-absolute {
      position: relative !important;
      top: auto !important;
      left: auto !important;
      bottom: auto !important;
      right: auto !important;
      transform: none !important;
      margin: 15px auto !important;
      display: inline-block !important;
      width: fit-content;
  }
  .hero .col-lg-6.position-relative {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
  }
}

/* Dark Mode Variables & Classes overrides */
.dark :root {
  --bg: #0b0f19;
  --card: #1e293b;
  --text: #cbd5e1;
  --dark: #ffffff;
}
.dark body {
  background-color: var(--bg) !important;
  color: var(--text) !important;
}
.dark .navbar {
  background: rgba(15, 23, 42, 0.8) !important;
  border-bottom-color: rgba(255, 255, 255, 0.1) !important;
}
.dark .navbar .nav-link {
  color: var(--text) !important;
}
.dark .navbar-toggler {
  filter: invert(1);
}
.dark .hero {
  background: linear-gradient(145deg, #0b0f19 0%, #111827 100%) !important;
}
.dark .bg-white {
  background-color: var(--bg) !important;
  color: var(--text) !important;
}
.dark .bg-light {
  background-color: #0f172a !important;
  color: var(--text) !important;
}
.dark .border-bottom, .dark .border {
  border-color: rgba(255, 255, 255, 0.08) !important;
}
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold fs-4" href="#"><i class="bi bi-diamond-fill text-primary me-2"></i>{{ $portfolio->full_name }}</a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        @foreach($sections as $sec)
            <li class="nav-item"><a class="nav-link" href="#{{ $sec->key }}">{{ $sec->name }}</a></li>
        @endforeach
      </ul>
      <a href="#contact" class="btn btn-primary rounded-pill px-4">Get Started</a>
    </div>
  </div>
</nav>

<!-- Hero -->
<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <span class="badge bg-primary bg-opacity-10 rounded-pill px-3 py-2 mb-3">{{ $portfolio->profession }}</span>
        <h1 class="display-3 fw-bold lh-1 mb-3">{{ $portfolio->full_name }}</h1>
        <p class="lead mb-4 text-secondary">{{ $portfolio->short_bio }}</p>
        <div class="d-flex flex-wrap gap-3 mb-4">
          <a href="#portfolio" class="btn btn-primary rounded-pill px-5 py-3">View Portfolio <i class="bi bi-arrow-right ms-2"></i></a>
          <a href="#contact" class="btn btn-outline-primary rounded-pill px-5 py-3">Contact Me</a>
        </div>
        <div class="d-flex flex-wrap gap-4 mt-4">
          <div class="glass-card floating"><i class="bi bi-star-fill text-warning me-1"></i> {{ $portfolio->awards_count ?? 5 }} Awards</div>
          <div class="glass-card floating" style="animation-delay:0.2s;"><i class="bi bi-people-fill text-primary me-1"></i> {{ $portfolio->completed_projects }}+ Projects</div>
        </div>
      </div>
      <div class="col-lg-6 position-relative">
        <div class="glass p-4 rounded-4 shadow-soft">
          <img src="{{ $portfolio->profile_photo }}" class="img-fluid rounded-4 w-100" style="object-fit:cover; max-height:500px;" alt="hero">
        </div>
        <!-- floating stats -->
        <div class="position-absolute top-0 start-0 translate-middle glass px-4 py-2 rounded-4 shadow-soft floating">
          <span class="stat-number" data-count="100">0</span><span class="fs-4 fw-bold">%</span> <span class="text-muted">Satisfaction</span>
        </div>
        <div class="position-absolute bottom-0 end-0 translate-middle glass px-4 py-2 rounded-4 shadow-soft floating" style="animation-delay:0.4s;">
          <span class="stat-number" data-count="{{ $portfolio->years_of_experience }}">0</span>+ <span class="text-muted">Years Exp.</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Trusted Brands (Clients) -->
{{-- @if(isset($clients) && count($clients) > 0)
<section class="py-5 bg-white border-bottom">
  <div class="container">
    <p class="text-center text-secondary text-uppercase small fw-semibold tracking-wider">Trusted by top companies</p>
    <div class="row row-cols-2 row-cols-md-5 g-4 justify-content-center align-items-center">
      @foreach($clients as $client)
        <div class="col text-center">
            @if($client->logo)
                <img src="{{ $client->logo }}" class="img-fluid opacity-50" style="max-height:50px; object-fit:contain;" alt="{{ $client->name }}">
            @else
                <h5 class="opacity-50 mb-0">{{ $client->name }}</h5>
            @endif
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif --}}

<!-- About Section -->
<section id="about" class="py-5 bg-white">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-6">
        <div id="experience" class="glass p-4 rounded-4 shadow-soft" style="background: linear-gradient(145deg, #f0f5ff 0%, #e6eeff 100%);">
            <h3 class="mb-4">Experience</h3>
            @foreach($experiences as $exp)
                <div class="mb-3 p-3 bg-white rounded-3 shadow-sm">
                    <h5 class="mb-1 text-primary">{{ $exp->designation }}</h5>
                    <div class="d-flex justify-content-between small text-secondary fw-bold mb-2">
                        <span>{{ $exp->company }}</span>
                        <span>{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</span>
                    </div>
                    <p class="mb-0 small text-muted">{{ $exp->description }}</p>
                </div>
            @endforeach
        </div>
      </div>
      <div class="col-lg-6">
        <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">About Me</span>
        <h2 class="section-title mt-2">Crafted with <span class="text-primary">precision</span> & passion</h2>
        <p class="text-secondary mb-4 fs-5">{{ $portfolio->about_me }}</p>

        <h4 id="education" class="mb-3 mt-5">Education</h4>
        @foreach($educations as $edu)
            <div class="mb-3 pb-3 border-bottom">
                <h5 class="mb-1">{{ $edu->degree }}</h5>
                <div class="text-secondary small fw-bold">
                    {{ $edu->institute }} | {{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- Services -->
<section id="services" class="py-5 bg-light">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">Services</span>
      <h2 class="section-title mt-2">Premium solutions <br class="d-md-none"> for your business</h2>
      <p class="section-sub mx-auto">Modern, elegant, and conversion-focused design systems crafted with care.</p>
    </div>
    <div class="row g-4">
      @foreach($services as $svc)
      <div class="col-md-4">
        <div class="service-card p-4 h-100">
          <div class="service-icon mb-3"><i class="{{ $svc->icon ?? 'bi bi-palette' }}"></i></div>
          <h4>{{ $svc->title }}</h4>
          <p class="text-secondary">{{ $svc->short_description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Skills / Features -->
<section id="skills" class="py-5 bg-white">
  <div class="container">
    <h2 class="section-title text-center">Expertise & Tools</h2>
    <p class="section-sub text-center mx-auto mb-5">Built for speed, accessibility, and premium feel.</p>
    <div class="row g-4">
      @foreach($skillCategories as $cat)
        @foreach($cat->skills as $skill)
        <div class="col-md-3 col-sm-6">
            <div class="p-4 bg-light rounded-4 shadow-soft h-100 text-center service-card">
                <h5 class="mt-2">{{ $skill->name }}</h5>
                <p class="text-primary fw-bold mb-0">{{ $skill->proficiency }}%</p>
                <div class="progress mt-2" style="height: 6px;">
                    <div class="progress-bar bg-primary rounded-pill" style="width: {{ $skill->proficiency }}%;"></div>
                </div>
            </div>
        </div>
        @endforeach
      @endforeach
    </div>
  </div>
</section>

<!-- Portfolio -->
<section id="projects" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center">Portfolio</h2>
    <p class="section-sub text-center mx-auto mb-5">Explore my recent premium design case studies.</p>
    <div class="row g-4">
      @forelse($projects as $proj)
      <div class="col-md-4">
        <div class="portfolio-item service-card bg-white p-3 h-100 d-flex flex-column">
          <div class="position-relative rounded-3 overflow-hidden mb-3">
              <img src="{{ $proj->cover_image }}" alt="{{ $proj->title }}" class="w-100" style="height:250px; object-fit:cover;">
              <div class="portfolio-overlay">
                  <a href="{{ $proj->live_url ?? '#' }}" class="btn btn-primary rounded-pill">View Project</a>
              </div>
          </div>
          <h5 class="mb-1">{{ $proj->title }}</h5>
          <span class="badge bg-primary bg-opacity-10 text-primary mb-2 align-self-start">{{ $proj->category->name ?? 'Design' }}</span>
          <p class="text-secondary small">{{ $proj->short_description }}</p>
        </div>
      </div>
      @empty
        <div class="col-12 text-center text-muted">No projects found.</div>
      @endforelse
    </div>
  </div>
</section>

<!-- Certificates -->
<section id="certificates" class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">Achievements</span>
      <h2 class="section-title mt-2">Certifications</h2>
    </div>
    <div class="row g-4">
      @forelse($certificates as $cert)
      <div class="col-md-4">
        <div class="service-card p-4 h-100 d-flex align-items-center gap-3">
          <div class="service-icon flex-shrink-0" style="width: 50px; height: 50px; font-size: 20px;"><i class="bi bi-award-fill"></i></div>
          <div>
              <h5 class="mb-1">{{ $cert->title }}</h5>
              <div class="text-secondary small">{{ $cert->provider }}</div>
              <div class="text-muted small">{{ \Carbon\Carbon::parse($cert->issue_date)->format('M Y') }}</div>
          </div>
        </div>
      </div>
      @empty
        <div class="col-12 text-center text-muted">No certificates found.</div>
      @endforelse
    </div>
  </div>
</section>

<!-- Testimonials -->
<section id="testimonials" class="py-5 bg-light">
  <div class="container">
    <h2 class="section-title text-center">What clients say</h2>
    <div id="testimonialCarousel" class="carousel slide mt-4" data-bs-ride="carousel">
      <div class="carousel-inner">
        @forelse($testimonials as $idx => $test)
        <div class="carousel-item {{ $idx == 0 ? 'active' : '' }}">
            <div class="testimonial-card text-center mx-auto" style="max-width:700px;">
                @if($test->client_image)
                    <img src="{{ $test->client_image }}" class="rounded-circle mb-3" style="width:80px;height:80px;object-fit:cover;" alt="{{ $test->client_name }}">
                @else
                    <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width:80px;height:80px;font-size:24px;font-weight:bold;">
                        {{ substr($test->client_name, 0, 1) }}
                    </div>
                @endif
                <h5>{{ $test->client_name }}</h5>
                <span class="text-muted small d-block mb-3">{{ $test->designation }}</span>
                <p class="text-secondary fs-5 fst-italic">"{{ $test->review }}"</p>
                <div class="text-warning">
                    @for($i=1; $i<=5; $i++)
                        <i class="bi bi-star-fill {{ $i <= $test->rating ? '' : 'text-muted opacity-25' }}"></i>
                    @endfor
                </div>
            </div>
        </div>
        @empty
            <div class="col-12 text-center text-muted">No testimonials available.</div>
        @endforelse
      </div>
      @if(count($testimonials) > 1)
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev" style="width: 50px;">
          <span class="carousel-control-prev-icon bg-dark rounded-circle p-3" style="width:40px;height:40px;"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next" style="width: 50px;">
          <span class="carousel-control-next-icon bg-dark rounded-circle p-3" style="width:40px;height:40px;"></span>
      </button>
      @endif
    </div>
  </div>
</section>

<!-- Blog -->
<section id="blog" class="py-5 bg-white">
  <div class="container">
    <div class="text-center mb-5">
      <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">Insights</span>
      <h2 class="section-title mt-2">Latest Articles</h2>
    </div>
    <div class="row g-4">
      @forelse($recentBlogs as $blog)
      <div class="col-md-4">
        <div class="blog-card p-3 h-100">
          <img src="{{ $blog->cover_image }}" class="img-fluid rounded-4 w-100 mb-3" style="height:200px; object-fit:cover;" alt="{{ $blog->title }}">
          <div class="d-flex justify-content-between align-items-center mb-2">
              <span class="badge bg-light text-primary">{{ $blog->category->name ?? 'Design' }}</span>
              <span class="text-muted small">{{ \Carbon\Carbon::parse($blog->published_at)->format('d M, Y') }}</span>
          </div>
          <h5 class="mt-2">{{ $blog->title }}</h5>
          <p class="text-secondary small">{{ Str::limit($blog->excerpt, 100) }}</p>
        </div>
      </div>
      @empty
        <div class="col-12 text-center text-muted">No articles published yet.</div>
      @endforelse
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5 bg-light">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5">
        <h2 class="section-title">Get in touch</h2>
        <p class="text-secondary mb-4">Have a project in mind? Let's discuss how we can work together to create something premium.</p>

        <div class="d-flex flex-column gap-3 mb-4">
            @if(isset($siteSettings) && $siteSettings->contact_email)
            <div class="d-flex align-items-center gap-3">
                <div class="service-icon bg-white text-primary shadow-sm" style="width:45px;height:45px;font-size:20px;background:none;"><i class="bi bi-envelope"></i></div>
                <span class="fs-5 fw-semibold">{{ $siteSettings->contact_email }}</span>
            </div>
            @endif
            @if(isset($siteSettings) && $siteSettings->contact_phone)
            <div class="d-flex align-items-center gap-3">
                <div class="service-icon bg-white text-primary shadow-sm" style="width:45px;height:45px;font-size:20px;background:none;"><i class="bi bi-telephone"></i></div>
                <span class="fs-5 fw-semibold">{{ $siteSettings->contact_phone }}</span>
            </div>
            @endif
        </div>
      </div>
      <div class="col-lg-7">
        <div class="glass p-4 p-md-5 rounded-4 shadow-soft bg-white">
            <form id="ajaxContactForm">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control bg-light border-0 py-3 rounded-3" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control bg-light border-0 py-3 rounded-3" placeholder="Your Email" required>
                    </div>
                    <div class="col-12">
                        <input type="text" name="subject" class="form-control bg-light border-0 py-3 rounded-3" placeholder="Subject" required>
                    </div>
                    <div class="col-12">
                        <textarea name="message" class="form-control bg-light border-0 py-3 rounded-3" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="col-12 mt-4">
                        <button class="btn btn-primary rounded-pill px-5 py-3 fw-bold w-100">Send Message <i class="bi bi-send ms-2"></i></button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="footer py-5 mt-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <h5 class="text-white fw-bold mb-3"><i class="bi bi-diamond-fill text-primary me-2"></i>{{ $portfolio->full_name }}</h5>
        <p class="text-secondary" style="max-width:300px;">{{ $portfolio->short_bio }}</p>
        <div class="d-flex gap-2 mt-3">
          @if(isset($siteSettings) && $siteSettings->facebook_url) <a href="{{ $siteSettings->facebook_url }}" class="social-icon"><i class="bi bi-facebook"></i></a> @endif
          @if(isset($siteSettings) && $siteSettings->twitter_url) <a href="{{ $siteSettings->twitter_url }}" class="social-icon"><i class="bi bi-twitter-x"></i></a> @endif
          @if(isset($siteSettings) && $siteSettings->linkedin_url) <a href="{{ $siteSettings->linkedin_url }}" class="social-icon"><i class="bi bi-linkedin"></i></a> @endif
          @if(isset($siteSettings) && $siteSettings->github_url) <a href="{{ $siteSettings->github_url }}" class="social-icon"><i class="bi bi-github"></i></a> @endif
        </div>
      </div>
      <div class="col-md-2">
        <h6 class="text-white mb-3">Quick links</h6>
        <a href="#about" class="text-secondary text-decoration-none d-block mb-2">About</a>
        <a href="#services" class="text-secondary text-decoration-none d-block mb-2">Services</a>
        <a href="#projects" class="text-secondary text-decoration-none d-block mb-2">Portfolio</a>
      </div>
      <div class="col-md-2">
        <h6 class="text-white mb-3">Resources</h6>
        <a href="#blog" class="text-secondary text-decoration-none d-block mb-2">Blog</a>
        <a href="#certificates" class="text-secondary text-decoration-none d-block mb-2">Certificates</a>
        <a href="#contact" class="text-secondary text-decoration-none d-block mb-2">Support</a>
      </div>
      <div class="col-md-4">
        <h6 class="text-white mb-3">Subscribe</h6>
        <div class="input-group">
          <input type="email" class="form-control bg-dark text-white border-secondary" placeholder="Email address">
          <button class="btn btn-primary px-4">Subscribe</button>
        </div>
      </div>
    </div>
    <hr class="border-secondary my-4">
    <p class="text-center text-secondary small mb-0">© {{ date('Y') }} {{ $portfolio->full_name }}. All rights reserved.</p>
  </div>
</footer>

<script>
  document.addEventListener('DOMContentLoaded', function(){
    const counters = document.querySelectorAll('.stat-number');
    const speed = 100;
    counters.forEach(counter => {
      const updateCounter = () => {
        const target = +counter.getAttribute('data-count');
        const current = +counter.innerText;
        const inc = Math.ceil(target / speed);
        if(current < target) {
          counter.innerText = current + inc;
          setTimeout(updateCounter, 20);
        } else {
          counter.innerText = target;
        }
      };
      updateCounter();
    });
  });
</script>
@endsection
