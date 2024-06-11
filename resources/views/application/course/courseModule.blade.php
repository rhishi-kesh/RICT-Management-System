@extends('layout/index')
@section('content')
<div class="animate__animated p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
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
            <a href="{{ route('addCourseModule', $id) }}" class="bg-blue-500 font-bold btn text-white border-0 flex items-center justify-between">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                Add Moudule
            </a>
            <a href="{{ route('course') }}" class="bg-black font-bold btn text-white border-0 inline-block ml-4 p-2 w-20 text-center">Back</a>
        </div>

        <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4 w-full">
            @if (Session::has('success'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-900 rounded-lg bg-green-300 dark:bg-gray-800 dark:text-green-400" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif
            @if (Session::has('error'))
                <div class="flex items-center p-4 mb-4 text-sm text-red-900 rounded-lg bg-red-300 dark:bg-gray-800 dark:text-red-400" role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        {{ Session::get('error') }}
                    </div>
                </div>
            @endif
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
                                    {!! Str::limit($data->class_topics ?? '-', 100, '...') !!}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">

                                    {{-- Edit Button --}}
                                    <a href="{{ route('courseModuleEdit', $data->id) }}" type="button" x-tooltip="Edit" class="inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-pencil text-green-500">
                                            <path class="text-green-500" stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                            <path d="M13.5 6.5l4 4" />
                                        </svg>
                                    </a>

                                    {{-- Delete Button --}}
                                    <a href="{{ route('courseModuleDelete', $data->id) }}" type="button" x-tooltip="Delete" class="inline-block">
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
                                    </a>
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
</div>
@endsection
