@extends('layout/mentorIndex')
@section('content')
    <div class="p-5" x-data="Dashboard">
        <div class="mb-6 text-black">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-5">
                <div
                    class="border-l-4 border-l-blue-500 col-span-1 md:col-span-1 overflow-hidden relative rounded p-5 shadow bg-gradient-to-r bg-[#fff] flex">
                    <div class="flex justify-center gap-3 items-center">
                        <img class="h-14 w-14 rounded-full object-cover block"
                            src="{{ empty(auth()->guard('mentor')->user()->profile) ? url('profile.jpeg') : asset('storage/' . auth()->guard('mentor')->user()->profile) }}"
                            alt="">
                        <div class="text-xl font-semibold mr-1 text-blue-500">Welcome back {{ auth()->guard('mentor')->user()->name }}!
                        </div>
                    </div>
                </div>
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1 text-blue-500">My Notice</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3 text-orange-500">{{ $mentorNotice ?? 0 }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-20 h-20 absolute right-4 top-2 opacity-20">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M13 20l7 -7" />
                        <path d="M13 20v-6a1 1 0 0 1 1 -1h6v-7a2 2 0 0 0 -2 -2h-12a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7" />
                    </svg>
                </div>
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1 text-blue-500">Total Batch</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3 text-orange-500">{{ $totalBatch ?? 0 }}</div>
                    </div>
                    <div class="mt-5 flex items-center justify-between font-semibold">
                        <div>
                            <span class="text-blue-500">Running Batch:</span> <span class="text-orange-500">{{ $runningBatch }}</span>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-20 h-20 absolute right-4 top-2 opacity-20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                        <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                    </svg>
                </div>
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1 text-blue-500">Total Students</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3 text-orange-500">{{ $totalStudent }}</div>
                    </div>
                    <div class="mt-5 flex items-center justify-between font-semibold">
                        <div>
                            <span class="text-blue-500">Running Student:</span> <span class="text-orange-500">{{ $totalRunningStudent }}</span>
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-20 h-20 absolute right-4 top-2 opacity-20">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
@endsection
