<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        $services = Service::orderBy('order', 'asc')->get();

        return view('admin.services.index', compact('services'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|string',
        ]);

        Service::create($validated);

        return back()->with('success', 'Service created!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|string',
        ]);

        $service->update($validated);

        return back()->with('success', 'Service updated!');
    }

    public function destroy(int $id): RedirectResponse
    {
        Service::findOrFail($id)->delete();

        return back()->with('success', 'Service deleted!');
    }
}
