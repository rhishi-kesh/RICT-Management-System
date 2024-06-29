<?php

namespace App\Livewire\Components;

use App\Models\Notice;
use Livewire\Component;

class StudentNotification extends Component
{
    public function render()
    {
        $usersNotice = Notice::query()
            ->where('user_id', auth()->guard('student')->user()->id)
            ->where('person', 's')
            ->where('is_seen', 1)
            ->latest()
            ->get();
        return view('livewire.components.student-notification', compact('usersNotice'));
    }
}
