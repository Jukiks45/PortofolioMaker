@extends('layouts.dashboard')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Admin Dashboard</h4>
    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="stat-card">
                    <div class="stat-icon primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <div class="stat-value">0</div>
                        <div class="stat-label">Total Users</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="stat-card">
                    <div class="stat-icon success">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div>
                        <div class="stat-value">0</div>
                        <div class="stat-label">Total Portfolios</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="stat-card">
                    <div class="stat-icon warning">
                        <i class="fas fa-palette"></i>
                    </div>
                    <div>
                        <div class="stat-value">0</div>
                        <div class="stat-label">Total Templates</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="dashboard-card">
                <div class="stat-card">
                    <div class="stat-icon primary">
                        <i class="fas fa-download"></i>
                    </div>
                    <div>
                        <div class="stat-value">0</div>
                        <div class="stat-label">Total Downloads</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
