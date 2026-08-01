<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EducationController extends Controller
{
    public function index(): View
    {
        $educations = Education::orderBy('order', 'asc')->get();

        return view('admin.education.index', compact('educations'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'institute' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'department' => 'nullable|string',
            'result' => 'nullable|string',
            'start_year' => 'required|string',
            'end_year' => 'nullable|string',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $validated['is_current'] = $request->has('is_current');
        Education::create($validated);

        return back()->with('success', 'Education record added!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $edu = Education::findOrFail($id);

        $validated = $request->validate([
            'institute' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'department' => 'nullable|string',
            'result' => 'nullable|string',
            'start_year' => 'required|string',
            'end_year' => 'nullable|string',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
        ]);

        $validated['is_current'] = $request->has('is_current');
        $edu->update($validated);

        return back()->with('success', 'Education record updated!');
    }

    public function destroy(int $id): RedirectResponse
    {
        Education::findOrFail($id)->delete();

        return back()->with('success', 'Education record deleted!');
    }
}
