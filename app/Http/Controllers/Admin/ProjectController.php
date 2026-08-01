<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::with('category')->orderBy('order', 'asc')->get();
        $categories = ProjectCategory::all();

        return view('admin.projects.index', compact('projects', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:project_categories,id',
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
            'client_name' => 'nullable|string',
            'project_date' => 'nullable|string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'technologies' => 'nullable|string', // comma separated string converted to array
            'is_featured' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']).'-'.Str::random(4);
        $validated['is_featured'] = $request->has('is_featured');

        if (! empty($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        Project::create($validated);

        return back()->with('success', 'Project created successfully!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'nullable|exists:project_categories,id',
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|string',
            'client_name' => 'nullable|string',
            'project_date' => 'nullable|string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'is_featured' => 'boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        if (! empty($validated['technologies']) && is_string($validated['technologies'])) {
            $validated['technologies'] = array_map('trim', explode(',', $validated['technologies']));
        }

        $project->update($validated);

        return back()->with('success', 'Project updated successfully!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return back()->with('success', 'Project deleted successfully!');
    }
}
