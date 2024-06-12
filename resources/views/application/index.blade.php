@extends('layout/index')
@section('content')
    <div class="p-5" x-data="Dashboard">
        <div class="mb-6 text-black">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-5">
                <div class="border-t-4 border-t-blue-500  col-span-1 md:col-span-2 overflow-hidden relative rounded p-5 shadow bg-gradient-to-r bg-[#fff]">
                    <div class="flex justify-start gap-3 items-center">
                        <img class="h-14 w-14 rounded-full object-cover block" src="{{ empty(auth()->user()->profile) ? url('profile.jpeg') : asset('storage/' . auth()->user()->profile) }}" alt="">
                        <div class="text-xl font-semibold mr-1">Welcome back {{ auth()->user()->name }}!</div>
                    </div>
                    <div class="mt-5 flex justify-start gap-2">
                        <div>
                            <div class="text-3xl font-bold mr-3">&#2547; {{ $todayStudentSaleSum }}</div>
                            Today's Sales
                        </div>
                    </div>
                    <img src="{{ asset('frontend/images/auth/welcome.svg') }}" alt="" class="s absolute bottom-[-30px] right-5 hidden md:block">
                </div>
                <div class="bg-white p-4 text-left flex items-center border-t-4 border-t-blue-500 relative">
                    <div class="">
                        <h2 class="text-xl font-semibold">Today Admission</h2>
                        <h2 class="text-3xl font-bold mr-3 mt-3">{{ $todayStudentCount }}</h2>
                    </div>
                    <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users-plus w-20 md:w-32 h-20 md:h-32 absolute right-4 bottom-2 opacity-20"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                </div>
                <div class="bg-white p-4 text-left flex items-center border-t-4 border-t-blue-500 relative">
                    <div class="">
                        <h2 class="text-xl font-semibold">Today Visitor</h2>
                        <h2 class="text-3xl font-bold mr-3 mt-3">{{ $todayVisitorCount }}</h2>
                    </div>
                    <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users-plus w-20 md:w-32 h-20 md:h-32 absolute right-4 bottom-2 opacity-20"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-10">
                <!-- Student -->
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">Total Students</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $totalStudentCount }}</div>
                    </div>
                    <div class="mt-5 flex items-center justify-between font-semibold">
                        <div>
                            Last Month: {{ $lastMonthStudentAdmission }}
                        </div>
                        <div>
                            This Month: {{ $thisMonthStudentAdmission }}
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

                {{-- Visitor --}}
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">Total Visitors</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $totalVisitorCount }}</div>
                    </div>
                    <div class="mt-5 flex items-center justify-between font-semibold">
                        <div>
                            Last Month: {{ $lastMonthVisitorAdmission }}
                        </div>
                        <div>
                            This Month: {{ $thisMonthVisitorAdmission }}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-20 h-20 absolute right-4 top-2 opacity-20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1" />
                        <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M17 10h2a2 2 0 0 1 2 2v1" />
                        <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M3 13v-1a2 2 0 0 1 2 -2h2" />
                    </svg>
                </div>

                {{-- Batch --}}
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">Total Batch</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $totalBatch }}</div>
                    </div>
                    <div class="mt-5 flex items-center justify-between font-semibold">
                        <div>
                            Running Batch: {{ $totalRunningBatch }}
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

                {{-- Total Due --}}
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">Total Due</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">&#2547; {{ $totalDueStudentSum }}</div>
                    </div>
                    <div class="mt-5 flex items-center justify-between font-semibold">
                        <div>
                            Student With Due: {{ $totalDueStudent }}
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-20 h-20 absolute right-4 top-2 opacity-20">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M8 8l.553 -.276a1 1 0 0 1 1.447 .894v6.382a2 2 0 0 0 2 2h.5a2.5 2.5 0 0 0 2.5 -2.5v-.5h-1" />
                        <path d="M8 11h7" />
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-3 xl:grid-cols-5 mt-8">
                {{-- Mentors --}}
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">Total Mentors</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $totalMentor }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-12 h-12 absolute right-4 top-2 opacity-20"
                        fill="currentColor">
                        <path
                            d="M8 4C8 5.10457 7.10457 6 6 6 4.89543 6 4 5.10457 4 4 4 2.89543 4.89543 2 6 2 7.10457 2 8 2.89543 8 4ZM5 16V22H3V10C3 8.34315 4.34315 7 6 7 6.82059 7 7.56423 7.32946 8.10585 7.86333L10.4803 10.1057 12.7931 7.79289 14.2073 9.20711 10.5201 12.8943 9 11.4587V22H7V16H5ZM6 9C5.44772 9 5 9.44772 5 10V14H7V10C7 9.44772 6.55228 9 6 9ZM19 5H10V3H20C20.5523 3 21 3.44772 21 4V15C21 15.5523 20.5523 16 20 16H16.5758L19.3993 22H17.1889L14.3654 16H10V14H19V5Z">
                        </path>
                    </svg>
                </div>

                {{-- Users --}}
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">Total Users</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $totalUsers }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-12 h-12 absolute right-4 top-2 opacity-20">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                </div>

                {{-- Course --}}
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">Total Course</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $totalCourse }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-12 h-12 absolute right-4 top-2 opacity-20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                        <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" />
                        <path d="M3 6l0 13" />
                        <path d="M12 6l0 13" />
                        <path d="M21 6l0 13" />
                    </svg>
                </div>

                {{-- Admission Booth --}}
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">Total Admission Booth</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $totalAdmissionBooth }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-12 h-12 absolute right-4 top-2 opacity-20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h.5" />
                        <path
                            d="M18 22l3.35 -3.284a2.143 2.143 0 0 0 .005 -3.071a2.242 2.242 0 0 0 -3.129 -.006l-.224 .22l-.223 -.22a2.242 2.242 0 0 0 -3.128 -.006a2.143 2.143 0 0 0 -.006 3.071l3.355 3.296z" />
                    </svg>
                </div>

                {{-- Total Sale --}}
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">Total Sale</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">&#2547; {{ $totalSale }}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-school w-12 h-12 absolute right-4 top-2 opacity-20">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M8 8l.553 -.276a1 1 0 0 1 1.447 .894v6.382a2 2 0 0 0 2 2h.5a2.5 2.5 0 0 0 2.5 -2.5v-.5h-1" />
                        <path d="M8 11h7" />
                        <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                    </svg>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="mt-10">
                <ul class="mb-5 mt-3 flex flex-wrap">
                    <li>
                        <a
                            href="javascript:;"
                            class="uppercase select-none text-[.875rem] font-[600] -mb-[1px] flex items-center p-5 py-3 hover:bg-blue-500 hover:text-white"
                            @click="statistics = 'monthly'"
                            :class="statistics == 'monthly' ? 'bg-blue-500 text-white' : 'bg-white text-black'"
                        >
                            Monthly
                        </a>
                    </li>
                    <li>
                        <a
                            href="javascript:;"
                            class="uppercase select-none text-[.875rem] font-[600] -mb-[1px] flex items-center p-5 py-3 hover:bg-blue-500 hover:text-white"
                            @click="statistics = 'yearly'"
                            :class="statistics == 'yearly' ? 'bg-blue-500 text-white' : 'bg-white text-black'"
                        >
                            Yearly
                        </a>
                    </li>
                    {{-- <li>
                        <a
                            href="javascript:;"
                            class="uppercase select-none text-[.875rem] font-[600] -mb-[1px] flex items-center p-5 py-3 hover:bg-blue-500 hover:text-white"
                            @click="statistics = 'others'"
                            :class="statistics == 'others' ? 'bg-blue-500 text-white' : 'bg-white text-black'"
                        >
                            Others
                        </a>
                    </li> --}}
                </ul>
            </div>

            <div x-show="statistics == 'monthly'" x-cloak x-transition.duration.500ms>
                <div class="grid grid-cols-1 gap-6 mt-5">

                    {{-- Admission --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                            <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Total Admission
                            </h6>
                        </div>
                        <div class="pt-0 px-2 pb-0">
                            <div id="daylyAdmission"></div>
                        </div>
                    </div>

                    {{-- Visitor --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                            <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Total Visitor
                            </h6>
                        </div>
                        <div class="pt-0 px-2 pb-0">
                            <div id="daylyVisitor"></div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-5">

                    {{-- admissionOnCourse --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="flex flex-col justify-center items-center h-[300px]">
                            <h6
                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Admissions On Different Course
                            </h6>
                            <div id="monthlyAdmissionOnCourse"></div>
                        </div>
                    </div>

                    {{-- admissionOnCourse --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="flex flex-col justify-center items-center h-[300px]">
                            <h6
                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Visitor On Different Course
                            </h6>
                            <div id="monthlyVisitorOnDifferentCourse"></div>
                        </div>
                    </div>

                    {{-- admissionOnCourse --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="flex flex-col justify-center items-center h-[300px]">
                            <h6
                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Sales Target On This Month
                            </h6>
                            <div id="target"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div x-show="statistics == 'yearly'" x-cloak x-transition.duration.500ms>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 mt-5">

                    {{-- Admission --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div
                            class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                            <h6
                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Total Admission
                            </h6>
                        </div>
                        <div class="pt-0 px-2 pb-0">
                            <div id="monthlyAdmissionCounts"></div>
                        </div>
                    </div>

                    {{-- Visitor --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div
                            class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">
                            <h6
                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Total Visitor
                            </h6>
                        </div>
                        <div class="pt-0 px-2 pb-0">
                            <div id="monthlyVisitorCounts"></div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-5">

                    {{-- StudentCondation --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="flex flex-col justify-center items-center h-[300px]">
                            <h6
                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Student Status
                            </h6>
                            <div id="YearlyStudentStatus"></div>

                            {{-- <div class="flex justify-center sm:justify-end items-center gap-x-4 mt-3 sm:mt-6">
                                <div class="inline-flex items-center">
                                    <span class="size-2.5 inline-block bg-green-500 rounded-sm me-2"></span>
                                    <span class="text-[13px] text-gray-600">
                                        Complete
                                    </span>
                                </div>
                                <div class="inline-flex items-center">
                                    <span class="size-2.5 inline-block bg-red-500 rounded-sm me-2"></span>
                                    <span class="text-[13px] text-gray-600">
                                        Cancel
                                    </span>
                                </div>
                                <div class="inline-flex items-center">
                                    <span class="size-2.5 inline-block bg-gray-300 rounded-sm me-2"></span>
                                    <span class="text-[13px] text-gray-600">
                                        Running
                                    </span>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    {{-- admissionOnCourse --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="flex flex-col justify-center items-center h-[300px]">
                            <h6
                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Admissions On Different Course
                            </h6>
                            <div id="yearlyAdmissionsOnDefferentCourse"></div>
                        </div>
                    </div>

                    {{-- admissionOnCourse --}}
                    <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                        <div class="flex flex-col justify-center items-center h-[300px]">
                            <h6
                                class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                                Visitor On Different Course
                            </h6>
                            <div id="yearlyVisitorsOnDefferentCourse"></div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div x-show="statistics == 'others'" x-cloak x-transition.duration.500ms>

            </div> --}}
        </div>
        @push('js')
            <script>
                document.addEventListener('alpine:init', () => {
                    Alpine.data('Dashboard', () => ({
                        statistics: 'monthly',
                    }));
                });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
                // MonthAdmission
                var daylyadmissionOptions = {
                    chart: {
                        type: 'line',
                        height: 350,
                        toolbar: {
                            show: false,
                        },
                    },
                    series: [{
                        name: 'Admission',
                        data: @json($daylyAdmissionData)
                    }],
                    title: {
                        show: "",
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    colors: ["#020617"],
                    stroke: {
                        lineCap: "round",
                        curve: "smooth",
                    },
                    markers: {
                        size: 0,
                    },
                    xaxis: {
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        labels: {
                            style: {
                                colors: "#616161",
                                fontSize: "12px",
                                fontFamily: "inherit",
                                fontWeight: 400,
                            },
                        },
                        categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: "#616161",
                                fontSize: "12px",
                                fontFamily: "inherit",
                                fontWeight: 400,
                            },
                        },
                    },
                    grid: {
                        show: true,
                        borderColor: "#dddddd",
                        strokeDashArray: 5,
                        xaxis: {
                            lines: {
                                show: true,
                            },
                        },
                        padding: {
                            top: 5,
                            right: 20,
                        },
                    },
                    fill: {
                        opacity: 0.8,
                    },
                    tooltip: {
                        theme: "dark",
                    },
                };
                const daylyadmission = new ApexCharts(document.querySelector("#daylyAdmission"), daylyadmissionOptions);
                daylyadmission.render();

                // MonthVisitor
                var daylyVisitorOptions = {
                    chart: {
                        type: 'line',
                        height: 350,
                        toolbar: {
                            show: false,
                        },
                    },
                    series: [{
                        name: 'Visitor',
                        data: @json($daylyVisitorData)
                    }],
                    title: {
                        show: "",
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    colors: ["#020617"],
                    stroke: {
                        lineCap: "round",
                        curve: "smooth",
                    },
                    markers: {
                        size: 0,
                    },
                    xaxis: {
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        labels: {
                            style: {
                                colors: "#616161",
                                fontSize: "12px",
                                fontFamily: "inherit",
                                fontWeight: 400,
                            },
                        },
                        categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: "#616161",
                                fontSize: "12px",
                                fontFamily: "inherit",
                                fontWeight: 400,
                            },
                        },
                    },
                    grid: {
                        show: true,
                        borderColor: "#dddddd",
                        strokeDashArray: 5,
                        xaxis: {
                            lines: {
                                show: true,
                            },
                        },
                        padding: {
                            top: 5,
                            right: 20,
                        },
                    },
                    fill: {
                        opacity: 0.8,
                    },
                    tooltip: {
                        theme: "dark",
                    },
                };
                const daylyVisitor = new ApexCharts(document.querySelector("#daylyVisitor"), daylyVisitorOptions);
                daylyVisitor.render();

                // Monthly Admission On Different Course
                var monthlyAdmissionOnCourseOption = {
                        chart: {
                        height: 200,
                        width: 200,
                        type: 'donut',
                        zoom: {
                            enabled: false
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '80%'
                            }
                        }
                    },
                    series: Object.values(@json($monthlyAdmissionsOnDefferentCourse)),
                    labels: Object.keys(@json($monthlyAdmissionsOnDefferentCourse)),
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 5
                    },
                    grid: {
                        padding: {
                            top: 12,
                            bottom: 11,
                            left: 12,
                            right: 12
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        custom: function({ series, seriesIndex, dataPointIndex, w }) {
                            return '<div class="arrow_box">' +
                                '<span>' + w.globals.labels[seriesIndex] + ': ' + series[seriesIndex] + '</span>' +
                                '</div>';
                        }
                    },
                    colors: ['#2ecc71', '#3498db', '#9b59b6', '#1abc9c', '#34495e', '#f1c40f', '#e67e22', '#e74c3c', '#ecf0f1', '#95a5a6', '#55efc4', '#81ecec', '#74b9ff', '#a29bfe', '#2d3436', '#d63031', '#e17055', '#fdcb6e', '#ff7675', '#C4E538', '#009432', '#1289A7', '#FFC312', '#12CBC4', '#FDA7DF', '#ED4C67', '#B53471', '#F79F1F', '#D980FA', '#B53471', '#EE5A24', '#0652DD', '#9980FA', '#EA2027', '#006266', '#1B1464', '#5758BB', '#6F1E51', '#7efff5', '#7d5fff', '#4b4b4b', '#cd84f1','#ffb8b8', '#32ff7e', '#474787', '#aaa69d', '#227093', '#ffb142', '#ff5252','#ffffff', '#000000', '#f1f2f6'],
                    stroke: {
                        colors: ['#fff']
                    }
                };
                var monthlyAdmissionOnCourse = new ApexCharts(document.querySelector("#monthlyAdmissionOnCourse"), monthlyAdmissionOnCourseOption);
                monthlyAdmissionOnCourse.render();


                // Monthly Visitor On Different Course
                var monthlyVisitorOnDifferentCourseOption = {
                        chart: {
                        height: 200,
                        width: 200,
                        type: 'donut',
                        zoom: {
                            enabled: false
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '80%'
                            }
                        }
                    },
                    series: Object.values(@json($monthlyVisitorOnDifferentCourse)),
                    labels: Object.keys(@json($monthlyVisitorOnDifferentCourse)),
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 5
                    },
                    grid: {
                        padding: {
                            top: 12,
                            bottom: 11,
                            left: 12,
                            right: 12
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        custom: function({ series, seriesIndex, dataPointIndex, w }) {
                            return '<div class="arrow_box">' +
                                '<span>' + w.globals.labels[seriesIndex] + ': ' + series[seriesIndex] + '</span>' +
                                '</div>';
                        }
                    },
                    colors: ['#2ecc71', '#3498db', '#9b59b6', '#1abc9c', '#34495e', '#f1c40f', '#e67e22', '#e74c3c', '#ecf0f1', '#95a5a6', '#55efc4', '#81ecec', '#74b9ff', '#a29bfe', '#2d3436', '#d63031', '#e17055', '#fdcb6e', '#ff7675', '#C4E538', '#009432', '#1289A7', '#FFC312', '#12CBC4', '#FDA7DF', '#ED4C67', '#B53471', '#F79F1F', '#D980FA', '#B53471', '#EE5A24', '#0652DD', '#9980FA', '#EA2027', '#006266', '#1B1464', '#5758BB', '#6F1E51', '#7efff5', '#7d5fff', '#4b4b4b', '#cd84f1','#ffb8b8', '#32ff7e', '#474787', '#aaa69d', '#227093', '#ffb142', '#ff5252','#ffffff', '#000000', '#f1f2f6'],
                    stroke: {
                        colors: ['#fff']
                    }
                };
                var monthlyVisitorOnDifferentCourse = new ApexCharts(document.querySelector("#monthlyVisitorOnDifferentCourse"), monthlyVisitorOnDifferentCourseOption);
                monthlyVisitorOnDifferentCourse.render();

                // Yearly Admission Count
                var monthlyAdmissionCountsOptions = {
                    chart: {
                        type: 'line',
                        height: 350,
                        toolbar: {
                            show: false,
                        },
                    },
                    series: [{
                        name: 'Admission',
                        data: @json($monthlyAdmissionCounts)
                    }],
                    title: {
                        show: "",
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    colors: ["#020617"],
                    stroke: {
                        lineCap: "round",
                        curve: "smooth",
                    },
                    markers: {
                        size: 0,
                    },
                    xaxis: {
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        labels: {
                            style: {
                                colors: "#616161",
                                fontSize: "12px",
                                fontFamily: "inherit",
                                fontWeight: 400,
                            },
                        },
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: "#616161",
                                fontSize: "12px",
                                fontFamily: "inherit",
                                fontWeight: 400,
                            },
                        },
                    },
                    grid: {
                        show: true,
                        borderColor: "#dddddd",
                        strokeDashArray: 5,
                        xaxis: {
                            lines: {
                                show: true,
                            },
                        },
                        padding: {
                            top: 5,
                            right: 20,
                        },
                    },
                    fill: {
                        opacity: 0.8,
                    },
                    tooltip: {
                        theme: "dark",
                    },
                }
                const monthlyAdmissionCounts = new ApexCharts(document.querySelector("#monthlyAdmissionCounts"), monthlyAdmissionCountsOptions);
                monthlyAdmissionCounts.render();

                //Yearly Visitor Count
                var monthlyVisitorCountsOptions = {
                    chart: {
                        type: 'line',
                        height: 350,
                        toolbar: {
                            show: false,
                        },
                    },
                    series: [{
                        name: 'Visitor',
                        data: @json($monthlyVisitorCounts)
                    }],
                    title: {
                        show: "",
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    colors: ["#020617"],
                    stroke: {
                        lineCap: "round",
                        curve: "smooth",
                    },
                    markers: {
                        size: 0,
                    },
                    xaxis: {
                        axisTicks: {
                            show: false,
                        },
                        axisBorder: {
                            show: false,
                        },
                        labels: {
                            style: {
                                colors: "#616161",
                                fontSize: "12px",
                                fontFamily: "inherit",
                                fontWeight: 400,
                            },
                        },
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: "#616161",
                                fontSize: "12px",
                                fontFamily: "inherit",
                                fontWeight: 400,
                            },
                        },
                    },
                    grid: {
                        show: true,
                        borderColor: "#dddddd",
                        strokeDashArray: 5,
                        xaxis: {
                            lines: {
                                show: true,
                            },
                        },
                        padding: {
                            top: 5,
                            right: 20,
                        },
                    },
                    fill: {
                        opacity: 0.8,
                    },
                    tooltip: {
                        theme: "dark",
                    },
                }
                const monthlyVisitorCounts = new ApexCharts(document.querySelector("#monthlyVisitorCounts"), monthlyVisitorCountsOptions);
                monthlyVisitorCounts.render();

                // yearly Admission On Defferent Course
                var yearlyAdmissionsOnDefferentCourseOptions = {
                        chart: {
                        height: 200,
                        width: 200,
                        type: 'donut',
                        zoom: {
                            enabled: false
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '80%'
                            }
                        }
                    },
                    series: Object.values(@json($yearlyAdmissionsOnDefferentCourse)),
                    labels: Object.keys(@json($yearlyAdmissionsOnDefferentCourse)),
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 5
                    },
                    grid: {
                        padding: {
                            top: 12,
                            bottom: 11,
                            left: 12,
                            right: 12
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        custom: function({ series, seriesIndex, dataPointIndex, w }) {
                            return '<div class="arrow_box">' +
                                '<span>' + w.globals.labels[seriesIndex] + ': ' + series[seriesIndex] + '</span>' +
                                '</div>';
                        }
                    },
                    colors: ['#2ecc71', '#3498db', '#9b59b6', '#1abc9c', '#34495e', '#f1c40f', '#e67e22', '#e74c3c', '#ecf0f1', '#95a5a6', '#55efc4', '#81ecec', '#74b9ff', '#a29bfe', '#2d3436', '#d63031', '#e17055', '#fdcb6e', '#ff7675', '#C4E538', '#009432', '#1289A7', '#FFC312', '#12CBC4', '#FDA7DF', '#ED4C67', '#B53471', '#F79F1F', '#D980FA', '#B53471', '#EE5A24', '#0652DD', '#9980FA', '#EA2027', '#006266', '#1B1464', '#5758BB', '#6F1E51', '#7efff5', '#7d5fff', '#4b4b4b', '#cd84f1','#ffb8b8', '#32ff7e', '#474787', '#aaa69d', '#227093', '#ffb142', '#ff5252','#ffffff', '#000000', '#f1f2f6'],
                    stroke: {
                        colors: ['#fff']
                    }
                };
                var yearlyAdmissionsOnDefferentCourse = new ApexCharts(document.querySelector("#yearlyAdmissionsOnDefferentCourse"), yearlyAdmissionsOnDefferentCourseOptions);
                yearlyAdmissionsOnDefferentCourse.render();

                // yearly Admission On Defferent Course
                var yearlyVisitorsOnDefferentCourseOptions = {
                        chart: {
                        height: 200,
                        width: 200,
                        type: 'donut',
                        zoom: {
                            enabled: false
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '80%'
                            }
                        }
                    },
                    series: Object.values(@json($yearlyVisitorsOnDefferentCourse)),
                    labels: Object.keys(@json($yearlyVisitorsOnDefferentCourse)),
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 5
                    },
                    grid: {
                        padding: {
                            top: 12,
                            bottom: 11,
                            left: 12,
                            right: 12
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        custom: function({ series, seriesIndex, dataPointIndex, w }) {
                            return '<div class="arrow_box">' +
                                '<span>' + w.globals.labels[seriesIndex] + ': ' + series[seriesIndex] + '</span>' +
                                '</div>';
                        }
                    },
                    colors: ['#2ecc71', '#3498db', '#9b59b6', '#1abc9c', '#34495e', '#f1c40f', '#e67e22', '#e74c3c', '#ecf0f1', '#95a5a6', '#55efc4', '#81ecec', '#74b9ff', '#a29bfe', '#2d3436', '#d63031', '#e17055', '#fdcb6e', '#ff7675', '#C4E538', '#009432', '#1289A7', '#FFC312', '#12CBC4', '#FDA7DF', '#ED4C67', '#B53471', '#F79F1F', '#D980FA', '#B53471', '#EE5A24', '#0652DD', '#9980FA', '#EA2027', '#006266', '#1B1464', '#5758BB', '#6F1E51', '#7efff5', '#7d5fff', '#4b4b4b', '#cd84f1','#ffb8b8', '#32ff7e', '#474787', '#aaa69d', '#227093', '#ffb142', '#ff5252','#ffffff', '#000000', '#f1f2f6'],
                    stroke: {
                        colors: ['#fff']
                    }
                };
                var yearlyVisitorsOnDefferentCourse = new ApexCharts(document.querySelector("#yearlyVisitorsOnDefferentCourse"), yearlyVisitorsOnDefferentCourseOptions);
                yearlyVisitorsOnDefferentCourse.render();


               // yearly Student Status
                var YearlyStudentStatusOption = {
                        chart: {
                        height: 200,
                        width: 200,
                        type: 'donut',
                        zoom: {
                            enabled: false
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '80%'
                            }
                        }
                    },
                    series: Object.values(@json($YearlyStudentStatus)),
                    labels: Object.keys(@json($YearlyStudentStatus)),
                    legend: {
                        show: false
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 5
                    },
                    grid: {
                        padding: {
                            top: 12,
                            bottom: 11,
                            left: 12,
                            right: 12
                        }
                    },
                    states: {
                        hover: {
                            filter: {
                                type: 'none'
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                        custom: function({ series, seriesIndex, dataPointIndex, w }) {
                            return '<div class="arrow_box">' +
                                '<span>' + w.globals.labels[seriesIndex] + ': ' + series[seriesIndex] + '</span>' +
                                '</div>';
                        }
                    },
                    colors: ['#2ecc71', '#3498db', '#9b59b6', '#1abc9c', '#34495e', '#f1c40f', '#e67e22', '#e74c3c', '#ecf0f1', '#95a5a6', '#55efc4', '#81ecec', '#74b9ff', '#a29bfe', '#2d3436', '#d63031', '#e17055', '#fdcb6e', '#ff7675', '#C4E538', '#009432', '#1289A7', '#FFC312', '#12CBC4', '#FDA7DF', '#ED4C67', '#B53471', '#F79F1F', '#D980FA', '#B53471', '#EE5A24', '#0652DD', '#9980FA', '#EA2027', '#006266', '#1B1464', '#5758BB', '#6F1E51', '#7efff5', '#7d5fff', '#4b4b4b', '#cd84f1','#ffb8b8', '#32ff7e', '#474787', '#aaa69d', '#227093', '#ffb142', '#ff5252','#ffffff', '#000000', '#f1f2f6'],
                    stroke: {
                        colors: ['#fff']
                    }
                };
                var YearlyStudentStatus = new ApexCharts(document.querySelector("#YearlyStudentStatus"), YearlyStudentStatusOption);
                YearlyStudentStatus.render();

                var targetOptions = {
                    series: [
                    {
                        name: 'Complete',
                        data: [
                        {
                            x: '{{ $saleTargetData['date'] }}',
                            y: {{ $saleTargetData['complete'] }},
                            goals: [
                            {
                                name: 'Target',
                                value: {{ $saleTargetData['target'] }},
                                strokeHeight: 5,
                                strokeColor: '#3B82F6'
                            }
                            ]
                        }
                        ]
                    }
                    ],
                    chart: {
                        height: 210,
                        type: 'bar',
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                    bar: {
                        columnWidth: '10%'
                    }
                    },
                    colors: ['#FF0000'],
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: true,
                        showForSingleSeries: true,
                        customLegendItems: ['Complete', 'Target'],
                        markers: {
                            fillColors: ['red', '#3B82F6']
                        }
                    }
                };

                var target = new ApexCharts(document.querySelector("#target"), targetOptions);
                target.render();
            </script>
        @endpush
    </div>
@endsection
