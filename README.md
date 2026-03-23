# PHP_Laravel12_Tablar



## Project Description

PHP_Laravel12_Tablar is a Laravel 12 project that demonstrates how to create a modern, responsive admin dashboard using the Tablar CSS/JS framework.

The dashboard is self-contained, fully dark-mode compatible, and includes metric cards, recent users, and status badges without relying on Blade layouts (@extends).

It is perfect for beginners to learn how to integrate third-party frontend frameworks into Laravel 12.



## Features

- Fully responsive dashboard with dark-mode support

- Metric cards: Users, Revenue, Orders, Tickets with hover effects and gradients

- Recent users grid with avatars, roles, and status badges (Active, Pending, Inactive)

- Self-contained Blade page without @extends

- Easy manual asset integration (Tablar CSS/JS)

- Ready-to-use route for /dashboard

- Clean modern UI using Tablar styling



## Technologies Used


- Backend: Laravel 12 (PHP 8.x)

- Frontend: Tablar Dashboard (CSS/JS), HTML5, TailwindCSS utility classes

- Database: MySQL (optional)

- Asset Compilation: Node.js, Vite, npm

- Compatibility: Modern browsers (Chrome, Firefox, Edge)



---



## Installation Steps


---


## STEP 1: Create Laravel 12 Project

### Open terminal / CMD and run:

```
composer create-project laravel/laravel PHP_Laravel12_Tablar "12.*"

```

### Go inside project:

```
cd PHP_Laravel12_Tablar

```

#### Explanation:

Installs a fresh Laravel 12 application and moves into the project folder to start development.





## STEP 2: Database Setup (Optional)

### Update database details:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel12_Tablar
DB_USERNAME=root
DB_PASSWORD=

```

### Create database in MySQL / phpMyAdmin:

```
Database name: laravel12_Tablar

```

### Then Run:

```
php artisan migrate

```


#### Explanation:

Connects Laravel to MySQL and creates the default tables like users, password_resets, etc.



## STEP 3: Install Tablar Package

### Run:

```
composer require takielias/tablar

```

#### Explanation:

Adds Tablar dashboard package to your Laravel project for ready-made CSS/JS dashboard components.




## STEP 4: Install Frontend Dependencies & Build Assets

### Run:

```
npm install

npm run dev

