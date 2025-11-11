# 🎨 Web Portfolio SIM 2025

Portfolio website profesional untuk Project Individu Sistem Informasi Manajemen 2025.

## ✨ Fitur

### 1️⃣ **Biodata** - Informasi Pribadi
- ✅ Nama, Email, Telp, Akun Social Media
- ✅ Riwayat Pendidikan (SD, SMP, SMA)
- ✅ Foto Profil dari `public/pp`
- ✅ Hobi, Cita-cita, dan Informasi Tambahan
- 🎯 Animasi yang menarik dan smooth

### 2️⃣ **Project** - Daftar Project (6 Project)
- ✅ Judul Project
- ✅ Durasi & Tanggal Pengerjaan
- ✅ Deskripsi Singkat
- ✅ Dokumentasi dengan icon representatif
- 🎨 Card design yang modern
- 🔥 Hover effects yang keren

### 3️⃣ **Certificate** - Sertifikat (6 Certificate)
- ✅ Judul Sertifikat
- ✅ Tanggal Perolehan
- ✅ Bukti Sertifikat (link)
- 🏆 Badge dengan gradient colors
- 📜 Layout yang profesional

### 4️⃣ **Sharing** - Tips & Tutorial (6 Sharing)
- ✅ Judul Konten
- ✅ Deskripsi Singkat
- ✅ Foto atau file pendukung (icon)
- 📚 Kategori (Tutorial, Tips, Informasi, Rekomendasi)
- 🎯 Call-to-action yang jelas

## 🌓 Dark & Light Mode

- Toggle dark/light mode dengan smooth transition
- Preference tersimpan di localStorage
- Keyboard shortcut: Tekan **T** untuk toggle
- Icon yang berubah otomatis
- Transisi yang halus di semua elemen
- **Dark mode tersedia di semua halaman** (Homepage, Login, Dashboard)

## 🔐 Login & Dashboard

### Login Page
- Design modern dengan gradient
- Dark mode support
- Show/hide password toggle
- Remember me checkbox
- Error handling dengan animasi
- Demo credentials provided

### Admin Dashboard
- Modern sidebar navigation
- Statistics cards dengan gradient
- Recent activity timeline
- Quick actions buttons
- Projects table with status
- Profile completion progress
- Dark mode compatible
- Responsive layout
- Logout functionality

## 🎭 Animasi Keren

### Scroll Animations
- ✨ Fade in on scroll
- 🎪 Slide in from left/right
- 🎯 Stagger animations untuk cards
- 📱 Responsive di semua device

### Interactive Animations
- 🎨 Hover effects pada cards
- 💫 Floating elements
- 🌊 Ripple effect on click
- ⚡ Smooth page transitions
- 🎪 Parallax scrolling effect

### Special Effects
- 🌈 Gradient text animation
- 💎 Glass morphism effect
- 🎯 Active navigation indicator
- 🔝 Scroll to top button
- 🎨 Custom cursor (advanced)

## 🚀 Teknologi

- **Laravel** - PHP Framework
- **Vite** - Modern build tool
- **Tailwind CSS v4** - Utility-first CSS
- **Font Awesome** - Icons
- **JavaScript ES6+** - Interactivity
- **LocalStorage** - Theme persistence

## 📦 Instalasi

```bash
# Clone repository
git clone [repository-url]
cd PORTOLILIS

# Install PHP dependencies
composer install

# Install NPM dependencies
npm install

# Generate application key
php artisan key:generate

# Run migrations and seed database
php artisan migrate:fresh --seed

# Build assets
npm run build

# Atau untuk development dengan hot reload
npm run dev

# Jalankan server
php artisan serve
```

## 🎯 Penggunaan

### Portfolio (Public)
1. Buka browser dan akses `http://localhost:8000`
2. Explore 4 section: Biodata, Projects, Certificates, Sharing
3. Toggle dark/light mode dengan tombol di navbar
4. Gunakan navigation untuk scroll smooth ke section
5. Hover pada cards untuk melihat animasi
6. Klik "Lihat Detail" untuk info lebih lanjut

### Login & Dashboard (Admin)
1. Klik **Login** di navbar atau akses `http://localhost:8000/login`
2. Gunakan kredensial demo:
   - **Email**: admin@sim.com
   - **Password**: password
3. Setelah login, Anda akan masuk ke **Dashboard**
4. Dashboard menampilkan:
   - Statistics cards (Projects, Certificates, Sharing, Views)
   - Recent Activity
   - Quick Actions
   - Recent Projects Table
   - Profile Completion Progress
5. **Dark mode** juga tersedia di Dashboard
6. Klik **Logout** untuk keluar

