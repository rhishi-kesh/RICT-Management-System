<?php

namespace App\Livewire\Admission;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class MentorStudentList extends Component
{
    use WithPagination;
    public $search = '';
    public function render()
    {
        $student = Student::query()
        ->with(['batch:id,name','course:id,name'])
        ->search($this->search)
        ->whereHas('batch', function ($q) {
            $q->where('mentor_id', auth()->guard('mentor')->user()->id);
        })
        ->latest()
        ->paginate(50);
        return view('livewire.admission.mentor-student-list', compact('student'));
    }
}
