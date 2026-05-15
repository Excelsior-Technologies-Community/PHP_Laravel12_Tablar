<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DashboardUser;

class DashboardUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DashboardUser::insert([
            ['name' => 'John Doe', 'role' => 'Admin', 'status' => 'active'],
            ['name' => 'Jane Smith', 'role' => 'Editor', 'status' => 'pending'],
            ['name' => 'Michael Brown', 'role' => 'User', 'status' => 'inactive'],
            ['name' => 'Alice Lee', 'role' => 'Editor', 'status' => 'active'],
            ['name' => 'Bob White', 'role' => 'User', 'status' => 'active'],
        ]);
    }
}
