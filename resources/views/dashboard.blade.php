<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | PHP_Laravel12_Tablar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('vendor/tablar/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/tablar/dist/css/demo.min.css') }}" rel="stylesheet" />
    <style>
        body {
            background-color: #f8fafc;
            color: #0f172a;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }
        .page-title {
            text-align: center;
            font-weight: bold;
        }
        .page-subtitle {
            text-align: center;
            color: #64748b;
        }
        .metrics-grid {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        .metric-card {
            width: 220px;
            border-radius: 16px;
            padding: 25px;
            background: #ffffff;
            color: #0f172a;
            text-align: center;
            position: relative;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        .metric-card:hover {
            transform: translateY(-5px);
        }
        .metric-icon {
            font-size: 40px;
            opacity: 0.2;
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .users-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            margin-bottom: 50px;
        }
        .user-card {
            background: #ffffff;
            width: 200px;
            border-radius: 12px;
            padding: 25px 15px;
            text-align: center;
            transition: 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        .user-card:hover {
            transform: translateY(-5px);
        }
        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin: 0 auto 15px;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .user-name {
            font-size: 1rem;
            font-weight: 600;
        }
        .user-role {
            font-size: 0.85rem;
            color: #64748b;
            margin-bottom: 10px;
        }
        .badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            display: inline-block;
        }
        .badge-active {
            background: #22c55e;
            color: white;
        }
        .badge-pending {
            background: #f97316;
            color: white;
        }
        .badge-inactive {
            background: #ef4444;
            color: white;
        }
        .dark-mode {
            background-color: #0b1220 !important;
            color: #ffffff !important;
        }
        .dark-mode .metric-card,
        .dark-mode .user-card {
            background: #1e293b !important;
            color: #ffffff !important;
            box-shadow: none;
        }
        .dark-mode .user-role {
            color: #94a3b8;
        }
        .dark-mode .user-avatar {
            background: #334155;
            color: #ffffff;
        }
        .toggle-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 14px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: #0f172a;
            color: #ffffff;
            z-index: 9999;
        }
        .dark-mode .toggle-btn {
            background: #ffffff;
            color: #0f172a;
        }
        .search-box {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .search-box input {
            padding: 10px;
            width: 250px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
        }
        .chart-box {
            max-width: 940px;
            margin: 30px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        .dark-mode .chart-box {
            background: #1e293b !important;
        }
    </style>
</head>
<body>

    <button class="toggle-btn" onclick="toggleTheme()">Theme</button>

    <div style="padding: 20px;">
        <h2 class="page-title">Dashboard</h2>
        <p class="page-subtitle">Welcome to PHP_Laravel12_Tablar Admin Panel</p>
    </div>

    <div class="container-xl">
        <div class="metrics-grid">
            <div class="metric-card" style="background: linear-gradient(135deg, #2563eb, #3b82f6); color:white;">
                <h3>Users</h3>
                <h1>{{ $stats['users'] }}</h1>
            </div>
            <div class="metric-card" style="background: linear-gradient(135deg, #16a34a, #22c55e); color:white;">
                <h3>Active</h3>
                <h1>{{ $stats['active'] }}</h1>
            </div>
            <div class="metric-card" style="background: linear-gradient(135deg, #f97316, #ea580c); color:white;">
                <h3>Pending</h3>
                <h1>{{ $stats['pending'] }}</h1>
            </div>
            <div class="metric-card" style="background: linear-gradient(135deg, #ef4444, #dc2626); color:white;">
                <h3>Inactive</h3>
                <h1>{{ $stats['inactive'] }}</h1>
            </div>
        </div>

        <div class="chart-box">
            <h3 class="card-title" style="margin-bottom: 15px;">User Registration Growth</h3>
            <div id="chart-user-growth"></div>
        </div>

        <div class="search-box">
            <input type="text" id="userSearch" placeholder="Search users...">
        </div>

        <h3 style="text-align:center; margin-top:40px;">Recent Users</h3>
        <div class="users-grid" id="usersGrid">
            @foreach($users as $user)
            <div class="user-card user-item">
                <div class="user-avatar">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
                <div class="user-name">{{ $user->name }}</div>
                <div class="user-role">{{ $user->role }}</div>
                <span class="badge
                    @if($user->status == 'active') badge-active
                    @elseif($user->status == 'pending') badge-pending
                    @else badge-inactive
                    @endif
                ">
                    {{ ucfirst($user->status) }}
                </span>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        function toggleTheme() {
            document.body.classList.toggle("dark-mode");
            localStorage.setItem("theme", document.body.classList.contains("dark-mode") ? "dark" : "light");
        }

        window.onload = function() {
            if (localStorage.getItem("theme") === "dark") {
                document.body.classList.add("dark-mode");
            }
        };

        document.getElementById("userSearch").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let users = document.querySelectorAll(".user-item");
            users.forEach(function(user) {
                let text = user.innerText.toLowerCase();
                user.style.display = text.includes(filter) ? "block" : "none";
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            var options = {
                chart: {
                    type: 'area',
                    height: 350,
                    background: 'transparent',
                    toolbar: { show: false }
                },
                colors: ['#206bc4'],
                series: [{
                    name: 'New Registrations',
                    data: {!! json_encode($chartData) !!}
                }],
                xaxis: {
                    categories: {!! json_encode($chartMonths) !!}
                },
                stroke: {
                    curve: 'smooth'
                },
                dataLabels: {
                    enabled: false
                }
            };
            var chart = new ApexCharts(document.querySelector("#chart-user-growth"), options);
            chart.render();
        });
    </script>
</body>
</html>