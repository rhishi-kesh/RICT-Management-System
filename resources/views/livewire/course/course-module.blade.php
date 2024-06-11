<div class="pt-5" x-data="modal">

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            input[type="date"]::-webkit-inner-spin-button,
            input[type="date"]::-webkit-calendar-picker-indicator {
                display: none;
                -webkit-appearance: none;
                user-select: none;
            }
            .ck-editor__editable_inline {
                min-height: 140px;
            }
            .bg-light.active {
                background: #5D87FF !important;
            }
        </style>
    @endpush

    {{-- Insert Button --}}
    <div class="flex justify-start items-center mt-4 mb-4">
        <button class="bg-blue-500 font-bold btn text-white border-0 flex items-center justify-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            <a href="{{ route('addCourseModule', $course_id) }}"> Add Moudule </a>
        </button>
        <button type="submit"
            class="bg-black font-bold btn text-white border-0 flex items-center justify-between ml-7 p-2 w-20 text-center"><a
                href="{{ route('course') }}" class="ml-4">Back</a></button>
    </div>

    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Course Moudule</h2>
        <hr>
        <div>
            {{-- Show Data --}}
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Class No.</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Class Topics</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($CourseModule as $key => $data)
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $CourseModule->firstItem() + $key }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->class_no ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->class_topics ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">

                                {{-- Edit Button --}}
                                <button type="button" x-tooltip="Edit" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pencil text-green-500">
                                        <path class="text-green-500" stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>
                                    <a href="{{ route('courseModuleEdit') }}"></a>
                                </button>

                                {{-- Delete Button --}}
                                <button wire:click="deleteAlert({{ $data->id }})" type="button" x-tooltip="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-red-500">
                                        <path class="text-red-500" stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7l16 0" />
                                        <path class="text-red-500" d="M10 11l0 6" />
                                        <path class="text-red-500" d="M14 11l0 6" />
                                        <path class="text-red-500" d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                        <path class="text-red-500" d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="20">
                                <div class="flex justify-center items-center">
                                    <img src="{{ asset('empty.png') }}" alt=""
                                        class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                </div>
                                </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="livewire-pagination mt-5">{{ $CourseModule->links() }}</div>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr("#date");
        </script>
        <script>
            ClassicEditor
                .create(document.querySelector('#class_topics'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
</div>
