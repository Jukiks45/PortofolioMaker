{{-- ============================================================
     TAHAP 3 — Preview Portfolio
     Wrapper: .preview-container  (konsisten dg .form-container & .template-container)
     Header : .preview-header     (konsisten dg .form-header)
     Semua tombol menggunakan .actions bar yang sama
============================================================ --}}

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
    <div class="wizard-step active">
        <div class="wizard-circle">3</div>
        <p>Preview</p>
    </div>
    <div class="wizard-step">
        <div class="wizard-circle">4</div>
        <p>Download</p>
    </div>
</div>

{{-- MAIN CONTAINER --}}
<div class="preview-container">

    {{-- HEADER — konsisten dengan .form-header & template header --}}
    <div class="preview-header">
        <h2><i class="fas fa-eye me-2"></i>Preview Portfolio</h2>
        <p>Ini adalah tampilan akhir portfolio Anda sebelum didownload</p>
    </div>

    {{-- TEMPLATE INFO BADGE --}}
    <div class="template-info">
        <div>
            <span class="template-name" id="template-display-name">Template Name</span>
            <span class="template-style" id="template-display-style">Template Style</span>
        </div>
        <div>
            <i class="fas fa-desktop me-2" style="color:#94a3b8;"></i>
            <span style="font-size:.85rem;color:#94a3b8;font-weight:500;">Mode Preview</span>
        </div>
    </div>

    {{-- PORTFOLIO PREVIEW CARD --}}
    <div class="portfolio-preview">

        {{-- Portfolio Header --}}
        <div class="portfolio-header">
            <div class="portfolio-photo">
                <img id="preview-photo" src="/images/default-avatar.png" alt="Profile Photo">
            </div>
            <div class="portfolio-info">
                <h1 id="preview-name">John Doe</h1>
                <h3 id="preview-job-title">Frontend Developer</h3>
                <p id="preview-about">
                    Developer berpengalaman dalam pembuatan aplikasi web modern
                    dengan fokus pada user experience dan performa.
                </p>
            </div>
            <div class="portfolio-contact">
                <div class="contact-item">
                    <i class="fas fa-envelope"></i>
                    <span id="preview-email">john.doe@example.com</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-phone"></i>
                    <span id="preview-phone">+62 812-3456-7890</span>
                </div>
                <div class="contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span id="preview-location">Jakarta, Indonesia</span>
                </div>
                <div class="contact-item" id="website-row">
                    <i class="fas fa-globe"></i>
                    <span id="preview-website"></span>
                </div>
            </div>
        </div>

        {{-- Pendidikan --}}
        <div class="section">
            <h4 class="section-title">
                <i class="fas fa-graduation-cap"></i>
                Pendidikan
            </h4>
            <div id="preview-education"></div>
        </div>

        {{-- Pengalaman Kerja --}}
        <div class="section">
            <h4 class="section-title">
                <i class="fas fa-briefcase"></i>
                Pengalaman Kerja
            </h4>
            <div id="preview-experience"></div>
        </div>

        {{-- Keterampilan --}}
        <div class="section">
            <h4 class="section-title">
                <i class="fas fa-star"></i>
                Keterampilan
            </h4>
            <div id="preview-skills"></div>
        </div>

        {{-- Proyek --}}
        <div class="section">
            <h4 class="section-title">
                <i class="fas fa-project-diagram"></i>
                Proyek
            </h4>
            <div id="preview-projects"></div>
        </div>

        {{-- Bahasa --}}
        <div class="section">
            <h4 class="section-title">
                <i class="fas fa-language"></i>
                Bahasa
            </h4>
            <div id="preview-languages"></div>
        </div>

        {{-- Sertifikasi --}}
        <div class="section">
            <h4 class="section-title">
                <i class="fas fa-certificate"></i>
                Sertifikasi
            </h4>
            <ul id="preview-certifications"></ul>
        </div>

        {{-- Referensi --}}
        <div class="section">
            <h4 class="section-title">
                <i class="fas fa-user-friends"></i>
                Referensi
            </h4>
            <div id="preview-references"></div>
        </div>

    </div>{{-- /.portfolio-preview --}}

    {{-- ACTIONS — konsisten dengan semua tahap lain --}}
    <div class="actions">
        @auth
        <a href="{{ route('portfolio.template') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
        <a href="{{ route('portfolio.create') }}" class="btn btn-secondary">
            <i class="fas fa-edit me-1"></i> Edit Data
        </a>
        <a href="{{ route('portfolio.download') }}" class="btn btn-primary">
            <i class="fas fa-arrow-right me-1"></i> Lanjut ke Download
        </a>
        @else
        <a href="{{ route('guest.portfolio.template') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
        <a href="{{ route('guest.portfolio.create') }}" class="btn btn-secondary">
            <i class="fas fa-edit me-1"></i> Edit Data
        </a>
        <a href="{{ route('guest.portfolio.download') }}" class="btn btn-primary">
            <i class="fas fa-arrow-right me-1"></i> Lanjut ke Download
        </a>
        @endauth
    </div>

