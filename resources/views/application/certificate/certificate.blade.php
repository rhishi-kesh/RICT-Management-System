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

            .certificate {
                position: relative;
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

            .container {
                width: 70%;
                margin: 0px auto;
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
                font-size: 42px;
                font-style: italic;
                margin: 2px auto;
                color: #29397e;
                font-weight: 700;
                margin-top: 70px;
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
                margin-bottom: 0px;
            }

            .details {
                margin: 30px 0;
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
                font-weight: bold;
            }

            .button {
                display: flex;
                justify-content: center;
                gap: 5px
            }
        </style>
    @endpush
    <section class="pt-5 pl-5 pr-5 mb-5 overflow-auto">
        <div class="certificate bg-white w-[1200px] md:w-full">
            <img class="img1" src="{{ asset('frontend/images/RICT/RICT 1.png') }}" alt="" />
            <div class="container">
                <div class="logo">
                    <div class="logo1">
                        <img style="width: 210px; margin-bottom: 35px;" src="{{ asset('frontend/images/RICT/logo.png') }}" alt="Rayhan's_img" />
                    </div>
                    <div class="logo2">
                        <img style="width: 80px; margin-bottom: 35px;" src="{{ asset('frontend/images/RICT/bteb.png') }}" alt="Bteb_img" />
                    </div>
                </div>
                <div class="top">
                    <p class="purpose font-paragraph" style="text-transform: uppercase ; margin-top: 30px;">
                        Certificate
                    </p>
                    <p id="peragraph" class="assignment" style="text-transform: uppercase;  margin-top: 50px;">
                        of Participation
                    </p>
                    <p id="peragraph" class="assignment" style="margin-top: 40px;">
                        Presented to:
                    </p>
                    <p class="person font-paragraph"> {{ $student->name }} </p>
                    <div style="width: 400px; height: 2px; background: #29397e; margin: 5px auto;"></div>
                    <p id="peragraph " class="font-paragraph"> ID: {{ $student->student_id }}<span> </span> </p>
                </div>
                <div class="reason font-paragraph middle pb-5">
                    <p id="peragraph" class="details">
                        This certificate is awarded to <span class="bold">{{ $student->name }}</span> <span> @if ($student->gender == 'male') son @else daughter @endif </span> of <span class="bold">{{ $student->fName }}</span>, who has successfully completed our <span class="bold">Course Duration</span> <span class="bold"> {{ $student->course->name ?? '-' }} </span> course from  <span class="bold"> COURSE Start </span> to <span class="bold">COURSE End.</span>
                    </p>
                    <p id="peragraph" class="grade" style="margin-top: 30px;"> <span> @if ($student->gender == 'male') His @else Her @endif </span> Grade was <span class="bold">A+</span> at under the Rayhan's ICT Limited. </p>
                    <p id="peragraph" class="signature font-paragraph">
                        Co-ordinator <br />
                        Name <br>
                        Date:...................
                    </p>
                    <div class="qr mt-3">
                        {{ $qrcode }}
                    </div>
                </div>
            </div>
            <img class="img2" src="{{ asset('frontend/images/RICT/RICT 2.png') }}" alt="" />
        </div>
        <div class="Footer bg-white mb-0 pb-0 w-[1200px] md:w-full">
            <div class="button py-5">
                <div>
                    <button class="relative inline-flex items-center justify-center p-0.5 me-2 overflow-hidden text-sm font-medium text-black-900 rounded-lg group bg-gradient-to-br from-blue-900 to-orange-600 dark:bg-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-purple-900">
                        <a href="{{ route('studentDashboard') }}" class="px-5 py-2.5 transition-all bg-white dark:bg-gray-900 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="30"  height="30" fill="currentColor" class="block mx-auto"><path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM12 11H16V13H12V16L8 12L12 8V11Z"></path></svg>
                            Back
                        </a>
                    </button>
                </div>
                <div>
                    <button class="relative inline-flex items-center justify-center p-0.5 me-2 overflow-hidden text-sm font-medium text-black-900 rounded-lg group bg-gradient-to-br from-blue-900 to-orange-600 dark:bg-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-purple-900">
                        <a href="{{ route('downloadCertificate') }}" class="px-5 py-2.5 transition-all bg-white dark:bg-gray-900 rounded-md text-center">
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30" class="text-center mx-auto"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round" ><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                            Download
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
