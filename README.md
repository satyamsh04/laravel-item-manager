# 💼 Laravel Item Manager

A full-stack **inventory management web application** built with **Laravel (PHP)** and **Vite**, featuring full CRUD functionality, relational database management, and authenticated user sessions.

## ✨ Features

- **Full CRUD Operations** — Create, read, update, and delete items with form validation
- **User Authentication** — Secure login and session management via Laravel's auth scaffolding
- **Relational Database** — Eloquent ORM with MySQL, migrations, and seeders
- **MVC Architecture** — Clean separation of controllers, models, views, and routes
- **Blade Templating** — Reusable Laravel Blade components and layouts
- **Vite Asset Bundling** — Modern frontend build pipeline

## 🛠️ Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP, Laravel |
| Frontend | Blade Templates, HTML/CSS |
| Database | MySQL (Eloquent ORM) |
| Build Tool | Vite |
| Testing | PHPUnit |

## 📁 Project Structure

```
laravel-item-manager/
├── app/            # Models, Controllers, Middleware
├── database/       # Migrations and seeders
├── resources/      # Blade views and frontend assets
├── routes/         # Web and API route definitions
├── tests/          # PHPUnit test cases
└── items/          # Item-specific resources
```

## 🚀 Getting Started

### Prerequisites
- PHP 8.1+
- Composer
- MySQL
- Node.js (for Vite)

### Installation

```bash
# Clone the repo
git clone https://github.com/satyamsh04/laravel-item-manager.git
cd laravel-item-manager

# Install PHP dependencies
composer install

# Install frontend dependencies
npm install

# Set up environment
cp .env.example .env
php artisan key:generate
```

### Database Setup

```bash
# Update DB credentials in .env, then:
php artisan migrate
php artisan db:seed
```

### Run the App

```bash
# Start Laravel server
php artisan serve

# Start Vite dev server (separate terminal)
npm run dev
```

Visit `http://localhost:8000`

## 📚 What I Learned

- Building production-style MVC web apps with Laravel
- Designing relational schemas with Eloquent migrations
- Implementing full CRUD with server-side validation
- Using PHPUnit for feature and unit testing

---

*Built as part of Griffith University CS curriculum — Satyam Sharma*
