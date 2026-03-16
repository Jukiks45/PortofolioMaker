@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Header Section -->
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="header-title mb-0">Users Manager</h4>
            </div>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <div class="search-container">
                <div class="search-group">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Search user by name, email, or phone...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div class="empty-state">
            <img src="{{ asset('assets/img/datanotfound.png') }}" class="mb-4" style="max-width: 400px; height: auto; border-radius: 12px;">

            <h5 class="mb-3">No Users Found</h5>

            <p class="text-muted mb-4">
                There are currently no users registered in the system.
            </p>
        </div>

        <!-- User Table -->
        <div class="user-table-container">
            <div class="table-header">
                <h6>Users List</h6>
            </div>
            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Joined</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">#001</td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        Z
                                    </div>
                                    <div>
                                        <div class="user-name">Zaki Almukhtarom</div>
                                        <div class="user-email">zaki@mail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="meta-item">
                                    <i class="fas fa-envelope"></i> zaki@mail.com
                                </div>
                            </td>
                            <td>
                                <div class="meta-item">
                                    <i class="fas fa-phone"></i> 08123456789
                                </div>
                            </td>

                            <td>
                                <span class="join-date">
                                    <i class="fas fa-calendar"></i> May 1, 2025
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="btn-action btn-view" data-bs-toggle="modal" data-bs-target="#viewUserModal">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="#" class="btn-action btn-edit" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">#002</td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        J
                                    </div>
                                    <div>
                                        <div class="user-name">John Doe</div>
                                        <div class="user-email">john@mail.com</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="meta-item">
                                    <i class="fas fa-envelope"></i> john@mail.com
                                </div>
                            </td>
                            <td>
                                <div class="meta-item">
                                    <i class="fas fa-phone"></i> 081999999
                                </div>
                            </td>

                            <td>
                                <span class="join-date">
                                    <i class="fas fa-calendar"></i> Apr 20, 2025
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="btn-action btn-view">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="#" class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="#" class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- View User Modal -->
        <div class="modal fade" id="viewUserModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">User Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="user-details-grid">
                            <div class="detail-card">
                                <h6>User Information</h6>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">Name:</strong>
                                    <span class="detail-value">Zaki Almukhtarom</span>
                                </div>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">Email:</strong>
                                    <span class="detail-value">zaki@mail.com</span>
                                </div>
                                <div class="mb-0">
                                    <strong class="d-block mb-2">Phone:</strong>
                                    <span class="detail-value">08123456789</span>
                                </div>
                            </div>
                            <div class="detail-card">
                                <h6>Account Details</h6>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">User ID:</strong>
                                    <span class="detail-value">#001</span>
                                </div>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">Total Portfolios:</strong>
                                    <span class="detail-value">3</span>
                                </div>
                                <div class="mb-0">
                                    <strong class="d-block mb-2">Member Since:</strong>
                                    <span class="detail-value">May 1, 2025</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form class="modal-form">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" value="Zaki Almukhtarom">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" value="zaki@mail.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" value="08123456789">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Update User</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete User Modal -->
        <div class="modal fade" id="deleteUserModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-exclamation-triangle text-danger" style="font-size:40px;"></i>
                        <p class="mt-3">Are you sure you want to delete this user?</p>
                        <p class="text-muted small">This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
