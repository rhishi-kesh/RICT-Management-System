<?php

namespace App\Livewire\Components;

use App\Models\Notice;
use Livewire\Component;

class MentorNotification extends Component
{
    public function render()
    {
        $usersNotice = Notice::query()
            ->where('user_id', auth()->guard('mentor')->user()->id)
            ->where('person', 'm')
            ->where('is_seen', 1)
            ->latest()
            ->get();
        return view('livewire.components.mentor-notification', compact('usersNotice'));
    }
}
