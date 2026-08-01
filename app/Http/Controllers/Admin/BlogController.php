<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = BlogPost::with('category')->orderBy('created_at', 'desc')->get();
        $categories = BlogCategory::all();

        return view('admin.blogs.index', compact('posts', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|string',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title']).'-'.Str::random(4);
        $validated['is_published'] = $request->has('is_published');
        $validated['published_at'] = $validated['is_published'] ? now() : null;

        if (! empty($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        BlogPost::create($validated);

        return back()->with('success', 'Blog post created successfully!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $post = BlogPost::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'nullable|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|string',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
        ]);

        $validated['is_published'] = $request->has('is_published');
        if ($validated['is_published'] && ! $post->published_at) {
            $validated['published_at'] = now();
        }

        if (! empty($validated['tags']) && is_string($validated['tags'])) {
            $validated['tags'] = array_map('trim', explode(',', $validated['tags']));
        }

        $post->update($validated);

        return back()->with('success', 'Blog post updated successfully!');
    }

    public function destroy(int $id): RedirectResponse
    {
        BlogPost::findOrFail($id)->delete();

        return back()->with('success', 'Blog post deleted successfully!');
    }
}
