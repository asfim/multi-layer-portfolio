@extends('admin.layouts.app')

@section('title', 'Blog Posts Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Blog Articles & Insights</h4>
        <p class="text-secondary small mb-0">Publish tech articles, insights, and tutorials.</p>
    </div>
    <button class="btn btn-primary rounded-3 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#createBlogModal">
        <i class="fa-solid fa-plus me-2"></i> Create Article
    </button>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Article Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Views</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td class="fw-bold">{{ $post->title }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $post->category->name ?? 'General' }}</span></td>
                        <td>
                            @if($post->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>{{ number_format($post->views) }}</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary rounded-3 me-1" data-bs-toggle="modal" data-bs-target="#editBlogModal{{ $post->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" onclick="return confirm('Delete blog post?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editBlogModal{{ $post->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.blogs.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Edit Article</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <div class="row g-3">
                                            <div class="col-md-8">
                                                <label class="form-label fw-semibold">Article Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-semibold">Category</label>
                                                <select name="category_id" class="form-select">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-semibold">Featured Image</label>
                                                @if($post->featured_image)
                                                    <div class="mb-2"><img src="{{ $post->featured_image }}" width="100" class="rounded"></div>
                                                @endif
                                                <input type="file" name="featured_image" class="form-control" accept="image/*">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-semibold">Excerpt</label>
                                                <textarea name="excerpt" class="form-control" rows="2">{{ $post->excerpt }}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-semibold">Content (HTML Supported)</label>
                                                <textarea name="content" class="form-control" rows="6" required>{{ $post->content }}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="is_published" id="pubCheck{{ $post->id }}" {{ $post->is_published ? 'checked' : '' }}>
                                                    <label class="form-check-label fw-semibold" for="pubCheck{{ $post->id }}">Published Status</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No blog posts found. Publish your first article above!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="createBlogModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Create Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Article Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Category</label>
                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Featured Image</label>
                            <input type="file" name="featured_image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Excerpt</label>
                            <textarea name="excerpt" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Content (HTML Supported)</label>
                            <textarea name="content" class="form-control" rows="6" required></textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_published" id="pubCheck" checked>
                                <label class="form-check-label fw-semibold" for="pubCheck">Publish Immediately</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Article</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
