@extends('admin.layouts.app')

@section('title', 'Education & Qualifications')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Education & Qualifications</h4>
        <p class="text-secondary small mb-0">Manage degrees, university history, department, and achievements.</p>
    </div>
    <button class="btn btn-primary rounded-3 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#createEduModal">
        <i class="fa-solid fa-plus me-2"></i> Add Education
    </button>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Institute</th>
                    <th>Degree & Department</th>
                    <th>Result / GPA</th>
                    <th>Duration</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($educations as $edu)
                    <tr>
                        <td class="fw-bold">{{ $edu->institute }}</td>
                        <td>
                            {{ $edu->degree }}
                            <small class="text-muted d-block">{{ $edu->department ?? '' }}</small>
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ $edu->result ?? 'N/A' }}</span></td>
                        <td>{{ $edu->start_year }} - {{ $edu->end_year ?? 'Present' }}</td>
                        <td class="text-end">
                            <form action="{{ route('admin.education.destroy', $edu->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" onclick="return confirm('Delete education?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No education records found. Add your academic background above!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createEduModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.education.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Institute / University</label>
                        <input type="text" name="institute" class="form-control" required placeholder="e.g. Stanford University">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Degree</label>
                        <input type="text" name="degree" class="form-control" required placeholder="e.g. B.S. in Computer Science">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Department / Specialization</label>
                        <input type="text" name="department" class="form-control" placeholder="e.g. School of Engineering">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Start Year</label>
                            <input type="text" name="start_year" class="form-control" required placeholder="2015">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">End Year</label>
                            <input type="text" name="end_year" class="form-control" placeholder="2019">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Result / GPA</label>
                        <input type="text" name="result" class="form-control" placeholder="e.g. 3.92 GPA / 1st Class">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Education</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
