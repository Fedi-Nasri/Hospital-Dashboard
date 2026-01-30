# Hospital Dashboard 🏥
![PHP](https://img.shields.io/badge/PHP-8.0--8.1-blue)
![Symfony](https://img.shields.io/badge/Symfony-Legacy-orange)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-13+-blue)
![Docker](https://img.shields.io/badge/Docker-Ready-blue)

A web-based hospital management dashboard designed to monitor patients, doctors, consultations, and hospital indicators through interactive tables and visual analytics.

This project was developed during an internship at the **Centre Informatique du Ministère de la Santé (Tunisia)** and focuses on **data visualization, filtering, and operational monitoring** for healthcare facilities.

> ⚠️ Note: The project uses an **older Symfony version**, therefore **Docker is the recommended way** to run and maintain it.

---
## 🔗 Quick Navigation

- [🚀 Key Features](#-key-features)
- [🧠 Tech Stack](#-tech-stack)
- [🏗️ Project Architecture](#️-project-architecture)
- [🐳 Docker Setup (Recommended)](#-option-1--docker-setup-recommended)
- [💻 Local Setup](#-option-2--local-setup-not-recommended)

---

## 🚀 Key Features

### Patient Management
- Patient identification module
- Patient personal details and consultation history
- Searchable and filterable patient table

### Doctor Management
- Doctor identification module
- Doctor profile (specialty, qualifications)
- Consultation history per doctor

### Consultations
- Centralized consultation table
- Advanced filtering and search
- Daily and historical consultation tracking

### Hospital Dashboard (Analytics)
- Total patients & daily admissions
- Total doctors
- Total consultations (daily & global)
- Interactive charts:
  - Patient admissions over time
  - Patient distribution by gender and age
  - Hospital bed availability (occupied vs available)

---

## 🧠 Tech Stack

### Backend
- **PHP**
- **Symfony (Legacy version)**

### Frontend
- **Twig** (Server-side rendering with Symfony)
- HTML5 & CSS3
- JavaScript
- Chart-based data visualization

### Database
- **PostgreSQL**

### DevOps / Tooling
- Docker
- Docker Compose
- Composer

---

## 🏗️ Project Architecture

```text
Hospital-Dashboard/
├── src/                # Application logic (Controllers, Services, Entities)
├── templates/          # Twig templates (UI)
├── public/             # Public assets
├── assets/             # Frontend resources
├── migrations/         # Database migrations
├── config/             # Symfony configuration
├── tests/              # Automated tests
├── docker/             # Docker configuration
├── compose.yaml        # Docker Compose setup
├── .env                # Environment variables
└── README.md

````

---

# 🧩 SETUP OPTIONS

You can run this project in **two ways**:

1. **Docker (Recommended ✅)**
2. **Local installation (Advanced / Not recommended)**

---

# 🐳 OPTION 1 — Docker Setup (Recommended)

### Why Docker?

* Avoid PHP/Symfony version conflicts
* Works on any OS
* Best way to run legacy Symfony projects

---

## 🔧 Requirements

* Docker **20+**
* Docker Compose **v2+**

Check installation:

```bash
docker --version
docker compose version
```

---

## ⚙️ Environment Configuration

Create a `.env.local` file:

```env
APP_ENV=dev
APP_SECRET=change_this_secret

DATABASE_URL="pgsql://postgres:postgres@db:5432/hospital_db"
```

---

## ▶️ Run the Project with Docker

```bash
# Clone the repository
git clone https://github.com/Fedi-Nasri/Hospital-Dashboard.git
cd Hospital-Dashboard

# Build and start containers
docker compose up --build
```

Application will be available at:

```
http://localhost:8000
```

---

## 🗄️ Database Initialization (Docker)

Run migrations inside the container:

```bash
docker compose exec app php bin/console doctrine:migrations:migrate
```

(Optional) Load fixtures if available:

```bash
docker compose exec app php bin/console doctrine:fixtures:load
```

---


## 🧪 Run Tests (Docker)

```bash
docker compose exec app php bin/phpunit
```

---

# 💻 OPTION 2 — Local Setup (Not Recommended)

⚠️ This method may cause issues due to legacy dependencies.

---

## 🔧 Local Requirements

| Component          | Required Version |
| ------------------ | ---------------- |
| PHP                | **8.0 – 8.1**    |
| Composer           | **2.x**          |
| Symfony CLI        | Latest           |
| PostgreSQL         | **13+**          |
| Node.js (optional) | 16+              |

---

## 🔧 Install Dependencies

```bash
# Clone repository
git clone https://github.com/Fedi-Nasri/Hospital-Dashboard.git
cd Hospital-Dashboard

# Install PHP dependencies
composer install
```

---

## ⚙️ Configure Environment

Update `.env.local`:

```env
APP_ENV=dev
APP_SECRET=change_this_secret

DATABASE_URL="pgsql://postgres:password@127.0.0.1:5432/hospital_db"
```

---

## 🗄️ Database Setup (Local)

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

---

## ▶️ Run the Server (Local)

```bash
symfony server:start
```

Access:

```
http://localhost:8000
```

---
---

## 👨‍💻 Realized By

**Fedi Nasri**  
Computer Engineering Student  

- 🔗 LinkedIn: [https://www.linkedin.com/in/fedinasri](https://www.linkedin.com/in/fedinasri)
- 📧 Email: [fedinasri.fsb@gmail.com](mailto:fedinasri.fsb@gmail.com)

This project was developed as part of a professional internship in the healthcare IT sector, focusing on data monitoring, visualization, and hospital management systems.

