@extends('admin.layouts.app')

@section('title', '10 Profession Layouts Engine')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">10 Profession Template Engine</h4>
        <p class="text-secondary small mb-0">Select any profession theme to instantly transform the frontend website design.</p>
    </div>
</div>

<div class="row g-4">
    @foreach($layouts as $layout)
        <div class="col-md-6 col-lg-4">
            <div class="card-custom h-100 p-4 border {{ $theme->active_layout === $layout['id'] ? 'border-2 border-primary shadow-sm' : '' }}">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <span class="badge bg-light text-dark border px-3 py-2 rounded-pill fw-semibold">{{ $layout['badge'] }}</span>
                    @if($theme->active_layout === $layout['id'])
                        <span class="badge bg-primary px-3 py-2 rounded-pill"><i class="fa-solid fa-check me-1"></i> Active</span>
                    @endif
                </div>

                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold" style="width: 48px; height: 48px; background: {{ $layout['color'] }}; font-size: 1.2rem;">
                        <i class="fa-solid fa-paintbrush"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0">{{ $layout['name'] }}</h6>
                        <small class="text-muted">{{ $layout['category'] }}</small>
                    </div>
                </div>

                <p class="text-secondary small mb-4" style="min-height: 50px;">{{ $layout['description'] }}</p>

                <form action="{{ route('admin.layouts.select') }}" method="POST">
                    @csrf
                    <input type="hidden" name="layout" value="{{ $layout['id'] }}">
                    <button type="submit" class="btn w-100 {{ $theme->active_layout === $layout['id'] ? 'btn-outline-primary disabled' : 'btn-primary' }} rounded-3 py-2">
                        @if($theme->active_layout === $layout['id'])
                            <i class="fa-solid fa-circle-check me-1"></i> Currently Active
                        @else
                            <i class="fa-solid fa-wand-magic-sparkles me-1"></i> Activate Theme
                        @endif
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
