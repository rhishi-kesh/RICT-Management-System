<?php

namespace App\Livewire\Admission;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;

class StudentsList extends Component
{
    use WithPagination;

    public $perpage = 5;
    public $search = '';
                //  data short ascending
    public $sortDirection = 'ASC';
    public $sortColumn = 'name';

    public function doSort($colum)
    {
        if($this->sortDirection === $colum){
            $this->sortDirection = ($this->sortDirection == 'ASC')? 'DEC':'ASC';
            return;
        }
        $this->sortColumn = $colum;
        $this->sortDirection = 'ASC';
    }       
            // end ascending
            // Life cycle hooks
    public function updatePerPage()       
    {
        $this->resetPage();
    }
    public function updateSearch()       
    {
        $this->resetPage();
    }
    
    public function render()
    {
        $students = Student::search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perpage);
        return view('livewire.admission.students-list',compact('students'));
    }
}
