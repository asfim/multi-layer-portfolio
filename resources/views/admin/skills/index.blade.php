@extends('admin.layouts.app')

@section('title', 'Skills & Technical Proficiency')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Skills & Technical Tools</h4>
        <p class="text-secondary small mb-0">Manage your skill set, proficiency percentages, and category groupings.</p>
    </div>
    <button class="btn btn-primary rounded-3 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#createSkillModal">
        <i class="fa-solid fa-plus me-2"></i> Add Skill
    </button>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Skill Name</th>
                    <th>Category</th>
                    <th>Proficiency Level</th>
                    <th>Icon Class</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $skill)
                    <tr>
                        <td class="fw-bold">
                            <i class="{{ $skill->icon ?? 'fa-solid fa-code' }} me-2 text-primary"></i> {{ $skill->name }}
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ $skill->category->name ?? 'General' }}</span></td>
                        <td>
                            <div class="d-flex align-items-center gap-2" style="max-width: 200px;">
                                <div class="progress flex-grow-1" style="height: 8px;">
                                    <div class="progress-bar bg-primary" style="width: {{ $skill->proficiency }}%;"></div>
                                </div>
                                <small class="fw-bold">{{ $skill->proficiency }}%</small>
                            </div>
                        </td>
                        <td><code>{{ $skill->icon }}</code></td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary rounded-3 me-1" data-bs-toggle="modal" data-bs-target="#editSkillModal{{ $skill->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" onclick="return confirm('Delete skill?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editSkillModal{{ $skill->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content text-start">
                                <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Edit Skill</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Skill Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $skill->name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Category</label>
                                            <select name="category_id" class="form-select">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}" {{ $skill->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Proficiency Percentage (0 - 100)</label>
                                            <input type="number" name="proficiency" class="form-control" value="{{ $skill->proficiency }}" min="0" max="100" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">FontAwesome Icon Class</label>
                                            <input type="text" name="icon" class="form-control" value="{{ $skill->icon }}">
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
                        <td colspan="5" class="text-center py-4 text-muted">No skills found. Add your first skill above!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createSkillModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.skills.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Skill Name</label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g. Laravel / PHP 8.3">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Category</label>
                        <select name="category_id" class="form-select">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Proficiency Percentage (0 - 100)</label>
                        <input type="number" name="proficiency" class="form-control" value="85" min="0" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">FontAwesome Icon Class</label>
                        <input type="text" name="icon" class="form-control" placeholder="fa-brands fa-laravel">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Skill</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
