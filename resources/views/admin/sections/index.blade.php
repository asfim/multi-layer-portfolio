@extends('admin.layouts.app')

@section('title', 'Drag & Drop Section Builder')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Section Builder & Re-order</h4>
        <p class="text-secondary small mb-0">Drag and reorder sections, enable/disable components, or customize section titles.</p>
    </div>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">Drag</th>
                    <th>Section Name</th>
                    <th>Key</th>
                    <th>Custom Title</th>
                    <th>Custom Subtitle</th>
                    <th class="text-center">Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody id="sortable-sections">
                @foreach($sections as $section)
                    <tr data-id="{{ $section->id }}">
                        <td class="drag-handle text-muted cursor-grab text-center">
                            <i class="fa-solid fa-grip-vertical fa-lg"></i>
                        </td>
                        <td class="fw-bold">{{ $section->name }}</td>
                        <td><code>{{ $section->key }}</code></td>
                        <td>{{ $section->title ?? '-' }}</td>
                        <td>{{ $section->subtitle ?? '-' }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.sections.toggle', $section->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm {{ $section->is_active ? 'btn-success' : 'btn-secondary' }} rounded-pill px-3">
                                    {{ $section->is_active ? 'Enabled' : 'Disabled' }}
                                </button>
                            </form>
                        </td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary rounded-3" data-bs-toggle="modal" data-bs-target="#editModal{{ $section->id }}">
                                <i class="fa-solid fa-pen-to-square"></i> Edit Titles
                            </button>

                            <!-- Edit Modal -->
                            <div class="modal fade text-start" id="editModal{{ $section->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.sections.titles', $section->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold">Edit Section: {{ $section->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Custom Section Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $section->title }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Custom Subtitle</label>
                                                    <input type="text" name="subtitle" class="form-control" value="{{ $section->subtitle }}">
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const el = document.getElementById('sortable-sections');
        if (el) {
            new Sortable(el, {
                handle: '.drag-handle',
                animation: 150,
                onEnd: function () {
                    const orders = Array.from(el.children).map(row => row.getAttribute('data-id'));
                    fetch("{{ route('admin.sections.orders') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ orders: orders })
                    }).then(res => res.json()).then(data => {
                        if (data.success) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Section order updated!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    });
                }
            });
        }
    });
</script>
@endpush
