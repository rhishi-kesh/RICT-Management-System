<nav x-data="sidebar" class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
    <div class="h-full bg-white dark:bg-slate-900">
        <div class="flex items-center justify-between px-4 py-3">
            <a href="{{ route('dashboard') }}" class="main-logo flex shrink-0 items-center">
                <img class="ml-[5px] flex-none" width="150" src="{{ asset('storage/' . $systemInformation->logo) }}"
                    alt="image" />
            </a>
            <a href="javascript:;" class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10" @click="$store.app.toggleSidebar()">
                <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-950 dark:text-white" /> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> </svg>
            </a>
        </div>
        <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold" x-data="{ activeDropdown: 'dashboard' }">
            <li class="nav-item">
                <a href="{{ route('mySNotice') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cards"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M3.604 7.197l7.138 -3.109a.96 .96 0 0 1 1.27 .527l4.924 11.902a1 1 0 0 1 -.514 1.304l-7.137 3.109a.96 .96 0 0 1 -1.271 -.527l-4.924 -11.903a1 1 0 0 1 .514 -1.304z" /> <path d="M15 4h1a1 1 0 0 1 1 1v3.5" /> <path d="M20 6c.264 .112 .52 .217 .768 .315a1 1 0 0 1 .53 1.311l-2.298 5.374" /> </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                            My Notice
                        </span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('studentHomeworkView') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cards"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M3.604 7.197l7.138 -3.109a.96 .96 0 0 1 1.27 .527l4.924 11.902a1 1 0 0 1 -.514 1.304l-7.137 3.109a.96 .96 0 0 1 -1.271 -.527l-4.924 -11.903a1 1 0 0 1 .514 -1.304z" /> <path d="M15 4h1a1 1 0 0 1 1 1v3.5" /> <path d="M20 6c.264 .112 .52 .217 .768 .315a1 1 0 0 1 .53 1.311l-2.298 5.374" /> </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                            My Homework
                        </span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('myAttendance') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cards"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M3.604 7.197l7.138 -3.109a.96 .96 0 0 1 1.27 .527l4.924 11.902a1 1 0 0 1 -.514 1.304l-7.137 3.109a.96 .96 0 0 1 -1.271 -.527l-4.924 -11.903a1 1 0 0 1 .514 -1.304z" /> <path d="M15 4h1a1 1 0 0 1 1 1v3.5" /> <path d="M20 6c.264 .112 .52 .217 .768 .315a1 1 0 0 1 .53 1.311l-2.298 5.374" /> </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                            My Attendance
                        </span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('ticketindex') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-cards"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M3.604 7.197l7.138 -3.109a.96 .96 0 0 1 1.27 .527l4.924 11.902a1 1 0 0 1 -.514 1.304l-7.137 3.109a.96 .96 0 0 1 -1.271 -.527l-4.924 -11.903a1 1 0 0 1 .514 -1.304z" /> <path d="M15 4h1a1 1 0 0 1 1 1v3.5" /> <path d="M20 6c.264 .112 .52 .217 .768 .315a1 1 0 0 1 .53 1.311l-2.298 5.374" /> </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">
                            Support
                        </span>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>
