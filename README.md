# Laravel Company & Employee Management System

This is a Laravel-based application for managing **Companies** and **Employees**.  
The project includes authentication, database seeding, and CRUD operations for both modules.

---

## Requirements

Make sure the following are installed on your system:

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL (or any supported database)

## Initial Setup

Follow the steps below to set up the project locally:

composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan storage:link
php artisan db:seed

Start Laravel Server
php artisan serve

Start Frontend Server
npm run dev