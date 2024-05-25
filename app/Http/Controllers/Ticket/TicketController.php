<?php

namespace App\Http\Controllers\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ticketindex()
    {
        return view('application.ticket.index');
    }

    public function ticketshow($id)
    {
        return view('application.ticketMessage.index', compact('id'));
    }

    public function adminTicketindex()
    {
        return view('application.ticket.adminTicket');
    }

    public function adminTicketshow($id)
    {
        return view('application.ticketMessage.adminMessage', compact('id'));
    }
}
