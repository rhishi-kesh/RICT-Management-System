<?php

namespace App\Livewire\Ticket;

use Livewire\Component;
use App\Models\Ticket as ModelTicket;
use Carbon\Carbon;

class Ticket extends Component
{
    public $subject;
    public function render()
    {
        $tickets = ModelTicket::paginate(20);
        return view('livewire.ticket.ticket', compact('tickets'));
    }

    public function insert() {
        $validated = $this->validate([
            'subject' => 'required',
        ]);

        $ticket_id = rand(10000000,99999999);

        $done = ModelTicket::create([
            'user_id' => auth()->guard('student')->user()->id,
            'ticket_id' => $ticket_id,
            'subject' => $this->subject,
            'created_at' => Carbon::now()
        ]);

        if($done){

            $this->reset();

            $this->dispatch('swal', [
                'title' => 'Ticket Created',
                'type' => "success",
            ]);

            return redirect()->route('ticketshow', $done);
        }
    }
}
