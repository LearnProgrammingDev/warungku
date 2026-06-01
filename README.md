# Warungku

**Warungku** (My Shop) is a web-based e-commerce and point-of-sale (POS) application built to provide a seamless customer-facing interface for browsing menus, managing a shopping cart, and proceeding through checkout.

## 🚀 Technologies Used

This project is built using modern web development tools and frameworks:

### Backend
*   **Framework:** [Laravel 12.x](https://laravel.com/)
*   **Language:** PHP 8.2+
*   **Database:** Configured via Eloquent ORM

### Frontend
*   **Bundler:** [Vite](https://vitejs.dev/) 7.x
*   **Styling:** [Tailwind CSS v4](https://tailwindcss.com/) (`@tailwindcss/vite`)
*   **Templating:** Laravel Blade (`resources/views/customer/`)

## 🏗️ Architecture & Structure

The project follows the standard Laravel MVC architectural pattern:

*   **Controllers:** The core logic for the customer interface is handled in `app/Http/Controllers/MenuController.php`.
*   **Models:** Core business entities are located in `app/Models/` and include:
    *   `User`
    *   `Role`
    *   `Category`
    *   `Item`
    *   `Order`
    *   `OrderItem`
*   **Views:** Customer-facing views are located in `resources/views/customer/` and utilize Blade templating and layout extensions.
*   **Routes:** Defined in `routes/web.php`, handling core pages such as `/menu`, `/cart`, and `/checkout`.

## ⚙️ Installation & Setup

To run this application locally, ensure you have PHP 8.2+, [Composer](https://getcomposer.org/), [Node.js](https://nodejs.org/), and npm installed on your machine.

### 1. Clone the repository
```bash
git clone <your-repository-url>
cd warungku
```

### 2. Install PHP Dependencies
```bash
composer install
```

### 3. Install NPM Dependencies
```bash
npm install
```

### 4. Environment Configuration
Copy the example environment file and configure your local environment (especially the `DB_*` variables):
```bash
cp .env.example .env
```
Once your `.env` is configured, generate the application key:
```bash
php artisan key:generate
```

### 5. Database Setup
Run the database migrations and seed the database with initial data (Categories, Items, Users, Roles):
```bash
php artisan migrate --seed
```

## 💻 Running the Application

### Development
Warungku comes with a pre-configured Composer script that uses `concurrently` to start the Laravel server, the Queue listener, and the Vite development server simultaneously.

Run the following command:
```bash
composer run dev
```

*Alternatively, you can run these processes manually in separate terminal windows:*
*   Start the Laravel backend server: `php artisan serve`
*   Start the Vite frontend server: `npm run dev`

### Production
To compile the frontend assets for production deployment:
```bash
npm run build
```

## 🧪 Testing

PHPUnit is configured for unit and feature testing located in the `tests/` directory.

To run the tests:
```bash
composer run test
```
*or*
```bash
php artisan test
```

## 📝 Features & Logic Notes
*   **Cart Management:** Cart operations (add, update, remove) are handled via HTTP requests to specific endpoints managed by the `MenuController`.
*   **Styling:** Utility-first styling is strictly enforced using Tailwind CSS v4.

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).