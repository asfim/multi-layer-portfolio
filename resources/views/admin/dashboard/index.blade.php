@extends('admin.layouts.app')

@section('title', 'Dashboard Overview')

@section('content')
<div class="row g-4 mb-4">
    <!-- Stat 1 -->
    <div class="col-sm-6 col-md-3">
        <div class="card-custom p-4 d-flex align-items-center gap-3">
            <div class="bg-primary-subtle text-primary p-3 rounded-4">
                <i class="fa-solid fa-folder-open fa-2xl"></i>
            </div>
            <div>
                <h3 class="fw-extrabold mb-0">{{ $stats['projectsCount'] }}</h3>
                <span class="text-secondary small">Total Projects</span>
            </div>
        </div>
    </div>
    <!-- Stat 2 -->
    <div class="col-sm-6 col-md-3">
        <div class="card-custom p-4 d-flex align-items-center gap-3">
            <div class="bg-success-subtle text-success p-3 rounded-4">
                <i class="fa-solid fa-laptop-code fa-2xl"></i>
            </div>
            <div>
                <h3 class="fw-extrabold mb-0">{{ $stats['skillsCount'] }}</h3>
                <span class="text-secondary small">Skills & Tools</span>
            </div>
        </div>
    </div>
    <!-- Stat 3 -->
    <div class="col-sm-6 col-md-3">
        <div class="card-custom p-4 d-flex align-items-center gap-3">
            <div class="bg-warning-subtle text-warning p-3 rounded-4">
                <i class="fa-solid fa-newspaper fa-2xl"></i>
            </div>
            <div>
                <h3 class="fw-extrabold mb-0">{{ $stats['blogsCount'] }}</h3>
                <span class="text-secondary small">Blog Articles</span>
            </div>
        </div>
    </div>
    <!-- Stat 4 -->
    <div class="col-sm-6 col-md-3">
        <div class="card-custom p-4 d-flex align-items-center gap-3">
            <div class="bg-info-subtle text-info p-3 rounded-4">
                <i class="fa-solid fa-envelope fa-2xl"></i>
            </div>
            <div>
                <h3 class="fw-extrabold mb-0">{{ $stats['messagesCount'] }}</h3>
                <span class="text-secondary small">Contact Inquiries</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Active Layout Card -->
    <div class="col-lg-5">
        <div class="card-custom p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">Active Layout Engine</h5>
                <span class="badge bg-success px-3 py-2 rounded-pill">Active</span>
            </div>
            <div class="p-3 bg-light rounded-3 border mb-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary text-white rounded-3 p-3">
                        <i class="fa-solid fa-object-group fa-xl"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-capitalize mb-1">{{ str_replace('_', ' ', $theme->active_layout) }}</h6>
                        <small class="text-muted">Primary Color: {{ $theme->primary_color }} | Mode: {{ $theme->dark_mode }}</small>
                    </div>
                </div>
            </div>
            <p class="text-secondary small">Changing your layout instantly transforms the entire frontend visual layout without touching any code.</p>
            <a href="{{ route('admin.layouts.index') }}" class="btn btn-primary w-100 rounded-3">
                <i class="fa-solid fa-palette me-2"></i> Switch Profession Layout
            </a>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="col-lg-7">
        <div class="card-custom p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0">Recent Contact Messages</h5>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary rounded-pill">View All</a>
            </div>

            @if($recentMessages->isEmpty())
                <div class="text-center py-4 text-muted">No recent messages received yet.</div>
            @else
                <div class="list-group list-group-flush">
                    @foreach($recentMessages as $msg)
                        <div class="list-group-item px-0 py-3 border-bottom">
                            <div class="d-flex justify-content-between">
                                <h6 class="fw-bold mb-1">{{ $msg->name }} <small class="text-muted">({{ $msg->email }})</small></h6>
                                <small class="text-secondary">{{ $msg->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1 text-secondary text-truncate small">{{ $msg->message }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
