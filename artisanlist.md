## Server

php artisan serve

## Migration

php artisan migrate
php artisan make:migration create_products_table
php artisan migrate:fresh

php artisan migrate:rollback --path=/database/migrations/2025_06_19_150315_create_contacts_table.php
php artisan migrate --path=/database/migrations/2025_06_19_150315_create_contacts_table.php


php artisan view:clear
php artisan cache:clear
php artisan config:clear
php artisan route:clear

## CRUD

- composer require ibex/crud-generator --dev

php artisan make:crud atendidos api 

## Artisan

php artisan r:l

## Icons 

https://heroicons.com/


## Livewire

php artisan make:livewire name