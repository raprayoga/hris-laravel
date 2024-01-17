## Getting Started

Here are the steps to run the application.

### Prerequisites

This is things you need to use the software and how to install them.

- php 8.1 or later
- composer

### Installation & Run App

Here are the steps to run the application

1. Extract or clone the project
2. Install composer packages
   ```sh
   composer install
   ```
3. Setup .env you must put the DB credential
4. Run migration
   ```sh
   php artisan migrate
   ```
5. Run seeder
   ```sh
   php artisan db:seed --class=UserSeeder
   ```
6. Setup laravel passport
   ```sh
   php artisan passport:install
   ```