</div>{{-- /.preview-container --}}

<script>
    // Template configuration
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
        const urlParams = new URLSearchParams(window.location.search);
        const template = urlParams.get('template') || sessionStorage.getItem('selectedTemplate') || 'modern';

        applyTemplate(template);

        const formData = getFormData();
        populatePreview(formData);
    }

    function applyTemplate(templateName) {
        const tpl = templates[templateName] || templates['modern'];
        document.getElementById('template-display-name').textContent = tpl.name;
        document.getElementById('template-display-style').textContent = tpl.style;
    }

    function getFormData() {
        const savedData = sessionStorage.getItem('portfolioData');
        if (savedData) return JSON.parse(savedData);

        // Demo / fallback data
        return {
            name: 'John Doe',
            job_title: 'Frontend Developer',
            email: 'john.doe@example.com',
            phone: '+62 812-3456-7890',
            location: 'Jakarta, Indonesia',
            about: 'Developer berpengalaman dalam pembuatan aplikasi web modern dengan fokus pada user experience dan performa.',
            website: 'https://johndoe.com',
            education: [{
                institution: 'Universitas Indonesia',
                degree: 'Sarjana Teknik Informatika',
                field: 'Teknik Informatika',
                start_year: '2015',
                end_year: '2019'
            }],
            experience: [{
                company: 'Tech Corp',
                position: 'Frontend Developer',
                location: 'Jakarta',
                start_date: '2019-06',
                end_date: '2022-12',
                description: 'Mengembangkan aplikasi web modern menggunakan React dan Vue.js.'
            }],
            skills: [{
                    name: 'HTML',
                    level: 'Ahli'
                },
                {
                    name: 'CSS',
                    level: 'Ahli'
                },
                {
                    name: 'JavaScript',
                    level: 'Mahir'
                },
                {
                    name: 'React',
                    level: 'Mahir'
                },
                {
                    name: 'Vue.js',
                    level: 'Menengah'
                }
            ],
            projects: [{
                name: 'E-commerce Website',
                url: 'https://example.com',
                description: 'Website e-commerce dengan fitur keranjang belanja dan pembayaran online.'
            }],
            language: ['Bahasa Indonesia (Native)', 'English (Fluent)'],
            certification: ['Google IT Support Professional Certificate', 'AWS Cloud Practitioner'],
            reference: [{
                name: 'Jane Smith',
                position: 'Senior Developer',
                company: 'Tech Corp',
                phone: '+62 812-3456-7891'
            }]
        };
    }

    function populatePreview(data) {
        // Basic info
        document.getElementById('preview-name').textContent = data.name || '-';
        document.getElementById('preview-job-title').textContent = data.job_title || '-';
        document.getElementById('preview-about').textContent = data.about || '';
        document.getElementById('preview-email').textContent = data.email || '-';
        document.getElementById('preview-phone').textContent = data.phone || '-';
        document.getElementById('preview-location').textContent = data.location || '-';
        document.getElementById('preview-website').textContent = data.website || '';

        // Hide website row if empty
        if (!data.website) {
            document.getElementById('website-row').style.display = 'none';
        }

        // Education
        const eduContainer = document.getElementById('preview-education');
        eduContainer.innerHTML = (data.education || []).map(edu => `
        <div class="education-item">
            <div class="item-header">
                <div>
                    <div class="item-title">${edu.institution}</div>
                    <div class="item-subtitle">${edu.degree}${edu.field ? ' — ' + edu.field : ''}</div>
                </div>
                <div class="item-date">${edu.start_year} – ${edu.end_year || 'Sekarang'}</div>
            </div>
        </div>
    `).join('') || '<p style="color:#94a3b8;font-size:.875rem;">Belum ada data pendidikan.</p>';

        // Experience
        const expContainer = document.getElementById('preview-experience');
        expContainer.innerHTML = (data.experience || []).map(exp => `
        <div class="experience-item">
            <div class="item-header">
                <div>
                    <div class="item-title">${exp.company}</div>
                    <div class="item-subtitle">${exp.position}</div>
                    ${exp.location ? `<div class="item-location"><i class="fas fa-map-marker-alt" style="font-size:.7rem;"></i> ${exp.location}</div>` : ''}
                </div>
                <div class="item-date">${exp.start_date} – ${exp.end_date || 'Sekarang'}</div>
            </div>
            ${exp.description ? `<div class="item-description">${exp.description}</div>` : ''}
        </div>
    `).join('') || '<p style="color:#94a3b8;font-size:.875rem;">Belum ada pengalaman kerja.</p>';

        // Skills
        const skillContainer = document.getElementById('preview-skills');
        if (data.skills && data.skills.length) {
            skillContainer.innerHTML = `
            <div class="skills-grid">
                <div class="skill-category">
                    <h6>Daftar Keterampilan</h6>
                    <ul class="skill-list">
                        ${data.skills.map(s => `
                            <li><i class="fas fa-check-circle"></i>${s.name}<span style="margin-left:auto;font-size:.75rem;opacity:.7;">${s.level}</span></li>
                        `).join('')}
                    </ul>
                </div>
            </div>
        `;
        } else {
            skillContainer.innerHTML = '<p style="color:#94a3b8;font-size:.875rem;">Belum ada keterampilan.</p>';
        }

        // Projects
        const projContainer = document.getElementById('preview-projects');
        if (data.projects && data.projects.length) {
            projContainer.innerHTML = `
            <div class="project-grid">
                ${data.projects.map(p => `
                    <div class="project-card">
                        <div class="project-title">${p.name}</div>
                        ${p.description ? `<div class="item-description">${p.description}</div>` : ''}
                        ${p.url ? `<a href="${p.url}" class="project-url" target="_blank"><i class="fas fa-external-link-alt"></i> Lihat Proyek</a>` : ''}
                    </div>
                `).join('')}
            </div>
        `;
        } else {
            projContainer.innerHTML = '<p style="color:#94a3b8;font-size:.875rem;">Belum ada proyek.</p>';
        }

        // Languages
        const langContainer = document.getElementById('preview-languages');
        langContainer.innerHTML = (data.language || []).map(l =>
            `<span class="language-item">${l}</span>`
        ).join('') || '<p style="color:#94a3b8;font-size:.875rem;">Belum ada data bahasa.</p>';

        // Certifications
        const certContainer = document.getElementById('preview-certifications');
        certContainer.innerHTML = (data.certification || []).map(c =>
            `<li>${c}</li>`
        ).join('') || '<li style="color:#94a3b8;font-size:.875rem;list-style:none;">Belum ada sertifikasi.</li>';

        // References
        const refContainer = document.getElementById('preview-references');
        refContainer.innerHTML = (data.reference || []).map(r => `
        <div class="reference-item">
            <div class="item-title">${r.name}</div>
            <div class="item-subtitle">${r.position}${r.company ? ' — ' + r.company : ''}</div>
            ${r.phone ? `<div class="item-location"><i class="fas fa-phone" style="font-size:.7rem;"></i> ${r.phone}</div>` : ''}
        </div>
    `).join('') || '<p style="color:#94a3b8;font-size:.875rem;">Belum ada referensi.</p>';
    }

    document.addEventListener('DOMContentLoaded', loadPortfolioData);
</script>
