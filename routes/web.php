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
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Role\RoleController;
use Illuminate\Support\Facades\Route;

//Student Auth
Route::get('/', [StudentController::class, 'studentLogin'])->name('studentLogin');

//Admin Auth
Route::get('/admin', [AdminController::class, 'login'])->name('login');
Route::post('/admin-post', [AdminController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

// Error Redirect
Route::get('/not-found', [ErrorRedirectController::class, 'notFound'])->name('notFound');

//Dashboard
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/registation', [AdminController::class, 'registation'])->name('registation');
    Route::get('/admission', [AdmissionController::class, 'admission'])->name('admission');
    Route::get('/students', [AdmissionController::class, 'studentsList'])->name('studentsList');
    Route::get('/course', [CourseController::class, 'course'])->name('course');
    Route::get('/due', [PayRoll::class, 'due'])->name('due');
    Route::get('/last-month-due', [PayRoll::class, 'lastMonth'])->name('lastMonth');
    Route::get('/last-three-month-due', [PayRoll::class, 'lastThreeM'])->name('lastThreeM');
    Route::get('/last-six-month-due', [PayRoll::class, 'lastSixM'])->name('lastSixM');
    Route::get('/mentors', [MentorsController::class, 'mentors'])->name('mentors');
    Route::get('/admission-booth', [AdmissionBoothController::class, 'admissionBooth'])->name('admissionBooth');
    Route::get('/batch', [BatchController::class, 'batch'])->name('batch');
    Route::get('/payment-mode', [paymentModeController::class, 'paymentMode'])->name('paymentMode');
    Route::get('/counciling', [VisitorController::class, 'counciling'])->name('counciling');
    Route::get('/add-visitor', [VisitorController::class, 'visitorForm'])->name('visitorForm');
    Route::get('/visitor', [VisitorController::class, 'visitor'])->name('visitor');
    Route::get('/update-visitor/{id}', [VisitorController::class, 'updateVisitor'])->name('updateVisitor');
    Route::get('/permission', [PermissionController::class, 'permission'])->name('permission');
    Route::get('/role', [RoleController::class, 'role'])->name('role');
});
