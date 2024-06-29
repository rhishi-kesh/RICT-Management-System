<?php

namespace App\Livewire\Batch;

use App\Models\Batch as Batchs;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Batch extends Component
{
    use WithPagination;
    public $name, $courseId, $update_id, $isModal = false, $isBatch = false, $isMentorModal = false, $delete_id, $removeBatch_id, $singlebatch, $batchMentor = [], $studentWithoutBatch = [], $addToBatch = [], $mentors = [], $mentor, $removeMentor_id;

    protected $listeners = [
        'deleteConfirm' => 'DeleteBatch',
        'removeConfirm' => 'removeStudent',
        'removeMentorConfirm' => 'removeMentorConfirm'
    ];

    public function mount() {
        $this->studentWithoutBatch = Student::where('batch_id', 0)->select('name','student_id','id')->get();
        $this->mentors = Mentor::get();
    }
    public function render() {
        $batch = Batchs::query()
                ->with('mentors')
                ->withCount('students')
                ->latest()
                ->paginate(20);
                // dd($batch);
        $course = Course::get();
        return view('livewire.batch.batch', compact('batch', 'course'));
    }

    //Batch CRUD
    public function insert() {
        $validated = $this->validate([
            'name' => 'required|unique:batches',
            'courseId' => 'required',
        ]);
        $done = Batchs::insert([
            'name' => $this->name,
            'course_id' => $this->courseId,
            'created_at' => Carbon::now(),
        ]);
        if($done){
            $this->reset();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function editBatch($id) {
        $data = Batchs::findOrFail($id);
        $this->name = $data->name;
        $this->courseId = $data->course_id;
        $this->update_id = $data->id;
    }
    public function updateBatch() {
        $validated = $this->validate([
            'name' => 'required|unique:batches,name,' . $this->update_id,
            'courseId' => 'required',
        ]);
        $done = Batchs::where('id',$this->update_id)->update([
            'name' => $this->name,
            'course_id' => $this->courseId,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }
    public function deleteAlert($id) {
        $this->delete_id = $id;
        $studentCount = Student::where('batch_id', $id)->count();
        if($studentCount){
            $this->dispatch('confirmBatchDeleteAlert', [
                'title' => "You Can't Delete This Batch",
                'okBtn' => false,
                'type' => "warning",
                'text' => "This Batch Have $studentCount Student",
            ]);
        }else{
            $this->dispatch('confirmBatchDeleteAlert', [
                'title' => "Are you sure?",
                'text' => "You won't be able to revert this!",
                'okBtn' => true,
                'type' => "warning",
            ]);
        }
    }
    public function DeleteBatch() {
        $done = Batchs::findOrFail($this->delete_id)->delete();
        if($done){
            $this->update_id = '';
            $this->dispatch('deleteBatchSuccessFull', [
                'title' => 'Batch Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function status($id) {
        $batch = Batchs::findOrFail($id);

        if($batch->status == 'running'){
            $batch->update([
                'status' => 'complete',
                'updated_at' => Carbon::now()
            ]);
            $students = Student::where('batch_id', $id)->get();
            foreach($students as $item) {
                $singleStudent = Student::where('id', $item->id)->first();
                $singleStudent->update([
                    'student_status' => 'complete',
                    'updated_at' => Carbon::now()
                ]);
            }
        }else{
            $batch->update([
                'status' => 'running',
                'updated_at' => Carbon::now()
            ]);
            $students = Student::where('batch_id', $id)->get();
            foreach($students as $item) {
                $singleStudent = Student::where('id', $item->id)->first();
                $singleStudent->update([
                    'student_status' => 'running',
                    'updated_at' => Carbon::now()
                ]);
            }
        }
    }

    public function showModal() {
        $this->reset();
    }
    public function removeModal() {
        $this->update_id = '';
        $this->isModal = false;
        $this->reset();
    }
    public function removeUpdate() {
        $this->showUpdateInput = null;
    }


    //Student CRUD In Batch
    public function singleBatch($id) {
        $this->isBatch = true;
        $this->singlebatch = Batchs::where('id',$id)
                ->select('id', 'name')
                ->with('students','students.course')
                ->latest()
                ->first();
    }
    public function addStudent($batchID) {
        $studentIDs = $this->addToBatch;
        if($studentIDs){
            $students = Student::whereIn('id', $studentIDs)->get();
            DB::beginTransaction();
            try {
                foreach ($students as $student) {
                    $student->batch_id = $batchID;
                    $student->updated_at = Carbon::now();
                    $student->save();
                }
                $this->dispatch('clearInput', [
                    'title' => 'Student Add Successfull',
                    'type' => "success",
                ]);
                $this->mount();
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        }else{
            $this->dispatch('clearInput', [
                'title' => 'Please Select A Student First',
                'type' => "error",
            ]);
        }
    }
    public function refresh() {
        $this->studentWithoutBatch = Student::where('batch_id', 0)->select('name','student_id', 'id')->get();
    }
    public function removeStudentAlert($id) {
        $this->removeBatch_id = $id;
        $this->dispatch('removeStudentAlert');
    }
    public function removeStudent() {
        $done = Student::where('id',$this->removeBatch_id)->update([
            'batch_id' => 0,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->mount();
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Student Removed',
                'type' => "success",
            ]);
        }
    }
    public function removebatch() {
        $this->isBatch = false;
    }

    //Mentor CRUD In Batch
    public function asignMentor($id) {
        $this->isMentorModal = true;
        $this->batchMentor = Batchs::query()
                ->with('mentors')
                ->select('id', 'name', 'mentor_id')
                ->where('id', $id)
                ->latest()
                ->first();
    }
    public function mentorData($id) {
        $this->batchMentor = Batchs::query()
                ->with('mentors')
                ->select('id', 'name', 'mentor_id')
                ->where('id', $id)
                ->latest()
                ->first();
    }
    public function addMentor($id) {
        if($this->mentor){
            $done = Batchs::where('id', $id)->first();
            $done->mentor_id = $this->mentor;
            $done->update();
            if($done){
                $this->mentorData($id);
                $this->dispatch('clearInput', [
                    'title' => 'Mentor Asign Successfull',
                    'type' => "success",
                ]);
            }
        }else{
            $this->dispatch('clearInput', [
                'title' => 'Please Select A Mentor First',
                'type' => "error",
            ]);
        }

    }
    public function removeMentorAlert($id) {
        $this->removeMentor_id = $id;
        $this->dispatch('removeMentorAlert');
    }
    public function removeMentorConfirm() {
        $done = Batchs::where('id', $this->removeMentor_id)->update([
            'mentor_id' => null,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->mount();
            $this->mentorData($this->removeMentor_id);
            $this->dispatch('deleteMentorSuccessFull', [
                'title' => 'Mentor Removed',
                'type' => "success",
            ]);
        }
    }
    public function removeMentorMOdal() {
        $this->isMentorModal = false;
    }
}
