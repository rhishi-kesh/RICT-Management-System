<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Homework;
use App\Models\Notice;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function studentDashboard(){

        $studentDue = Student::query()
                    ->where('id', auth()->guard('student')->user()->id)
                    ->first('due');

        $studentNotice = Notice::query()
                    ->where('is_seen', 1)
                    ->where('user_id', auth()->guard('student')->user()->id)
                    ->where('person', 's')
                    ->count();

        $studentHomework = Homework::query()
                    ->where('student_id', auth()->guard('student')->user()->id)
                    ->count();

        $studentHomeworkComplete = Homework::query()
                    ->where('student_id', auth()->guard('student')->user()->id)
                    ->where('status', 'done')
                    ->count();

        $attendance = Attendance::query()
                    ->where('student_id', auth()->guard('student')->user()->id)
                    ->get();

        $attendanceReport = $attendance->groupBy('attendance')->map(function ($group) {
            return $group->count();
        });

        $attendanceAbsent = Attendance::query()
                    ->where('student_id', auth()->guard('student')->user()->id)
                    ->where('attendance', 'absent')
                    ->count();

        $homeworkReport = Homework::query()
                    ->selectRaw('status, COUNT(*) as count')
                    ->where('student_id', auth()->guard('student')->id())
                    ->groupBy('status')
                    ->pluck('count', 'status');


        return view('application/studentIndex', compact('studentDue', 'studentNotice', 'studentHomework', 'studentHomeworkComplete', 'attendance', 'attendanceAbsent', 'homeworkReport', 'attendanceReport'));
    }
}
