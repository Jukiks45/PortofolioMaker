@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="mb-0">Users Manager</h4>

        </div>

        <div class="mb-3" style="max-width:300px;">

            <div class="input-group">

                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>

                <input type="text" class="form-control" placeholder="Search user...">

            </div>

        </div>

        <!-- Empty State -->
        <div class="text-center py-5">

            <img src="https://placehold.co/400x250" class="mb-4">

            <h5>No Users Found</h5>

            <p class="text-muted">
                There are currently no users registered.
            </p>

        </div>

        <div class="card shadow-sm">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-hover align-middle">

                        <thead class="table-light">

                            <tr>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Portfolios</th>
                                <th>Created</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <tr>

                                <td>1</td>

                                <td>Zaki Almukhtarom</td>

                                <td>zaki@mail.com</td>

                                <td>08123456789</td>

                                <td>3</td>

                                <td>2025-05-01</td>

                                <td>

                                    <div class="d-flex gap-2">

                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#viewUserModal">
                                            View
                                        </button>

                                    <button class="btn btn-sm btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editUserModal">
                                        Edit
                                    </button>

                                        <button class="btn btn-sm btn-danger"
                                                data-bs-toggle="modal"
                                                data-bs-target="#deleteUserModal">
                                            Delete
                                        </button>

                                    </div>

                                </td>

                            </tr>


                            <tr>

                                <td>2</td>

                                <td>John Doe</td>

                                <td>john@mail.com</td>

                                <td>081999999</td>

                                <td>1</td>

                                <td>2025-04-20</td>

                                <td>

                                    <div class="d-flex gap-2">

                                        <button class="btn btn-sm btn-info">
                                            View
                                        </button>

                                        <button class="btn btn-sm btn-warning">
                                            Edit
                                        </button>

                                        <button class="btn btn-sm btn-danger">
                                            Delete
                                        </button>

                                    </div>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

        <div class="d-flex justify-content-center mt-4">

            <nav>

                <ul class="pagination">

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

                        <h5 class="modal-title">
                            User Details
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                    </div>

                    <div class="modal-body">

                        <div class="mb-3">

                            <strong>Name:</strong>

                            <p class="mb-0">
                                Zaki Almukhtarom
                            </p>

                        </div>

                        <div class="mb-3">

                            <strong>Email:</strong>

                            <p class="mb-0">
                                zaki@mail.com
                            </p>

                        </div>

                        <div class="mb-3">

                            <strong>Phone:</strong>

                            <p class="mb-0">
                                08123456789
                            </p>

                        </div>

                        <div class="mb-3">

                            <strong>Total Portfolios:</strong>

                            <p class="mb-0">
                                3
                            </p>

                        </div>

                        <div class="mb-3">

                            <strong>Joined:</strong>

                            <p class="mb-0">
                                2025-05-01
                            </p>

                        </div>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-secondary" data-bs-dismiss="modal">

                            Close

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title">
                            Edit User
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                    </div>

                    <div class="modal-body">

                        <form>

                            <div class="mb-3">

                                <label class="form-label">
                                    Name
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="Zaki Almukhtarom">

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Email
                                </label>

                                <input type="email"
                                       class="form-control"
                                       value="zaki@mail.com">

                            </div>


                            <div class="mb-3">

                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input type="text"
                                       class="form-control"
                                       value="08123456789">

                            </div>

                        </form>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-secondary" data-bs-dismiss="modal">

                            Cancel

                        </button>

                        <button class="btn btn-primary">

                            Update User

                        </button>

                    </div>

                </div>

            </div>

        </div>

        <!-- Delete User Modal -->
        <div class="modal fade" id="deleteUserModal" tabindex="-1">

            <div class="modal-dialog">

                <div class="modal-content">

                    <div class="modal-header">

                        <h5 class="modal-title text-danger">
                            Delete User
                        </h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                    </div>

                    <div class="modal-body text-center">

                        <i class="fas fa-exclamation-triangle text-danger"
                           style="font-size:40px;"></i>

                        <p class="mt-3">
                            Are you sure you want to delete this user?
                        </p>

                        <p class="text-muted small">
                            This action cannot be undone.
                        </p>

                    </div>

                    <div class="modal-footer">

                        <button class="btn btn-secondary" data-bs-dismiss="modal">

                            Cancel

                        </button>

                        <button class="btn btn-danger">

                            Yes, Delete

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
