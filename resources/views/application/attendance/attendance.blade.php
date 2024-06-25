@extends('layout/mentorIndex')
@section('content')
<div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 m-5 w-full">
    <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Attendance</h2>
    <div class="w-full">
        {{-- Show Data --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
            @forelse ($batch as $key => $data)
                <a href="{{ route('attendanceBatch', $data->id) }}" class="w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 pb-0 pr-2">
                    <div class="flex justify-between mb-5 gap-2">
                        <h6 class="dark:text-white text-xl text-blue-500">{{ $data->name }}</h6>
                    </div>
                    <div class="flex items-center justify-end -space-x-1  rtl:space-x-reverse mb-5 select-none">
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
@endsection
