<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ThemeSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ThemeSettingController extends Controller
{
    public function edit(): View
    {
        $theme = ThemeSetting::firstOrCreate(['id' => 1]);

        return view('admin.theme_settings.edit', compact('theme'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'primary_color' => 'required|string',
            'secondary_color' => 'required|string',
            'accent_color' => 'required|string',
            'dark_mode' => 'required|string|in:dark,light,auto',
            'font_family' => 'required|string',
            'border_radius' => 'required|string',
            'button_style' => 'required|string',
            'animation_style' => 'required|string',
            'enable_particles' => 'boolean',
            'enable_preloader' => 'boolean',
            'enable_cursor_effect' => 'boolean',
            'enable_glassmorphism' => 'boolean',
            'custom_css' => 'nullable|string',
            'custom_js' => 'nullable|string',
        ]);

        $validated['enable_particles'] = $request->has('enable_particles');
        $validated['enable_preloader'] = $request->has('enable_preloader');
        $validated['enable_cursor_effect'] = $request->has('enable_cursor_effect');
        $validated['enable_glassmorphism'] = $request->has('enable_glassmorphism');

        $theme = ThemeSetting::firstOrCreate(['id' => 1]);
        $theme->update($validated);

        return back()->with('success', 'Theme visual settings updated successfully!');
    }
}
