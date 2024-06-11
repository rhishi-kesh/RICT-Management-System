<nav x-data="sidebar" class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
    <div class="h-full bg-white dark:bg-slate-900">
        <div class="flex items-center justify-between px-4 py-3">
            <a href="{{ route('mentorDashboard') }}" class="main-logo flex shrink-0 items-center">
                <img class="ml-[5px] flex-none" width="150" src="{{ asset('storage/' . $systemInformation->logo) }}" alt="image" />
            </a>
            <a href="javascript:;" class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                @click="$store.app.toggleSidebar()">
                <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="text-gray-950 dark:text-white" />
                    <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
        <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold" x-data="{ activeDropdown: 'dashboard' }">
            <li class="nav-item">
                <a href="{{ route('myMNotice') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 4.5l-4 4l-4 1.5l-1.5 1.5l7 7l1.5 -1.5l1.5 -4l4 -4" /><path d="M9 15l-4.5 4.5" /><path d="M14.5 4l5.5 5.5" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">My Notice</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('myBatchMentor') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="icon icon-tabler icons-tabler-outline icon-tabler-school" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                            <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"></path>
                        </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">My Batchs</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('myStudentMentor') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6"></path>
                            <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4"></path>
                        </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">My Students</span>
                    </div>
                </a>
            </li>
            <li class="menu nav-item group">
                <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'homework' }"
                    @click="activeDropdown === 'homework' ? activeDropdown = null : activeDropdown = 'homework'">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-backpack"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 18v-6a6 6 0 0 1 6 -6h2a6 6 0 0 1 6 6v6a3 3 0 0 1 -3 3h-8a3 3 0 0 1 -3 -3z" /><path d="M10 6v-1a2 2 0 1 1 4 0v1" /><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /><path d="M11 10h2" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Homework</span>
                    </div>
                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'homework' }">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </button>
                <ul x-cloak x-show="activeDropdown === 'homework'" x-collapse class="sub-menu text-gray-500">
                    <li>
                        <a href="{{ route('homework') }}" class="text-nowrap">Assaign Homework</a>
                    </li>
                    <li>
                        <a href="{{ route('homeworkView') }}">Homeworks</a>
                    </li>
                    <li>
                        <a href="{{ route('submitedHomework') }}" class="text-nowrap">Submited Homeworks</a>
                    </li>
                </ul>
            </li>
            <li class="menu nav-item group">
                <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'attendance' }"
                    @click="activeDropdown === 'attendance' ? activeDropdown = null : activeDropdown = 'attendance'">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.5 21h-6.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v5" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Attendance</span>
                    </div>
                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'attendance' }">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </button>
                <ul x-cloak x-show="activeDropdown === 'attendance'" x-collapse class="sub-menu text-gray-500">
                    <li>
                        <a href="{{ route('attendance') }}">Attendance</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
