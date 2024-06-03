@extends('layout/studentIndex')
@section('content')
    @push('css')
        <style>
            * {
                margin: 0;
                padding: 0;
            }

            body {
                color: black;
                font-family: Georgia, serif;
                font-size: 20px;
                text-align: center;
            }

            .container {
                position: relative;
                top: 0;
            }

            @font-face {
                font-family: english_font;
                src: url('{{ asset('fonts/Montserrat-ExtraBoldItalic.ttf') }}') format("truetype");
            }

            .font-paragraph {
                font-family: english_font;
                font-size: 30px;
                line-height: normal;
            }

            .wrap-content {
                width: 70%;
                margin: 20px auto;
            }

            .purpose {
                color: rgb(17, 17, 16);
                font-size: 100px;
                margin: 20px;
                line-height: 50px;
            }

            .assignment {
                color: rgb(49, 42, 42);
                margin: 20px;
                font-size: 40px;
            }

            .person {
                border-bottom: 2px solid #29397e;
                font-size: 50px;
                font-style: italic;
                margin: 2px auto;
                width: 400px;
                padding-bottom: 20px;
                color: #29397e;
                font-weight: 700;
            }

            .signature {
                border-top: 2px solid #525053;
                font-style: italic;
                width: 210px;
                margin-top: 70px;
                text-align: left;
            }

            .reason {
                margin: 20px;
            }

            .details {
                margin-bottom: 30px;
                text-align: justify;
            }

            .grade {
                margin-top: 40px;
                text-align: justify;
            }

            .img1 {
                top: 0;
                left: 0;
                position: relative;
                width: 700px;
            }

            .img2 {
                bottom: 0;
                right: 0;
                position: absolute;
                width: 700px;
            }

            .qr {
                margin-top: 20px;
                margin-bottom: 20px;
                position: relative;
                width: 100px;
            }

            #peragraph {
                color: #252425;
            }

            .logo {
                overflow: hidden;
                width: 100%;
                margin-bottom: 10px;
            }

            .logo .logo1 {
                width: 50%;
                float: left;
            }

            .logo .logo2 {
                width: 50%;
                float: right;
                display: flex;
                justify-content: end;
            }

            .bold {
                font-weight: 500;
            }

            .button {
                display: flex;
                justify-content: end;
            }

            .bold{
                font-weight: bold;
            }
        </style>
    @endpush
    <div class="pt-5 pl-5 pr-5 ">
        <div class="mb-5">
            <div class="bg-white rounded dark:bg-[#0E1726] ">
                <div class="col-span-6">
                    <div class="container">
                        <img class="img1" src="{{ asset('frontend/images/RICT/RICT 1.png') }}" alt="" />
                        <section class="wrap-content">
                            <div class="logo">
                                <div class="logo1">
                                    <img style="width: 210px; margin-bottom: 35px;"
                                        src="{{ asset('frontend/images/RICT/logo.png') }}" alt="Rayhan's_img" />
                                </div>
                                <div class="logo2">
                                    <img style="width: 80px; margin-bottom: 35px;"
                                        src="{{ asset('frontend/images/RICT/bteb.png') }}" alt="Bteb_img" />
                                </div>
                            </div>
                            <div>
                                <p class="purpose font-paragraph" style="text-transform: uppercase ; margin-top: 30px;">
                                    Certificate
                                </p>
                                <p id="peragraph" class="assignment font-paragraph" style="text-transform: uppercase;  margin-top: 50px;">
                                    of Participation
                                </p>
                                <p id="peragraph" class="assignment font-paragraph" style=" margin-top: 40px;">
                                    Presented to:
                                </p>
                                <p class="person font-paragraph" style="margin-top: 70px;"> {{ $student->name }} </p>
                                <p id="peragraph " class="font-paragraph"> ID: {{ $student->student_id }}<span> </span> </p>
                            </div>
                            <div class="reason font-paragraph">
                                <p id="peragraph" class="details" style="margin-top: 30px;">
                                    This certificate is awarded to <span class="bold">{{ $student->name }}</span> <span>
                                        @if ($student->gender == 'male')
                                            son
                                        @else
                                            daughter
                                        @endif
                                    </span>
                                    of
                                    <span class="bold">{{ $student->fName }}</span>, who has successfully completed our
                                    <span class="bold">Course Duration</span> <span class="bold">
                                        {{ $student->course->name }} </span> course from <span class="bold">COURSE
                                        Start</span> to <span class="bold">COURSE End.</span>
                                </p>
                                <p id="peragraph" class="grade" style="margin-top: 30px;">
                                    <span>
                                        @if ($student->gender == 'male')
                                            His
                                        @else
                                            Her
                                        @endif
                                    </span> Grade was <span class="bold">A+</span> at under the Rayhan's ICT Limited.
                                </p>
                                <p id="peragraph" class="signature font-paragraph">
                                    Co-ordinator <br />
                                    Name <br>
                                    Date:...................
                                </p>
                                <div class="qr mt-3 mb-10">
                                    {{ $qrcode }}
                                </div>
                            </div>
                        </section>
                        <img class="img2" src="{{ asset('frontend/images/RICT/RICT 2.png') }}" alt="" />
                    </div>
                    <section>
                        <div class="button" style="margin-bottom: 40px;">
                            <div>
                                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-black-900 rounded-lg group bg-gradient-to-br from-blue-900 to-orange-600 group-hover:from-orange-600 group-hover:to-orange-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-purple-900">
                                    <a href="{{ route('studentDashboard') }}"
                                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                        Back
                                    </a>
                                </button>
                            </div>
                            <div>
                                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-blue-900 to-orange-600 group-hover:from-orange-600 group-hover:to-orange-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800">
                                    <a href="{{ route('Certificate') }}"
                                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                        Download
                                    </a>
                                </button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
