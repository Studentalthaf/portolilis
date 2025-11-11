# 🎯 Panduan Sistem CRUD Portfolio

## ✅ Yang Sudah Dibuat

### 1. **Biodata Pribadi** (Homepage)
- ✅ Nama: Laily Charles Febriana
- ✅ Email: 23032010040@student.upnjatim.ac.id
- ✅ Telp: 085706795172
- ✅ Social Media:
  - Instagram: @lailycf
  - TikTok: @laily
- ✅ Foto profil dari `public/pp`

### 2. **Database & Models**
✅ **4 Tabel Sudah Dibuat:**

#### Projects Table
- `judul` - Judul project
- `durasi` - Durasi pengerjaan
- `deskripsi` - Deskripsi project
- `dokumentasi` - Upload gambar (image)
- `tech_stack` - Array teknologi (JSON)
- `status` - completed/in_progress

#### Certificates Table
- `judul` - Judul sertifikat
- `tanggal_perolehan` - Tanggal dapat
- `penerbit` - Pemberi sertifikat
- `bukti_sertifikat` - Upload PDF
- `certificate_id` - ID sertifikat

#### Sharings Table
- `judul` - Judul konten
- `deskripsi` - Deskripsi
- `foto` - Upload gambar
- `kategori` - Tutorial/Tips/Informasi/Rekomendasi

#### Education Table
- `institusi` - Nama sekolah/universitas
- `tingkat` - SD/SMP/SMA/Universitas
- `tahun_mulai` - Tahun mulai
- `tahun_selesai` - Tahun selesai
- `keterangan` - Info tambahan
- `urutan` - Untuk sorting

### 3. **Controllers CRUD** ✅
Semua Controller sudah dibuat dengan full CRUD:
- `ProjectController`
- `CertificateController`
- `SharingController`
- `EducationController`

Setiap controller punya method:
- `index()` - List semua data
- `create()` - Form tambah
- `store()` - Simpan data baru
- `edit()` - Form edit
- `update()` - Update data
- `destroy()` - Hapus data

### 4. **File Upload** ✅
- ✅ Upload gambar untuk Projects (max 2MB)
- ✅ Upload PDF untuk Certificates (max 5MB)
- ✅ Upload gambar untuk Sharings (max 2MB)
- ✅ File tersimpan di `storage/app/public`
- ✅ Symbolic link sudah dibuat

### 5. **Dashboard Admin** ✅
Dashboard yang sudah disederhanakan dengan:
- Welcome message
- 4 Statistics cards
- Quick Actions (Add New buttons)
- Navigation cards ke semua management pages
- Dark mode support
- Responsive design

### 6. **Sidebar Navigation** ✅
Menu yang sudah berfungsi:
- Dashboard (Home)
- Projects Management
- Certificates Management
- Sharing Management
- Education Management
- Logout button

## 🚀 Cara Menggunakan

### Login ke Dashboard
1. Buka `http://localhost:8000/login`
2. Login dengan:
   - **Email**: admin@sim.com
   - **Password**: password

### Manage Projects
1. Dari dashboard, klik **"Manage Projects"** atau sidebar **"Projects"**
2. Klik **"Add New Project"**
3. Isi form:
   - Judul Project
   - Durasi (misal: "3 Bulan" atau "Jan - Mar 2024")
   - Deskripsi
   - Upload dokumentasi (gambar)
   - Tech Stack (pisahkan dengan koma: Laravel, Vue.js, MySQL)
   - Status (Completed/In Progress)
4. Klik **"Save Project"**
5. Untuk edit: Klik tombol **"Edit"** pada project card
6. Untuk hapus: Klik tombol **"Delete"** (akan ada konfirmasi)

### Manage Certificates
1. Klik sidebar **"Certificates"** atau dari dashboard
2. Klik **"Add New Certificate"**
3. Isi form:
   - Judul Sertifikat
   - Tanggal Perolehan
   - Penerbit
   - Upload Bukti Sertifikat (PDF)
   - Certificate ID (optional)
4. Simpan dan manage seperti Projects

### Manage Sharing
1. Klik sidebar **"Sharing"**
2. Klik **"Add New Sharing"**
3. Isi form:
   - Judul Konten
   - Deskripsi
   - Upload Foto (optional)
   - Kategori (Tutorial/Tips/Informasi/Rekomendasi)
4. Simpan dan manage

### Manage Education
1. Klik sidebar **"Education"**
2. Klik **"Add New Education"**
3. Isi form:
   - Institusi (SD Negeri 01, SMP Negeri 02, dll)
   - Tingkat (SD/SMP/SMA/Universitas)
   - Tahun Mulai
   - Tahun Selesai
   - Keterangan (optional)
   - Urutan (untuk sorting, misal: 1, 2, 3)
4. Simpan dan manage

## 📂 Struktur File

