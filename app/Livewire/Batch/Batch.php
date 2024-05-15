<?php

namespace App\Livewire\Batch;

use App\Models\Batch as Batchs;
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
    public $name, $update_id, $isModal = false, $isBatch = false, $isMentorModal = false, $delete_id, $removeBatch_id, $singlebatch, $batchMentor = [], $showUpdateInput, $studentWithoutBatch = [], $addToBatch = [], $mentors = [], $mentor, $removeMentor_id;

    protected $listeners = [
        'deleteConfirm' => 'DeleteBatch',
        'removeConfirm' => 'removeStudent',
        'removeMentorConfirm' => 'removeMentorConfirm'
    ];

    public function mount() {
        $this->studentWithoutBatch = Student::where('batch_id', null)->select('name','student_id','id')->get();
        $this->mentors = Mentor::get();
    }
    public function render() {
        $batch = Batchs::select('id', 'name')
                ->withCount('students')
                ->latest()
                ->paginate(20);
        return view('livewire.batch.batch', compact('batch'));
    }






    //Batch CRUD
    public function insert() {
        $validated = $this->validate([
            'name' => 'required|unique:batches',
        ]);
        $done = Batchs::insert([
            'name' => $this->name,
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
    public function editBatch($key, $id) {
        $this->showUpdateInput = $key;
        $data = Batchs::findOrFail($id);
        $this->name = $data->name;
        $this->update_id = $data->id;
    }
    public function updateBatch() {
        $validated = $this->validate([
            'name' => 'required|unique:batches,name,' . $this->update_id,
        ]);
        $done = Batchs::where('id',$this->update_id)->update([
            'name' => $this->name,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->showUpdateInput = '';
            $this->update_id = '';
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
    public function showModal() {
        $this->reset();
        $this->isModal = true;
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
    }
    public function refresh() {
        $this->studentWithoutBatch = Student::where('batch_id', null)->select('name','student_id', 'id')->get();
    }
    public function removeStudentAlert($id) {
        $this->removeBatch_id = $id;
        $this->dispatch('removeStudentAlert');
    }
    public function removeStudent() {
        $done = Student::where('id',$this->removeBatch_id)->update([
            'batch_id' => null,
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
