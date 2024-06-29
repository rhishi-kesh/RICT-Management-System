<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Student sign in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/RICT/fav.jpg') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/style.css') }}" />
    @vite('resources/css/app.css')
</head>
<body class="font-nunito bg-adminlogin bg-no-repeat bg-cover bg-center w-screen h-screen flex items-center justify-center">
    <div class="w-full">
        <h2 class="text-center mb-5 text-white text-4xl lg:text-7xl">Welcome Student</h2>
        <div class="px-2 sm:px-16 w-full flex items-center justify-center">
            <div class="relative w-full md:w-2/4 rounded-md p-2 bg-gray-200 px-2 md:px-6 py-10">
                <div class="px-4 md:px-10">
                    <div class="mb-10">
                        <h1 class="text-3xl font-extrabold uppercase !leading-snug md:text-4xl text-blue-500">Sign in</h1>
                        <p class="text-base font-bold">Enter your email/user id and password to sign in</p>
                    </div>
                    @error('errror')
                        <div class="p-2 rounded bg-red-500 text-white">{{ $message }}</div>
                    @enderror

                    @if (Session::has('passwordChanged'))
                        <p class="p-2 rounded bg-green-500 text-white"> {{ Session::get('passwordChanged') }} </p>
                    @endif
                    <form action="{{ route('StudentPost') }}" class="space-y-5" method="POST" >
                        @csrf
                        <div>
                            <label for="email">Email/User ID</label>
                            <div class="relative">
                                <input id="email" type="text" placeholder="Enter Email/User ID" class="ps-10 login-form-input bg-white focus:border-blue-500" name="email" value="{{ old('email') }}" />
                                <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" class="text-blue-500">
                                        <path opacity="0.5" d="M10.65 2.25H7.35C4.23873 2.25 2.6831 2.25 1.71655 3.23851C0.75 4.22703 0.75 5.81802 0.75 9C0.75 12.182 0.75 13.773 1.71655 14.7615C2.6831 15.75 4.23873 15.75 7.35 15.75H10.65C13.7613 15.75 15.3169 15.75 16.2835 14.7615C17.25 13.773 17.25 12.182 17.25 9C17.25 5.81802 17.25 4.22703 16.2835 3.23851C15.3169 2.25 13.7613 2.25 10.65 2.25Z" fill="currentColor" />
                                        <path d="M14.3465 6.02574C14.609 5.80698 14.6445 5.41681 14.4257 5.15429C14.207 4.89177 13.8168 4.8563 13.5543 5.07507L11.7732 6.55931C11.0035 7.20072 10.4691 7.6446 10.018 7.93476C9.58125 8.21564 9.28509 8.30993 9.00041 8.30993C8.71572 8.30993 8.41956 8.21564 7.98284 7.93476C7.53168 7.6446 6.9973 7.20072 6.22761 6.55931L4.44652 5.07507C4.184 4.8563 3.79384 4.89177 3.57507 5.15429C3.3563 5.41681 3.39177 5.80698 3.65429 6.02574L5.4664 7.53583C6.19764 8.14522 6.79033 8.63914 7.31343 8.97558C7.85834 9.32604 8.38902 9.54743 9.00041 9.54743C9.6118 9.54743 10.1425 9.32604 10.6874 8.97558C11.2105 8.63914 11.8032 8.14522 12.5344 7.53582L14.3465 6.02574Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            @error('email')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="Password">Password</label>
                            <div class="relative text-white-dark">
                                <input id="Password" type="password" placeholder="Enter Password" class="login-form-input ps-10 placeholder:text-white-dark  focus:border-blue-500" name="password" />
                                <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" class="text-blue-500">
                                        <path opacity="0.5" d="M1.5 12C1.5 9.87868 1.5 8.81802 2.15901 8.15901C2.81802 7.5 3.87868 7.5 6 7.5H12C14.1213 7.5 15.182 7.5 15.841 8.15901C16.5 8.81802 16.5 9.87868 16.5 12C16.5 14.1213 16.5 15.182 15.841 15.841C15.182 16.5 14.1213 16.5 12 16.5H6C3.87868 16.5 2.81802 16.5 2.15901 15.841C1.5 15.182 1.5 14.1213 1.5 12Z" fill="currentColor" />
                                        <path d="M6 12.75C6.41421 12.75 6.75 12.4142 6.75 12C6.75 11.5858 6.41421 11.25 6 11.25C5.58579 11.25 5.25 11.5858 5.25 12C5.25 12.4142 5.58579 12.75 6 12.75Z" fill="currentColor" />
                                        <path d="M9 12.75C9.41421 12.75 9.75 12.4142 9.75 12C9.75 11.5858 9.41421 11.25 9 11.25C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75Z" fill="currentColor" />
                                        <path d="M12.75 12C12.75 12.4142 12.4142 12.75 12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12Z" fill="currentColor" />
                                        <path d="M5.0625 6C5.0625 3.82538 6.82538 2.0625 9 2.0625C11.1746 2.0625 12.9375 3.82538 12.9375 6V7.50268C13.363 7.50665 13.7351 7.51651 14.0625 7.54096V6C14.0625 3.20406 11.7959 0.9375 9 0.9375C6.20406 0.9375 3.9375 3.20406 3.9375 6V7.54096C4.26488 7.51651 4.63698 7.50665 5.0625 7.50268V6Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                            @error('password')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" name="submit" class="btn btn-gradient mt-4 w-full border-0 uppercase shadow hover:submit-btn focus:submit-btn active:submit-btn">
                            Sign in
                        </button>
                    </form>
                    <a href="{{ route('student.forgotPassword') }}" class="mt-2 inline-block hover:underline text-black text-xl">Forgotten password?</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
