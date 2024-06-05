<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\AdmissionBooth;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\User;
use App\Models\Visitors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function dashboard(){

        //Student
        $totalStudentCount = Student::count();
        $lastMonthStudentAdmission = Student::whereMonth(
            'created_at', '=', Carbon::now()->subMonth()->month
        )->count();
        $thisMonthStudentAdmission = Student::whereBetween('created_at',
        [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])->count();
        $todayStudentCount = Student::whereBetween('created_at',
        [
            Carbon::now()->startOfDay(),
            Carbon::now()->endOfDay()
        ])->count();
        $todayStudentSaleSum = Student::whereBetween('created_at',
        [
            Carbon::now()->startOfDay(),
            Carbon::now()->endOfDay()
        ])->sum('total');

        //Visitor
        $todayVisitorCount = Visitors::whereBetween('created_at',
        [
            Carbon::now()->startOfDay(),
            Carbon::now()->endOfDay()
        ])->count();
        $totalVisitorCount = Visitors::count();
        $lastMonthVisitorAdmission = Visitors::whereMonth(
            'created_at', '=', Carbon::now()->subMonth()->month
        )->count();
        $thisMonthVisitorAdmission = Visitors::whereBetween('created_at',
        [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])->count();

        //Batch
        $totalBatch = Batch::count();
        $totalRunningBatch = Batch::where('status', 'running')->count();


        //Due
        $totalDueStudent = Student::whereNot('due', 0)->count();
        $totalDueStudentSum = Student::whereNot('due', 0)->sum('due');

        //Mentor
        $totalMentor = Mentor::count();

        //Users
        $totalUsers = User::where('role', 1)->count();

        //Course
        $totalCourse = Course::count();

        //AdmissionBooth
        $totalAdmissionBooth = AdmissionBooth::count();

        //Sale
        $totalSale = Student::sum('pay');

        //Get Curren Day in month, Day, Year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $daysInMonth = Carbon::now()->daysInMonth;

        //statistics Admission of One Month
        $admissions = Student::query()
            ->with('course')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->get();
        $daylyAdmissionData = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $startOfDay = Carbon::now()->startOfMonth()->addDays($day - 1);
            $startOfNextDay = Carbon::now()->startOfMonth()->addDays($day);
            $daylyAdmissionData[] = $admissions->where('created_at', '>=', $startOfDay)
                                ->where('created_at', '<', $startOfNextDay)
                                ->count();
        }

        //statistics Monthly Admission on Different Course
        $monthlyAdmissionsOnDefferentCourse = $admissions->groupBy('course.name')->map(function ($group) {
            return $group->count();
        });


        //statistics Visitor of One Month
        $Visitors = Visitors::query()
            ->with('course')
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->get();
        $daylyVisitorData = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $startOfDay = Carbon::now()->startOfMonth()->addDays($day - 1);
            $startOfNextDay = Carbon::now()->startOfMonth()->addDays($day);
            $daylyVisitorData[] = $Visitors->where('created_at', '>=', $startOfDay)
                                ->where('created_at', '<', $startOfNextDay)
                                ->count();
        }

        //statistics Monthly Admission on Different Course
        $monthlyVisitorOnDifferentCourse = $Visitors->groupBy('course.name')->map(function ($group) {
            return $group->count();
        });


        //statistics Admission of One Year
        $monthlyAdmissions = Student::query()
            ->with('course')
            ->whereYear('created_at', $currentYear)
            ->get();

        $monthlyAdmissionCounts = array_fill(0, 12, 0);

        foreach ($monthlyAdmissions as $admission) {
            $monthIndex = Carbon::parse($admission->created_at)->month - 1;
            $monthlyAdmissionCounts[$monthIndex]++;
        }

        // statistics Yearly Admission on Different Course
        $yearlyAdmissionsOnDefferentCourse = $monthlyAdmissions->groupBy('course.name')->map(function ($group) {
            return $group->count();
        });

        // statistics Student Status
        $YearlyStudentStatus = $monthlyAdmissions->groupBy('student_status')->map(function ($group) {
            return $group->count();
        });


        //statistics Visitor of One Year
        $monthlyVisitor = Visitors::query()
            ->with('course')
            ->whereYear('created_at', $currentYear)
            ->get();

        // Initialize an array to hold the count of admissions per month
        $monthlyVisitorCounts = array_fill(0, 12, 0);

        // Iterate over each month and count admissions
        foreach ($monthlyVisitor as $visitor) {
            $monthIndex = Carbon::parse($visitor->created_at)->month - 1;
            $monthlyVisitorCounts[$monthIndex]++;
        }

        // statistics Yearly Visitor on Different Course
        $yearlyVisitorsOnDefferentCourse = $monthlyVisitor->groupBy('course.name')->map(function ($group) {
            return $group->count();
        });

        return view('application/index', compact('totalStudentCount', 'lastMonthStudentAdmission', 'thisMonthStudentAdmission', 'totalVisitorCount', 'lastMonthVisitorAdmission', 'thisMonthVisitorAdmission', 'totalBatch', 'totalRunningBatch', 'totalDueStudent', 'totalDueStudentSum', 'totalMentor', 'totalUsers', 'totalCourse', 'totalAdmissionBooth', 'totalSale', 'todayVisitorCount', 'todayStudentCount', 'todayStudentSaleSum', 'daylyAdmissionData', 'daylyVisitorData', 'monthlyAdmissionsOnDefferentCourse', 'monthlyVisitorOnDifferentCourse', 'monthlyAdmissionCounts', 'monthlyVisitorCounts', 'yearlyAdmissionsOnDefferentCourse', 'yearlyVisitorsOnDefferentCourse', 'YearlyStudentStatus'));
    }
}
