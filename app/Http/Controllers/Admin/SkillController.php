<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillController extends Controller
{
    public function index(): View
    {
        $skills = Skill::with('category')->orderBy('order', 'asc')->get();
        $categories = SkillCategory::orderBy('order', 'asc')->get();

        return view('admin.skills.index', compact('skills', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:skill_categories,id',
            'name' => 'required|string|max:255',
            'proficiency' => 'required|integer|min:0|max:100',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        Skill::create($validated);

        return back()->with('success', 'Skill added successfully!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $skill = Skill::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'nullable|exists:skill_categories,id',
            'name' => 'required|string|max:255',
            'proficiency' => 'required|integer|min:0|max:100',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $skill->update($validated);

        return back()->with('success', 'Skill updated successfully!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return back()->with('success', 'Skill deleted successfully!');
    }
}
