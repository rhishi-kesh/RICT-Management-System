<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/RICT/fav.jpg') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/style.css') }}" />
    @vite('resources/css/app.css')
</head>
<body class="font-nunito bg-[#2C347D] w-screen h-screen flex items-center justify-center">
    <div class="px-2 sm:px-16 w-full flex items-center justify-center">
        <div class="relative w-full md:w-2/4 rounded-md p-2 bg-gray-200 px-2 md:px-6 py-10">
            <div class="px-4 md:px-10">
                <div class="mb-6">
                    <h1 class="text-3xl font-extrabold uppercase !leading-snug text-primary md:text-4xl my-color-blue">Reset password</h1>
                </div>
                @error('email')
                    <div class="p-2 rounded bg-red-500 text-white">{{ $message }}</div>
                @enderror
                <form action="{{ route('mentor.changePasswordPost') }}" class="space-y-5" method="POST">
                    @csrf
                    <div>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <label for="Password">Password</label>
                        <div class="relative text-white-dark">
                            <input id="Password" type="password" placeholder="Enter Password" class="login-form-input ps-10 placeholder:text-white-dark focus:border-blue-700" name="password" />
                            <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path opacity="0.5" d="M1.5 12C1.5 9.87868 1.5 8.81802 2.15901 8.15901C2.81802 7.5 3.87868 7.5 6 7.5H12C14.1213 7.5 15.182 7.5 15.841 8.15901C16.5 8.81802 16.5 9.87868 16.5 12C16.5 14.1213 16.5 15.182 15.841 15.841C15.182 16.5 14.1213 16.5 12 16.5H6C3.87868 16.5 2.81802 16.5 2.15901 15.841C1.5 15.182 1.5 14.1213 1.5 12Z" fill="currentColor" />
                                    <path d="M6 12.75C6.41421 12.75 6.75 12.4142 6.75 12C6.75 11.5858 6.41421 11.25 6 11.25C5.58579 11.25 5.25 11.5858 5.25 12C5.25 12.4142 5.58579 12.75 6 12.75Z" fill="currentColor" />
                                    <path d="M9 12.75C9.41421 12.75 9.75 12.4142 9.75 12C9.75 11.5858 9.41421 11.25 9 11.25C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75Z" fill="currentColor" />
                                    <path d="M12.75 12C12.75 12.4142 12.4142 12.75 12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12Z" fill="currentColor" />
                                    <path d="M5.0625 6C5.0625 3.82538 6.82538 2.0625 9 2.0625C11.1746 2.0625 12.9375 3.82538 12.9375 6V7.50268C13.363 7.50665 13.7351 7.51651 14.0625 7.54096V6C14.0625 3.20406 11.7959 0.9375 9 0.9375C6.20406 0.9375 3.9375 3.20406 3.9375 6V7.54096C4.26488 7.51651 4.63698 7.50665 5.0625 7.50268V6Z" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                        @error('password')
                            <div class="p-2 rounded text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation">Confirm Password</label>
                        <div class="relative text-white-dark">
                            <input id="password_confirmation" type="password" placeholder="Enter confirm password" class="login-form-input ps-10 placeholder:text-white-dark  focus:border-blue-700" name="password_confirmation" />
                            <span class="absolute start-4 top-1/2 -translate-y-1/2">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path opacity="0.5" d="M1.5 12C1.5 9.87868 1.5 8.81802 2.15901 8.15901C2.81802 7.5 3.87868 7.5 6 7.5H12C14.1213 7.5 15.182 7.5 15.841 8.15901C16.5 8.81802 16.5 9.87868 16.5 12C16.5 14.1213 16.5 15.182 15.841 15.841C15.182 16.5 14.1213 16.5 12 16.5H6C3.87868 16.5 2.81802 16.5 2.15901 15.841C1.5 15.182 1.5 14.1213 1.5 12Z" fill="currentColor" />
                                    <path d="M6 12.75C6.41421 12.75 6.75 12.4142 6.75 12C6.75 11.5858 6.41421 11.25 6 11.25C5.58579 11.25 5.25 11.5858 5.25 12C5.25 12.4142 5.58579 12.75 6 12.75Z" fill="currentColor" />
                                    <path d="M9 12.75C9.41421 12.75 9.75 12.4142 9.75 12C9.75 11.5858 9.41421 11.25 9 11.25C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75Z" fill="currentColor" />
                                    <path d="M12.75 12C12.75 12.4142 12.4142 12.75 12 12.75C11.5858 12.75 11.25 12.4142 11.25 12C11.25 11.5858 11.5858 11.25 12 11.25C12.4142 11.25 12.75 11.5858 12.75 12Z" fill="currentColor" />
                                    <path d="M5.0625 6C5.0625 3.82538 6.82538 2.0625 9 2.0625C11.1746 2.0625 12.9375 3.82538 12.9375 6V7.50268C13.363 7.50665 13.7351 7.51651 14.0625 7.54096V6C14.0625 3.20406 11.7959 0.9375 9 0.9375C6.20406 0.9375 3.9375 3.20406 3.9375 6V7.54096C4.26488 7.51651 4.63698 7.50665 5.0625 7.50268V6Z" fill="currentColor" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-gradient mt-4 w-full border-0 uppercase shadow hover:submit-btn focus:submit-btn active:submit-btn">
                        Reset Password
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
