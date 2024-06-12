<div class="pt-5" x-data="modal">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <div class="mb-3">
            <button @click="open = true" class="bg-blue-500 btn text-white border-0 flex items-center justify-between">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Create Ticket
            </button>
        </div>
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
                            <tr class="cursor-pointer dark:hover:bg-slate-800 hover:bg-slate-50 transition-transform duration-300" x-on:click="window.location.href = '{{ route('ticketshow', $ticket->ticket_id) }}'">
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">{{ $tickets->firstItem() + $key }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">#{{ $ticket->ticket_id }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">{{ $ticket->subject }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center @if($ticket->status == 'open') text-green-500 @else text-slate-500 dark:text-slate-200 @endif">{{ ucfirst($ticket->status) }}</td>
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
    {{-- Update & Instert Form --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    <h5 class="font-bold text-lg">Create Ticket</h5>
                </div>
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                    <form method="post" wire:submit="insert">
                        <div class="mb-1">
                            <label for="subject" class="my-label">Subject</label>
                            <input type="text" wire:model="subject" placeholder="Enter Subject" id="subject" class="my-input focus:outline-none focus:shadow-outline">
                            @if ($errors->has('subject'))
                                <div class="text-red-500">{{ $errors->first('subject') }}</div>
                            @endif
                        </div>
                        <div class="flex justify-end items-center mt-8">
                            <button type="reset" class="shadow btn bg-gray-50 dark:bg-gray-800">Reset</button>
                            <button type="submit" class="bg-gray-900 text-white btn ml-4" wire:loading.remove>Save</button>
                            <button type="button" disabled class="bg-gray-900 text-white btn ml-4" wire:loading>Loading</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
