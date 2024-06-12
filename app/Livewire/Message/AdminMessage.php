<?php

namespace App\Livewire\Message;

use Livewire\Component;
use App\Models\TicketMessage;
use App\Models\Ticket;
use Carbon\Carbon;
class AdminMessage extends Component
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
        // dd($allSmsMessages);
        $ticket = Ticket::where('ticket_id', $this->id)->first();
        return view('livewire.message.admin-message', compact('allSmsMessages', 'ticket'));
    }
    public function sendMessage() {
        $validated = $this->validate([
            'message' => 'required',
        ]);

        $done = TicketMessage::insert([
            'ticket_id' => $this->id,
            'user_id' => auth()->user()->id,
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

    public function changeStatus($id) {
        $ticket = Ticket::where('id', $id)->first();

        if($ticket->status == 'open'){
            $ticket->update([
                'status' => 'close',
                'updated_at' => Carbon::now()
            ]);
            $this->dispatch('swal', [
                'title' => 'Ticket Close',
                'type' => "success",
            ]);
        }else{
            $ticket->update([
                'status' => 'open',
                'updated_at' => Carbon::now()
            ]);
            $this->dispatch('swal', [
                'title' => 'Ticket Open',
                'type' => "success",
            ]);
        }
    }
}
