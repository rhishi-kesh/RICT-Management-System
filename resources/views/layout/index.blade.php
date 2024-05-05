<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/RICT/fav.jpg') }}" />
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/perfect-scrollbar.min.css') }}" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/animate.css') }}" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/style.css') }}" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('frontend/css/sweetalert2.min.css') }}" />
       
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('backend/css/perfect-scrollbar.min.css')}}" />
        <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('backend/css/style.css')}}" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="{{ asset('backend/css/animate.css')}}" />

        @vite('resources/css/app.css')
        @livewireStyles
        @stack('css')
    </head>
    <body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
        <!-- sidebar menu overlay -->
        <div x-cloak class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{'hidden' : !$store.app.sidebar}"@click="$store.app.toggleSidebar()"></div>

        <!-- scroll to top button -->
        <div class="fixed bottom-8 rignt-8 z-50 ltr:right-6" x-data="scrollToTop">
            <template x-if="showTopButton">
                <button type="button" class="btn animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:border-blue-500" @click="goToTop">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-big-up-line " width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" class="dark:text-blue-500"/>
                        <path d="M9 12h-3.586a1 1 0 0 1 -.707 -1.707l6.586 -6.586a1 1 0 0 1 1.414 0l6.586 6.586a1 1 0 0 1 -.707 1.707h-3.586v6h-6v-6z" class="dark:text-blue-500" />
                        <path d="M9 21h6" class="dark:text-blue-500" />
                    </svg>
                </button>
            </template>
        </div>

        <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
            <!-- start sidebar section -->
            <div :class="{'dark text-white-dark' : $store.app.semidark}">
                @include('include/sidebar')
            </div>
            <!-- end sidebar section -->

            <div class="main-content flex min-h-screen flex-col bg-gray-200 dark:bg-gray-950">
                <!-- start header section -->
                @include('include/header')
                <!-- end header section -->

                <!-- start main content section -->
                @yield('content')
                <!-- end main content section -->

                <!-- start footer section -->
                @include('include/footer')
                <!-- end footer section -->
            </div>
        </div>

        @livewireScripts
        <script src="{{ asset('frontend/js/perfect-scrollbar.min.js') }}"></script>
        <script defer src="{{ asset('frontend/js/popper.min.js') }}"></script>
        <script defer src="{{ asset('frontend/js/tippy-bundle.umd.min.js') }}"></script>
        <script defer src="{{ asset('frontend/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('frontend/js/main.js') }}"></script>
        <script src="{{ asset('frontend/js/cuntom.js') }}"></script>
        @stack('js')
    </body>
</html>
