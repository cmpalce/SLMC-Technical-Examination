#!/bin/sh

cd /home/vagrant/code/backend
composer install

if [ ! -f '/home/vagrant/code/backend/.env' ]; then
    cp /home/vagrant/code/backend/.env.dev /home/vagrant/code/backend/.env
fi

php artisan migrate:fresh
php artisan users:fetch

cd /home/vagrant/code/frontend/
npm install
npm run build
