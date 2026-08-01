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
        $rules = [
            'category_id' => 'nullable|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:5120',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
        ];

        $request->validate($rules);
        $data = $request->except(['featured_image']);

        $data['slug'] = Str::slug($request->title).'-'.Str::random(4);
        $data['is_published'] = $request->has('is_published');
        $data['published_at'] = $data['is_published'] ? now() : null;

        if (! empty($data['tags'])) {
            $data['tags'] = array_map('trim', explode(',', $data['tags']));
        }

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        BlogPost::create($data);

        return back()->with('success', 'Blog post created successfully!');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $post = BlogPost::findOrFail($id);

        $rules = [
            'category_id' => 'nullable|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|max:5120',
            'tags' => 'nullable|string',
            'is_published' => 'boolean',
        ];

        $request->validate($rules);
        $data = $request->except(['featured_image']);

        $data['is_published'] = $request->has('is_published');
        if ($data['is_published'] && ! $post->published_at) {
            $data['published_at'] = now();
        }

        if (! empty($data['tags']) && is_string($data['tags'])) {
            $data['tags'] = array_map('trim', explode(',', $data['tags']));
        }

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blogs', 'public');
        }

        $post->update($data);

        return back()->with('success', 'Blog post updated successfully!');
    }

    public function destroy(int $id): RedirectResponse
    {
        BlogPost::findOrFail($id)->delete();

        return back()->with('success', 'Blog post deleted successfully!');
    }
}
