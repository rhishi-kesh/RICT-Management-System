<?php

use App\Http\Controllers\admissionBooth\AdmissionBoothController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\auth\AdminController;
use App\Http\Controllers\auth\StudentController;
use App\Http\Controllers\batch\BatchController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ErrorRedirectController;
use App\Http\Controllers\Homework\HomeworkController;
use App\Http\Controllers\notice\NoticController;
use App\Http\Controllers\PayRoll;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\paymentMode\PaymentModeController;
use App\Http\Controllers\Recycle\RecycleController;
use App\Http\Controllers\SystemInformationController;
use App\Http\Controllers\Ticket\TicketController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Smtp\SmtpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\MentorController as MentorAuthController;
use App\Http\Controllers\certificate\CertificateController;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\MentorDashboardController;
use App\Http\Controllers\Dashboard\StudentDashboardController;
use App\Http\Controllers\department\DepartmentController;
use App\Http\Controllers\course\CourseFuntionController;

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
Route::get('/mentor', [MentorAuthController::class, 'mentorLogin'])->name('mentorLogin');
Route::post('/mentor-post', [MentorAuthController::class, 'mentorPost'])->name('mentorPost');

// Mentor Forget password
Route::group(['prefix'=>'mentor', 'as'=>'mentor.'], function(){
    Route::get('/forgot-password', [MentorAuthController::class, 'forgotPassword'])->name('forgotPassword');
    Route::post('/forgot-password-post', [MentorAuthController::class, 'forgotPasswordPost'])->name('forgotPasswordPost');
    Route::get('/verify/{id}', [MentorAuthController::class, 'verify'])->name('verify');
    Route::post('/verify-post', [MentorAuthController::class, 'verifyPost'])->name('verifyPost');
    Route::get('/resend-otp',[MentorAuthController::class,'resendOtp'])->name('resendOtp');
    Route::get('/change-password/{id}', [MentorAuthController::class, 'changePassword'])->name('changePassword');
    Route::post('/change-password-post', [MentorAuthController::class, 'changePasswordPost'])->name('changePasswordPost');
});

// Error Redirect
Route::get('/not-found', [ErrorRedirectController::class, 'notFound'])->name('notFound');

//Download
Route::get('/attendance/download/{date}/{id}', [AttendanceController::class, 'attendanceDownload'])->name('attendanceDownload');
Route::get('/attendance/download/single/{batch_id}/{student_id}', [AttendanceController::class, 'attendancSingleeDownload'])->name('attendancSingleeDownload');

//admin Middlewere
Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    //Department
    Route::get('/department', [DepartmentController::class, 'department'])->name('department');

    //Admin Auth
    Route::get('/registation', [AdminController::class, 'registation'])->name('registation');
    Route::get('/view-users', [AdminController::class, 'userView'])->name('userView');
    Route::get('/edit-user/{id}', [AdminController::class, 'userEdit'])->name('userEdit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

    //Sudent Admission
    Route::get('/admission', [AdmissionController::class, 'admission'])->name('admission');
    Route::get('/students', [AdmissionController::class, 'studentsList'])->name('studentsList');
    Route::get('/student-edit/{slug}', [AdmissionController::class, 'studentsEdit'])->name('studentsEdit');
    Route::get('/student-download', [AdmissionController::class, 'studentDownload'])->name('studentDownload');

    //Add Course & Course Funtion
    Route::get('/courses', [CourseController::class, 'course'])->name('course');
    Route::get('/department', [DepartmentController::class, 'department'])->name('department');
    Route::get('/edit-courses/{id}', [CourseFuntionController::class, 'editCourse'])->name('editCourse');
    Route::get('/course-learnings/{id}', [CourseFuntionController::class, 'courseLearnings'])->name('courseLearnings');
    Route::get('/course-For-Those/{id}', [CourseFuntionController::class, 'courseForThose'])->name('courseForThose');
    Route::get('/benefit-Of-Course/{id}', [CourseFuntionController::class, 'benefitCourse'])->name('benefitCourse');
    Route::get('/manage-website-course', [CourseController::class, 'manageWebsiteCourse'])->name('manageWebsiteCourse');

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
    Route::get('/payment-mode', [PaymentModeController::class, 'paymentMode'])->name('paymentMode');

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

    //Attendance system
    Route::get('/attendance', [AttendanceController::class, 'adminAttendance'])->name('adminAttendance');
    Route::get('/attendance/batch/{id}', [AttendanceController::class, 'adminAttendanceBatch'])->name('adminAttendanceBatch');
    Route::get('/attendance/view/{date}/{id}', [AttendanceController::class, 'adminAttendanceView'])->name('adminAttendanceView');
    Route::get('/attendance/report', [AttendanceController::class, 'attendancereport'])->name('attendancereport');

    //System Information
    Route::get('/system-information', [SystemInformationController::class, 'systemInformation'])->name('systemInformation');

    //SMTP Settings
    Route::get('/smtp-settings', [SmtpController::class, 'smtpSettings'])->name('smtpSettings');

    //Ticket
    Route::get('/tickets', [TicketController::class, 'adminTicketindex'])->name('adminTicketindex');
    Route::get('/tickets/{id}/show', [TicketController::class, 'adminTicketshow'])->name('adminTicketshow');
});

