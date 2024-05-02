<div class="pt-5">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Recently Deleted Students</h2>
        <hr>
        <div class="w-full">
            {{-- Show Data --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Student ID</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Profile</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $key => $data)
                            <tr>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $students->firstItem() + $key }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->student_id }}
                                </td>
                                <td class="p-3 mt-2 border-b border-[#ebedf2] dark:border-[#191e3a] d-flex justify-center" style="display: flex">
                                    @if (empty($data->profile))
                                        <div class="profile w-7 h-7 text-xs">{{ mb_substr($data->name, 0, 1) }}
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <img class="w-7 h-7 rounded-full overflow-hidden object-cover ring-2 ring-white dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none"
                                                src="{{ asset('IMG_4406.JPG') }}" alt="image" />
                                        </div>
                                    @endif
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->name }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->course->name ?? '-' }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{-- Edit Button --}}
                                    <button wire:click="restoreStudent({{ $data->id }})"
                                        class="bg-green-500 btn text-white border-0">
                                        Restore
                                    </button>

                                    {{-- Edit Button --}}
                                    <button wire:click="deleteStudentAlert({{ $data->id }})"
                                        class="bg-red-500 btn text-white border-0 mt-2 mt-md-0">
                                        Delete Permanent
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
            <div class="livewire-pagination mt-5">{{ $students->links() }}</div>
        </div>
    </div>
</div>
