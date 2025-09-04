# Car Sales Platform — Laravel 12 

A **car sales platform** built with **Laravel 12**. This repository is a learning/demo project that showcases the Laravel ecosystem: routing, controllers, Eloquent models, Blade views, validation, database migrations, asset bundling with Vite, and automated tests.

---

## Demo

https://jakubpachut.duckdns.org/

---

## Table of Contents

- [Tech Stack](#tech-stack)
- [Project Highlights](#project-highlights)
- [Quick Start](#quick-start)
  - [Prerequisites](#prerequisites)
  - [Clone & Install](#clone--install)
  - [Environment Setup](#environment-setup)
  - [Create the Database](#create-the-database)
  - [Run Migrations (and Seeders)](#run-migrations-and-seeders)
  - [Build Frontend Assets](#build-frontend-assets)
  - [Serve the App](#serve-the-app)
- [Project Structure](#project-structure)
- [Core Laravel Concepts Used](#core-laravel-concepts-used)
- [Common Artisan Commands](#common-artisan-commands)
- [Testing](#testing)
- [Troubleshooting](#troubleshooting)
- [Roadmap](#roadmap)
- [Contributing](#contributing)
- [Acknowledgements](#acknowledgements)

---

## Tech Stack

- **Framework:** Laravel 12.x (PHP framework)
- **Language:** PHP 8.2+
- **Templating:** Blade
- **Frontend tooling:** Vite (NPM)
- **Database:** MySQL (or SQLite for quick local runs)
- **Testing:** PHPUnit / Pest-compatible (`phpunit.xml` present)

> The repository already contains the standard Laravel layout (e.g., `app/`, `bootstrap/`, `config/`, `database/`, `public/`, `resources/`, `routes/`, `storage/`, `tests/`) plus `composer.json`, `package.json`, `vite.config.js`, `.env.example`, and `phpunit.xml` so you can run it locally right away.

---

## Project Highlights

- Clean, conventional **MVC** structure (Controllers, Models, Views)
- **RESTful routes** in `routes/web.php`
- **Eloquent ORM** for database access and relationships
- **Blade** templates for server-rendered UI
- **Validation** with Form Requests / controller validation
- **Vite**-powered asset bundling (`npm run dev` / `npm run build`)
- Ready for **tests** via PHPUnit (`php artisan test`)

> Since this is a demo app, you can freely extend it with features like “listings”, “brands/models”, “images”, “filters” and more.

---

## Quick Start

### Prerequisites

- **PHP**: 8.2 or newer (with common extensions: OpenSSL, PDO, Mbstring, Tokenizer, XML, Ctype, Fileinfo, Curl, DOM)
- **Composer**: latest
- **Node.js** & **npm** (or Bun): latest LTS recommended
- **Database**: MySQL 8+ (or SQLite)

### Clone & Install

```bash
# 1) Clone
git clone https://github.com/Szafter12/Car-sales-platform-laravel.git
cd Car-sales-platform-laravel

# 2) Install PHP deps
composer install

# 3) Install JS deps
npm install
```

> If Composer complains about your PHP version, update PHP to >= 8.2. Avoid using `--ignore-platform-reqs` in real projects.

### Environment Setup

Copy the example environment and generate an app key:

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your local settings, e.g.:

```dotenv
APP_NAME="Car Sales Platform"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

# Database (MySQL example)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=car_sales
DB_USERNAME=root
DB_PASSWORD=secret

# Or use SQLite for a zero-config DB:
# DB_CONNECTION=sqlite
# (then create: database/database.sqlite)
```

### Create the Database

**MySQL:** Create a database named `car_sales` (or match your `.env`).  
**SQLite:** Create a file:

```bash
mkdir -p database
touch database/database.sqlite
```

And set `DB_CONNECTION=sqlite` in `.env` (comment out other DB_* lines).

### Run Migrations (and Seeders)

```bash
php artisan migrate
# Optional: if you add seeders in the future
php artisan db:seed
```

If you need a fresh reset during development:

```bash
php artisan migrate:fresh --seed
```

### Build Frontend Assets

```bash
# Dev (watches for changes)
npm run dev

# Production build
npm run build
```

If you use Blade templates with Vite, make sure your layout includes `@vite([...])` for your entry files (e.g., `resources/js/app.js`, `resources/css/app.css`).

### Serve the App

You can use Laravel’s built-in server:

```bash
php artisan serve
# Visit http://127.0.0.1:8000
```

---

## Project Structure

A quick overview of the repository layout (key folders/files):

```
.
├── app/                 # Application code (Models, Http/Controllers, etc.)
├── bootstrap/           # App bootstrap and cache
├── config/              # Configuration files
├── database/            # Migrations (and optionally factories/seeders)
├── public/              # Web server document root (index.php, assets)
├── resources/           # Blade views, CSS/JS (Vite) and other assets
├── routes/              # Route definitions (web.php, etc.)
├── storage/             # Logs, compiled views, file storage
├── tests/               # Automated tests
├── .env.example         # Example environment file
├── composer.json        # PHP dependencies
├── package.json         # JS dependencies
├── vite.config.js       # Vite configuration
└── phpunit.xml          # PHPUnit configuration
```

> Tip: To serve user-uploaded files from `storage/app/public`, run `php artisan storage:link` which symlinks to `public/storage`.

---

## Core Laravel Concepts Used

- **Routing:** `routes/web.php` defines your HTTP endpoints for the web UI. Group routes with middleware when needed.
- **Controllers:** Handle request/response logic and call the domain layer (models/services).
- **Models & Eloquent:** Encapsulate business/data logic; define relationships and query scopes.
- **Migrations:** Version your database schema so the project is reproducible.
- **Validation:** Keep controllers lean by validating with form requests or `validate()`.
- **Views (Blade):** Server-rendered pages with Blade components/partials.
- **Assets (Vite):** Modern, fast asset pipeline with hot reloading in dev.
- **Testing:** Use `php artisan test` to run unit/feature tests and keep regressions away.

---

## Common Artisan Commands

```bash
# Generate resources
php artisan make:model Car -mcr        # model + migration + controller (resource)
php artisan make:request StoreCarRequest
php artisan make:seeder CarSeeder

# Database
php artisan migrate
php artisan migrate:fresh --seed

# Cache & config
php artisan optimize:clear
php artisan config:cache
php artisan route:list

# Testing
php artisan test
```

---

## Testing

- Run the test suite:

```bash
php artisan test
# or
./vendor/bin/phpunit
```

- Configure test database in `.env.testing` if needed (Laravel picks it up automatically when running tests).

---

## Troubleshooting

- **Composer platform errors:** Ensure PHP ≥ 8.2 and required extensions are enabled.
- **SQL connection fails:** Check `.env` credentials and that MySQL is running; for SQLite, point to an existing file.
- **Assets not loading in prod:** Run `npm run build` and ensure Blade includes `@vite` with the correct entry points.
- **404 on routes:** Run `php artisan route:list` to confirm routes are registered.
- **Storage uploads not visible:** Run `php artisan storage:link`.

---

## Acknowledgements

- [Laravel Documentation](https://laravel.com/docs)
- [Vite](https://vitejs.dev/)

---

_This project is for **learning purposes**. Feel free to extend it, refactor it, and experiment!_
