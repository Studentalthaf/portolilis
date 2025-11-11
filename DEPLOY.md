# 🚀 Tutorial Deploy Portfolio Laravel ke VPS dengan Docker

## 📋 Prerequisites

- VPS dengan minimal 1GB RAM (recommended: 2GB)
- Ubuntu 20.04+ atau Debian 11+
- Akses root atau sudo
- Domain/IP VPS (contoh: 202.10.44.172)

## 🔧 Step 1: Install Docker & Docker Compose

```bash
# Update sistem
sudo apt update && sudo apt upgrade -y

# Install Docker
curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh get-docker.sh

# Install Docker Compose
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# Verifikasi instalasi
docker --version
docker-compose --version

# Tambahkan user ke docker group (opsional)
sudo usermod -aG docker $USER
```

## 📥 Step 2: Clone Repository

```bash
# Install Git jika belum ada
sudo apt install git -y

# Clone repository
cd /var/www
sudo git clone https://github.com/username/portolilis.git
cd portolilis
```

## ⚙️ Step 3: Setup Environment

```bash
# Copy .env.example ke .env
cp .env.example .env

# Edit .env file
nano .env
```

**Update konfigurasi berikut di `.env`:**
```env
APP_NAME="Portfolio Laily"
APP_ENV=production
APP_DEBUG=false
APP_URL=http://202.10.44.172:8080

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=portolilis
DB_USERNAME=portolilis_user
DB_PASSWORD=portolilis_password
```

**PENTING:** 
- `DB_HOST` harus `mysql` (nama service di docker-compose)
- `APP_URL` sesuaikan dengan IP/domain VPS Anda
- `DB_PASSWORD` ganti dengan password yang kuat!

## 🐳 Step 4: Build & Run Docker Containers

```bash
# Build images (pertama kali, ini akan lama)
docker-compose build

# Jalankan containers
docker-compose up -d

# Cek status containers
docker-compose ps

# Lihat logs untuk memastikan semua berjalan
docker-compose logs -f
```

Tunggu sampai semua container running. Tekan `Ctrl+C` untuk keluar dari logs.

## 🔑 Step 5: Setup Laravel

```bash
# Generate application key
docker-compose exec app php artisan key:generate

# Run migrations
docker-compose exec app php artisan migrate --force

# Create storage link
docker-compose exec app php artisan storage:link

# Optimize Laravel
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache
```

## ✅ Step 6: Verifikasi

1. **Cek containers:**
```bash
docker-compose ps
```

Semua container harus `Up`:
- `portolilis_app`
- `portolilis_nginx`
- `portolilis_mysql`

2. **Cek logs:**
```bash
docker-compose logs app
docker-compose logs nginx
docker-compose logs mysql
```

3. **Akses aplikasi:**
Buka browser: `http://202.10.44.172:8080`

## 🔄 Update Aplikasi

```bash
cd /var/www/portolilis

# Pull perubahan terbaru
git pull origin main

# Rebuild jika ada perubahan Dockerfile
docker-compose build

# Restart containers
docker-compose restart

# Update dependencies jika perlu
docker-compose exec app composer install --no-dev --optimize-autoloader
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
```

## 🛠️ Perintah Berguna

### Restart containers
```bash
docker-compose restart
```

### Stop containers
```bash
docker-compose down
```

### Start containers
```bash
docker-compose up -d
```

### Lihat logs
```bash
docker-compose logs -f app
docker-compose logs -f nginx
docker-compose logs -f mysql
```

### Masuk ke container
```bash
docker-compose exec app bash
docker-compose exec mysql bash
```

### Backup database
```bash
docker-compose exec mysql mysqldump -u portolilis_user -pportolilis_password portolilis > backup_$(date +%Y%m%d).sql
```

### Restore database
```bash
docker-compose exec -T mysql mysql -u portolilis_user -pportolilis_password portolilis < backup.sql
```

### Cek penggunaan resource
```bash
docker stats
```

## 🔧 Troubleshooting

### Container tidak jalan
```bash
# Cek logs
docker-compose logs app

# Rebuild container
docker-compose build --no-cache app
docker-compose up -d app
```

### Permission error
```bash
docker-compose exec app chown -R www-data:www-data /var/www/html/storage
docker-compose exec app chmod -R 775 /var/www/html/storage
```

### Database connection error
- Pastikan `DB_HOST=mysql` di `.env`
- Pastikan MySQL container sudah running
- Cek password di `.env` sesuai dengan `docker-compose.yml`

### Port sudah digunakan
Edit `docker-compose.yml`, ubah port:
```yaml
ports:
  - "8081:80"  # Ganti 8080 dengan port lain
```

### Out of memory
- Kurangi `pm.max_children` di `docker/php/local.ini`
- Kurangi `innodb_buffer_pool_size` di `docker/mysql/my.cnf`

## 📊 Resource Usage

Dengan konfigurasi ini, penggunaan RAM:
- App Container: ~256MB
- Nginx Container: ~64MB
- MySQL Container: ~384MB
- **Total: ~700MB** (cocok untuk VPS 1GB RAM)

## 🔒 Security Tips

1. **Ganti password default:**
   - `DB_PASSWORD` di `.env`
   - `DB_ROOT_PASSWORD` di `docker-compose.yml`

2. **Setup firewall:**
```bash
sudo ufw allow 8080/tcp
sudo ufw enable
```

3. **Setup SSL (opsional):**
   - Gunakan Let's Encrypt dengan Certbot
   - Update nginx config untuk HTTPS

## 📝 Checklist Deployment

- [ ] Docker & Docker Compose terinstall
- [ ] Repository sudah di-clone
- [ ] File `.env` sudah dikonfigurasi
- [ ] Containers berjalan (`docker-compose ps`)
- [ ] Application key sudah di-generate
- [ ] Migrations sudah dijalankan
- [ ] Storage link sudah dibuat
- [ ] Aplikasi bisa diakses di browser
- [ ] Login ke dashboard berfungsi

## 🎉 Selesai!

Aplikasi Anda sekarang sudah berjalan di VPS! 🚀

Untuk support atau pertanyaan, cek logs dengan:
```bash
docker-compose logs -f
```

