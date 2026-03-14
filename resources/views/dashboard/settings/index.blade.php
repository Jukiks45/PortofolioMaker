@extends('layouts.dashboard')

@section('title', 'Settings')

@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="mb-4">
        <h2 class="fw-bold">Account Settings</h2>
        <p class="text-muted mb-0">
            Manage your account settings and security.
        </p>
    </div>


    <div class="row g-4">

        <!-- Account Information -->
        <div class="col-lg-6">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h5 class="fw-semibold mb-3">
                        Account Information
                    </h5>

                    <form>

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" placeholder="Your name">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" placeholder="email@example.com">
                        </div>

                        <button class="btn btn-primary">
                            Save Changes
                        </button>

                    </form>

                </div>
            </div>

        </div>


        <!-- Change Password -->
        <div class="col-lg-6">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <h5 class="fw-semibold mb-3">
                        Change Password
                    </h5>

                    <form>

                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control">
                        </div>

                        <button class="btn btn-primary">
                            Update Password
                        </button>

                    </form>

                </div>
            </div>

        </div>


        <!-- Danger Zone -->
        <div class="col-12">

            <div class="card border-danger shadow-sm">
                <div class="card-body">

                    <h5 class="fw-semibold text-danger mb-2">
                        Danger Zone
                    </h5>

                    <p class="text-muted">
                        Deleting your account will permanently remove all your portfolios.
                    </p>

                    <button class="btn btn-danger">
                        Delete Account
                    </button>

                </div>
            </div>

        </div>

    </div>

</div>

@endsection
