<nav x-data="sidebar" class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
    <div class="h-full bg-white dark:bg-slate-900">
        <div class="flex items-center justify-between px-4 py-3">
            <a href="{{ route('dashboard') }}" class="main-logo flex shrink-0 items-center">
                <img class="ml-[5px] flex-none" width="150" src="{{ asset('storage/' . $systemInformation->logo) }}" alt="image" />
            </a>
            <a href="javascript:;" class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10" @click="$store.app.toggleSidebar()">
                <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-950 dark:text-white" /> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> </svg>
            </a>
        </div>
        <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
            x-data="{ activeDropdown: 'dashboard' }">
            <li class="nav-item">
                <a href="{{ route('admission') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M16 19h6" /><path d="M19 16v6" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Admission</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('visitorForm') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Add Visitor </span>
                    </div>
                </a>
            </li>
            <h2 class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
                <span>Apps</span>
            </h2>
            <li class="nav-item">
                <a href="{{ route('myANotice') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pinned"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 4v6l-2 4v2h10v-2l-2 -4v-6" /><path d="M12 16l0 5" /><path d="M8 4l8 0" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690]  dark:group-hover:text-white-dark">My Notice</span>
                    </div>
                </a>
            </li>
            <li class="menu nav-item group">
                <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'student' }"
                    @click="activeDropdown === 'student' ? activeDropdown = null : activeDropdown = 'student'">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-school"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" /><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Students</span>
                    </div>
                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'student' }">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                    </div>
                </button>
                <ul x-cloak x-show="activeDropdown === 'student'" x-collapse class="sub-menu text-gray-500">
                    <li>
                        <a href="{{ route('studentsList') }}">
                            <span class="pl-2">Students</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('studentDownload') }}">
                            <span class="pl-2">Student Report<span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('visitor') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="icon icon-tabler icons-tabler-outline icon-tabler-school" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                            <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                            <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                            <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                        </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Visitors</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('batch') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="icon icon-tabler icons-tabler-outline icon-tabler-school" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M7 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                            <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"></path>
                        </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Batchs</span>
                    </div>
                </a>
            </li>
            <li class="menu nav-item group">
                <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'course' }"
                    @click="activeDropdown === 'course' ? activeDropdown = null : activeDropdown = 'course'">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="icon icon-tabler icons-tabler-outline icon-tabler-school" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                            <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                            <path d="M3 6l0 13"></path>
                            <path d="M12 6l0 13"></path>
                            <path d="M21 6l0 13"></path>
                        </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Course</span>
                    </div>
                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'course' }">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                    </div>
                </button>
                <ul x-cloak x-show="activeDropdown === 'course'" x-collapse class="sub-menu text-gray-500">
                    <li>
                        <a href="{{ route('course') }}">
                            <span class="pl-2">Courses</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('department') }}">
                            <span class="pl-2">Department<span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('mentors') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon icon-tabler icons-tabler-outline icon-tabler-school" fill="currentColor">
                            <path d="M8 4C8 5.10457 7.10457 6 6 6 4.89543 6 4 5.10457 4 4 4 2.89543 4.89543 2 6 2 7.10457 2 8 2.89543 8 4ZM5 16V22H3V10C3 8.34315 4.34315 7 6 7 6.82059 7 7.56423 7.32946 8.10585 7.86333L10.4803 10.1057 12.7931 7.79289 14.2073 9.20711 10.5201 12.8943 9 11.4587V22H7V16H5ZM6 9C5.44772 9 5 9.44772 5 10V14H7V10C7 9.44772 6.55228 9 6 9ZM19 5H10V3H20C20.5523 3 21 3.44772 21 4V15C21 15.5523 20.5523 16 20 16H16.5758L19.3993 22H17.1889L14.3654 16H10V14H19V5Z">
                            </path>
                        </svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Mentors</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('due') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-currency-taka"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.5 15.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M7 7a2 2 0 1 1 4 0v9a3 3 0 0 0 6 0v-.5" /><path d="M8 11h6" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Pay Roll</span>
                    </div>
                </a>
            </li>
            <li class="menu nav-item group">
                <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'notice' }"
                    @click="activeDropdown === 'notice' ? activeDropdown = null : activeDropdown = 'notice'">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-note"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 20l7 -7" /><path d="M13 20v-6a1 1 0 0 1 1 -1h6v-7a2 2 0 0 0 -2 -2h-12a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Notice</span>
                    </div>
                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'notice' }">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                    </div>
                </button>
                <ul x-cloak x-show="activeDropdown === 'notice'" x-collapse class="sub-menu text-gray-500">
                    <li>
                        <a href="{{ route('notice') }}">
                            <span class="pl-2">Send Notice</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('allNotice') }}">
                            <span class="pl-2">All Notices<span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('admissionBooth') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-heart"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h.5" /><path d="M18 22l3.35 -3.284a2.143 2.143 0 0 0 .005 -3.071a2.242 2.242 0 0 0 -3.129 -.006l-.224 .22l-.223 -.22a2.242 2.242 0 0 0 -3.128 -.006a2.143 2.143 0 0 0 -.006 3.071l3.355 3.296z" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Admission Booth</span>
                    </div>
                </a>
            </li>
            <li class="menu nav-item group">
                <button type="button" class="nav-link group" :class="{ 'active': activeDropdown === 'Attendance' }"
                    @click="activeDropdown === 'Attendance' ? activeDropdown = null : activeDropdown = 'Attendance'">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4.5" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M20.2 20.2l1.8 1.8" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Attendance</span>
                    </div>
                    <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'Attendance' }">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                    </div>
                </button>
                <ul x-cloak x-show="activeDropdown === 'Attendance'" x-collapse class="sub-menu text-gray-500">
                    <li>
                        <a href="{{ route('adminAttendance') }}">
                            <span class="pl-2">Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('attendancereport') }}">
                            <span class="pl-2">Attendance Report<span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{ route('salesTarget') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-target-arrow"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M12 7a5 5 0 1 0 5 5" /><path d="M13 3.055a9 9 0 1 0 7.941 7.945" /><path d="M15 6v3h3l3 -3h-3v-3z" /><path d="M15 9l-3 3" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Sales Target</span>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('adminTicketindex') }}" class="group sidebargroup">
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-heart-handshake"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /><path d="M12 6l-3.293 3.293a1 1 0 0 0 0 1.414l.543 .543c.69 .69 1.81 .69 2.5 0l1 -1a3.182 3.182 0 0 1 4.5 0l2.25 2.25" /><path d="M12.5 15.5l2 2" /><path d="M15 13l2 2" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Support</span>
                    </div>
                </a>
            </li>
            <li class="menu nav-item group">
                <button type="button" class="nav-link group" :class="{'active' : activeDropdown === 'setting'}" @click="activeDropdown === 'setting' ? activeDropdown = null : activeDropdown = 'setting'" >
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-settings"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Settings</span>
                    </div>
                    <div :class="{'!rotate-90' : activeDropdown === 'setting'}">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </button>
                <ul x-cloak x-show="activeDropdown === 'setting'" x-collapse class="sub-menu text-gray-500">
                    <li x-data="{subActive:null}">
                        <button type="button" class="before:h-[5px] before:w-[5px] before:rounded before:bg-gray-300 hover:bg-gray-100 before:mr-2 dark:text-[#888ea8] dark:hover:bg-gray-900" @click="subActive === 'error' ? subActive = null : subActive = 'error'" >
                            Users
                            <div class="ml-auto" :class="{'!rotate-90' : subActive === 'error'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5" d="M6.25 19C6.25 19.3139 6.44543 19.5946 6.73979 19.7035C7.03415 19.8123 7.36519 19.7264 7.56944 19.4881L13.5694 12.4881C13.8102 12.2073 13.8102 11.7928 13.5694 11.5119L7.56944 4.51194C7.36519 4.27364 7.03415 4.18773 6.73979 4.29662C6.44543 4.40551 6.25 4.68618 6.25 5.00004L6.25 19Z" fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5119 19.5695C10.1974 19.2999 10.161 18.8264 10.4306 18.5119L16.0122 12L10.4306 5.48811C10.161 5.17361 10.1974 4.70014 10.5119 4.43057C10.8264 4.161 11.2999 4.19743 11.5695 4.51192L17.5695 11.5119C17.8102 11.7928 17.8102 12.2072 17.5695 12.4881L11.5695 19.4881C11.2999 19.8026 10.8264 19.839 10.5119 19.5695Z" fill="currentColor" />
                                </svg>
                            </div>
                        </button>
                        <ul class="sub-menu text-gray-500 ml-2" x-show="subActive === 'error'" x-collapse>
                            <li>
                                <a href="{{ route('registation') }}">
                                    <span class="pl-2">Add User</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('userView') }}">
                                    <span class="pl-2">View Users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li x-data="{subActive:null}">
                        <button type="button" class="before:h-[5px] before:w-[5px] before:rounded before:bg-gray-300 hover:bg-gray-100 before:mr-2 dark:text-[#888ea8] dark:hover:bg-gray-900" @click="subActive === 'error' ? subActive = null : subActive = 'error'" >
                            Role & Permission
                            <div class="ml-auto" :class="{'!rotate-90' : subActive === 'error'}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5" d="M6.25 19C6.25 19.3139 6.44543 19.5946 6.73979 19.7035C7.03415 19.8123 7.36519 19.7264 7.56944 19.4881L13.5694 12.4881C13.8102 12.2073 13.8102 11.7928 13.5694 11.5119L7.56944 4.51194C7.36519 4.27364 7.03415 4.18773 6.73979 4.29662C6.44543 4.40551 6.25 4.68618 6.25 5.00004L6.25 19Z" fill="currentColor" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5119 19.5695C10.1974 19.2999 10.161 18.8264 10.4306 18.5119L16.0122 12L10.4306 5.48811C10.161 5.17361 10.1974 4.70014 10.5119 4.43057C10.8264 4.161 11.2999 4.19743 11.5695 4.51192L17.5695 11.5119C17.8102 11.7928 17.8102 12.2072 17.5695 12.4881L11.5695 19.4881C11.2999 19.8026 10.8264 19.839 10.5119 19.5695Z" fill="currentColor" />
                                </svg>
                            </div>
                        </button>
                        <ul class="sub-menu text-gray-500 ml-2" x-show="subActive === 'error'" x-collapse>
                            <li>
                                <a href="{{ route('permission') }}">
                                    <span class="pl-2">Permissions</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('role') }}">
                                    <span class="pl-2">Roles</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('counciling') }}">
                            <span class="pl-2">Counciling Person</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('paymentMode') }}">
                            <span class="pl-2">Payment Type</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('systemInformation') }}">
                            <span class="pl-2">System Information</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('smtpSettings') }}">
                            <span class="pl-2">SMTP Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('manageWebsiteCourse') }}">
                            <span class="pl-2 text-nowrap">Manage Web Course</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="menu nav-item group">
                <button type="button" class="nav-link group" :class="{'active' : activeDropdown === 'recycle'}" @click="activeDropdown === 'recycle' ? activeDropdown = null : activeDropdown = 'recycle'" >
                    <div class="flex items-center">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-recycle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17l-2 2l2 2" /><path d="M10 19h9a2 2 0 0 0 1.75 -2.75l-.55 -1" /><path d="M8.536 11l-.732 -2.732l-2.732 .732" /><path d="M7.804 8.268l-4.5 7.794a2 2 0 0 0 1.506 2.89l1.141 .024" /><path d="M15.464 11l2.732 .732l.732 -2.732" /><path d="M18.196 11.732l-4.5 -7.794a2 2 0 0 0 -3.256 -.14l-.591 .976" /></svg>
                        <span class="text-black pl-3 dark:text-[#506690] dark:group-hover:text-white-dark">Recycle Bin</span>
                    </div>
                    <div :class="{'!rotate-90' : activeDropdown === 'setting'}">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> </svg>
                    </div>
                </button>
                <ul x-cloak x-show="activeDropdown === 'recycle'" x-collapse class="sub-menu text-gray-500">
                    <li>
                        <a href="{{ route('recycleStudent') }}">
                            <span class="pl-2">Students</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
