<div class="dropdown" x-data="dropdown" @click.outside="open = false">
    <a href="javascript:;" class="relative block rounded-full bg-white p-2 hover:bg-gray-200 hover:text-blue-500 dark:bg-gray-900 dark:hover:text-white dark:hover:bg-dark/60" @click="toggle">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z" stroke="currentColor" stroke-width="1.5"></path>
            <path d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M12 6V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
        </svg>

        <span class="flex justify-center items-center h-4 w-4 right-0 bg-orange-500 rounded-full p-[2px] text-white text-[10px] absolute top-0">
            {{ count($usersNotice) }}
        </span>
    </a>
    <ul x-show="open" x-transition="" x-transition.duration.300ms="" class="top-11 w-[300px] divide-y !py-0 text-dark -right-2 dark:divide-white/10 dark:text-white-dark sm:w-[350px]" style="display: none;">
        <li>
            <div class="flex items-center justify-between px-4 py-2 font-semibold hover:!bg-transparent">
                <h4 class="text-lg">Notice</h4>
                <span class="bg-blue-500 py-1 px-2 text-white rounded">{{ count($usersNotice) }} New</span>
            </div>
        </li>
        @forelse ($usersNotice as $item)
        <li class="dark:text-white-light/90">
            <div class="group flex items-center px-4 py-2" @click.self="toggle">
                <a class="flex flex-auto pl-3 cursor-pointer" href="{{ route('MsingleNotice', $item->id) }}">
                    <div class="pr-3">
                        <h6>{{ Str::limit($item->notice, 55, '...') }}</h6>
                        <span class="block text-xs font-normal text-orange-500">{{ $item->created_at->diffForHumans() }}</span>
                    </div>
                </a>
            </div>
        </li>
        @empty
        <li>
            <img src="{{ asset('empty.png') }}" alt="" class="w-[40%] mx-auto opacity-40 dark:opacity-15 mt-3 select-none">
        </li>
        @endforelse
        <li>
            <div class="p-4">
                <a href="{{ route('myMNotice') }}" class="btn bg-blue-500 block w-full text-white text-center cursor-pointer select-none">Read All Notice</a>
            </div>
        </li>
    </ul>
</div>
