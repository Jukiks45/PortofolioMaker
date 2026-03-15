<div class="form-container">
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

    <div class="form-header">
        <h2><i class="fas fa-user-plus me-2"></i>Buat Portfolio Baru</h2>
        <p>Isi data diri Anda untuk membuat portfolio profesional</p>
    </div>


    <form id="portfolio-form" action="/portfolio-template" method="POST" enctype="multipart/form-data">
        <!-- Basic Information -->
        <div class="form-section">
            <h4><i class="fas fa-user me-2"></i>Informasi Dasar</h4>

            <div class="form-floating mb-3">
                <input type="file" class="form-control" id="profile_photo" name="profile_photo"
                    accept="image/*">
                <label for="profile_photo">Foto Profil</label>
            </div>

            <img id="photo-preview"
                style="max-width:120px; display:none; margin-top:10px; border-radius:8px; border:2px solid #e9ecef;">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Nama Lengkap" required>
                        <label for="name">Nama Lengkap</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="job_title" name="job_title"
                            placeholder="Pekerjaan/Jabatan" required>
                        <label for="job_title">Pekerjaan/Jabatan</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="email@example.com" required>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="phone" name="phone"
                            placeholder="+62 812-3456-7890">
                        <label for="phone">Nomor Telepon</label>
                    </div>
                </div>
            </div>

            <div class="form-floating">
                <input type="text" class="form-control" id="location" name="location"
                    placeholder="Lokasi">
                <label for="location">Lokasi</label>
            </div>

            <div class="form-floating">
                <input type="url" class="form-control" id="website" name="website"
                    placeholder="Website / Portfolio">
                <label for="website">Website / Portfolio</label>
            </div>

            <div class="form-floating">
                <textarea class="form-control" id="about" name="about" placeholder="Tentang Saya" style="height: 120px"></textarea>
                <label for="about">Tentang Saya</label>
            </div>
        </div>

        <!-- Education -->
        <div class="form-section">
            <h4><i class="fas fa-graduation-cap me-2"></i>Pendidikan</h4>

            <div id="education-container">
                <div class="education-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    name="education_institution[]" placeholder="Institusi">
                                <label>Institusi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="education_degree[]"
                                    placeholder="Gelar">
                                <label>Gelar</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="education_field[]"
                                    placeholder="Jurusan">
                                <label>Jurusan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control"
                                            name="education_start_year[]" placeholder="Tahun Mulai">
                                        <label>Tahun Mulai</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control"
                                            name="education_end_year[]" placeholder="Tahun Selesai">
                                        <label>Tahun Selesai</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="add-item-btn" onclick="addEducation()">
                <i class="fas fa-plus"></i> Tambah Pendidikan
            </button>
        </div>

        <!-- Experience -->
        <div class="form-section">
            <h4><i class="fas fa-briefcase me-2"></i>Pengalaman Kerja</h4>

            <div id="experience-container">
                <div class="experience-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    name="experience_company[]" placeholder="Perusahaan">
                                <label>Perusahaan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    name="experience_position[]" placeholder="Jabatan">
                                <label>Jabatan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    name="experience_location[]" placeholder="Lokasi">
                                <label>Lokasi</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="month" class="form-control"
                                            name="experience_start_date[]"
                                            placeholder="Tanggal Mulai">
                                        <label>Tanggal Mulai</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="month" class="form-control"
                                            name="experience_end_date[]"
                                            placeholder="Tanggal Selesai">
                                        <label>Tanggal Selesai</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="experience_description[]" placeholder="Deskripsi Pekerjaan"
                            style="height: 100px"></textarea>
                        <label>Deskripsi Pekerjaan</label>
                    </div>
                </div>
            </div>

            <button type="button" class="add-item-btn" onclick="addExperience()">
                <i class="fas fa-plus"></i> Tambah Pengalaman
            </button>
        </div>

        <!-- Skills -->
        <div class="form-section">
            <h4><i class="fas fa-star me-2"></i>Keterampilan</h4>

            <div id="skills-container">
                <div class="skill-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="skill_name[]"
                                    placeholder="Nama Keterampilan">
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
                                <label>Tingkat Keterampilan</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="add-item-btn" onclick="addSkill()">
                <i class="fas fa-plus"></i> Tambah Keterampilan
            </button>
        </div>

        <!-- Language -->
        <div class="form-section">
            <h4><i class="fas fa-language me-2"></i>Bahasa</h4>

            <div id="language-container">
                <div class="language-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="language[]"
                            placeholder="Nama Bahasa">
                        <label>Nama Bahasa</label>
                    </div>
                </div>
            </div>

            <button type="button" class="add-item-btn" onclick="addLanguage()">
                <i class="fas fa-plus"></i> Tambah Bahasa
            </button>
        </div>

        <!-- Certification -->
        <div class="form-section">
            <h4><i class="fas fa-certificate me-2"></i>Sertifikasi</h4>

            <div id="certification-container">
                <div class="cert-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="certification[]"
                            placeholder="Nama Sertifikasi">
                        <label>Nama Sertifikasi</label>
                    </div>
                </div>
            </div>

            <button type="button" class="add-item-btn" onclick="addCertification()">
                <i class="fas fa-plus"></i> Tambah Sertifikasi
            </button>
        </div>

        <!-- Reference -->
        <div class="form-section">
            <h4><i class="fas fa-user-friends me-2"></i>Referensi</h4>

            <div id="reference-container">
                <div class="reference-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="reference_name[]"
                                    placeholder="Nama">
                                <label>Nama</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"
                                    name="reference_position[]" placeholder="Jabatan">
                                <label>Jabatan</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="reference_company[]"
                                    placeholder="Perusahaan">
                                <label>Perusahaan</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="tel" class="form-control" name="reference_phone[]"
                                    placeholder="Nomor Telepon">
                                <label>Nomor Telepon</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="button" class="add-item-btn" onclick="addReference()">
                <i class="fas fa-plus"></i> Tambah Referensi
            </button>
        </div>

        <!-- Projects -->
        <div class="form-section">
            <h4><i class="fas fa-project-diagram me-2"></i>Proyek</h4>

            <div id="projects-container">
                <div class="project-item">
                    <button type="button" class="remove-item" onclick="removeItem(this)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="project_name[]"
                                    placeholder="Nama Proyek">
                                <label>Nama Proyek</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="url" class="form-control" name="project_url[]"
                                    placeholder="URL Proyek">
                                <label>URL Proyek</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" name="project_description[]" placeholder="Deskripsi Proyek" style="height: 120px"></textarea>
                        <label>Deskripsi Proyek</label>
                    </div>
                </div>
            </div>

            <button type="button" class="add-item-btn" onclick="addProject()">
                <i class="fas fa-plus"></i> Tambah Proyek
            </button>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('portfolio.template') }}" class="btn btn-primary btn-lg">
                Selanjutnya: Pilih Template
                <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        {{-- <button type="submit" class="btn btn-primary btn-lg">
            Selanjutnya: Pilih Template <i class="fas fa-arrow-right ms-2"></i>
        </button> --}}
    </form>
