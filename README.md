

<h1 align="center">Personal Portfolio – Laravel Livewire</h1>

<p align="center">
  A modern, dynamic, and customizable developer portfolio built with Laravel, Livewire, and Tailwind CSS.
</p>

<p align="center">
  <strong>Cartoony UI • Illustrations • Interactive • Scalable</strong>
</p>

---

## ✨ About The Project

This project is my **personal portfolio website**, designed to showcase my skills, projects, and career journey in a **fun, visual, and interactive way**.

Instead of using a static frontend or heavy JavaScript frameworks, the portfolio relies on **Laravel Livewire** to deliver a smooth SPA-like experience while keeping the backend clean and maintainable.

The goal is to create a portfolio that feels **alive**, **playful**, and **professional at the same time**.

---

## 🎨 Design & Style

- 🧩 **Cartoony / illustrated style**
- 🎯 Friendly UI with soft colors and playful layouts
- 💡 Focus on clarity, storytelling, and personality
- ⚡ Smooth interactions without excessive JavaScript

This design choice makes the portfolio stand out from traditional, overly minimal portfolios.

---

## 🚀 Features

### Public Side
- Dynamic **Home**, **About**, **Projects**, **Career**, and **Contact** sections
- Projects displayed with categories and descriptions
- Career timeline (education, experience, certifications, languages)
- Responsive design for all devices
- Contact form with database storage

### Admin Dashboard
- Full admin panel built with Livewire
- Manage:
  - Profile information
  - Projects
  - Skills (with levels & categories)
  - Education & experience
  - Certifications & languages
  - Messages from visitors
- Clean CRUD system without page reloads

---

## 🧠 Planned Features

- 🤖 **AI Agent**  
  A future AI assistant that represents *me* and answers visitor questions about:
  - My skills
  - My projects
  - My experience

- 📄 **CV Downloader**
  - Downloadable CV (PDF)
  - Auto-updated from database content

---

## 🛠️ Tech Stack

### Backend
- **Laravel**
- **Livewire** (main interaction layer)
- Eloquent ORM
- Laravel Authentication & Authorization

### Frontend
- **Blade**
- **Tailwind CSS**
- Minimal JavaScript (only where necessary)

### Database
- PostgreSQL 15 (local via Docker Compose `db` service, production on Render `portfolio-db`)
- SQLite `:memory:` only for fast PHPUnit tests (`phpunit.xml`); all app code uses `pgsql`

### Tooling
- Vite
- Composer
- npm

---

## 🧩 Architecture Philosophy

- Server-driven UI using Livewire
- Clear separation between:
  - Business logic
  - UI components
  - Data models
- Easy to extend (React / API ready if needed later)

This makes the project **scalable**, **maintainable**, and **future-proof**.

---

## 📸 Screenshots

> Screenshots will be added soon.

---

## ⚙️ Installation (Local)

**With Docker (Recommended — PostgreSQL):**
```bash
git clone https://github.com/your-username/your-repo.git
cd your-repo

# .env is already pgsql (DB_HOST=db for Docker); .env.docker is the Docker source
docker compose up --build
# -> Postgres 15 at db:5432, app at http://localhost:8080
# Migrations + PortfolioDataSeeder run automatically on container start

# For local artisan outside Docker (optional):
# cp .env.example .env  # then set DB_HOST=127.0.0.1 DB_DATABASE=portfolio
# php artisan migrate --seed
```

**Without Docker (local Postgres required):**
```bash
composer install
npm install
npm run build

cp .env.example .env        # already DB_CONNECTION=pgsql
php artisan key:generate
# Ensure Postgres 15 is running and DB portfolio/portfolio/secret exists:
# createdb -h 127.0.0.1 -U portfolio portfolio  (or use docker compose db)
php artisan migrate --seed

php artisan serve
