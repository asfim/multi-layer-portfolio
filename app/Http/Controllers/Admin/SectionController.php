<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SectionController extends Controller
{
    public function index(): View
    {
        $sections = Section::orderBy('order', 'asc')->get();

        return view('admin.sections.index', compact('sections'));
    }

    public function toggleStatus(Request $request, int $id): JsonResponse
    {
        $section = Section::findOrFail($id);
        $section->is_active = ! $section->is_active;
        $section->save();

        return response()->json([
            'success' => true,
            'is_active' => $section->is_active,
            'message' => "Section {$section->name} ".($section->is_active ? 'enabled' : 'disabled'),
        ]);
    }

    public function updateOrders(Request $request): JsonResponse
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'integer|exists:sections,id',
        ]);

        foreach ($request->orders as $index => $id) {
            Section::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Section order updated successfully!',
        ]);
    }

    public function updateTitles(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
        ]);

        $section = Section::findOrFail($id);
        $section->update($validated);

        return back()->with('success', "Section '{$section->name}' titles updated successfully!");
    }
}
