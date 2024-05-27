<div class="pt-5">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-6 pt-6 pb-5 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Students</h2>
        <hr>
        <div class="flex item-center justify-between d px-6 pb-2 pt-2">
            <div class="flex item-center py-2">
                <h1 class="flex justify-center items-center font-bold">show</h1>
                <div class="dataTable-dropdown ml-[5px]">
                    <label>
                        <select class="width-auto bg-white text-state-950 border-slate-500 border rounded-[6px] pt-[.375rem] pb-[.375rem] pl-[.5rem] pr-[1rem]" wire:model.live="perpage">
                            <option value="10" selected="">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </label>
                </div>
                <h1 class="flex justify-center items-center ml-[5px] font-bold">entries</h1>
            </div>
            <div class="flex items-center" x-data="{ search: false }" @click.outside="search = false">
                <form
                    class="absolute inset-x-0 top-1/2 z-10 mx-4 hidden -translate-y-1/2 sm:relative sm:top-0 sm:mx-0 sm:block sm:translate-y-0"
                    :class="{'!block' : search}"
                >
                    <div class="relative">
                        <input wire:model.live.debounce.1000ms="search" type="text" class="peer w-full h-full bg-gray-100 dark:bg-slate-800 ps-10 py-2 rounded border dark:border-gray-700 focus:outline-none dark:focus:border-blue-500 focus:border" placeholder="Search..." />
                        <button type="button" class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-blue-500 ltr:right-auto rtl:left-auto">
                            <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </button>
                        <button
                            type="button"
                            class="absolute top-1/2 block -translate-y-1/2 hover:opacity-80 ltr:right-2 rtl:left-2 sm:hidden"
                            @click="search = false"
                        >
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                <path
                                    d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                />
                            </svg>
                        </button>
                    </div>
                </form>
                <button
                    type="button"
                    class="search_btn rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden"
                    @click="search = ! search"
                >
                    <svg
                        class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                        <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>
        <div
            x-data="{ scrollPosition: 0 }"
            style="overflow-x: auto; white-space: nowrap;"
            @wheel.prevent="onWheel"
            x-ref="scrollContainer"
        >
            <div style="display: inline-block; width: 2000px;" >
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center cursor-pointer">
                                SL
                            </th>
                            <th wire:click="doSort('student_id')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center cursor-pointer">
                                <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="StudentID" />
                            </th>
                            <th wire:click="doSort('name')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center cursor-pointer">
                                <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Name" />
                            </th>
                            <th wire:click="doSort('fName')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center cursor-pointer">
                                <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="FatherName" />
                            </th>
                            <th wire:click="doSort('mName')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center cursor-pointer">
                                <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="MotherName" />
                            </th>
                            <th wire:click="doSort('mobile')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center cursor-pointer">
                                <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="mobile" />
                            </th>
                            <th wire:click="doSort('address')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center cursor-pointer">
                                <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="Address" />
                            </th>
                            <th wire:click="doSort('email')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center cursor-pointer">
                                <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="email" />
                            </th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">DateOfBirth</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Guardian Mobile No.</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Qualification</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Profession</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course Name</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Discount</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Total Amount</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Total Pay</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Total Due</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Payment Type</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Payment Number</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Batch Name</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Gender</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Class Day</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Admission Fee</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Admission Date</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $key => $student)
                            <tr>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $students->firstItem() + $key }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->student_id ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->name ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->fName }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->mName ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->mobile ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->address ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->email ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->dateofbirth ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->guardianMobileNo ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->qualification ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->profession ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->course->name ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->discount ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->total ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->pay ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->due ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    @foreach ($paymentTypes as $item)
                                        @if($item->id == $student->paymentType)
                                            {{ $student->pament_mode->name ?? '-' }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->paymentNumber ?? "-" }}
                                </td>
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->batch->name ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->gender ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    @if(empty($student->class_days)) - @else {{ $student->class_days }} @endif
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a]">
                                    <div class="flex justify-center items-center">
                                        <label class="w-12 h-6 relative">
                                            <input type="checkbox" class="checkbox peer" id="custom_switch_checkbox6" @if($student->admissionFee == '1') checked @else {{ '' }} @endif wire:click="admissionfee({{ $student->id }})" />
                                            <span for="custom_switch_checkbox6" class="checkboxSpan"></span>
                                        </label>
                                    </div>
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->created_at->diffForHumans() ?? '-' }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] flex mt-2" >

                                    {{-- Edit Button --}}
                                    <a href="{{ route('studentsEdit', $student->slug) }}" type="button" x-tooltip="Edit">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil text-green-500"><path class="text-green-500" stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                    </a>

                                    {{-- Delete Button --}}
                                    <button type="button" x-tooltip="Delete" wire:click="deleteAlert({{ $student->id }})">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-red-500"><path class="text-red-500" stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path class="text-red-500" d="M10 11l0 6" /><path class="text-red-500" d="M14 11l0 6" /><path class="text-red-500" d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path class="text-red-500" d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </button>
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
        <div class="py-4 px-3 pb-0 mb-0">
            {{ $students->links() }}
        </div>
    </div>
    @push('js')
        <script>
            function onWheel(event) {
                const delta = Math.sign(event.deltaY || event.wheelDelta);
                const scrollContainer = event.currentTarget;
                const scrollLeft = scrollContainer.scrollLeft;

                // Calculate the new scroll position
                const newScrollLeft = scrollLeft + delta * 300;

                // Update the scroll position
                scrollContainer.scrollLeft = newScrollLeft;
            }
        </script>
    @endpush
</div>
