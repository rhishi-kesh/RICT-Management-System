@extends('layout/studentIndex')
@section('content')
    <div class="p-5" x-data="Dashboard">
        <div class="mb-6 text-black">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-5">
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">My Due</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $studentDue->due ?? 0 }}</div>
                    </div>
                    <svg  xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school w-20 h-20 absolute right-4 top-2 opacity-20"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 8l.553 -.276a1 1 0 0 1 1.447 .894v6.382a2 2 0 0 0 2 2h.5a2.5 2.5 0 0 0 2.5 -2.5v-.5h-1" /><path d="M8 11h7" /><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /></svg>
                </div>
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">My Notice</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $studentNotice ?? 0 }}</div>
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
                        <div class="text-xl font-semibold mr-1">My Homework</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ $studentHomework }}</div>
                    </div>
                    <div class="mt-5 flex items-center justify-between font-semibold">
                        <div>
                            Complete: {{ $studentHomeworkComplete }}
                        </div>
                    </div>
                    <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school w-20 h-20 absolute right-4 top-2 opacity-20"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 18v-6a6 6 0 0 1 6 -6h2a6 6 0 0 1 6 6v6a3 3 0 0 1 -3 3h-8a3 3 0 0 1 -3 -3z" /><path d="M10 6v-1a2 2 0 1 1 4 0v1" /><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /><path d="M11 10h2" /></svg>
                </div>
                <div class="relative rounded p-5 border-l-4 border-l-blue-500 shadow bg-gradient-to-r bg-white">
                    <div class="flex justify-between">
                        <div class="text-xl font-semibold mr-1">My Attendance</div>
                    </div>
                    <div class="mt-5 flex items-center">
                        <div class="text-3xl font-bold mr-3">{{ count($attendance) }}</div>
                    </div>
                    <div class="mt-5 flex items-center justify-between font-semibold">
                        <div>
                            Absent: {{ $attendanceAbsent }}
                        </div>
                    </div>
                    <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school w-20 h-20 absolute right-4 top-2 opacity-20"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 21h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4.5" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M19 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M22 22a2 2 0 0 0 -2 -2h-2a2 2 0 0 0 -2 2" /></svg>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 mt-5">

            {{-- admissionOnCourse --}}
            <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                <div class="flex flex-col justify-center items-center h-[300px]">
                    <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                        My Homework Report
                    </h6>
                    <div id="homeworkReport"></div>
                </div>
            </div>

            {{-- admissionOnCourse --}}
            <div class="rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
                <div class="flex flex-col justify-center items-center h-[300px]">
                    <h6 class="block font-sans text-base font-semibold leading-relaxed tracking-normal text-blue-gray-900 antialiased">
                        My Attendance Report
                    </h6>
                    <div id="attendanceReport"></div>
                </div>
            </div>
        </div>
        @push('js')
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <script>
                 // yearly Admission On Defferent Course
                 var homeworkReportOptions = {
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
                    series: Object.values(@json($homeworkReport)),
                    labels: Object.keys(@json($homeworkReport)),
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
                var homeworkReport = new ApexCharts(document.querySelector("#homeworkReport"), homeworkReportOptions);
                homeworkReport.render();


                // yearly Admission On Defferent Course
                var attendanceReportOptions = {
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
                    series: Object.values(@json($attendanceReport)),
                    labels: Object.keys(@json($attendanceReport)),
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
                var attendanceReport = new ApexCharts(document.querySelector("#attendanceReport"), attendanceReportOptions);
                attendanceReport.render();
            </script>
        @endpush
    </div>
@endsection
