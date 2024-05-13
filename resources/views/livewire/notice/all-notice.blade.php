<div class="animate__animated p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
    <div x-data="notes">
        <div class="relative flex h-full gap-5 sm:h-[calc(100vh_-_150px)]">
            <div class="absolute z-10 hidden h-full w-full rounded-md bg-black/60" :class="{ '!block xl:!hidden': isShowNoteMenu }" @click="isShowNoteMenu = !isShowNoteMenu" ></div>
            <div class="panel absolute z-10 hidden h-full w-[240px] flex-none space-y-4 overflow-hidden p-4 ltr:rounded-r-none rtl:rounded-l-none ltr:lg:rounded-r-md rtl:lg:rounded-l-md xl:relative xl:block xl:h-auto bg-white" :class="{ 'hidden shadow': !isShowNoteMenu, 'h-auto rounded-sm ltr:left-0 rtl:right-0': isShowNoteMenu }" >
                <div class="flex h-full flex-col pb-16">
                    <div class="flex items-center text-center">
                        <div class="shrink-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-white"><path d="M20.3116 12.6473L20.8293 10.7154C21.4335 8.46034 21.7356 7.3328 21.5081 6.35703C21.3285 5.58657 20.9244 4.88668 20.347 4.34587C19.6157 3.66095 18.4881 3.35883 16.2331 2.75458C13.978 2.15033 12.8504 1.84821 11.8747 2.07573C11.1042 2.25537 10.4043 2.65945 9.86351 3.23687C9.27709 3.86298 8.97128 4.77957 8.51621 6.44561C8.43979 6.7254 8.35915 7.02633 8.27227 7.35057L8.27222 7.35077L7.75458 9.28263C7.15033 11.5377 6.84821 12.6652 7.07573 13.641C7.25537 14.4115 7.65945 15.1114 8.23687 15.6522C8.96815 16.3371 10.0957 16.6392 12.3508 17.2435L12.3508 17.2435C14.3834 17.7881 15.4999 18.0873 16.415 17.9744C16.5152 17.9621 16.6129 17.9448 16.7092 17.9223C17.4796 17.7427 18.1795 17.3386 18.7203 16.7612C19.4052 16.0299 19.7074 14.9024 20.3116 12.6473Z" stroke="currentColor" stroke-width="1.5" /> <path opacity="0.5" d="M16.415 17.9741C16.2065 18.6126 15.8399 19.1902 15.347 19.6519C14.6157 20.3368 13.4881 20.6389 11.2331 21.2432C8.97798 21.8474 7.85044 22.1495 6.87466 21.922C6.10421 21.7424 5.40432 21.3383 4.86351 20.7609C4.17859 20.0296 3.87647 18.9021 3.27222 16.647L2.75458 14.7151C2.15033 12.46 1.84821 11.3325 2.07573 10.3567C2.25537 9.58627 2.65945 8.88638 3.23687 8.34557C3.96815 7.66065 5.09569 7.35853 7.35077 6.75428C7.77741 6.63996 8.16368 6.53646 8.51621 6.44531" stroke="currentColor" stroke-width="1.5" /> <path d="M11.7769 10L16.6065 11.2941" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path opacity="0.5" d="M11 12.8975L13.8978 13.6739" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /></svg>
                        </div>
                        <h3 class="text-lg font-semibold ml-3 dark:text-white">Notice</h3>
                    </div>
                    <div class="my-4 mb-2 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                    <div class="perfect-scrollbar relative -mr-3.5 h-full grow pr-3.5">
                        <div class="space-y-1">
                            <button type="button" class="flex h-10 w-full items-center rounded-md p-1 font-medium text-primary duration-300 hover:bg-[#888ea81a] hover:pl-3 dark:hover:bg-[#181F32]" :class="activeTab == 'mentor' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''" @click="activeTab = 'mentor'" >
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" > <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5" /> <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path opacity="0.5" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z" stroke="currentColor" stroke-width="1.5" / > </svg>
                                <div class="ml-3">Mentors</div>
                            </button>

                            <button type="button" class="flex h-10 w-full items-center rounded-md p-1 font-medium text-warning duration-300 hover:bg-[#888ea81a] hover:pl-3 dark:hover:bg-[#181F32]" :class="activeTab == 'systemUser' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''" @click="activeTab = 'systemUser'" >
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" > <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5" /> <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path opacity="0.5" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z" stroke="currentColor" stroke-width="1.5" / > </svg>
                                <div class="ml-3">System Users</div>
                            </button>

                            <button type="button" class="flex h-10 w-full items-center rounded-md p-1 font-medium text-info duration-300 hover:bg-[#888ea81a] hover:pl-3 dark:hover:bg-[#181F32]" :class="activeTab == 'admissionBooth' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''" @click="activeTab = 'admissionBooth'" >
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" > <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5" /> <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path opacity="0.5" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z" stroke="currentColor" stroke-width="1.5" / > </svg>
                                <div class="ml-3">Admission Booth</div>
                            </button>

                            <button type="button" class="flex h-10 w-full items-center rounded-md p-1 font-medium text-danger duration-300  hover:bg-[#888ea81a] hover:pl-3  dark:hover:bg-[#181F32]" :class="activeTab == 'studentWithoutBatch' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''" @click="activeTab = 'studentWithoutBatch'" >
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" > <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5" /> <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path opacity="0.5" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z" stroke="currentColor" stroke-width="1.5" / > </svg>
                                <div class="ml-3">Student Without Batch</div>
                            </button>
                            <h2 class="mb-2 text-xl dark:text-white">Batchs</h2>
                            <hr>
                            @foreach ($batch as $item)
                                <button type="button" class="flex h-10 w-full items-center rounded-md p-1 font-medium text-danger duration-300  hover:bg-[#888ea81a] hover:pl-3  dark:hover:bg-[#181F32]" :class="activeTab == '{{ $item->name }}' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''" @click="activeTab = '{{ $item->name }}', $wire.call('singleBatch','{{ $item->id }}')" >
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" > <path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5" /> <path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path opacity="0.5" d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z" stroke="currentColor" stroke-width="1.5" / > </svg>
                                    <div class="ml-3">{{ $item->name }}</div>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-0 w-full p-4 left-0">
                    <a href="{{ route('notice') }}" class="btn bg-blue-500 text-white w-full flex border-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 shrink-0 mr-2 inline-block" > <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                        Add New Note
                    </a>
                </div>
            </div>

            <div class="panel h-full flex-1 overflow-auto bg-white">
                <div class="p-5">
                    <button type="button" class="hover:text-primary xl:hidden" @click="isShowNoteMenu = !isShowNoteMenu">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                            <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                            <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </button>
                </div>
                <div x-show="activeTab == 'mentor'" class="p-7 pt-0 w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
                        @foreach ($mentorNotice as $item)
                            <div class="mb-1 rounded-xl shadow shadow-slate-400 dark:shadow-blue-200 max-h-[176px]">
                                <div class="flex justify-start gap-2 p-4">
                                    @if(empty($item->mentor->image))
                                        <div class="profile">{{ mb_substr(strtoupper($item->mentor->name), 0, 1) }}</div>
                                    @else
                                        <div>
                                            <img class="h-9 w-9 rounded-full object-cover saturate-50  group-hover:saturate-100" src="{{ asset('storage/' . $item->mentor->image) }}" alt="image">
                                        </div>
                                    @endif
                                    <div>
                                        <h4>
                                            {{ $item->mentor->name }}
                                            @if($item->is_seen == 0)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                </svg>
                                            @endif
                                        </h4>
                                        <p>{{ $item->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="relative p-4 pt-2 min-h-[104px]">
                                    <div>
                                        {!! Str::limit($item->notice, 150, '...') !!}
                                    </div>
                                    <a href="{{ route('singleANotice', $item->id) }}" class="cursor-pointer absolute inset-0 bg-gradient-to-b from-[#ffffff6c] to-white dark:to-[#080c16] dark:from-[#0f172a60] rounded-xl"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div x-show="activeTab == 'systemUser'" class="p-7 pt-0 w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
                        @foreach ($systemUserNotice as $item)
                            <div class="mb-1 rounded-xl shadow shadow-slate-400 dark:shadow-blue-200 max-h-[176px]">
                                <div class="flex justify-start gap-2 p-4">
                                    @if(empty($item->user->image))
                                        <div class="profile">{{ mb_substr(strtoupper($item->user->name), 0, 1) }}</div>
                                    @else
                                        <div>
                                            <img class="h-9 w-9 rounded-full object-cover saturate-50  group-hover:saturate-100" src="{{ asset('storage/' . $item->user->image) }}" alt="image">
                                        </div>
                                    @endif
                                    <div>
                                        <h4>
                                            {{ $item->user->name }}
                                            @if($item->is_seen == 0)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                                </svg>
                                            @endif
                                        </h4>
                                        <p>{{ $item->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="relative p-4 pt-2 min-h-[104px]">
                                    <div>
                                        {!! Str::limit($item->notice, 150, '...') !!}
                                    </div>
                                    <a href="{{ route('singleANotice', $item->id) }}"  class="cursor-pointer absolute inset-0 bg-gradient-to-b from-[#ffffff6c] to-white dark:to-[#080c16] dark:from-[#0f172a60] rounded-xl"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div x-show="activeTab == 'admissionBooth'" class="p-7 pt-0 w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
                        @foreach ($admissionBoothNotice as $item)
                            <div class="mb-1 rounded-xl shadow shadow-slate-400 dark:shadow-blue-200 max-h-[176px]">
                                <div class="flex justify-start gap-2 p-4">
                                    <div class="profile">{{ mb_substr(strtoupper ($item->admissionBooth->name), 0, 1) }}</div>
                                    <div>
                                        <h4>
                                            {{ $item->admissionBooth->name }}
                                            @if($item->is_seen == 0)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /> </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2"> <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" /> </svg>
                                            @endif
                                        </h4>
                                        <p>{{ $item->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <div class="relative p-4 pt-2 min-h-[104px]">
                                    <div>
                                        {!! Str::limit($item->notice, 150, '...') !!}
                                    </div>
                                    <a href="{{ route('singleANotice', $item->id) }}"  class="cursor-pointer absolute inset-0 bg-gradient-to-b from-[#ffffff6c] to-white dark:to-[#080c16] dark:from-[#0f172a60] rounded-xl"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div x-show="activeTab == 'studentWithoutBatch'" class="p-7 pt-0 w-full">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
                        @foreach ($students as $item)
                            <div class="mb-1 rounded-xl shadow shadow-slate-400 dark:shadow-blue-200 max-h-[176px]">
                                <div class="flex justify-start gap-2 p-4">
                                    @if(empty($item->student->image))
                                        <div class="profile">{{ mb_substr(strtoupper($item->student->name), 0, 1) }}</div>
                                    @else
                                        <div>
                                            <img class="h-9 w-9 rounded-full object-cover saturate-50  group-hover:saturate-100" src="{{ asset('storage/' . $item->student->image) }}" alt="image">
                                        </div>
                                    @endif
                                    <div>
                                        <h4>
                                            {{ $item->student->name }}
                                            @if($item->is_seen == 0)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /> </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2"> <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" /> </svg>
                                            @endif
                                            <div>
                                                ({{ $item->student->student_id }})
                                                {{ $item->created_at->diffForHumans() }}
                                            </div>
                                        </h4>
                                    </div>
                                </div>
                                <div class="relative p-4 pt-2 min-h-[104px]">
                                    <div>
                                        {!! Str::limit($item->notice, 150, '...') !!}
                                    </div>
                                    <a href="{{ route('singleANotice', $item->id) }}"  class="cursor-pointer absolute inset-0 bg-gradient-to-b from-[#ffffff6c] to-white dark:to-[#080c16] dark:from-[#0f172a60] rounded-xl"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach ($batch as $item)
                    <div x-show="activeTab == '{{ $item->name }}'" class="p-7 pt-0 w-full">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
                            @foreach ($batchdata as $data)
                                <div class="mb-1 rounded-xl shadow shadow-slate-400 dark:shadow-blue-200 max-h-[176px]">
                                    <div class="flex justify-start gap-2 p-4">
                                        @if(empty($data->student->image))
                                            <div class="profile">{{ mb_substr(strtoupper($data->student->name), 0, 1) }}</div>
                                        @else
                                            <div>
                                                <img class="h-9 w-9 rounded-full object-cover saturate-50  group-hover:saturate-100" src="{{ asset('storage/' . $data->student->image) }}" alt="image">
                                            </div>
                                        @endif
                                        <div>
                                            <h4>
                                                {{ $data->student->name }}
                                                @if($data->is_seen == 0)
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2"> <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" /> <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /> </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 inline-block ml-2"> <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" /> </svg>
                                                @endif
                                                <div>
                                                    ({{ $data->student->student_id }})
                                                    {{ $data->created_at->diffForHumans() }}
                                                </div>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="relative p-4 pt-2 min-h-[104px] box-border">
                                        <div>
                                            {!! Str::limit($data->notice, 150, '...') !!}
                                        </div>
                                        <a href="{{ route('singleANotice', $data->id) }}"  class="cursor-pointer absolute inset-0 bg-gradient-to-b from-[#ffffff6c] to-white dark:to-[#080c16] dark:from-[#0f172a60] rounded-xl"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @push('js')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('notes', () => ({
                isShowNoteMenu: false,
                activeTab: 'mentor',
            }));
        })
    </script>
    @endpush
</div>
