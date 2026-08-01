@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Contact Messages & Inquiries</h4>
        <p class="text-secondary small mb-0">View messages submitted via your portfolio contact forms.</p>
    </div>
</div>

<div class="card-custom p-4">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Sender Name</th>
                    <th>Email Address</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Received</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                    <tr class="{{ !$msg->is_read ? 'table-primary' : '' }}">
                        <td class="fw-bold">{{ $msg->name }}</td>
                        <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                        <td>{{ $msg->subject ?? 'General Inquiry' }}</td>
                        <td><small class="text-secondary">{{ $msg->message }}</small></td>
                        <td><small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small></td>
                        <td class="text-end">
                            @if(!$msg->is_read)
                                <form action="{{ route('admin.contacts.read', $msg->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-success rounded-3 me-1">
                                        <i class="fa-solid fa-check"></i> Read
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('admin.contacts.destroy', $msg->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-3" onclick="return confirm('Delete message?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No contact messages received yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
