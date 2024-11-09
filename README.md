# App Name: My ToDo

🚀 Excited to share my new task management project "My ToDo"! 📝 With an intuitive interface and essential features, this tool allows users to:

🔹 Secure login and registration. 
🔹 Password recovery for greater accessibility. 
🔹 Advanced filters, sorting, and task search. 
🔹 Detailed view of each task. 
🔹 Real-time statistics on completed tasks. 
🔹 Profile management.

This project aims to simplify personal organization, providing a comprehensive and efficient experience for daily productivity. The code is thoroughly documented and available in a repository that you can clone.

Technologies used: Laravel 11, Tailwind CSS, Alpine.js
Happy to share and receive feedback! 💡

## Requirements

- [Git](https://git-scm.com/downloads)
- [Composer](https://getcomposer.org/download/)
- [PHP](https://www.php.net/downloads.php) >= 7.3
- [Node.js y npm](https://nodejs.org/en/download/) para el frontend (si es necesario)
- [Laravel](https://laravel.com/docs/installation) >= 8

## installation and configuration

### 1. Clone the repo

git clone https://github.com/usuario/nombre-del-repositorio.git
cd nombre-del-repositorio

### 2. Install dependencies
composer install
npm install
npm run build

### 3. Prepare the environment
cp .env.example .env
php artisan key:generate
php artisan migrate --seed

### 4. run the project
php artisan serve
