<?php

namespace App\Livewire\Components;

use App\Models\Notice;
use Livewire\Component;

class AdminNotification extends Component
{
    public function render()
    {
        $usersNotice = Notice::query()
            ->where('user_id', auth()->user()->id)
            ->where('person', 'a')
            ->where('is_seen', 1)
            ->latest()
            ->get();
        return view('livewire.components.admin-notification', compact('usersNotice'));
    }
}
