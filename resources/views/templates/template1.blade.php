<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume {{ $data['name'] ?? 'Portfolio' }}</title>
    <style>
        /* Konfigurasi Dasar & Reset */
        :root {
            --dark-blue: #333c4d;
            --sidebar-color: #333c4d;
            --light-text: #ffffff;
            --dark-text: #333333;
            --accent-gray: #f2f2f2;
        }

        * {
            box-sizing: border-box;
            -webkit-print-color-adjust: exact;
        }

        body {
            background-color: #e0e0e0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Ukuran A4 */
        .a4-page {
            width: 210mm;
            height: 297mm;
            background-color: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            position: relative;
        }

        /* Header Section */
        .header {
            display: flex;
            align-items: center;
            padding: 30px 50px;
            height: 180px;
        }

        .profile-img-container {
            background-color: var(--dark-blue);
            width: 160px;
            height: 160px;
            border-radius: 0 0 80px 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-right: 40px;
            position: absolute;
            top: 0;
            left: 0;
        }

        .profile-img {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            margin-top: 10px;
        }

        .header-text {
            margin-left: 180px;
            margin-top: 20px;
        }

        .header-text h1 {
            margin: 0;
            font-size: 36px;
            font-weight: bold;
            color: var(--dark-blue);
            letter-spacing: 2px;
        }

        .job-title {
            margin: 5px 0 0 0;
            letter-spacing: 5px;
            color: #777;
            font-size: 16px;
            text-transform: uppercase;
        }

        /* Contact Bar */
        .contact-bar {
            background-color: var(--dark-blue);
            color: white;
            display: flex;
            justify-content: space-between;
            padding: 12px 30px;
            font-size: 11px;
            border-radius: 50px;
            margin: 0 40px 20px 40px;
        }

        /* Main Container */
        .main-container {
            display: flex;
            flex-grow: 1;
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--sidebar-color);
            color: white;
            width: 35%;
            padding: 40px 30px;
            border-radius: 0 60px 0 0;
        }

        .sidebar section {
            margin-bottom: 35px;
        }

        .sidebar h3 {
            border-bottom: 1.5px solid white;
            padding-bottom: 8px;
            font-size: 18px;
            text-transform: uppercase;
            margin-bottom: 15px;
        }

        .sidebar .item {
            margin-bottom: 15px;
            font-size: 13px;
            line-height: 1.4;
        }

        .sidebar ul {
            padding-left: 15px;
            font-size: 13px;
        }

        .sidebar p {
            margin: 5px 0;
            font-size: 13px;
        }

        /* Main Content */
        .content {
            width: 65%;
            padding: 20px 40px 40px 40px;
            color: var(--dark-text);
        }

        .content section {
            margin-bottom: 30px;
        }

        .content h2 {
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
            font-size: 20px;
            text-transform: uppercase;
            color: var(--dark-blue);
            margin-bottom: 15px;
        }

        .content p {
            font-size: 13px;
            line-height: 1.6;
            color: #555;
        }

        .exp-item {
            margin-bottom: 20px;
        }

        .exp-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .company {
            font-style: italic;
            color: #777;
            margin-bottom: 5px;
        }

        .ref-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            font-size: 12px;
        }

        /* Utility */
        .bold { font-weight: bold; color: #000; }
        .white-bold { font-weight: bold; color: #fff; }

        /* Print Optimization */
        @media print {
            body { background: none; padding: 0; }
            .a4-page { box-shadow: none; margin: 0; }
            .contact-bar { -webkit-print-color-adjust: exact; }
        }
    </style>
</head>
<body>

    <div class="a4-page">
        <div class="profile-img-container">
            @if(!empty($data['profile_photo']))
                <img src="{{ asset('storage/' . $data['profile_photo']) }}" alt="{{ $data['name'] ?? 'Profile' }}" class="profile-img">
            @else
                <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=150" alt="Default Profile" class="profile-img">
            @endif
        </div>

        <header class="header">
            <div class="header-text">
                <h1>{{ $data['name'] ?? 'Nama Lengkap' }}</h1>
                <p class="job-title">{{ $data['job_title'] ?? 'Jabatan / Pekerjaan' }}</p>
            </div>
        </header>

        <div class="contact-bar">
            <span>📞 {{ $data['phone'] ?? '-' }}</span>
            <span>📧 {{ $data['email'] ?? '-' }}</span>
            <span>🌐 {{ $data['website'] ?? '-' }}</span>
            <span>📍 {{ $data['location'] ?? '-' }}</span>
        </div>

        <div class="main-container">
            <aside class="sidebar">
                <section>
                    <h3>Education</h3>
                    @if(!empty($data['education_institution']))
                        @foreach($data['education_institution'] as $index => $institution)
                            <div class="item">
                                <p class="white-bold">{{ $data['education_degree'][$index] ?? 'Gelar' }}</p>
                                <p>{{ $institution }}</p>
                                <p>{{ $data['education_field'][$index] ?? 'Jurusan' }} - {{ $data['education_start_year'][$index] ?? '' }} - {{ $data['education_end_year'][$index] ?? '' }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="item">
                            <p class="white-bold">-</p>
                            <p>-</p>
                            <p>-</p>
                        </div>
                    @endif
                </section>

                <section>
                    <h3>Certifications</h3>
                    @if(!empty($data['certification']))
                        <ul>
                            @foreach($data['certification'] as $cert)
                                <li>{{ $cert }}</li>
                            @endforeach
                        </ul>
                    @else
                        <ul>
                            <li>-</li>
                        </ul>
                    @endif
                </section>

                <section>
                    <h3>Skills</h3>
                    @if(!empty($data['skill_name']))
                        @foreach($data['skill_name'] as $index => $skill)
                            <p>{{ $skill }} - {{ $data['skill_level'][$index] ?? 'Pemula' }}</p>
                        @endforeach
                    @else
                        <p>-</p>
                    @endif
                </section>

                <section>
                    <h3>Language</h3>
                    @if(!empty($data['language']))
                        @foreach($data['language'] as $lang)
                            <p>{{ $lang }}</p>
                        @endforeach
                    @else
                        <p>-</p>
                    @endif
                </section>
            </aside>

            <main class="content">
                <section>
                    <h2>About me</h2>
                    <p>{{ $data['about'] ?? 'Tentang saya...' }}</p>
                </section>

                <section>
                    <h2>Experience</h2>
                    @if(!empty($data['experience_company']))
                        @foreach($data['experience_company'] as $index => $company)
                            <div class="exp-item">
                                <div class="exp-header">
                                    <span class="bold">{{ $data['experience_position'][$index] ?? 'Jabatan' }}</span>
                                    <span class="small">{{ $data['experience_start_date'][$index] ?? '' }} - {{ $data['experience_end_date'][$index] ?? '' }}</span>
                                </div>
                                <p class="company">{{ $company }}</p>
                                <p>{{ $data['experience_description'][$index] ?? 'Deskripsi pekerjaan...' }}</p>
                            </div>
                        @endforeach
                    @else
                        <div class="exp-item">
                            <div class="exp-header">
                                <span class="bold">-</span>
                                <span class="small">-</span>
                            </div>
                            <p class="company">-</p>
                            <p>-</p>
                        </div>
                    @endif
                </section>

                <section>
                    <h2>Reference</h2>
                    @if(!empty($data['reference_name']))
                        <div class="ref-grid">
                            @foreach($data['reference_name'] as $index => $name)
                                <div>
                                    <p class="bold">{{ $name }} | {{ $data['reference_position'][$index] ?? 'Jabatan' }}</p>
                                    <p>{{ $data['reference_company'][$index] ?? 'Perusahaan' }}</p>
                                    <p>{{ $data['reference_phone'][$index] ?? '-' }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="ref-grid">
                            <div>
                                <p class="bold">-</p>
                                <p>-</p>
                                <p>-</p>
                            </div>
                        </div>
                    @endif
                </section>
            </main>
        </div>
    </div>

</body>
</html>
