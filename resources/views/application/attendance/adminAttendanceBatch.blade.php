@extends('layout/index')
@section('content')
    <div class="animate__animated p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
        <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
            <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Attendance of <span class="text-orange-500">{{ $batchName->name }}</span> batch</h2>
            <hr>
            <div>
                {{-- Show Data --}}
                <div class="overflow-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Date</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($attendance as $key => $data)
                                <tr>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ $attendance->firstItem() + $key }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ date('M d, Y', strtotime($data->date)) }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">


                                        {{-- View Button --}}
                                        <a type="button" x-tooltip="View" href="{{ route('adminAttendanceView', [$data->date, $id]) }}" class="inline-block">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"  height="24" viewBox="0 0 24 24" fill="currentColor" class="dark:text-[#96b6c0] text-black"><path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"></path></svg>
                                        </a>


                                        {{-- Generate PDF Button --}}
                                        <a type="button" x-tooltip="Download" href="{{ route('attendanceDownload', [$data->date, $id]) }}" class="inline-block">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                                        </a>
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
                <div class="livewire-pagination mt-5">{{ $attendance->links() }}</div>
            </div>
        </div>
    </div>
@endsection
