<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::orderBy('order', 'asc')->get();
        $clients = Client::orderBy('order', 'asc')->get();

        return view('admin.testimonials.index', compact('testimonials', 'clients'));
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'client_name' => 'required|string|max:255',
            'designation' => 'nullable|string',
            'company' => 'nullable|string',
            'client_photo' => 'nullable|image|max:5120',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ];

        $request->validate($rules);
        $data = $request->except(['client_photo']);

        if ($request->hasFile('client_photo')) {
            $data['client_photo'] = $request->file('client_photo')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return back()->with('success', 'Testimonial added!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $test = Testimonial::findOrFail($id);

        $rules = [
            'client_name' => 'required|string|max:255',
            'designation' => 'nullable|string',
            'company' => 'nullable|string',
            'client_photo' => 'nullable|image|max:5120',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string',
        ];

        $request->validate($rules);
        $data = $request->except(['client_photo']);

        if ($request->hasFile('client_photo')) {
            $data['client_photo'] = $request->file('client_photo')->store('testimonials', 'public');
        }

        $test->update($data);

        return back()->with('success', 'Testimonial updated!');
    }

    public function destroy(int $id): RedirectResponse
    {
        Testimonial::findOrFail($id)->delete();

        return back()->with('success', 'Testimonial deleted!');
    }
}
