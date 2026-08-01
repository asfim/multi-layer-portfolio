@extends('admin.layouts.app')

@section('title', 'Testimonials & Client Feedback')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Testimonials & Reviews</h4>
        <p class="text-secondary small mb-0">Manage client reviews, star ratings, and feedback.</p>
    </div>
    <button class="btn btn-primary rounded-3 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#createTestModal">
        <i class="fa-solid fa-plus me-2"></i> Add Testimonial
    </button>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Client</th>
                    <th>Company & Role</th>
                    <th>Rating</th>
                    <th>Review Snippet</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $test)
                    <tr>
                        <td class="fw-bold">{{ $test->client_name }}</td>
                        <td>{{ $test->designation ?? 'Client' }} <small class="text-muted">({{ $test->company ?? 'Company' }})</small></td>
                        <td>
                            <div class="text-warning">
                                @for($i=1; $i<=$test->rating; $i++)
                                    <i class="fa-solid fa-star"></i>
                                @endfor
                            </div>
                        </td>
                        <td><small class="text-muted">{{ Str::limit($test->review, 60) }}</small></td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary rounded-3 me-1" data-bs-toggle="modal" data-bs-target="#editTestModal{{ $test->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('admin.testimonials.destroy', $test->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" onclick="return confirm('Delete review?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editTestModal{{ $test->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content text-start">
                                <form action="{{ route('admin.testimonials.update', $test->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Edit Testimonial</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Client Name</label>
                                            <input type="text" name="client_name" class="form-control" value="{{ $test->client_name }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Client Photo</label>
                                            @if($test->client_photo)
                                                <div class="mb-2"><img src="{{ $test->client_photo }}" width="50" class="rounded-circle" style="height: 50px; object-fit: cover;"></div>
                                            @endif
                                            <input type="file" name="client_photo" class="form-control" accept="image/*">
                                        </div>
                                        <div class="row g-3 mb-3">
                                            <div class="col-6">
                                                <label class="form-label fw-semibold">Designation</label>
                                                <input type="text" name="designation" class="form-control" value="{{ $test->designation }}">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label fw-semibold">Company</label>
                                                <input type="text" name="company" class="form-control" value="{{ $test->company }}">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Star Rating (1-5)</label>
                                            <select name="rating" class="form-select">
                                                <option value="5" {{ $test->rating == 5 ? 'selected' : '' }}>5 Stars (Excellent)</option>
                                                <option value="4" {{ $test->rating == 4 ? 'selected' : '' }}>4 Stars</option>
                                                <option value="3" {{ $test->rating == 3 ? 'selected' : '' }}>3 Stars</option>
                                                <option value="2" {{ $test->rating == 2 ? 'selected' : '' }}>2 Stars</option>
                                                <option value="1" {{ $test->rating == 1 ? 'selected' : '' }}>1 Star</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Client Review Text</label>
                                            <textarea name="review" class="form-control" rows="3" required>{{ $test->review }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No testimonials found. Add client feedback above!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="createTestModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Testimonial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Client Name</label>
                        <input type="text" name="client_name" class="form-control" required placeholder="Sarah Jenkins">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Client Photo</label>
                        <input type="file" name="client_photo" class="form-control" accept="image/*">
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Designation</label>
                            <input type="text" name="designation" class="form-control" placeholder="CTO">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Company</label>
                            <input type="text" name="company" class="form-control" placeholder="InnoTech">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Star Rating (1-5)</label>
                        <select name="rating" class="form-select">
                            <option value="5" selected>5 Stars (Excellent)</option>
                            <option value="4">4 Stars</option>
                            <option value="3">3 Stars</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Client Review Text</label>
                        <textarea name="review" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Testimonial</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
