<div class="portfolio-item">

    <div>
        <h6 class="mb-1">{{ $portfolio['title'] ?? '-' }}</h6>

        <small class="text-muted">
            Template: {{ $portfolio['template'] ?? '-' }} •
            Update: {{ $portfolio['updated_at'] ?? '-' }}
        </small>
    </div>

    <div class="portfolio-actions">

        <a href="{{ route('portfolio.preview') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fas fa-eye"></i>
        </a>

        <a href="{{ route('portfolio.template') }}" class="btn btn-sm btn-outline-primary">
            <i class="fas fa-edit"></i>
        </a>

        <a href="{{ route('portfolio.download') }}" class="btn btn-sm btn-success">
            <i class="fas fa-download"></i>
        </a>

    </div>

</div>
