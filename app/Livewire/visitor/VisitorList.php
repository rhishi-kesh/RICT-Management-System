<?php

namespace App\Livewire\Visitor;

use Livewire\Component;
use App\Models\Visitors;
use App\Models\Course;
use App\Models\Councilings;
use App\Models\AdmissionBooth;
use Illuminate\Support\Carbon;
use Livewire\WithPagination;

class VisitorList extends Component
{
    public  $name, $course_name, $amount, $mobile, $address, $email, $visitor_comment, $gender, $ref_name, $admission_booth_name,$admission_booth_number, $calling_person, $comments, $counseling, $status, $isModal = false, $course = [], $councile = [],
    $callingperson = [], $admissionBooth = [];
    protected $listeners = ['deleteConfirm' => 'deleteStudent'] ;

    use WithPagination;

    public function render()
    {
        $visitor = Visitors::with(['course:id,name', 'callingperson:id,name' ,'councile:id,name','admissionBooth:id,name,number'])->paginate(5);
        return view('livewire.visitor.visitor-list', compact('visitor'));
    }
    public function ShowUpdateModel($id){
        $this->isModal = true;
        $data = Visitors::findOrFail($id);
        $this->counseling = $data->counseling;
        $this->status = $data->status;
        $this->name = $data->name;
        $this->mobile = $data->mobile;
        $this->email = $data->email;
        $this->course_name = $data->course_id;
        $this->address = $data->address;
        $this->amount = $data->amount;
        $this->visitor_comment = $data->visitor_comment;
        $this->gender = $data->selectedOption;
        $this->ref_name = $data->ref_name;
        $this->admission_booth_name = $data->admission_booth_name;
        $this->admission_booth_number = $data->admission_booth_number;
        $this->calling_person = $data->calling_person;
        $this->comments = $data->comments;
        $this->course = Course::get();
        $this->councile = Councilings::get();
        $this->callingperson = Councilings::get();
        $this->admissionBooth = AdmissionBooth::get();
    }
    public function showModal()
    {
        $this->resetForm();
        $this->isModal = true;
    }
    public function submit(){

        $done = Visitors::where('id')->update([
            'name' => $this->name,
            'fName' => $this->fatherName,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
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
        // $this->reset(['selectedOption']);
        $this->reset(['ref_name']);
        $this->reset(['admission_booth_name']);
        $this->reset(['admission_booth_number']);
        $this->reset(['calling_person']);
        $this->reset(['comments']);
    }


}
