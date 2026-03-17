<div class="portfolio-item">

    <div style="display:flex;align-items:center;gap:.875rem;flex:1;min-width:0;">
        <div class="user-avatar" style="flex-shrink:0;border-radius:10px;">
            {{ strtoupper(substr($portfolio['title'] ?? 'P', 0, 1)) }}
        </div>
        <div style="min-width:0;">
            <h6 class="mb-1" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                {{ $portfolio['title'] ?? '-' }}
            </h6>
            <small class="text-muted" style="font-size:.78rem;">
                <i class="fas fa-palette me-1" style="color:#c4b5fd;"></i>
                {{ $portfolio['template'] ?? '-' }}
                &nbsp;·&nbsp;
                <i class="fas fa-clock me-1" style="color:#c4b5fd;"></i>
                {{ $portfolio['updated_at'] ?? '-' }}
            </small>
        </div>
    </div>

    <div class="portfolio-actions">
        <a href="{{ route('portfolio.preview') }}"
            class="btn btn-sm btn-outline-secondary"
            title="Preview" data-bs-toggle="tooltip">
            <i class="fas fa-eye"></i>
        </a>
        <a href="{{ route('portfolio.template') }}"
            class="btn btn-sm btn-outline-primary"
            title="Edit" data-bs-toggle="tooltip">
            <i class="fas fa-edit"></i>
        </a>
        <a href="{{ route('portfolio.download') }}"
            class="btn btn-sm btn-success"
            title="Download" data-bs-toggle="tooltip">
            <i class="fas fa-download"></i>
        </a>
    </div>

</div>
