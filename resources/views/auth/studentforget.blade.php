<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Student Sign in</title>
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
                        Forget Password</h1>
                    <p class="text-base font-bold">Enter your user id and password to sign in</p>
                </div>
                @error('email')
                    <div class="p-2 rounded bg-red-500 text-white">{{ $message }}</div>
                @enderror
                
                <form action="{{ route('verification') }}" class="space-y-5" method="POST">
                    @csrf
                    <div>
                        <label for="student_id">Email</label>
                        <div class="relative">
                            <input id="email" type="email" placeholder="Enter your valid email"
                                class="ps-10 login-form-input bg-white focus:border-blue-700" name="email"
                                value="{{ old('email') }}" />
                            <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    class="text-white-dark">
                                    <path opacity="0.5"
                                        d="M10.65 2.25H7.35C4.23873 2.25 2.6831 2.25 1.71655 3.23851C0.75 4.22703 0.75 5.81802 0.75 9C0.75 12.182 0.75 13.773 1.71655 14.7615C2.6831 15.75 4.23873 15.75 7.35 15.75H10.65C13.7613 15.75 15.3169 15.75 16.2835 14.7615C17.25 13.773 17.25 12.182 17.25 9C17.25 5.81802 17.25 4.22703 16.2835 3.23851C15.3169 2.25 13.7613 2.25 10.65 2.25Z"
                                        fill="currentColor" />
                                    <path
                                        d="M14.3465 6.02574C14.609 5.80698 14.6445 5.41681 14.4257 5.15429C14.207 4.89177 13.8168 4.8563 13.5543 5.07507L11.7732 6.55931C11.0035 7.20072 10.4691 7.6446 10.018 7.93476C9.58125 8.21564 9.28509 8.30993 9.00041 8.30993C8.71572 8.30993 8.41956 8.21564 7.98284 7.93476C7.53168 7.6446 6.9973 7.20072 6.22761 6.55931L4.44652 5.07507C4.184 4.8563 3.79384 4.89177 3.57507 5.15429C3.3563 5.41681 3.39177 5.80698 3.65429 6.02574L5.4664 7.53583C6.19764 8.14522 6.79033 8.63914 7.31343 8.97558C7.85834 9.32604 8.38902 9.54743 9.00041 9.54743C9.6118 9.54743 10.1425 9.32604 10.6874 8.97558C11.2105 8.63914 11.8032 8.14522 12.5344 7.53582L14.3465 6.02574Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    @if (Session::has('error'))
                        <p style="color:red"> {{ Session::get('error') }} </p>
                    @endif

                    @if (Session::has('success'))
                        <p style="color:green"> {{ Session::get('success') }} </p>
                    @endif
                    <button type="submit" name="submit"
                        class="btn btn-gradient !mt-6 w-full border-0 uppercase shadow hover:submit-btn focus:submit-btn active:submit-btn">
                        Varify Email
                    </button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>
