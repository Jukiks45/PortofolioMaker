<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }} | {{ $job_title }} Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        p_dark: '#0A0F1E',
                        p_brand: '#3B82F6',
                        p_accent: '#A855F7',
                    }
                }
            }
        }
    </script>
    <style>
        body { background-color: #0A0F1E; color: #F1F5F9; }
        .glass {
            background: rgba(17, 24, 39, 0.65);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .text-gradient {
            background: linear-gradient(135deg, #60A5FA 0%, #A855F7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .card-interaction {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-interaction:hover {
            transform: translateY(-6px);
            border-color: rgba(59, 130, 246, 0.5);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
            opacity: 0.15;
        }
    </style>
</head>
<body class="antialiased overflow-x-hidden">

    <div class="blob w-96 h-96 bg-p_brand top-0 left-0"></div>
    <div class="blob w-96 h-96 bg-p_accent bottom-0 right-0"></div>

    <nav class="fixed top-0 left-0 w-full z-50 glass border-b border-white/5">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="#" class="text-2xl font-extrabold tracking-tighter text-white">
                {{ strtoupper(substr($name, 0, 1)) }}<span class="text-p_brand">.</span>
            </a>
            <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-300">
                <a href="#about" class="hover:text-p_brand transition">About</a>
                <a href="#skills" class="hover:text-p_brand transition">Skills</a>
                <a href="#experience" class="hover:text-p_brand transition">Experience</a>
                <a href="#projects" class="hover:text-p_brand transition">Projects</a>
            </div>
            <a href="mailto:{{ $email }}" class="bg-p_brand hover:bg-blue-600 text-white px-6 py-2.5 rounded-full text-xs font-bold transition shadow-lg shadow-p_brand/20">
                CONTACT ME
            </a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 pt-32 md:pt-48">
        
        <section class="flex flex-col items-center text-center mb-32">
            <div class="relative mb-8 group">
                <div class="absolute inset-0 bg-p_brand blur-3xl opacity-20 rounded-full group-hover:opacity-40 transition"></div>
                <img src="{{ $profile_photo ?? 'https://ui-avatars.com/api/?name=' . urlencode($name) }}" alt="{{ $name }}" class="relative w-32 h-32 md:w-40 md:h-40 rounded-3xl object-cover border-2 border-white/10 shadow-2xl rotate-3 hover:rotate-0 transition-transform duration-500">
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold tracking-tighter mb-4">
                {{ $name }}
            </h1>
            <p class="text-xl md:text-2xl text-slate-400 font-light max-w-2xl mb-10">
                {{ $job_title }}
            </p>
            <div class="flex flex-wrap justify-center gap-4 text-sm">
                <span class="glass px-5 py-2.5 rounded-full border-white/5 tracking-wide flex items-center gap-2">
                    <span class="w-2 h-2 bg-p_brand rounded-full animate-pulse"></span>
                    {{ $address }}
                </span>
                <span class="glass px-5 py-2.5 rounded-full border-white/5 tracking-wide flex items-center gap-2">
                    <svg class="w-4 h-4 text-p_brand" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    {{ $email }}
                </span>
            </div>
        </section>

        <section id="about" class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-32 scroll-mt-24">
            <div class="md:col-span-2">
                <h2 class="text-xs uppercase tracking-widest text-p_brand font-bold mb-4">Profil Profesional</h2>
                <p class="text-3xl font-bold text-white mb-6 leading-tight">Mendorong Transformasi Melalui <span class="text-gradient">Manajemen Strategis</span>.</p>
                <p class="text-lg text-slate-400 leading-relaxed font-light mb-8">
                    {{ $about }}
                </p>
            </div>
            <div class="glass p-8 rounded-3xl border-white/10 shadow-xl">
                <h3 class="text-xl font-bold text-white mb-6 border-b border-white/5 pb-2">Pendidikan</h3>
                <div class="space-y-6">

                    @if(!empty($education))
                        @foreach($education as $edu)
                            <div>

                                <p class="text-sm font-bold text-white">
                                    {{ $edu['degree'] }}
                                </p>

                                <p class="text-xs text-p_brand mt-1">
                                    {{ $edu['institution'] }}
                                </p>

                                @if(!empty($edu['field']))
                                    <p class="text-[11px] text-slate-400 mt-1">
                                        {{ $edu['field'] }}
                                    </p>
                                @endif

                                <span class="text-[10px] text-slate-500 uppercase mt-2 block">
                                    {{ $edu['start_year'] }} — {{ $edu['end_year'] ?? 'Present' }}
                                </span>

                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>

        <section id="skills" class="mb-32 scroll-mt-24">
            <h2 class="text-xs uppercase tracking-widest text-p_brand font-bold mb-8 text-center">Technical Proficiency</h2>
            <div class="flex flex-wrap justify-center gap-4">

                @if(!empty($skills))
                    @foreach($skills as $skill)
                        <div class="glass px-8 py-5 rounded-2xl card-interaction border-white/5 text-center min-w-[160px]">
                            
                            <p class="text-white font-bold block mb-1">
                                {{ $skill['name'] }}
                            </p>

                            <span class="text-[10px] font-black uppercase tracking-widest
                                {{ strtolower($skill['level']) == 'ahli' ? 'text-emerald-400' : 'text-p_brand' }}">
                                
                                {{ $skill['level'] }}
                            </span>

                        </div>
                    @endforeach
                @endif

            </div>
        </section>

        <section id="languages" class="mb-32 scroll-mt-24">
            <h2 class="text-xs uppercase tracking-widest text-p_brand font-bold mb-6 text-center">Language Proficiency</h2>
            <div class="flex flex-wrap justify-center gap-3">

            @if(!empty($language))
                @foreach($language as $lang)
                    <span class="glass px-3 py-1 text-xs rounded-lg">
                        {{ $lang }}
                    </span>
                @endforeach
            @endif

            </div>
        </section>

        <section id="experience" class="mb-32 scroll-mt-24">
            <h2 class="text-xs uppercase tracking-widest text-p_brand font-bold mb-12">Riwayat Karier</h2>
            <div class="space-y-8">

            @if(!empty($experience))
                @foreach($experience as $exp)
                    <div class="glass p-8 rounded-3xl card-interaction border-l-4 border-l-p_brand">

                        <div class="flex flex-col md:flex-row justify-between mb-4">
                            
                            <div>
                                <h3 class="text-2xl font-bold text-white">
                                    {{ $exp['position'] }}
                                </h3>

                                <p class="text-p_brand font-medium">
                                    {{ $exp['company'] }}
                                    @if(!empty($exp['location']))
                                        | {{ $exp['location'] }}
                                    @endif
                                </p>
                            </div>

                            <span class="text-slate-500 font-mono text-sm mt-2">
                                {{ $exp['start_date'] }} — {{ $exp['end_date'] ?? 'Present' }}
                            </span>

                        </div>

                        @if(!empty($exp['description']))
                            <p class="text-slate-400 font-light leading-relaxed">
                                {{ $exp['description'] }}
                            </p>
                        @endif

                    </div>
                @endforeach
            @endif

            </div>
        </section>

        <section id="projects" class="mb-32 scroll-mt-24">
            <h2 class="text-xs uppercase tracking-widest text-p_accent font-bold mb-12 text-right">Proyek Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            @if(!empty($projects))
                @foreach($projects as $project)
                    <div class="glass rounded-3xl overflow-hidden group card-interaction">

                        <div class="h-48 bg-gradient-to-br from-p_brand/20 to-p_accent/20 flex items-center justify-center relative">
                            <span class="text-white/10 font-black text-4xl tracking-tighter uppercase">
                                {{ strtoupper(substr($project['name'], 0, 10)) }}
                            </span>
                        </div>

                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-white mb-3 group-hover:text-p_brand transition">
                                {{ $project['name'] }}
                            </h3>

                            <p class="text-slate-400 text-sm mb-6 font-light">
                                {{ $project['description'] }}
                            </p>

                            @if(!empty($project['url']))
                                <a href="{{ $project['url'] }}" target="_blank" class="text-p_brand text-sm font-bold flex items-center gap-2">
                                    View Project
                                </a>
                            @endif
                        </div>

                    </div>
                @endforeach
            @endif

            </div>
        </section>

        <section id="certifications" class="mb-32">
            <h2 class="text-xs uppercase tracking-widest text-p_brand font-bold mb-8">Sertifikasi & Lisensi</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            @if(!empty($certification))
                @foreach($certification as $cert)
                    <div class="glass p-6 rounded-2xl flex items-center gap-4 border-white/5">

                        <div class="w-10 h-10 rounded-xl bg-p_brand/20 flex items-center justify-center">
                            <span class="text-p_brand font-bold">★</span>
                        </div>

                        <p class="text-sm font-semibold text-slate-200">
                            {{ $cert }}
                        </p>

                    </div>
                @endforeach
            @endif

            </div>
        </section>

    </main>

    <footer class="glass border-t border-white/5 py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-3xl font-extrabold tracking-tighter text-white mb-4">{{ strtoupper(substr($name, 0, 1)) }}<span class="text-p_brand">.</span></p>
            <div class="flex flex-wrap justify-center gap-x-8 gap-y-4 text-slate-400 text-sm mb-10">
                <a href="{{ $website }}" class="hover:text-p_brand transition">{{ $website }}</a>
                <a href="mailto:{{ $email }}" class="hover:text-p_brand transition">{{ $email }}</a>
                <span>{{ $phone }}</span>
            </div>
            <p class="text-[10px] text-slate-600 uppercase tracking-[0.2em] mb-4">Executive Portfolio &copy; 2026</p>
            <p class="text-[10px] text-slate-600">Dibuat khusus untuk profil {{ $name }}.</p>
        </div>
    </footer>

</body>
</html>