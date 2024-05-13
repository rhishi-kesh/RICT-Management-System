<?php

namespace App\Livewire\Homework;

use App\Models\Homework;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Component;

class ViewHomework extends Component
{
    use WithPagination;
    public $delete_id, $update_id, $title, $priority, $dueDate, $text, $singleData = [], $search;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];
    public function render()
    {
        $allHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->paginate(30, ['*'], 'allHomework');

        $doneHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->where('status', 'done')
                    ->paginate(30, ['*'], 'doneHomework');

        $pendingHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->where('status', 'pending')
                    ->paginate(30, ['*'], 'pendingHomework');

        $underProcessingHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->where('status', 'underProcessing')
                    ->paginate(30, ['*'], 'underProcessingHomework');

        $inReviewHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->where('status', 'inReview')
                    ->paginate(30, ['*'], 'inReviewHomework');

        $rejectHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->where('status', 'reject')
                    ->paginate(30, ['*'], 'rejectHomework');

        return view('livewire.homework.view-homework', compact('allHomework', 'doneHomework', 'pendingHomework', 'underProcessingHomework', 'inReviewHomework', 'rejectHomework'));
    }

    public function ShowUpdateModel($id)
    {
        $this->reset();
        $data = Homework::findOrFail($id);
        $this->update_id = $data->id;
        $this->title = $data->title;
        $this->priority = $data->priority;
        $this->dueDate = $data->dueDate;
        $this->text = $data->text;
    }

    public function update(){
        $validated = $this->validate([
            'title' => 'required',
            'priority' => 'required',
            'dueDate' => 'required',
            'text' => 'required',
        ]);

        $done = Homework::where('id',$this->update_id)->update([
            'title' => $this->title,
            'priority' => $this->priority,
            'dueDate' => $this->dueDate,
            'text' => $this->text,
            'updated_at' => Carbon::now()
        ]);
        if($done){
            $this->update_id = '';
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }

    public function deleteAlert($id){
        $this->delete_id = $id;
        $data = Homework::findOrFail($id);
        $this->dispatch('confirmDeleteAlert');
    }
    
    public function deleteStudent(){
        $done = Homework::findOrFail($this->delete_id)->delete();

        if($done){
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function viewData($id) {
        $this->singleData = Homework::where('id',$id)->first();
    }
}
