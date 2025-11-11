<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SIM Portfolio</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    
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
<body class="antialiased bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100 transition-colors duration-500">
    
    <!-- Mobile Overlay -->
    <div id="sidebar-overlay" class="fixed inset-0 bg-black/50 z-30 lg:hidden hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40">
        <div class="p-6">
            <!-- Logo -->
            <div class="flex items-center space-x-3 mb-8">
                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <span class="text-white font-bold text-xl">S</span>
                </div>
                <span class="font-bold text-xl bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    SIM Dashboard
                </span>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('projects.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('projects.*') ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors">
                    <i class="fas fa-project-diagram"></i>
                    <span>Projects</span>
                </a>
                
                <a href="{{ route('certificates.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('certificates.*') ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors">
                    <i class="fas fa-certificate"></i>
                    <span>Certificates</span>
                </a>
                
                <a href="{{ route('sharings.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('sharings.*') ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors">
                    <i class="fas fa-share-alt"></i>
                    <span>Sharing</span>
                </a>
                
                <a href="{{ route('education.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg {{ request()->routeIs('education.*') ? 'bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }} transition-colors">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Education</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-6 left-6 right-6">
                <div class="border-t border-gray-200 dark:border-gray-700 pt-4">
                    <div class="flex items-center space-x-3 mb-3">
                        <img src="{{ asset('pp/WhatsApp Image 2025-11-11 at 16.18.25_8f5ceba0.jpg') }}" 
                             alt="Profile" 
                             class="w-10 h-10 rounded-full object-cover">
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-sm truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email ?? 'admin@sim.com' }}</p>
                        </div>
                    </div>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center space-x-2 px-4 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Bar -->
        <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 sticky top-0 z-30">
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button id="sidebar-toggle" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="fas fa-bars text-gray-600 dark:text-gray-400"></i>
                    </button>
                    
                    <div>
                        <h1 class="text-2xl font-bold">Dashboard</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Selamat datang kembali!</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="hidden md:flex items-center space-x-2 bg-gray-100 dark:bg-gray-700 rounded-lg px-4 py-2">
                        <i class="fas fa-search text-gray-400"></i>
                        <input type="text" placeholder="Search..." class="bg-transparent border-none focus:outline-none text-sm w-64">
                    </div>

                    <!-- Dark Mode Toggle -->
                    <button id="theme-toggle" class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <i class="fas fa-moon dark:hidden text-gray-600"></i>
                        <i class="fas fa-sun hidden dark:inline text-yellow-400"></i>
                    </button>

                    <!-- Notifications -->
                    <button class="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 relative">
                        <i class="fas fa-bell text-gray-600 dark:text-gray-400"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    <!-- Profile -->
                    <a href="/" class="flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                        <i class="fas fa-home text-gray-600 dark:text-gray-400"></i>
                        <span class="text-sm hidden md:inline">View Site</span>
                    </a>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-6">
            <!-- Welcome Message -->
            <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl p-8 text-white mb-6">
                <h2 class="text-3xl font-bold mb-2">Welcome back, Laily! 👋</h2>
                <p class="text-blue-100">Manage your portfolio content from here</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Stat Card 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-project-diagram text-blue-600 dark:text-blue-400 text-xl"></i>
                        </div>
                        <span class="text-xs text-green-500 font-semibold">+12%</span>
                    </div>
                    <h3 class="text-3xl font-bold mb-1">6</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Total Projects</p>
                </div>

                <!-- Stat Card 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-certificate text-purple-600 dark:text-purple-400 text-xl"></i>
                        </div>
                        <span class="text-xs text-green-500 font-semibold">+8%</span>
                    </div>
                    <h3 class="text-3xl font-bold mb-1">6</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Certificates</p>
                </div>

                <!-- Stat Card 3 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-share-alt text-green-600 dark:text-green-400 text-xl"></i>
                        </div>
                        <span class="text-xs text-green-500 font-semibold">+24%</span>
                    </div>
                    <h3 class="text-3xl font-bold mb-1">6</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Sharing Posts</p>
                </div>

                <!-- Stat Card 4 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-eye text-orange-600 dark:text-orange-400 text-xl"></i>
                        </div>
                        <span class="text-xs text-green-500 font-semibold">+156%</span>
                    </div>
                    <h3 class="text-3xl font-bold mb-1">1,234</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">Page Views</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg mb-6">
                <h2 class="text-xl font-bold mb-6">Quick Actions</h2>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('projects.create') }}" class="p-4 bg-gradient-to-br from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all block text-center">
                            <i class="fas fa-plus text-2xl mb-2"></i>
                            <p class="text-sm font-semibold">Add Project</p>
                        </a>

                        <a href="{{ route('certificates.create') }}" class="p-4 bg-gradient-to-br from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all block text-center">
                            <i class="fas fa-certificate text-2xl mb-2"></i>
                            <p class="text-sm font-semibold">Add Certificate</p>
                        </a>

                        <a href="{{ route('sharings.create') }}" class="p-4 bg-gradient-to-br from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all block text-center">
                            <i class="fas fa-pen text-2xl mb-2"></i>
                            <p class="text-sm font-semibold">Write Post</p>
                        </a>

                        <a href="{{ route('education.create') }}" class="p-4 bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all block text-center">
                            <i class="fas fa-graduation-cap text-2xl mb-2"></i>
                            <p class="text-sm font-semibold">Add Education</p>
                        </a>
                    </div>

            </div>

            <!-- Navigation Links -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="{{ route('projects.index') }}" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-project-diagram text-blue-600 dark:text-blue-400 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Manage Projects</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">View and edit all projects</p>
                </a>

                <a href="{{ route('certificates.index') }}" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-certificate text-purple-600 dark:text-purple-400 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Manage Certificates</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">View and edit certificates</p>
                </a>

                <a href="{{ route('sharings.index') }}" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-share-alt text-green-600 dark:text-green-400 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Manage Sharing</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">View and edit sharing posts</p>
                </a>

                <a href="{{ route('education.index') }}" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-xl flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-orange-600 dark:text-orange-400 text-xl"></i>
                        </div>
                        <i class="fas fa-arrow-right text-gray-400"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-1">Manage Education</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">View and edit education history</p>
                </a>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Dark Mode Toggle
            const themeToggle = document.getElementById('theme-toggle');
            const html = document.documentElement;

            if (themeToggle) {
                themeToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const isDark = html.classList.contains('dark');
                    
                    themeToggle.style.transform = 'rotate(360deg)';
                    
                    setTimeout(function() {
                        if (isDark) {
                            // Switch to light mode
                            html.classList.remove('dark');
                            localStorage.setItem('theme', 'light');
                        } else {
                            // Switch to dark mode
                            html.classList.add('dark');
                            localStorage.setItem('theme', 'dark');
                        }
                        
                        themeToggle.style.transform = 'rotate(0deg)';
                    }, 150);
                });
            }

            // Sidebar Toggle for Mobile
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');

            function toggleSidebar() {
                if (sidebar && sidebarOverlay) {
                    sidebar.classList.toggle('-translate-x-full');
                    sidebarOverlay.classList.toggle('hidden');
                }
            }

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }
            
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', toggleSidebar);
            }
            
            // Close sidebar when clicking menu item on mobile
            if (sidebar && window.innerWidth < 1024) {
                const sidebarLinks = sidebar.querySelectorAll('a');
                sidebarLinks.forEach(function(link) {
                    link.addEventListener('click', function() {
                        sidebar.classList.add('-translate-x-full');
                        if (sidebarOverlay) {
                            sidebarOverlay.classList.add('hidden');
                        }
                    });
                });
            }
        }); // End DOMContentLoaded
    </script>
</body>
</html>

