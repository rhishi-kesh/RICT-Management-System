<?php

namespace App\Livewire\Notice;

use Livewire\Component;
use App\Models\AdmissionBooth;
use App\Models\Mentor;
use App\Models\Notice;
use Livewire\WithPagination;
use App\Models\Student;
use App\Models\Batch;
use App\Models\User;
use Carbon\Carbon;

class AllNotice extends Component
{
    use WithPagination;
    public $id;
    public function render()
    {
        $batch = Batch::select('id', 'name')
        ->withCount('students')
        ->latest()
        ->get();

        $mentorNotice = Notice::with(['mentor:id,name,image'])
        ->where('person', 'm')
        ->latest()
        ->paginate(30);

        $systemUserNotice = Notice::with(['user:id,name,profile'])
        ->where('person', 'a')
        ->latest()
        ->paginate(30);

        $admissionBoothNotice = Notice::with(['admissionBooth:id,name'])
        ->where('person', 'b')
        ->latest()
        ->paginate(30);

        $students = Notice::query()
        ->whereHas('student', function ($query) {
            $query->where('batch_id','=', 0);
        })
        ->with('student:id,name,profile,student_id')
        ->where('person', 's')
        ->latest()
        ->paginate(30);

        $batchdata = Notice::query()
        ->whereHas('student', function ($query) {
            $query->where('batch_id','=', $this->id);
        })
        ->with('student:id,name,profile,student_id')
        ->where('person', 's')
        ->latest()
        ->paginate(30);

        return view('livewire.notice.all-notice', compact('batch', 'mentorNotice', 'systemUserNotice', 'admissionBoothNotice','students', 'batchdata'));
    }

    public function singleBatch($id){
        $this->id = $id;
    }
}
