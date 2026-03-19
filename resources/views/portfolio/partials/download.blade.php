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

    {{-- HEADER — konsisten dengan .form-header & .preview-header --}}
    <div class="download-header">
        <h2><i class="fas fa-download me-2"></i>Download Portfolio</h2>
        <p>Pilih format file yang Anda inginkan untuk mendownload portfolio Anda</p>
    </div>

    {{-- TEMPLATE INFO BADGE —  struktur sama persis dengan preview --}}
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

    {{-- RINGKASAN PORTFOLIO — konsisten dengan .form-section --}}
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

    {{-- PILIHAN FORMAT DOWNLOAD —  konsisten dengan .template-grid --}}
    <div class="download-options">

        <div class="option-card" onclick="selectOption('pdf', this)">
            <span class="option-icon"><i class="fas fa-file-pdf"></i></span>
            <div class="option-title">PDF Professional</div>
            <div class="option-description">
                Format PDF berkualitas tinggi yang siap dicetak dan dibagikan.
                Cocok untuk aplikasi kerja formal.
            </div>
            <span class="option-size"><i class="fas fa-file me-1"></i>~200 KB</span>
        </div>

        <div class="option-card" onclick="selectOption('docx', this)">
            <span class="option-icon"><i class="fas fa-file-word"></i></span>
            <div class="option-title">DOCX Editable</div>
            <div class="option-description">
                Format Microsoft Word yang bisa diedit. Cocok jika ingin
                melakukan penyesuaian lebih lanjut setelah download.
            </div>
            <span class="option-size"><i class="fas fa-file me-1"></i>~150 KB</span>
        </div>

        <div class="option-card" onclick="selectOption('html', this)">
            <span class="option-icon"><i class="fas fa-file-code"></i></span>
            <div class="option-title">HTML Standalone</div>
            <div class="option-description">
                File HTML lengkap dengan CSS dan JS. Cocok untuk dipublikasikan
                secara online sebagai portfolio website.
            </div>
            <span class="option-size"><i class="fas fa-file me-1"></i>~500 KB</span>
        </div>

        <div class="option-card" onclick="selectOption('zip', this)">
            <span class="option-icon"><i class="fas fa-file-archive"></i></span>
            <div class="option-title">Complete Package</div>
            <div class="option-description">
                Paket lengkap berisi semua format (PDF, DOCX, HTML) dalam satu
                file ZIP. Pilihan terbaik untuk menyimpan semua versi.
            </div>
            <span class="option-size"><i class="fas fa-file me-1"></i>~1 MB</span>
        </div>

    </div>

    {{-- ACTIONS BAR — konsisten dengan semua tahap lain --}}
    <div class="actions">
        @auth
        <a href="{{ route('portfolio.preview') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
        @else
        <a href="{{ route('guest.portfolio.preview') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
        @endauth
        <button type="button" class="btn btn-primary" id="download-btn" onclick="downloadFile()" disabled>
            <i class="fas fa-download me-1"></i> Download Sekarang
        </button>
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

    let selectedOption = '';
    let portfolioData = {};
    let selectedCard = null;

    function loadPortfolioData() {
        const urlParams = new URLSearchParams(window.location.search);
        const template = urlParams.get('template') || sessionStorage.getItem('selectedTemplate') || 'modern';

        applyTemplate(template);

        portfolioData = getFormData();
        populateSummary(portfolioData, template);
    }

    function applyTemplate(templateName) {
        const tpl = templates[templateName] || templates['modern'];
        document.getElementById('template-display-name').textContent = tpl.name;
        document.getElementById('template-display-style').textContent = tpl.style;
    }

    function getFormData() {
        const saved = sessionStorage.getItem('portfolioData');
        if (saved) return JSON.parse(saved);

        return {
            name: 'John Doe',
            job_title: 'Frontend Developer',
            itemCount: 10
        };
    }

    function populateSummary(data, template) {
        const tpl = templates[template] || templates['modern'];
        document.getElementById('summary-name').textContent = data.name || '–';
        document.getElementById('summary-job').textContent = data.job_title || '–';
        document.getElementById('summary-template').textContent = tpl.name;

        // Count items if arrays present
        let count = 0;
        ['education', 'experience', 'skills', 'projects', 'language', 'certification', 'reference'].forEach(k => {
            if (Array.isArray(data[k])) count += data[k].length;
        });
        document.getElementById('summary-items').textContent = (count || data.itemCount || 0) + ' item';
    }

    function selectOption(option, cardEl) {
        // Reset semua card
        document.querySelectorAll('.option-card').forEach(c => c.classList.remove('selected'));

        cardEl.classList.add('selected');
        selectedOption = option;
        document.getElementById('download-btn').disabled = false;

        showToast({
            pdf: 'Format PDF Professional dipilih!',
            docx: 'Format DOCX Editable dipilih!',
            html: 'Format HTML Standalone dipilih!',
            zip: 'Format Complete Package dipilih!'
        } [option]);
    }

    function showToast(msg) {
        const existing = document.querySelector('.dl-toast');
        if (existing) existing.remove();

        const t = document.createElement('div');
        t.className = 'dl-toast';
        Object.assign(t.style, {
            position: 'fixed',
            bottom: '1.5rem',
            right: '1.5rem',
            background: '#10b981',
            color: 'white',
            padding: '.75rem 1.25rem',
            borderRadius: '10px',
            boxShadow: '0 4px 16px rgba(16,185,129,.3)',
            fontSize: '.875rem',
            fontWeight: '600',
            zIndex: '9999',
            opacity: '0',
            transition: 'opacity .25s ease',
            display: 'flex',
            alignItems: 'center',
            gap: '.5rem'
        });
        t.innerHTML = '<i class="fas fa-check-circle"></i> ' + msg;
        document.body.appendChild(t);
        requestAnimationFrame(() => t.style.opacity = '1');
        setTimeout(() => {
            t.style.opacity = '0';
            setTimeout(() => t.remove(), 300);
        }, 2500);
    }

    function downloadFile() {
        if (!selectedOption) {
            alert('Silakan pilih format file terlebih dahulu!');
            return;
        }

        const btn = document.getElementById('download-btn');
        const original = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Memproses...';
        btn.disabled = true;

        setTimeout(() => {
            const messages = {
                pdf: 'Fitur download PDF akan diimplementasikan pada tahap backend.\n\nUntuk sementara, gunakan fitur Print di browser untuk membuat PDF.',
                docx: 'Fitur download DOCX akan diimplementasikan pada tahap backend.',
                html: 'Fitur download HTML akan diimplementasikan pada tahap backend.',
                zip: 'Fitur download ZIP akan diimplementasikan pada tahap backend.'
            };
            alert(messages[selectedOption]);
            btn.innerHTML = original;
            btn.disabled = false;
        }, 1500);
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

    document.addEventListener('DOMContentLoaded', loadPortfolioData);
</script>
