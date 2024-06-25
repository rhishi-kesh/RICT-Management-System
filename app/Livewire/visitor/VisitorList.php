<?php

namespace App\Livewire\Visitor;

use Livewire\Component;
use App\Models\Visitors;
use Illuminate\Support\Carbon;
use Livewire\WithPagination;
class VisitorList extends Component
{
    use WithPagination;
    public $visitor_id, $delete_id, $call_count, $sortColumn, $perpage = 50, $search= '';
    protected $listeners = [
        'addConfirm' => 'updateCall',
        'deleteConfirm' => 'deleteStudent'
    ];
    public function render()
    {
        $visitor = Visitors::with(['course:id,name', 'councile:id,name','callingperson:id,name', 'admissionBooth:id,name,number'])
        ->search($this->search)
        ->paginate($this->perpage);

        return view('livewire.visitor.visitor-list', compact('visitor'));
    }
    public function callcount($id) {
        $this->visitor_id = $id;
        $this->dispatch('confirmaddAlert');
    }
    public function updateCall() {
        $visitor = Visitors::where('id', $this->visitor_id)->first();
        $callDate = $visitor->calling_date;
        $callDataArray = explode(",",$callDate);
        array_push($callDataArray,Carbon::now());
        $callDataArray = implode(',', $callDataArray);
        $newCall = $visitor->call_count += 1;
        $done = Visitors::where('id', $this->visitor_id)->update([
            'call_count' => $newCall,
            'calling_date' => $callDataArray,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->dispatch('callAddSuccessfull', [
                'title' => 'New Call Added',
                'type' => "success",
            ]);
        }
    }
    public function deleteAlert($id) {
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent() {
        $done = Visitors::findOrFail($this->delete_id)->delete();
        if($done){
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
}
