<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview Portfolio - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio/preview.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                    <div class="wizard-steps">
                        <div class="wizard-step">
                            <div class="wizard-circle">1</div>
                            <p>Isi Data</p>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-circle">2</div>
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

                    <div class="preview-container">
                        <div class="preview-header">
                            <h2><i class="fas fa-eye me-2"></i>Preview Portfolio</h2>
                            <p>Ini adalah tampilan akhir portfolio Anda sebelum didownload</p>
                        </div>

                    <div class="template-info">
                        <div>
                            <span class="template-name" id="template-display-name">Template Name</span>
                            <span class="template-style" id="template-display-style">Template Style</span>
                        </div>
                        <div>
                            <i class="fas fa-desktop text-secondary me-2"></i>
                            <span class="text-secondary">Preview Mode</span>
                        </div>
                    </div>

                    <div class="portfolio-preview">
                        <!-- Portfolio Header -->
                        <div class="portfolio-header">
                            <div class="portfolio-photo">
                                <img id="preview-photo" src="/images/default-avatar.png" alt="Profile Photo">
                            </div>
                            <div class="portfolio-info">
                                <h1 id="preview-name">John Doe</h1>
                                <h3 id="preview-job-title">Frontend Developer</h3>
                                <p id="preview-about">Developer berpengalaman dalam pembuatan aplikasi web modern dengan fokus pada user experience dan performa.</p>
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
                                <div class="contact-item">
                                    <i class="fas fa-globe"></i>
                                    <span id="preview-website"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Education Section -->
                        <div class="section">
                            <h4 class="section-title"><i class="fas fa-graduation-cap me-2"></i>Pendidikan</h4>
                            <div id="preview-education">
                                <!-- Education items will be populated here -->
                            </div>
                        </div>

                        <!-- Experience Section -->
                        <div class="section">
                            <h4 class="section-title"><i class="fas fa-briefcase me-2"></i>Pengalaman Kerja</h4>
                            <div id="preview-experience">
                                <!-- Experience items will be populated here -->
                            </div>
                        </div>

                        <!-- Skills Section -->
                        <div class="section">
                            <h4 class="section-title"><i class="fas fa-star me-2"></i>Keterampilan</h4>
                            <div id="preview-skills">
                                <!-- Skills will be populated here -->
                            </div>
                        </div>

                        <!-- Projects Section -->
                        <div class="section">
                            <h4 class="section-title"><i class="fas fa-project-diagram me-2"></i>Proyek</h4>
                            <div id="preview-projects">
                                <!-- Projects will be populated here -->
                            </div>
                        </div>

                        <!-- Languages Section -->
                        <div class="section">
                            <h4 class="section-title"><i class="fas fa-language me-2"></i>Bahasa</h4>
                            <div id="preview-languages"></div>
                        </div>

                        <!-- Certifications Section -->
                        <div class="section">
                            <h4 class="section-title"><i class="fas fa-certificate me-2"></i>Sertifikasi</h4>
                            <ul id="preview-certifications"></ul>
                        </div>

                        <!-- References Section -->
                        <div class="section">
                            <h4 class="section-title"><i class="fas fa-user-friends me-2"></i>Referensi</h4>
                            <div id="preview-references"></div>
                        </div>
                    </div>

                    <div class="actions">
                        <a href="/create-portfolio" class="btn btn-secondary">
                            <i class="fas fa-edit me-2"></i>Edit Portfolio
                        </a>
                        <button type="button" class="btn btn-primary" onclick="downloadPortfolio()">
                            <i class="fas fa-download me-2"></i>Download PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Template configuration
        const templates = {
            'modern': {
                name: 'Modern Resume',
                style: 'Minimalist',
                colors: {
                    primary: '#2563eb',
                    secondary: '#64748b'
                }
            },
            'creative': {
                name: 'Creative Resume',
                style: 'Artistic',
                colors: {
                    primary: '#10b981',
                    secondary: '#065f46'
                }
            }
        };

        function loadPortfolioData() {
            // Get template from URL or session storage
            const urlParams = new URLSearchParams(window.location.search);
            const template = urlParams.get('template') || sessionStorage.getItem('selectedTemplate') || 'modern';

            // Apply template styling
            applyTemplate(template);

            // Load form data from session storage or URL parameters
            const formData = getFormData();
            populatePreview(formData);
        }

        function applyTemplate(templateName) {
            const template = templates[templateName] || templates['modern'];

            // Update template display
            document.getElementById('template-display-name').textContent = template.name;
            document.getElementById('template-display-style').textContent = template.style;

            // Apply colors (this would normally be done server-side)
            document.documentElement.style.setProperty('--primary-color', template.colors.primary);
            document.documentElement.style.setProperty('--secondary-color', template.colors.secondary);
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
            data.email = urlParams.get('email') || 'john.doe@example.com';
            data.phone = urlParams.get('phone') || '+62 812-3456-7890';
            data.location = urlParams.get('location') || 'Jakarta, Indonesia';
            data.about = urlParams.get('about') || 'Developer berpengalaman dalam pembuatan aplikasi web modern dengan fokus pada user experience dan performa.';
            data.website = urlParams.get('website') || 'https://johndoe.com';

            // Education (demo data)
            data.education = [
                {
                    institution: 'Universitas Indonesia',
                    degree: 'Sarjana Teknik Informatika',
                    field: 'Teknik Informatika',
                    start_year: '2015',
                    end_year: '2019'
                }
            ];

            // Experience (demo data)
            data.experience = [
                {
                    company: 'Tech Corp',
                    position: 'Frontend Developer',
                    location: 'Jakarta',
                    start_date: '2019-06',
                    end_date: '2022-12',
                    description: 'Mengembangkan aplikasi web modern menggunakan React dan Vue.js.'
                }
            ];

            // Skills (demo data)
            data.skills = [
                { name: 'HTML', level: 'Ahli' },
                { name: 'CSS', level: 'Ahli' },
                { name: 'JavaScript', level: 'Mahir' },
                { name: 'React', level: 'Mahir' },
                { name: 'Vue.js', level: 'Menengah' }
            ];

            // Projects (demo data)
            data.projects = [
                {
                    name: 'E-commerce Website',
                    url: 'https://example.com',
                    description: 'Website e-commerce dengan fitur keranjang belanja dan pembayaran online.'
                }
            ];

            // Languages (demo data)
            data.language = [
                'Bahasa Indonesia (Native)',
                'English (Fluent)',
                'Japanese (Basic)'
            ];

            // Certifications (demo data)
            data.certification = [
                'Google IT Support Professional Certificate',
                'AWS Cloud Practitioner',
                'Microsoft Azure Fundamentals'
            ];

            // References (demo data)
            data.reference = [
                {
                    name: 'Jane Smith',
                    position: 'Senior Developer',
                    company: 'Tech Corp',
                    phone: '+62 812-3456-7891'
                },
                {
                    name: 'John Wilson',
                    position: 'Project Manager',
                    company: 'Innovatech',
                    phone: '+62 812-3456-7892'
                }
            ];

            return data;
        }

        function populatePreview(data) {
            // Basic info
            document.getElementById('preview-name').textContent = data.name;
            document.getElementById('preview-job-title').textContent = data.job_title;
            document.getElementById('preview-about').textContent = data.about;
            document.getElementById('preview-email').textContent = data.email;
            document.getElementById('preview-phone').textContent = data.phone;
            document.getElementById('preview-location').textContent = data.location;
            document.getElementById('preview-website').textContent = data.website || '';

            // Education
            const educationContainer = document.getElementById('preview-education');
            educationContainer.innerHTML = '';
            data.education.forEach(edu => {
                const eduDiv = document.createElement('div');
                eduDiv.className = 'education-item';
                eduDiv.innerHTML = `
                    <div class="item-header">
                        <div>
                            <div class="item-title">${edu.institution}</div>
                            <div class="item-subtitle">${edu.degree} - ${edu.field}</div>
                        </div>
                        <div class="item-date">${edu.start_year} - ${edu.end_year}</div>
                    </div>
                `;
                educationContainer.appendChild(eduDiv);
            });

            // Experience
            const experienceContainer = document.getElementById('preview-experience');
            experienceContainer.innerHTML = '';
            data.experience.forEach(exp => {
                const expDiv = document.createElement('div');
                expDiv.className = 'experience-item';
                expDiv.innerHTML = `
                    <div class="item-header">
                        <div>
                            <div class="item-title">${exp.company}</div>
                            <div class="item-subtitle">${exp.position}</div>
                            <div class="item-location">${exp.location}</div>
                        </div>
                        <div class="item-date">${exp.start_date} - ${exp.end_date || 'Sekarang'}</div>
                    </div>
                    <div class="item-description">${exp.description}</div>
                `;
                experienceContainer.appendChild(expDiv);
            });

            // Skills
            const skillsContainer = document.getElementById('preview-skills');
            skillsContainer.innerHTML = `
                <div class="skills-grid">
                    <div class="skill-category">
                        <h6>Technical Skills</h6>
                        <ul class="skill-list">
                            ${data.skills.map(skill => `
                                <li><i class="fas fa-check-circle"></i>${skill.name} (${skill.level})</li>
                            `).join('')}
                        </ul>
                    </div>
                </div>
            `;

            // Projects
            const projectsContainer = document.getElementById('preview-projects');
            projectsContainer.innerHTML = `
                <div class="project-grid">
                    ${data.projects.map(project => `
                        <div class="project-card">
                            <div class="project-title">${project.name}</div>
                            <div class="item-description">${project.description}</div>
                            <a href="${project.url}" class="project-url" target="_blank">
                                <i class="fas fa-external-link-alt"></i>Lihat Proyek
                            </a>
                        </div>
                    `).join('')}
                </div>
            `;

            // Languages
            const langContainer = document.getElementById('preview-languages');
            langContainer.innerHTML = data.language.map(lang => `
                <div class="language-item">${lang}</div>
            `).join('');

            // Certifications
            const certContainer = document.getElementById('preview-certifications');
            certContainer.innerHTML = data.certification.map(cert => `
                <li>${cert}</li>
            `).join('');

            // References
            const refContainer = document.getElementById('preview-references');
            refContainer.innerHTML = data.reference.map(ref => `
                <div class="reference-item">
                    <strong>${ref.name}</strong><br>
                    ${ref.position} - ${ref.company}<br>
                    ${ref.phone}
                </div>
            `).join('');
        }

        function downloadPortfolio() {
            // This would normally trigger a PDF download
            // For demo purposes, we'll show an alert
            alert('Fitur download PDF akan diimplementasikan pada tahap backend.\n\nUntuk sekarang, Anda bisa:\n1. Screenshot halaman ini\n2. Gunakan fitur Print di browser\n3. Atau lanjutkan ke tahap selanjutnya');

            // In a real implementation, this would:
            // 1. Send data to server
            // 2. Generate PDF
            // 3. Return download link
            // window.location.href = '/download-pdf?template=' + getSelectedTemplate();
        }

        function getSelectedTemplate() {
            return new URLSearchParams(window.location.search).get('template') ||
                   sessionStorage.getItem('selectedTemplate') ||
                   'modern';
        }

        // Initialize preview
        document.addEventListener('DOMContentLoaded', loadPortfolioData);
    </script>
</body>
</html>
