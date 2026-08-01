<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Portfolio CMS</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --primary-bg: #0f172a;
            --sidebar-bg: #1e293b;
            --accent-color: #3b82f6;
            --body-bg: #f8fafc;
            --card-border: #e2e8f0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--body-bg);
            color: #334155;
        }

        .admin-sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--sidebar-bg);
            color: #94a3b8;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .admin-sidebar .brand-title {
            padding: 1.5rem 1.25rem;
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .admin-sidebar .nav-link {
            color: #94a3b8;
            padding: 0.75rem 1.25rem;
            font-weight: 500;
            border-radius: 8px;
            margin: 0.2rem 0.75rem;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            color: #ffffff;
            background: var(--accent-color);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .admin-sidebar .nav-link i {
            width: 20px;
            font-size: 1.1rem;
        }

        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .admin-navbar {
            background: #ffffff;
            border-bottom: 1px solid var(--card-border);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .admin-content {
            padding: 2rem;
            flex: 1;
        }

        .card-custom {
            background: #ffffff;
            border-radius: 12px;
            border: 1px solid var(--card-border);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
        }

        .card-custom .card-header {
            background: transparent;
            border-bottom: 1px solid var(--card-border);
            padding: 1.25rem 1.5rem;
            font-weight: 700;

        .btn-accent {
            background: var(--accent-color);
            color: #fff;
            font-weight: 600;
            border-radius: 8px;
            padding: 0.5rem 1.25rem;
        }

        .btn-accent:hover {
            background: #2563eb;
            color: #fff;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar Nav -->
    <aside class="admin-sidebar">
        <div class="brand-title">
            <i class="fa-solid fa-layer-group text-primary me-2"></i> Portfolio Builder
        </div>
        <ul class="nav flex-column my-2">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.portfolio.edit') ? 'active' : '' }}" href="{{ route('admin.portfolio.edit') }}">
                    <i class="fa-solid fa-id-card"></i> Profile & Info
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.layouts.index') ? 'active' : '' }}" href="{{ route('admin.layouts.index') }}">
                    <i class="fa-solid fa-palette"></i> 10 Layouts Engine
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.theme_settings.edit') ? 'active' : '' }}" href="{{ route('admin.theme_settings.edit') }}">
                    <i class="fa-solid fa-sliders"></i> Theme Customizer
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.sections.index') ? 'active' : '' }}" href="{{ route('admin.sections.index') }}">
                    <i class="fa-solid fa-arrows-up-down-left-right"></i> Section Builder
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-folder-open"></i> Projects
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}" href="{{ route('admin.skills.index') }}">
                    <i class="fa-solid fa-laptop-code"></i> Skills
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.experience.*') ? 'active' : '' }}" href="{{ route('admin.experience.index') }}">
                    <i class="fa-solid fa-briefcase"></i> Experience
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.education.*') ? 'active' : '' }}" href="{{ route('admin.education.index') }}">
                    <i class="fa-solid fa-graduation-cap"></i> Education
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
                    <i class="fa-solid fa-list-check"></i> Services
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}" href="{{ route('admin.certificates.index') }}">
                    <i class="fa-solid fa-certificate"></i> Certificates
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}">
                    <i class="fa-solid fa-quote-right"></i> Testimonials & Clients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}" href="{{ route('admin.blogs.index') }}">
                    <i class="fa-solid fa-blog"></i> Blog Posts
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" href="{{ route('admin.contacts.index') }}">
                    <i class="fa-solid fa-envelope"></i> Messages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.edit') ? 'active' : '' }}" href="{{ route('admin.settings.edit') }}">
                    <i class="fa-solid fa-gear"></i> Settings & SEO
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Section -->
    <main class="admin-main">
        <header class="admin-navbar">
            <div>
                <h5 class="fw-bold mb-0">@yield('title', 'Admin Dashboard')</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-secondary btn-sm rounded-pill px-3">
                    <i class="fa-solid fa-external-link me-1"></i> Live Website
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                        <i class="fa-solid fa-power-off me-1"></i> Logout
                    </button>
                </form>
            </div>
        </header>

        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
    @stack('scripts')
</body>
</html>
