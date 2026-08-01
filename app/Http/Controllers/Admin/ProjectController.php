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
        $rules = [
            'category_id' => 'nullable|exists:project_categories,id',
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:5120',
            'client_name' => 'nullable|string',
            'project_date' => 'nullable|string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'technologies' => 'nullable|string', // comma separated string converted to array
            'is_featured' => 'boolean',
        ];

        $request->validate($rules);
        $data = $request->except(['cover_image']);
        
        $data['slug'] = Str::slug($request->title).'-'.Str::random(4);
        $data['is_featured'] = $request->has('is_featured');

        if (! empty($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        Project::create($data);

        return back()->with('success', 'Project created successfully!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $project = Project::findOrFail($id);

        $rules = [
            'category_id' => 'nullable|exists:project_categories,id',
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|max:5120',
            'client_name' => 'nullable|string',
            'project_date' => 'nullable|string',
            'live_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'technologies' => 'nullable|string',
            'is_featured' => 'boolean',
        ];

        $request->validate($rules);
        $data = $request->except(['cover_image']);
        
        $data['is_featured'] = $request->has('is_featured');
        if (! empty($data['technologies']) && is_string($data['technologies'])) {
            $data['technologies'] = array_map('trim', explode(',', $data['technologies']));
        }

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        }

        $project->update($data);

        return back()->with('success', 'Project updated successfully!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return back()->with('success', 'Project deleted successfully!');
    }
}
