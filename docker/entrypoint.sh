#!/bin/sh
set -e

echo "🚀 Starting Laravel Application Setup..."

# Wait for MySQL to be ready
echo "⏳ Waiting for MySQL..."
max_attempts=30
attempt=0

while [ $attempt -lt $max_attempts ]; do
    if php artisan migrate:status &> /dev/null 2>&1; then
        echo "✅ MySQL is ready!"
        break
    fi
    attempt=$((attempt + 1))
    echo "MySQL is unavailable - sleeping (attempt $attempt/$max_attempts)"
    sleep 2
done

if [ $attempt -eq $max_attempts ]; then
    echo "⚠️ Warning: MySQL connection timeout, but continuing..."
fi

# Check if .env exists, if not copy from .env.example
if [ ! -f .env ]; then
    echo "📝 Creating .env file from .env.example..."
    if [ -f .env.example ]; then
        cp .env.example .env
    else
        echo "⚠️ Warning: .env.example not found!"
    fi
fi

# Generate application key if not set
if ! grep -q "APP_KEY=base64" .env 2>/dev/null || ! grep -q "APP_KEY=" .env 2>/dev/null; then
    echo "🔑 Generating application key..."
    php artisan key:generate --force || echo "⚠️ Warning: Could not generate key"
fi

# Run migrations
echo "📦 Running database migrations..."
php artisan migrate --force || echo "⚠️ Warning: Migration failed, but continuing..."

# Create storage link if not exists
if [ ! -L public/storage ]; then
    echo "🔗 Creating storage symlink..."
    php artisan storage:link || echo "⚠️ Warning: Could not create storage link"
fi

# Set permissions
echo "🔐 Setting permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Optimize Laravel (untuk performa)
echo "🧹 Optimizing application..."
php artisan config:cache || echo "⚠️ Warning: Config cache failed"
php artisan route:cache || echo "⚠️ Warning: Route cache failed"
php artisan view:cache || echo "⚠️ Warning: View cache failed"

echo "✅ Setup complete! Starting PHP-FPM..."

# Execute the main command
exec "$@"
