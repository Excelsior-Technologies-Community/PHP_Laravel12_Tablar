<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DashboardUser;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DashboardUser::latest()->take(6)->get();

        // Dashboard stats (optional dynamic upgrade)
        $stats = [
            'users' => DashboardUser::count(),
            'active' => DashboardUser::where('status', 'active')->count(),
            'pending' => DashboardUser::where('status', 'pending')->count(),
            'inactive' => DashboardUser::where('status', 'inactive')->count(),
        ];

        return view('dashboard', compact('users', 'stats'));
    }
}