</div>

<script>
    // Form validation
    document.getElementById('portfolio-form').addEventListener('submit', function(e) {
        const requiredFields = this.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');
            } else {
                field.classList.remove('is-invalid');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Harap lengkapi semua field yang wajib diisi.');
        }
    });

    // Dynamic form functions
    function addEducation() {
        const container = document.getElementById('education-container');
        const newItem = container.firstElementChild.cloneNode(true);

        // Clear values
        newItem.querySelectorAll('input').forEach(input => input.value = '');

        container.appendChild(newItem);
    }

    function addExperience() {
        const container = document.getElementById('experience-container');
        const newItem = container.firstElementChild.cloneNode(true);

        // Clear values
        newItem.querySelectorAll('input, textarea').forEach(input => input.value = '');

        container.appendChild(newItem);
    }

    function addSkill() {
        const container = document.getElementById('skills-container');
        const newItem = container.firstElementChild.cloneNode(true);

        // Clear values
        newItem.querySelectorAll('input').forEach(input => input.value = '');

        container.appendChild(newItem);
    }

    function addProject() {
        const container = document.getElementById('projects-container');
        const newItem = container.firstElementChild.cloneNode(true);

        // Clear values
        newItem.querySelectorAll('input, textarea').forEach(input => input.value = '');

        container.appendChild(newItem);
    }

    function addLanguage() {
        const container = document.getElementById('language-container');
        const newItem = container.firstElementChild.cloneNode(true);

        // Clear values
        newItem.querySelectorAll('input').forEach(input => input.value = '');

        container.appendChild(newItem);
    }

    function addCertification() {
        const container = document.getElementById('certification-container');
        const newItem = container.firstElementChild.cloneNode(true);

        // Clear values
        newItem.querySelectorAll('input').forEach(input => input.value = '');

        container.appendChild(newItem);
    }

    function addReference() {
        const container = document.getElementById('reference-container');
        const newItem = container.firstElementChild.cloneNode(true);

        // Clear values
        newItem.querySelectorAll('input').forEach(input => input.value = '');

        container.appendChild(newItem);
    }

    // Preview foto
    document.getElementById('profile_photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('photo-preview');

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.style.display = 'none';
        }
    });

    function removeItem(button) {
        const item = button.closest(
            '.education-item, .experience-item, .skill-item, .project-item, .language-item, .cert-item, .reference-item'
            );
        item.remove();
    }
</script>
