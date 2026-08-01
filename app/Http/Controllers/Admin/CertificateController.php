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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'nullable|string',
            'image' => 'nullable|string',
            'verification_url' => 'nullable|url',
        ]);

        Certificate::create($validated);

        return back()->with('success', 'Certificate added!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $cert = Certificate::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issue_date' => 'nullable|string',
            'image' => 'nullable|string',
            'verification_url' => 'nullable|url',
        ]);

        $cert->update($validated);

        return back()->with('success', 'Certificate updated!');
    }

    public function destroy(int $id): RedirectResponse
    {
        Certificate::findOrFail($id)->delete();

        return back()->with('success', 'Certificate deleted!');
    }
}
