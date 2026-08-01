@extends('admin.layouts.app')

@section('title', 'Certificates & Credentials')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Certificates & Verified Credentials</h4>
        <p class="text-secondary small mb-0">Add professional certifications, verification URLs, and issuer credentials.</p>
    </div>
    <button class="btn btn-primary rounded-3 px-4 fw-bold" data-bs-toggle="modal" data-bs-target="#createCertModal">
        <i class="fa-solid fa-plus me-2"></i> Add Certificate
    </button>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Certificate Title</th>
                    <th>Issuer</th>
                    <th>Issue Date</th>
                    <th>Verification Link</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($certificates as $cert)
                    <tr>
                        <td class="fw-bold">{{ $cert->title }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $cert->issuer }}</span></td>
                        <td>{{ $cert->issue_date ?? 'N/A' }}</td>
                        <td>
                            @if($cert->verification_url)
                                <a href="{{ $cert->verification_url }}" target="_blank" class="text-decoration-none small fw-semibold">
                                    <i class="fa-solid fa-arrow-up-right-from-square me-1"></i> Verify URL
                                </a>
                            @else
                                <span class="text-muted small">No Link</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.certificates.destroy', $cert->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" onclick="return confirm('Delete certificate?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No certificates found. Add your certifications above!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="createCertModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.certificates.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Add Certificate</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Certificate Title</label>
                        <input type="text" name="title" class="form-control" required placeholder="AWS Certified Solutions Architect">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Issuer Organization</label>
                        <input type="text" name="issuer" class="form-control" required placeholder="Amazon Web Services">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Issue Date / Year</label>
                        <input type="text" name="issue_date" class="form-control" placeholder="2024">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Verification URL</label>
                        <input type="url" name="verification_url" class="form-control" placeholder="https://">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Certificate Badge Image URL</label>
                        <input type="text" name="image" class="form-control" placeholder="https://">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Certificate</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
