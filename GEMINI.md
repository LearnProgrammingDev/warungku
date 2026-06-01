# Warungku Project Context

## Project Overview
**Warungku** (My Shop) is a web-based e-commerce or point-of-sale application built with **Laravel 12** and **PHP 8.2+**. It provides a customer-facing interface for browsing menus, adding items to a shopping cart, and proceeding to checkout. 

### Key Technologies
*   **Backend Framework:** Laravel 12.x
*   **Language:** PHP 8.2+
*   **Frontend Bundler:** Vite
*   **Styling:** Tailwind CSS v4 (@tailwindcss/vite)
*   **Templating:** Laravel Blade (`resources/views/customer/`)
*   **Database:** Configured via Eloquent ORM (Models: `User`, `Role`, `Category`, `Item`, `Order`, `OrderItem`).

## Project Architecture & Structure
This project follows the standard Laravel MVC architectural pattern:

*   **Controllers:** The main logic for the customer interface is handled in `app/Http/Controllers/MenuController.php`.
*   **Models:** Core business entities are located in `app/Models/` and include structures for users, roles, menu items, categories, and orders.
*   **Views:** Customer-facing views are located in `resources/views/customer/` and use Blade templating with layouts.
*   **Routes:** Defined in `routes/web.php`, handling main pages like `/menu`, `/cart`, and `/checkout`.
*   **Assets:** Raw CSS and JS are in `resources/css/` and `resources/js/` respectively, processed by Vite. Additional static assets might reside in `public/assets/`.

## Building and Running

To run this application locally, you will need PHP, Composer, Node.js, and npm installed.

### Initial Setup
1. Copy the environment file: `cp .env.example .env`
2. Install PHP dependencies: `composer install`
3. Generate application key: `php artisan key:generate`
4. Set up the database (requires configuring `.env` first): `php artisan migrate --seed` (assuming seeders are configured)
5. Install Node dependencies: `npm install`

### Development Server
You can run the application using the predefined Composer script which uses Concurrently to start the Laravel server, Queue listener, and Vite dev server all at once:

```bash
composer run dev
```

Alternatively, you can run them manually:
*   Start the Laravel backend server: `php artisan serve`
*   Start the Vite frontend development server: `npm run dev`

### Production Build
To compile frontend assets for production:
```bash
npm run build
```

## Development Conventions
*   **Styling:** Utility-first styling is enforced using Tailwind CSS. 
*   **Routing:** Standard Laravel route definitions utilizing named routes (e.g., `Route::get('/menu')->name('menu')`).
*   **Testing:** PHPUnit is configured for unit and feature testing (`tests/` directory). Run tests via `composer run test` or `php artisan test`.
*   **Cart Logic:** Cart operations (add, update, remove) are currently handled via POST requests to specific endpoints handled by `MenuController`.
