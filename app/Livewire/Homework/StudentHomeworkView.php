<?php

namespace App\Livewire\Homework;

use App\Jobs\SendHomeworkSubmitMail;
use App\Mail\submitHomeworkMail;
use App\Models\Homework;
use App\Models\HomeworkSubmit;
use App\Models\Mentor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class StudentHomeworkView extends Component
{
    public $singleData, $status, $url, $updateId, $description, $homeworkId, $inReviewStatus, $singleHomework;

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
        $this->validate([
            'status' => 'required',
        ]);

        $data = HomeworkSubmit::where('homework_id', $id)->first(['id', 'url', 'description']);
        $this->url = $data->url ?? '';
        $this->description = $data->description ?? '';

        $homework = Homework::where('id', $id)->first(['id', 'status']);
        if($homework->status == 'inReview' || $homework->status == 'done') {
            $this->dispatch('swal', [
                'title' => 'You Already Submit This Homework',
                'type' => "error",
            ]);
        } else {
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
    }

    public function editHomework($id) {
        $homework = HomeworkSubmit::where('homework_id', $id)->first();
        $this->updateId = $homework->id;
        $this->url = $homework->url;
        $this->description = $homework->description;
    }

    public function updateHomework() {
        $validated = $this->validate([
            'url' => 'required|url',
            'description' => 'required',
        ]);
        $done = HomeworkSubmit::where('homework_id', $this->updateId)->update([
            'url' => $this->url,
            'description' => $this->description,
            'updated_at' => Carbon::now()
        ]);
        if($done){
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Homework Update Successfull',
                'type' => "success",
            ]);
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

            $homework = Homework::where('id', $this->homeworkId)->first();
            $homework->update([
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

            $mentor = Mentor::where('id', $homework->mentor_id)->first();

            // //Mail Data
            $data = [
                'name'=> auth()->guard('student')->user()->name,
                'email'=> auth()->guard('student')->user()->email,
            ];

            //Mail Send
            dispatch(new SendHomeworkSubmitMail($data, $mentor->email));


            DB::commit();

            $this->dispatch('swal', [
                'title' => 'Homework Submit Successfull',
                'type' => "success",
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            $this->dispatch('swal', [
                'title' => $e->getMessage(),
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
