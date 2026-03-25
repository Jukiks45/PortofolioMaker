@extends('layouts.dashboard')

@section('title', 'Users Manager')

@php
    $users = $users ?? collect();
@endphp

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
                    <span class="badge rounded-pill px-3 py-2"
                        style="background:#eef2ff;color:#4c2ee6;font-size:.8rem;font-weight:700;">
                        <i class="fas fa-users me-1"></i> {{ $users->total() }} Users
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
                        <input type="text" class="form-control" placeholder="Cari user berdasarkan nama atau email...">
                    </div>
                </div>
                <div class="filter-group" style="min-width:160px;">
                    <select class="form-select"
                        style="border:1.5px solid #e2e8f0;border-radius:10px;font-size:.875rem;padding:.65rem .9rem;">
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
                <span style="font-size:.78rem;color:#94a3b8;">Menampilkan {{ $users->count() }} dari {{ $users->total() }}
                    users</span>
            </div>
            <div class="table-responsive">
                <table class="table user-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pengguna</th>
                            <th>Email</th>
                            <th>Bergabung</th>
                            <th class="text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td>
                                    <span style="font-size:.78rem;font-weight:700;color:#94a3b8;font-family:monospace;">
                                        #{{ str_pad($loop->iteration, 3, '0', STR_PAD_LEFT) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="user-info">
                                        <div class="user-avatar">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="user-name">{{ $user->name }}</div>
                                            <div class="user-email">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="meta-item">
                                        <i class="fas fa-envelope"></i> {{ $user->email }}
                                    </div>
                                </td>
                                <td>
                                    <span class="join-date">
                                        <i class="fas fa-calendar-alt"></i>
                                        {{ $user->created_at->format('d M Y') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="btn-action btn-view" data-bs-toggle="modal"
                                            data-bs-target="#viewUserModal" data-user-id="{{ $user->id }}">
                                            <i class="fas fa-eye"></i>
                                            <span class="btn-label">Lihat</span>
                                        </a>
                                        <a href="#" class="btn-action btn-edit" data-bs-toggle="modal"
                                            data-bs-target="#editUserModal"
                                            data-user="{{ json_encode([
                                                'id' => $user->id,
                                                'name' => $user->name,
                                                'email' => $user->email,
                                            ]) }}">
                                            <i class="fas fa-edit"></i>
                                            <span class="btn-label">Edit</span>
                                        </a>
                                        <a href="#" class="btn-action btn-delete" data-bs-toggle="modal"
                                            data-bs-target="#deleteUserModal" data-user-id="{{ $user->id }}"
                                            data-user-name="{{ $user->name }}">
                                            <i class="fas fa-trash"></i>
                                            <span class="btn-label">Hapus</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="fas fa-users"
                                        style="font-size:2rem;color:#e2e8f0;margin-bottom:1rem;display:block;"></i>
                                    Belum ada pengguna terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- PAGINATION --}}
        <div class="pagination-container">
            {{ $users->links('pagination::bootstrap-5') }}
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
                    {{-- Loading State --}}
                    <div id="userLoading" style="display:none;text-align:center;padding:20px;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2 text-muted">Memuat data pengguna...</p>
                    </div>

                    {{-- User Data --}}
                    <div id="userDataContent">
                        {{-- Avatar --}}
                        <div class="text-center mb-4">
                            <div class="user-avatar mx-auto mb-3"
                                style="width:64px;height:64px;border-radius:16px;font-size:1.5rem;" id="modalUserAvatar">
                                Z
                            </div>
                            <h5 class="fw-bold mb-0" style="color:#0b0f3b;" id="modalUserName">Zaki Almukhtarom</h5>
                            <small class="text-muted" id="modalUserRole">Member</small>
                        </div>

                        <div class="user-details-grid">
                            <div class="detail-card">
                                <h6>Informasi Akun</h6>
                                <div class="mb-3">
                                    <div class="text-muted"
                                        style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">
                                        Nama Lengkap</div>
                                    <div class="detail-value" id="modalUserFullName">Zaki Almukhtarom</div>
                                </div>
                                <div class="mb-3">
                                    <div class="text-muted"
                                        style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">
                                        Email</div>
                                    <div class="detail-value" id="modalUserEmail">zaki@mail.com</div>
                                </div>
                            </div>
                            <div class="detail-card">
                                <h6>Detail Akun</h6>
                                <div class="mb-3">
                                    <div class="text-muted"
                                        style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">
                                        User ID</div>
                                    <div class="detail-value" style="font-family:monospace;" id="modalUserId">#001</div>
                                </div>
                                <div class="mb-3">
                                    <div class="text-muted"
                                        style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">
                                        Total Portfolio</div>
                                    <div class="detail-value" id="modalUserPortfolios">3</div>
                                </div>
                                <div>
                                    <div class="text-muted"
                                        style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">
                                        Bergabung Sejak</div>
                                    <div class="detail-value" id="modalUserJoined">1 Mei 2025</div>
                                </div>
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
                    <form id="editUserForm">
                        <input type="hidden" id="editUserId">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama lengkap">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" name="email" placeholder="email@example.com">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" form="editUserForm">
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
                    <div
                        style="width:56px;height:56px;background:#fef2f2;border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
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


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const viewUserModal = document.getElementById('viewUserModal');
                const editUserModal = document.getElementById('editUserModal');
                const deleteUserModal = document.getElementById('deleteUserModal');
                let currentUserId = null;

                // Handle View User Modal
                if (viewUserModal) {
                    viewUserModal.addEventListener('show.bs.modal', function(event) {
                        const button = event.relatedTarget;
                        const userId = button.getAttribute('data-user-id');
                        currentUserId = userId;

                        // Reset data + loading state
                        document.getElementById('userLoading').style.display = 'block';
                        document.getElementById('userDataContent').style.display = 'none';

                        document.getElementById('modalUserAvatar').textContent = '...';
                        document.getElementById('modalUserName').textContent = 'Loading...';
                        document.getElementById('modalUserRole').textContent = 'Loading...';
                        document.getElementById('modalUserFullName').textContent = 'Loading...';
                        document.getElementById('modalUserEmail').textContent = 'Loading...';
                        document.getElementById('modalUserId').textContent = '...';
                        document.getElementById('modalUserPortfolios').textContent = '...';
                        document.getElementById('modalUserJoined').textContent = 'Loading...';

                        // Fetch user data from backend
                        fetch(`/admin/users/${userId}`)
                            .then(response => response.json())
                            .then(data => {
                                // Anti race condition: ignore outdated response
                                if (currentUserId !== userId) return;

                                // Hide loading, show data
                                document.getElementById('userLoading').style.display = 'none';
                                document.getElementById('userDataContent').style.display = 'block';

                                // Update modal content with backend data
                                document.getElementById('modalUserAvatar').textContent = data.avatar;
                                document.getElementById('modalUserName').textContent = data.name;
                                document.getElementById('modalUserRole').textContent = data.role;
                                document.getElementById('modalUserFullName').textContent = data.name;
                                document.getElementById('modalUserEmail').textContent = data.email;
                                document.getElementById('modalUserId').textContent = `#${data.id}`;
                                document.getElementById('modalUserPortfolios').textContent = data
                                    .total_portfolios;
                                document.getElementById('modalUserJoined').textContent = data.created_at;
                            })
                            .catch(error => {
                                console.error('Error fetching user data:', error);
                                // Hide loading, show data
                                document.getElementById('userLoading').style.display = 'none';
                                document.getElementById('userDataContent').style.display = 'block';

                                // Fallback to static data if API fails
                                document.getElementById('modalUserAvatar').textContent = 'U';
                                document.getElementById('modalUserName').textContent = 'User Not Found';
                                document.getElementById('modalUserRole').textContent = 'Unknown';
                                document.getElementById('modalUserFullName').textContent = 'User Not Found';
                                document.getElementById('modalUserEmail').textContent = 'N/A';
                                document.getElementById('modalUserId').textContent = '#000';
                                document.getElementById('modalUserPortfolios').textContent = '0';
                                document.getElementById('modalUserJoined').textContent = 'N/A';
                            });
                    });
                }

                // Handle Edit User Modal
                if (editUserModal) {
                    editUserModal.addEventListener('show.bs.modal', function(event) {
                        const button = event.relatedTarget;
                        const userData = JSON.parse(button.getAttribute('data-user'));

                        // Update form fields with user data
                        document.getElementById('editUserId').value = userData.id;
                        document.getElementById('editUserForm').querySelector('input[name="name"]').value = userData
                            .name;
                        document.getElementById('editUserForm').querySelector('input[name="email"]').value =
                            userData.email;
                    });
                }

                // Handle Edit User Form Submit
                if (document.getElementById('editUserForm')) {
                    document.getElementById('editUserForm').addEventListener('submit', function(e) {
                        e.preventDefault();

                        const id = document.getElementById('editUserId').value;
                        const data = {
                            name: this.querySelector('input[name="name"]').value,
                            email: this.querySelector('input[name="email"]').value
                        };

                        fetch(`/admin/users/${id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                                body: JSON.stringify(data)
                            })
                            .then(res => res.json())
                            .then(res => {
                                showToast('User berhasil diupdate');
                                location.reload();
                            })
                            .catch(error => {
                                console.error('Error updating user:', error);
                                showToast('Gagal update user', 'error');
                            });
                    });
                }

                // Handle Delete User Modal
                if (deleteUserModal) {
                    deleteUserModal.addEventListener('show.bs.modal', function(event) {
                        const button = event.relatedTarget;
                        const userId = button.getAttribute('data-user-id');
                        const userName = button.getAttribute('data-user-name');

                        // Update modal content
                        const modalBody = deleteUserModal.querySelector('.modal-body');
                        const modalFooter = deleteUserModal.querySelector('.modal-footer');

                        // Update delete button with user ID
                        const deleteButton = modalFooter.querySelector('.btn-danger');
                        deleteButton.setAttribute('data-user-id', userId);
                        deleteButton.setAttribute('data-user-name', userName);
                    });
                }

                // Handle Delete User Button Click
                let deleteBtn = null;

                if (deleteUserModal) {
                    deleteBtn = deleteUserModal.querySelector('.btn-danger');
                }

                if (deleteBtn) {
                    deleteBtn.addEventListener('click', function() {
                        const id = this.getAttribute('data-user-id');

                        fetch(`/admin/users/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                }
                            })
                            .then(res => res.json())
                            .then(res => {
                                showToast('User berhasil dihapus');
                                location.reload();
                            })
                            .catch(error => {
                                console.error('Error deleting user:', error);
                                showToast('Gagal hapus user', 'error');
                            });
                    });
                }
            });
        </script>
    @endpush
@endsection
