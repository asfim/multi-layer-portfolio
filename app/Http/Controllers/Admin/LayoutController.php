<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThemeSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LayoutController extends Controller
{
    public function index(): View
    {
        $theme = ThemeSetting::firstOrCreate(['id' => 1]);
        $layouts = [
            [
                'id' => 'layout1_developer',
                'name' => 'Layout 1: Modern Developer',
                'category' => 'Software / Full Stack / IT',
                'badge' => 'Dark Tech Theme',
                'description' => 'Sleek dark mode theme with code snippet hero, animated typing effect, live preview modals, and syntax highlights.',
                'color' => '#3b82f6',
            ],
            [
                'id' => 'layout2_doctor',
                'name' => 'Layout 2: Medical & Doctor',
                'category' => 'Doctor / Surgeon / Dentist',
                'badge' => 'White + Mint Teal',
                'description' => 'Clean clinical design with appointment booking CTA, patient care highlights, hospital career timeline, and trust badges.',
                'color' => '#0d9488',
            ],
            [
                'id' => 'layout3_student',
                'name' => 'Layout 3: Student & Academic',
                'category' => 'Student / Researcher / Scholar',
                'badge' => 'Creative Purple Theme',
                'description' => 'Vibrant academic template featuring research paper highlights, GPA progress cards, education timeline, and project notes.',
                'color' => '#8b5cf6',
            ],
            [
                'id' => 'layout4_engineer',
                'name' => 'Layout 4: Engineering & Technical',
                'category' => 'Civil / Mechanical / Electrical',
                'badge' => 'Industrial Slate + Blue',
                'description' => 'Technical schematic style layout with radar skills graph, CAD blueprint showcase, engineering metrics, and project specs.',
                'color' => '#0284c7',
            ],
            [
                'id' => 'layout5_photographer',
                'name' => 'Layout 5: Photographer & Visual Artist',
                'category' => 'Photographer / Filmmaker',
                'badge' => 'Full-bleed Dark Gallery',
                'description' => 'Immersive full-screen dark gallery, masonry layout, category filters, lightbox viewer, and booking inquiry drawer.',
                'color' => '#f59e0b',
            ],
            [
                'id' => 'layout6_designer',
                'name' => 'Layout 6: Minimalist UI/UX Designer',
                'category' => 'Designer / Graphic Artist',
                'badge' => 'Minimal Crisp White',
                'description' => 'Ultra-sleek Swiss style minimalist layout, large bold typography, widescreen design previews, and micro-interactions.',
                'color' => '#18181b',
            ],
            [
                'id' => 'layout7_consultant',
                'name' => 'Layout 7: Business & Legal Consultant',
                'category' => 'Consultant / Lawyer / Executive',
                'badge' => 'Corporate Navy + Gold',
                'description' => 'High-status corporate theme featuring advisory service tiers, client logos, case studies, schedule consultation widget, and testimonials.',
                'color' => '#d97706',
            ],
            [
                'id' => 'layout8_resume',
                'name' => 'Layout 8: Corporate Executive Resume',
                'category' => 'Corporate / Manager / HR',
                'badge' => 'Split-Screen Executive CV',
                'description' => 'Traditional high-end CV style with fixed sidebar bio, printable mode button, career milestone timeline, and instant PDF download.',
                'color' => '#475569',
            ],
            [
                'id' => 'layout9_creative',
                'name' => 'Layout 9: Creative Portfolio & Freelancer',
                'category' => 'Freelancer / Digital Marketer',
                'badge' => 'Vibrant Gradient & Glass',
                'description' => 'Dynamic multi-color gradient background with floating interactive cards, particle canvas background, and animated stats.',
                'color' => '#ec4899',
            ],
            [
                'id' => 'layout10_agency',
                'name' => 'Layout 10: Premium Agency & Studio',
                'category' => 'Agency / Team / Specialist',
                'badge' => 'Glassmorphic Dark Studio',
                'description' => 'Top-tier ThemeForest quality glassmorphism theme, video background banner, client logo ticker, and interactive service matrix.',
                'color' => '#6366f1',
            ],
        ];

        return view('admin.layouts_manager.index', compact('theme', 'layouts'));
    }

    public function select(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'layout' => 'required|string',
        ]);

        $theme = ThemeSetting::firstOrCreate(['id' => 1]);
        $theme->update(['active_layout' => $validated['layout']]);

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Active layout switched to '.$validated['layout'].' successfully!',
            ]);
        }

        return back()->with('success', 'Active layout updated instantly!');
    }
}
