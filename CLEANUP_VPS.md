# 🧹 Tutorial Cleanup Project di VPS

## ⚠️ PERINGATAN
**Script ini akan menghapus semua data project di VPS!** Pastikan Anda sudah backup data penting sebelum menjalankan.

## 📋 Step 1: Backup Data (PENTING!)

```bash
# Masuk ke VPS
ssh root@202.10.44.172

# Backup database
cd /usr/src/www/portolilis
docker-compose exec mysql mysqldump -u portolilis_user -pportolilis_password portolilis > backup_$(date +%Y%m%d_%H%M%S).sql

# Backup uploads/files (jika ada)
tar -czf storage_backup_$(date +%Y%m%d_%H%M%S).tar.gz storage/app/public/

# Download backup ke local (opsional)
# scp root@202.10.44.172:/usr/src/www/portolilis/backup_*.sql ./
# scp root@202.10.44.172:/usr/src/www/portolilis/storage_backup_*.tar.gz ./
```

## 🗑️ Step 2: Stop dan Hapus Containers

```bash
# Masuk ke directory project
cd /usr/src/www/portolilis

# Stop containers
docker-compose down

# Hapus containers, networks, dan volumes
docker-compose down -v

# Hapus images (opsional)
docker rmi portolilis-app 2>/dev/null || true
```

## 🗂️ Step 3: Hapus Project Directory

```bash
# Hapus directory project
cd /usr/src/www
rm -rf portolilis

# Verifikasi
ls -la /usr/src/www/
```

## 🔧 Step 4: Hapus Nginx Config (Opsional)

```bash
# Hapus config Nginx untuk lailycharlesfebriana.site
sudo rm -f /etc/nginx/sites-available/lailycharlesfebriana.site
sudo rm -f /etc/nginx/sites-enabled/00-lailycharlesfebriana.site
sudo rm -f /etc/nginx/sites-enabled/01-lailycharlesfebriana.site

# Test dan reload Nginx
sudo nginx -t
sudo systemctl reload nginx
```

## 🔐 Step 5: Hapus SSL Certificate (Opsional)

```bash
# Hapus SSL certificate untuk lailycharlesfebriana.site
sudo certbot delete --cert-name lailycharlesfebriana.site

# Atau hapus manual
sudo rm -rf /etc/letsencrypt/live/lailycharlesfebriana.site
sudo rm -rf /etc/letsencrypt/archive/lailycharlesfebriana.site
sudo rm -rf /etc/letsencrypt/renewal/lailycharlesfebriana.site.conf
```

## ✅ Step 6: Verifikasi Cleanup

```bash
# Cek containers
docker ps -a | grep portolilis

# Cek images
docker images | grep portolilis

# Cek directory
ls -la /usr/src/www/ | grep portolilis

# Cek Nginx config
ls -la /etc/nginx/sites-enabled/ | grep lailycharlesfebriana

# Cek SSL
sudo certbot certificates | grep lailycharlesfebriana
```

## 🎯 Script Cleanup Lengkap (Satu Perintah)

```bash
#!/bin/bash
# Script Cleanup Project di VPS

echo "⚠️  PERINGATAN: Script ini akan menghapus semua data project!"
read -p "Apakah Anda yakin? (yes/no): " confirm

if [ "$confirm" != "yes" ]; then
    echo "❌ Dibatalkan!"
    exit 1
fi

# Backup database
echo "📦 Backup database..."
cd /usr/src/www/portolilis
docker-compose exec mysql mysqldump -u portolilis_user -pportolilis_password portolilis > backup_$(date +%Y%m%d_%H%M%S).sql 2>/dev/null || echo "⚠️  Backup database gagal"

# Stop dan hapus containers
echo "🛑 Stop containers..."
docker-compose down -v 2>/dev/null || true

# Hapus images
echo "🗑️  Hapus images..."
docker rmi portolilis-app 2>/dev/null || true

# Hapus directory
echo "🗂️  Hapus directory..."
cd /usr/src/www
rm -rf portolilis

# Hapus Nginx config
echo "🔧 Hapus Nginx config..."
sudo rm -f /etc/nginx/sites-available/lailycharlesfebriana.site
sudo rm -f /etc/nginx/sites-enabled/*lailycharlesfebriana.site*

# Reload Nginx
sudo nginx -t && sudo systemctl reload nginx

echo "✅ Cleanup selesai!"
```

## 📝 Catatan

- **Backup dulu!** Pastikan semua data penting sudah di-backup
- **SSL Certificate** akan tetap ada di Let's Encrypt (bisa digunakan lagi)
- **Database backup** akan tersimpan di `/usr/src/www/portolilis/backup_*.sql` (jika masih ada)
- **Nginx config** untuk `althaf.site` **TIDAK AKAN TERGANGGU**

## 🔄 Setelah Cleanup

Setelah cleanup, Anda bisa:
1. Clone project baru dari GitHub
2. Setup ulang dengan konfigurasi yang sudah diperbaiki
3. Restore database dari backup (jika perlu)

