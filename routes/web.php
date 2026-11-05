<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\ContentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', PortfolioController::class)->name('portfolio');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/dashboard/content', [ContentController::class, 'edit'])->name('dashboard.content.edit');
    Route::put('/dashboard/content', [ContentController::class, 'update'])->name('dashboard.content.update');

    Route::resource('/dashboard/projects', ProjectController::class)
        ->except(['show'])
        ->names('dashboard.projects');

    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
