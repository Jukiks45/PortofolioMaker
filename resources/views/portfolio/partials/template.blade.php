<div class="template-container">

    {{-- WIZARD --}}
    <div class="wizard-steps">
        <div class="wizard-step completed">
            <div class="wizard-circle"><i class="fas fa-check" style="font-size:.7rem;"></i></div>
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

    {{-- HEADER --}}
    <div class="form-header">
        <h2><i class="fas fa-palette me-2"></i>Pilih Template Portfolio</h2>
        <p>Pilih template yang paling sesuai dengan gaya dan kebutuhan Anda</p>
    </div>

    {{-- GRID --}}
    <div class="template-grid">
        @foreach($templates as $template)
            <div class="template-card" onclick="selectTemplate({{ $template->id }}, this)">
                <div class="template-preview">
                    <img src="{{ asset('storage/' . $template->image_path) }}" alt="{{ $template->title }}">
                </div>
                <div class="template-info">
                    <div class="template-name">{{ $template->title }}</div>
                    <div class="template-style">{{ $template->category_name }}</div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- ACTIONS --}}
    <div class="actions">
        @auth
        <a href="{{ route('portfolio.create') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
        @else
        <a href="{{ route('guest.portfolio.create') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-2"></i>Kembali
        </a>
        @endauth
        <button type="button" class="btn btn-primary" id="preview-btn" onclick="goToPreview()" disabled>
            <i class="fas fa-eye me-2"></i>Lihat Preview
        </button>
    </div>

</div>

<script>
const routes = { preview: "{{ route('portfolio.preview') }}" };
let selectedTemplate = '';

function selectTemplate(templateId, element) {
    document.querySelectorAll('.template-card').forEach(c => c.classList.remove('selected'));
    element.classList.add('selected');
    selectedTemplate = templateId;
    document.getElementById('preview-btn').disabled = false;

    // Toast feedback
    showToast('Template "' + element.querySelector('.template-name').textContent + '" dipilih!');
}

function showToast(msg) {
    const existing = document.querySelector('.tpl-toast');
    if (existing) existing.remove();

    const t = document.createElement('div');
    t.className = 'tpl-toast';
    Object.assign(t.style, {
        position:'fixed', bottom:'1.5rem', right:'1.5rem',
        background:'#10b981', color:'white',
        padding:'.75rem 1.25rem', borderRadius:'10px',
        boxShadow:'0 4px 16px rgba(16,185,129,.3)',
        fontSize:'.875rem', fontWeight:'600',
        zIndex:'9999', opacity:'0',
        transition:'opacity .25s ease',
        display:'flex', alignItems:'center', gap:'.5rem'
    });
    t.innerHTML = '<i class="fas fa-check-circle"></i> ' + msg;
    document.body.appendChild(t);
    requestAnimationFrame(() => t.style.opacity = '1');
    setTimeout(() => { t.style.opacity = '0'; setTimeout(() => t.remove(), 300); }, 2500);
}

function goToPreview() {
    if (selectedTemplate) {
        sessionStorage.setItem('selectedTemplate', selectedTemplate);
        window.location.href = routes.preview + '?template_id=' + selectedTemplate;
    } else {
        alert('Silakan pilih template terlebih dahulu!');
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const saved = sessionStorage.getItem('selectedTemplate');
    if (saved) {
        const card = document.querySelector('[onclick*="' + saved + '"]');
        if (card) {
            card.classList.add('selected');
            selectedTemplate = saved;
            document.getElementById('preview-btn').disabled = false;
        }
    }
});
</script>
