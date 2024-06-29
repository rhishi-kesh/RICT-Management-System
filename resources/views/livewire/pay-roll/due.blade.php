<div class="pt-5" x-data="modal">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-6 pt-6 pb-8 mb-4 w-full">
        <div class="lg:flex justify-between mb-4" :class="!filter ? 'flex' : 'block'">
            <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Due List</h2>
            <div>
                <button class="btn btn-submit" @click="filter = true" x-show="!filter">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-filter"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4h16v2.172a2 2 0 0 1 -.586 1.414l-4.414 4.414v7l-6 2v-8.5l-4.48 -4.928a2 2 0 0 1 -.52 -1.345v-2.227z" /></svg>
                </button>
                <form wire:submit="filter" class="block lg:flex justify-between gap-2" x-show="filter" x-cloak>
                    <div>
                        <div wire:ignore>
                            <input type="date" class="my-input focus:outline-none focus:shadow-outline block lg:inline-block mt-2 lg:mt-0" id="date" placeholder="Start Date" name="startDate" wire:model="startDate">
                        </div>
                        @if ($errors->has('startDate'))
                            <div class="text-red-500">{{ $errors->first('startDate') }}</div>
                        @endif
                    </div>
                    <div>
                        <div wire:ignore>
                            <input type="date" class="my-input focus:outline-none focus:shadow-outline block lg:inline-block mt-2 lg:mt-0" id="date" placeholder="End Date" name="endDate" wire:model="endDate">
                        </div>
                        @if ($errors->has('endDate'))
                            <div class="text-red-500">{{ $errors->first('endDate') }}</div>
                        @endif
                    </div>
                    <button class="btn btn-submit mt-2 lg:mt-0 block lg:inline-block w-full lg:w-auto">Search</button>
                </form>
            </div>
        </div>
        <div class="mb-4 overflow-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Student ID</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Mobile</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Scholarship</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Total Amount</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Total pay</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Total due</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Send Due Mail</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @forelse ($students as $key => $item)
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $i++ }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $item->student_id ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $item->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $item->mobile ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $item->course->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $item->discount ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $item->total ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $item->pay ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $item->due ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                <button wire:loading.remove wire:click="sendmailConfirm({{ $item->id }})" wire:target="sendmailConfirm({{ $item->id }})" class="text-blue-500">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-send"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                                </button>
                                <button wire:loading wire:target="sendmailConfirm({{ $item->id }})" disabled class="text-blue-500">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-loader"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 6l0 -3" /><path d="M16.25 7.75l2.15 -2.15" /><path d="M18 12l3 0" /><path d="M16.25 16.25l2.15 2.15" /><path d="M12 18l0 3" /><path d="M7.75 16.25l-2.15 2.15" /><path d="M6 12l-3 0" /><path d="M7.75 7.75l-2.15 -2.15" /></svg>
                                </button>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">

                                {{-- Edit Button --}}
                                <div class="flex justify-center">
                                    <button type="button" x-tooltip="Add Payment" class="bg-blue-500 btn text-white border-0 flex items-center justify-between text-nowrap" @click="open = true; $wire.call('ShowUpdateModel','{{ $item->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                        Add Payment
                                    </button>
                                </div>
                            </td>
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
    </div>

    {{-- Update Form --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    <h5 class="font-bold text-lg text-blue-500">Take Due</h5>
                    <button @click="open = false">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x text-blue-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg>
                    </button>
                </div>
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                    <form wire:submit="addDue" >
                        <div class="mb-1">
                            <label for="Name" class="my-label">Total Amount</label>
                            <input type="text" wire:model="total" placeholder="total amount" id="total" class="my-input focus:outline-none focus:shadow-outline" readonly>
                            @if ($errors->has('total'))
                                <div class="text-red-500">{{ $errors->first('total') }}</div>
                            @endif
                        </div>
                        <div class="mb-1">
                            <label for="Name" class="my-label">Old Payment</label>
                            <input type="text" wire:model="pay" placeholder="total payment" id="pay" class="my-input focus:outline-none focus:shadow-outline" readonly>
                            @if ($errors->has('pay'))
                                <div class="text-red-500">{{ $errors->first('pay') }}</div>
                            @endif
                        </div>
                        <div class="mb-1">
                            <label for="Name" class="my-label">Total Due</label>
                            <input type="text" wire:model="due" placeholder="Course Name" id="due" class="my-input focus:outline-none focus:shadow-outline" readonly>
                            @if ($errors->has('due'))
                                <div class="text-red-500">{{ $errors->first('due') }}</div>
                            @endif
                        </div>
                        <div class="mb-1">
                            <label for="payment" class="my-label">New Payment</label>
                            <input type="text" wire:model.live.debounce.1000ms="payment" placeholder="Payment" id="payment" class="my-input focus:outline-none focus:shadow-outline">
                            @if ($errors->has('payment'))
                                <div class="text-red-500">{{ $errors->first('payment') }}</div>
                            @endif
                        </div>
                        <div class="flex justify-end items-center mt-8">
                            <button type="submit" class="btn-submit btn ml-4" wire:loading.remove>Save</button>
                            <button type="button" disabled class="btn-submit btn ml-4" wire:loading>Loading</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script>
        flatpickr("#date");
    </script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('modal', () => ({
                filter: false,
                open: false,
            }));
        });
    </script>
    <script>
       window.addEventListener('sendDueMail', event => {
                Swal.fire({
                    title: "Are you sure you want to send this mail?",
                    text: "",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Sure"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('sendComfirm');
                    }
                });
            });

            window.addEventListener('sentSuccessfull', event => {
                const eventData = event.detail[0]; // Accessing the first element of the array
                if (eventData && eventData.title && eventData.type) {
                    Swal.fire({
                        icon: eventData.type,
                        title: eventData.title,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    console.error('Invalid event data format:', eventData);
                }
            });
    </script>
    @endpush
</div>
