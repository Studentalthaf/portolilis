# 🚀 Tutorial Deploy Manual - Portfolio Laravel ke VPS

## 📋 Prerequisites

- VPS dengan Ubuntu/Debian
- Akses root atau sudo
- Domain sudah pointing ke IP VPS (DNS A record)
- Git sudah terinstall

---

## Step 1: Hapus Project Lama (Jika Ada)

```bash
# Masuk ke VPS
ssh root@YOUR_VPS_IP

# Hapus project lama (jika ada)
cd /usr/src/www
rm -rf portolilis

# Hapus Nginx config lama (jika ada)
sudo rm -f /etc/nginx/sites-available/lailycharlesfebriana.site
sudo rm -f /etc/nginx/sites-enabled/*lailycharlesfebriana.site*
sudo nginx -t && sudo systemctl reload nginx
```

---

## Step 2: Install Docker & Docker Compose

```bash
# Update sistem
sudo apt update && sudo apt upgrade -y

# Install Docker
curl -fsSL https://get.docker.com -o get-docker.sh
sudo sh get-docker.sh

# Install Docker Compose
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# Verifikasi
docker --version
docker-compose --version
```

---

## Step 3: Clone Repository

```bash
# Masuk ke directory
cd /usr/src/www

# Clone repository
git clone https://github.com/YOUR_USERNAME/YOUR_REPO.git portolilis
cd portolilis

# Verifikasi file
ls -la
```

---

## Step 4: Buat .env File

```bash
# Buat .env file
nano .env
```

**Isi dengan konfigurasi berikut:**

```env
APP_NAME="Portfolio Laily"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://lailycharlesfebriana.site

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=portolilis
DB_USERNAME=portolilis_user
DB_PASSWORD=portolilis_password

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

LOG_CHANNEL=stack
LOG_LEVEL=error
```

**PENTING:**
- `DB_HOST` harus `mysql` (nama service di docker-compose)
- `APP_URL` harus `https://lailycharlesfebriana.site` (dengan HTTPS)
- `DB_PASSWORD` ganti dengan password yang kuat!

**Simpan:** `Ctrl+O`, `Enter`, `Ctrl+X`

---

## Step 5: Build Docker Containers

```bash
# Build images (ini akan lama, sabar ya)
docker-compose build

# Jalankan containers
docker-compose up -d

# Cek status
docker-compose ps

# Lihat logs (tunggu sampai semua ready)
docker-compose logs -f
# Tekan Ctrl+C untuk keluar dari logs
```

**Tunggu sampai semua container running:**
- `portolilis_app` - Status: Up
- `portolilis_nginx` - Status: Up  
- `portolilis_mysql` - Status: Up (healthy)

---

## Step 6: Setup Laravel (Otomatis via Entrypoint)

Entrypoint sudah otomatis melakukan:
- ✅ Install Composer dependencies
- ✅ Generate APP_KEY
- ✅ Run migrations
- ✅ Create storage link
- ✅ Optimize cache

**Verifikasi:**

```bash
# Cek apakah vendor sudah terinstall
docker-compose exec app ls -la vendor/autoload.php

# Cek APP_KEY
docker-compose exec app grep "APP_KEY" .env

# Cek migrations
docker-compose exec app php artisan migrate:status
```

---

## Step 7: Test Port 8080

```bash
# Test dari localhost
curl -I http://127.0.0.1:8080

# Harusnya dapat response HTTP 200 OK
```

Jika dapat **200 OK**, lanjut ke step berikutnya.

Jika dapat **502 Bad Gateway** atau **Empty reply**, cek:

```bash
# Cek logs
docker-compose logs app --tail=50
docker-compose logs nginx --tail=50

# Restart container
docker-compose restart
sleep 10
curl -I http://127.0.0.1:8080
```

---

## Step 8: Setup Nginx di VPS

