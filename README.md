<p align="center">
  <a href="https://github.com/Wtedev/SAWWAH" target="_blank">
  </a>
</p>

<h1 align="center">SAWWAH 🌍</h1>

<p align="center">
  An interactive tourism platform that helps users discover destinations based on their budget and interests ✨
</p>

---

## ✨ Features
- Destination suggestions tailored to **budget and interests**  
- Comprehensive info about **countries, weather, events, and currncy**  
- User-friendly interface for travelers  
- Admin dashboard to manage destinations, events, and data

---

## 🛠️ Tech Stack
- **Laravel 11** – Backend framework  
- **MySQL** – Database  
- **Tailwind CSS** – Frontend styling  
- **APIs** – Weather & booking integrations  

---

## 🚀 Installation
```bash
git clone https://github.com/Wtedev/SAWWAH.git
cd SAWWAH
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
