<?php

namespace App\Livewire\Message;

use Livewire\Component;
use App\Models\TicketMessage;
use App\Models\Ticket;
use Carbon\Carbon;
class Message extends Component
{
    public $id, $message, $ticketId;
    public function mount($id) {
        $this->id = $id;
    }
    public function render()
    {
        $userSmsMessages = TicketMessage::whereNotNull('user_id')->with('user')->get();
        $studentSmsMessages = TicketMessage::whereNotNull('student_id')->with('student')->get();

        $allSmsMessages = $userSmsMessages->merge($studentSmsMessages);

        $allSmsMessages = $allSmsMessages->where('ticket_id', $this->id)->sortBy('created_at');

        $ticket = Ticket::where('id', $this->id)->first();
        // $this->authorize('view');
        return view('livewire.message.message', compact('allSmsMessages', 'ticket'));
    }

    public function sendMessage() {
        $validated = $this->validate([
            'message' => 'required',
        ]);

        $done = TicketMessage::insert([
            'ticket_id' => $this->id,
            'student_id' => auth()->guard('student')->user()->id,
            'content' => $this->message,
            'created_at' => Carbon::now()
        ]);

        if($done){
            $this->dispatch('swal', [
                'title' => 'Message Sent',
                'type' => "success",
            ]);
            $this->reset('message');
        }
    }
}
