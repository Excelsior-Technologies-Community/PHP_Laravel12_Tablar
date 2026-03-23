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