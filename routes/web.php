<?php

use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\StudentController;
use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\Route;

//Student Auth
Route::get('/', [StudentController::class, 'studentLogin'])->name('studentLogin');

//Admin Auth
Route::get('/admin-login', [AdminController::class, 'adminLogin'])->name('adminLogin');

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
