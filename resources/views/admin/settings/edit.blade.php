@extends('admin.layouts.app')

@section('title', 'Site Settings & SEO')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Site Settings & SEO Meta Configuration</h4>
        <p class="text-secondary small mb-0">Configure SEO meta tags, Google Analytics, social channels, and SMTP settings.</p>
    </div>
</div>

<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <!-- Site Info & SEO -->
        <div class="col-md-6">
            <div class="card-custom p-4 h-100">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-magnifying-glass me-2 text-primary"></i> General & SEO Meta</h5>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Website Name</label>
                    <input type="text" name="site_name" class="form-control" value="{{ $settings->site_name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $settings->meta_title }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3">{{ $settings->meta_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Meta Keywords</label>
                    <input type="text" name="meta_keywords" class="form-control" value="{{ $settings->meta_keywords }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Site Logo</label>
                    @if($settings->logo)
                        <div class="mb-2"><img src="{{ $settings->logo }}" width="80" class="rounded bg-light p-1"></div>
                    @endif
                    <input type="file" name="logo" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Favicon</label>
                    @if($settings->favicon)
                        <div class="mb-2"><img src="{{ $settings->favicon }}" width="32" class="rounded"></div>
                    @endif
                    <input type="file" name="favicon" class="form-control" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">SEO Meta Image</label>
                    @if($settings->meta_image)
                        <div class="mb-2"><img src="{{ $settings->meta_image }}" width="120" class="rounded"></div>
                    @endif
                    <input type="file" name="meta_image" class="form-control" accept="image/*">
                </div>
            </div>
        </div>

        <!-- Analytics & Tracking -->
        <div class="col-md-6">
            <div class="card-custom p-4 h-100">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-chart-line me-2 text-primary"></i> Tracking & Integrations</h5>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Google Analytics Tracking ID</label>
                    <input type="text" name="google_analytics_id" class="form-control" value="{{ $settings->google_analytics_id }}" placeholder="G-XXXXXXXXXX">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Facebook Pixel ID</label>
                    <input type="text" name="facebook_pixel_id" class="form-control" value="{{ $settings->facebook_pixel_id }}" placeholder="1234567890">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">WhatsApp Direct Number</label>
                    <input type="text" name="whatsapp_number" class="form-control" value="{{ $settings->whatsapp_number }}" placeholder="+15552345678">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Telegram Username</label>
                    <input type="text" name="telegram_username" class="form-control" value="{{ $settings->telegram_username }}" placeholder="username">
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-end">
        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-3 fw-bold">
            <i class="fa-solid fa-save me-2"></i> Save Site Settings
        </button>
    </div>
</form>
@endsection
