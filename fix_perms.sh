#!/bin/bash
# fix_perms.sh - A script to fix file permissions for a Laravel project

# Change ownership to www-data for all files and directories
chown -R www-data:www-data .

# Set file permissions to 644 for all files
find . -type f -exec chmod 644 {} \;

# Set directory permissions to 755 for all directories
find . -type d -exec chmod 755 {} \;

# Change group ownership of storage and bootstrap/cache directories to www-data
chgrp -R www-data storage bootstrap/cache

# Set read, write, and execute permissions for user and group on storage and bootstrap/cache
chmod -R ug+rwx storage bootstrap/cache

echo "Permissions fixed successfully!"
