@extends('layouts.dashboard')

@section('title', 'Users Manager')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="header-section">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h4 class="header-title mb-1">Users Manager</h4>
                <p class="text-muted mb-0" style="font-size:.85rem;">
                    Kelola semua pengguna yang terdaftar di sistem.
                </p>
            </div>
            <div class="d-flex align-items-center gap-2">
                <span class="badge rounded-pill px-3 py-2" style="background:#eef2ff;color:#4c2ee6;font-size:.8rem;font-weight:700;">
                    <i class="fas fa-users me-1"></i> 2 Users
                </span>
            </div>
        </div>
    </div>

    {{-- SEARCH --}}
    <div class="search-section">
        <div class="search-container">
            <div class="search-group">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Cari user berdasarkan nama, email, atau nomor HP...">
                </div>
            </div>
            <div class="filter-group" style="min-width:160px;">
                <select class="form-select" style="border:1.5px solid #e2e8f0;border-radius:10px;font-size:.875rem;padding:.65rem .9rem;">
                    <option selected>Semua Role</option>
                    <option>Admin</option>
                    <option>Member</option>
                </select>
            </div>
        </div>
    </div>

    {{-- USER TABLE --}}
    <div class="user-table-container">
        <div class="table-header">
            <h6>Daftar Users</h6>
            <span style="font-size:.78rem;color:#94a3b8;">Menampilkan 2 dari 2 users</span>
        </div>
        <div class="table-responsive">
            <table class="table user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pengguna</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Bergabung</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Row 1 --}}
                    <tr>
                        <td>
                            <span style="font-size:.78rem;font-weight:700;color:#94a3b8;font-family:monospace;">#001</span>
                        </td>
                        <td>
                            <div class="user-info">
                                <div class="user-avatar">Z</div>
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
                                <i class="fas fa-calendar-alt"></i> 1 Mei 2025
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-action btn-view"
                                    data-bs-toggle="modal" data-bs-target="#viewUserModal">
                                    <i class="fas fa-eye"></i>
                                    <span class="btn-label">Lihat</span>
                                </a>
                                <a href="#" class="btn-action btn-edit"
                                    data-bs-toggle="modal" data-bs-target="#editUserModal">
                                    <i class="fas fa-edit"></i>
                                    <span class="btn-label">Edit</span>
                                </a>
                                <a href="#" class="btn-action btn-delete"
                                    data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                                    <i class="fas fa-trash"></i>
                                    <span class="btn-label">Hapus</span>
                                </a>
                            </div>
                        </td>
                    </tr>

                    {{-- Row 2 --}}
                    <tr>
                        <td>
                            <span style="font-size:.78rem;font-weight:700;color:#94a3b8;font-family:monospace;">#002</span>
                        </td>
                        <td>
                            <div class="user-info">
                                <div class="user-avatar">J</div>
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
                                <i class="fas fa-calendar-alt"></i> 20 Apr 2025
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-action btn-view">
                                    <i class="fas fa-eye"></i>
                                    <span class="btn-label">Lihat</span>
                                </a>
                                <a href="#" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                    <span class="btn-label">Edit</span>
                                </a>
                                <a href="#" class="btn-action btn-delete">
                                    <i class="fas fa-trash"></i>
                                    <span class="btn-label">Hapus</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="pagination-container">
        <nav aria-label="User pagination">
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

{{-- View User Modal --}}
<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="viewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewUserModalLabel">
                    <i class="fas fa-user me-2 text-primary"></i>Detail Pengguna
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                {{-- Avatar --}}
                <div class="text-center mb-4">
                    <div class="user-avatar mx-auto mb-3"
                        style="width:64px;height:64px;border-radius:16px;font-size:1.5rem;">
                        Z
                    </div>
                    <h5 class="fw-bold mb-0" style="color:#0b0f3b;">Zaki Almukhtarom</h5>
                    <small class="text-muted">Member</small>
                </div>

                <div class="user-details-grid">
                    <div class="detail-card">
                        <h6>Informasi Akun</h6>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Nama Lengkap</div>
                            <div class="detail-value">Zaki Almukhtarom</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Email</div>
                            <div class="detail-value">zaki@mail.com</div>
                        </div>
                        <div>
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">No. HP</div>
                            <div class="detail-value">08123456789</div>
                        </div>
                    </div>
                    <div class="detail-card">
                        <h6>Detail Akun</h6>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">User ID</div>
                            <div class="detail-value" style="font-family:monospace;">#001</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Total Portfolio</div>
                            <div class="detail-value">3</div>
                        </div>
                        <div>
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Bergabung Sejak</div>
                            <div class="detail-value">1 Mei 2025</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Edit User Modal --}}
<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2" style="color:#d97706;"></i>Edit Pengguna
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form class="modal-form">
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" value="Zaki Almukhtarom" placeholder="Nama lengkap">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" value="zaki@mail.com" placeholder="email@example.com">
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" value="08123456789" placeholder="08xxx">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary">
                    <i class="fas fa-save me-1"></i> Simpan Perubahan
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Delete User Modal --}}
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center px-4 pb-2">
                <div style="width:56px;height:56px;background:#fef2f2;border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                    <i class="fas fa-trash" style="color:#ef4444;font-size:1.25rem;"></i>
                </div>
                <h5 class="fw-bold mb-1" style="color:#0b0f3b;">Hapus Pengguna?</h5>
                <p class="text-muted mb-0" style="font-size:.875rem;">
                    Aksi ini tidak dapat dibatalkan. Semua data pengguna akan dihapus permanen.
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
