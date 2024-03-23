<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\StudentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ErrorRedirectController;
use Illuminate\Support\Facades\Route;

//Student Auth
Route::get('/', [StudentController::class, 'studentLogin'])->name('studentLogin');

//Admin Auth
Route::get('/admin-login', [AdminController::class, 'adminLogin'])->name('adminLogin');

// Error Redirect
Route::get('/not-found', [ErrorRedirectController::class, 'notFound'])->name('notFound');

//Dashboard
// Route::group(['middleware' => 'student'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/admission', [AdmissionController::class, 'admission'])->name('admission');
    Route::get('/add-course', [CourseController::class, 'addCourse'])->name('addCourse');
    Route::get('/view-course', [CourseController::class, 'viewCourse'])->name('viewCourse');
// });


