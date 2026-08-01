<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CertificateController extends Controller
{
    public function index(): View
    {
        $certificates = Certificate::orderBy('order', 'asc')->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'verification_url' => 'nullable|url',
        ];

        $request->validate($rules);
        $data = $request->except(['image']);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificates', 'public');
        }

        Certificate::create($data);

        return back()->with('success', 'Certificate added!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $cert = Certificate::findOrFail($id);

        $rules = [
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'nullable|string',
            'image' => 'nullable|image|max:5120',
            'verification_url' => 'nullable|url',
        ];

        $request->validate($rules);
        $data = $request->except(['image']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificates', 'public');
        }

        $cert->update($data);

        return back()->with('success', 'Certificate updated!');
    }

    public function destroy(int $id): RedirectResponse
    {
        Certificate::findOrFail($id)->delete();

        return back()->with('success', 'Certificate deleted!');
    }
}
