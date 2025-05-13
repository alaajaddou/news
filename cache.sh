#!/bin/bash

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan event:clear
php artisan optimize:clear

# Cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
php artisan optimize

echo "All caches have been cleared and rebuilt successfully!"