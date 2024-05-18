<?php

use App\Http\Controllers\admissionBooth\AdmissionBoothController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\StudentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\batch\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ErrorRedirectController;
use App\Http\Controllers\Homework\HomeworkController;
use App\Http\Controllers\notice\NoticController;
use App\Http\Controllers\PayRoll;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\paymentMode\paymentModeController;
use App\Http\Controllers\Recycle\RecycleController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\PDF\PDFController;
use Illuminate\Support\Facades\Route;

//Student Auth
Route::get('/', [StudentController::class, 'studentLogin'])->name('studentLogin');
Route::post('/student-post', [StudentController::class, 'StudentPost'])->name('StudentPost');

// Student Forget password
Route::group(['prefix'=>'student', 'as'=>'student.'], function(){
    Route::get('/forgot-password', [StudentController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password-post', [StudentController::class, 'forgotPasswordPost'])->name('forgotPasswordPost');
    Route::get('/verify/{id}', [StudentController::class, 'verify'])->name('verify');
    Route::post('/verify-post', [StudentController::class, 'verifyPost'])->name('verifyPost');
    Route::get('/resend-otp',[StudentController::class,'resendOtp'])->name('resendOtp');
    Route::get('/change-password/{id}', [StudentController::class, 'changePassword'])->name('changePassword');
    Route::post('/change-password-post', [StudentController::class, 'changePasswordPost'])->name('changePasswordPost');
});

//Admin Auth
Route::get('/admin', [AdminController::class, 'login'])->name('login');
Route::post('/admin-post', [AdminController::class, 'loginPost'])->name('loginPost');

// Admin Forget password
Route::group(['prefix'=>'admin', 'as'=>'admin.'], function(){
    Route::get('/forgot-password', [AdminController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password-post', [AdminController::class, 'forgotPasswordPost'])->name('forgotPasswordPost');
    Route::get('/verify/{id}', [AdminController::class, 'verify'])->name('verify');
    Route::post('/verify-post', [AdminController::class, 'verifyPost'])->name('verifyPost');
    Route::get('/resend-otp',[AdminController::class,'resendOtp'])->name('resendOtp');
    Route::get('/change-password/{id}', [AdminController::class, 'changePassword'])->name('changePassword');
    Route::post('/change-password-post', [AdminController::class, 'changePasswordPost'])->name('changePasswordPost');
});

//Mentor Auth
Route::get('/mentor', [App\Http\Controllers\Auth\MentorController::class, 'mentorLogin'])->name('mentorLogin');
Route::post('/mentor-post', [App\Http\Controllers\Auth\MentorController::class, 'mentorPost'])->name('mentorPost');

// Mentor Forget password
Route::group(['prefix'=>'mentor', 'as'=>'mentor.'], function(){
    Route::get('/forgot-password', [App\Http\Controllers\Auth\MentorController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password-post', [App\Http\Controllers\Auth\MentorController::class, 'forgotPasswordPost'])->name('forgotPasswordPost');
    Route::get('/verify/{id}', [App\Http\Controllers\Auth\MentorController::class, 'verify'])->name('verify');
    Route::post('/verify-post', [App\Http\Controllers\Auth\MentorController::class, 'verifyPost'])->name('verifyPost');
    Route::get('/resend-otp',[App\Http\Controllers\Auth\MentorController::class,'resendOtp'])->name('resendOtp');
    Route::get('/change-password/{id}', [App\Http\Controllers\Auth\MentorController::class, 'changePassword'])->name('changePassword');
    Route::post('/change-password-post', [App\Http\Controllers\Auth\MentorController::class, 'changePasswordPost'])->name('changePasswordPost');
});

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

    //Mentor
    Route::get('/mentors', [MentorsController::class, 'mentors'])->name('mentors');

    //Admission Booth
    Route::get('/admission-booth', [AdmissionBoothController::class, 'admissionBooth'])->name('admissionBooth');

    //Batch
    Route::get('/batchs', [BatchController::class, 'batch'])->name('batch');

    //Payment Mode
    Route::get('/payment-mode', [paymentModeController::class, 'paymentMode'])->name('paymentMode');

    //visitor Controller
    Route::get('/counciling-person', [VisitorController::class, 'counciling'])->name('counciling');
    Route::get('/add-visitor', [VisitorController::class, 'visitorForm'])->name('visitorForm');
    Route::get('/visitors', [VisitorController::class, 'visitor'])->name('visitor');
    Route::get('/update-visitor/{id}', [VisitorController::class, 'updateVisitor'])->name('updateVisitor');

    //Notice
    Route::get('/notice', [NoticController::class, 'notice'])->name('notice');
    Route::get('/notice/mentor', [NoticController::class, 'noticeMentor'])->name('noticeMentor');
    Route::post('/notice/mentor-post', [NoticController::class, 'noticeMentorPost'])->name('noticeMentorPost');
    Route::get('/notice/system-user', [NoticController::class, 'noticeSystemUser'])->name('noticeSystemUser');
    Route::post('/notice/system-user-post', [NoticController::class, 'noticeSystemUserPost'])->name('noticeSystemUserPost');
    Route::get('/notice/student-without-batch', [NoticController::class, 'noticeStudentWithoutBatch'])->name('noticeStudentWithoutBatch');
    Route::post('/notice/student-without-batch-post', [NoticController::class, 'noticeStudentWithoutBatchPost'])->name('noticeStudentWithoutBatchPost');
    Route::get('/notice/admission-booth', [NoticController::class, 'noticeAdmissionBooth'])->name('noticeAdmissionBooth');
    Route::post('/notice/admission-booth-post', [NoticController::class, 'noticeAdmissionBoothPost'])->name('noticeAdmissionBoothPost');
    Route::get('/notice/{id}', [NoticController::class, 'noticeBatch'])->name('noticeBatch');
    Route::post('/notice/batch-post', [NoticController::class, 'noticeBatchPost'])->name('noticeBatchPost');
    Route::get('/all-notice', [NoticController::class, 'allNotice'])->name('allNotice');
    Route::get('/single/a/notice/{id}', [NoticController::class, 'singleANotice'])->name('singleANotice');
    Route::get('/a/single/notice/{id}', [NoticController::class, 'AsingleNotice'])->name('AsingleNotice');
    Route::get('/a/my-notice', [NoticController::class, 'myANotice'])->name('myANotice');

    //Roles & Permission
    Route::get('/roles', [RoleController::class, 'role'])->name('role');
    Route::get('/role-have-permission/{id}', [RoleController::class, 'roleHavePermission'])->name('roleHavePermission');
    Route::post('/permission-on-role-post', [RoleController::class, 'permissionOnRolePost'])->name('permissionOnRolePost');
    Route::get('/permission', [PermissionController::class, 'permission'])->name('permission');

    //Recycle Bin
    Route::get('/recycle-students', [RecycleController::class, 'recycleStudent'])->name('recycleStudent');

    //Profile
    Route::get('/profile', [ProfileController::class, 'adminProfile'])->name('adminProfile');
});

//Student Middlewere
Route::group(['prefix' => 'student','middleware' => ['student']], function () {

    // Student Dashboard
    Route::get('/dashboard', [DashboardController::class, 'studentDashboard'])->name('studentDashboard');

    // Student Logout
    Route::get('/logout', [StudentController::class, 'studentLogout'])->name('studentLogout');
    Route::get('/profile', [ProfileController::class, 'userProfile'])->name('userProfile');
    Route::get('/generatePDF', [PDFController::class, 'generatePDF'])->name('generatePDF');

    //Notice
    Route::get('/s/my-notice', [NoticController::class, 'mySNotice'])->name('mySNotice');
    Route::get('/s/single/notice/{id}', [NoticController::class, 'SsingleNotice'])->name('SsingleNotice');

    //HomeWork
    Route::get('/my-homework', [HomeworkController::class, 'studentHomeworkView'])->name('studentHomeworkView');

    //Profile
    Route::get('/profile', [ProfileController::class, 'studentProfile'])->name('studentProfile');
});

//Mentor Middlewere
Route::group(['prefix' => 'mentor','middleware' => ['mentor']], function () {

    //Student Dashboard
    Route::get('/dashboard', [DashboardController::class, 'mentorDashboard'])->name('mentorDashboard');

    //Student Logout
    Route::get('/logout', [App\Http\Controllers\Auth\MentorController::class, 'mentorLogout'])->name('mentorLogout');

    //Notice
    Route::get('/m/my-notice', [NoticController::class, 'myMNotice'])->name('myMNotice');
    Route::get('/m/single/notice/{id}', [NoticController::class, 'MsingleNotice'])->name('MsingleNotice');

    //HomeWork
    Route::get('/homework/assign', [HomeworkController::class, 'homework'])->name('homework');
    Route::get('/homework/assign/{id}', [HomeworkController::class, 'homeworkAssign'])->name('homeworkAssign');
    Route::post('/homework/assign-post', [HomeworkController::class, 'homeworkAssignPost'])->name('homeworkAssignPost');
    Route::get('/homework', [HomeworkController::class, 'homeworkView'])->name('homeworkView');
    Route::get('/submited-homework', [HomeworkController::class, 'submitedHomework'])->name('submitedHomework');

    //Profile
    Route::get('/profile', [ProfileController::class, 'mentorProfile'])->name('mentorProfile');
});
