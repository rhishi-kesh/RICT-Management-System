<?php

namespace App\Livewire\Visitor;

use Livewire\Component;
use App\Models\Visitors;
use Illuminate\Support\Carbon;
use Livewire\WithPagination;

class VisitorList extends Component
{
    use WithPagination;
    public  $name, $course_name, $amount, $mobile, $address, $email, $visitor_comment, $gender, $ref_name, $admission_booth_name,$admission_booth_number, $calling_person, $comments, $counseling, $status, $callCount, $isModal = false, $course = [], $councile = [], $callingperson = [], $admissionBooth = [], $sure_id, $visitor_id, $delete_id, $call_count, $sortColumn, $perpage = 30, $search= '';
    protected $listeners = [
        'addConfirm' => 'updateCall',
        'deleteConfirm' => 'deleteStudent'
    ];
    public function render()
    {
        $visitor = Visitors::with(['course:id,name', 'callingperson:id,name' ,'councile:id,name','admissionBooth:id,name,number'])
        ->search($this->search)
        ->paginate($this->perpage);

        return view('livewire.visitor.visitor-list', compact('visitor'));
    }
    public function callcount($id){
        $this->visitor_id = $id;
        $this->dispatch('confirmaddAlert');
    }
    public function updateCall(){
        $visitor = Visitors::where('id', $this->visitor_id)->first();
        $newCall = $visitor->call_count += 1;
        $done = Visitors::where('id', $this->visitor_id)->update([
            'call_count' => $newCall,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->dispatch('callAddSuccessfull', [
                'title' => 'Call Add Successfull',
                'type' => "success",
            ]);
        }
    }
    public function deleteAlert($id){
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent(){
        $done = Visitors::findOrFail($this->delete_id)->delete();
        if($done){
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function showModal()
    {
        $this->resetForm();
        $this->isModal = true;
    }
    public function removeModal(){
        $this->isModal = false;
        $this->resetForm();
    }
    public function resetForm()
    {
        $this->reset(['counseling']);
        $this->reset(['status']);
        $this->reset(['name']);
        $this->reset(['mobile']);
        $this->reset(['email']);
        $this->reset(['course_name']);
        $this->reset(['address']);
        $this->reset(['amount']);
        $this->reset(['visitor_comment']);
        $this->reset(['gender']);
        $this->reset(['ref_name']);
        $this->reset(['admission_booth_name']);
        $this->reset(['comments']);
    }
}
