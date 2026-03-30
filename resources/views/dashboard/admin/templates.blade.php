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
        @forelse($templates as $template)
            <div class="template-card" data-template-id="{{ $template->id }}">
                @if($template->image_path)
                    <img src="{{ asset('storage/' . $template->image_path) }}" class="template-image" alt="{{ $template->title }}" style="object-fit: contain; height: 200px;">
                @else
                    <div class="template-image placeholder-image" style="height: 200px; background: #f3f4f6; display: flex; align-items: center; justify-content: center; color: #9ca3af;">
                        <i class="fas fa-image fa-2x"></i>
                    </div>
                @endif
                <div class="template-content">
                    <h5 class="template-title">{{ $template->title }}</h5>
                    <div class="template-meta">
                        <span class="category-badge developer">
                            <i class="fas fa-code"></i> {{ $template->category_name ?? 'General' }}
                        </span>
                        <span class="status-badge {{ $template->status ? 'status-active' : 'status-inactive' }}">
                            <span class="status-indicator"></span> {{ $template->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                    <div class="template-actions">
                        <a href="#" class="btn-template btn-preview"
                            data-bs-toggle="modal" data-bs-target="#previewTemplateModal"
                            data-template-id="{{ $template->id }}"
                            data-template-title="{{ $template->title }}"
                            data-template-image="{{ $template->image_path ? asset('storage/' . $template->image_path) : '' }}">
                            <i class="fas fa-eye"></i> Preview
                        </a>
                        <button class="btn-template btn-edit"
                            data-bs-toggle="modal" data-bs-target="#editTemplateModal"
                            data-template='@json($template)'>
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <a href="#" class="btn-template btn-delete"
                            data-bs-toggle="modal" data-bs-target="#deleteTemplateModal"
                            data-template-id="{{ $template->id }}"
                            data-template-title="{{ $template->title }}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="fas fa-layer-group fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Belum ada template</h5>
                <p class="text-muted">Upload template pertama Anda untuk memulai.</p>
            </div>
        @endforelse
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
                    <img id="previewImage"
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
                <form id="editTemplateForm">
                    <input type="hidden" id="editTemplateId">
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
                            <label class="form-label">Ganti File HTML</label>
                            <input type="file" name="html_file" class="form-control" accept=".html">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Ganti Gambar Preview</label>
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
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" type="submit" form="editTemplateForm">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
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
                <button id="confirmDeleteTemplate" class="btn btn-danger flex-fill">
                    <i class="fas fa-trash me-1"></i> Ya, Hapus
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editTemplateModal = document.getElementById('editTemplateModal');

            // Handle Edit Template Modal
            if (editTemplateModal) {
                editTemplateModal.addEventListener('show.bs.modal', function(event) {
                    const button = event.relatedTarget;
                    const data = JSON.parse(button.getAttribute('data-template'));

                    document.getElementById('editTemplateId').value = data.id;
                    document.querySelector('#editTemplateForm input[name="title"]').value = data.title;
                    document.querySelector('#editTemplateForm input[name="slug"]').value = data.slug;
                    document.querySelector('#editTemplateForm select[name="status"]').value =
                        data.status == 1 ? 'active' : 'inactive';
                    document.querySelector('#editTemplateForm select[name="category_name"]').value = data.category_name || 'General';
                });
            }

            // Handle Edit Template Form Submit
            if (document.getElementById('editTemplateForm')) {
                document.getElementById('editTemplateForm').addEventListener('submit', function(e) {
                    e.preventDefault();

                    const id = document.getElementById('editTemplateId').value;

                    const data = {
                        title: this.querySelector('input[name="title"]').value,
                        slug: this.querySelector('input[name="slug"]').value,
                        status: this.querySelector('select[name="status"]').value,
                        category_name: this.querySelector('select[name="category_name"]').value
                    };

                        fetch(`/admin/templates/${id}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify(data)
                        })
                        .then(res => {
                            if (!res.ok) throw new Error('HTTP ' + res.status);
                            return res.json();
                        })
                        .then(res => {
                            showToast('Template berhasil diupdate');
                        })
                        .then(() => {
                            const row = document.querySelector(`[data-template-id="${id}"]`);

                            if (row) {
                                const titleEl = row.querySelector('.template-title');
                                if (titleEl) titleEl.textContent = data.title;
                            }

                            bootstrap.Modal.getInstance(editTemplateModal).hide();
                        })
                        .catch(error => {
                            console.error('ERROR DETAIL:', error);
                            showToast('Gagal update template', 'error');
                        });
                });
            }
        });

        // Handle Delete Template Modal
        const deleteTemplateModal = document.getElementById('deleteTemplateModal');
        let selectedTemplateId = null;

        if (deleteTemplateModal) {
            deleteTemplateModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                selectedTemplateId = button.getAttribute('data-template-id');
            });
        }

        // Handle Delete Template Confirmation
        const deleteBtn = document.getElementById('confirmDeleteTemplate');

        if (deleteBtn) {
            deleteBtn.addEventListener('click', function() {
                if (!selectedTemplateId) return;

                fetch(`/admin/templates/${selectedTemplateId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(res => {
                    if (!res.ok) throw new Error('HTTP ' + res.status);
                    return res.json();
                })
                .then(res => {
                    showToast('Template berhasil dihapus');

                    // 🔥 hapus dari UI
                    const row = document.querySelector(`[data-template-id="${selectedTemplateId}"]`);
                    if (row) row.remove();

                    // 🔥 tutup modal
                    bootstrap.Modal.getInstance(deleteTemplateModal).hide();

                    selectedTemplateId = null;
                })
                .catch(error => {
                    console.error('DELETE ERROR:', error);
                    showToast('Gagal hapus template', 'error');
                });
            });
        }

        // Handle Preview Template Modal
        const previewModal = document.getElementById('previewTemplateModal');

        if (previewModal) {
            previewModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;

                const image = button.getAttribute('data-template-image');

                const imgEl = document.getElementById('previewImage');

                if (imgEl) {
                    imgEl.src = image || '/images/no-image.png';
                }
            });
        }
    </script>
@endpush
