@extends('admin.layouts.app')

@section('title', 'Projects Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Projects & Case Studies</h4>
        <p class="text-secondary small mb-0">Manage your portfolio projects, tech stacks, and live project demos.</p>
    </div>
    <button class="btn btn-primary rounded-3 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#createProjectModal">
        <i class="fa-solid fa-plus me-2"></i> Add New Project
    </button>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Cover</th>
                    <th>Title & Client</th>
                    <th>Category</th>
                    <th>Technologies</th>
                    <th class="text-center">Featured</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>
                            <img src="{{ $project->cover_image }}" alt="" class="rounded-3" style="width: 54px; height: 40px; object-fit: cover;">
                        </td>
                        <td>
                            <div class="fw-bold">{{ $project->title }}</div>
                            <small class="text-muted">{{ $project->client_name ?? 'Personal Project' }}</small>
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ $project->category->name ?? 'Uncategorized' }}</span></td>
                        <td>
                            @if(is_array($project->technologies))
                                @foreach($project->technologies as $tech)
                                    <span class="badge bg-secondary-subtle text-secondary me-1">{{ $tech }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td class="text-center">
                            @if($project->is_featured)
                                <span class="badge bg-warning text-dark"><i class="fa-solid fa-star me-1"></i> Featured</span>
                            @else
                                <span class="badge bg-light text-muted">Standard</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary rounded-3 me-1" data-bs-toggle="modal" data-bs-target="#editProjectModal{{ $project->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" onclick="return confirm('Delete this project?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Edit Project</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row g-3">
                                            <div class="col-md-8">
                                                <label class="form-label fw-semibold">Project Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label fw-semibold">Category</label>
                                                <select name="category_id" class="form-select">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}" {{ $project->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Cover Image</label>
                                                @if($project->cover_image)
                                                    <div class="mb-2"><img src="{{ $project->cover_image }}" width="60" class="rounded"></div>
                                                @endif
                                                <input type="file" name="cover_image" class="form-control" accept="image/*">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Client Name</label>
                                                <input type="text" name="client_name" class="form-control" value="{{ $project->client_name }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">Live Project URL</label>
                                                <input type="url" name="live_url" class="form-control" value="{{ $project->live_url }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-semibold">GitHub Repository URL</label>
                                                <input type="url" name="github_url" class="form-control" value="{{ $project->github_url }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-semibold">Technologies (Comma Separated)</label>
                                                <input type="text" name="technologies" class="form-control" value="{{ is_array($project->technologies) ? implode(', ', $project->technologies) : '' }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-semibold">Short Description</label>
                                                <textarea name="short_description" class="form-control" rows="2">{{ $project->short_description }}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label fw-semibold">Full Description</label>
                                                <textarea name="description" class="form-control" rows="4">{{ $project->description }}</textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="is_featured" id="featCheck{{ $project->id }}" {{ $project->is_featured ? 'checked' : '' }}>
                                                    <label class="form-check-label fw-semibold" for="featCheck{{ $project->id }}">Show on Featured Projects Section</label>
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
                        <td colspan="6" class="text-center py-4 text-muted">No projects found. Create your first project above!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createProjectModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Project Title</label>
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
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Client Name</label>
                            <input type="text" name="client_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Live Project URL</label>
                            <input type="url" name="live_url" class="form-control" placeholder="https://">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">GitHub Repository URL</label>
                            <input type="url" name="github_url" class="form-control" placeholder="https://github.com/...">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Technologies (Comma Separated)</label>
                            <input type="text" name="technologies" class="form-control" placeholder="Laravel 12, Vue 3, TailwindCSS, MySQL">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Full Description</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="is_featured" id="featCheck" checked>
                                <label class="form-check-label fw-semibold" for="featCheck">Show on Featured Projects Section</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Create Project</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
