# Iran Rush Admin Panel

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

## Overview
The Iran Rush Admin Panel is a comprehensive management interface built with Laravel, featuring a component-based Blade template system with JavaScript and Bootstrap for the frontend.


## Features
- 🛠 **User Management** - Create, edit, and manage admin users
- 📝 **Content Management** - Manage all platform content
- 📊 **Dashboard** - Platform statistics overview
- 🔐 **Role-Based Access Control** - Multi-level admin permissions
- 📱 **Responsive Design** - Optimized for all devices

## Installation

### Prerequisites
- PHP 8.0+
- Composer 2.0+
- Node.js 16+
- MySQL 5.7+

### Setup Instructions
```bash
# Clone repository
git clone https://github.com/your-repo/iran-rush-admin.git
cd iran-rush-admin

# Configure environment
cp .env.example .env
php artisan key:generate

# Set up database (edit .env first)
php artisan migrate --seed

# Start development server
php artisan serve