<?php

namespace App\Livewire\Homework;

use App\Models\Homework;
use App\Models\HomeworkSubmit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;

class SubmitedHomework extends Component
{
    use WithPagination;
    public $search, $singleData = [], $singleHomework, $feedback, $homeworkId, $status, $feedbackStatus;
    public function render()
    {
        $allHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('status', '!=', 'pending')
                    ->where('status', '!=', 'underProcessing')
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->paginate(30, ['*'], 'allHomework');

        $inReviewHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->where('status', 'inReview')
                    ->paginate(30, ['*'], 'inReviewHomework');

        $doneHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->where('status', 'done')
                    ->paginate(30, ['*'], 'doneHomework');

        $rejectHomework = Homework::query()
                    ->with(['student:id,name,profile'])
                    ->search($this->search)
                    ->where('mentor_id', Auth::guard('mentor')->user()->id)
                    ->where('status', 'reject')
                    ->paginate(30, ['*'], 'rejectHomework');

        return view('livewire.homework.submited-homework', compact('allHomework', 'inReviewHomework', 'rejectHomework', 'doneHomework'));
    }

    public function viewData($id) {
        $this->singleData = Homework::where('id',$id)->first();
    }

    public function viewHomeWork($id) {
        $this->singleHomework = HomeworkSubmit::query()
                            ->with(['homework:id,title'])
                            ->where('homework_id',$id)
                            ->first();
    }

    public function changeStatus($id) {
        $data = HomeworkSubmit::where('homework_id', $id)->first();
        $this->feedback = $data->feedback;

        $this->homeworkId = $id;
        $this->feedbackStatus = $this->status;

        $this->dispatch('showForm');
    }

    public function giveFeedback() {

        $validated = $this->validate([
            'feedback' => 'required'
        ]);

        DB::beginTransaction();
        try {

            Homework::where('id', $this->homeworkId)->update([
                'status' => $this->feedbackStatus,
                'updated_at' => Carbon::now()
            ]);

            HomeworkSubmit::where('homework_id', $this->homeworkId)->update([
                'feedback' => $this->feedback,
                'updated_at' => Carbon::now()
            ]);

            DB::commit();
            $this->dispatch('swal', [
                'title' => 'Feedback Submit Successfull',
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
}
