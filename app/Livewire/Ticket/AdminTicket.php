<?php

namespace App\Livewire\Ticket;

use Livewire\Component;
use App\Models\Ticket;

class AdminTicket extends Component
{
    public function render()
    {
        $tickets = Ticket::paginate(20);
        return view('livewire.ticket.admin-ticket', compact('tickets'));
    }
}
