## About
Simple CRUD operation with Laravel 10.

## Installation
1. Clone this repository to your root directory.
2. Open terminal, `cd` to your project directory and type `composer install` to install dependencies.
3. Copy `.env.example` to `.env`
4. Generate application key: `php artisan key:generate`
5. Update `DB_` values in `.env` file according to your local setup.
6. Create database `crud_laravel`.
7. Run migration file to migrate db tables: `php artisan migrate`

## Generate Projects Data
1. Open terminal, `cd` to your project directory and type `php artisan tinker`.
2. Type: `Project::factory()->count(20)->create();` and press enter.
    - This will create 20 rows of data to `projects` table.
