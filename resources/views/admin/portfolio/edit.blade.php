@extends('admin.layouts.app')

@section('title', 'Portfolio Details & Social Links')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-extrabold mb-1">Portfolio Information</h4>
        <p class="text-secondary small mb-0">Update your full name, profession, biography, metrics, contact details, and social links.</p>
    </div>
</div>

<form action="{{ route('admin.portfolio.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row g-4">
        <!-- Personal Details -->
        <div class="col-md-8">
            <div class="card-custom p-4">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-user me-2 text-primary"></i> Basic Profile</h5>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="{{ $portfolio->full_name }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Profession Title</label>
                        <input type="text" name="profession" class="form-control" value="{{ $portfolio->profession }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Profile Photo</label>
                        @if($portfolio->profile_photo)
                            <div class="mb-2"><img src="{{ $portfolio->profile_photo }}" width="60" class="rounded"></div>
                        @endif
                        <input type="file" name="profile_photo" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Cover Image</label>
                        @if($portfolio->cover_image)
                            <div class="mb-2"><img src="{{ $portfolio->cover_image }}" width="100" class="rounded"></div>
                        @endif
                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Availability Status</label>
                        <input type="text" name="availability" class="form-control" value="{{ $portfolio->availability }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Location / Address</label>
                        <input type="text" name="location" class="form-control" value="{{ $portfolio->location }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Short Bio (Hero Intro)</label>
                        <textarea name="short_bio" class="form-control" rows="2">{{ $portfolio->short_bio }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">About Me (Full Biography)</label>
                        <textarea name="about_me" class="form-control" rows="5">{{ $portfolio->about_me }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metrics & Counters -->
        <div class="col-md-4">
            <div class="card-custom p-4 mb-4">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-chart-simple me-2 text-primary"></i> Achievement Counters</h5>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Years of Experience</label>
                    <input type="number" name="years_of_experience" class="form-control" value="{{ $portfolio->years_of_experience }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Completed Projects</label>
                    <input type="number" name="completed_projects" class="form-control" value="{{ $portfolio->completed_projects }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Happy Clients</label>
                    <input type="number" name="happy_clients" class="form-control" value="{{ $portfolio->happy_clients }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Awards Received</label>
                    <input type="number" name="awards_count" class="form-control" value="{{ $portfolio->awards_count }}">
                </div>
            </div>
        </div>

        <!-- Social Media & Contact Links -->
        <div class="col-12">
            <div class="card-custom p-4">
                <h5 class="fw-bold mb-3"><i class="fa-solid fa-share-nodes me-2 text-primary"></i> Contact Information & Social Profiles</h5>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-phone me-1 text-secondary"></i> Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ $portfolio->phone }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-envelope me-1 text-secondary"></i> Email Address</label>
                        <input type="email" name="email" class="form-control" value="{{ $portfolio->email }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-globe me-1 text-secondary"></i> Website</label>
                        <input type="url" name="website" class="form-control" value="{{ $portfolio->website }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold"><i class="fa-brands fa-github me-1"></i> GitHub URL</label>
                        <input type="url" name="github" class="form-control" value="{{ $portfolio->github }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold"><i class="fa-brands fa-linkedin me-1 text-primary"></i> LinkedIn URL</label>
                        <input type="url" name="linkedin" class="form-control" value="{{ $portfolio->linkedin }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold"><i class="fa-brands fa-twitter me-1 text-info"></i> Twitter / X URL</label>
                        <input type="url" name="twitter" class="form-control" value="{{ $portfolio->twitter }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold"><i class="fa-brands fa-dribbble me-1 text-danger"></i> Dribbble URL</label>
                        <input type="url" name="dribbble" class="form-control" value="{{ $portfolio->dribbble }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold"><i class="fa-brands fa-youtube me-1 text-danger"></i> YouTube URL</label>
                        <input type="url" name="youtube" class="form-control" value="{{ $portfolio->youtube }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold"><i class="fa-brands fa-behance me-1 text-primary"></i> Behance URL</label>
                        <input type="url" name="behance" class="form-control" value="{{ $portfolio->behance }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4 text-end">
        <button type="submit" class="btn btn-primary btn-lg px-5 rounded-3 fw-bold">
            <i class="fa-solid fa-save me-2"></i> Save Portfolio Info
        </button>
    </div>
</form>
@endsection
