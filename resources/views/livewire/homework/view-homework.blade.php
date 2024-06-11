<div class="animate__animated p-6" :class="[$store.app.animation]">
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            input[type="date"]::-webkit-inner-spin-button,
            input[type="date"]::-webkit-calendar-picker-indicator {
                display: none;
                -webkit-appearance: none;
                user-select: none;
            }
        </style>
    @endpush
    <div x-data="todolist">
        <div class="relative flex h-full gap-5 sm:h-[calc(100vh_-_150px)]">
            <div class="panel absolute z-10 hidden h-full w-[240px] max-w-full bg-white flex-none space-y-4 p-4 rounded-r-none xl:relative xl:block xl:h-auto xl:rounded-r-md" :class="{'!block':isShowTaskMenu}">
                <div class="flex h-full flex-col pb-16">
                    <div class="pb-2">
                        <div class="flex items-center text-center">
                            <div class="shrink-0">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"> <path opacity="0.5" d="M16 4.00195C18.175 4.01406 19.3529 4.11051 20.1213 4.87889C21 5.75757 21 7.17179 21 10.0002V16.0002C21 18.8286 21 20.2429 20.1213 21.1215C19.2426 22.0002 17.8284 22.0002 15 22.0002H9C6.17157 22.0002 4.75736 22.0002 3.87868 21.1215C3 20.2429 3 18.8286 3 16.0002V10.0002C3 7.17179 3 5.75757 3.87868 4.87889C4.64706 4.11051 5.82497 4.01406 8 4.00195" stroke="currentColor" stroke-width="1.5" /> <path d="M8 14H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M7 10.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M9 17.5H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" stroke="currentColor" stroke-width="1.5" /> </svg>
                            </div>
                            <h3 class="text-lg font-semibold ml-3">Home Work</h3>
                        </div>
                    </div>
                    <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                    <div class="perfect-scrollbar relative -mr-3.5 h-full grow pr-3.5">
                        <div class="space-y-1">
                            <button type="button" class="flex h-10 w-full items-center justify-between rounded-md p-2 font-medium hover:bg-white-dark/10 hover:text-primary dark:hover:bg-[#181F32] dark:hover:text-primary hover:pl-3 duration-300" @click="activeTab = 'inbox'" :class="activeTab == 'inbox' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 shrink-0" > <path d="M2 5.5L3.21429 7L7.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> <path opacity="0.5" d="M2 12.5L3.21429 14L7.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> <path d="M2 19.5L3.21429 21L7.5 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /> <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                    <div class="ml-3">Inbox</div>
                                </div>
                                <div class="whitespace-nowrap rounded-md bg-primary-light py-0.5 px-2 font-semibold dark:bg-[#060818]" >{{ count($allHomework) }}</div>
                            </button>
                            <button type="button" class="flex h-10 w-full items-center justify-between rounded-md p-2 font-medium hover:bg-white-dark/10 hover:text-primary dark:hover:bg-[#181F32] dark:hover:text-primary hover:pl-3 duration-300"  @click="activeTab = 'done'" :class="activeTab == 'done' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0" > <path d="M20.9751 12.1852L20.2361 12.0574L20.9751 12.1852ZM20.2696 16.265L19.5306 16.1371L20.2696 16.265ZM6.93776 20.4771L6.19055 20.5417H6.19055L6.93776 20.4771ZM6.1256 11.0844L6.87281 11.0198L6.1256 11.0844ZM13.9949 5.22142L14.7351 5.34269V5.34269L13.9949 5.22142ZM13.3323 9.26598L14.0724 9.38725V9.38725L13.3323 9.26598ZM6.69813 9.67749L6.20854 9.10933H6.20854L6.69813 9.67749ZM8.13687 8.43769L8.62646 9.00585H8.62646L8.13687 8.43769ZM10.518 4.78374L9.79207 4.59542L10.518 4.78374ZM10.9938 2.94989L11.7197 3.13821L11.7197 3.13821L10.9938 2.94989ZM12.6676 2.06435L12.4382 2.77841L12.4382 2.77841L12.6676 2.06435ZM12.8126 2.11093L13.0419 1.39687L13.0419 1.39687L12.8126 2.11093ZM9.86194 6.46262L10.5235 6.81599V6.81599L9.86194 6.46262ZM13.9047 3.24752L13.1787 3.43584V3.43584L13.9047 3.24752ZM11.6742 2.13239L11.3486 1.45675L11.3486 1.45675L11.6742 2.13239ZM20.2361 12.0574L19.5306 16.1371L21.0086 16.3928L21.7142 12.313L20.2361 12.0574ZM13.245 21.25H8.59634V22.75H13.245V21.25ZM7.68497 20.4125L6.87281 11.0198L5.37839 11.149L6.19055 20.5417L7.68497 20.4125ZM19.5306 16.1371C19.0238 19.0677 16.3813 21.25 13.245 21.25V22.75C17.0712 22.75 20.3708 20.081 21.0086 16.3928L19.5306 16.1371ZM13.2548 5.10015L12.5921 9.14472L14.0724 9.38725L14.7351 5.34269L13.2548 5.10015ZM7.18772 10.2456L8.62646 9.00585L7.64728 7.86954L6.20854 9.10933L7.18772 10.2456ZM11.244 4.97206L11.7197 3.13821L10.2678 2.76157L9.79207 4.59542L11.244 4.97206ZM12.4382 2.77841L12.5832 2.82498L13.0419 1.39687L12.897 1.3503L12.4382 2.77841ZM10.5235 6.81599C10.8354 6.23198 11.0777 5.61339 11.244 4.97206L9.79207 4.59542C9.65572 5.12107 9.45698 5.62893 9.20041 6.10924L10.5235 6.81599ZM12.5832 2.82498C12.8896 2.92342 13.1072 3.16009 13.1787 3.43584L14.6306 3.05921C14.4252 2.26719 13.819 1.64648 13.0419 1.39687L12.5832 2.82498ZM11.7197 3.13821C11.7547 3.0032 11.8522 2.87913 11.9998 2.80804L11.3486 1.45675C10.8166 1.71309 10.417 2.18627 10.2678 2.76157L11.7197 3.13821ZM11.9998 2.80804C12.1345 2.74311 12.2931 2.73181 12.4382 2.77841L12.897 1.3503C12.3872 1.18655 11.8312 1.2242 11.3486 1.45675L11.9998 2.80804ZM14.1537 10.9842H19.3348V9.4842H14.1537V10.9842ZM14.7351 5.34269C14.8596 4.58256 14.824 3.80477 14.6306 3.0592L13.1787 3.43584C13.3197 3.97923 13.3456 4.54613 13.2548 5.10016L14.7351 5.34269ZM8.59634 21.25C8.12243 21.25 7.726 20.887 7.68497 20.4125L6.19055 20.5417C6.29851 21.7902 7.34269 22.75 8.59634 22.75V21.25ZM8.62646 9.00585C9.30632 8.42 10.0391 7.72267 10.5235 6.81599L9.20041 6.10924C8.85403 6.75767 8.30249 7.30493 7.64728 7.86954L8.62646 9.00585ZM21.7142 12.313C21.9695 10.8365 20.8341 9.4842 19.3348 9.4842V10.9842C19.9014 10.9842 20.3332 11.4959 20.2361 12.0574L21.7142 12.313ZM12.5921 9.14471C12.4344 10.1076 13.1766 10.9842 14.1537 10.9842V9.4842C14.1038 9.4842 14.0639 9.43901 14.0724 9.38725L12.5921 9.14471ZM6.87281 11.0198C6.84739 10.7258 6.96474 10.4378 7.18772 10.2456L6.20854 9.10933C5.62021 9.61631 5.31148 10.3753 5.37839 11.149L6.87281 11.0198Z" fill="currentColor" /> <path opacity="0.5" d="M3.9716 21.4709L3.22439 21.5355L3.9716 21.4709ZM3 10.2344L3.74721 10.1698C3.71261 9.76962 3.36893 9.46776 2.96767 9.48507C2.5664 9.50239 2.25 9.83274 2.25 10.2344L3 10.2344ZM4.71881 21.4063L3.74721 10.1698L2.25279 10.299L3.22439 21.5355L4.71881 21.4063ZM3.75 21.5129V10.2344H2.25V21.5129H3.75ZM3.22439 21.5355C3.2112 21.383 3.33146 21.2502 3.48671 21.2502V22.7502C4.21268 22.7502 4.78122 22.1281 4.71881 21.4063L3.22439 21.5355ZM3.48671 21.2502C3.63292 21.2502 3.75 21.3686 3.75 21.5129H2.25C2.25 22.1954 2.80289 22.7502 3.48671 22.7502V21.2502Z" fill="currentColor" /> </svg>
                                    <div class="ml-3">Done</div>
                                </div>
                                <div class="whitespace-nowrap rounded-md bg-primary-light py-0.5 px-2 font-semibold dark:bg-[#060818]" >{{ count($doneHomework) }}</div>
                            </button>
                            <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                            <div class="px-1 py-2 text-white-dark">Status</div>
                            <button type="button" class="flex h-10 w-full items-center justify-between rounded-md p-1 font-medium text-info duration-300 hover:bg-white-dark/10 hover:pl-3 dark:hover:bg-[#181F32]" @click="activeTab = 'pending'" :class="activeTab == 'pending' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0 rotate-45 fill-info" >
                                        <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    <div class="ml-3">Pending</div>
                                </div>
                                <div class="whitespace-nowrap rounded-md bg-primary-light py-0.5 px-2 font-semibold dark:bg-[#060818]" >{{ count($pendingHomework) }}</div>
                            </button>
                            <button type="button" class="flex h-10 w-full items-center justify-between rounded-md p-1 font-medium text-info duration-300 hover:bg-white-dark/10 hover:pl-3 dark:hover:bg-[#181F32]" @click="activeTab = 'underProcessing'" :class="activeTab == 'underProcessing' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0 rotate-45 fill-info" >
                                        <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    <div class="ml-3">Under Processing</div>
                                </div>
                                <div class="whitespace-nowrap rounded-md bg-primary-light py-0.5 px-2 font-semibold dark:bg-[#060818]" >{{ count($underProcessingHomework) }}</div>
                            </button>
                            <button type="button" class="flex h-10 w-full items-center justify-between rounded-md p-1 font-medium text-info duration-300 hover:bg-white-dark/10 hover:pl-3 dark:hover:bg-[#181F32]" @click="activeTab = 'inReview'" :class="activeTab == 'inReview' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0 rotate-45 fill-info" >
                                        <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    <div class="ml-3">In Review</div>
                                </div>
                                <div class="whitespace-nowrap rounded-md bg-primary-light py-0.5 px-2 font-semibold dark:bg-[#060818]" >{{ count($inReviewHomework) }}</div>
                            </button>
                            <button type="button" class="flex h-10 w-full items-center justify-between rounded-md p-1 font-medium text-info duration-300 hover:bg-white-dark/10 hover:pl-3 dark:hover:bg-[#181F32]" @click="activeTab = 'rejected'" :class="activeTab == 'rejected' ? 'bg-gray-100 dark:bg-[#181F32] text-blue-500' : ''">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 shrink-0 rotate-45 fill-info" >
                                        <path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                    <div class="ml-3">Rejected</div>
                                </div>
                                <div class="whitespace-nowrap rounded-md bg-primary-light py-0.5 px-2 font-semibold dark:bg-[#060818]" >{{ count($rejectHomework) }}</div>
                            </button>
                        </div>
                    </div>
                    <div class="absolute bottom-0 w-full p-4 left-0">
                        <a href="{{ route('homework') }}" class="btn bg-blue-500 text-white w-full flex border-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 shrink-0 mr-2 inline-block"> <line x1="12" y1="5" x2="12" y2="19"></line> <line x1="5" y1="12" x2="19" y2="12"></line> </svg>
                            Assaign A Homework
                        </a>
                    </div>
                </div>
            </div>
            <div class="overlay absolute z-[5] hidden h-full w-full rounded-md bg-black/60" :class="{ '!block xl:!hidden': isShowTaskMenu }" @click="isShowTaskMenu = !isShowTaskMenu" ></div>
            <div class="panel h-full flex-1 overflow-auto p-0 bg-white">
                <div class="flex h-full flex-col">
                    <div class="flex w-full flex-col gap-4 p-4 sm:flex-row sm:items-center">
                        <div class="flex items-center mr-3">
                            <button type="button" class="block hover:text-primary mr-3 xl:hidden" @click="isShowTaskMenu = !isShowTaskMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                    <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                            </button>
                            <div class="group relative flex-1">
                                <input type="text" class="peer w-full md:w-[250px] h-full bg-gray-100 dark:bg-slate-800 ps-2 py-2 rounded border dark:border-gray-700 focus:outline-none dark:focus:border-blue-500 focus:border" placeholder="Enter Title" wire:model.live.debounce.300ms="search">
                                <div class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary right-[11px]">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4">
                                        <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5"></circle>
                                        <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                    <div x-show="activeTab == 'inbox'" class="table-responsive min-h-[400px] grow overflow-y-auto sm:min-h-[300px]">
                        <table class="table-hover w-full">
                            <tbody>
                                @forelse ($allHomework as $item)
                                    <tr class="group hover:bg-[#F9FAFB] dark:hover:bg-[#121E31] border-b border-b-[#121E31]">
                                        <td class="p-5">
                                            @if (empty($item->student->profile))
                                                <div class="profile w-9 h-9 text-xs">{{ mb_substr(strtoupper($item->student->name), 0, 1) }}
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <img class="w-9 h-9 rounded-full overflow-hidden object-cover ring-2 ring-blue dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none" src="{{ asset('storage/' . $item->student->profile) }}" alt="img" width="150" height="100" />
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-5 pl-0">
                                            <p class="whitespace-nowrap text-base font-semibold group-hover:text-blue-500 line-clamp-1 min-w-[50px] cursor-pointer">
                                                <span>
                                                    <span @click="viewModal = true; $wire.call('viewData','{{ $item->id }}')">{{ Str::limit($item->title, 35, '...') }}</span>
                                                    <span class="ml-2 inline-block whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:bg-blue-500 hover:text-white text-xs border border-blue-500">{{ $item->created_at->diffForHumans() }}</span>
                                                </span>
                                                <button type="button" class="ml-2 whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:text-white text-xs border @if($item->priority == 'urgent') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->priority == 'high') border-yellow-500 text-yellow-500 hover:bg-yellow-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif">{{ $item->priority }}</button>
                                            </p>
                                            <p class="line-clamp-1 min-w-[300px]">{!! Str::limit($item->text, 85, '...') !!}</p>
                                        </td>
                                        <td class="p-5">
                                            <div>
                                                <button type="button" class="whitespace-nowrap px-2 py-[.150rem] rounded-full capitalize hover:text-white border @if($item->status == 'reject') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->status == 'done') border-green-500 text-green-500 hover:bg-green-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif text-xs">{{ $item->status }}</button>
                                            </div>
                                        </td>
                                        <td class="p-5">
                                            <p class="whitespace-nowrap font-medium text-white-dark">{{ date("d-M-Y (g:i A)", strtotime($item->dueDate)) }}</p>
                                        </td>
                                        <td class="p-5">
                                            <div class="flex w-max items-center justify-between">
                                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                    <button type="button" @click="toggle">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90 opacity-70" >
                                                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" ></circle>
                                                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                        </svg>
                                                    </button>
                                                    <template x-if="selectedTab !== 'trash'">
                                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="whitespace-nowrap absolute right-0" >
                                                            <li>
                                                                <button @click="modalOpen = true; $wire.call('ShowUpdateModel','{{ $item->id }}')">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 shrink-0 mr-2" > <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z" stroke="currentColor" stroke-width="1.5" /> <path opacity="0.5" d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428" stroke="currentColor" stroke-width="1.5" /> </svg>
                                                                    Edit
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button wire:click="deleteAlert({{ $item->id }})">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 mr-2"> <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5" ></path> </svg>
                                                                    Delete
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </template>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="20">
                                            <div class="flex justify-center items-center">
                                                <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-3 pt-2">
                            {{ $allHomework->links() }}
                        </div>
                    </div>
                    <div x-show="activeTab == 'done'" class="table-responsive min-h-[400px] grow overflow-y-auto sm:min-h-[300px]">
                        <table class="table-hover w-full">
                            <tbody>
                                @forelse ($doneHomework as $item)
                                    <tr class="group hover:bg-[#F9FAFB] dark:hover:bg-[#121E31] border-b border-b-[#121E31]">
                                        <td class="p-5">
                                            @if (empty($item->student->profile))
                                                <div class="profile w-9 h-9 text-xs">{{ mb_substr(strtoupper($item->student->name), 0, 1) }}
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <img class="w-9 h-9 rounded-full overflow-hidden object-cover ring-2 ring-blue dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none" src="{{ asset('storage/' . $item->student->profile) }}" alt="img" width="150" height="100" />
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-5 pl-0">
                                            <p class="whitespace-nowrap text-base font-semibold group-hover:text-blue-500 line-clamp-1 min-w-[50px] cursor-pointer">
                                                <span>
                                                    <span @click="viewModal = true; $wire.call('viewData','{{ $item->id }}')">{{ Str::limit($item->title, 35, '...') }}</span>
                                                    <span class="ml-2 inline-block whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:bg-blue-500 hover:text-white text-xs border border-blue-500">{{ $item->created_at->diffForHumans() }}</span>
                                                </span>
                                                <button type="button" class="ml-2 whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:text-white text-xs border @if($item->priority == 'urgent') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->priority == 'high') border-yellow-500 text-yellow-500 hover:bg-yellow-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif">{{ $item->priority }}</button>
                                            </p>
                                            <p class="line-clamp-1 min-w-[300px]">{!! Str::limit($item->text, 85, '...') !!}</p>
                                        </td>
                                        <td class="p-5">
                                            <div>
                                                <button type="button" class="whitespace-nowrap px-2 py-[.150rem] rounded-full capitalize hover:text-white border @if($item->status == 'reject') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->status == 'done') border-green-500 text-green-500 hover:bg-green-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif text-xs">{{ $item->status }}</button>
                                            </div>
                                        </td>
                                        <td class="p-5">
                                            <p class="whitespace-nowrap font-medium text-white-dark">{{ date("d-M-Y (g:i A)", strtotime($item->dueDate)) }}</p>
                                        </td>
                                        <td class="p-5">
                                            <div class="flex w-max items-center justify-between">
                                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                    <button type="button" @click="toggle">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90 opacity-70" >
                                                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" ></circle>
                                                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                        </svg>
                                                    </button>
                                                    <template x-if="selectedTab !== 'trash'">
                                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="whitespace-nowrap absolute right-0" >
                                                            <li>
                                                                <button @click="modalOpen = true; $wire.call('ShowUpdateModel','{{ $item->id }}')">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 shrink-0 mr-2" > <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z" stroke="currentColor" stroke-width="1.5" /> <path opacity="0.5" d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428" stroke="currentColor" stroke-width="1.5" /> </svg>
                                                                    Edit
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button wire:click="deleteAlert({{ $item->id }})">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 mr-2"> <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5" ></path> </svg>
                                                                    Delete
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </template>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="20">
                                            <div class="flex justify-center items-center">
                                                <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-3 pt-2">
                            {{ $doneHomework->links() }}
                        </div>
                    </div>
                    <div x-show="activeTab == 'pending'" class="table-responsive min-h-[400px] grow overflow-y-auto sm:min-h-[300px]">
                        <table class="table-hover w-full">
                            <tbody>
                                @forelse ($pendingHomework as $item)
                                    <tr class="group hover:bg-[#F9FAFB] dark:hover:bg-[#121E31] border-b border-b-[#121E31]">
                                        <td class="p-5">
                                            @if (empty($item->student->profile))
                                                <div class="profile w-9 h-9 text-xs">{{ mb_substr(strtoupper($item->student->name), 0, 1) }}
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <img class="w-9 h-9 rounded-full overflow-hidden object-cover ring-2 ring-blue dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none" src="{{ asset('storage/' . $item->student->profile) }}" alt="img" width="150" height="100" />
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-5 pl-0">
                                            <p class="whitespace-nowrap text-base font-semibold group-hover:text-blue-500 line-clamp-1 min-w-[50px] cursor-pointer">
                                                <span>
                                                    <span @click="viewModal = true; $wire.call('viewData','{{ $item->id }}')">{{ Str::limit($item->title, 35, '...') }}</span>
                                                    <span class="ml-2 inline-block whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:bg-blue-500 hover:text-white text-xs border border-blue-500">{{ $item->created_at->diffForHumans() }}</span>
                                                </span>
                                                <button type="button" class="ml-2 whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:text-white text-xs border @if($item->priority == 'urgent') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->priority == 'high') border-yellow-500 text-yellow-500 hover:bg-yellow-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif">{{ $item->priority }}</button>
                                            </p>
                                            <p class="line-clamp-1 min-w-[300px]">{!! Str::limit($item->text, 85, '...') !!}</p>
                                        </td>
                                        <td class="p-5">
                                            <div>
                                                <button type="button" class="whitespace-nowrap px-2 py-[.150rem] rounded-full capitalize hover:text-white border @if($item->status == 'reject') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->status == 'done') border-green-500 text-green-500 hover:bg-green-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif text-xs">{{ $item->status }}</button>
                                            </div>
                                        </td>
                                        <td class="p-5">
                                            <p class="whitespace-nowrap font-medium text-white-dark">{{ date("d-M-Y (g:i A)", strtotime($item->dueDate)) }}</p>
                                        </td>
                                        <td class="p-5">
                                            <div class="flex w-max items-center justify-between">
                                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                    <button type="button" @click="toggle">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90 opacity-70" >
                                                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" ></circle>
                                                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                        </svg>
                                                    </button>
                                                    <template x-if="selectedTab !== 'trash'">
                                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="whitespace-nowrap absolute right-0" >
                                                            <li>
                                                                <button @click="modalOpen = true; $wire.call('ShowUpdateModel','{{ $item->id }}')">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 shrink-0 mr-2" > <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z" stroke="currentColor" stroke-width="1.5" /> <path opacity="0.5" d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428" stroke="currentColor" stroke-width="1.5" /> </svg>
                                                                    Edit
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button wire:click="deleteAlert({{ $item->id }})">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 mr-2"> <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5" ></path> </svg>
                                                                    Delete
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </template>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="20">
                                            <div class="flex justify-center items-center">
                                                <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-3 pt-2">
                            {{ $pendingHomework->links() }}
                        </div>
                    </div>
                    <div x-show="activeTab == 'underProcessing'" class="table-responsive min-h-[400px] grow overflow-y-auto sm:min-h-[300px]">
                        <table class="table-hover w-full">
                            <tbody>
                                @forelse ($underProcessingHomework as $item)
                                    <tr class="group hover:bg-[#F9FAFB] dark:hover:bg-[#121E31] border-b border-b-[#121E31]">
                                        <td class="p-5">
                                            @if (empty($item->student->profile))
                                                <div class="profile w-9 h-9 text-xs">{{ mb_substr(strtoupper($item->student->name), 0, 1) }}
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <img class="w-9 h-9 rounded-full overflow-hidden object-cover ring-2 ring-blue dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none" src="{{ asset('storage/' . $item->student->profile) }}" alt="img" width="150" height="100" />
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-5 pl-0">
                                            <p class="whitespace-nowrap text-base font-semibold group-hover:text-blue-500 line-clamp-1 min-w-[50px] cursor-pointer">
                                                <span>
                                                    <span @click="viewModal = true; $wire.call('viewData','{{ $item->id }}')">{{ Str::limit($item->title, 35, '...') }}</span>
                                                    <span class="ml-2 inline-block whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:bg-blue-500 hover:text-white text-xs border border-blue-500">{{ $item->created_at->diffForHumans() }}</span>
                                                </span>
                                                <button type="button" class="ml-2 whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:text-white text-xs border @if($item->priority == 'urgent') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->priority == 'high') border-yellow-500 text-yellow-500 hover:bg-yellow-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif">{{ $item->priority }}</button>
                                            </p>
                                            <p class="line-clamp-1 min-w-[300px]">{!! Str::limit($item->text, 85, '...') !!}</p>
                                        </td>
                                        <td class="p-5">
                                            <div>
                                                <button type="button" class="whitespace-nowrap px-2 py-[.150rem] rounded-full capitalize hover:text-white border @if($item->status == 'reject') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->status == 'done') border-green-500 text-green-500 hover:bg-green-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif text-xs">{{ $item->status }}</button>
                                            </div>
                                        </td>
                                        <td class="p-5">
                                            <p class="whitespace-nowrap font-medium text-white-dark">{{ date("d-M-Y (g:i A)", strtotime($item->dueDate)) }}</p>
                                        </td>
                                        <td class="p-5">
                                            <div class="flex w-max items-center justify-between">
                                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                    <button type="button" @click="toggle">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90 opacity-70" >
                                                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" ></circle>
                                                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                        </svg>
                                                    </button>
                                                    <template x-if="selectedTab !== 'trash'">
                                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="whitespace-nowrap absolute right-0" >
                                                            <li>
                                                                <button @click="modalOpen = true; $wire.call('ShowUpdateModel','{{ $item->id }}')">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 shrink-0 mr-2" > <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z" stroke="currentColor" stroke-width="1.5" /> <path opacity="0.5" d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428" stroke="currentColor" stroke-width="1.5" /> </svg>
                                                                    Edit
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button wire:click="deleteAlert({{ $item->id }})">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 mr-2"> <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5" ></path> </svg>
                                                                    Delete
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </template>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="20">
                                            <div class="flex justify-center items-center">
                                                <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-3 pt-2">
                            {{ $underProcessingHomework->links() }}
                        </div>
                    </div>
                    <div x-show="activeTab == 'inReview'" class="table-responsive min-h-[400px] grow overflow-y-auto sm:min-h-[300px]">
                        <table class="table-hover w-full">
                            <tbody>
                                @forelse ($inReviewHomework as $item)
                                    <tr class="group hover:bg-[#F9FAFB] dark:hover:bg-[#121E31] border-b border-b-[#121E31]">
                                        <td class="p-5">
                                            @if (empty($item->student->profile))
                                                <div class="profile w-9 h-9 text-xs">{{ mb_substr(strtoupper($item->student->name), 0, 1) }}
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <img class="w-9 h-9 rounded-full overflow-hidden object-cover ring-2 ring-blue dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none" src="{{ asset('storage/' . $item->student->profile) }}" alt="img" width="150" height="100" />
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-5 pl-0">
                                            <p class="whitespace-nowrap text-base font-semibold group-hover:text-blue-500 line-clamp-1 min-w-[50px] cursor-pointer">
                                                <span>
                                                    <span @click="viewModal = true; $wire.call('viewData','{{ $item->id }}')">{{ Str::limit($item->title, 35, '...') }}</span>
                                                    <span class="ml-2 inline-block whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:bg-blue-500 hover:text-white text-xs border border-blue-500">{{ $item->created_at->diffForHumans() }}</span>
                                                </span>
                                                <button type="button" class="ml-2 whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:text-white text-xs border @if($item->priority == 'urgent') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->priority == 'high') border-yellow-500 text-yellow-500 hover:bg-yellow-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif">{{ $item->priority }}</button>
                                            </p>
                                            <p class="line-clamp-1 min-w-[300px]">{!! Str::limit($item->text, 85, '...') !!}</p>
                                        </td>
                                        <td class="p-5">
                                            <div>
                                                <button type="button" class="whitespace-nowrap px-2 py-[.150rem] rounded-full capitalize hover:text-white border @if($item->status == 'reject') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->status == 'done') border-green-500 text-green-500 hover:bg-green-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif text-xs">{{ $item->status }}</button>
                                            </div>
                                        </td>
                                        <td class="p-5">
                                            <p class="whitespace-nowrap font-medium text-white-dark">{{ date("d-M-Y (g:i A)", strtotime($item->dueDate)) }}</p>
                                        </td>
                                        <td class="p-5">
                                            <div class="flex w-max items-center justify-between">
                                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                    <button type="button" @click="toggle">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90 opacity-70" >
                                                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" ></circle>
                                                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                        </svg>
                                                    </button>
                                                    <template x-if="selectedTab !== 'trash'">
                                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="whitespace-nowrap absolute right-0" >
                                                            <li>
                                                                <button @click="modalOpen = true; $wire.call('ShowUpdateModel','{{ $item->id }}')">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 shrink-0 mr-2" > <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z" stroke="currentColor" stroke-width="1.5" /> <path opacity="0.5" d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428" stroke="currentColor" stroke-width="1.5" /> </svg>
                                                                    Edit
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button wire:click="deleteAlert({{ $item->id }})">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 mr-2"> <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5" ></path> </svg>
                                                                    Delete
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </template>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="20">
                                            <div class="flex justify-center items-center">
                                                <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-3 pt-2">
                            {{ $inReviewHomework->links() }}
                        </div>
                    </div>
                    <div x-show="activeTab == 'rejected'" class="table-responsive min-h-[400px] grow overflow-y-auto sm:min-h-[300px]">
                        <table class="table-hover w-full">
                            <tbody>
                                @forelse ($rejectHomework as $item)
                                    <tr class="group hover:bg-[#F9FAFB] dark:hover:bg-[#121E31] border-b border-b-[#121E31]">
                                        <td class="p-5">
                                            @if (empty($item->student->profile))
                                                <div class="profile w-9 h-9 text-xs">{{ mb_substr(strtoupper($item->student->name), 0, 1) }}
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <img class="w-9 h-9 rounded-full overflow-hidden object-cover ring-2 ring-blue dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none" src="{{ asset('storage/' . $item->student->profile) }}" alt="img" width="150" height="100" />
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-5 pl-0">
                                            <p class="whitespace-nowrap text-base font-semibold group-hover:text-blue-500 line-clamp-1 min-w-[50px] cursor-pointer">
                                                <span>
                                                    <span @click="viewModal = true; $wire.call('viewData','{{ $item->id }}')">{{ Str::limit($item->title, 35, '...') }}</span>
                                                    <span class="ml-2 inline-block whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:bg-blue-500 hover:text-white text-xs border border-blue-500">{{ $item->created_at->diffForHumans() }}</span>
                                                </span>
                                                <button type="button" class="ml-2 whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:text-white text-xs border @if($item->priority == 'urgent') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->priority == 'high') border-yellow-500 text-yellow-500 hover:bg-yellow-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif">{{ $item->priority }}</button>
                                            </p>
                                            <p class="line-clamp-1 min-w-[300px]">{!! Str::limit($item->text, 85, '...') !!}</p>
                                        </td>
                                        <td class="p-5">
                                            <div>
                                                <button type="button" class="whitespace-nowrap px-2 py-[.150rem] rounded-full capitalize hover:text-white border @if($item->status == 'reject') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->status == 'done') border-green-500 text-green-500 hover:bg-green-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif text-xs">{{ $item->status }}</button>
                                            </div>
                                        </td>
                                        <td class="p-5">
                                            <p class="whitespace-nowrap font-medium text-white-dark">{{ date("d-M-Y (g:i A)", strtotime($item->dueDate)) }}</p>
                                        </td>
                                        <td class="p-5">
                                            <div class="flex w-max items-center justify-between">
                                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                    <button type="button" @click="toggle">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90 opacity-70" >
                                                            <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                            <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5" ></circle>
                                                            <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                                        </svg>
                                                    </button>
                                                    <template x-if="selectedTab !== 'trash'">
                                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="whitespace-nowrap absolute right-0" >
                                                            <li>
                                                                <button @click="modalOpen = true; $wire.call('ShowUpdateModel','{{ $item->id }}')">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 shrink-0 mr-2" > <path opacity="0.5" d="M4 22H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" /> <path d="M14.6296 2.92142L13.8881 3.66293L7.07106 10.4799C6.60933 10.9416 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.25745 16.2417L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L5.75834 17.7426L8.38334 16.8675L8.3834 16.8675C9.00284 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0583 15.3907 11.5201 14.929L11.5201 14.9289L18.3371 8.11195L19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142Z" stroke="currentColor" stroke-width="1.5" /> <path opacity="0.5" d="M13.8879 3.66406C13.8879 3.66406 13.9806 5.23976 15.3709 6.63008C16.7613 8.0204 18.337 8.11308 18.337 8.11308M5.75821 17.7437L4.25732 16.2428" stroke="currentColor" stroke-width="1.5" /> </svg>
                                                                    Edit
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button wire:click="deleteAlert({{ $item->id }})">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 mr-2"> <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" ></path> <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5" ></path> </svg>
                                                                    Delete
                                                                </button>
                                                            </li>
                                                        </ul>
                                                    </template>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="20">
                                            <div class="flex justify-center items-center">
                                                <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-3 pt-2">
                            {{ $rejectHomework->links() }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- View Homework --}}
            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="viewModal && '!block'">
                <div class="flex items-center justify-center min-h-screen px-4" @click.self="viewModal = false">
                    <div x-show="viewModal" x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                            <h5 class="font-bold text-lg">{{ $singleData->title ?? 'Loading...' }}</h5>
                        </div>
                        <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                            <p>{{ $singleData->text ?? 'Loading...' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Update Homework --}}
            <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="modalOpen && '!block'">
                <div class="flex items-center justify-center min-h-screen px-4" @click.self="modalOpen = false">
                    <div x-show="modalOpen" x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                        <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                            <h5 class="font-bold text-lg">Update</h5>
                        </div>
                        <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                            <form
                                method="post"
                                wire:submit="update"
                                enctype="multipart/form-data"
                            >
                                <div class="my-3 mb-4">
                                    <input type="text" name="title" id="title" wire:model="title" placeholder="Task Title" class="my-input focus:outline-none focus:shadow-outline">
                                    @error('title')
                                        <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="block md:flex justify-between gap-4 mb-3">
                                    <div class="w-full md:w-[50%] mb-2">
                                        <select name="priority" id="priority" wire:model="priority" class="my-input focus:outline-none focus:shadow-outline">
                                            <option value="">Select Priority</option>
                                            <option value="urgent">Urgent</option>
                                            <option value="high">High</option>
                                            <option value="normal">Normal</option>
                                            <option value="low">Low</option>
                                        </select>
                                        @error('priority')
                                            <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full md:w-[50%] mb-2">
                                        <div wire:ignore>
                                            <input type="date" wire:model="dueDate" name="dueDate" id="date" value="{{ old('dueDate') }}" placeholder="Set Dateline" class="my-input focus:outline-none focus:shadow-outline">
                                        </div>
                                        @error('dueDate')
                                            <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <textarea name="text" wire:model="text" id="editor" rows="7" placeholder="Enter Description" class="@error('text') is-invalid @enderror my-input focus:outline-none focus:shadow-outline"></textarea>
                                    @error('text')
                                        <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="flex justify-end items-center mt-8">
                                    <button type="reset" class="shadow btn bg-gray-50 dark:bg-gray-800">Reset</button>
                                    <button type="submit" class="bg-gray-900 text-white btn ml-4" wire:loading.remove>Save</button>
                                    <button type="button" disabled class="bg-gray-900 text-white btn ml-4" wire:loading>Loading</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <script>
            flatpickr("#date", {
                minDate: "today",
                enableTime: true,
                dateFormat: "Y-m-d H:i",
            });
        </script>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('todolist', () => ({
                    selectedTab: '',
                    selectedTask: false,
                    isShowTaskMenu: false,
                    viewTaskModal: false,
                    modalOpen: false,
                    viewModal: false,
                    activeTab: 'inbox',
                    init() {
                        this.$wire.on('swal', () => {
                            this.modalOpen = false;
                        });
                    }
                }));
            });
        </script>
    @endpush
</div>
