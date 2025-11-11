<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portofolio - SIM Manajemen</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|poppins:400,500,600,700" rel="stylesheet" />
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Dark Mode Init -->
    <script>
        (function() {
            const theme = localStorage.getItem('theme');
            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else if (theme === 'light') {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
</head>
<body class="antialiased bg-gradient-to-br from-white via-gray-50 to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-950 text-gray-900 dark:text-gray-100 transition-colors duration-500">
    
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white dark:bg-gray-900 shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <span class="font-bold text-xl text-gray-800 dark:text-white">
                        Web Portfolio
                    </span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="#biodata" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 font-medium">Biodata</a>
                    <a href="#projects" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 font-medium">Projects</a>
                    <a href="#certificates" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 font-medium">Certificates</a>
                    <a href="#sharing" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 font-medium">Sharing</a>
                    <a href="/login" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 font-medium">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    
                    <!-- Dark Mode Toggle Desktop -->
                    <button onclick="toggleDarkMode()" class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">
                        <i id="theme-icon-desktop" class="fas fa-moon text-gray-700 dark:text-yellow-400"></i>
                    </button>
                </div>
                
                <!-- Mobile Right Section -->
                <div class="flex md:hidden items-center space-x-3">
                    <!-- Dark Mode Toggle Mobile -->
                    <button onclick="toggleDarkMode()" class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700">
                        <i id="theme-icon-mobile" class="fas fa-moon text-gray-700 dark:text-yellow-400 text-lg"></i>
                    </button>
                    
                    <!-- Hamburger Button -->
                    <button onclick="openSidebar()" class="p-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- MOBILE SIDEBAR - SLIDE FROM LEFT -->
    <!-- Overlay/Backdrop -->
    <div id="sidebar-overlay" onclick="closeSidebar()" class="fixed inset-0 bg-black/50 z-[60] transition-opacity duration-300" style="display: none; opacity: 0;"></div>
    
    <!-- Sidebar Menu -->
    <div id="mobile-sidebar" class="fixed top-0 left-0 h-full w-72 bg-white dark:bg-gray-900 shadow-2xl z-[70] transform -translate-x-full transition-transform duration-300">
        <!-- Sidebar Header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Menu</h2>
            <button onclick="closeSidebar()" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                <svg class="w-6 h-6 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <!-- Sidebar Content -->
        <div class="p-4 space-y-2">
            <a href="#biodata" onclick="closeSidebar()" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-800 transition-colors group">
                <i class="fas fa-user text-blue-600 dark:text-blue-400 text-lg w-6"></i>
                <span class="font-medium">Biodata</span>
            </a>
            
            <a href="#projects" onclick="closeSidebar()" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-800 transition-colors group">
                <i class="fas fa-project-diagram text-blue-600 dark:text-blue-400 text-lg w-6"></i>
                <span class="font-medium">Projects</span>
            </a>
            
            <a href="#certificates" onclick="closeSidebar()" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-800 transition-colors group">
                <i class="fas fa-certificate text-blue-600 dark:text-blue-400 text-lg w-6"></i>
                <span class="font-medium">Certificates</span>
            </a>
            
            <a href="#sharing" onclick="closeSidebar()" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-800 transition-colors group">
                <i class="fas fa-share-alt text-blue-600 dark:text-blue-400 text-lg w-6"></i>
                <span class="font-medium">Sharing</span>
            </a>
            
            <div class="border-t border-gray-200 dark:border-gray-700 my-4"></div>
            
            <a href="/login" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-gray-800 transition-colors group">
                <i class="fas fa-sign-in-alt text-blue-600 dark:text-blue-400 text-lg w-6"></i>
                <span class="font-medium">Login</span>
            </a>
        </div>
    </div>
    
    <script>
        // ========== DARK MODE - PERMANENT ==========
        function toggleDarkMode() {
            const html = document.documentElement;
            const isDark = html.classList.contains('dark');
            
            if (isDark) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            
            updateThemeIcons();
        }
        
        function updateThemeIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            const iconDesktop = document.getElementById('theme-icon-desktop');
            const iconMobile = document.getElementById('theme-icon-mobile');
            
            if (isDark) {
                iconDesktop.classList.remove('fa-moon');
                iconDesktop.classList.add('fa-sun');
                iconMobile.classList.remove('fa-moon');
                iconMobile.classList.add('fa-sun');
            } else {
                iconDesktop.classList.remove('fa-sun');
                iconDesktop.classList.add('fa-moon');
                iconMobile.classList.remove('fa-sun');
                iconMobile.classList.add('fa-moon');
            }
        }
        
        // Load theme on page load
        (function() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.documentElement.classList.add('dark');
            } else if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
            }
        })();
        
        // Update icons when page loads
        window.addEventListener('DOMContentLoaded', updateThemeIcons);
        
        // ========== MOBILE SIDEBAR ==========
        function openSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            // Show overlay
            overlay.style.display = 'block';
            setTimeout(() => {
                overlay.style.opacity = '1';
            }, 10);
            
            // Slide in sidebar
            setTimeout(() => {
                sidebar.style.transform = 'translateX(0)';
            }, 10);
            
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
        }
        
        function closeSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            // Slide out sidebar
            sidebar.style.transform = 'translateX(-100%)';
            
            // Hide overlay
            overlay.style.opacity = '0';
            setTimeout(() => {
                overlay.style.display = 'none';
            }, 300);
            
            // Enable body scroll
            document.body.style.overflow = '';
        }
    </script>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8" id="biodata">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Profile Info -->
                <div class="space-y-6 animate-slide-in-left">
                    <div class="inline-block px-4 py-2 bg-blue-100 dark:bg-blue-900/30 rounded-full text-blue-600 dark:text-blue-400 text-sm font-semibold animate-bounce-slow">
                        <i class="fas fa-graduation-cap mr-2"></i>Web Portofolio
                    </div>
                    
                    <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                        <span class="bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent animate-gradient">
                            Laily Charles Febriana
                        </span>
                    </h1>
                    
                    <p class="text-xl text-gray-600 dark:text-gray-400 leading-relaxed">
                        Mahasiswa Teknik Sipil Universitas UPN Veteran Jawa Timur 
                    </p>
                    
                    <!-- Contact Info -->
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 text-gray-700 dark:text-gray-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <span class="text-sm md:text-base break-all">23032010040@student.upnjatim.ac.id</span>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-700 dark:text-gray-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-phone text-white"></i>
                            </div>
                            <span>085706795172</span>
                        </div>
                        <div class="flex items-center space-x-3 text-gray-700 dark:text-gray-300">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <span>Balongbendo, Sidoarjo</span>
                        </div>
                    </div>
                    
                    <!-- Social Media -->
                    <div class="flex space-x-4 pt-4">
                        <a href="https://instagram.com/lailycf" target="_blank" class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-600 rounded-lg flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg hover:shadow-xl group relative" title="Instagram @lailycf">
                            <i class="fab fa-instagram text-white text-xl"></i>
                            <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">@lailycf</span>
                        </a>
                        <a href="https://tiktok.com/@laily" target="_blank" class="w-12 h-12 bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg hover:shadow-xl group relative" title="TikTok @laily">
                            <i class="fab fa-tiktok text-white text-xl"></i>
                            <span class="absolute -bottom-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">@laily</span>
                        </a>
                    </div>
                    
                    <!-- Optional Info -->
                    <div class="pt-6 space-y-4 border-t border-gray-200 dark:border-gray-700">
                        <h3 class="font-semibold text-lg">
                            <i class="fas fa-heart text-red-500 mr-2"></i>Hobi
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">Membaca, Memasak, Mendaki Gunung dan Travelling </p>
                        
                        <h3 class="font-semibold text-lg mt-4">
                            <i class="fas fa-star text-yellow-500 mr-2"></i>Cita-cita
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">Menjadi Tenaga Ahli di bidang Teknik Sipil </p>
                    </div>
                </div>
                
                <!-- Profile Image -->
                <div class="relative animate-slide-in-right">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 rounded-3xl transform rotate-6 blur-2xl opacity-30 animate-pulse-slow"></div>
                    <div class="relative bg-white dark:bg-gray-800 rounded-3xl p-2 shadow-2xl">
                        <img src="{{ asset('pp/WhatsApp Image 2025-11-11 at 16.18.25_8f5ceba0.jpg') }}" 
                             alt="Profile Photo" 
                             class="w-full h-auto rounded-2xl object-cover shadow-xl">
                    </div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute -top-6 -right-6 w-24 h-24 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-xl animate-float">
                        <i class="fas fa-code text-white text-3xl"></i>
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-gradient-to-br from-green-400 to-emerald-500 rounded-2xl flex items-center justify-center shadow-xl animate-float-delayed">
                        <i class="fas fa-laptop-code text-white text-3xl"></i>
                    </div>
                </div>
            </div>
            
            <!-- Riwayat Pendidikan -->
            <div class="mt-20 animate-fade-in-up" style="animation-delay: 0.3s;">
                <h2 class="text-3xl font-bold mb-8 text-center">
                    <i class="fas fa-user-graduate mr-3 text-blue-600"></i>Riwayat Pendidikan
                </h2>
                @if($education->count() > 0)
                    <div class="grid md:grid-cols-3 gap-6">
                        @php
                            $colors = [
                                'SD' => ['from-blue-500', 'to-blue-600', 'fa-school'],
                                'SMP' => ['from-purple-500', 'to-purple-600', 'fa-book'],
                                'SMA' => ['from-pink-500', 'to-pink-600', 'fa-graduation-cap'],
                                'Universitas' => ['from-green-500', 'to-green-600', 'fa-university']
                            ];
                        @endphp
                        @foreach($education as $edu)
                            @php
                                $color = $colors[$edu->tingkat] ?? ['from-gray-500', 'to-gray-600', 'fa-school'];
                            @endphp
                            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                                <div class="w-16 h-16 bg-gradient-to-br {{ $color[0] }} {{ $color[1] }} rounded-xl flex items-center justify-center mb-4">
                                    <i class="fas {{ $color[2] }} text-white text-2xl"></i>
                                </div>
                                <h3 class="font-bold text-xl mb-2">{{ $edu->institusi }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-2">{{ $edu->tahun_mulai }} - {{ $edu->tahun_selesai }}</p>
                                @if($edu->keterangan)
                                    <p class="text-sm text-gray-500 dark:text-gray-500">{{ $edu->keterangan }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-2xl">
                        <i class="fas fa-graduation-cap text-gray-400 text-6xl mb-4"></i>
                        <p class="text-gray-600 dark:text-gray-400">Belum ada riwayat pendidikan</p>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-800/50" id="projects">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        <i class="fas fa-project-diagram mr-3"></i>Projects
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">Daftar project yang pernah dikerjakan</p>
            </div>
            
            @if($projects->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($projects as $project)
                        <div class="project-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            @if($project->dokumentasi)
                                <div class="h-48 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                    <img src="{{ asset('storage/'.$project->dokumentasi) }}" alt="{{ $project->judul }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                    <i class="fas fa-project-diagram text-white text-6xl"></i>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-center justify-between mb-2">
                                    <h3 class="font-bold text-xl">{{ $project->judul }}</h3>
                                    @if($project->status)
                                        <span class="px-3 py-1 {{ $project->status == 'completed' ? 'bg-green-100 dark:bg-green-900/30 text-green-600' : 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600' }} rounded-full text-xs">
                                            {{ ucfirst($project->status) }}
                                        </span>
                                    @endif
                                </div>
                                <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 mb-3">
                                    <i class="fas fa-calendar mr-2"></i>
                                    <span>{{ $project->durasi }}</span>
                                </div>
                                <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">{{ $project->deskripsi }}</p>
                                @if($project->tech_stack && count($project->tech_stack) > 0)
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @foreach($project->tech_stack as $tech)
                                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-sm">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-2xl">
                    <i class="fas fa-folder-open text-gray-400 text-6xl mb-4"></i>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Belum ada project</p>
                    <p class="text-sm text-gray-500">Tambahkan project melalui dashboard admin</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Certificates Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8" id="certificates">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                        <i class="fas fa-certificate mr-3"></i>Certificates
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">Sertifikat yang telah diperoleh</p>
            </div>
            
            @if($certificates->count() > 0)
                <div class="grid md:grid-cols-2 gap-8">
                    @php
                        $borderColors = ['border-blue-500', 'border-green-500', 'border-purple-500', 'border-pink-500', 'border-orange-500', 'border-indigo-500'];
                        $iconColors = [
                            ['from-blue-500', 'to-blue-600'],
                            ['from-green-500', 'to-green-600'],
                            ['from-purple-500', 'to-purple-600'],
                            ['from-pink-500', 'to-pink-600'],
                            ['from-orange-500', 'to-orange-600'],
                            ['from-indigo-500', 'to-indigo-600']
                        ];
                    @endphp
                    @foreach($certificates as $index => $certificate)
                        @php
                            $borderColor = $borderColors[$index % count($borderColors)];
                            $iconColor = $iconColors[$index % count($iconColors)];
                        @endphp
                        <div class="certificate-card bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border-l-4 {{ $borderColor }}">
                            <div class="flex items-start space-x-4">
                                <div class="w-16 h-16 bg-gradient-to-br {{ $iconColor[0] }} {{ $iconColor[1] }} rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-award text-white text-2xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-xl mb-2">{{ $certificate->judul }}</h3>
                                    @if($certificate->penerbit)
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                                            <i class="fas fa-building mr-2"></i>{{ $certificate->penerbit }}
                                        </p>
                                    @endif
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                        <i class="fas fa-calendar mr-2"></i>Diperoleh: {{ \Carbon\Carbon::parse($certificate->tanggal_perolehan)->format('F Y') }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        @if($certificate->certificate_id)
                                            <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-sm">
                                                ID: {{ $certificate->certificate_id }}
                                            </span>
                                        @endif
                                        @if($certificate->bukti_sertifikat)
                                            <a href="{{ asset('storage/'.$certificate->bukti_sertifikat) }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline text-sm">
                                                <i class="fas fa-file-pdf mr-1"></i>Lihat Sertifikat
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-2xl">
                    <i class="fas fa-certificate text-gray-400 text-6xl mb-4"></i>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Belum ada sertifikat</p>
                    <p class="text-sm text-gray-500">Tambahkan sertifikat melalui dashboard admin</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Sharing Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gray-50 dark:bg-gray-800/50" id="sharing">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">
                    <span class="bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">
                        <i class="fas fa-share-alt mr-3"></i>Sharing
                    </span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">Tips, Tutorial, dan Informasi Bermanfaat</p>
            </div>
            
            @if($sharings->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @php
                        $categoryColors = [
                            'Tutorial' => ['bg' => 'from-blue-500 to-cyan-600', 'badge' => 'bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400', 'icon' => 'fa-book-open'],
                            'Tips' => ['bg' => 'from-orange-500 to-red-600', 'badge' => 'bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400', 'icon' => 'fa-lightbulb'],
                            'Informasi' => ['bg' => 'from-indigo-500 to-purple-600', 'badge' => 'bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400', 'icon' => 'fa-info-circle'],
                            'Rekomendasi' => ['bg' => 'from-purple-500 to-pink-600', 'badge' => 'bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400', 'icon' => 'fa-star']
                        ];
                    @endphp
                    @foreach($sharings as $sharing)
                        @php
                            $catStyle = $categoryColors[$sharing->kategori] ?? ['bg' => 'from-gray-500 to-gray-600', 'badge' => 'bg-gray-100 dark:bg-gray-900/30 text-gray-600 dark:text-gray-400', 'icon' => 'fa-share-alt'];
                        @endphp
                        <div class="sharing-card bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            @if($sharing->foto)
                                <div class="h-48 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                    <img src="{{ asset('storage/'.$sharing->foto) }}" alt="{{ $sharing->judul }}" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="h-48 bg-gradient-to-br {{ $catStyle['bg'] }} flex items-center justify-center">
                                    <i class="fas {{ $catStyle['icon'] }} text-white text-6xl"></i>
                                </div>
                            @endif
                            <div class="p-6">
                                <span class="px-3 py-1 {{ $catStyle['badge'] }} rounded-full text-sm">{{ $sharing->kategori }}</span>
                                <h3 class="font-bold text-xl mt-4 mb-3">{{ $sharing->judul }}</h3>
                                <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                                    {{ $sharing->deskripsi }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-2xl">
                    <i class="fas fa-share-alt text-gray-400 text-6xl mb-4"></i>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">Belum ada konten sharing</p>
                    <p class="text-sm text-gray-500">Tambahkan konten sharing melalui dashboard admin</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">S</span>
                        </div>
                        <span class="font-bold text-xl">SIM Portfolio</span>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Sistem Informasi Manajemen 2025 - Web Portfolio Project
                    </p>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <div class="space-y-2">
                        <a href="#biodata" class="block text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Biodata</a>
                        <a href="#projects" class="block text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Projects</a>
                        <a href="#certificates" class="block text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Certificates</a>
                        <a href="#sharing" class="block text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">Sharing</a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-bold mb-4">Connect With Me</h4>
                    <div class="flex space-x-3">
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center hover:scale-110 transition-transform">
                            <i class="fab fa-linkedin text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:scale-110 transition-transform">
                            <i class="fab fa-github text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-pink-600 rounded-lg flex items-center justify-center hover:scale-110 transition-transform">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-400 rounded-lg flex items-center justify-center hover:scale-110 transition-transform">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-200 dark:border-gray-700 pt-8 text-center text-gray-600 dark:text-gray-400">
                <p>&copy; 2025 SIM Portfolio. Made with <i class="fas fa-heart text-red-500"></i> for Project Individu.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scroll-top" class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 opacity-0 pointer-events-none transform translate-y-4">
        <i class="fas fa-arrow-up text-white"></i>
    </button>

    <script>
        // Scroll to Top Button
        const scrollTopBtn = document.getElementById('scroll-top');
        
        if (scrollTopBtn) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4');
                    scrollTopBtn.classList.add('opacity-100');
                } else {
                    scrollTopBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
                    scrollTopBtn.classList.remove('opacity-100');
                }
            });
            
            scrollTopBtn.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    closeMobileMenu();
                }
            });
        });
    </script>

</body>
</html>
