<?php

namespace App\Livewire\Batch;

use App\Models\Batch as Batchs;
use App\Models\Student;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Batch extends Component
{
    use WithPagination;
    public $name, $update_id, $isModal = false, $isBatch = false, $delete_id, $removeBatch_id, $singlebatch, $showUpdateInput = null, $studentWithoutBatch = [], $addToBatch = [];
    protected $listeners = [
        'deleteConfirm' => 'DeleteBatch',
        'removeConfirm' => 'removeStudent'
    ];

    public function mount() {
        $this->studentWithoutBatch = Student::where('batch_id', null)->select('name','student_id','id')->get();
    }

    public function render()
    {
        $batch = Batchs::select('id', 'name')
                ->withCount('students')
                ->latest()
                ->paginate(10);
        return view('livewire.batch.batch', compact('batch'));
    }
    public function insert(){
        $validated = $this->validate([
            'name' => 'required|unique:batches',
        ]);
        $done = Batchs::insert([
            'name' => $this->name,
            'created_at' => Carbon::now(),
        ]);
        if($done){
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function editBatch($key, $id){
        $this->showUpdateInput = $key;
        $this->resetForm();
        $data = Batchs::findOrFail($id);
        $this->name = $data->name;
        $this->update_id = $data->id;
    }
    public function updateBatch(){
        $validated = $this->validate([
            'name' => 'required|unique:batches,name,' . $this->update_id,
        ]);
        $done = Batchs::where('id',$this->update_id)->update([
            'name' => $this->name,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->showUpdateInput = null;
            $this->update_id = '';
            $this->resetForm();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }
    public function deleteAlert($id){
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
    public function DeleteBatch(){
        $done = Batchs::findOrFail($this->delete_id)->delete();
        if($done){
            $this->update_id = '';
            $this->dispatch('deleteBatchSuccessFull', [
                'title' => 'Batch Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function singleBatch($id){
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

            $this->resetAddStudentForm();
            $this->mount();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
    }
    public function refresh(){
        $this->studentWithoutBatch = Student::where('batch_id', null)->select('name','student_id', 'id')->get();
    }
    public function removeStudentAlert($id){
        $this->removeBatch_id = $id;
        $this->dispatch('removeStudentAlert');
    }
    public function removeStudent(){
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
    public function removebatch(){
        $this->isBatch = false;
    }
    public function showModal(){
        $this->resetForm();
        $this->isModal = true;
    }
    public function removeModal(){
        $this->update_id = '';
        $this->isModal = false;
        $this->resetForm();
    }
    public function resetForm(){
        $this->reset(['name']);
    }
    public function resetAddStudentForm(){
        $this->reset(['addToBatch']);
    }
}
