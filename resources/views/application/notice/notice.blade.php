@extends('layout/index')
@section('content')
<div class="animate__animated p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
    <div class="pt-5" x-data="modal">
        <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4 w-full">
            <div class="w-full mb-10">
                <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Notice</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-2">
                    <a href="{{ route('noticeMentor') }}">
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 pb-0 pr-2">
                            <div class="flex justify-between mb-5 gap-2">
                                <h6 class="dark:text-white text-xl text-blue-500">Mentors</h6>
                            </div>
                            <div class="flex items-center justify-end -space-x-1 rtl:space-x-reverse mb-5 select-none">
                                @foreach ($mentors as $data2)
                                    @if (empty($data2->image))
                                        <div class="profile w-7 h-7 text-xs">{{ mb_substr(strtoupper($data2->name), 0, 1) }}</div>
                                    @else
                                        <img class="w-7 h-7 rounded-full overflow-hidden object-cover ring-2 ring-white dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none" src="{{ asset('storage/' . $data2->image) }}" alt="image" />
                                    @endif
                                @endforeach
                                <span class="bg-white rounded-full px-2 py-1 text-primary text-xs shadow-[0_0_20px_0_#d0d0d0] dark:shadow-none dark:bg-[#0e1726] dark:text-white">({{ count($mentors) }})Total</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('noticeSystemUser') }}">
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 pb-0 pr-2">
                            <div class="flex justify-between mb-5 gap-2">
                                <h6 class="dark:text-white text-xl text-blue-500">System Users</h6>
                            </div>
                            <div class="flex items-center justify-end -space-x-1 rtl:space-x-reverse mb-5 select-none">
                                @foreach ($users as $data2)
                                    @if (empty($data2->profile))
                                        <div class="profile w-7 h-7 text-xs">{{ mb_substr(strtoupper($data2->name), 0, 1) }}</div>
                                    @else
                                        <img class="w-7 h-7 rounded-full overflow-hidden object-cover ring-2 ring-white dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none"
                                            src="{{ asset('storage/' . $data2->profile) }}" alt="image" />
                                    @endif
                                @endforeach
                                <span class="bg-white rounded-full px-2 py-1 text-primary text-xs shadow-[0_0_20px_0_#d0d0d0] dark:shadow-none dark:bg-[#0e1726] dark:text-white">({{ count($users) }})Total</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('noticeStudentWithoutBatch') }}">
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 pb-0 pr-2">
                            <div class="flex justify-between mb-5 gap-2">
                                <h6 class="dark:text-white text-xl text-blue-500">Student Without Batch</h6>
                            </div>
                            <div class="flex items-center justify-end -space-x-1 rtl:space-x-reverse mb-5 select-none">
                                @foreach ($studentWithoutBatch as $data2)
                                    @if (empty($data2->profile))
                                        <div class="profile w-7 h-7 text-xs">{{ mb_substr(strtoupper($data2->name), 0, 1) }}</div>
                                    @else
                                        <img class="w-7 h-7 rounded-full overflow-hidden object-cover ring-2 ring-white dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none"
                                            src="{{ asset('storage/' . $data2->profile) }}" alt="image" />
                                    @endif
                                @endforeach
                                <span class="bg-white rounded-full px-2 py-1 text-primary text-xs shadow-[0_0_20px_0_#d0d0d0] dark:shadow-none dark:bg-[#0e1726] dark:text-white">({{ count($studentWithoutBatch) }})Total</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('noticeAdmissionBooth') }}">
                        <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 pb-0 pr-2">
                            <div class="flex justify-between mb-5 gap-2">
                                <h6 class="dark:text-white text-xl text-blue-500">Admission Booth</h6>
                            </div>
                            <div class="flex items-center justify-end -space-x-1 rtl:space-x-reverse mb-5 select-none">
                                @foreach ($admissionBooth as $data2)
                                    <div class="profile w-7 h-7 text-xs">{{ mb_substr(strtoupper($data2->id), 0, 1) }}</div>
                                @endforeach
                                <span class="bg-white rounded-full px-2 py-1 text-primary text-xs shadow-[0_0_20px_0_#d0d0d0] dark:shadow-none dark:bg-[#0e1726] dark:text-white">({{ count($admissionBooth) }})Total</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Batchs</h2>
            <div class="w-full">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
                    @forelse ($batch as $key => $data)
                        <a href="{{ route('noticeBatch', $data->id) }}">
                            <div class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 pb-0">
                                <div class="flex justify-between mb-5 gap-2">
                                    <h6 class="text-blue-500 dark:text-white text-xl">{{ $data->name }}</h6>
                                </div>
                                <div class="flex items-center justify-end -space-x-1 rtl:space-x-reverse mb-5 select-none">
                                    @foreach ($data->students as $data2)
                                        @if (empty($data2->profile))
                                            <div class="profile w-7 h-7 text-xs">{{ mb_substr(strtoupper($data2->name), 0, 1) }}</div>
                                        @else
                                            <img class="w-7 h-7 rounded-full overflow-hidden object-cover ring-2 ring-white dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none"
                                                src="{{ asset('storage/' . $data2->profile) }}" alt="image" />
                                        @endif
                                    @endforeach
                                    <span class="bg-white rounded-full px-2 py-1 text-primary text-xs shadow-[0_0_20px_0_#d0d0d0] dark:shadow-none dark:bg-[#0e1726] dark:text-white">({{ $data->students_count }})Total</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div></div>
                        <div class="w-full">
                            <div class="flex justify-center items-center">
                                <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="livewire-pagination mt-5">{{ $batch->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
