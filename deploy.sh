#!/bin/bash
set -e

git pull

composer install --no-dev --optimize-autoloader

php artisan optimize:clear

echo "Deploy hotový"