## ⌨️ Keyboard Shortcuts

- **T** - Toggle dark/light mode
- **ESC** - Close mobile menu
- **Click Scroll Top Button** - Smooth scroll to top

## 📱 Responsive Design

- 📱 Mobile First approach
- 💻 Tablet optimized
- 🖥️ Desktop enhanced
- 🎨 Smooth transitions antar breakpoints

## 🎨 Customisasi

### Ganti Foto Profil
Letakkan foto Anda di `public/pp/` dan update path di `welcome.blade.php`:

```html
<img src="{{ asset('pp/nama-foto-anda.jpg') }}" alt="Profile Photo">
```

### Edit Data Personal
Edit file `resources/views/welcome.blade.php` pada section:
- **Biodata**: Line ~40-100
- **Projects**: Line ~200-400
- **Certificates**: Line ~500-700
- **Sharing**: Line ~800-1000

### Customize Colors
Edit `resources/css/app.css` untuk mengubah warna gradient dan animasi:

```css
/* Contoh: Ganti gradient colors */
.animate-gradient {
    background: linear-gradient(90deg, 
        theme('colors.blue.600'),
        theme('colors.purple.600'),
        theme('colors.pink.600')
    );
}
```

## 🔥 Fitur Advanced

### Animasi Custom
- Fade in sections
- Slide animations
- Parallax effects
- Ripple on click
- Custom cursor
- Smooth scrolling

### Performance
- Lazy loading images
- Intersection Observer API
- Optimized animations
- Service Worker ready (PWA)
- Performance monitoring

### UX Enhancements
- Active navigation indicator
- Scroll position memory
- Mobile menu animations
- Email copy to clipboard
- Toast notifications

## 📝 Struktur File

```
PORTOLILIS/
├── public/
│   ├── pp/                    # Foto profil
│   └── build/                 # Compiled assets
├── resources/
│   ├── css/
│   │   └── app.css           # Custom CSS & animations
│   ├── js/
│   │   └── app.js            # JavaScript interactivity
│   └── views/
│       └── welcome.blade.php  # Main portfolio page
├── routes/
│   └── web.php               # Routes
└── package.json              # NPM dependencies
```

## 🎯 Checklist Requirements

### ✅ Component 1: Biodata
- [x] Nama, Email, Telp
- [x] Akun Social Media (LinkedIn, GitHub, Instagram, Twitter)
- [x] Riwayat Pendidikan (SD, SMP, SMA)
- [x] Hobi & Cita-cita (Optional)
- [x] Foto Profil dari `public/pp`

### ✅ Component 2: Project (Min. 5)
- [x] 6 Project dengan detail lengkap
- [x] Judul Project
- [x] Durasi & Tanggal
- [x] Deskripsi Singkat
- [x] Dokumentasi (Icon/Foto)

### ✅ Component 3: Certificate (Min. 5)
- [x] 6 Certificate
- [x] Judul Sertifikat
- [x] Tanggal Perolehan
- [x] Bukti Sertifikat (Link)

### ✅ Component 4: Sharing (Min. 5)
- [x] 6 Sharing content
- [x] Judul Konten
- [x] Deskripsi Singkat
- [x] Foto/Icon pendukung

### ✅ Additional Features
- [x] White & Dark Mode (Homepage, Login, Dashboard)
- [x] Login & Authentication System
- [x] Admin Dashboard
- [x] Smooth Animations
- [x] Responsive Design
- [x] Modern UI/UX
- [x] Professional Look

## 🎨 Color Scheme

### Light Mode
- Background: White → Gray-50 → Blue-50 gradient
- Text: Gray-900
- Accent: Blue-600, Purple-600, Pink-600

### Dark Mode
- Background: Gray-900 → Gray-800 → Blue-950 gradient
- Text: Gray-100
- Accent: Blue-400, Purple-400, Pink-400

## 🚀 Deployment

### Build untuk Production
```bash
npm run build
php artisan optimize
php artisan config:cache
php artisan route:cache
```

### Server Requirements
- PHP >= 8.2
- Composer
- Node.js & NPM
- SQLite (default) atau MySQL/PostgreSQL

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Tailwind CSS](https://tailwindcss.com)
- [Font Awesome Icons](https://fontawesome.com)
- [Vite](https://vitejs.dev)

## 👨‍💻 Developer

Dibuat dengan ❤️ untuk Project Individu SIM 2025

## 📄 License

MIT License - Feel free to use for your portfolio!

---

**Happy Coding! 🚀✨**

Jika ada pertanyaan atau butuh bantuan, jangan ragu untuk bertanya!
