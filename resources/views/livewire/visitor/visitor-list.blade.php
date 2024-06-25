<div class="pt-5">
    @push('css')
        <style>
            div:where(.swal2-container) h2:where(.swal2-title) {
                line-height: 30px;
            }
        </style>
    @endpush
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-6 pt-6 pb-5 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Visitor List</h2>
        <hr>
        <div class="block md:flex item-center justify-between d px-0 md-px-6 pb-2 pt-2">
            <div class="flex item-center justify-center md:justify-start py-2">
                <h1 class="flex justify-center items-center font-bold">show</h1>
                <div class="dataTable-dropdown ml-[5px]">
                    <label>
                        <select class="width-auto bg-white text-state-950 border-slate-500 border rounded-[6px] pt-[.375rem] pb-[.375rem] pl-[.5rem] pr-[1rem]" wire:model.live="perpage">
                            <option value="10" selected="">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </label>
                </div>
                <h1 class="flex justify-center items-center ml-[5px] font-bold">entries</h1>
            </div>
            <div class="flex items-center mr-0 md:mr-3">
                <div class="group relative flex-1">
                    <input type="text" class="peer w-full h-full bg-gray-100 dark:bg-slate-800 ps-2 py-2 rounded border dark:border-gray-700 focus:outline-none dark:focus:border-blue-500 focus:border" placeholder="Search..." wire:model.live.debounce.300ms="search">
                    <div class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary right-[11px]">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4">
                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5"></circle>
                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{ scrollPosition: 0 }" style="overflow-x: auto; white-space: nowrap;" @wheel.prevent="onWheel"
            x-ref="scrollContainer">

            {{-- Show Data --}}
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Number</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Email</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">CounselPerson</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Status</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Address</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Amount</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Visitor Comment</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Gender</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Reference Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Admission Booth Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Admission Booth Number</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Calling Person</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Comments</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Call Count</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Calling Date</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($visitor as $key => $data)
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $visitor->firstItem() + $key }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->mobile ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->email ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->course->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->councile->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                <span class="@if($data->status == 'Admitted') text-green-500 @endif">{{ $data->status ?? '-' }}</span>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->address ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->amount ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->visitor_comment ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->gender ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->ref_name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->admissionBooth->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->admissionBooth->number ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->callingperson->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->comments }}
                            </td>

                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                <div class="flex justify-center items-center">
                                    <label class="w-12 h-6 relative">
                                        <button wire:click="callcount({{ $data->id }})" for="text"
                                            type="button"
                                            class="text-white bg-blue-500 rounded-full text-sm px-3 py-1 me-2 mb-2"><span
                                                class="h-14 py-1 me-2 mb-2 mr-3"> + </span> <span>
                                                {{ $data->call_count ?? '0' }}</span>
                                        </button>
                                    </label>
                                </div>
                            </td>

                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center" x-data="callingDate">
                                <div class="flex gap-3 justify-center">
                                    <button @click="showCallDate = 1" type="button" class="whitespace-nowrap px-3 py-2 capitalize text-black dark:text-white border text-xs">
                                        Details
                                    </button>
                                    <button @click="showCallDate = 0" x-show="showCallDate == 1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-minus" fill="none" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" height="24" width="24"><path d="M0 0h24v24H0z" fill="none" stroke="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M9 12l6 0"></path></svg>
                                    </button>
                                </div>
                                <ul x-show="showCallDate == 1" x-transition.duration.500ms class="mt-2">
                                    @php $arrayCallingDate = explode(",",$data->calling_date) @endphp
                                    @foreach ($arrayCallingDate as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td class=" p-3 border-b border-[#ebedf2] dark:border-[#191e3a]">
                                <div class="text-center flex justify-center items-center">
                                    {{-- Edit Button --}}
                                    <a href="{{ route('updateVisitor', $data->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-pencil text-green-500">
                                            <path class="text-green-500" stroke="none" d="M0 0h24v24H0z"
                                                fill="none" />
                                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                            <path d="M13.5 6.5l4 4" />
                                        </svg>
                                    </a>

                                    {{-- Delete Button --}}
                                    <button wire:click="deleteAlert({{ $data->id }})" type="button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-red-500">
                                            <path class="text-red-500" stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path class="text-red-500" d="M10 11l0 6" />
                                            <path class="text-red-500" d="M14 11l0 6" />
                                            <path class="text-red-500"
                                                d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path class="text-red-500" d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
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
        </div>
        <div class="livewire-pagination mt-5">{{ $visitor->links() }}</div>
    </div>

    @push('js')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('callingDate', () => ({
                    showCallDate: 0,
                }));
            })
        </script>
        <script>
            function onWheel(event) {
                const delta = Math.sign(event.deltaY || event.wheelDelta);
                const scrollContainer = event.currentTarget;
                const scrollLeft = scrollContainer.scrollLeft;

                // Calculate the new scroll position
                const newScrollLeft = scrollLeft + delta * 300;

                // Update the scroll position
                scrollContainer.scrollLeft = newScrollLeft;
            }
        </script>

        {{-- Alert msg --}}
        <script>
            window.addEventListener('swal', event => {
                const eventData = event.detail[0]; // Accessing the first element of the array
                if (eventData && eventData.title && eventData.type) {
                    Swal.fire({
                        icon: eventData.type,
                        title: eventData.title,
                        showConfirmButton: false,
                        timer: 1500,
                    });
                } else {
                    console.error('Invalid event data format:', eventData);
                }
            });
        </script>
        <script>
            window.addEventListener('confirmaddAlert', event => {
                Swal.fire({
                    title: "Are you sure to add this call in count?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Add"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('addConfirm');
                    }
                });
            });
            window.addEventListener('callAddSuccessfull', event => {
                const eventData = event.detail[0]; // Accessing the first element of the array
                if (eventData && eventData.title && eventData.type) {
                    Swal.fire({
                        icon: eventData.type,
                        title: eventData.title,
                        showConfirmButton: false,
                        timer: 1500
                    });
                } else {
                    console.error('Invalid event data format:', eventData);
                }
            });
        </script>
    @endpush
</div>
