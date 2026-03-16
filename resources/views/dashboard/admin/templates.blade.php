@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Header Section -->
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <h4 class="header-title mb-0">Template Manager</h4>
                </div>
                <button class="btn-add-template" data-bs-toggle="modal" data-bs-target="#addTemplateModal">
                    <i class="fas fa-plus"></i> Add Template
                </button>
            </div>

            <!-- Filters -->
            <div class="filters-container mt-3">
                <div class="search-group">
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Search template...">
                    </div>
                </div>

                <div class="filter-group">
                    <select class="form-select">
                        <option selected>All Categories</option>
                        <option>Developer</option>
                        <option>Designer</option>
                        <option>Photographer</option>
                        <option>General</option>
                    </select>
                </div>

                <div class="filter-group">
                    <select class="form-select">
                        <option selected>All Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div class="empty-state">
            <img src="{{ asset('assets/img/datanotfound.png') }}" class="mb-4"
                style="max-width: 400px; height: auto; border-radius: 12px;">
            <h5 class="mb-3">No Templates Found</h5>

            <p class="text-muted mb-4">
                Start by creating your first portfolio template. Templates help users create beautiful portfolios quickly.
            </p>

            <button class="btn-add-template" data-bs-toggle="modal" data-bs-target="#addTemplateModal">
                <i class="fas fa-plus"></i> Create Your First Template
            </button>
        </div>

        <!-- Template Grid -->
        <div class="template-grid">
            <!-- Template Card -->
            <div class="template-card">
                <img src="{{ asset('templates/template1.png') }}" class="template-image" alt="Template Preview">

                <div class="template-content">
                    <h5 class="template-title">Minimal Portfolio</h5>

                    <div class="template-meta">
                        <span class="meta-item category-badge developer">
                            <i class="fas fa-code"></i> Developer
                        </span>
                        <span class="meta-item status-badge status-active">
                            <span class="status-indicator"></span> Active
                        </span>
                    </div>

                    <div class="template-actions">
                        <a href="#" class="btn-template btn-preview" data-bs-toggle="modal"
                            data-bs-target="#previewTemplateModal">
                            <i class="fas fa-eye"></i> Preview
                        </a>
                        <a href="#" class="btn-template btn-edit" data-bs-toggle="modal"
                            data-bs-target="#editTemplateModal">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#" class="btn-template btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteTemplateModal">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
            </div>

            <!-- Template Card 2 -->
            <div class="template-card">
                <img src="{{ asset('templates/template2.png') }}" class="template-image" alt="Template Preview">

                <div class="template-content">
                    <h5 class="template-title">Creative Resume</h5>

                    <div class="template-meta">
                        <span class="meta-item category-badge designer">
                            <i class="fas fa-paint-brush"></i> Designer
                        </span>
                        <span class="meta-item status-badge status-active">
                            <span class="status-indicator"></span> Active
                        </span>
                    </div>

                    <div class="template-actions">
                        <a href="#" class="btn-template btn-preview" data-bs-toggle="modal"
                            data-bs-target="#previewTemplateModal">
                            <i class="fas fa-eye"></i> Preview
                        </a>
                        <a href="#" class="btn-template btn-edit" data-bs-toggle="modal"
                            data-bs-target="#editTemplateModal">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#" class="btn-template btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteTemplateModal">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
            </div>

            <!-- Template Card 3 -->
            <div class="template-card">
                <img src="{{ asset('templates/template3.png') }}" class="template-image" alt="Template Preview">

                <div class="template-content">
                    <h5 class="template-title">Professional CV</h5>

                    <div class="template-meta">
                        <span class="meta-item category-badge general">
                            <i class="fas fa-briefcase"></i> General
                        </span>
                        <span class="meta-item status-badge status-inactive">
                            <span class="status-indicator inactive"></span> Inactive
                        </span>
                    </div>

                    <div class="template-actions">
                        <a href="#" class="btn-template btn-preview" data-bs-toggle="modal"
                            data-bs-target="#previewTemplateModal">
                            <i class="fas fa-eye"></i> Preview
                        </a>
                        <a href="#" class="btn-template btn-edit" data-bs-toggle="modal"
                            data-bs-target="#editTemplateModal">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="#" class="btn-template btn-delete" data-bs-toggle="modal"
                            data-bs-target="#deleteTemplateModal">
                            <i class="fas fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
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
                    <form class="modal-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Template Name</label>
                                    <input type="text" class="form-control" placeholder="Minimal Portfolio">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Template Slug</label>
                                    <input type="text" class="form-control" placeholder="minimal">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Upload HTML Template</label>
                                    <input type="file" class="form-control" accept=".html">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Preview Image</label>
                                    <input type="file" class="form-control" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select">
                                        <option>Developer</option>
                                        <option>Designer</option>
                                        <option>Photographer</option>
                                        <option>General</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Save Template</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Template Modal -->
    <div class="modal fade" id="previewTemplateModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Template Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <img src="{{ asset('templates/template1.png') }}" class="img-fluid rounded"
                            style="max-height: 600px; object-fit: contain;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Template Modal -->
    <div class="modal fade" id="editTemplateModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form class="modal-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Template Name</label>
                                    <input type="text" class="form-control" value="Minimal Portfolio">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Template Slug</label>
                                    <input type="text" class="form-control" value="minimal">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Replace HTML Template</label>
                                    <input type="file" class="form-control" accept=".html">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Replace Preview Image</label>
                                    <input type="file" class="form-control" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select class="form-select">
                                        <option selected>Developer</option>
                                        <option>Designer</option>
                                        <option>Photographer</option>
                                        <option>General</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select">
                                        <option selected>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Update Template</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Template Modal -->
    <div class="modal fade" id="deleteTemplateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Delete Template</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <i class="fas fa-exclamation-triangle text-danger" style="font-size:40px;"></i>
                    <p class="mt-3">Are you sure you want to delete this template?</p>
                    <p class="text-muted small">This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection
