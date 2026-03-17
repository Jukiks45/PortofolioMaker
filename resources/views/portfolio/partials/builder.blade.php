<div class="form-container">

    {{-- WIZARD --}}
    <div class="wizard-steps">
        <div class="wizard-step active">
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
        <div class="wizard-step">
            <div class="wizard-circle">4</div>
            <p>Download</p>
        </div>
    </div>

    {{-- FORM HEADER --}}
    <div class="form-header">
        <h2><i class="fas fa-user-plus me-2"></i>Buat Portfolio Baru</h2>
        <p>Isi data diri Anda untuk membuat portfolio profesional</p>
    </div>

    <form id="portfolio-form" action="/portfolio-template" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- ===== INFORMASI DASAR ===== --}}
        <div class="form-section">
            <h4><i class="fas fa-user"></i>Informasi Dasar</h4>

            {{-- Foto Profil --}}
            <div class="mb-3">
                <label class="form-label" style="font-size:.82rem;font-weight:700;text-transform:uppercase;letter-spacing:.04em;color:#475569;">
                    Foto Profil
                </label>
                <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*">
                <img id="photo-preview" alt="Photo preview">
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Nama Lengkap" required>
                        <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="job_title" name="job_title"
                            placeholder="Jabatan" required>
                        <label for="job_title">Jabatan / Pekerjaan <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Email" required>
                        <label for="email">Email <span class="text-danger">*</span></label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="phone" name="phone"
                            placeholder="Nomor HP">
                        <label for="phone">Nomor HP</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="location" name="location"
                            placeholder="Lokasi">
                        <label for="location">Lokasi</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="url" class="form-control" id="website" name="website"
                            placeholder="Website">
                        <label for="website">Website / Portfolio URL</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="about" name="about"
                            placeholder="Tentang Saya" style="height:110px;"></textarea>
                        <label for="about">Tentang Saya</label>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== PENDIDIKAN ===== --}}
        <div class="form-section">
            <h4><i class="fas fa-graduation-cap"></i>Pendidikan</h4>
            <div id="education-container">
                <div class="education-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="education_institution[]" placeholder="Institusi">
                                <label>Institusi / Universitas</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="education_degree[]" placeholder="Gelar">
                                <label>Gelar</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="education_field[]" placeholder="Jurusan">
                                <label>Jurusan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" class="form-control" name="education_start_year[]" placeholder="Tahun Mulai">
                                <label>Tahun Mulai</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="number" class="form-control" name="education_end_year[]" placeholder="Tahun Selesai">
                                <label>Tahun Selesai</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="add-item-btn" onclick="addEducation()">
                <i class="fas fa-plus"></i> Tambah Pendidikan
            </button>
        </div>

        {{-- ===== PENGALAMAN KERJA ===== --}}
        <div class="form-section">
            <h4><i class="fas fa-briefcase"></i>Pengalaman Kerja</h4>
            <div id="experience-container">
                <div class="experience-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="experience_company[]" placeholder="Perusahaan">
                                <label>Perusahaan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="experience_position[]" placeholder="Jabatan">
                                <label>Jabatan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="experience_location[]" placeholder="Lokasi">
                                <label>Lokasi</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="month" class="form-control" name="experience_start_date[]" placeholder="Mulai">
                                <label>Tanggal Mulai</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="month" class="form-control" name="experience_end_date[]" placeholder="Selesai">
                                <label>Tanggal Selesai</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="experience_description[]" placeholder="Deskripsi" style="height:90px;"></textarea>
                                <label>Deskripsi Pekerjaan</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="add-item-btn" onclick="addExperience()">
                <i class="fas fa-plus"></i> Tambah Pengalaman
            </button>
        </div>

        {{-- ===== KETERAMPILAN ===== --}}
        <div class="form-section">
            <h4><i class="fas fa-star"></i>Keterampilan</h4>
            <div id="skills-container">
                <div class="skill-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="skill_name[]" placeholder="Nama">
                                <label>Nama Keterampilan</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <select class="form-select" name="skill_level[]">
                                    <option value="Pemula">Pemula</option>
                                    <option value="Menengah">Menengah</option>
                                    <option value="Mahir">Mahir</option>
                                    <option value="Ahli">Ahli</option>
                                </select>
                                <label>Tingkat</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="add-item-btn" onclick="addSkill()">
                <i class="fas fa-plus"></i> Tambah Keterampilan
            </button>
        </div>

        {{-- ===== BAHASA ===== --}}
        <div class="form-section">
            <h4><i class="fas fa-language"></i>Bahasa</h4>
            <div id="language-container">
                <div class="language-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="language[]" placeholder="Bahasa">
                        <label>Nama Bahasa</label>
                    </div>
                </div>
            </div>
            <button type="button" class="add-item-btn" onclick="addLanguage()">
                <i class="fas fa-plus"></i> Tambah Bahasa
            </button>
        </div>

        {{-- ===== SERTIFIKASI ===== --}}
        <div class="form-section">
            <h4><i class="fas fa-certificate"></i>Sertifikasi</h4>
            <div id="certification-container">
                <div class="cert-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="certification[]" placeholder="Nama Sertifikasi">
                        <label>Nama Sertifikasi</label>
                    </div>
                </div>
            </div>
            <button type="button" class="add-item-btn" onclick="addCertification()">
                <i class="fas fa-plus"></i> Tambah Sertifikasi
            </button>
        </div>

        {{-- ===== PROYEK ===== --}}
        <div class="form-section">
            <h4><i class="fas fa-project-diagram"></i>Proyek</h4>
            <div id="projects-container">
                <div class="project-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="project_name[]" placeholder="Nama Proyek">
                                <label>Nama Proyek</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="url" class="form-control" name="project_url[]" placeholder="URL Proyek">
                                <label>URL Proyek</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="project_description[]" placeholder="Deskripsi" style="height:90px;"></textarea>
                                <label>Deskripsi Proyek</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="add-item-btn" onclick="addProject()">
                <i class="fas fa-plus"></i> Tambah Proyek
            </button>
        </div>

        {{-- ===== REFERENSI ===== --}}
        <div class="form-section">
            <h4><i class="fas fa-user-friends"></i>Referensi</h4>
            <div id="reference-container">
                <div class="reference-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="reference_name[]" placeholder="Nama">
                                <label>Nama</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="reference_position[]" placeholder="Jabatan">
                                <label>Jabatan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="reference_company[]" placeholder="Perusahaan">
                                <label>Perusahaan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" name="reference_phone[]" placeholder="No. HP">
                                <label>Nomor HP</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="add-item-btn" onclick="addReference()">
                <i class="fas fa-plus"></i> Tambah Referensi
            </button>
        </div>

        {{-- SUBMIT --}}
        <div class="actions">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-times me-1"></i> Batal
            </a>
            <a href="{{ route('portfolio.template') }}" class="btn btn-primary">
                Selanjutnya: Pilih Template
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>

    </form>
</div>

<script>
// Photo preview
document.getElementById('profile_photo').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const preview = document.getElementById('photo-preview');
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    } else {
        preview.style.display = 'none';
    }
});

// Remove item
function removeItem(btn) {
    const item = btn.closest(
        '.education-item,.experience-item,.skill-item,.project-item,.language-item,.cert-item,.reference-item'
    );
    if (item) item.remove();
}

// Clone helpers
function cloneFirst(containerId) {
    const c = document.getElementById(containerId);
    const clone = c.firstElementChild.cloneNode(true);
    clone.querySelectorAll('input,textarea,select').forEach(el => {
        if (el.tagName !== 'SELECT') el.value = '';
        else el.selectedIndex = 0;
    });
    c.appendChild(clone);
}

function addEducation()     { cloneFirst('education-container'); }
function addExperience()    { cloneFirst('experience-container'); }
function addSkill()         { cloneFirst('skills-container'); }
function addProject()       { cloneFirst('projects-container'); }
function addLanguage()      { cloneFirst('language-container'); }
function addCertification() { cloneFirst('certification-container'); }
function addReference()     { cloneFirst('reference-container'); }
</script>
