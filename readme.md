# Laravel 5.8 E-Commerce Application

## Overview

This project is an **E-Commerce Application** built using Laravel 5.8. It provides a robust platform for online shopping with features like product management, customer accounts, shopping carts, and order processing. The application is designed for scalability and offers a clean and user-friendly interface for both administrators and customers.

---

## Features

### Admin Panel
- Manage products, categories, and inventory.
- View and process customer orders.
- Manage users and their roles.
- Generate sales reports.

### Customer Module
- Browse products by categories and search functionality.
- Add products to the shopping cart and checkout.
- Manage user profiles and order history.
- Real-time email notifications for orders.

### Additional Features
- Secure authentication (login, registration, and password reset).
- Responsive design for mobile and desktop users.
- Payment gateway integration (e.g., Stripe/PayPal).
- SEO-friendly URLs.

---

## Technology Stack

- **Framework**: Laravel 5.8
- **Frontend**: Blade Templates, Bootstrap, jQuery
- **Database**: MySQL
- **Payment Gateway**: Stripe (or configurable)
- **Server Requirements**:
  - PHP >= 7.1.3
  - OpenSSL, PDO, Mbstring, Tokenizer, XML, GD, and Fileinfo PHP extensions.

---

## Installation

1. **Clone the Repository**  
   ```bash
   git clone https://github.com/mamunur6286/ecom-laravel.git
   ## Installation

### Navigate to Project Folder  
```bash
cd ecommerce-laravel
composer install

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ecommerce
DB_USERNAME=root
DB_PASSWORD=

php artisan serve


