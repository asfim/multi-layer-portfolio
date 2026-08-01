@extends('admin.layouts.app')

@section('title', 'Work Experience Timeline')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Work Experience Timeline</h4>
        <p class="text-secondary small mb-0">Manage career positions, companies, roles, and descriptions.</p>
    </div>
    <button class="btn btn-primary rounded-3 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#createExpModal">
        <i class="fa-solid fa-plus me-2"></i> Add Experience
    </button>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Company & Location</th>
                    <th>Designation</th>
                    <th>Duration</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $exp)
                    <tr>
                        <td class="fw-bold">
                            {{ $exp->company }}
                            <small class="text-muted d-block font-normal">{{ $exp->location ?? 'Remote' }}</small>
                        </td>
                        <td>{{ $exp->designation }}</td>
                        <td>{{ $exp->start_date }} - {{ $exp->is_current ? 'Present' : $exp->end_date }}</td>
                        <td>
                            @if($exp->is_current)
                                <span class="badge bg-success-subtle text-success">Currently Working</span>
                            @else
                                <span class="badge bg-light text-secondary">Past Role</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.experience.destroy', $exp->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" onclick="return confirm('Delete record?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No experience entries found. Add your first career milestone!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createExpModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.experience.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Company Name</label>
                        <input type="text" name="company" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Designation / Role Title</label>
                        <input type="text" name="designation" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="e.g. San Francisco, CA">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Start Year/Date</label>
                            <input type="text" name="start_date" class="form-control" required placeholder="e.g. 2022">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">End Year/Date</label>
                            <input type="text" name="end_date" class="form-control" placeholder="e.g. 2025">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="is_current" id="currCheck" checked>
                            <label class="form-check-label fw-semibold" for="currCheck">Currently Working Here</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Experience</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