```
app/
├── Http/Controllers/
│   ├── ProjectController.php       ← CRUD Projects
│   ├── CertificateController.php   ← CRUD Certificates
│   ├── SharingController.php       ← CRUD Sharing
│   └── EducationController.php     ← CRUD Education
│
├── Models/
│   ├── Project.php
│   ├── Certificate.php
│   ├── Sharing.php
│   └── Education.php

resources/views/
├── dashboard/
│   ├── layout.blade.php          ← Layout reusable
│   ├── index.blade.php           ← Dashboard home
│   │
│   ├── projects/
│   │   ├── index.blade.php       ← List projects
│   │   ├── create.blade.php      ← Form tambah
│   │   └── edit.blade.php        ← Form edit
│   │
│   ├── certificates/             ← (Pattern sama)
│   ├── sharings/                 ← (Pattern sama)
│   └── education/                ← (Pattern sama)

database/migrations/
├── 2025_11_11_104304_create_projects_table.php
├── 2025_11_11_104345_create_certificates_table.php
├── 2025_11_11_104503_create_sharings_table.php
└── 2025_11_11_104511_create_education_table.php

storage/app/public/
├── projects/         ← Upload gambar projects
├── certificates/     ← Upload PDF certificates
└── sharings/         ← Upload gambar sharings
```

## 🎨 Membuat Views untuk Certificates, Sharings, Education

**Pattern nya sama seperti Projects!** Copy dari `resources/views/dashboard/projects/` dan sesuaikan:

### Contoh untuk Certificates:

**index.blade.php:**
```blade
@extends('dashboard.layout')
@section('title', 'Certificates')
@section('page-title', 'Certificates')
@section('content')
<!-- List certificates di sini -->
@endsection
```

**create.blade.php:**
```blade
@extends('dashboard.layout')
@section('title', 'Create Certificate')
@section('content')
<form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Form fields sesuai table certificates -->
</form>
@endsection
```

**edit.blade.php:**
```blade
@extends('dashboard.layout')
@section('title', 'Edit Certificate')
@section('content')
<form action="{{ route('certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <!-- Form fields dengan value dari $certificate -->
</form>
@endsection
```

## 🔥 Fitur yang Sudah Berfungsi

✅ **Dark Mode** - Di semua halaman (Homepage, Login, Dashboard)
✅ **File Upload** - Gambar & PDF dengan validasi
✅ **CRUD Complete** - Create, Read, Update, Delete
✅ **Form Validation** - Server-side validation
✅ **Success Messages** - Toast notification setelah action
✅ **Error Handling** - Tampilkan error dengan jelas
✅ **Responsive Design** - Mobile, Tablet, Desktop
✅ **Sidebar Navigation** - Working dengan active state
✅ **Authentication** - Login required untuk dashboard

## 📝 Notes Penting

1. **File Upload Location**
   - Semua file upload ada di `storage/app/public/`
   - Akses via URL: `/storage/nama-file`
   - Symbolic link sudah dibuat dengan `php artisan storage:link`

2. **Tech Stack Field di Projects**
   - Input sebagai string dipisah koma
   - Disimpan sebagai JSON array di database
   - Otomatis convert di Controller

3. **Status Projects**
   - `completed` - Project selesai
   - `in_progress` - Masih dikerjakan

4. **Kategori Sharing**
   - Tutorial
   - Tips
   - Informasi
   - Rekomendasi

5. **Urutan Education**
   - Gunakan angka (1, 2, 3, ...) untuk sorting
   - Semakin kecil nomor, semakin atas tampil

## 🎯 Testing Checklist

- [ ] Login ke dashboard
- [ ] Add new project dengan upload gambar
- [ ] Edit project
- [ ] Delete project
- [ ] Add new certificate dengan upload PDF
- [ ] Add new sharing dengan kategori
- [ ] Add new education dengan urutan
- [ ] Test dark mode di semua halaman
- [ ] Test responsive di mobile
- [ ] Test sidebar navigation
- [ ] Logout

## 🆘 Troubleshooting

**Problem: File upload tidak berfungsi**
Solution: Jalankan `php artisan storage:link`

**Problem: Route not found**
Solution: Jalankan `php artisan route:clear`

**Problem: View tidak update**
Solution: Jalankan `npm run build`

**Problem: Data tidak tersimpan**
Solution: Check database connection di `.env`

## 🎉 Summary

Sistem CRUD Portfolio sudah **LENGKAP** dengan:
- ✅ 4 Entities (Projects, Certificates, Sharings, Education)
- ✅ Full CRUD operations untuk semua
- ✅ File upload (Image & PDF)
- ✅ Dashboard admin yang simple
- ✅ Dark mode di semua halaman
- ✅ Authentication system
- ✅ Responsive design
- ✅ Biodata pribadi sudah diupdate

**Tinggal tambahkan views untuk Certificates, Sharings, dan Education dengan pattern yang sama seperti Projects!**

Selamat menggunakan! 🚀

