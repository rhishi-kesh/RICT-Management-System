<div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
    <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">My Students</h2>
    <div>
        <div class="block md:flex item-center justify-between d px-0 md-px-6 pb-2 pt-2">
            <div class="flex items-center mr-0 md:mr-3">
                <div class="group relative flex-1">
                    <input type="text" class="peer w-full h-full bg-gray-100 dark:bg-slate-800 ps-2 py-2 rounded border dark:border-gray-700 focus:outline-none dark:focus:border-blue-500 focus:border" placeholder="Search..." wire:model.live.debounce.300ms="search">
                    <div class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary right-[11px]">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4">
                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5"></circle>
                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        {{-- Show Data --}}
        <div class="overflow-auto">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Student ID</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Email</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Number</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Batch Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Gender</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Date Of Birth</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Address</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Qualification</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Profession</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Guardian Mobile No</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Course Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Status</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($student as $key => $data)
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->firstItem() + $key }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->student_id ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->email ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->mobile ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->batch->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ ucfirst($data->gender ?? '-') }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ date("d-M-Y", strtotime($data->dateofbirth ?? '-')) }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->address ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->qualification ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->profession ?? '-'}}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->guardianMobileNo ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->course->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ ucfirst($data->student_status ?? '-') }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                <a href="{{ route('MentorgenereateReporate', $data->id ?? 0) }}" x-tooltip="Generate Report" class="bg-blue-500 btn text-white border-0 flex items-center justify-between">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chart-infographic"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M7 3v4h4" /><path d="M9 17l0 4" /><path d="M17 14l0 7" /><path d="M13 13l0 8" /><path d="M21 12l0 9" /></svg>
                                    <span class="ml-2 text-nowrap">Generate Report</span>
                                </a>
                            </td>
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
        <div class="livewire-pagination mt-5">{{ $student->links() }}</div>
    </div>
</div>