```bash
# Buat config Nginx
sudo tee /etc/nginx/sites-available/lailycharlesfebriana.site > /dev/null << 'EOF'
# HTTP - Redirect ke HTTPS
server {
    listen 80;
    server_name lailycharlesfebriana.site www.lailycharlesfebriana.site;
    return 301 https://$host$request_uri;
}

# HTTPS - Proxy ke Laravel Docker
server {
    listen 443 ssl http2;
    server_name lailycharlesfebriana.site www.lailycharlesfebriana.site;
    
    # SSL Certificate (akan diisi oleh Certbot)
    ssl_certificate /etc/letsencrypt/live/lailycharlesfebriana.site/fullchain.pem;
    ssl_certificate_key /etc/letsencrypt/live/lailycharlesfebriana.site/privkey.pem;
    include /etc/letsencrypt/options-ssl-nginx.conf;
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem;
    
    access_log /var/log/nginx/lailycharlesfebriana.access.log;
    error_log /var/log/nginx/lailycharlesfebriana.error.log;
    
    location / {
        proxy_pass http://127.0.0.1:8080;
        proxy_set_header Host $host;
        proxy_set_header X-Real-IP $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header X-Forwarded-Proto $scheme;
        
        proxy_http_version 1.1;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection "upgrade";
        
        proxy_connect_timeout 60s;
        proxy_send_timeout 60s;
        proxy_read_timeout 60s;
    }
}
EOF

# Enable config dengan prefix 00- (prioritas tertinggi)
sudo ln -sf /etc/nginx/sites-available/lailycharlesfebriana.site /etc/nginx/sites-enabled/00-lailycharlesfebriana.site

# Test config (sebelum SSL, akan error karena certificate belum ada - itu normal)
sudo nginx -t
```

**Jika error tentang SSL certificate, itu normal. Lanjut ke step berikutnya.**

---

## Step 9: Setup SSL Certificate

```bash
# Install Certbot (jika belum)
sudo apt update
sudo apt install certbot python3-certbot-nginx -y

# Generate SSL certificate
sudo certbot --nginx \
    -d lailycharlesfebriana.site \
    --non-interactive \
    --agree-tos \
    --email admin@lailycharlesfebriana.site \
    --redirect

# Certbot akan otomatis update config Nginx
# Verifikasi
sudo nginx -t
sudo systemctl reload nginx
```

---

## Step 10: Verifikasi Final

```bash
# 1. Test HTTP (harus redirect ke HTTPS)
curl -I http://lailycharlesfebriana.site

# 2. Test HTTPS
curl -I https://lailycharlesfebriana.site

# 3. Test dari browser
# Buka: https://lailycharlesfebriana.site
# Harusnya menampilkan portfolio Laily Charles Febriana

# 4. Verifikasi althaf.site tidak terganggu
curl -I https://althaf.site
# Harusnya masih menampilkan project althaf
```

---

## Step 11: Setup Admin User (Opsional)

```bash
# Masuk ke container
docker-compose exec app bash

# Di dalam container, jalankan:
php artisan tinker

# Di tinker, jalankan:
User::create([
    'name' => 'Admin',
    'email' => 'admin@sim.com',
    'password' => Hash::make('password'),
    'email_verified_at' => now(),
]);

# Keluar dari tinker
exit

# Keluar dari container
exit
```

**Atau gunakan seeder:**

```bash
docker-compose exec app php artisan db:seed --class=UserSeeder
```

---

## 🔧 Troubleshooting

### Port 8080 tidak accessible

```bash
# Cek container status
docker-compose ps

# Restart container
docker-compose restart

# Cek logs
docker-compose logs app --tail=50
```

### 502 Bad Gateway

```bash
# Cek PHP-FPM listening
docker-compose exec app netstat -tulpn | grep 9000

# Cek koneksi dari nginx ke app
docker-compose exec nginx ping -c 2 app

# Restart semua
docker-compose restart
```

### SSL Certificate Error

```bash
# Regenerate certificate
sudo certbot --nginx -d lailycharlesfebriana.site --force-renewal
sudo systemctl reload nginx
```

### Assets tidak loading (404)

```bash
# Rebuild assets
docker-compose exec app sh -c "cd /var/www/html && npm install && npm run build"

# Clear cache
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan view:clear
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan view:cache
```

---

## 📝 Perintah Berguna

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
docker-compose exec nginx sh
docker-compose exec mysql bash
```

### Update project
```bash
cd /usr/src/www/portolilis
git pull origin main
docker-compose build
docker-compose up -d
docker-compose exec app php artisan migrate --force
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache
```

---

## ✅ Checklist Deploy

- [ ] Docker & Docker Compose terinstall
- [ ] Repository di-clone
- [ ] .env file dibuat dengan benar
- [ ] Docker containers build dan running
- [ ] Port 8080 accessible (HTTP 200 OK)
- [ ] Nginx config dibuat di VPS
- [ ] SSL certificate terinstall
- [ ] HTTPS accessible dari browser
- [ ] Assets (CSS/JS) loading dengan benar
- [ ] althaf.site tidak terganggu

---

## 🎉 Selesai!

Website portfolio sudah online di `https://lailycharlesfebriana.site`

**Login Admin:**
- URL: `https://lailycharlesfebriana.site/login`
- Email: `admin@sim.com`
- Password: `password`

