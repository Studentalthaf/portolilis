<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SIM Portfolio</title>
    
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
<body class="antialiased bg-gradient-to-br from-white via-gray-50 to-blue-50 dark:from-gray-900 dark:via-gray-800 dark:to-blue-950 text-gray-900 dark:text-gray-100 min-h-screen flex items-center justify-center transition-colors duration-500 p-4">
    
    <!-- Top Bar - Responsive -->
    <div class="fixed top-0 left-0 right-0 z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm border-b border-gray-200 dark:border-gray-700 md:bg-transparent md:backdrop-blur-none md:border-0">
        <div class="max-w-7xl mx-auto px-4 py-3 md:py-4 flex justify-between items-center">
            <!-- Back to Home -->
            <a href="/" class="inline-flex items-center space-x-2 px-3 py-2 md:px-4 rounded-lg bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-all text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400">
                <i class="fas fa-arrow-left text-sm md:text-base"></i>
                <span class="text-sm md:text-base">Kembali</span>
            </a>
            
            <!-- Dark Mode Toggle -->
            <button onclick="toggleDarkMode()" class="p-2 md:p-3 rounded-full bg-white dark:bg-gray-800 shadow-lg hover:shadow-xl transition-all">
                <i id="theme-icon" class="fas fa-moon text-gray-700 dark:text-yellow-400 text-lg md:text-xl"></i>
            </button>
        </div>
    </div>

    <div class="w-full max-w-md px-4 md:px-6 mt-20 md:mt-0">
        <!-- Login Card -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl p-8 space-y-8 animate-fade-in">
            <!-- Logo & Title -->
            <div class="text-center space-y-4">
                <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl shadow-lg transform hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-lock text-white text-3xl"></i>
                </div>
                
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                        Selamat Datang
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Login untuk mengakses dashboard
                    </p>
                </div>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-xl p-4 animate-slide-in-left">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-exclamation-circle text-red-500 mt-0.5"></i>
                        <div class="flex-1">
                            <h3 class="font-semibold text-red-800 dark:text-red-200">Login Gagal</h3>
                            @foreach ($errors->all() as $error)
                                <p class="text-sm text-red-600 dark:text-red-300 mt-1">{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Input -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                        <i class="fas fa-envelope mr-2 text-blue-500"></i>Email
                    </label>
                    <div class="relative">
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}"
                            required 
                            autofocus
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                            placeholder="nama@example.com"
                        >
                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">
                        <i class="fas fa-lock mr-2 text-purple-500"></i>Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            required
                            class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all duration-300 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                            placeholder="••••••••"
                        >
                        <button 
                            type="button" 
                            onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors"
                        >
                            <i class="fas fa-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input 
                            type="checkbox" 
                            name="remember"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        >
                        <span class="text-sm text-gray-600 dark:text-gray-400">Ingat saya</span>
                    </label>
                    
                    <a href="#" class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                        Lupa password?
                    </a>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="w-full py-3 px-6 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center justify-center space-x-2"
                >
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                </button>
            </form>

            <!-- Demo Credentials -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-xl p-4 space-y-2">
                    <div class="flex items-center space-x-2 text-blue-600 dark:text-blue-400">
                        <i class="fas fa-info-circle"></i>
                        <span class="font-semibold text-sm">Demo Credentials</span>
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                        <p><strong>Email:</strong> admin@sim.com</p>
                        <p><strong>Password:</strong> password</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

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
            
            updateThemeIcon();
        }
        
        function updateThemeIcon() {
            const isDark = document.documentElement.classList.contains('dark');
            const icon = document.getElementById('theme-icon');
            
            if (icon) {
                if (isDark) {
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                } else {
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                }
            }
        }
        
        // Update icon when page loads
        window.addEventListener('DOMContentLoaded', updateThemeIcon);
    </script>
</body>
</html>

