<?php

namespace App\Livewire\Homework;

use App\Models\Homework;
use App\Models\HomeworkSubmit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StudentHomeworkView extends Component
{
    public $singleData, $status, $url, $description, $homeworkId, $inReviewStatus, $singleHomework;

    public function render()
    {
        $homeworks = Homework::query()
            ->with(['student:id,name,profile'])
            ->where('student_id', Auth::guard('student')->user()->id)
            ->paginate(30);
        return view('livewire.homework.student-homework-view', compact('homeworks'));
    }

    public function viewData($id)
    {
        $this->singleData = Homework::where('id', $id)->first();
    }

    public function changeStatus($id)
    {
        $data = HomeworkSubmit::where('homework_id', $id)->first();
        $this->url = $data->url ?? '';
        $this->description = $data->description ?? '';
        if ($this->status == 'inReview') {
            $this->homeworkId = $id;
            $this->inReviewStatus = $this->status;
            $this->dispatch('showForm');
        } else {
            $done = Homework::where('id', $id)->update([
                'status' => $this->status,
                'updated_at' => Carbon::now()
            ]);
            if ($done) {
                $this->dispatch('swal', [
                    'title' => 'Status Updated Successfull',
                    'type' => "success",
                ]);
            }
        }
    }

    public function submitHomework()
    {
        $validated = $this->validate([
            'url' => 'required|url',
            'description' => 'required',
        ]);
        DB::beginTransaction();
        try {
            Homework::where('id', $this->homeworkId)->update([
                'status' => $this->inReviewStatus,
                'updated_at' => Carbon::now()
            ]);
            HomeworkSubmit::updateOrCreate(
                [
                    'homework_id' => $this->homeworkId
                ],
                [
                    'homework_id' => $this->homeworkId,
                    'url' => $this->url,
                    'description' => $this->description,
                    'created_at' => Carbon::now()
                ]
            );
            DB::commit();
            $this->dispatch('swal', [
                'title' => 'Homework Submit Successfull',
                'type' => "success",
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->dispatch('swal', [
                'title' => 'Something went wrong',
                'type' => "danger",
            ]);
        }
    }

    public function viewHomeWork($id)
    {
        $this->singleHomework = HomeworkSubmit::query()
            ->with(['homework:id,title'])
            ->where('homework_id', $id)
            ->first();
    }
}
