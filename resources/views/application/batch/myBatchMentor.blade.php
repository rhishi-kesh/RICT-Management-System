@extends('layout/mentorIndex')
@section('content')
    <div class="animate__animated p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
        <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
            <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">My Batchs</h2>
            <div>
                {{-- Show Data --}}
                <div class="overflow-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center" width="200px">Module Progress</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($batch as $key => $data)
                                <tr>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ $batch->firstItem() + $key }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ $data->name }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ $data->course->name ?? '-' }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        @php
                                            $classTaken = count($data->attendance);
                                            $totalClass = count($data->course->courseModule);
                                            $completedClsss = ($classTaken * 100) / $totalClass;
                                        @endphp
                                        <div class="w-full h-[20px] bg-gray-200 rounded-full dark:bg-gray-700 relative">
                                            <div class="{{ $completedClsss == 0 ? '' : 'bg-blue-500' }} rounded-full h-full text-xs font-medium {{ $completedClsss < 50 ? 'text-blue-500' : 'text-white' }} text-center p-0.5 leading-none rounded-full" style="width: {{ $completedClsss < 100 ? $completedClsss . '%' : '100%' }}">
                                                <span class="absolute left-0 top-0 w-full h-full flex justify-center items-center">{{ $completedClsss }}%</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center @if($data->status == 'complete') text-green-500 @endif">
                                        {{ ucfirst($data->status) }}
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
                <div class="livewire-pagination mt-5">{{ $batch->links() }}</div>
            </div>
        </div>
    </div>
@endsection
