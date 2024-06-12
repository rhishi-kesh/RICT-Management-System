<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(ApiController::class)->group(function () {
    Route::post('/admission-web', 'admissionWeb')->name('admissionWeb');
    Route::get('/courses', 'courses')->name('courses');
    Route::get('/courses/top-sale', 'coursesTopSale')->name('coursesTopSale');
    Route::get('/courses/isfooter', 'coursesIsfooter')->name('coursesIsfooter');
    Route::get('/department', 'webdepartment')->name('webdepartment');
    Route::get('/single-department/{slug}', 'singleDepartment')->name('singleDepartment');
    Route::get('/single-course/{slug}', 'singleCourse')->name('singleCourse');
});
