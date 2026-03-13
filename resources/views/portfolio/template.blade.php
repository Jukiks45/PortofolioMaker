<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Template - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portfolio/template.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="template-container">
                    <div class="wizard-steps">
                        <div class="wizard-step">
                            <div class="wizard-circle">1</div>
                            <p>Isi Data</p>
                        </div>
                        <div class="wizard-step active">
                            <div class="wizard-circle">2</div>
                            <p>Pilih Template</p>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-circle">3</div>
                            <p>Preview</p>
                        </div>
                        <div class="wizard-step">
                            <div class="wizard-circle">4</div>
                            <p>Download</p>
                        </div>
                    </div>

                    <div class="template-header">
                        <h2><i class="fas fa-palette me-2"></i>Pilih Template Portfolio</h2>
                        <p>Pilih template yang paling sesuai dengan gaya dan kebutuhan Anda</p>
                    </div>

                    <div class="template-grid">
                        <!-- Template 1 -->
                        <div class="template-card" onclick="selectTemplate('modern', this)">
                            <div class="template-preview">
                                <img src="{{ asset('templates/template1.png') }}" alt="Modern Resume Template">
                            </div>
                            <div class="template-info">
                                <div class="template-name">Modern Resume</div>
                                <div class="template-style">Minimalist</div>
                            </div>
                        </div>

                        <!-- Template 2 -->
                        <div class="template-card" onclick="selectTemplate('creative', this)">
                            <div class="template-preview">
                                <img src="{{ asset('templates/template2.png') }}" alt="Creative Resume Template">
                            </div>
                            <div class="template-info">
                                <div class="template-name">Creative Resume</div>
                                <div class="template-style">Artistic</div>
                            </div>
                        </div>
                    </div>


                    <div class="actions">
                        <a href="/create-portfolio" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="button" class="btn btn-primary" id="preview-btn" onclick="goToPreview()" disabled>
                            <i class="fas fa-eye me-2"></i>Lihat Preview
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let selectedTemplate = '';

        function selectTemplate(templateName, element) {
            // Remove selected class from all cards
            document.querySelectorAll('.template-card').forEach(card => {
                card.classList.remove('selected');
            });

            // Add selected class to clicked card
            element.classList.add('selected');

            selectedTemplate = templateName;
            document.getElementById('preview-btn').disabled = false;

            // Optional: Show selection feedback
            showSelectionFeedback(templateName);
        }

        function showSelectionFeedback(templateName) {
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

            const templateNames = {
                'modern-minimal': 'Modern Minimal',
                'creative-portfolio': 'Creative Portfolio',
                'corporate-professional': 'Corporate Professional'
            };

            feedback.innerHTML = `
                <i class="fas fa-check-circle me-2"></i>
                Template "${templateNames[templateName]}" dipilih!
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

        function goToPreview() {
            if (selectedTemplate) {
                // Simpan template yang dipilih ke session storage atau kirim via URL
                sessionStorage.setItem('selectedTemplate', selectedTemplate);

                // Redirect ke halaman preview
                window.location.href = '/portfolio-preview?template=' + selectedTemplate;
            } else {
                alert('Silakan pilih template terlebih dahulu!');
            }
        }

        // Initialize with any existing selection
        document.addEventListener('DOMContentLoaded', function() {
            const savedTemplate = sessionStorage.getItem('selectedTemplate');
            if (savedTemplate) {
                // Find and select the saved template
                const templateCard = document.querySelector(`[onclick*="${savedTemplate}"]`).parentElement;
                if (templateCard) {
                    templateCard.classList.add('selected');
                    selectedTemplate = savedTemplate;
                    document.getElementById('preview-btn').disabled = false;
                }
            }
        });
    </script>
</body>
</html>


