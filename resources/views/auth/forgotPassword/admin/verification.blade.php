<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Verify your email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/RICT/fav.jpg') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/style.css') }}" />
    @vite('resources/css/app.css')
</head>
<body class="font-nunito bg-adminlogin bg-no-repeat bg-cover bg-center w-screen h-screen flex items-center justify-center">
    <div class="px-2 sm:px-16 w-full flex items-center justify-center">
        <div class="relative w-full md:w-2/4 rounded-md p-2 bg-gray-200 px-2 md:px-6 py-10">
            <div class="px-4 md:px-10">
                <div class="mb-10">
                    <h1 class="text-3xl font-extrabold uppercase !leading-snug md:text-4xl text-blue-500">
                        Verify your email
                    </h1>
                    <p class="text-base">
                        We emailed you a six-digit code to <b class="text-orange-500">{{ $user->email }}</b>.
                        Enter the code below to confirm your email address.
                    </p>
                </div>
                <form action="{{ route('admin.verifyPost') }}" method="post" id="verificationForm">
                    @csrf
                    <div>
                        <input type="hidden" name="email" value="{{ $user->email }}">
                        <div class="relative">
                            <input id="otp" type="text" placeholder="Enter OTP" class="ps-10 login-form-input bg-white focus:border-blue-500" name="otp" value="{{ old('otp') }}" />
                            <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" class="text-blue-500">
                                    <path opacity="0.5" d="M10.65 2.25H7.35C4.23873 2.25 2.6831 2.25 1.71655 3.23851C0.75 4.22703 0.75 5.81802 0.75 9C0.75 12.182 0.75 13.773 1.71655 14.7615C2.6831 15.75 4.23873 15.75 7.35 15.75H10.65C13.7613 15.75 15.3169 15.75 16.2835 14.7615C17.25 13.773 17.25 12.182 17.25 9C17.25 5.81802 17.25 4.22703 16.2835 3.23851C15.3169 2.25 13.7613 2.25 10.65 2.25Z" fill="currentColor" />
                                    <path d="M14.3465 6.02574C14.609 5.80698 14.6445 5.41681 14.4257 5.15429C14.207 4.89177 13.8168 4.8563 13.5543 5.07507L11.7732 6.55931C11.0035 7.20072 10.4691 7.6446 10.018 7.93476C9.58125 8.21564 9.28509 8.30993 9.00041 8.30993C8.71572 8.30993 8.41956 8.21564 7.98284 7.93476C7.53168 7.6446 6.9973 7.20072 6.22761 6.55931L4.44652 5.07507C4.184 4.8563 3.79384 4.89177 3.57507 5.15429C3.3563 5.41681 3.39177 5.80698 3.65429 6.02574L5.4664 7.53583C6.19764 8.14522 6.79033 8.63914 7.31343 8.97558C7.85834 9.32604 8.38902 9.54743 9.00041 9.54743C9.6118 9.54743 10.1425 9.32604 10.6874 8.97558C11.2105 8.63914 11.8032 8.14522 12.5344 7.53582L14.3465 6.02574Z" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                        <span class="text-danger error-text otp_error text-red-500 inline-block"></span>
                    </div>
                    <input type="submit" value="Verify OTP" class="btn btn-gradient w-full border-0 uppercase shadow hover:submit-btn focus:submit-btn active:submit-btn cursor-pointer">
                </form>
                <div class="flex justify-start mt-1">
                    <p>
                        <button id="resendOtpVerification" class="mt-1 inline-block hover:underline">Resend code</button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#verificationForm").on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){
                    if (data.status == 0) {
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                        $('span.error-text').addClass('my-2');
                        $('span.error-text').addClass('text-red-500');
                        $('span.error-text').removeClass('text-green-500');
                    } else if(data.success == false) {
                        $('span.error-text').text(data.msg);
                        $('span.error-text').addClass('my-2');
                        $('span.error-text').addClass('text-red-500');
                        $('span.error-text').removeClass('text-green-500');
                    } else{
                        $('#verificationForm')[0].reset();
                        window.location.href = "{{ route('admin.changePassword', $user->id) }}";
                    }
                }
            });

        });

        $('#resendOtpVerification').click(function(){
            $(this).text('Wait...');
            var userMail = @json($user->email);

            $.ajax({
                url:"{{ route('admin.resendOtp') }}",
                type:"GET",
                data: {email:userMail },
                success:function(res){
                    $('#resendOtpVerification').text('Resend Verification OTP');
                    if(res.success == true){
                        $('.time').text('');
                        timer();
                        $('span.error-text').addClass('my-2');
                        $('span.error-text').addClass('text-green-500');
                        $('span.error-text').removeClass('text-red-500');
                        $('span.error-text').text(res.msg);
                        setTimeout(() => {
                            $('.error-text').text('');
                        }, 3000);
                    }
                    else{
                        $('span.error-text').text(res.msg);
                        $('span.error-text').addClass('my-2');
                        $('span.error-text').addClass('text-red-500');
                        $('span.error-text').removeClass('text-green-500');
                        setTimeout(() => {
                            $('.error-text').text('');
                        }, 3000);
                    }
                }
            });

        });
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
