<?php

use App\Http\Controllers\admissionBooth\AdmissionBoothController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\AdminRegController;
use App\Http\Controllers\auth\StudentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\batch\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ErrorRedirectController;
use App\Http\Controllers\PayRoll;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\paymentMode\paymentModeController;
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
    Route::get('/studentsList', [AdmissionController::class, 'studentsList'])->name('studentsList');
    Route::get('/course', [CourseController::class, 'course'])->name('course');

    // pay roll
    Route::get('/due', [PayRoll::class, 'due'])->name('due');
    Route::get('/last-month', [PayRoll::class, 'lastMonth'])->name('lastMonth');
    Route::get('/last-three-m', [PayRoll::class, 'lastThreeM'])->name('lastThreeM');
    Route::get('/last-six-m', [PayRoll::class, 'lastSixM'])->name('lastSixM');
    Route::get('/studentsList', [AdmissionController::class, 'studentsList'])->name('studentsList');
    Route::get('/mentorslist', [MentorsController::class, 'mentorsList'])->name('mentorsList');
    Route::get('/registation', [AdminRegController::class, 'registation'])->name('registation');
    Route::get('/admission-booth', [AdmissionBoothController::class, 'admissionBooth'])->name('admissionBooth');
    Route::get('/batch', [BatchController::class, 'batch'])->name('batch');
    Route::get('/payment-mode', [paymentModeController::class, 'paymentMode'])->name('paymentMode');
// });


