# Flight Availability Check Application

## Overview

This project is a simple flight availability check application designed to allow administrators to add new flights and users to search for available flights. The application uses Laravel for the backend and can be paired with Vue.js, React.js, or AngularJS for the frontend. Tailwind CSS or Bootstrap is used for styling.

## Technical Stack

- **Backend**: Laravel
- **Frontend**: Vue.js
- **UI Framework**: Tailwind CSS / Bootstrap

## Directory Structure

/project-root
│
├── app/                  # Application code
│   ├── Http/
│   ├── Models/
│
├── bootstrap/            # Bootstrap files
│
├── config/               # Configuration files
│
├── database/             # Database migrations and seeds
│   ├── migrations/       # Database migrations
│   ├── seeders/          # Database seeders
│
├── public/               # Public assets
│
├── resources/            # Frontend assets
│   ├── css/              # CSS files
│   ├── js/               # JavaScript files
│   └── views/            # Blade templates or other view files
│
├── routes/               # Application routes
│
├── storage/              # Storage for logs, file uploads, etc.
│
├── tests/                # Application tests
│
├── .env.example          # Example environment configuration file
├── .gitignore            # Git ignore file
├── composer.json         # Composer dependencies
├── package.json          # Node.js dependencies
└── README.md             # This file


```bash
git clone <repository-url>
cd <repository-directory>

cp .env.example .env

composer install

php artisan migrate

php artisan db:seed --class=AdminUserSeeder

npm run dev

php artisan serve