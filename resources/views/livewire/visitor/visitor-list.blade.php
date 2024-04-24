<div class="pt-5">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-6 pt-6 pb-5 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Visitor List</h2>
        <hr>
        <div class="flex item-center justify-between d px-6 pb-2 pt-2">
            <div class="flex item-center py-2">
                <h1 class="flex justify-center items-center font-bold">show</h1>
                <div class="dataTable-dropdown ml-[5px]">
                    <label>
                        <select
                            class="width-auto bg-white text-state-950 border-slate-500 border rounded-[6px] pt-[.375rem] pb-[.375rem] pl-[.5rem] pr-[1rem]"
                            wire:model.live="perpage">
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
            <div class="flex items-center" x-data="{ search: false }" @click.outside="search = false">
                <form
                    class="absolute inset-x-0 top-1/2 z-10 mx-4 hidden -translate-y-1/2 sm:relative sm:top-0 sm:mx-0 sm:block sm:translate-y-0"
                    :class="{ '!block': search }">
                    <div class="relative">
                        <input wire:model.live.debounce.1000ms="search" type="text"
                            class="peer w-full h-full bg-gray-100 dark:bg-slate-800 ps-10 py-2 rounded border dark:border-gray-700 focus:outline-none dark:focus:border-blue-500 focus:border"
                            placeholder="Search..." />
                        <button type="button"
                            class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-blue-500 ltr:right-auto rtl:left-auto">
                            <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5"
                                    opacity="0.5" />
                                <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                        </button>
                        <button type="button"
                            class="absolute top-1/2 block -translate-y-1/2 hover:opacity-80 ltr:right-2 rtl:left-2 sm:hidden"
                            @click="search = false">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="1.5" />
                                <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                </form>
                <button type="button"
                    class="search_btn rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden"
                    @click="search = ! search">
                    <svg class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]" width="20" height="20"
                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5"
                            opacity="0.5" />
                        <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>
        <div x-data="{ scrollPosition: 0 }" style="overflow-x: auto; white-space: nowrap;" @wheel.prevent="onWheel"
            x-ref="scrollContainer">

            {{-- Show Data --}}
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Counseling</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Status</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Number</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Email</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course Name</th>
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
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visitor as $key => $data)
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $visitor->firstItem() + $key }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->councile->name }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->status }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->name }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->mobile }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->email }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->course->name }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->address }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->amount }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->visitor_comment }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->gender }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->ref_name }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->admissionBooth->name }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->admissionBooth->number }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->callingperson->name ?? '-' }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->comments }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $data->Call }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{-- Edit Button --}}

                                <button wire:click="ShowUpdateModel({{ $data->id }})" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pencil text-green-500">
                                        <path class="text-green-500" stroke="none" d="M0 0h24v24H0z"
                                            fill="none" />
                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                        <path d="M13.5 6.5l4 4" />
                                    </svg>
                                </button>

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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="livewire-pagination mt-5">{{ $visitor->links() }}</div>
        </div>
    </div>

    {{-- Update & Instert Form --}}

    <div
        class="fixed inset-0 bg-[black]/60 z-[999] @if ($isModal) @else hidden @endif overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-transition x-transition.duration.300
                class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-2x my-8">
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                
                    <form wire:submit="submit"
                        class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
                        <h2 class="mb-2 font-bold text-3xl dark:text-white">Update Visitor</h2>
                        <hr>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">

                            <div class="mb-1" wire:ignore>
                                <label for="counseling" class="my-label">Counseling</label>
                                <select id="counseling" wire:model="counseling"
                                    class="my-input focus:outline-none focus:shadow-outline" name="counseling">
                                    @foreach ($councile as $items)
                                    <option value="{{ $items->id }}" @if($items->id == $counseling) selected @else '' @endif> 
                                     {{ $items->name }}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('counseling'))
                                    <div class="text-red-500">{{ $errors->first('counseling') }}</div>
                                @endif
                            </div>
                            <div class="mb-1" wire:ignore>
                                <label for="status" class="my-label">Status</label>
                                <select id="status" wire:model="status"
                                    class="my-input focus:outline-none focus:shadow-outline" name="status[]">
                                    <option value="Admitted">Admitted</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Not Admitted">Not Admitted</option>
                                    <option value="Cancel">Cancel</option>
                                </select>
                                @if ($errors->has('status'))
                                    <div class="text-red-500">{{ $errors->first('status') }}</div>
                                @endif
                            </div>

                            <div class="mb-1">
                                <label for="name" class="my-label">Name</label>
                                <input type="text" wire:model="name" placeholder="Name" id="name"
                                    name="name" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('name'))
                                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="mb-1">
                                <label for="mobile" class="my-label">Mobile Number</label>
                                <input type="text" wire:model="mobile" placeholder="Mobile Number" id="mobile"
                                    name="mobile" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('mobile'))
                                    <div class="text-red-500">{{ $errors->first('mobile') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="Email" class="my-label">Email</label>
                                <input type="text" wire:model="email" placeholder="Email" id="Email"
                                    name="email" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('email'))
                                    <div class="text-red-500">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                           
                            <div class="mb-1">
                                <label for="course_name" class="my-label">Course Name</label>
                                <select name="course_name" wire:model.live="course_name" id="course_name" class="my-input focus:outline-none focus:shadow-outline">
                                    <option value="">Select Course</option>
                                    @foreach ($course as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $course_name) selected @else '' @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('course_name'))
                                    <div class="text-red-500">{{ $errors->first('course_name') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="Address" class="my-label">Address</label>
                                <input type="text" wire:model="address" placeholder="Address" id="Address"
                                    name="address" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('address'))
                                    <div class="text-red-500">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="amount" class="my-label">Total Amount</label>
                                <input type="text" wire:model="amount" placeholder="Total Amount" id="amount"
                                    name="amount" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('amount'))
                                    <div class="text-red-500">{{ $errors->first('amount') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="visitor_comment" class="my-label">Visitor Comment</label>
                                <input type="text" wire:model="visitor_comment" placeholder="visitor_comment"
                                    id="visitor_comment" name="visitor_comment"
                                    class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('visitor_comment'))
                                    <div class="text-red-500">{{ $errors->first('visitor_comment') }}</div>
                                @endif
                            </div>

                            <div class="mb-1">
                                <label for="gender" class="my-label">Gender</label>
                                <div class="flex">
                                    <div class="flex items-center me-4">
                                        <input wire:model="selectedOption" id="inline-radio" type="radio"
                                            value="male" name="inline-radio-group"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-radio"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male
                                        </label>
                                    </div>
                                    <div class="flex items-center me-4">
                                        <input wire:model="selectedOption" id="inline-2-radio" type="radio"
                                            value="female" name="inline-radio-group"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-2-radio"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                                    </div>
                                    <div class="flex items-center me-4">
                                        <input wire:model="selectedOption" id="inline-checked-radio" type="radio"
                                            value="Others" name="inline-radio-group"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="inline-checked-radio"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Others</label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1">
                                <label for="ref_name" class="my-label">Reference name</label>
                                <input type="text" wire:model="ref_name" placeholder="ref_name" id="ref_name"
                                    name="ref_name" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('ref_name'))
                                    <div class="text-red-500">{{ $errors->first('ref_name') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="admission_booth_name" class="my-label">Admission Booth Name</label>
                                <select name="admission_booth_name" wire:model.live="admission_booth_name"
                                    id="admission_booth_name"
                                    class="my-input focus:outline-none focus:shadow-outline">
                                    <option value="">Select Course</option>
                                    @foreach ($admissionBooth as $booth)
                                        <option value="{{ $booth->id }}" @if ( $booth->id == $admission_booth_name) selected @else '' @endif >{{ $booth->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('admission_booth_name'))
                                    <div class="text-red-500">{{ $errors->first('admission_booth_name') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="admission_booth_number" class="my-label">Admission Booth
                                    Number</label>
                                <input type="text" wire:model="admission_booth_number"
                                    placeholder="Guardian Mobile No." id="admission_booth_number"
                                    name="admission_booth_number"
                                    class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('admission_booth_number'))
                                    <div class="text-red-500">{{ $errors->first('admission_booth_number') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="calling_person" class="my-label">Calling Person</label>
                                <select name="calling_person" wire:model.live="calling_person" id="calling_person"
                                    class="my-input focus:outline-none focus:shadow-outline">
                                    <option> Select person</option>
                                    @foreach ($callingperson as $callingperson)
                                    <option value="{{ $callingperson->id }}" @if($callingperson->id == $counseling) selected @else '' @endif> 
                                     {{ $callingperson->name }}</option>
                                    @endforeach

                                </select>
                                @if ($errors->has('calling_person'))
                                    <div class="text-red-500">{{ $errors->first('calling_person') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="commentscomments" class="my-label">Comments</label>
                                <input type="text" wire:model="comments" placeholder="Guardian Mobile No."
                                    id="comments" name="comments"
                                    class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('comments'))
                                    <div class="text-red-500">{{ $errors->first('comments') }}</div>
                                @endif
                            </div>
                            <br><br> 
                            <div class="flex  items-center mt-8 mb-1">
                                <button wire:click="removeModal" type="button"
                                    class="shadow btn bg-gray-50 dark:bg-gray-800">Discard</button>
                                <button type="submit"
                                    class="bg-gray-900 text-white btn ltr:ml-4 rtl:mr-4">Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @push('js')
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
    @endpush

</div>
