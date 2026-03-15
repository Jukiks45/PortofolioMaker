@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center gap-3">
                <h4 class="mb-0">Template Manager</h4>

                <div class="input-group" style="width:250px;">
                    <span class="input-group-text">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text"
                           class="form-control"
                           placeholder="Search template...">
                </div>

                <select class="form-select" style="width:160px;">
                    <option selected>All Categories</option>
                    <option>Developer</option>
                    <option>Designer</option>
                    <option>Photographer</option>
                    <option>General</option>
                </select>

                <select class="form-select" style="width:150px;">
                    <option selected>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTemplateModal">
                <i class="fas fa-plus"></i> Add Template
            </button>
        </div>

        <!-- Empty State -->
        <div class="text-center py-5">

            <img src="https://placehold.co/400x250" class="mb-4">

            <h5>No Templates Found</h5>

            <p class="text-muted">
                Start by creating your first portfolio template.
            </p>

            <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#addTemplateModal">

                <i class="fas fa-plus"></i>
                Add Template

            </button>

        </div>

        <!-- Template Grid -->
        <div class="row">

            <!-- Template Card -->
            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100">

                    <img src="https://placehold.co/600x400" class="card-img-top" style="height:200px;object-fit:cover;">

                    <div class="card-body">

                        <h5 class="card-title">
                            Minimal Portfolio
                        </h5>

                        <p class="text-muted small mb-1">
                            Category: Developer
                        </p>

                        <p class="text-muted small">
                            Status: Active
                        </p>

                    </div>

                    <div class="card-footer bg-white">

                        <div class="d-flex justify-content-between">

                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#previewTemplateModal">
                                Preview
                            </button>

                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editTemplateModal">
                                Edit
                            </button>

                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteTemplateModal">
                                Delete
                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Pagination -->
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
                        <a class="page-link">3</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link">Next</a>
                    </li>

                </ul>

            </nav>

        </div>

    </div>

    <!-- Add Template Modal -->
    <div class="modal fade" id="addTemplateModal" tabindex="-1">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add New Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <form>

                        <div class="mb-3">
                            <label class="form-label">Template Name</label>
                            <input type="text" class="form-control" placeholder="Minimal Portfolio">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Template Slug</label>
                            <input type="text" class="form-control" placeholder="minimal">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload HTML Template</label>
                            <input type="file" class="form-control" accept=".html">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Preview Image</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>

                            <select class="form-select">
                                <option>Developer</option>
                                <option>Designer</option>
                                <option>Photographer</option>
                                <option>General</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>

                            <select class="form-select">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                    </form>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button class="btn btn-primary">
                        Save Template
                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- Preview Template Modal -->
    <div class="modal fade" id="previewTemplateModal" tabindex="-1">

        <div class="modal-dialog modal-xl">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Template Preview
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <div class="text-center">

                        <img src="https://placehold.co/900x600" class="img-fluid rounded">

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

    <!-- Edit Template Modal -->
    <div class="modal fade" id="editTemplateModal" tabindex="-1">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Template
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <form>

                        <div class="mb-3">

                            <label class="form-label">
                                Template Name
                            </label>

                            <input type="text" class="form-control" value="Minimal Portfolio">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Template Slug
                            </label>

                            <input type="text" class="form-control" value="minimal">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Replace HTML Template
                            </label>

                            <input type="file" class="form-control" accept=".html">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Replace Preview Image
                            </label>

                            <input type="file" class="form-control" accept="image/*">

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Category
                            </label>

                            <select class="form-select">

                                <option selected>Developer</option>
                                <option>Designer</option>
                                <option>Photographer</option>
                                <option>General</option>

                            </select>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Status
                            </label>

                            <select class="form-select">

                                <option selected>Active</option>
                                <option>Inactive</option>

                            </select>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button class="btn btn-primary">

                        Update Template

                    </button>

                </div>

            </div>

        </div>

    </div>

    <!-- Delete Template Modal -->
    <div class="modal fade" id="deleteTemplateModal" tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title text-danger">
                        Delete Template
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body text-center">

                    <i class="fas fa-exclamation-triangle text-danger" style="font-size:40px;"></i>

                    <p class="mt-3">
                        Are you sure you want to delete this template?
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
@endsection
