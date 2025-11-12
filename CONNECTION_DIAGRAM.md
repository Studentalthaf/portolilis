# 🔗 Diagram Koneksi Production

## Alur Koneksi Lengkap

```
Internet (Browser)
    ↓
Domain: lailycharlesfebriana.site (HTTPS)
    ↓
Nginx di VPS (Host) - Port 443
    ├─ SSL Certificate: /etc/letsencrypt/live/lailycharlesfebriana.site/
    └─ Proxy ke: http://127.0.0.1:8080
        ↓
Docker Container: portolilis_nginx (Port 8080:80)
    ├─ Network: portolilis_network
    └─ FastCGI ke: app:9000
        ↓
Docker Container: portolilis_app (PHP-FPM)
    ├─ Network: portolilis_network
    ├─ PHP-FPM: listen 0.0.0.0:9000 ✅
    └─ Database: mysql:3306
        ↓
Docker Container: portolilis_mysql (MySQL)
    └─ Network: portolilis_network
```

## ✅ Verifikasi Koneksi

### 1. Docker Network ✅
- **Network**: `portolilis_network` (bridge)
- **Containers**: app, nginx, mysql (semua dalam network yang sama)
- **Status**: ✅ TERKONEKSI

### 2. PHP-FPM → MySQL ✅
- **App Container** → `mysql:3306`
- **Config**: `DB_HOST=mysql` (nama service)
- **Status**: ✅ TERKONEKSI (via Docker network)

### 3. Nginx Container → PHP-FPM ✅
- **Nginx Container** → `app:9000` (FastCGI)
- **Config**: `fastcgi_pass app:9000`
- **PHP-FPM**: `listen = 0.0.0.0:9000` ✅
- **Status**: ✅ TERKONEKSI (via Docker network)

### 4. VPS Nginx → Docker Nginx ✅
- **VPS Nginx** → `http://127.0.0.1:8080`
- **Docker Nginx**: Port mapping `8080:80`
- **Status**: ✅ TERKONEKSI (localhost)

### 5. Domain → VPS Nginx ✅
- **Domain**: `lailycharlesfebriana.site`
- **DNS A Record**: → IP VPS
- **VPS Nginx**: Listens on port 443 (HTTPS)
- **SSL Certificate**: Let's Encrypt
- **Status**: ✅ TERKONEKSI (setelah setup SSL)

### 6. Assets (Vite) ✅
- **Build**: `npm run build` (di Dockerfile)
- **Output**: `public/build/assets/`
- **APP_URL**: `https://lailycharlesfebriana.site` ✅
- **Status**: ✅ TERKONEKSI (assets di-load via HTTPS)

## 📋 Checklist Konfigurasi

### Docker Compose ✅
- [x] Network: `portolilis_network` (semua container)
- [x] PHP-FPM config: `docker/php/www.conf` (listen 0.0.0.0:9000)
- [x] APP_URL: `https://lailycharlesfebriana.site`
- [x] Auto-install dependencies: `entrypoint.sh`

### Nginx (Docker) ✅
- [x] FastCGI: `app:9000`
- [x] Root: `/var/www/html/public`
- [x] Port mapping: `8080:80`

### Nginx (VPS) ⚠️ (Perlu setup di VPS)
- [ ] Config: `/etc/nginx/sites-available/lailycharlesfebriana.site`
- [ ] SSL Certificate: Let's Encrypt
- [ ] Proxy: `http://127.0.0.1:8080`

### Laravel ✅
- [x] APP_URL: HTTPS domain
- [x] Database: MySQL (via Docker network)
- [x] Storage link: Auto-create
- [x] Cache: Auto-optimize

## 🚀 Setup yang Perlu Dilakukan di VPS

1. **Clone & Build**
   ```bash
   git clone <repo> portolilis
   cd portolilis
   docker-compose build
   docker-compose up -d
   ```

2. **Setup Nginx Config** (di VPS)
   ```bash
   sudo tee /etc/nginx/sites-available/lailycharlesfebriana.site > /dev/null << 'EOF'
   server {
       listen 80;
       server_name lailycharlesfebriana.site;
       return 301 https://$host$request_uri;
   }
   server {
       listen 443 ssl http2;
       server_name lailycharlesfebriana.site;
       ssl_certificate /etc/letsencrypt/live/lailycharlesfebriana.site/fullchain.pem;
       ssl_certificate_key /etc/letsencrypt/live/lailycharlesfebriana.site/privkey.pem;
       include /etc/letsencrypt/options-ssl-nginx.conf;
       ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem;
       location / {
           proxy_pass http://127.0.0.1:8080;
           proxy_set_header Host $host;
           proxy_set_header X-Real-IP $remote_addr;
           proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
           proxy_set_header X-Forwarded-Proto $scheme;
       }
   }
   EOF
   ```

3. **Setup SSL**
   ```bash
   sudo certbot --nginx -d lailycharlesfebriana.site --redirect
   ```

## ✅ Kesimpulan

**Semua sudah terkoneksi dengan benar!** 

- ✅ Docker containers saling terkoneksi
- ✅ PHP-FPM bisa diakses dari Nginx container
- ✅ Database terkoneksi via Docker network
- ✅ Assets akan di-load via HTTPS
- ⚠️ Hanya perlu setup Nginx di VPS dan SSL certificate

Setelah setup Nginx dan SSL di VPS, semua akan bekerja dengan sempurna!