```

#### Explanation:

Installs Node.js dependencies and compiles the CSS/JS assets required by Tablar for the dashboard.




## STEP 5: Create Self-contained Blade Page

### Create file: resources/views/dashboard.blade.php

```
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard | PHP_Laravel12_Tablar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tabler CSS -->
    <link href="{{ asset('vendor/tablar/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/tablar/dist/css/demo.min.css') }}" rel="stylesheet" />

    <style>
        body {
            background-color: #0f172a;
            color: #e2e8f0;
            font-family: 'Inter', sans-serif;
        }

        .page-header {
            margin-bottom: 30px;
        }

        .page-title {
            color: #f8fafc;
            font-weight: bold;
        }

        .page-subtitle {
            color: #94a3b8;
        }

        /* Metrics Grid */
        .metrics-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .metric-card {
            width: 220px;
            /* medium width */
            border-radius: 16px;
            padding: 25px;
            color: #fff;
            position: relative;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .metric-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .metric-icon {
            font-size: 40px;
            opacity: 0.2;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        /* Recent Users Grid */
        .users-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            margin-bottom: 50px;
        }

        /* User Card Style */
        .user-card {
            background: #1e293b;
            /* uniform dark color */
            width: 200px;
            /* medium width */
            border-radius: 12px;
            padding: 25px 15px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .user-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin: 0 auto 15px;
            background-color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            color: #fff;
        }

        .user-name {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .user-role {
            font-size: 0.875rem;
            color: #94a3b8;
            margin-bottom: 10px;
        }

        /* Status Badge */
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            display: inline-block;
        }

        .badge-active {
            background: #22c55e;
            color: #fff;
        }

        .badge-pending {
            background: #f97316;
            color: #fff;
        }

        .badge-inactive {
            background: #ef4444;
            color: #fff;
        }
    </style>
</head>

<body class="antialiased border-top-wide border-primary d-flex flex-column">
    <script src="{{ asset('vendor/tablar/dist/js/tabler.min.js') }}"></script>

    <!-- Header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title" style="margin-left: 700px;">Dashboard</h2>
                    <div class="page-subtitle" style="margin-left: 600px;">Welcome to PHP_Laravel12_Tablar Admin</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xl">

        <!-- Metrics Cards -->
        <div class="metrics-grid">
            <div class="metric-card" style="background: linear-gradient(135deg, #2563eb, #3b82f6);">
                <div class="metric-icon">👥</div>
                <h3>Users</h3>
                <h1>125</h1>
                <p class="text-green">+5% since last week</p>
            </div>

            <div class="metric-card" style="background: linear-gradient(135deg, #16a34a, #22c55e);">
                <div class="metric-icon">💰</div>
                <h3>Revenue</h3>
                <h1>$8,250</h1>
                <p class="text-green">+12% since last week</p>
            </div>

            <div class="metric-card" style="background: linear-gradient(135deg, #ea580c, #f97316);">
                <div class="metric-icon">📦</div>
                <h3>Orders</h3>
                <h1>73</h1>
                <p class="text-red">-2% since last week</p>
            </div>

            <div class="metric-card" style="background: linear-gradient(135deg, #dc2626, #ef4444);">
                <div class="metric-icon">🎫</div>
                <h3>Tickets</h3>
                <h1>42</h1>
                <p class="text-green">+3% since last week</p>
            </div>
        </div>

        <!-- Recent Users -->
        <h3 style="margin-top: 40px; margin-bottom: 20px; margin-left: 700px;">Recent Users</h3>
        <div class="users-grid">
            <div class="user-card">
                <div class="user-avatar">JD</div>
                <div class="user-name">John Doe</div>
                <div class="user-role">Admin</div>
                <span class="badge badge-active">Active</span>
            </div>

            <div class="user-card">
                <div class="user-avatar">JS</div>
                <div class="user-name">Jane Smith</div>
                <div class="user-role">Editor</div>
                <span class="badge badge-pending">Pending</span>
            </div>

            <div class="user-card">
                <div class="user-avatar">MB</div>
                <div class="user-name">Michael Brown</div>
                <div class="user-role">User</div>
                <span class="badge badge-inactive">Inactive</span>
            </div>

            <div class="user-card">
                <div class="user-avatar">AL</div>
                <div class="user-name">Alice Lee</div>
                <div class="user-role">Editor</div>
                <span class="badge badge-active">Active</span>
            </div>

            <div class="user-card">
                <div class="user-avatar">BW</div>
                <div class="user-name">Bob White</div>
                <div class="user-role">User</div>
                <span class="badge badge-active">Active</span>
            </div>
        </div>

    </div>
</body>

</html>

```

#### Explanation:

This page contains all HTML, CSS, and JS needed for the dashboard without using @extends, making it fully self-contained.





## STEP 6: Add Route

### In routes/web.php

```
Route::get('/dashboard', function () {
    return view('dashboard');
});

```

#### Explanation:

Creates a web route to display the dashboard page when visiting /dashboard in the browser.




## STEP 7: Run the App  

### Start dev server:

```
php artisan serve

```

### Open in browser:

```
http://127.0.0.1:8000

```

#### Explanation:

Runs the application locally so you can view the self-contained Tablar dashboard in your browser.




## Expected Output:


<img src="screenshots/Screenshot 2026-03-23 143004.png" width="900">




---

## Project Folder Structure:

```
PHP_Laravel12_Tablar/
├── app/                        <-- Application logic (Controllers, Models, Providers)
├── bootstrap/                  <-- Bootstrapping and caching
├── config/                     <-- Configuration files
├── database/                   <-- Migrations, seeders, factories
├── public/
│   ├── vendor/
│   │   └── tablar/             <-- Manually copied Tablar CSS/JS
│   └── index.php
├── resources/
│   ├── views/
│   │   └── dashboard.blade.php <-- Self-contained dashboard page
├── routes/
│   └── web.php                  <-- Web routes
├── storage/                     <-- Logs, compiled views, sessions
├── tests/
├── node_modules/
├── vendor/                      <-- Composer packages (including Tablar)
├── .env                         <-- Environment config
├── artisan                      <-- Laravel CLI
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```
