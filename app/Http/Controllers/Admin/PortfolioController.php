<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function edit(): View
    {
        $portfolio = Portfolio::firstOrCreate(
            ['user_id' => Auth::id() ?? 1],
            [
                'full_name' => 'Alex Morgan',
                'profession' => 'Senior Full Stack Engineer',
            ]
        );

        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request): RedirectResponse
    {
        $rules = [
            'full_name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|max:5120',
            'cover_image' => 'nullable|image|max:5120',
            'short_bio' => 'nullable|string',
            'about_me' => 'nullable|string',
            'availability' => 'nullable|string',
            'location' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'years_of_experience' => 'nullable|integer|min:0',
            'completed_projects' => 'nullable|integer|min:0',
            'happy_clients' => 'nullable|integer|min:0',
            'awards_count' => 'nullable|integer|min:0',
            'github' => 'nullable|url',
            'gitlab' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'youtube' => 'nullable|url',
            'behance' => 'nullable|url',
            'dribbble' => 'nullable|url',
            'medium' => 'nullable|url',
            'stackoverflow' => 'nullable|url',
            'researchgate' => 'nullable|url',
            'google_scholar' => 'nullable|url',
        ];

        $request->validate($rules);
        $data = $request->except(['profile_photo', 'cover_image']);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('portfolio', 'public');
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('portfolio', 'public');
        }

        $portfolio = Portfolio::firstOrCreate(['user_id' => Auth::id() ?? 1]);
        $portfolio->update($data);

        return back()->with('success', 'Portfolio details updated successfully!');
    }
}
