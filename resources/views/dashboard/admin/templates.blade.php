@extends('layouts.dashboard')

@section('title', 'Template Manager')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="header-section">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h4 class="header-title mb-1">Template Manager</h4>
                <p class="text-muted mb-0" style="font-size:.85rem;">
                    Kelola template portfolio yang tersedia untuk pengguna.
                </p>
            </div>
            <button class="btn-add-template" data-bs-toggle="modal" data-bs-target="#addTemplateModal">
                <i class="fas fa-plus"></i> Tambah Template
            </button>
        </div>

        {{-- FILTERS --}}
        <div class="filters-container">
            <div class="search-group">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                    <input type="text" class="form-control" placeholder="Cari template...">
                </div>
            </div>
            <div class="filter-group">
                <select class="form-select">
                    <option selected>Semua Kategori</option>
                    <option>Developer</option>
                    <option>Designer</option>
                    <option>Photographer</option>
                    <option>General</option>
                </select>
            </div>
            <div class="filter-group">
                <select class="form-select">
                    <option selected>Semua Status</option>
                    <option>Aktif</option>
                    <option>Nonaktif</option>
                </select>
            </div>
        </div>
    </div>

    {{-- TEMPLATE GRID --}}
    <div class="template-grid">

        {{-- Card 1 --}}
        <div class="template-card">
            <img src="{{ asset('templates/template1.png') }}" class="template-image" alt="Minimal Portfolio" style="object-fit: contain; height: 200px;">
            <div class="template-content">
                <h5 class="template-title">Minimal Portfolio</h5>
                <div class="template-meta">
                    <span class="category-badge developer">
                        <i class="fas fa-code"></i> Developer
                    </span>
                    <span class="status-badge status-active">
                        <span class="status-indicator"></span> Aktif
                    </span>
                </div>
                <div class="template-actions">
                    <a href="#" class="btn-template btn-preview"
                        data-bs-toggle="modal" data-bs-target="#previewTemplateModal">
                        <i class="fas fa-eye"></i> Preview
                    </a>
                    <a href="#" class="btn-template btn-edit"
                        data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="#" class="btn-template btn-delete"
                        data-bs-toggle="modal" data-bs-target="#deleteTemplateModal">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="template-card">
            <img src="{{ asset('templates/template2.png') }}" class="template-image" alt="Creative Resume" style="object-fit: contain; height: 200px;">
            <div class="template-content">
                <h5 class="template-title">Creative Resume</h5>
                <div class="template-meta">
                    <span class="category-badge designer">
                        <i class="fas fa-paint-brush"></i> Designer
                    </span>
                    <span class="status-badge status-active">
                        <span class="status-indicator"></span> Aktif
                    </span>
                </div>
                <div class="template-actions">
                    <a href="#" class="btn-template btn-preview"
                        data-bs-toggle="modal" data-bs-target="#previewTemplateModal">
                        <i class="fas fa-eye"></i> Preview
                    </a>
                    <a href="#" class="btn-template btn-edit"
                        data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="#" class="btn-template btn-delete"
                        data-bs-toggle="modal" data-bs-target="#deleteTemplateModal">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Card 3 --}}
        <div class="template-card">
            <img src="{{ asset('templates/template3.png') }}" class="template-image" alt="Professional CV" style="object-fit: contain; height: 200px;">
            <div class="template-content">
                <h5 class="template-title">Professional CV</h5>
                <div class="template-meta">
                    <span class="category-badge general">
                        <i class="fas fa-briefcase"></i> General
                    </span>
                    <span class="status-badge status-inactive">
                        <span class="status-indicator inactive"></span> Nonaktif
                    </span>
                </div>
                <div class="template-actions">
                    <a href="#" class="btn-template btn-preview"
                        data-bs-toggle="modal" data-bs-target="#previewTemplateModal">
                        <i class="fas fa-eye"></i> Preview
                    </a>
                    <a href="#" class="btn-template btn-edit"
                        data-bs-toggle="modal" data-bs-target="#editTemplateModal">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="#" class="btn-template btn-delete"
                        data-bs-toggle="modal" data-bs-target="#deleteTemplateModal">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    {{-- PAGINATION --}}
    <div class="pagination-container">
        <nav>
            <ul class="pagination mb-0">
                <li class="page-item disabled">
                    <a class="page-link"><i class="fas fa-chevron-left me-1"></i> Prev</a>
                </li>
                <li class="page-item active"><a class="page-link">1</a></li>
                <li class="page-item"><a class="page-link">2</a></li>
                <li class="page-item"><a class="page-link">3</a></li>
                <li class="page-item">
                    <a class="page-link">Next <i class="fas fa-chevron-right ms-1"></i></a>
                </li>
            </ul>
        </nav>
    </div>

</div>

{{-- ======================== MODALS ======================== --}}

{{-- Add Template --}}
<div class="modal fade" id="addTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus me-2 text-primary"></i>Tambah Template Baru
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form class="modal-form" method="POST" action="/admin/templates" enctype="multipart/form-data" id="addTemplateForm">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Template</label>
                            <input type="text" name="title" class="form-control" placeholder="Minimal Portfolio">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="minimal">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Upload File HTML</label>
                            <input type="file" name="html_file" class="form-control" accept=".html">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gambar Preview</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kategori</label>
                            <select name="category_name" class="form-select">
                                <option value="Developer">Developer</option>
                                <option value="Designer">Designer</option>
                                <option value="Photographer">Photographer</option>
                                <option value="General">General</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active">Aktif</option>
                                <option value="inactive">Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit" form="addTemplateForm">
                    <i class="fas fa-save me-1"></i> Simpan Template
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Preview Template --}}
<div class="modal fade" id="previewTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-eye me-2 text-primary"></i>Preview Template
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-2">
                <div style="background:#f8fafc;border-radius:12px;overflow:hidden;text-align:center;">
                    <img src="{{ asset('templates/template1.png') }}"
                        style="max-width:100%;max-height:70vh;object-fit:contain;display:block;margin:auto;"
                        alt="Template Preview">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit Template --}}
<div class="modal fade" id="editTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2" style="color:#d97706;"></i>Edit Template
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form class="modal-form">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama Template</label>
                            <input type="text" class="form-control" value="Minimal Portfolio">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" value="minimal">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ganti File HTML</label>
                            <input type="file" class="form-control" accept=".html">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ganti Gambar Preview</label>
                            <input type="file" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Kategori</label>
                            <select class="form-select">
                                <option selected>Developer</option>
                                <option>Designer</option>
                                <option>Photographer</option>
                                <option>General</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option selected>Aktif</option>
                                <option>Nonaktif</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Update Template
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Delete Template --}}
<div class="modal fade" id="deleteTemplateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center px-4 pb-2">
                <div style="width:56px;height:56px;background:#fef2f2;border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                    <i class="fas fa-trash" style="color:#ef4444;font-size:1.25rem;"></i>
                </div>
                <h5 class="fw-bold mb-1" style="color:#0b0f3b;">Hapus Template?</h5>
                <p class="text-muted mb-0" style="font-size:.875rem;">
                    Aksi ini tidak dapat dibatalkan. Template akan dihapus permanen.
                </p>
            </div>
            <div class="modal-footer border-0 gap-2 pt-2">
                <button class="btn btn-secondary flex-fill" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-danger flex-fill">
                    <i class="fas fa-trash me-1"></i> Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
