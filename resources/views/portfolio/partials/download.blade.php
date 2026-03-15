<div class="wizard-steps">
    <div class="wizard-step">
        <div class="wizard-circle">1</div>
        <p>Isi Data</p>
    </div>
    <div class="wizard-step">
        <div class="wizard-circle">2</div>
        <p>Pilih Template</p>
    </div>
    <div class="wizard-step">
        <div class="wizard-circle">3</div>
        <p>Preview</p>
    </div>
    <div class="wizard-step active">
        <div class="wizard-circle">4</div>
        <p>Download</p>
    </div>
</div>

<div class="download-container">
    <div class="download-header">
        <h2><i class="fas fa-download me-2"></i>Download Portfolio</h2>
        <p>Pilih format file yang Anda inginkan untuk mendownload portfolio Anda</p>
    </div>

    <div class="template-info">
        <div>
            <span class="template-name" id="template-display-name">Template Name</span>
            <span class="template-style" id="template-display-style">Template Style</span>
        </div>
        <div>
            <span class="status-badge status-success">
                <i class="fas fa-check-circle"></i>Siap untuk didownload
            </span>
        </div>
    </div>

    <div class="portfolio-summary">
        <h5 class="mb-3"><i class="fas fa-file-alt me-2"></i>Ringkasan Portfolio</h5>
        <div class="summary-item">
            <span class="summary-label">Nama</span>
            <span class="summary-value" id="summary-name">John Doe</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Pekerjaan</span>
            <span class="summary-value" id="summary-job">Frontend Developer</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Template</span>
            <span class="summary-value" id="summary-template">Modern Minimal</span>
        </div>
        <div class="summary-item">
            <span class="summary-label">Total Item</span>
            <span class="summary-value" id="summary-items">15 item</span>
        </div>
    </div>

    <div class="download-options">
        <!-- PDF Option -->
        <div class="option-card" onclick="selectOption('pdf')">
            <div class="option-icon">
                <i class="fas fa-file-pdf"></i>
            </div>
            <div class="option-title">PDF Professional</div>
            <div class="option-description">
                Format PDF berkualitas tinggi yang siap dicetak dan dibagikan ke perusahaan atau klien. Cocok untuk
                aplikasi kerja formal.
            </div>
            <div class="option-size">
                <i class="fas fa-file me-1"></i>Ukuran: ~200KB
            </div>
        </div>

        <!-- DOCX Option -->
        <div class="option-card" onclick="selectOption('docx')">
            <div class="option-icon">
                <i class="fas fa-file-word"></i>
            </div>
            <div class="option-title">DOCX Editable</div>
            <div class="option-description">
                Format dokumen Microsoft Word yang bisa diedit. Cocok jika Anda ingin melakukan penyesuaian lebih lanjut
                setelah download.
            </div>
            <div class="option-size">
                <i class="fas fa-file me-1"></i>Ukuran: ~150KB
            </div>
        </div>

        <!-- HTML Option -->
        <div class="option-card" onclick="selectOption('html')">
            <div class="option-icon">
                <i class="fas fa-file-code"></i>
            </div>
            <div class="option-title">HTML Standalone</div>
            <div class="option-description">
                File HTML lengkap dengan CSS dan JavaScript. Cocok untuk dipublikasikan secara online atau digunakan
                sebagai portfolio website.
            </div>
            <div class="option-size">
                <i class="fas fa-file me-1"></i>Ukuran: ~500KB
            </div>
        </div>

        <!-- ZIP Package Option -->
        <div class="option-card" onclick="selectOption('zip')">
            <div class="option-icon">
                <i class="fas fa-file-archive"></i>
            </div>
            <div class="option-title">Complete Package</div>
            <div class="option-description">
                Paket lengkap berisi semua format (PDF, DOCX, HTML) dalam satu file ZIP. Pilihan terbaik untuk menyimpan
                semua versi.
            </div>
            <div class="option-size">
                <i class="fas fa-file me-1"></i>Ukuran: ~1MB
            </div>
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('portfolio.preview') }}" class="btn btn-secondary">
            <i class="fas fa-eye me-2"></i>Lihat Preview
        </a>
        <button type="button" class="btn btn-primary" id="download-btn" onclick="downloadFile()" disabled>
            <i class="fas fa-download me-2"></i>Download Sekarang
        </button>
    </div>

    <div class="additional-actions">
        <button type="button" class="btn btn-warning" onclick="sharePortfolio()">
            <i class="fas fa-share-alt me-2"></i>Bagikan
        </button>
        <button type="button" class="btn btn-danger" onclick="deletePortfolio()">
            <i class="fas fa-trash me-2"></i>Hapus Portfolio
        </button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    let selectedOption = '';
    let portfolioData = {};

    // Template configuration
    const templates = {
        'modern-minimal': {
            name: 'Modern Minimal',
            style: 'Clean & Professional'
        },
        'creative-portfolio': {
            name: 'Creative Portfolio',
            style: 'Artistic & Bold'
        },
        'corporate-professional': {
            name: 'Corporate Professional',
            style: 'Formal & Elegant'
        },
        'tech-developer': {
            name: 'Tech Developer',
            style: 'Technical & Modern'
        },
        'academic': {
            name: 'Academic',
            style: 'Scholarly & Clean'
        },
        'creative-agency': {
            name: 'Creative Agency',
            style: 'Bold & Dynamic'
        }
    };

    function loadPortfolioData() {
        // Get template from URL or session storage
        const urlParams = new URLSearchParams(window.location.search);
        const template = urlParams.get('template') || sessionStorage.getItem('selectedTemplate') || 'modern-minimal';

        // Apply template styling
        applyTemplate(template);

        // Load form data
        portfolioData = getFormData();
        populateSummary(portfolioData);
    }

    function applyTemplate(templateName) {
        const template = templates[templateName] || templates['modern-minimal'];

        // Update template display
        document.getElementById('template-display-name').textContent = template.name;
        document.getElementById('template-display-style').textContent = template.style;

        // Update summary
        document.getElementById('summary-template').textContent = template.name;
    }

    function getFormData() {
        // Try to get data from session storage first
        const savedData = sessionStorage.getItem('portfolioData');
        if (savedData) {
            return JSON.parse(savedData);
        }

        // Fallback to URL parameters (for demo purposes)
        const urlParams = new URLSearchParams(window.location.search);
        const data = {};

        // Basic info
        data.name = urlParams.get('name') || 'John Doe';
        data.job_title = urlParams.get('job_title') || 'Frontend Developer';

        // Count items
        data.itemCount = 10; // Demo count

        return data;
    }

    function populateSummary(data) {
        document.getElementById('summary-name').textContent = data.name;
        document.getElementById('summary-job').textContent = data.job_title;
        document.getElementById('summary-items').textContent = data.itemCount + ' item';
    }

    function selectOption(option) {
        // Remove selected class from all cards
        document.querySelectorAll('.option-card').forEach(card => {
            card.classList.remove('selected');
        });

        // Add selected class to clicked card
        event.currentTarget.classList.add('selected');

        selectedOption = option;
        document.getElementById('download-btn').disabled = false;

        // Show selection feedback
        showSelectionFeedback(option);
    }

    function showSelectionFeedback(option) {
        // Remove existing feedback
        const existingFeedback = document.querySelector('.selection-feedback');
        if (existingFeedback) {
            existingFeedback.remove();
        }

        // Create feedback element
        const feedback = document.createElement('div');
        feedback.className = 'selection-feedback';
        feedback.style.position = 'fixed';
        feedback.style.top = '20px';
        feedback.style.right = '20px';
        feedback.style.background = '#10b981';
        feedback.style.color = 'white';
        feedback.style.padding = '1rem 2rem';
        feedback.style.borderRadius = '8px';
        feedback.style.boxShadow = '0 4px 12px rgba(16, 185, 129, 0.3)';
        feedback.style.zIndex = '9999';
        feedback.style.opacity = '0';
        feedback.style.transition = 'opacity 0.3s ease';

        const optionNames = {
            'pdf': 'PDF Professional',
            'docx': 'DOCX Editable',
            'html': 'HTML Standalone',
            'zip': 'Complete Package'
        };

        feedback.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                Format "${optionNames[option]}" dipilih!
            `;

        document.body.appendChild(feedback);

        // Animate feedback
        setTimeout(() => {
            feedback.style.opacity = '1';
        }, 10);

        // Auto remove after 3 seconds
        setTimeout(() => {
            feedback.style.opacity = '0';
            setTimeout(() => {
                feedback.remove();
            }, 300);
        }, 3000);
    }

    function downloadFile() {
        if (!selectedOption) {
            alert('Silakan pilih format file terlebih dahulu!');
            return;
        }

        // Simulate download process
        const downloadBtn = document.getElementById('download-btn');
        const originalText = downloadBtn.innerHTML;

        downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
        downloadBtn.disabled = true;

        setTimeout(() => {
            // Simulate different download behaviors based on format
            switch (selectedOption) {
                case 'pdf':
                    alert(
                        'Fitur download PDF akan diimplementasikan pada tahap backend.\n\nUntuk sekarang, Anda bisa menggunakan fitur Print di browser untuk membuat PDF.');
                    break;
                case 'docx':
                    alert(
                        'Fitur download DOCX akan diimplementasikan pada tahap backend.\n\nFormat DOCX memungkinkan Anda mengedit portfolio setelah download.');
                    break;
                case 'html':
                    alert(
                        'Fitur download HTML akan diimplementasikan pada tahap backend.\n\nFile HTML bisa langsung dibuka di browser atau diunggah ke hosting.');
                    break;
                case 'zip':
                    alert(
                        'Fitur download ZIP akan diimplementasikan pada tahap backend.\n\nPaket ZIP berisi semua format file portfolio Anda.');
                    break;
            }

            downloadBtn.innerHTML = originalText;
            downloadBtn.disabled = false;
        }, 2000);
    }

    function sharePortfolio() {
        // Simulate share functionality
        const shareUrl = window.location.href;
        const shareText = `Lihat portfolio saya: ${portfolioData.name} - ${portfolioData.job_title}`;

        if (navigator.share) {
            navigator.share({
                title: 'Portfolio Saya',
                text: shareText,
                url: shareUrl
            }).catch(() => {
                fallbackShare(shareText, shareUrl);
            });
        } else {
            fallbackShare(shareText, shareUrl);
        }
    }

    function fallbackShare(text, url) {
        // Fallback for browsers that don't support Web Share API
        const tempInput = document.createElement('input');
        tempInput.value = url;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);

        alert(
            'Link portfolio telah disalin ke clipboard!\nAnda bisa membagikannya ke media sosial atau mengirimkannya ke teman.');
    }

    function deletePortfolio() {
        if (confirm('Apakah Anda yakin ingin menghapus portfolio ini? Aksi ini tidak dapat dibatalkan.')) {
            // Clear session storage
            sessionStorage.removeItem('portfolioData');
            sessionStorage.removeItem('selectedTemplate');

            // Redirect to create page
            window.location.href = '/create-portfolio';
        }
    }

    // Initialize download page
    document.addEventListener('DOMContentLoaded', loadPortfolioData);
</script>
