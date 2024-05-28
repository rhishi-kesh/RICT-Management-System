<div class="pt-5" x-data="modal">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <div>
            <div class="overflow-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Ticket ID</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Subject</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $key => $ticket)
                            <tr class="cursor-pointer dark:hover:bg-slate-800 hover:bg-slate-50 transition-transform duration-300" x-on:click="window.location.href = '{{ route('adminTicketshow', $ticket->id) }}'">
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">{{ $tickets->firstItem() + $key }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">#{{ $ticket->ticket_id }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">{{ $ticket->subject }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center @if($ticket->status == 'open') text-green-500 @else text-slate-500 dark:text-slate-200 @endif">{{ $ticket->status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="20">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="livewire-pagination mt-5">{{ $tickets->links() }}</div>
        </div>
    </div>
</div>
