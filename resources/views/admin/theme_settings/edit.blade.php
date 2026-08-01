@extends('admin.layouts.app')

@section('title', 'Theme Customizer & Dynamic Styling')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Live Theme Customizer</h4>
        <p class="text-secondary small mb-0">Customize global color palettes, typography, dark/light mode, and visual effects.</p>
    </div>
</div>

<form action="{{ route('admin.theme_settings.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="row g-4">
        <!-- Color Palette -->
        <div class="col-md-6">
            <div class="card-custom p-4 h-100">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-palette text-primary me-2"></i> Color Palette</h5>
                
                <div class="mb-3">
                    <label class="form-label fw-semibold">Primary Accent Color</label>
                    <div class="d-flex align-items-center gap-3">
                        <input type="color" name="primary_color" class="form-control form-control-color" value="{{ $theme->primary_color }}">
                        <input type="text" class="form-control" value="{{ $theme->primary_color }}" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Secondary Color</label>
                    <div class="d-flex align-items-center gap-3">
                        <input type="color" name="secondary_color" class="form-control form-control-color" value="{{ $theme->secondary_color }}">
                        <input type="text" class="form-control" value="{{ $theme->secondary_color }}" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Glow Accent Color</label>
                    <div class="d-flex align-items-center gap-3">
                        <input type="color" name="accent_color" class="form-control form-control-color" value="{{ $theme->accent_color }}">
                        <input type="text" class="form-control" value="{{ $theme->accent_color }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        <!-- Typography & Layout Defaults -->
        <div class="col-md-6">
            <div class="card-custom p-4 h-100">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-font text-primary me-2"></i> Typography & Preferences</h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Default Color Mode</label>
                    <select name="dark_mode" class="form-select">
                        <option value="dark" {{ $theme->dark_mode === 'dark' ? 'selected' : '' }}>Dark Mode (Recommended)</option>
                        <option value="light" {{ $theme->dark_mode === 'light' ? 'selected' : '' }}>Light Mode</option>
                        <option value="auto" {{ $theme->dark_mode === 'auto' ? 'selected' : '' }}>System Auto</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Font Family</label>
                    <select name="font_family" class="form-select">
                        <option value="Inter" {{ $theme->font_family === 'Inter' ? 'selected' : '' }}>Inter (Clean Tech)</option>
                        <option value="Plus Jakarta Sans" {{ $theme->font_family === 'Plus Jakarta Sans' ? 'selected' : '' }}>Plus Jakarta Sans (Modern)</option>
                        <option value="Outfit" {{ $theme->font_family === 'Outfit' ? 'selected' : '' }}>Outfit (Creative & Bold)</option>
                        <option value="Roboto" {{ $theme->font_family === 'Roboto' ? 'selected' : '' }}>Roboto (Corporate)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Border Radius</label>
                    <select name="border_radius" class="form-select">
                        <option value="4px" {{ $theme->border_radius === '4px' ? 'selected' : '' }}>Sharp (4px)</option>
                        <option value="8px" {{ $theme->border_radius === '8px' ? 'selected' : '' }}>Smooth (8px)</option>
                        <option value="12px" {{ $theme->border_radius === '12px' ? 'selected' : '' }}>Rounded (12px)</option>
                        <option value="20px" {{ $theme->border_radius === '20px' ? 'selected' : '' }}>Pill Style (20px)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Button Style</label>
                    <select name="button_style" class="form-select">
                        <option value="rounded" {{ $theme->button_style === 'rounded' ? 'selected' : '' }}>Rounded Corners</option>
                        <option value="rounded-pill" {{ $theme->button_style === 'rounded-pill' ? 'selected' : '' }}>Pill Shape</option>
                        <option value="square" {{ $theme->button_style === 'square' ? 'selected' : '' }}>Flat Square</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">AOS Scroll Animation</label>
                    <select name="animation_style" class="form-select">
                        <option value="fade-up" {{ $theme->animation_style === 'fade-up' ? 'selected' : '' }}>Fade Up</option>
                        <option value="zoom-in" {{ $theme->animation_style === 'zoom-in' ? 'selected' : '' }}>Zoom In</option>
                        <option value="fade" {{ $theme->animation_style === 'fade' ? 'selected' : '' }}>Simple Fade</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Interactive FX Toggles -->
        <div class="col-12">
            <div class="card-custom p-4">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-wand-magic-sparkles text-primary me-2"></i> Visual Effects & Interactive Features</h5>
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="form-check form-switch p-3 border rounded-3 bg-light">
                            <input class="form-check-input ms-0 me-2" type="checkbox" name="enable_particles" id="fx1" {{ $theme->enable_particles ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="fx1">Particle Canvas Background</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check form-switch p-3 border rounded-3 bg-light">
                            <input class="form-check-input ms-0 me-2" type="checkbox" name="enable_preloader" id="fx2" {{ $theme->enable_preloader ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="fx2">Animated Site Preloader</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check form-switch p-3 border rounded-3 bg-light">
                            <input class="form-check-input ms-0 me-2" type="checkbox" name="enable_cursor_effect" id="fx3" {{ $theme->enable_cursor_effect ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="fx3">Custom Glow Cursor</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check form-switch p-3 border rounded-3 bg-light">
                            <input class="form-check-input ms-0 me-2" type="checkbox" name="enable_glassmorphism" id="fx4" {{ $theme->enable_glassmorphism ? 'checked' : '' }}>
                            <label class="form-check-label fw-semibold" for="fx4">Glassmorphism UI</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom CSS & JS Injection -->
        <div class="col-md-6">
            <div class="card-custom p-4">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-code text-primary me-2"></i> Custom CSS</h5>
                <textarea name="custom_css" class="form-control font-monospace" rows="6" placeholder="/* Custom CSS overrides here */">{{ $theme->custom_css }}</textarea>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card-custom p-4">
                <h5 class="fw-bold mb-3"><i class="fa-brands fa-js text-warning me-2"></i> Custom JS Script</h5>
                <textarea name="custom_js" class="form-control font-monospace" rows="6" placeholder="// Custom JavaScript scripts here">{{ $theme->custom_js }}</textarea>
            </div>
        </div>
    </div>

    <div class="mt-4 text-end">
        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-3 fw-bold">
            <i class="fa-solid fa-save me-2"></i> Save Theme Settings
        </button>
    </div>
</form>
@endsection
