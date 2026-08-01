@extends('admin.layouts.app')

@section('title', 'Services Offered')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Services Offered</h4>
        <p class="text-secondary small mb-0">Manage services, descriptions, pricing/rates, and icons.</p>
    </div>
    <button class="btn btn-primary rounded-3 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#createServiceModal">
        <i class="fa-solid fa-plus me-2"></i> Add Service
    </button>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Service Title</th>
                    <th>Icon</th>
                    <th>Price / Rate</th>
                    <th>Description</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $svc)
                    <tr>
                        <td class="fw-bold">{{ $svc->title }}</td>
                        <td><i class="{{ $svc->icon ?? 'fa-solid fa-gear' }} me-2 text-primary"></i> <code>{{ $svc->icon }}</code></td>
                        <td><span class="badge bg-success-subtle text-success font-semibold">{{ $svc->price ?? 'Custom Rate' }}</span></td>
                        <td><small class="text-muted">{{ Str::limit($svc->short_description, 60) }}</small></td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary rounded-3 me-1" data-bs-toggle="modal" data-bs-target="#editServiceModal{{ $svc->id }}">
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('admin.services.destroy', $svc->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" onclick="return confirm('Delete service?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editServiceModal{{ $svc->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content text-start">
                                <form action="{{ route('admin.services.update', $svc->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bold">Edit Service</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Service Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ $svc->title }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">FontAwesome Icon Class</label>
                                            <input type="text" name="icon" class="form-control" value="{{ $svc->icon }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Starting Price / Rate</label>
                                            <input type="text" name="price" class="form-control" value="{{ $svc->price }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">Short Description</label>
                                            <textarea name="short_description" class="form-control" rows="2">{{ $svc->short_description }}</textarea>
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
                        <td colspan="5" class="text-center py-4 text-muted">No services found. Add your first offered service above!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="createServiceModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.services.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Service Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="Full Stack Web Development">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">FontAwesome Icon Class</label>
                        <input type="text" name="icon" class="form-control" placeholder="fa-solid fa-code">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Starting Price / Rate</label>
                        <input type="text" name="price" class="form-control" placeholder="Starting at $1,500">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Short Description</label>
                        <textarea name="short_description" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
