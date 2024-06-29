<div class="pt-3">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded">
        <div class="relative h-full">
            <div class="px-4 md:px-5">
                <div class="flex items-center justify-between p-2">
                    <div class="flex items-center space-x-2">
                        <div>
                            <p class="text-xs text-white-dark">#{{ $ticket->ticket_id ?? '-' }} Created by {{ $ticket->student->name ?? '-' }}</p>
                            <p class="font-semibold">{{ $ticket->subject ?? '-' }}</p>
                        </div>
                    </div>
                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                        <button type="button" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#f4f4f4] hover:bg-primary-light hover:text-primary dark:bg-[#1b2e4b]" @click="toggle">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 rotate-90 opacity-70 hover:text-primary">
                                <circle cx="5" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                                <circle cx="19" cy="12" r="2" stroke="currentColor" stroke-width="1.5"></circle>
                            </svg>
                        </button>
                        <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="right-0" style="display: none;">
                            <li>
                                <button wire:click="changeStatus({{ $ticket->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4 shrink-0 mr-1"><path d="M5.46257 4.43262C7.21556 2.91688 9.5007 2 12 2C17.5228 2 22 6.47715 22 12C22 14.1361 21.3302 16.1158 20.1892 17.7406L17 12H20C20 7.58172 16.4183 4 12 4C9.84982 4 7.89777 4.84827 6.46023 6.22842L5.46257 4.43262ZM18.5374 19.5674C16.7844 21.0831 14.4993 22 12 22C6.47715 22 2 17.5228 2 12C2 9.86386 2.66979 7.88416 3.8108 6.25944L7 12H4C4 16.4183 7.58172 20 12 20C14.1502 20 16.1022 19.1517 17.5398 17.7716L18.5374 19.5674Z"></path></svg>
                                    <span>
                                        @if($ticket->status == 'open') Close @else Open @endif
                                    </span>
                                </button>
                            </li>
                            <li>
                                <a href="{{ route('adminTicketindex') }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0 mr-1">
                                        <path d="M2.00098 11.999L16.001 11.999M16.001 11.999L12.501 8.99902M16.001 11.999L12.501 14.999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.5" d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.2429 22 18.8286 22 16.0002 22H15.0002C12.1718 22 10.7576 22 9.87889 21.1213C9.11051 20.3529 9.01406 19.175 9.00195 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                    Back
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                <div class="perfect-scrollbar relative overflow-auto @if($ticket->status == 'open') h-[calc(100vh_-_290px)] md:h-[calc(100vh_-_300px)] @else h-[calc(100vh_-_235px)] @endif no-scrollbar" x-data="scroll()" x-init="scrollToBottom()">
                    <div class="chat-conversation-box min-h-[400px] space-y-5 p-4 pb-[68px] sm:min-h-[300px] sm:pb-0">
                        @forelse($allSmsMessages as $sms)
                            @if($sms->user)
                            <div class="flex items-start gap-3 justify-end mb-4">
                                    <div class="space-y-2">
                                        <div class="rounded-md bg-black/10 p-4 py-2 dark:bg-gray-800 text-right">
                                            {{ $sms->content }}
                                        </div>
                                        <div class="text-xs text-white-dark text-right">{{ $sms->created_at->diffForHumans() }}</div>
                                    </div>
                                    <div class="flex-none">
                                        <img src="{{ empty($sms->user->profile) ? url('profile.jpeg') : asset('storage/' . $sms->user->profile) }}" class="h-10 w-10 rounded-full object-cover">
                                    </div>
                                </div>
                            @elseif($sms->student)
                                <div class="flex items-start gap-3 justify-start mb-4">
                                    <div class="flex-none">
                                        <img src="{{ empty($sms->student->profile) ? url('profile.jpeg') : asset('storage/' . $sms->student->profile) }}" class="h-10 w-10 rounded-full object-cover">
                                    </div>
                                    <div class="space-y-2">
                                        <div class="rounded-md bg-black/10 p-4 py-2 dark:bg-gray-800 text-left">
                                            {{ $sms->content }}
                                        </div>
                                        <div class="text-xs text-white-dark text-left">{{ $sms->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            @endif
                        @empty
                        <div class="flex justify-center items-center h-full">
                            <img src="{{ asset('emptySMS.png') }}" alt="" class="w-[250px] opacity-60 dark:opacity-15 mt-10 select-none">
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            @if($ticket->status == 'open')
                <div class="w-full p-4 bg-blue-500">
                    <div class="w-full items-center space-x-3 space-x-reverse sm:flex">
                        <div class="relative flex-1 h-9 w-full flex">
                            <input id="" class="my-input focus:outline-none focus:shadow-none focus:border-none h-full w-[calc(100%_-_50px)] shadow-none rounded-none placeholder-black text-black" placeholder="Type Your Message" wire:model="message" @keyup.enter="$wire.call('sendMessage')">
                            <button type="button" class="absolute top-1/2 -translate-y-1/2 right-0 z-10 dark:bg-orange-500 bg-orange-500 text-white h-full w-[50px] flex justify-center items-center" @click="$wire.call('sendMessage')">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                    <path d="M17.4975 18.4851L20.6281 9.09373C21.8764 5.34874 22.5006 3.47624 21.5122 2.48782C20.5237 1.49939 18.6511 2.12356 14.906 3.37189L5.57477 6.48218C3.49295 7.1761 2.45203 7.52305 2.13608 8.28637C2.06182 8.46577 2.01692 8.65596 2.00311 8.84963C1.94433 9.67365 2.72018 10.4495 4.27188 12.0011L4.55451 12.2837C4.80921 12.5384 4.93655 12.6658 5.03282 12.8075C5.22269 13.0871 5.33046 13.4143 5.34393 13.7519C5.35076 13.9232 5.32403 14.1013 5.27057 14.4574C5.07488 15.7612 4.97703 16.4131 5.0923 16.9147C5.32205 17.9146 6.09599 18.6995 7.09257 18.9433C7.59255 19.0656 8.24576 18.977 9.5522 18.7997L9.62363 18.79C9.99191 18.74 10.1761 18.715 10.3529 18.7257C10.6738 18.745 10.9838 18.8496 11.251 19.0285C11.3981 19.1271 11.5295 19.2585 11.7923 19.5213L12.0436 19.7725C13.5539 21.2828 14.309 22.0379 15.1101 21.9985C15.3309 21.9877 15.5479 21.9365 15.7503 21.8474C16.4844 21.5244 16.8221 20.5113 17.4975 18.4851Z" stroke="currentColor" stroke-width="1.5"></path>
                                    <path opacity="0.5" d="M6 18L21 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @else
                <div class="w-full p-4 text-center bg-gray-300">
                    <h2 class="font-bold text-xl dark:text-white text-blue-500">Conversation Closed</h2>
                </div>
            @endif
        </div>
    </div>
    @push('js')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('scroll', () => ({
                scroll() {
                    this.$el.scrollTo(0, this.$el.scrollHeight);
                },
                scrollToBottom() {
                    this.scroll();
                    this.$wire.on('swal', () => {
                        this.scroll();
                    });
                }
            }));
        });
    </script>
    @endpush
</div>
