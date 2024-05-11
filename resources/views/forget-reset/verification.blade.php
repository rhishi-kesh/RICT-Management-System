<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>set verification code</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/RICT/fav.jpg') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/style.css') }}" />
    @vite('resources/css/app.css')
</head>

<body class="font-nunito bg-[#F85606]">
    <div class="flex items-center justify-center px-2 sm:px-16 mt-24">
        <div class="relative w-full md:w-2/4 rounded-md p-2 bg-gray-200 px-2 md:px-6 py-10">
            <div class="px-4 md:px-10">
                <div class="mb-10">
                    <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl my-color-blue">
                        Verify Your Code</h1>
                    <p class="text-base font-bold">Enter your code within reset verify code! </p>
                </div>

                <p id="message_error" style="color:red;"></p>
                <p id="message_success" style="color:green;"></p>
                <form method="post" id="verificationForm">
                    @csrf
                    <input type="hidden" name="email" >
                    <input type="number" name="otp" placeholder="Enter OTP"
                        class=" !mt-6 w-full uppercase shadow hover:submit-btn focus:submit-btn active:submit-btn"
                        required>
                    <br><br>
                    <input type="submit" value="Verify"
                        class="btn btn-gradient !mt-6 w-full border-0 uppercase shadow hover:submit-btn focus:submit-btn active:submit-btn">
                </form>
                <p class="time"></p>

                <button id="resendOtpVerification"
                    class="btn btn-gradient !mt-6 w-full border-0 uppercase shadow hover:submit-btn focus:submit-btn active:submit-btn">Resend
                    Verification OTP</button>
            </div>

        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#verificationForm').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('verification') }}",
                type: "POST",
                data: formData,
                success: function(res) {
                    if (res.success) {
                        alert(res.msg);
                        window.open("/", "_self");
                    } else {
                        $('#message_error').text(res.msg);
                        setTimeout(() => {
                            $('#message_error').text('');
                        }, 3000);
                    }
                }
            });

        });

        //
    });

    function timer() {
        var seconds = 30;
        var minutes = 1;

        var timer = setInterval(() => {

            if (minutes < 0) {
                $('.time').text('');
                clearInterval(timer);
            } else {
                let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                $('.time').text(tempMinutes + ':' + tempSeconds);
            }

            if (seconds <= 0) {
                minutes--;
                seconds = 59;
            }

            seconds--;

        }, 1000);
    }

    timer();
</script>

</html>
