<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ThemeSetting;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'projectsCount' => Project::count(),
            'skillsCount' => Skill::count(),
            'blogsCount' => BlogPost::count(),
            'messagesCount' => ContactMessage::count(),
            'unreadMessagesCount' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        $theme = ThemeSetting::firstOrCreate(['id' => 1]);
        $portfolio = Portfolio::first();

        return view('admin.dashboard.index', compact('stats', 'recentMessages', 'theme', 'portfolio'));
    }
}