//Student Middlewere
Route::group(['prefix' => 'student','middleware' => ['student']], function () {

    // Student Dashboard
    Route::get('/dashboard', [StudentDashboardController::class, 'studentDashboard'])->name('studentDashboard');

    // Student Logout
    Route::get('/logout', [StudentController::class, 'studentLogout'])->name('studentLogout');
    Route::get('/profile', [ProfileController::class, 'userProfile'])->name('userProfile');

    //Notice
    Route::get('/s/my-notice', [NoticController::class, 'mySNotice'])->name('mySNotice');
    Route::get('/s/single/notice/{id}', [NoticController::class, 'SsingleNotice'])->name('SsingleNotice');

    //HomeWork
    Route::get('/my-homework', [HomeworkController::class, 'studentHomeworkView'])->name('studentHomeworkView');

    //Profile $ Certificate
    Route::get('/profile', [ProfileController::class, 'studentProfile'])->name('studentProfile');

    //Certificate
    Route::get('/certificate-view', [CertificateController::class, 'generatePDF'])->name('generatePDF');
    Route::get('/certificate', [CertificateController::class, 'downloadCertificate'])->name('downloadCertificate');

    //Attendance system
    Route::get('/my-attendance', [AttendanceController::class, 'myAttendance'])->name('myAttendance');

    //Ticket
    Route::get('/tickets', [TicketController::class, 'ticketindex'])->name('ticketindex');
    Route::get('/tickets/{id}/show', [TicketController::class, 'ticketshow'])->name('ticketshow');

});

//Mentor Middlewere
Route::group(['prefix' => 'mentor', 'middleware' => ['mentor']], function () {

    //Student Dashboard
    Route::get('/dashboard', [MentorDashboardController::class, 'mentorDashboard'])->name('mentorDashboard');

    //Student Logout
    Route::get('/logout', [MentorAuthController::class, 'mentorLogout'])->name('mentorLogout');

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

    //Attendance system
    Route::get('/attendance', [AttendanceController::class, 'attendance'])->name('attendance');
    Route::get('/attendance/batch/{id}', [AttendanceController::class, 'attendanceBatch'])->name('attendanceBatch');
    Route::get('/attendance/take/{id}', [AttendanceController::class, 'attendanceTake'])->name('attendanceTake');
    Route::post('/attendance/take/post/{id}', [AttendanceController::class, 'attendanceBatchPost'])->name('attendanceBatchPost');
    Route::get('/attendance/edit/{date}/{id}', [AttendanceController::class, 'attendanceEdit'])->name('attendanceEdit');
    Route::post('/attendance/update/{date}/{id}', [AttendanceController::class, 'attendanceUpdate'])->name('attendanceUpdate');
    Route::get('/attendance/view/{date}/{id}', [AttendanceController::class, 'attendanceView'])->name('attendanceView');
});
