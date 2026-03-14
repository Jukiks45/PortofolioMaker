@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')

    <div class="container-fluid">

        <!-- Page Header -->
        <div class="mb-4">
            <h2 class="fw-bold">Profile</h2>
            <p class="text-muted mb-0">
                Manage your personal profile information.
            </p>
        </div>

        <div class="row g-4">

            <!-- Profile Photo -->
            <div class="col-lg-4">

                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">

                        <img src="https://placehold.co/150" class="rounded-circle mb-3" width="120" height="120"
                            alt="Profile Photo">

                        <h5 class="fw-semibold mb-1">
                            John Doe
                        </h5>

                        <p class="text-muted small mb-3">
                            UI/UX Designer
                        </p>

                        <button class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-upload"></i> Upload Photo
                        </button>

                    </div>
                </div>

            </div>


            <!-- Profile Information -->
            <div class="col-lg-8">

                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <h5 class="fw-semibold mb-3">
                            Personal Information
                        </h5>

                        <form>

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Your name">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Job Title</label>
                                    <input type="text" class="form-control" placeholder="e.g. Web Developer">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="email@example.com">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Location</label>
                                    <input type="text" class="form-control" placeholder="City, Country">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Website</label>
                                    <input type="text" class="form-control" placeholder="https://yourwebsite.com">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control" rows="4" placeholder="Write a short bio..."></textarea>
                                </div>

                            </div>

                            <div class="mt-4">
                                <button class="btn btn-primary">
                                    Save Profile
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
