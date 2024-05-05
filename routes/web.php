<?php

use App\Http\Controllers\admissionBooth\AdmissionBoothController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\StudentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\batch\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ErrorRedirectController;
use App\Http\Controllers\PayRoll;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\paymentMode\paymentModeController;
use App\Http\Controllers\Recycle\RecycleController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Role\RoleController;
use Illuminate\Support\Facades\Route;

//Student Auth
Route::get('/', [StudentController::class, 'studentLogin'])->name('studentLogin');
Route::post('/student-post', [StudentController::class, 'StudentPost'])->name('StudentPost');

//Admin Auth
Route::get('/admin', [AdminController::class, 'login'])->name('login');
Route::post('/admin-post', [AdminController::class, 'loginPost'])->name('loginPost');

// Error Redirect
Route::get('/not-found', [ErrorRedirectController::class, 'notFound'])->name('notFound');


//admin Middlewere
Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Admin Auth
    Route::get('/registation', [AdminController::class, 'registation'])->name('registation');
    Route::get('/view-users', [AdminController::class, 'userView'])->name('userView');
    Route::get('/edit-user/{id}', [AdminController::class, 'userEdit'])->name('userEdit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

    //Sudent Admission
    Route::get('/admission', [AdmissionController::class, 'admission'])->name('admission');
    Route::get('/students', [AdmissionController::class, 'studentsList'])->name('studentsList');
    Route::get('/student-edit/{slug}', [AdmissionController::class, 'studentsEdit'])->name('studentsEdit');

    //Add Course
    Route::get('/courses', [CourseController::class, 'course'])->name('course');

    //Payrole
    Route::get('/due', [PayRoll::class, 'due'])->name('due');
    Route::get('/last-month-due', [PayRoll::class, 'lastMonth'])->name('lastMonth');
    Route::get('/last-three-month-due', [PayRoll::class, 'lastThreeM'])->name('lastThreeM');
    Route::get('/last-six-month-due', [PayRoll::class, 'lastSixM'])->name('lastSixM');

    //Other CRUD
    Route::get('/mentors', [MentorsController::class, 'mentors'])->name('mentors');
    Route::get('/admission-booth', [AdmissionBoothController::class, 'admissionBooth'])->name('admissionBooth');
    Route::get('/batchs', [BatchController::class, 'batch'])->name('batch');
    Route::get('/payment-mode', [paymentModeController::class, 'paymentMode'])->name('paymentMode');
    Route::get('/counciling-person', [VisitorController::class, 'counciling'])->name('counciling');
    Route::get('/add-visitor', [VisitorController::class, 'visitorForm'])->name('visitorForm');
    Route::get('/visitors', [VisitorController::class, 'visitor'])->name('visitor');
    Route::get('/update-visitor/{id}', [VisitorController::class, 'updateVisitor'])->name('updateVisitor');
    Route::get('/permission', [PermissionController::class, 'permission'])->name('permission');

    Route::get('/roles', [RoleController::class, 'role'])->name('role');
    Route::get('/role-have-permission/{id}', [RoleController::class, 'roleHavePermission'])->name('roleHavePermission');
    Route::post('/permission-on-role-post', [RoleController::class, 'permissionOnRolePost'])->name('permissionOnRolePost');

    Route::get('/recycle-students', [RecycleController::class, 'recycleStudent'])->name('recycleStudent');
    Route::get('/profile', [ProfileController::class, 'adminProfile'])->name('adminProfile');
});


//Student Middlewere
Route::group(['prefix' => 'student','middleware' => ['student']], function () {

    //Student Dashboard
    Route::get('/dashboard', [DashboardController::class, 'studentDashboard'])->name('studentDashboard');

    //Student Logout
    Route::get('/logout', [StudentController::class, 'studentLogout'])->name('studentLogout');
    Route::get('/profile', [ProfileController::class, 'userProfile'])->name('userProfile');
});