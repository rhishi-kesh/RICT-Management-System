<?php

namespace App\Livewire\SalesTarget;

use App\Models\SalesTarget as ModelsSalesTarget;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class SalesTarget extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $target, $date, $status, $update_id, $delete_id;

    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $selesTarget = ModelsSalesTarget::latest()->get();

        return view('livewire.sales-target.sales-target', compact('selesTarget'));
    }

    public function insert()
    {
        $validated = $this->validate([
            'target' => 'required|numeric',
            'date' => 'required|unique:sales_targets',
        ]);

        $done = ModelsSalesTarget::insert([
            'target' => $this->target,
            'date' => $this->date,
            'created_at' => Carbon::now(),
        ]);

        if ($done) {
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }

    public function ShowUpdateModel($id)
    {
        $this->reset();
        $data = ModelsSalesTarget::findOrFail($id);
        $this->update_id = $data->id;
        $this->target = $data->target;
        $this->date = date("Y-m-d", strtotime($data->date));
    }

    public function update()
    {
        $validated = $this->validate([
            'target' => 'required',
            'date' => 'required',
        ]);

        $done = ModelsSalesTarget::where('id', $this->update_id)->update([
            'target' => $this->target,
            'date' => $this->date,
            'updated_at' => Carbon::now(),
        ]);

        if ($done) {
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }

    public function deleteAlert($id)
    {
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }

    public function deleteStudent()
    {
        $done = ModelsSalesTarget::findOrFail($this->delete_id)->delete();

        if ($done) {
            $this->update_id = '';
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function showModal()
    {
        $this->reset();
    }
}
