<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Menu;
use App\Models\DashboardUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => DashboardUser::count(),
            'active' => DashboardUser::where('status', 'active')->count(),
            'pending' => DashboardUser::where('status', 'pending')->count(),
            'inactive' => DashboardUser::where('status', 'inactive')->count(),
        ];

        $totalUsers = User::count();
        $salesGrowth = 24;
        $activeSessions = DB::table('sessions')->count();

        $monthlyUsers = User::select(
            DB::raw('count(id) as count'),
            DB::raw("DATE_FORMAT(created_at, '%b') as month")
        )
        ->groupBy('month')
        ->orderBy('created_at', 'asc')
        ->get();

        $chartMonths = $monthlyUsers->pluck('month')->toArray();
        $chartData = $monthlyUsers->pluck('count')->toArray();

        if (empty($chartData)) {
            $chartMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'];
            $chartData = [10, 25, 45, 30, 75, 60, 95];
        }

        $sidebarMenus = Menu::where('is_active', true)->orderBy('order', 'asc')->get();
        $users = DashboardUser::latest()->get();

        return view('dashboard', compact('stats', 'users', 'totalUsers', 'salesGrowth', 'activeSessions', 'chartMonths', 'chartData', 'sidebarMenus'));
    }
}