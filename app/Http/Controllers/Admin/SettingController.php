<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        $settings = SiteSetting::firstOrCreate(['id' => 1]);

        return view('admin.settings.edit', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $rules = [
            'site_name' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:1024',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'meta_image' => 'nullable|image|max:5120',
            'google_analytics_id' => 'nullable|string',
            'facebook_pixel_id' => 'nullable|string',
            'smtp_host' => 'nullable|string',
            'smtp_port' => 'nullable|string',
            'smtp_username' => 'nullable|string',
            'smtp_password' => 'nullable|string',
            'smtp_encryption' => 'nullable|string',
            'mail_from_address' => 'nullable|email',
            'mail_from_name' => 'nullable|string',
            'google_map_iframe' => 'nullable|string',
            'whatsapp_number' => 'nullable|string',
            'telegram_username' => 'nullable|string',
        ];

        $request->validate($rules);
        $data = $request->except(['logo', 'favicon', 'meta_image']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('settings', 'public');
        }
        if ($request->hasFile('favicon')) {
            $data['favicon'] = $request->file('favicon')->store('settings', 'public');
        }
        if ($request->hasFile('meta_image')) {
            $data['meta_image'] = $request->file('meta_image')->store('settings', 'public');
        }

        $settings = SiteSetting::firstOrCreate(['id' => 1]);
        $settings->update($data);

        return back()->with('success', 'Site settings & SEO updated successfully!');
    }
}
