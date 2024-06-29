<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;

        }
        .text-blue{
            color: #2B337D;
        }
        .text-orange{
            color: #DD5B1D;
        }
    </style>
</head>
<body>
    <div style="padding: 100px; width: 100%; height: 100%; background: #E5E7EB">
        <div style="width: 100%; height: 100%; background: #fff; border-radius: 0.75rem; box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);">
            <div style="display: flex; justify-content: center; width: 100%">
                <img style="height: 120px; width: 120px; border-radius: 50%; object-fit: cover; margin-top: -3.5rem;" src="{{ empty($student->profile) ? url('profile.jpeg') : asset('storage/' . $student->profile) }}" alt="">
            </div>
            <h2 class="text-blue" style="text-align: center; font-weight: bold; font-size: 1.5rem;">
                {{ $student->name }}
                <small style="font-size: 0.875rem !important;">({{ $student->student_id }})</small>
            </h2>
            <p style="text-align: center; color: rgb(104, 111, 125); padding-top: 0.5rem; padding-bottom: 0.5rem; font-size: 14px">{{ $student->email }}, {{ $student->mobile }}</p>

            <div style="display: flex; justify-content: center; padding: 2rem; gap: 1.5rem;">

                {{-- admissionOnCourse --}}
                <div style="border-radius: 15px; background: rgb(225, 228, 234); padding: 10px; width: 100%">
                    <div style="height: 300px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                        <h6 class="text-blue" style="display: block; letter-spacing: 0em; line-height: 1.625; font-weight: 700; font-size: 1.25rem;">
                            <span class="text-orange">{{ $student->name }}</span>
                             Homework Report
                        </h6>
                        <div id="homeworkReport"></div>

                        <div style="display: flex; justify-content: center; gap: 0.75rem;">
                            <p>
                                <b class="text-blue">Total:</b>
                                <span class="text-orange">{{ count($homeworkReport) }}</span>
                            </p>
                            {{-- <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr));"> --}}
                                @foreach ($homeworkReport as $key => $item)
                                    <p>
                                        <b class="text-blue">{{ ucfirst($key) }}:</b>
                                        <span class="text-orange">{{ $item }}</span>
                                    </p>
                                @endforeach
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>

                {{-- admissionOnCourse --}}
                <div style="border-radius: 15px; background: rgb(225, 228, 234); padding: 10px; width: 100%">
                    <div style="height: 300px; display: flex; justify-content: center; align-items: center; flex-direction: column;">
                        <h6 class="text-blue" style="display: block; letter-spacing: 0em; line-height: 1.625; font-weight: 700; font-size: 1.25rem;">
                            <span class="text-orange">{{ $student->name }}</span>
                            Attendance Report
                        </h6>
                        <div id="attendanceReport"></div>

                        <div style="display: flex; justify-content: center; gap: 0.75rem;">
                            <p>
                                <b class="text-blue">Total:</b>
                                <span class="text-orange">{{ count($attendanceReport) }}</span>
                            </p>
                            {{-- <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr));"> --}}
                                @foreach ($attendanceReport as $key => $item)
                                    <p>
                                        <b class="text-blue">{{ ucfirst($key) }}:</b>
                                        <span class="text-orange">{{ $item }}</span>
                                    </p>
                                @endforeach
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
                <div>

                </div>
            </div>
            <div style="width: 100%; display: flex; justify-content: center; gap: 2.5rem; padding-top: 1.25rem; padding-bottom: 1.25rem;">
                <p style="text-align: center">
                    <span class="text-orange " style="display: block; font-weight: bold; font-size: 1.875rem;">50%</span>
                    <b class="text-blue" style="font-size: 1.25rem; margin-top: 8px; display: inline-block">Homework</b>
                </p>
                <p style="text-align: center">
                    <span class="text-orange " style="display: block; font-weight: bold; font-size: 1.875rem;">50%</span>
                    <b class="text-blue" style="font-size: 1.25rem; margin-top: 8px; display: inline-block">Attendance</b>
                </p>
                <p style="text-align: center">
                    <span class="text-orange " style="display: block; font-weight: bold; font-size: 1.875rem;">50%</span>
                    <b class="text-blue" style="font-size: 1.25rem; margin-top: 8px; display: inline-block">Examination</b>
                </p>
                <p style="text-align: center">
                    <span class="text-orange " style="display: block; font-weight: bold; font-size: 1.875rem;">
                        A<sup>+</sup>
                    </span>
                    <b class="text-blue" style="font-size: 1.25rem;">Overall</b>
                </p>
            </div>
        </div>
    </div>
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
</body>
</html>
