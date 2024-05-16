<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sail&display=swap" rel="stylesheet" />
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
        .sail-regular {
            font-family: "Sail", system-ui;
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: english_font;
            src: url("../fonts/Montserrat-ExtraBoldItalic.ttf") format("truetype");
        }
        .wrap-content {
            width: 80%;
            margin: 110px auto 0 auto;
        }
        .font-paragraph {
            font-family: english_font;
        }
        .purpose {
            color: rgb(17, 17, 16);
            font-size: 48px;
            margin: 20px;
            line-height: 50px;
        }
        .assignment {
            color: rgb(49, 42, 42);
            margin: 20px;
            font-size: 22px;
        }
        .person {
            border-bottom: 2px solid black;
            font-size: 32px;
            font-style: italic;
            margin: 20px auto;
            width: 400px;
            color: rgb(231, 94, 15);
        }
        .signature {
            border-top: 2px solid black;
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
    </style>
</head>

<body>
    <div class="container">
        <img class="img1" src="img/RICT 1.png" alt="" />
        <div class="wrap-content">
            <div class="first-part">
                <img class="logo" src="img/dynamic.png" alt="Rayhan's_img" />

                <p class="purpose font-paragraph" style="text-transform: uppercase">
                    Certificate
                </p>
                <p class="assignment" style="text-transform: uppercase">
                    of Participation
                </p>
                <p class="assignment" style="text-transform: capitalize">
                    Presented to:
                </p>
                <p class="person sail-regular"> Md. Syful Islam </p>
                <p> ID: <span> 2334</span> </p>
            </div>

            <div class="reason font-paragraph">
                <p class="details">
                    This certifiace is awarded to STUDENT NAME son/doughter of PARENTS
                    NAME, who has succeffully completed our COURSE DURATION Month COURSE
                    NAEM Crouse From START&END DATE.
                </p>
                <p class="grade">
                    His/Her Grade was A+ at under the Rayhan's ICT Limited.
                </p>
                <p class="signature font-paragraph">
                    Chief Executive Officer <br />
                    Date:...................
                </p>
            </div>
        </div>
        <img class="img2" src="img/RICT 2.png" alt="" />
    </div>
</body>
</html>
