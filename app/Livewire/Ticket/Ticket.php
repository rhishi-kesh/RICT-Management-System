<?php

namespace App\Livewire\Ticket;

use App\Jobs\SendTicketMail;
use App\Models\SystemInformation;
use Livewire\Component;
use App\Models\Ticket as ModelTicket;
use Carbon\Carbon;
use App\Utils;

class Ticket extends Component
{
    use Utils;
    public $subject;
    public function render()
    {
        $tickets = ModelTicket::where('user_id', auth()->guard('student')->user()->id)->paginate(20);
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

        // SMS Message
        $message = "HomeWork";

        //Mail Data
        $data = [
            'subject'=> $this->subject,
        ];

        $systemInformation = SystemInformation::first();

        if($done){

            dispatch(new SendTicketMail($data, $message, $systemInformation));

            $this->reset();

            $this->dispatch('swal', [
                'title' => 'Ticket Created',
                'type' => "success",
            ]);

            return redirect()->route('ticketshow', $done->ticket_id);
        }
    }
}
