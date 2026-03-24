{{-- WIZARD STEPS --}}
<div class="wizard-steps">
    <div class="wizard-step completed">
        <div class="wizard-circle"><i class="fas fa-check" style="font-size:.7rem;"></i></div>
        <p>Isi Data</p>
    </div>
    <div class="wizard-step completed">
        <div class="wizard-circle"><i class="fas fa-check" style="font-size:.7rem;"></i></div>
        <p>Pilih Template</p>
    </div>
    <div class="wizard-step completed">
        <div class="wizard-circle"><i class="fas fa-check" style="font-size:.7rem;"></i></div>
        <p>Preview</p>
    </div>
    <div class="wizard-step active">
        <div class="wizard-circle">4</div>
        <p>Download</p>
    </div>
</div>

{{-- MAIN CONTAINER --}}
<div class="download-container">

    {{-- HEADER --}}
    <div class="download-header">
        <h2><i class="fas fa-download me-2"></i>Download Portfolio</h2>
        <p>Pilih format file yang Anda inginkan untuk mendownload portfolio Anda</p>
    </div>

    {{-- TEMPLATE INFO BADGE --}}
    <div class="template-info">
        <div>
            <span class="template-name" id="template-display-name">Template Name</span>
            <span class="template-style" id="template-display-style">Template Style</span>
        </div>
        <div>
            <span class="status-badge status-success">
                <i class="fas fa-check-circle"></i> Siap untuk didownload
            </span>
        </div>
    </div>

    {{-- RINGKASAN PORTFOLIO --}}
    <div class="portfolio-summary">
        <h5><i class="fas fa-file-alt"></i>Ringkasan Portfolio</h5>
        <div class="summary-item">
            <span class="summary-label">Nama</span>
            <span class="summary-value" id="summary-name">–</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Pekerjaan</span>
            <span class="summary-value" id="summary-job">–</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Template</span>
            <span class="summary-value" id="summary-template">–</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Total Item</span>
            <span class="summary-value" id="summary-items">–</span>
        </div>
    </div>

    {{-- PILIHAN FORMAT DOWNLOAD --}}
    <div class="download-options">
        <div class="option-card selected">
            <span class="option-icon"><i class="fas fa-file-pdf"></i></span>
            <div class="option-title">PDF Professional</div>
            <div class="option-description">
                Format PDF berkualitas tinggi yang siap dicetak dan dibagikan.
                Cocok untuk aplikasi kerja formal.
            </div>
            <span class="option-size"><i class="fas fa-file me-1"></i>~200 KB</span>
        </div>
    </div>

    {{-- ACTIONS BAR --}}
    <div class="actions">
        @auth
        <a href="{{ route('portfolio.preview', $portfolio->id) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
        @else
        <a href="{{ route('guest.portfolio.preview', $portfolio->id) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
        @endauth
        <a href="{{ route('portfolio.download.file', $portfolio->id) }}" class="btn btn-primary">
            <i class="fas fa-download me-1"></i> Download PDF
        </a>
    </div>

    {{-- AKSI TAMBAHAN --}}
    <div class="additional-actions">
        <button type="button" class="btn btn-warning" onclick="sharePortfolio()">
            <i class="fas fa-share-alt me-1"></i> Bagikan
        </button>
        <button type="button" class="btn btn-danger" onclick="deletePortfolio()">
            <i class="fas fa-trash me-1"></i> Hapus Portfolio
        </button>
    </div>

</div>{{-- /.download-container --}}

<script>
    const templates = {
        'modern': {
            name: 'Modern Resume',
            style: 'Minimalist'
        },
        'creative': {
            name: 'Creative Resume',
            style: 'Artistic'
        },
        'professional': {
            name: 'Professional CV',
            style: 'Corporate'
        }
    };

    function loadPortfolioData() {
        // Ambil data dari PHP (database)
        const portfolioData = @json($data);

        // Ambil template dari URL atau session
        const urlParams = new URLSearchParams(window.location.search);
        const template = urlParams.get('template') || sessionStorage.getItem('selectedTemplate') || 'modern';

        applyTemplate(template);
        populateSummary(portfolioData, template);
    }

    function applyTemplate(templateName) {
        const tpl = templates[templateName] || templates['modern'];
        document.getElementById('template-display-name').textContent = tpl.name;
        document.getElementById('template-display-style').textContent = tpl.style;
    }

    function populateSummary(data, template) {
        const tpl = templates[template] || templates['modern'];
        document.getElementById('summary-name').textContent = data.name || '–';
        document.getElementById('summary-job').textContent = data.job_title || '–';
        document.getElementById('summary-template').textContent = tpl.name;

        // Count items from database
        let count = 0;
        if (data.education && Array.isArray(data.education)) count += data.education.length;
        if (data.experience && Array.isArray(data.experience)) count += data.experience.length;
        if (data.skills && Array.isArray(data.skills)) count += data.skills.length;
        if (data.projects && Array.isArray(data.projects)) count += data.projects.length;
        if (data.language && Array.isArray(data.language)) count += data.language.length;
        if (data.certification && Array.isArray(data.certification)) count += data.certification.length;
        if (data.reference && Array.isArray(data.reference)) count += data.reference.length;

        document.getElementById('summary-items').textContent = count + ' item';
    }

    function sharePortfolio() {
        const shareUrl = window.location.href;
        if (navigator.share) {
            navigator.share({
                title: 'Portfolio Saya',
                url: shareUrl
            }).catch(() => copyToClipboard(shareUrl));
        } else {
            copyToClipboard(shareUrl);
        }
    }

    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            showToast('Link portfolio disalin ke clipboard!');
        }).catch(() => {
            const tmp = document.createElement('input');
            tmp.value = text;
            document.body.appendChild(tmp);
            tmp.select();
            document.execCommand('copy');
            document.body.removeChild(tmp);
            showToast('Link portfolio disalin ke clipboard!');
        });
    }

    function deletePortfolio() {
        if (confirm('Apakah Anda yakin ingin menghapus portfolio ini? Aksi ini tidak dapat dibatalkan.')) {
            sessionStorage.removeItem('portfolioData');
            sessionStorage.removeItem('selectedTemplate');
            window.location.href = '{{ route('portfolio.create') }}';
        }
    }

    function showToast(message) {
        // Simple toast implementation
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.textContent = message;
        toast.style.position = 'fixed';
        toast.style.bottom = '20px';
        toast.style.right = '20px';
        toast.style.background = '#333';
        toast.style.color = 'white';
        toast.style.padding = '10px 20px';
        toast.style.borderRadius = '5px';
        toast.style.zIndex = '9999';
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    document.addEventListener('DOMContentLoaded', loadPortfolioData);
</script>
