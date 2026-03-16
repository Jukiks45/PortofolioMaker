@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Header Section -->
        <div class="header-section">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="header-title mb-0">Portfolio Manager</h4>
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
                        <input type="text" class="form-control" placeholder="Search portfolio by title or owner...">
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty State -->
        <div class="empty-state">
            <img src="{{ asset('assets/img/datanotfound.png') }}" class="mb-4"
                style="max-width: 400px; height: auto; border-radius: 12px;">
            <h5 class="mb-3">No Portfolios Found</h5>

            <p class="text-muted mb-4">
                There are currently no portfolios created by users.
            </p>
        </div>

        <!-- Portfolio Table -->
        <div class="user-table-container">
            <div class="table-header">
                <h6>Portfolios List</h6>
            </div>
            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Portfolio</th>
                            <th>Owner</th>
                            <th>Template</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold">#001</td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        D
                                    </div>
                                    <div>
                                        <div class="portfolio-title">Developer Portfolio</div>
                                        <div class="portfolio-description">Professional web developer showcase</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="meta-item">
                                    <i class="fas fa-user"></i> Zaki Almukhtarom
                                </div>
                            </td>
                            <td>
                                <span class="portfolio-template">
                                    <i class="fas fa-palette"></i> Minimal
                                </span>
                            </td>
                            <td>
                                <span class="join-date">
                                    <i class="fas fa-calendar"></i> May 1, 2025
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="btn-action btn-view" data-bs-toggle="modal"
                                        data-bs-target="#viewPortfolioModal">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="#" class="btn-action btn-edit">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                    <a href="#" class="btn-action btn-delete" data-bs-toggle="modal"
                                        data-bs-target="#deletePortfolioModal">
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
                                        U
                                    </div>
                                    <div>
                                        <div class="portfolio-title">UI Designer Portfolio</div>
                                        <div class="portfolio-description">Creative design showcase</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="meta-item">
                                    <i class="fas fa-user"></i> Sarah
                                </div>
                            </td>
                            <td>
                                <span class="portfolio-template">
                                    <i class="fas fa-palette"></i> Creative
                                </span>
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
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                    <a href="#" class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">#003</td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        P
                                    </div>
                                    <div>
                                        <div class="portfolio-title">Photographer Portfolio</div>
                                        <div class="portfolio-description">Visual storytelling showcase</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="meta-item">
                                    <i class="fas fa-user"></i> Michael
                                </div>
                            </td>
                            <td>
                                <span class="portfolio-template">
                                    <i class="fas fa-palette"></i> Professional
                                </span>
                            </td>
                            <td>
                                <span class="join-date">
                                    <i class="fas fa-calendar"></i> Mar 15, 2025
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="btn-action btn-view">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="#" class="btn-action btn-edit">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                    <a href="#" class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">#004</td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        G
                                    </div>
                                    <div>
                                        <div class="portfolio-title">Graphic Designer Portfolio</div>
                                        <div class="portfolio-description">Brand and visual design portfolio</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="meta-item">
                                    <i class="fas fa-user"></i> Emily
                                </div>
                            </td>
                            <td>
                                <span class="portfolio-template">
                                    <i class="fas fa-palette"></i> Creative
                                </span>
                            </td>
                            <td>
                                <span class="join-date">
                                    <i class="fas fa-calendar"></i> Feb 10, 2025
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="btn-action btn-view">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="#" class="btn-action btn-edit">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                    <a href="#" class="btn-action btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">#005</td>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar">
                                        M
                                    </div>
                                    <div>
                                        <div class="portfolio-title">Music Producer Portfolio</div>
                                        <div class="portfolio-description">Audio production and mixing showcase</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="meta-item">
                                    <i class="fas fa-user"></i> Alex
                                </div>
                            </td>
                            <td>
                                <span class="portfolio-template">
                                    <i class="fas fa-palette"></i> Professional
                                </span>
                            </td>
                            <td>
                                <span class="join-date">
                                    <i class="fas fa-calendar"></i> Jan 25, 2025
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="#" class="btn-action btn-view">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="#" class="btn-action btn-edit">
                                        <i class="fas fa-download"></i> Download
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

        <!-- View Portfolio Modal -->
        <div class="modal fade" id="viewPortfolioModal" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Portfolio Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="user-details-grid">
                            <div class="detail-card">
                                <h6>Portfolio Information</h6>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">Title:</strong>
                                    <span class="detail-value">Developer Portfolio</span>
                                </div>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">Template:</strong>
                                    <span class="detail-value">Minimal</span>
                                </div>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">Description:</strong>
                                    <span class="detail-value">Professional web developer showcase</span>
                                </div>
                                <div class="mb-0">
                                    <strong class="d-block mb-2">Created:</strong>
                                    <span class="detail-value">May 1, 2025</span>
                                </div>
                            </div>
                            <div class="detail-card">
                                <h6>Owner Details</h6>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">Owner ID:</strong>
                                    <span class="detail-value">#001</span>
                                </div>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">Owner Name:</strong>
                                    <span class="detail-value">Zaki Almukhtarom</span>
                                </div>
                                <div class="mb-3">
                                    <strong class="d-block mb-2">Owner Email:</strong>
                                    <span class="detail-value">zaki@mail.com</span>
                                </div>
                                <div class="mb-0">
                                    <strong class="d-block mb-2">Total Portfolios:</strong>
                                    <span class="detail-value">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="#" class="btn btn-primary">View Live Portfolio</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Portfolio Modal -->
        <div class="modal fade" id="deletePortfolioModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger">Delete Portfolio</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-exclamation-triangle text-danger" style="font-size:40px;"></i>
                        <p class="mt-3">Are you sure you want to delete this portfolio?</p>
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
