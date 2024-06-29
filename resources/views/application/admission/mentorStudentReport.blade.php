@extends('layout/mentorIndex')
@section('content')
    <div class="md:p-[100px] pt-[100px] p-2 w-full h-full">
        <div class="w-full h-full shadow bg-white rounded-xl">
            <div class="student-image w-full flex justify-center">
                <img class="h-[120px] w-[120px] rounded-full object-cover -mt-14" src="{{ empty($student->profile) ? url('profile.jpeg') : asset('storage/' . $student->profile) }}" alt="">
            </div>
            <h2 class="text-2xl font-bold text-center text-blue-500">
                {{ $student->name }}
                <small class="!text-sm">({{ $student->student_id }})</small>
            </h2>
            <p class="text-center py-2 font-semibold text-gray-500">{{ $student->email }}, {{ $student->mobile }}</p>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-3 p-8">

                {{-- admissionOnCourse --}}
                <div class="rounded-xl bg-gray-200 text-gray-700">
                    <div class="flex flex-col justify-center items-center h-[300px]">
                        <h6 class="block text-xl font-bold leading-relaxed tracking-normal text-blue-gray-900 antialiased text-blue-500">
                            <span class="text-orange-500">{{ $student->name }}</span>
                             Homework Report
                        </h6>
                        <div id="homeworkReport"></div>

                        <div class="flex justify-center gap-3">
                            <p>
                                <b class="text-blue-500">Total:</b>
                                <span class="text-orange-500">{{ count($homeworkReport) }}</span>
                            </p>
                            @foreach ($homeworkReport as $key => $item)
                                <p class="text-center">
                                    <b class="text-blue-500">{{ ucfirst($key) }}:</b>
                                    <span class="text-orange-500">{{ $item }}</span>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- admissionOnCourse --}}
                <div class="rounded-xl bg-gray-200 text-gray-700">
                    <div class="flex flex-col justify-center items-center h-[300px]">
                        <h6 class="block text-xl font-bold leading-relaxed tracking-normal text-blue-gray-900 antialiased text-blue-500">
                            <span class="text-orange-500">{{ $student->name }}</span>
                            Attendance Report
                        </h6>
                        <div id="attendanceReport"></div>

                        <div class="flex justify-center gap-3">
                            <p>
                                <b class="text-blue-500">Total:</b>
                                <span class="text-orange-500">{{ count($attendanceReport) }}</span>
                            </p>
                            @foreach ($attendanceReport as $key => $item)
                                <p>
                                    <b class="text-blue-500">{{ ucfirst($key) }}:</b>
                                    <span class="text-orange-500">{{ $item }}</span>
                                </p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>
            <div class="w-full md:w-[50%] mx-auto grid grid-cols-2 md:grid-cols-4 py-5">
                <p class="text-center mt-2 md:mt-0">
                    <span class="text-orange-500 font-bold text-3xl block">50%</span>
                    <b class="text-xl font-semibold text-blue-500">Homework</b>
                </p>
                <p class="text-center mt-2 md:mt-0">
                    <span class="text-orange-500 font-bold text-3xl block">50%</span>
                    <b class="text-xl font-semibold text-blue-500">Attendance</b>
                </p>
                <p class="text-center mt-2 md:mt-0">
                    <span class="text-orange-500 font-bold text-3xl block">50%</span>
                    <b class="text-xl font-semibold text-blue-500">Examination</b>
                </p>
                <p class="text-center mt-2 md:mt-0">
                    <span class="text-orange-500 font-bold text-3xl block">
                        A<sup>+</sup>
                    </span>
                    <b class="text-xl font-semibold text-blue-500">Overall</b>
                </p>
            </div>
            {{-- <div class="Footer bg-gray-100 mb-0 pb-0 w-full">
                <div class="button py-5 flex justify-center gap-5">
                    <div>
                        <button class="relative inline-flex items-center justify-center p-0.5 me-2 overflow-hidden text-sm font-medium text-black-900 rounded-lg group bg-gradient-to-br from-blue-900 to-orange-600 dark:bg-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-purple-900">
                            <a href="{{ route('myStudentMentor') }}" class="px-5 py-2.5 transition-all bg-white dark:bg-gray-900 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30" height="30" fill="currentColor" class="block mx-auto"><path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM12 11H16V13H12V16L8 12L12 8V11Z"></path></svg>
                                Back
                            </a>
                        </button>
                    </div>
                    <div>
                        <button class="relative inline-flex items-center justify-center p-0.5 me-2 overflow-hidden text-sm font-medium text-black-900 rounded-lg group bg-gradient-to-br from-blue-900 to-orange-600 dark:bg-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-purple-900">
                            <a href="{{ route('studentReportDownload', $student->id) }}" class="px-5 py-2.5 transition-all bg-white dark:bg-gray-900 rounded-md text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="text-center mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path><path d="M7 11l5 5l5 -5"></path><path d="M12 4l0 12"></path></svg>
                                Download
                            </a>
                        </button>
                    </div>
                </div>
            </div> --}}
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
                            return '<div class="arrow_box p-1">' +
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
                            return '<div class="arrow_box p-1">' +
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
