<?php

namespace App\Livewire\Course;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Course_FAQ;
use Livewire\WithPagination;

class CourseFAQ extends Component
{
    use WithPagination;
    public $question, $answer, $delete_id, $update_id, $oldimage, $course_id;

    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function mount($id)
    {
        $this->course_id = $id;
        $this->delete_id = $id;
    }
    public function render()
    {
        $courseFaq = Course_FAQ::where('course_id', $this->course_id)->latest()->paginate(15);
        return view('livewire.course.course-faq', compact('courseFaq'));
    }
    public function insert()
    {
        $validated = $this->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $done = Course_FAQ::insert([
            'course_id' => $this->course_id,
            'question' => $this->question,
            'answer' => $this->answer,
            'created_at' => Carbon::now(),
        ]);
        if ($done) {
            $this->reset('question');
            $this->reset('answer');
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function ShowUpdateModel($id)
    {
        $this->reset();
        $data = Course_FAQ::findOrFail($id);
        $this->update_id = $data->id;
        $this->question = $data->question;
        $this->answer = $data->answer;
    }
    public function update()
    {
        $validated = $this->validate([
            'question' => 'nullable',
            'answer' => 'nullable',
        ]);
        $done = Course_FAQ::where('id', $this->update_id)->update([
            'question' => $this->question,
            'answer' => $this->answer,
            'updated_at' => Carbon::now()
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
        $done = Course_FAQ::findOrFail($this->delete_id);
        $done->delete();
        if ($done) {
            $this->update_id = '';
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function showModal()
    {
        $this->reset('question');
        $this->reset('answer');
    }

}
