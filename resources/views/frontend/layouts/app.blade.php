<!DOCTYPE html>
<html lang="en" class="{{ $theme->dark_mode === 'dark' ? 'dark' : '' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Dynamic SEO Tags -->
    <title>{{ $siteSettings->meta_title ?? $portfolio->full_name . ' - Portfolio' }}</title>
    <meta name="description" content="{{ $siteSettings->meta_description ?? $portfolio->short_bio }}">
    <meta name="keywords" content="{{ $siteSettings->meta_keywords ?? '' }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family={{ str_replace(' ', '+', $theme->font_family ?? 'Inter') }}:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 & FontAwesome 6 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- AOS Scroll Animation -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Dynamic Theme Styling Variables -->
    <style>
        :root {
            --primary-color: {{ $theme->primary_color ?? '#3b82f6' }};
            --secondary-color: {{ $theme->secondary_color ?? '#0f172a' }};
            --accent-color: {{ $theme->accent_color ?? '#06b6d4' }};
            --font-family: '{{ $theme->font_family ?? 'Inter' }}', sans-serif;
            --border-radius: {{ $theme->border_radius ?? '12px' }};
        }

        body {
            font-family: var(--font-family);
            overflow-x: hidden;
            background-color: {{ $theme->dark_mode === 'dark' ? '#0b0f19' : '#f8fafc' }};
            color: {{ $theme->dark_mode === 'dark' ? '#f1f5f9' : '#1e293b' }};
        }

        /* Glassmorphism utility */
        .glass-card {
            background: {{ $theme->dark_mode === 'dark' ? 'rgba(30, 41, 59, 0.7)' : 'rgba(255, 255, 255, 0.85)' }};
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid {{ $theme->dark_mode === 'dark' ? 'rgba(255, 255, 255, 0.08)' : 'rgba(0, 0, 0, 0.06)' }};
            border-radius: var(--border-radius);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.12);
        }

        .text-gradient {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%) !important;
        }

        .btn-custom-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 100%);
            color: #ffffff;
            border: none;
            font-weight: 600;
            border-radius: {{ $theme->button_style === 'rounded-pill' ? '50px' : 'var(--border-radius)' }};
            padding: 0.75rem 1.75rem;
            transition: all 0.3s ease;
        }

        .btn-custom-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
            color: #ffffff;
        }

        /* Particle Container */
        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        /* Preloader */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: {{ $theme->dark_mode === 'dark' ? '#0b0f19' : '#ffffff' }};
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease;
        }

        .spinner-custom {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(59, 130, 246, 0.2);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

    @if(!empty($theme->custom_css))
        <style>{!! $theme->custom_css !!}</style>
    @endif
</head>
<body>

    <!-- Preloader -->
    @if($theme->enable_preloader)
        <div id="preloader">
            <div class="text-center">
                <div class="spinner-custom mb-3 mx-auto"></div>
                <h6 class="fw-bold text-gradient mb-0">{{ $portfolio->full_name }}</h6>
            </div>
        </div>
    @endif

    <!-- Particles Background -->
    @if($theme->enable_particles)
        <div id="particles-js"></div>
    @endif

    <!-- Main Content Yield -->
    @yield('content')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Init AOS
            AOS.init({ duration: 800, once: true });

            // Hide Preloader
            const preloader = document.getElementById('preloader');
            if (preloader) {
                setTimeout(() => {
                    preloader.style.opacity = '0';
                    setTimeout(() => preloader.remove(), 500);
                }, 400);
            }

            // Init Particles.js
            if (document.getElementById('particles-js')) {
                particlesJS('particles-js', {
                    particles: {
                        number: { value: 40, density: { enable: true, value_area: 800 } },
                        color: { value: '{{ $theme->primary_color ?? "#3b82f6" }}' },
                        shape: { type: 'circle' },
                        opacity: { value: 0.25 },
                        size: { value: 3 },
                        line_linked: { enable: true, distance: 150, color: '{{ $theme->primary_color ?? "#3b82f6" }}', opacity: 0.15, width: 1 },
                        move: { enable: true, speed: 2 }
                    }
                });
            }

            // AJAX Contact Form Handler
            const contactForm = document.getElementById('ajaxContactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    const btn = this.querySelector('button[type="submit"]');
                    btn.disabled = true;
                    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Sending...';

                    fetch("{{ route('contact.submit') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        btn.disabled = false;
                        btn.innerHTML = '<i class="fa-solid fa-paper-plane me-2"></i> Send Message';
                        if (data.success) {
                            Swal.fire('Sent Successfully!', data.message, 'success');
                            contactForm.reset();
                        } else {
                            Swal.fire('Error', 'Please check your inputs and try again.', 'error');
                        }
                    })
                    .catch(() => {
                        btn.disabled = false;
                        btn.innerHTML = '<i class="fa-solid fa-paper-plane me-2"></i> Send Message';
                        Swal.fire('Error', 'An unexpected error occurred.', 'error');
                    });
                });
            }
        });
    </script>

    @if(!empty($theme->custom_js))
        <script>{!! $theme->custom_js !!}</script>
    @endif
</body>
</html>
