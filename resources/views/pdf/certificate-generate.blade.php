

<html>
<head>
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

        @font-face {
            font-family: english_font;
            src: url('{{ storage_path('fonts/Montserrat-ExtraBoldItalic.ttf') }}') format("truetype");
        }

        .font-paragraph {
            font-family: english_font;
        }

        .wrap-content {
            width: 70%;
            margin: 150px 0 0 110px;
        }

        .purpose {
            color: rgb(17, 17, 16);
            font-size: 80px;
            margin: 20px;
            line-height: 50px;
            line-height: 50px;
        }

        .assignment {
            color: rgb(49, 42, 42);
            margin: 20px;
            font-size: 40px;
        }

        .person {
            border-bottom: 2px solid black;
            font-size: 50px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
            color: #29397e;
            font-weight: 700;
        }

        .signature {
            border-top: 2px solid #525053;
            font-size: 20px;
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
            position: absolute;
            width: 500px;
        }

        .img2 {
            bottom: 0;
            right: 0;
            position: absolute;
            width: 500px;
        }

        .qr {
            bottom: 30px;
            position: absolute;
            width: 100px;
        }

        #peragraph {
            color: #39383a;
        }
        .logo1 {
            margin-bottom: 20px;
            float: left;
            padding-right: 300px;
        }

        .bold {
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="img1" src="{{ Public_path('frontend/images/RICT/RICT 1.png') }}" alt="" />
        <div class="wrap-content">
            <div class="logo">
                <img class="logo1" style="width: 200px; margin-top: 20px; "
                    src="{{ public_path('frontend/images/RICT/logo.png') }}" alt="Rayhan's_img" />
                <img class="logo1" style="width: 70px; margin-top: 20px;" src="{{ public_path('frontend/images/RICT/bteb.png') }}"
                    alt="Bteb_img" />
            </div>
            <div class="first-part">

                <p class="purpose font-paragraph" style="text-transform: uppercase ; margin-top: 10px;">
                    Certificate
                </p>
                <p id="peragraph" class="assignment" style="text-transform: uppercase;  margin-top: 20px;">
                    of Participation
                </p>
                <p id="peragraph" class="assignment" style=" margin-top: 20px;">
                    Presented to:
                </p>
                <p class="person font-paragraph" style="margin-top: 50px;"> {{ $studentData->name }} </p>
                <p id="peragraph"> ID: <span> {{ $studentData->student_id }} </span> </p>
            </div>
            <div class="reason font-paragraph">
                <p id="peragraph" class="details" style="margin-top: 30px;">
                    This certificate is awarded to <span class="bold">{{ $studentData->name }}</span> <span> @if( $studentData->gender == 'male') son @else daughter @endif</span> of
                    <span class="bold">{{ $studentData->fName }}</span>, who has successfully completed our <span class="bold">Course Duration</span> <span class="bold"> {{ $studentData->course->name }} </span> course from <span class="bold">COURSE Start</span> to <span class="bold">COURSE End.</span>
                </p>
                <p id="peragraph" class="grade" style="margin-top: 30px;">
                    <span> @if( $studentData->gender == 'male') His @else Her @endif</span> Grade was <span class="bold">A+</span> at under the Rayhan's ICT Limited.
                </p>
                <p id="peragraph" class="signature font-paragraph">
                    Co-ordinator <br />
                    Name <br>
                    Date:...................
                </p>
                <img class="qr" src="data:image/png;base64,{{ $qrcode }}">
            </div>
        </div>
        <img class="img2" src="{{ Public_path('frontend/images/RICT/RICT 2.png') }}" alt="" />
    </div>
</body>
</html>
