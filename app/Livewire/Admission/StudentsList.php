<?php

namespace App\Livewire\Admission;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;

class StudentsList extends Component
{
    use WithPagination;

    public $prepage = 5, $search = '';

    public function render()
    {
        $students = Student::with('course')->search($this->search)->paginate($this->prepage);
        return view('livewire.admission.students-list',compact('students'));
    }
}
