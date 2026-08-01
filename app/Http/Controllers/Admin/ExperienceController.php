<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienceController extends Controller
{
    public function index(): View
    {
        $experiences = Experience::orderBy('order', 'asc')->get();

        return view('admin.experience.index', compact('experiences'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'location' => 'nullable|string',
            'start_date' => 'required|string',
            'end_date' => 'nullable|string',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $validated['is_current'] = $request->has('is_current');
        Experience::create($validated);

        return back()->with('success', 'Experience record added!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $exp = Experience::findOrFail($id);

        $validated = $request->validate([
            'company' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'location' => 'nullable|string',
            'start_date' => 'required|string',
            'end_date' => 'nullable|string',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $validated['is_current'] = $request->has('is_current');
        $exp->update($validated);

        return back()->with('success', 'Experience record updated!');
    }

    public function destroy(int $id): RedirectResponse
    {
        Experience::findOrFail($id)->delete();

        return back()->with('success', 'Experience record deleted!');
    }
}
