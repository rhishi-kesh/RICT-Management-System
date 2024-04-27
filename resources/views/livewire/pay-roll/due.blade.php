<div class="pt-5">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-6 pt-6 pb-8 mb-4 w-full">
        <div class="flex justify-between mb-4">
            <h2 class="mb-2 font-bold text-3xl dark:text-white">Due List</h2>
        </div>
        <div class="mb-4 overflow-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">StudentID</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Mobile</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Discount</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Total Amount</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Total pay</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Total due</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($students as $key => $item)
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $students->firstItem() + $key }}
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

                                {{-- Edit Button --}}
                                <div class="flex justify-center">
                                    <button type="button" x-tooltip="Add Payment" wire:click="ShowUpdateModel({{ $item->id }})" class="bg-blue-500 btn text-white border-0 flex items-center justify-between">
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
        {{ $students->links() }}
    </div>

    {{-- Update Form --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] @if($isModal)  @else hidden @endif overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
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
                            <label for="Name" class="my-label">Payment</label>
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
                            <label for="payment" class="my-label">Payment</label>
                            <input type="text" wire:model.live.debounce.1000ms="payment" placeholder="Payment" id="payment" class="my-input focus:outline-none focus:shadow-outline">
                            @if ($errors->has('payment'))
                                <div class="text-red-500">{{ $errors->first('payment') }}</div>
                            @endif
                        </div>
                        <div class="flex justify-end items-center mt-8">
                            <button wire:click="removeModal" type="button" class="shadow btn bg-gray-50 dark:bg-gray-800">Discard</button>
                            <button type="submitDue" class="bg-gray-900 text-white btn ml-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
