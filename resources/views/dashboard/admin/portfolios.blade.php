@extends('layouts.dashboard')

@section('title', 'Portfolio Manager')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="header-section">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h4 class="header-title mb-1">Portfolio Manager</h4>
                <p class="text-muted mb-0" style="font-size:.85rem;">
                    Kelola semua portfolio yang dibuat oleh pengguna.
                </p>
            </div>
            <span class="badge rounded-pill px-3 py-2" style="background:#eef2ff;color:#4c2ee6;font-size:.8rem;font-weight:700;">
                <i class="fas fa-briefcase me-1"></i> 5 Portfolio
            </span>
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
                    <input type="text" class="form-control" placeholder="Cari portfolio berdasarkan judul atau pemilik...">
                </div>
            </div>
            <div class="filter-group" style="min-width:160px;">
                <select class="form-select" style="border:1.5px solid #e2e8f0;border-radius:10px;font-size:.875rem;padding:.65rem .9rem;">
                    <option selected>Semua Template</option>
                    <option>Minimal</option>
                    <option>Creative</option>
                    <option>Professional</option>
                </select>
            </div>
        </div>
    </div>

    {{-- PORTFOLIO TABLE --}}
    <div class="user-table-container">
        <div class="table-header">
            <h6>Daftar Portfolio</h6>
            <span style="font-size:.78rem;color:#94a3b8;">Menampilkan 5 dari 5 portfolio</span>
        </div>
        <div class="table-responsive">
            <table class="table user-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Portfolio</th>
                        <th>Pemilik</th>
                        <th>Template</th>
                        <th>Dibuat</th>
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $portfolios = [
                        ['id'=>'001','initial'=>'D','title'=>'Developer Portfolio','desc'=>'Professional web developer showcase','owner'=>'Zaki Almukhtarom','template'=>'Minimal','date'=>'1 Mei 2025'],
                        ['id'=>'002','initial'=>'U','title'=>'UI Designer Portfolio','desc'=>'Creative design showcase','owner'=>'Sarah','template'=>'Creative','date'=>'20 Apr 2025'],
                        ['id'=>'003','initial'=>'P','title'=>'Photographer Portfolio','desc'=>'Visual storytelling showcase','owner'=>'Michael','template'=>'Professional','date'=>'15 Mar 2025'],
                        ['id'=>'004','initial'=>'G','title'=>'Graphic Designer Portfolio','desc'=>'Brand and visual design portfolio','owner'=>'Emily','template'=>'Creative','date'=>'10 Feb 2025'],
                        ['id'=>'005','initial'=>'M','title'=>'Music Producer Portfolio','desc'=>'Audio production and mixing showcase','owner'=>'Alex','template'=>'Professional','date'=>'25 Jan 2025'],
                    ];
                    @endphp

                    @foreach($portfolios as $p)
                    <tr>
                        <td>
                            <span style="font-size:.78rem;font-weight:700;color:#94a3b8;font-family:monospace;">#{{ $p['id'] }}</span>
                        </td>
                        <td>
                            <div class="user-info">
                                <div class="user-avatar">{{ $p['initial'] }}</div>
                                <div>
                                    <div class="portfolio-title">{{ $p['title'] }}</div>
                                    <div class="portfolio-description">{{ $p['desc'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="meta-item">
                                <i class="fas fa-user"></i> {{ $p['owner'] }}
                            </div>
                        </td>
                        <td>
                            <span class="portfolio-template">
                                <i class="fas fa-palette"></i> {{ $p['template'] }}
                            </span>
                        </td>
                        <td>
                            <span class="join-date">
                                <i class="fas fa-calendar-alt"></i> {{ $p['date'] }}
                            </span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="#" class="btn-action btn-view"
                                    data-bs-toggle="modal" data-bs-target="#viewPortfolioModal">
                                    <i class="fas fa-eye"></i>
                                    <span class="btn-label">Lihat</span>
                                </a>
                                <a href="#" class="btn-action btn-edit">
                                    <i class="fas fa-download"></i>
                                    <span class="btn-label">Unduh</span>
                                </a>
                                <a href="#" class="btn-action btn-delete"
                                    data-bs-toggle="modal" data-bs-target="#deletePortfolioModal">
                                    <i class="fas fa-trash"></i>
                                    <span class="btn-label">Hapus</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    {{-- PAGINATION --}}
    <div class="pagination-container">
        <nav aria-label="Portfolio pagination">
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

{{-- View Portfolio Modal --}}
<div class="modal fade" id="viewPortfolioModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-briefcase me-2 text-primary"></i>Detail Portfolio
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="user-details-grid">
                    <div class="detail-card">
                        <h6>Informasi Portfolio</h6>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Judul</div>
                            <div class="detail-value">Developer Portfolio</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Template</div>
                            <div class="detail-value">Minimal</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Deskripsi</div>
                            <div class="detail-value">Professional web developer showcase</div>
                        </div>
                        <div>
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Dibuat</div>
                            <div class="detail-value">1 Mei 2025</div>
                        </div>
                    </div>
                    <div class="detail-card">
                        <h6>Detail Pemilik</h6>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Owner ID</div>
                            <div class="detail-value" style="font-family:monospace;">#001</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Nama Pemilik</div>
                            <div class="detail-value">Zaki Almukhtarom</div>
                        </div>
                        <div class="mb-3">
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Email Pemilik</div>
                            <div class="detail-value">zaki@mail.com</div>
                        </div>
                        <div>
                            <div class="text-muted" style="font-size:.75rem;font-weight:600;text-transform:uppercase;letter-spacing:.05em;margin-bottom:.3rem;">Total Portfolio</div>
                            <div class="detail-value">3</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-external-link-alt me-1"></i> Lihat Live Portfolio
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Delete Portfolio Modal --}}
<div class="modal fade" id="deletePortfolioModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center px-4 pb-2">
                <div style="width:56px;height:56px;background:#fef2f2;border-radius:16px;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;">
                    <i class="fas fa-trash" style="color:#ef4444;font-size:1.25rem;"></i>
                </div>
                <h5 class="fw-bold mb-1" style="color:#0b0f3b;">Hapus Portfolio?</h5>
                <p class="text-muted mb-0" style="font-size:.875rem;">
                    Aksi ini tidak dapat dibatalkan. Portfolio akan dihapus secara permanen.
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
