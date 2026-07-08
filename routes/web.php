<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuManagerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/menu-manager', [MenuManagerController::class, 'index'])->name('menu.manager');
Route::post('/admin/menu-manager', [MenuManagerController::class, 'store'])->name('menu.store');
Route::get('/admin/menu-manager/delete/{id}', [MenuManagerController::class, 'delete'])->name('menu.delete');require __DIR__.'/auth.php';

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

