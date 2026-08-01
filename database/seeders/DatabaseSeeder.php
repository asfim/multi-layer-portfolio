<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Education;
use App\Models\Experience;
use App\Models\GalleryItem;
use App\Models\Portfolio;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Section;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\Testimonial;
use App\Models\ThemeSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create Admin User
        $user = User::firstOrCreate(
            ['email' => 'admin@portfolio.test'],
            [
                'name' => 'Alex Morgan',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Default Portfolio Info
        Portfolio::firstOrCreate(
            ['user_id' => $user->id],
            [
                'full_name' => 'Alex Morgan',
                'profession' => 'Senior Full Stack Engineer',
                'profile_photo' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                'cover_image' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?auto=format&fit=crop&w=1200&q=80',
                'short_bio' => 'Crafting high-performance web applications, cloud architectures, and intuitive digital experiences.',
                'about_me' => 'Passionate Full Stack Developer with over 8 years of experience engineering scalable web applications, microservices, and modern user interfaces. Dedicated to clean code, performance optimization, and seamless user experiences.',
                'availability' => 'Available for Hire / Freelance',
                'location' => 'San Francisco, CA',
                'phone' => '+1 (555) 234-5678',
                'email' => 'alex@morgan.dev',
                'website' => 'https://morgan.dev',
                'resume_pdf' => null,
                'years_of_experience' => 8,
                'completed_projects' => 45,
                'happy_clients' => 38,
                'awards_count' => 12,
                'github' => 'https://github.com',
                'linkedin' => 'https://linkedin.com',
                'twitter' => 'https://twitter.com',
                'dribbble' => 'https://dribbble.com',
                'youtube' => 'https://youtube.com',
            ]
        );

        // 3. Theme Settings
        ThemeSetting::firstOrCreate(
            ['id' => 1],
            [
                'active_layout' => 'layout1_developer',
                'primary_color' => '#3b82f6',
                'secondary_color' => '#0f172a',
                'accent_color' => '#06b6d4',
                'dark_mode' => 'dark',
                'font_family' => 'Inter',
                'border_radius' => '12px',
                'button_style' => 'rounded-pill',
                'animation_style' => 'fade-up',
                'enable_particles' => true,
                'enable_preloader' => true,
                'enable_cursor_effect' => false,
                'enable_glassmorphism' => true,
            ]
        );

        // 4. Default Sections
        $sections = [
            ['name' => 'Hero Banner', 'key' => 'hero', 'title' => 'Building Next-Gen Digital Products', 'subtitle' => 'Full Stack Engineer & Tech Specialist', 'order' => 1, 'is_active' => true],
            ['name' => 'About Me', 'key' => 'about', 'title' => 'About Me', 'subtitle' => 'Biography & Vision', 'order' => 2, 'is_active' => true],
            ['name' => 'Skills & Tech Stack', 'key' => 'skills', 'title' => 'Skills & Expertise', 'subtitle' => 'Technologies I Master', 'order' => 3, 'is_active' => true],
            ['name' => 'Services Offered', 'key' => 'services', 'title' => 'My Services', 'subtitle' => 'What I Can Do For You', 'order' => 4, 'is_active' => true],
            ['name' => 'Experience & Timeline', 'key' => 'experience', 'title' => 'Work Experience', 'subtitle' => 'Career Journey', 'order' => 5, 'is_active' => true],
            ['name' => 'Education & Qualifications', 'key' => 'education', 'title' => 'Education', 'subtitle' => 'Academic Achievements', 'order' => 6, 'is_active' => true],
            ['name' => 'Projects Showcase', 'key' => 'projects', 'title' => 'Featured Projects', 'subtitle' => 'Recent Work Showcase', 'order' => 7, 'is_active' => true],
            ['name' => 'Certificates & Awards', 'key' => 'certificates', 'title' => 'Certificates', 'subtitle' => 'Verified Credentials', 'order' => 8, 'is_active' => true],
            ['name' => 'Testimonials & Reviews', 'key' => 'testimonials', 'title' => 'Client Feedback', 'subtitle' => 'What People Say', 'order' => 9, 'is_active' => true],
            ['name' => 'Clients & Partners', 'key' => 'clients', 'title' => 'Trusted By', 'subtitle' => 'Companies I Worked With', 'order' => 10, 'is_active' => true],
            ['name' => 'Latest Articles', 'key' => 'blog', 'title' => 'Latest Blog Posts', 'subtitle' => 'Insights & Tutorials', 'order' => 11, 'is_active' => true],
            ['name' => 'Portfolio Gallery', 'key' => 'gallery', 'title' => 'Gallery', 'subtitle' => 'Visual Moments', 'order' => 12, 'is_active' => true],
            ['name' => 'Get In Touch', 'key' => 'contact', 'title' => 'Contact Me', 'subtitle' => 'Let’s Build Something Together', 'order' => 13, 'is_active' => true],
        ];

        foreach ($sections as $s) {
            Section::firstOrCreate(['key' => $s['key']], $s);
        }

        // 5. Project Categories & Projects
        $catWeb = ProjectCategory::firstOrCreate(['slug' => 'web-development'], ['name' => 'Web Development']);
        $catApp = ProjectCategory::firstOrCreate(['slug' => 'mobile-apps'], ['name' => 'Mobile Apps']);
        $catCloud = ProjectCategory::firstOrCreate(['slug' => 'cloud-devops'], ['name' => 'Cloud & DevOps']);

        Project::firstOrCreate(
            ['slug' => 'enterprise-saas-dashboard'],
            [
                'category_id' => $catWeb->id,
                'title' => 'Enterprise SaaS Dashboard',
                'short_description' => 'Real-time analytics platform built with Laravel 12, Vue 3, and TailwindCSS.',
                'description' => 'A comprehensive multi-tenant SaaS application featuring real-time data streaming, dynamic user permissions, Stripe integration, and interactive chart visualizations.',
                'cover_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80',
                'gallery_images' => [
                    'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                ],
                'client_name' => 'Acme Technologies Inc.',
                'project_date' => 'Jan 2025',
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com',
                'technologies' => ['Laravel 12', 'Vue.js', 'PostgreSQL', 'TailwindCSS', 'Redis'],
                'is_featured' => true,
                'order' => 1,
            ]
        );

        Project::firstOrCreate(
            ['slug' => 'telehealth-patient-portal'],
            [
                'category_id' => $catApp->id,
                'title' => 'Telehealth Patient Portal',
                'short_description' => 'HIPAA compliant medical consultation platform for doctors and patients.',
                'description' => 'Secure online portal allowing patients to schedule virtual appointments, manage prescriptions, and communicate securely with medical professionals.',
                'cover_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                'client_name' => 'Global Health Network',
                'project_date' => 'Nov 2024',
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com',
                'technologies' => ['PHP 8.3', 'Bootstrap 5', 'WebRTC', 'MySQL'],
                'is_featured' => true,
                'order' => 2,
            ]
        );

        Project::firstOrCreate(
            ['slug' => 'automated-kubernetes-ci-cd'],
            [
                'category_id' => $catCloud->id,
                'title' => 'Automated Kubernetes Infrastructure',
                'short_description' => 'Infra-as-code automation using Terraform, AWS EKS, and GitHub Actions.',
                'description' => 'Scalable cloud infrastructure supporting 10M daily requests with zero-downtime rolling deployments and automated monitoring via Prometheus & Grafana.',
                'cover_image' => 'https://images.unsplash.com/photo-1667372393119-3d4c48d07fc9?auto=format&fit=crop&w=800&q=80',
                'client_name' => 'CloudOps Solutions',
                'project_date' => 'Mar 2025',
                'live_url' => 'https://example.com',
                'github_url' => 'https://github.com',
                'technologies' => ['Docker', 'Kubernetes', 'AWS', 'Terraform', 'GitHub Actions'],
                'is_featured' => true,
                'order' => 3,
            ]
        );

        // 6. Skill Categories & Skills
        $skFrontend = SkillCategory::firstOrCreate(['name' => 'Frontend Engineering'], ['order' => 1]);
        $skBackend = SkillCategory::firstOrCreate(['name' => 'Backend & Cloud'], ['order' => 2]);
        $skDatabase = SkillCategory::firstOrCreate(['name' => 'Database & DevOps'], ['order' => 3]);

        Skill::firstOrCreate(['name' => 'Laravel / PHP 8.3'], ['category_id' => $skBackend->id, 'proficiency' => 95, 'icon' => 'fa-brands fa-laravel', 'color' => '#ff2d20', 'order' => 1]);
        Skill::firstOrCreate(['name' => 'JavaScript / Vue / React'], ['category_id' => $skFrontend->id, 'proficiency' => 90, 'icon' => 'fa-brands fa-js', 'color' => '#f7df1e', 'order' => 2]);
        Skill::firstOrCreate(['name' => 'Bootstrap 5 / TailwindCSS'], ['category_id' => $skFrontend->id, 'proficiency' => 92, 'icon' => 'fa-brands fa-bootstrap', 'color' => '#7952b3', 'order' => 3]);
        Skill::firstOrCreate(['name' => 'MySQL / PostgreSQL / Redis'], ['category_id' => $skDatabase->id, 'proficiency' => 88, 'icon' => 'fa-solid fa-database', 'color' => '#00758f', 'order' => 4]);
        Skill::firstOrCreate(['name' => 'Docker & Kubernetes'], ['category_id' => $skDatabase->id, 'proficiency' => 82, 'icon' => 'fa-brands fa-docker', 'color' => '#2496ed', 'order' => 5]);

        // 7. Experiences & Education
        Experience::firstOrCreate(
            ['company' => 'TechCorp Global', 'designation' => 'Lead Software Architect'],
            [
                'location' => 'San Francisco, CA',
                'start_date' => '2022',
                'end_date' => 'Present',
                'is_current' => true,
                'description' => 'Architecting enterprise web services, mentoring senior engineers, and managing cloud deployment pipelines for high-traffic software platforms.',
                'order' => 1,
            ]
        );

        Experience::firstOrCreate(
            ['company' => 'DevStudio Solutions', 'designation' => 'Senior Full Stack Developer'],
            [
                'location' => 'Austin, TX',
                'start_date' => '2019',
                'end_date' => '2022',
                'is_current' => false,
                'description' => 'Developed custom web and mobile applications for Fortune 500 clients using Laravel, Node.js, and modern JavaScript frameworks.',
                'order' => 2,
            ]
        );

        Education::firstOrCreate(
            ['institute' => 'Stanford University', 'degree' => 'B.S. in Computer Science'],
            [
                'department' => 'School of Engineering',
                'result' => '3.92 GPA',
                'start_year' => '2015',
                'end_year' => '2019',
                'is_current' => false,
                'description' => 'Specialized in Software Systems, Distributed Computing, and Artificial Intelligence.',
                'order' => 1,
            ]
        );

        // 8. Services
        Service::firstOrCreate(
            ['title' => 'Full Stack Web Development'],
            [
                'icon' => 'fa-solid fa-code',
                'short_description' => 'Custom end-to-end web applications built with Laravel 12, PHP 8.3, and modern UI components.',
                'description' => 'From responsive frontend interfaces to robust database architecture and secure API endpoints.',
                'price' => 'Starting at $1,500',
                'order' => 1,
            ]
        );

        Service::firstOrCreate(
            ['title' => 'API Development & Integration'],
            [
                'icon' => 'fa-solid fa-network-wired',
                'short_description' => 'RESTful & GraphQL API architecture with authentication, rate limiting, and documentation.',
                'description' => 'Seamless third-party API integrations (Payment gateways, OAuth, CRM systems, SMS APIs).',
                'price' => 'Starting at $800',
                'order' => 2,
            ]
        );

        Service::firstOrCreate(
            ['title' => 'Cloud Deployment & DevOps'],
            [
                'icon' => 'fa-solid fa-cloud-arrow-up',
                'short_description' => 'Dockerized container deployments, CI/CD automated pipelines, and cloud server scaling.',
                'description' => 'AWS, DigitalOcean, and Kubernetes setup with continuous integration & delivery pipelines.',
                'price' => 'Starting at $1,200',
                'order' => 3,
            ]
        );

        // 9. Certificates & Testimonials & Clients
        Certificate::firstOrCreate(
            ['title' => 'AWS Certified Solutions Architect'],
            [
                'issuer' => 'Amazon Web Services',
                'issue_date' => '2024',
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=400&q=80',
                'verification_url' => 'https://aws.amazon.com',
                'order' => 1,
            ]
        );

        Testimonial::firstOrCreate(
            ['client_name' => 'Sarah Jenkins'],
            [
                'designation' => 'CTO',
                'company' => 'InnoTech Systems',
                'client_photo' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=200&q=80',
                'rating' => 5,
                'review' => 'Alex delivered our complex SaaS platform 2 weeks ahead of schedule! Exceptional technical communication, pristine code standard, and high attention to detail.',
                'order' => 1,
            ]
        );

        Client::firstOrCreate(
            ['name' => 'Acme Corp'],
            [
                'logo' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=300&q=80',
                'website' => 'https://example.com',
                'order' => 1,
            ]
        );

        // 10. Blog Category & Post
        $blogCat = BlogCategory::firstOrCreate(['slug' => 'tech-insights'], ['name' => 'Tech Insights']);

        BlogPost::firstOrCreate(
            ['slug' => 'building-scalable-laravel-12-applications'],
            [
                'category_id' => $blogCat->id,
                'title' => 'Building Scalable Laravel 12 Applications in 2026',
                'excerpt' => 'Discover modern Laravel 12 architecture patterns, performance optimization tips, and Eloquent best practices.',
                'content' => '<p>Laravel 12 continues to define modern web engineering with streamlined folder structures, supercharged artisan tooling, and unmatched developer productivity. In this guide, we walk through building robust multi-tenant web platforms...</p>',
                'featured_image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80',
                'tags' => ['Laravel', 'PHP 8.3', 'Architecture'],
                'views' => 1420,
                'is_published' => true,
                'published_at' => now(),
            ]
        );

        // 11. Gallery Items
        GalleryItem::firstOrCreate(
            ['title' => 'Dev Conference Keynote 2025'],
            [
                'type' => 'image',
                'media_url' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=400&q=80',
                'category' => 'Events',
                'order' => 1,
            ]
        );

        // 12. Site Settings
        SiteSetting::firstOrCreate(
            ['id' => 1],
            [
                'site_name' => 'Alex Morgan | Professional Portfolio',
                'meta_title' => 'Alex Morgan - Senior Full Stack Engineer & Consultant',
                'meta_description' => 'Official portfolio website of Alex Morgan. Explore projects, work experience, skills, articles, and request custom software development services.',
                'meta_keywords' => 'Full Stack Developer, Laravel 12, PHP 8.3, Web Architect, San Francisco Developer',
                'mail_from_address' => 'alex@morgan.dev',
                'mail_from_name' => 'Alex Morgan Portfolio',
            ]
        );
    }
}
