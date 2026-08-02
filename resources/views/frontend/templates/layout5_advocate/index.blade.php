@extends('frontend.layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,500&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
  :root {
    --navy: #0B1F3A;
    --navy-2: #122649;
    --navy-3: #0E2038;
    --gold: #C9A227;
    --gold-light: #E4C878;
    --ivory: #F7F5EF;
    --white: #FFFFFF;
    --gray: #68707D;
    --gray-light: #C7CCD4;
    --line: rgba(201,162,39,0.28);
    --ease: cubic-bezier(.22,1,.36,1);
  }

  html { scroll-behavior: smooth; }
  
  body {
    font-family: 'Inter', sans-serif;
    color: var(--navy);
    background: var(--ivory) !important;
    line-height: 1.65;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
  }
  
  h1, h2, h3, h4 { 
    font-family: 'Playfair Display', serif; 
    font-weight: 600; 
    letter-spacing: .2px; 
    color: var(--navy);
  }
  
  a { text-decoration: none; color: inherit; }
  ul { list-style: none; padding-left: 0; margin-bottom: 0; }
  img { max-width: 100%; display: block; }
  .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 28px; }

  ::selection { background: var(--gold); color: var(--navy); }

  /* Focus visibility */
  a:focus-visible, button:focus-visible, input:focus-visible, textarea:focus-visible, select:focus-visible {
    outline: 2px solid var(--gold); outline-offset: 3px;
  }

  .eyebrow {
    display: inline-flex; align-items: center; gap: 10px;
    font-family: 'Inter', sans-serif; font-size: 12.5px; letter-spacing: 2.6px; text-transform: uppercase;
    color: var(--gold); font-weight: 600; margin-bottom: 18px;
  }
  .eyebrow::before { content: ""; width: 26px; height: 1px; background: var(--gold); display: inline-block; }

  /* ============ NAV ============ */
  #siteHeader {
    position: fixed; top: 0; left: 0; right: 0; z-index: 1000;
    padding: 22px 0;
    transition: all .45s var(--ease);
  }
  #siteHeader.scrolled {
    background: rgba(11,31,58,0.86);
    backdrop-filter: blur(14px) saturate(140%);
    -webkit-backdrop-filter: blur(14px) saturate(140%);
    padding: 14px 0;
    box-shadow: 0 8px 30px rgba(0,0,0,0.18);
  }
  .custom-nav { display: flex; align-items: center; justify-content: space-between; }
  .brand { display: flex; align-items: center; gap: 12px; }
  .brand-mark { width: 38px; height: 38px; flex-shrink: 0; }
  .brand-text { display: flex; flex-direction: column; line-height: 1.15; }
  .brand-text b { font-family: 'Playfair Display', serif; font-size: 18px; color: #fff; font-weight: 600; }
  .brand-text span { font-size: 10px; letter-spacing: 2px; color: var(--gold-light); text-transform: uppercase; }

  .nav-links { display: flex; align-items: center; gap: 38px; margin-bottom: 0; }
  .nav-links a {
    color: #EDEFF3; font-size: 14.5px; font-weight: 500; position: relative; padding: 6px 0; text-decoration: none;
  }
  .nav-links a::after {
    content: ""; position: absolute; left: 0; bottom: 0; width: 0; height: 1px; background: var(--gold);
    transition: width .35s var(--ease);
  }
  .nav-links a:hover::after { width: 100%; }
  .nav-cta {
    background: linear-gradient(135deg, var(--gold) 0%, #b38f21 100%);
    color: var(--navy) !important;
    padding: 10px 24px !important;
    border-radius: 50px;
    font-weight: 700 !important;
    font-size: 14px !important;
    letter-spacing: 0.5px;
    transition: all .4s var(--ease);
    border: 1px solid transparent;
    box-shadow: 0 4px 15px rgba(201,162,39,0.3);
  }
  .nav-cta:hover { 
    background: transparent; 
    color: var(--gold) !important; 
    border-color: var(--gold);
    transform: translateY(-3px); 
    box-shadow: 0 10px 24px rgba(201,162,39,0.4); 
  }
  .nav-links a.nav-cta::after { display: none !important; }

  .burger { display: none; flex-direction: column; gap: 5px; cursor: pointer; z-index: 1100; background: none; border: none; }
  .burger span { width: 26px; height: 2px; background: #fff; transition: all .3s var(--ease); }

  /* ============ HERO ============ */
  .hero {
    position: relative; min-height: 100vh; display: flex; align-items: center;
    background: linear-gradient(160deg, var(--navy) 0%, var(--navy-3) 55%, #0A1A30 100%);
    overflow: hidden;
  }
  .hero::before {
    content: ""; position: absolute; inset: 0;
    background-image:
      radial-gradient(circle at 82% 20%, rgba(201,162,39,0.16), transparent 45%),
      radial-gradient(circle at 15% 85%, rgba(201,162,39,0.10), transparent 40%);
    pointer-events: none;
  }
  .hero-grid {
    position: relative; z-index: 2; display: grid; grid-template-columns: 1.05fr .95fr; gap: 40px;
    align-items: center; width: 100%; padding-top: 110px; padding-bottom: 60px;
  }
  .hero-copy .eyebrow { color: var(--gold-light); }
  .hero-copy h1 {
    font-family: 'Playfair Display', serif;
    font-size: clamp(34px, 4.6vw, 58px); color: #fff; font-weight: 700; line-height: 1.28; letter-spacing: .2px;
  }
  .hero-copy h1 em { font-style: normal; color: var(--gold-light); }
  .hero-sub {
    margin-top: 24px; font-size: 17px; color: #C9D0DC; max-width: 520px; font-weight: 300; line-height: 1.8;
  }
  .hero-sub b { color: #fff; font-weight: 500; }
  .hero-actions { display: flex; gap: 16px; margin-top: 40px; flex-wrap: wrap; }
  .btn-primary, .btn-ghost {
    display: inline-flex; align-items: center; gap: 10px; padding: 16px 30px; border-radius: 14px;
    font-size: 15px; font-weight: 600; transition: all .35s var(--ease); border: 1px solid transparent; text-decoration: none;
  }
  .btn-primary { background: var(--gold); color: var(--navy); }
  .btn-primary:hover { background: var(--gold-light); transform: translateY(-3px); box-shadow: 0 16px 32px rgba(201,162,39,0.3); color: var(--navy); }
  .btn-ghost { color: #fff; border-color: rgba(255,255,255,0.28); }
  .btn-ghost:hover { border-color: var(--gold); color: var(--gold-light); background: rgba(255,255,255,0.04); }

  .hero-stats { display: flex; gap: 0; margin-top: 64px; flex-wrap: wrap; }
  .hero-stats div { padding: 0 28px; border-right: 1px solid rgba(255,255,255,0.14); }
  .hero-stats div:first-child { padding-left: 0; }
  .hero-stats div:last-child { border-right: none; }
  .hero-stats b { display: block; font-family: 'Playfair Display', serif; font-size: 30px; color: var(--gold-light); font-weight: 600; }
  .hero-stats span { font-size: 12px; color: #9CA6B5; letter-spacing: .5px; text-transform: uppercase; }

  .hero-visual { position: relative; display: flex; justify-content: center; align-items: center; }
  .portrait-frame {
    position: relative; width: 100%; max-width: 420px; aspect-ratio: 3/4; border-radius: 20px; overflow: hidden;
    box-shadow: 0 40px 80px rgba(0,0,0,0.45);
    border: 1px solid rgba(201,162,39,0.35);
  }
  .portrait-frame img { width: 100%; height: 100%; object-fit: cover; filter: saturate(0.94) contrast(1.04); }
  .portrait-frame::after {
    content: ""; position: absolute; inset: 0; background: linear-gradient(0deg, rgba(11,31,58,0.55), transparent 45%);
  }
  .seal {
    position: absolute; bottom: -34px; left: -34px; width: 118px; height: 118px; z-index: 3;
    animation: spin 34s linear infinite;
  }
  .seal-center {
    position: absolute; bottom: -34px; left: -34px; width: 118px; height: 118px; z-index: 4;
    display: flex; align-items: center; justify-content: center;
  }
  @keyframes spin { to { transform: rotate(360deg); } }
  .scroll-cue {
    position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); z-index: 3;
    display: flex; flex-direction: column; align-items: center; gap: 8px; color: #8C97A8; font-size: 11px; letter-spacing: 2px;
  }
  .scroll-cue .line { width: 1px; height: 38px; background: linear-gradient(180deg, var(--gold), transparent); animation: pulse 2.2s ease infinite; }
  @keyframes pulse { 0%,100% {opacity: .3;} 50% {opacity: 1;} }

  /* ============ SECTION GENERIC ============ */
  .custom-section { padding: 120px 0; }
  .section-head { max-width: 640px; margin-bottom: 64px; }
  .section-head h2 { font-size: clamp(28px, 3.4vw, 42px); line-height: 1.3; }
  .section-head p { margin-top: 18px; color: var(--gray); font-size: 16px; max-width: 560px; }
  .center { text-align: center; margin-left: auto; margin-right: auto; }

  .reveal { opacity: 0; transform: translateY(28px); transition: all .9s var(--ease); }
  .reveal.in { opacity: 1; transform: none; }

  /* ============ ABOUT ============ */
  .about { background: var(--white); }
  .about-grid { display: grid; grid-template-columns: .85fr 1.15fr; gap: 70px; align-items: center; }
  .about-img { position: relative; }
  .about-img img { border-radius: 20px; width: 100%; height: 520px; object-fit: cover; box-shadow: 0 30px 60px rgba(11,31,58,0.14); }
  .credential-card {
    position: absolute; bottom: -30px; right: -30px; background: var(--navy); color: #fff; padding: 26px 30px;
    border-radius: 16px; width: 210px; box-shadow: 0 20px 40px rgba(11,31,58,0.3); border: 1px solid var(--line);
  }
  .credential-card b { font-family: 'Playfair Display', serif; font-size: 26px; color: var(--gold-light); display: block; }
  .credential-card span { font-size: 12.5px; color: #B7C0CD; }

  .about-copy h3 { font-size: 22px; margin-bottom: 6px; }
  .about-copy .role { color: var(--gold); font-size: 13px; letter-spacing: 1.6px; text-transform: uppercase; font-weight: 600; margin-bottom: 22px; display: block;}
  .about-copy p { color: var(--gray); margin-bottom: 16px; font-size: 16px; }
  .cred-list { margin-top: 28px; display: grid; grid-template-columns: 1fr 1fr; gap: 16px 30px; }
  .cred-list li { display: flex; gap: 12px; align-items: flex-start; font-size: 14.5px; color: var(--navy); }
  .cred-list svg { flex-shrink: 0; margin-top: 2px; }

  /* ============ PRACTICE AREAS ============ */
  .practice {
    background: var(--navy);
    position: relative;
    color: #fff;
  }
  .practice::before {
    content: ""; position: absolute; inset: 0;
    background: radial-gradient(circle at 90% 10%, rgba(201,162,39,0.12), transparent 40%);
  }
  .practice .section-head h2, .practice .eyebrow { color: #fff; }
  .practice .eyebrow { color: var(--gold-light); }
  .practice .section-head p { color: #AEB8C6; }

  .grid-cards { position: relative; display: grid; grid-template-columns: repeat(3, 1fr); gap: 26px; }
  .p-card {
    background: linear-gradient(160deg, rgba(255,255,255,0.07), rgba(255,255,255,0.02));
    border: 1px solid rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 20px; padding: 38px 32px; transition: all .4s var(--ease);
  }
  .p-card:hover {
    transform: translateY(-8px);
    border-color: var(--gold);
    box-shadow: 0 24px 50px rgba(0,0,0,0.35);
    background: linear-gradient(160deg, rgba(201,162,39,0.10), rgba(255,255,255,0.02));
  }
  .p-card .icon {
    width: 52px; height: 52px; border-radius: 14px; display: flex; align-items: center; justify-content: center;
    background: rgba(201,162,39,0.14); border: 1px solid rgba(201,162,39,0.4); margin-bottom: 24px; color: var(--gold-light); font-size: 1.5rem;
  }
  .p-card h3 { color: #fff; font-size: 19px; margin-bottom: 12px; }
  .p-card p { color: #A9B3C2; font-size: 14.5px; }

  /* ============ PROCESS ============ */
  .process { background: var(--ivory); }
  .process-list { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0; position: relative; }
  .process-list::before {
    content: ""; position: absolute; top: 26px; left: 6%; right: 6%; height: 1px;
    background: repeating-linear-gradient(90deg, var(--gold) 0 8px, transparent 8px 16px);
    opacity: .5;
  }
  .p-step { position: relative; padding-right: 20px; }
  .p-step .num {
    font-family: 'Playfair Display', serif; font-size: 15px; color: var(--navy); background: var(--gold);
    width: 52px; height: 52px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
    font-weight: 700; margin-bottom: 26px; position: relative; z-index: 2; box-shadow: 0 10px 22px rgba(201,162,39,0.35);
  }
  .p-step h4 { font-size: 18px; margin-bottom: 10px; }
  .p-step p { color: var(--gray); font-size: 14.5px; }

  /* ============ TESTIMONIALS ============ */
  .testimonials { background: var(--white); }
  .t-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 26px; }
  .t-card {
    background: var(--ivory); border-radius: 20px; padding: 36px 32px; position: relative; border: 1px solid rgba(11,31,58,0.06);
  }
  .t-card .quote { font-family: 'Playfair Display', serif; font-size: 46px; color: var(--gold); line-height: 0; display: block; margin-bottom: 16px; }
  .t-card p { font-size: 15px; color: var(--navy); opacity: .85; margin-bottom: 22px; font-style: italic; }
  .t-card .who { display: flex; align-items: center; gap: 12px; }
  .t-card .avatar { width: 44px; height: 44px; border-radius: 50%; background: var(--navy); color: var(--gold-light); display: flex; align-items: center; justify-content: center; font-family: 'Playfair Display',serif; font-weight: 600; }
  .t-card .who b { display: block; font-size: 14px; }
  .t-card .who span { font-size: 12.5px; color: var(--gray); }

  /* ============ CONTACT ============ */
  .contact { background: var(--navy); color: #fff; position: relative; overflow: hidden; }
  .contact::before { content: ""; position: absolute; inset: 0; background: radial-gradient(circle at 8% 90%, rgba(201,162,39,0.14), transparent 40%); }
  .contact-grid { position: relative; display: grid; grid-template-columns: .9fr 1.1fr; gap: 60px; }
  .contact-info .eyebrow { color: var(--gold-light); }
  .contact-info h2 { color: #fff; font-size: clamp(26px, 3vw, 36px); margin-bottom: 22px; }
  .contact-info p { color: #AEB8C6; margin-bottom: 34px; max-width: 420px; }
  .info-row { display: flex; gap: 16px; align-items: flex-start; margin-bottom: 26px; }
  .info-row .ic { width: 44px; height: 44px; border-radius: 12px; background: rgba(201,162,39,0.14); border: 1px solid rgba(201,162,39,0.4); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
  .info-row b { display: block; font-size: 14.5px; color: #fff; margin-bottom: 3px;}
  .info-row span { font-size: 13.5px; color: #9CA6B5; }

  .form-card {
    background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.14); border-radius: 22px; padding: 44px;
    backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
  }
  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; margin-bottom: 18px; }
  .form-card input, .form-card select, .form-card textarea {
    width: 100%; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.18); color: #fff;
    padding: 14px 16px; border-radius: 12px; font-family: 'Inter', sans-serif; font-size: 14.5px;
    transition: border-color .3s var(--ease);
  }
  .form-card input::placeholder, .form-card textarea::placeholder { color: #8894A3; }
  .form-card input:focus, .form-card select:focus, .form-card textarea:focus { border-color: var(--gold); background: rgba(255,255,255,0.09); outline: none; }
  .form-card label { font-size: 12.5px; color: #AEB8C6; display: block; margin-bottom: 8px; letter-spacing: .4px; }
  .form-card .full { margin-bottom: 18px; }
  .submit-btn {
    width: 100%; padding: 16px; border-radius: 12px; background: var(--gold); color: var(--navy); font-weight: 700;
    font-size: 15px; border: none; cursor: pointer; transition: all .3s var(--ease); margin-top: 8px;
  }
  .submit-btn:hover { background: var(--gold-light); box-shadow: 0 16px 30px rgba(201,162,39,0.3); transform: translateY(-2px); }

  /* ============ FOOTER ============ */
  footer { background: #08192E; color: #fff; padding: 70px 0 30px; }
  .footer-grid { display: grid; grid-template-columns: 1.4fr 1fr 1fr 1fr; gap: 50px; margin-bottom: 60px; }
  .footer-brand b { font-family: 'Playfair Display', serif; font-size: 22px; }
  .footer-brand p { color: #8994A6; font-size: 14px; margin-top: 16px; max-width: 280px; }
  .footer-col h5 { font-size: 13px; letter-spacing: 1.6px; text-transform: uppercase; color: var(--gold-light); margin-bottom: 20px; font-weight: 600; }
  .footer-col li { margin-bottom: 12px; }
  .footer-col a { color: #AEB8C6; font-size: 14.5px; transition: color .25s; text-decoration: none; }
  .footer-col a:hover { color: var(--gold-light); }
  .footer-bottom { border-top: 1px solid rgba(255,255,255,0.1); padding-top: 26px; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 12px; color: #7C879A; font-size: 13px; }

  /* ============ RESPONSIVE ============ */
  @media (max-width: 980px) {
    .nav-links { position: fixed; top: 0; right: -100%; height: 100vh; width: 78%; max-width: 320px;
      background: rgba(11,31,58,0.98); flex-direction: column; justify-content: center; gap: 34px;
      transition: right .45s var(--ease); backdrop-filter: blur(14px); }
    .nav-links.open { right: 0; }
    .burger { display: flex; }
    .hero-grid { grid-template-columns: 1fr; padding-top: 130px; }
    .hero-visual { order: -1; max-width: 320px; margin: 0 auto 20px; }
    .about-grid, .contact-grid { grid-template-columns: 1fr; }
    .about-img img { height: 400px; }
    .credential-card { right: 12px; bottom: -24px; }
    .grid-cards { grid-template-columns: repeat(2, 1fr); }
    .process-list { grid-template-columns: repeat(2, 1fr); gap: 40px 20px; }
    .process-list::before { display: none; }
    .t-grid { grid-template-columns: 1fr; }
    .footer-grid { grid-template-columns: 1fr 1fr; }
    .form-row { grid-template-columns: 1fr; }
  }
  @media (max-width: 600px) {
    .custom-section { padding: 80px 0; }
    .hero-stats { gap: 0; }
    .hero-stats div { padding: 0 16px 0 0; margin-right: 16px; border-right: 1px solid rgba(255,255,255,0.14);}
    .grid-cards { grid-template-columns: 1fr; }
    .process-list { grid-template-columns: 1fr; }
    .footer-grid { grid-template-columns: 1fr; gap: 34px; }
    .form-card { padding: 28px; }
  }

  @media (prefers-reduced-motion: reduce) {
    * { animation-duration: .001ms !important; animation-iteration-count: 1 !important; transition-duration: .001ms !important; scroll-behavior: auto !important; }
  }

  /* Active Burger Animation */
  .burger.active span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
  .burger.active span:nth-child(2) { opacity: 0; }
  .burger.active span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

  /* Dark Mode Support */
  .dark body {
    background: #0B1F3A !important;
    color: #F7F5EF;
  }
  .dark h1, .dark h2, .dark h3, .dark h4, .dark .brand-text b {
    color: #FFFFFF !important;
  }
  .dark .about, .dark .testimonials, .dark .form-card {
    background: #122649 !important;
  }
  .dark .p-card, .dark .t-card, .dark .p-step .num {
    background: rgba(255, 255, 255, 0.03) !important;
    border-color: rgba(255, 255, 255, 0.08) !important;
  }
  .dark .t-card p, .dark .p-step p, .dark .about-copy p, .dark .section-head p, .dark .info-row span {
    color: #C7CCD4 !important;
  }
  .dark .t-card .who b, .dark .p-step h4, .dark .about-copy h3, .dark .info-row b {
    color: #FFFFFF !important;
  }
</style>

<!-- ============ HEADER ============ -->
<header id="siteHeader">
  <div class="container custom-nav">
    <a href="#top" class="brand">
      <svg class="brand-mark" viewBox="0 0 48 48" fill="none">
        <circle cx="24" cy="24" r="22" stroke="#C9A227" stroke-width="1.4"/>
        <path d="M24 10v28M14 16l10-6 10 6M16 16l-5 12h10l-5-12zM32 16l-5 12h10l-5-12zM14 34h20" stroke="#C9A227" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      <span class="brand-text">
        <b>{{ $portfolio->full_name }}</b>
        <span>Legal Consultancy</span>
      </span>
    </a>
    <ul class="nav-links" id="navLinks">
      <li><a href="#about">About Us</a></li>
      <li><a href="#services">Practice Areas</a></li>
      <li><a href="#process">Work Process</a></li>
      <li><a href="#testimonials">Testimonials</a></li>
      <li><a href="#contact" class="nav-cta">Book Consultation</a></li>
    </ul>
    <button class="burger" id="burger" aria-label="Open Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<!-- ============ HERO ============ -->
<section class="hero custom-section" id="top">
  <div class="container hero-grid">
    <div class="hero-copy">
      <span class="eyebrow">{{ $siteSettings->address ?? 'Dhaka, Bangladesh' }} &middot; {{ $portfolio->years_of_experience ?? '20' }} Years Experience</span>
      <h1>Trusted Solutions for Your <em>Legal Problems</em></h1>
      <p class="hero-sub">
        Clear guidance and strong representation in complex legal matters — <b>{{ $portfolio->full_name }}</b> stands by your side in family, property, criminal, and corporate law at every step, with integrity and professionalism.
      </p>
      <div class="hero-actions">
        <a href="#contact" class="btn-primary">
          Book Free Consultation &rarr;
        </a>
        <a href="tel:{{ $siteSettings->phone ?? '+8801700000000' }}" class="btn-ghost">Call Now</a>
      </div>
      <div class="hero-stats">
        <div><b>{{ $portfolio->years_of_experience ?? '20' }}+</b><span>Years Experience</span></div>
        <div><b>{{ $portfolio->completed_projects ?? '850' }}+</b><span>Cases Solved</span></div>
        <div><b>{{ $portfolio->happy_clients ?? '97' }}%</b><span>Satisfied Clients</span></div>
        <div><b>{{ $services->count() > 0 ? $services->count() : '6' }}</b><span>Practice Areas</span></div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="portrait-frame">
        <img src="{{ $portfolio->cover_image ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1000&auto=format&fit=crop' }}" alt="{{ $portfolio->full_name }}" loading="eager">
      </div>
      <svg class="seal" viewBox="0 0 120 120" fill="none" aria-hidden="true">
        <circle cx="60" cy="60" r="56" stroke="#C9A227" stroke-width="1"/>
        <circle cx="60" cy="60" r="48" stroke="#C9A227" stroke-width="0.6" stroke-dasharray="2 4"/>
        <path id="sealPath" d="M60,12 A48,48 0 1,1 59.9,12" fill="none"/>
        <text font-size="9" fill="#E4C878" letter-spacing="3">
          <textPath href="#sealPath">&bull; JUSTICE &bull; TRUST &bull; PROFESSIONALISM </textPath>
        </text>
      </svg>
      <div class="seal-center">
        <svg width="46" height="46" viewBox="0 0 46 46" fill="none">
          <path d="M23 6v34M13 12l10-5 10 5M15 12l-4.5 11h9L15 12zM31 12l-4.5 11h9L31 12zM13 34h20" stroke="#C9A227" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>
    </div>
  </div>
  <div class="scroll-cue"><span>SCROLL</span><span class="line"></span></div>
</section>

<!-- ============ ABOUT ============ -->
<section class="about custom-section" id="about">
  <div class="container about-grid">
    <div class="about-img reveal">
      <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?q=80&w=900&auto=format&fit=crop" alt="Law Chambers">
      <div class="credential-card">
        <b>{{ $portfolio->completed_projects ?? '1500' }}+</b>
        <span>Successful Hearings &amp; Cases</span>
      </div>
    </div>
    <div class="about-copy reveal">
      <span class="eyebrow">About Us</span>
      <h2 style="font-size: 34px; margin-bottom: 22px;">Experience, Integrity &amp; Commitment to Results</h2>
      <span class="role">{{ $portfolio->full_name }} &mdash; {{ $portfolio->profession ?? 'Founder & Senior Advocate' }}</span>
      <p>{{ $portfolio->about_me ?? 'With over two decades of experience in the Supreme Court and High Court divisions, our firm is dedicated to providing personal attention and strategic counsel in complex and sensitive cases.' }}</p>
      <p>We believe every client's story is unique. Instead of template solutions, we craft specific legal strategies tailored for your case.</p>
      <ul class="cred-list">
        <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3 9.5l4 4 8-9" stroke="#C9A227" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg> Bangladesh Bar Council &mdash; Enrolled</li>
        <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3 9.5l4 4 8-9" stroke="#C9A227" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg> Supreme Court, High Court Division Practice</li>
        <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3 9.5l4 4 8-9" stroke="#C9A227" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg> Lincoln's Inn, London &mdash; Barrister-at-Law</li>
        <li><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3 9.5l4 4 8-9" stroke="#C9A227" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg> Mediator, International Arbitration Centre</li>
      </ul>
    </div>
  </div>
</section>

<!-- ============ PRACTICE AREAS ============ -->
<section class="practice custom-section" id="services">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Services</span>
      <h2>Our Practice Areas</h2>
      <p>From individual matters to corporate representation &mdash; an experienced and dedicated legal team is by your side.</p>
    </div>
    <div class="grid-cards">
      
      @forelse($services as $svc)
        <div class="p-card reveal">
          <div class="icon">
             <i class="{{ $svc->icon ?? 'fa-solid fa-scale-balanced' }}"></i>
          </div>
          <h3>{{ $svc->title }}</h3>
          <p>{{ $svc->short_description }}</p>
        </div>
      @empty
        <!-- Fallback English Content -->
        <div class="p-card reveal">
          <div class="icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 3v18M6 8l-4 6h8L6 8zM18 8l-4 6h8l-4-6zM6 21h12" stroke="#E4C878" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg></div>
          <h3>Family Law</h3>
          <p>Sincere and strategic representation in sensitive matters of divorce, alimony, child custody, and inheritance.</p>
        </div>
  
        <div class="p-card reveal">
          <div class="icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z" stroke="#E4C878" stroke-width="1.4" stroke-linejoin="round"/></svg></div>
          <h3>Criminal Law</h3>
          <p>From police station to court — prompt and robust legal assistance in bail, investigation, and trial procedures.</p>
        </div>
  
        <div class="p-card reveal">
          <div class="icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M3 21h18M5 21V9l7-5 7 5v12M9 21v-6h6v6" stroke="#E4C878" stroke-width="1.4" stroke-linejoin="round"/></svg></div>
          <h3>Property & Land Law</h3>
          <p>Expert advice and representation for deed verification, land disputes, mutation, and record correction.</p>
        </div>
  
        <div class="p-card reveal">
          <div class="icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="4" y="7" width="16" height="13" rx="1.5" stroke="#E4C878" stroke-width="1.4"/><path d="M8 7V5a4 4 0 018 0v2" stroke="#E4C878" stroke-width="1.4"/></svg></div>
          <h3>Corporate & Business Law</h3>
          <p>Comprehensive legal support in company formation, contract drafting, compliance, and commercial dispute resolution.</p>
        </div>
  
        <div class="p-card reveal">
          <div class="icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 21s-7-4.5-9-9.5C1.5 6.5 4.5 3 8 4c2 .6 3 2 4 3.5C13 6 14 4.6 16 4c3.5-1 6.5 2.5 5 7.5-2 5-9 9.5-9 9.5z" stroke="#E4C878" stroke-width="1.3" stroke-linejoin="round"/></svg></div>
          <h3>Civil Litigation</h3>
          <p>Specific evidence-based legal strategies for breach of contract, compensation claims, and other civil disputes.</p>
        </div>
  
        <div class="p-card reveal">
          <div class="icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="4" y="3" width="16" height="18" rx="2" stroke="#E4C878" stroke-width="1.4"/><path d="M8 8h8M8 12h8M8 16h5" stroke="#E4C878" stroke-width="1.4" stroke-linecap="round"/></svg></div>
          <h3>Cyber & IT Law</h3>
          <p>Up-to-date legal support in cases regarding digital security laws, online fraud, and data protection.</p>
        </div>
      @endforelse

    </div>
  </div>
</section>

<!-- ============ PROCESS ============ -->
<section class="process custom-section" id="process">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Work Process</span>
      <h2>How We Work</h2>
      <p>From the first meeting to case resolution &mdash; a clear and transparent process.</p>
    </div>
    <div class="process-list">
      <div class="p-step reveal">
        <span class="num">1</span>
        <h4>Consultation</h4>
        <p>Listening carefully to your issue and providing an initial legal assessment.</p>
      </div>
      <div class="p-step reveal">
        <span class="num">2</span>
        <h4>Assessment &amp; Strategy</h4>
        <p>Reviewing relevant documents to determine the right legal strategy and potential outcome.</p>
      </div>
      <div class="p-step reveal">
        <span class="num">3</span>
        <h4>Representation</h4>
        <p>Providing strong and professional representation in court or at the negotiation table.</p>
      </div>
      <div class="p-step reveal">
        <span class="num">4</span>
        <h4>Resolution</h4>
        <p>Regular updates until case resolution and guidance on necessary next steps.</p>
      </div>
    </div>
  </div>
</section>

<!-- ============ TESTIMONIALS ============ -->
<section class="testimonials custom-section" id="testimonials">
  <div class="container">
    <div class="section-head center reveal">
      <span class="eyebrow">Client Testimonials</span>
      <h2>In the words of those we've worked with</h2>
    </div>
    <div class="t-grid">
      @forelse($testimonials as $testi)
        <div class="t-card reveal">
          <span class="quote">&ldquo;</span>
          <p>{{ $testi->content }}</p>
          <div class="who">
            <div class="avatar">{{ mb_substr($testi->name, 0, 1) }}</div>
            <div><b>{{ $testi->name }}</b><span>{{ $testi->designation }}</span></div>
          </div>
        </div>
      @empty
        <!-- Fallback English Content -->
        <div class="t-card reveal">
          <span class="quote">&ldquo;</span>
          <p>The patience and dedication with which they resolved my long-standing property dispute is truly commendable.</p>
          <div class="who">
            <div class="avatar">K</div>
            <div><b>Kamrul Hasan</b><span>Businessman, Uttara</span></div>
          </div>
        </div>
        <div class="t-card reveal">
          <span class="quote">&ldquo;</span>
          <p>They handled my highly sensitive family matter with utmost professionalism and care. Deeply grateful.</p>
          <div class="who">
            <div class="avatar">R</div>
            <div><b>Rumana Akter</b><span>Teacher, Dhanmondi</span></div>
          </div>
        </div>
        <div class="t-card reveal">
          <span class="quote">&ldquo;</span>
          <p>We have always received accurate and timely legal assistance regarding our corporate contracts and compliance matters.</p>
          <div class="who">
            <div class="avatar">I</div>
            <div><b>S. M. Imran</b><span>Director, Tech Firm</span></div>
          </div>
        </div>
      @endforelse
    </div>
  </div>
</section>

<!-- ============ CONTACT ============ -->
<section class="contact custom-section" id="contact">
  <div class="container contact-grid">
    <div class="contact-info reveal">
      <span class="eyebrow">Contact Us</span>
      <h2>Book a Free Consultation Today</h2>
      <p>Fill out the form below to discuss your legal issue or contact us directly &mdash; we will respond within 24 hours.</p>

      <div class="info-row">
        <div class="ic"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3 5l6 5 6-5" stroke="#E4C878" stroke-width="1.4"/><rect x="2" y="3.5" width="14" height="11" rx="1.5" stroke="#E4C878" stroke-width="1.4"/></svg></div>
        <div><b>Email</b><span>{{ $siteSettings->email ?? 'info@rahmanassociates.com' }}</span></div>
      </div>
      <div class="info-row">
        <div class="ic"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M4 3h3l2 5-2.5 1.5a11 11 0 005 5L13 12l5 2v3a2 2 0 01-2 2C8.5 19 -0.5 10 4 3z" stroke="#E4C878" stroke-width="1.2" stroke-linejoin="round"/></svg></div>
        <div><b>Phone</b><span>{{ $siteSettings->phone ?? '+880 1700-000000' }}</span></div>
      </div>
      <div class="info-row">
        <div class="ic"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M9 17s6-5.5 6-10a6 6 0 10-12 0c0 4.5 6 10 6 10z" stroke="#E4C878" stroke-width="1.3"/><circle cx="9" cy="7" r="2.2" stroke="#E4C878" stroke-width="1.3"/></svg></div>
        <div><b>Chambers</b><span>{{ $siteSettings->address ?? 'Level 6, Gulshan Avenue, Dhaka 1212' }}</span></div>
      </div>
      <div class="info-row">
        <div class="ic"><svg width="18" height="18" viewBox="0 0 18 18" fill="none"><circle cx="9" cy="9" r="7" stroke="#E4C878" stroke-width="1.3"/><path d="M9 5v4l3 2" stroke="#E4C878" stroke-width="1.3" stroke-linecap="round"/></svg></div>
        <div><b>Office Hours</b><span>Sun&ndash;Thu, 9 AM &ndash; 6 PM</span></div>
      </div>
    </div>

    <form class="form-card reveal" id="consultForm">
      <div class="form-row">
        <div>
          <label for="fname">Full Name</label>
          <input type="text" id="fname" placeholder="Enter your name" required>
        </div>
        <div>
          <label for="fphone">Phone Number</label>
          <input type="tel" id="fphone" placeholder="+880 1XXX-XXXXXX" required>
        </div>
      </div>
      <div class="full">
        <label for="femail">Email</label>
        <input type="email" id="femail" placeholder="you@example.com">
      </div>
      <div class="full">
        <label for="fcase">Case Type</label>
        <select id="fcase">
          <option>Family Law</option>
          <option>Criminal Law</option>
          <option>Property & Land Law</option>
          <option>Corporate & Business Law</option>
          <option>Civil Litigation</option>
          <option>Other</option>
        </select>
      </div>
      <div class="full">
        <label for="fmsg">Message</label>
        <textarea id="fmsg" rows="4" placeholder="Briefly describe your issue..."></textarea>
      </div>
      <button type="submit" class="submit-btn">Send Consultation Request</button>
    </form>
  </div>
</section>

<!-- ============ FOOTER ============ -->
<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <b>{{ $portfolio->full_name }}</b>
        <p>A boutique law firm that stands by every client with a promise of trust, experience, and results.</p>
      </div>
      <div class="footer-col">
        <h5>Navigation</h5>
        <ul>
          <li><a href="#about">About Us</a></li>
          <li><a href="#services">Practice Areas</a></li>
          <li><a href="#process">Work Process</a></li>
          <li><a href="#testimonials">Testimonials</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Services</h5>
        <ul>
          @if($services->count() > 0)
            @foreach($services->take(4) as $svc)
              <li><a href="#">{{ $svc->title }}</a></li>
            @endforeach
          @else
            <li><a href="#services">Family Law</a></li>
            <li><a href="#services">Criminal Law</a></li>
            <li><a href="#services">Property Law</a></li>
            <li><a href="#services">Corporate Law</a></li>
          @endif
        </ul>
      </div>
      <div class="footer-col">
        <h5>Contact</h5>
        <ul>
          <li><a href="mailto:{{ $siteSettings->email ?? 'info@rahmanassociates.com' }}">{{ $siteSettings->email ?? 'info@rahmanassociates.com' }}</a></li>
          <li><a href="tel:{{ $siteSettings->phone ?? '+8801700000000' }}">{{ $siteSettings->phone ?? '+880 1700-000000' }}</a></li>
          <li><a href="#contact">{{ $siteSettings->address ?? 'Gulshan Avenue, Dhaka' }}</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>&copy; {{ date('Y') }} {{ $portfolio->full_name }}. All Rights Reserved.</span>
      <span>Designed for Premium Legal Consultancy</span>
    </div>
  </div>
</footer>

<script>
  // Sticky header on scroll
  const header = document.getElementById('siteHeader');
  window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 40);
  });

  // Mobile menu toggle
  const burger = document.getElementById('burger');
  const navLinks = document.getElementById('navLinks');
  burger.addEventListener('click', () => {
    navLinks.classList.toggle('open');
    burger.classList.toggle('active');
  });
  navLinks.querySelectorAll('a').forEach(a => a.addEventListener('click', () => navLinks.classList.remove('open')));

  // Reveal on scroll
  const revealEls = document.querySelectorAll('.reveal');
  if (typeof IntersectionObserver !== 'undefined') {
    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          io.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
    revealEls.forEach(el => io.observe(el));
  } else {
    // Fallback if IntersectionObserver is not supported
    revealEls.forEach(el => el.classList.add('in'));
  }

  // Form submit (demo only)
  const form = document.getElementById('consultForm');
  if(form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const btn = form.querySelector('.submit-btn');
      const original = btn.textContent;
      btn.textContent = 'Thank You! We will contact you soon ✓';
      btn.style.background = '#8FBF7F';
      setTimeout(() => { btn.textContent = original; btn.style.background = ''; form.reset(); }, 3200);
    });
  }
</script>
@endsection
