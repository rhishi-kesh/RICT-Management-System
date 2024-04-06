<div class="pt-5">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-6 pt-6 pb-8 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Due List</h2>
        <hr>
        <div class="flex item-center justify-between d p-6">
            {{-- <div class="grid grid-cols-12 gap-2">
                <div class="col-start-2 col-span-2">
                        <div class="flex space-x-4 item-center mb-3">
                           <h1>show</h1>
                            <select wire:model.live="perpage">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </select>
                            <h1>entries</h1>
                        </div>
                </div>
                <div class="col-end-12 col-span-2">
                    <div class="flex space-x-4 item-center mb-3">
                        <h1 class="" style="font-size: 15px;">search</h1>
                        <input wire:model.live.debounch.300ms="search" type="text"
                            class="peer w-full h-full bg-gray-100 dark:bg-slate-800 ps-10 py-2 rounded border dark:border-gray-700 focus:outline-none dark:focus:border-blue-500 focus:border"
                            placeholder="Search..." />
                        <button type="button"
                            class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-blue-500 ltr:right-auto rtl:left-auto">
                            <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5"
                                    opacity="0.5" />
                                <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div> --}}
        </div>
        <div style="overflow: auto;">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
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
                    @foreach ($students as $student)
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['id'] }} </td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['name'] }}</td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['mobile'] }} </td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['courseName'] }} </td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['discount'] }} </td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['total'] }} </td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['pay'] }} </td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['due'] }} </td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{-- Edit Button --}}
                                <button type="button" x-tooltip="Edit"
                                wire:click="ShowUpdateModel({{ $student['id']}})" class="bg-blue-500 btn text-white border-0 flex items-center justify-between">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    Add Payment
                                </button>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- {{ $students->links() }} --}}
    </div>




    {{-- Update & Instert Form --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] @if($isModal)  @else hidden @endif overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                    <form
                        wire:submit="addDue"   
                    >
                        <div class="mb-1">
                            <label for="Name" class="my-label">Total Amount</label>
                            <input type="text" wire:model="total" placeholder="total amount" id="total" class="my-input focus:outline-none focus:shadow-outline">
                            @if ($errors->has('total'))
                                <div class="text-red-500">{{ $errors->first('total') }}</div>
                            @endif
                        </div>
                        <div class="mb-1">
                            <label for="Name" class="my-label">Payment</label>
                            <input type="text" wire:model="pay" placeholder="total payment" id="pay" class="my-input focus:outline-none focus:shadow-outline">
                            @if ($errors->has('pay'))
                                <div class="text-red-500">{{ $errors->first('pay') }}</div>
                            @endif
                        </div>
                        <div class="mb-1">
                            <label for="Name" class="my-label">Total Due</label>
                            <input type="text" wire:model="due" placeholder="Course Name" id="due" class="my-input focus:outline-none focus:shadow-outline">
                            @if ($errors->has('due'))
                                <div class="text-red-500">{{ $errors->first('due') }}</div>
                            @endif
                        </div>
                        <div class="mb-1">
                            <label for="paydue" class="my-label">Pay due</label>
                            <input type="text" wire:model="paydue" placeholder="Pay due" id="paydue" class="my-input focus:outline-none focus:shadow-outline">
                            @if ($errors->has('paydue'))
                                <div class="text-red-500">{{ $errors->first('paydue') }}</div>
                            @endif
                        </div>
                        <div class="flex justify-end items-center mt-8">
                            <button wire:click="removeModal" type="button" class="shadow btn bg-gray-50 dark:bg-gray-800">Discard</button>
                            <button type="submitDue" class="bg-gray-900 text-white btn ltr:ml-4 rtl:mr-4">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
