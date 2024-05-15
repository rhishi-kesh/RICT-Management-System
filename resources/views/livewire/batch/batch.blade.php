<div class="pt-5" x-data="modal">
    @push('css')
        <link rel="stylesheet" href="{{ asset('frontend/css/nice-select2.css') }}">
        <style>
            .nice-select{
                width: 99%;
            }
            .nice-select-dropdown{
                width: 100%;
            }
            .nice-select .list li{
                color: #000;
            }
            .nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus {
                background-color: transparent;
            }
            .nice-select .option.selected {
                font-weight: bold;
                background-color: #ececec !important;
            }
        </style>
    @endpush

    {{-- Insert Button --}}
    <div class="mb-3">
        <button @click="toggle" class="bg-blue-500 btn text-white border-0 flex items-center justify-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Batch
        </button>
    </div>

    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Batchs</h2>
        <div class="w-full">
            {{-- Show Data --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
                @forelse ($batch as $key => $data)
                    <div class="max-w-[24rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5 pb-0 pr-2">
                        <div class="flex justify-between mb-5 gap-2">
                            @if($showUpdateInput === $key)
                                <div class="w-full">
                                    <input type="text" wire:model="name" placeholder="Name" id="Name" class="my-input focus:outline-none focus:shadow-outline">
                                    @if ($errors->has('name'))
                                        <div class="text-red-500">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            @else
                                <h6 class="text-[#0e1726] dark:text-white text-xl">{{ $data->name }}</h6>
                            @endif
                            <div class="flex justify-end items-center gap-2">
                                @if($showUpdateInput === $key)
                                    <div>
                                        <button wire:click="removeUpdate" class="mt-2">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-circle-minus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l6 0" /></svg>
                                        </button>
                                    </div>
                                @else
                                    <div>
                                        <button wire:click="asignMentor({{ $data->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6 dark:hover:text-white hover:text-[#595d66] transition delay-150 hover:rotate-[359deg]" fill="currentColor"><path d="M8 4C8 5.10457 7.10457 6 6 6 4.89543 6 4 5.10457 4 4 4 2.89543 4.89543 2 6 2 7.10457 2 8 2.89543 8 4ZM5 16V22H3V10C3 8.34315 4.34315 7 6 7 6.82059 7 7.56423 7.32946 8.10585 7.86333L10.4803 10.1057 12.7931 7.79289 14.2073 9.20711 10.5201 12.8943 9 11.4587V22H7V16H5ZM6 9C5.44772 9 5 9.44772 5 10V14H7V10C7 9.44772 6.55228 9 6 9ZM19 5H10V3H20C20.5523 3 21 3.44772 21 4V15C21 15.5523 20.5523 16 20 16H16.5758L19.3993 22H17.1889L14.3654 16H10V14H19V5Z"></path></svg>
                                        </button>
                                    </div>
                                    <div>
                                        <button type="button" wire:click="singleBatch({{ $data->id }})">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  class="w-6 h-6 dark:hover:text-white hover:text-[#595d66] transition delay-150 hover:rotate-[359deg] mt-[2px]" viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-school"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" /><path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" /></svg>
                                        </button>
                                    </div>
                                @endif
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    @if($showUpdateInput === $key)
                                        <button type="button" wire:click="updateBatch" class="bg-gray-900 text-white btn ltr:ml-4 rtl:mr-4">Save</button>
                                    @else
                                        <button type="button" class="text-primary" @click="toggle">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 rotate-90 opacity-70 hover:opacity-100">
                                                <circle cx="5" cy="12" r="2" stroke="currentColor"
                                                    stroke-width="1.5"></circle>
                                                <circle opacity="0.5" cx="12" cy="12" r="2" stroke="currentColor"
                                                    stroke-width="1.5"></circle>
                                                <circle cx="19" cy="12" r="2" stroke="currentColor"
                                                    stroke-width="1.5"></circle>
                                            </svg>
                                        </button>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms class="text-sm font-medium">
                                            <li>
                                                <button class="w-full" wire:click="editBatch({{ $key }}, {{ $data->id }})">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        class="h-4 w-4 shrink-0 mr-2">
                                                        <path
                                                            d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                        <path opacity="0.5"
                                                            d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                                            stroke="currentColor" stroke-width="1.5" />
                                                    </svg>
                                                    Edit
                                                </button>
                                            </li>
                                            <li>
                                                <button class="w-full" wire:click="deleteAlert({{ $data->id }})">
                                                    <svg width="24" height="24" class="mr-2" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg" <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                                        </path> <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path> <path opacity="0.5" d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6" stroke="currentColor" stroke-width="1.5"></path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </li>
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end -space-x-1  rtl:space-x-reverse mb-5 select-none">
                            @foreach ($data->students as $data2)
                                @if (empty($data2->profile))
                                    <div class="profile w-7 h-7 text-xs">{{ mb_substr(strtoupper($data2->name), 0, 1) }}</div>
                                @else
                                    <img class="w-7 h-7 rounded-full overflow-hidden object-cover ring-2 ring-white dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none"
                                        src="{{ asset('storage/' . $data2->profile) }}" alt="image" />
                                @endif
                            @endforeach
                            <span class="bg-white rounded-full px-2 py-1 text-primary text-xs shadow-[0_0_20px_0_#d0d0d0] dark:shadow-none dark:bg-[#0e1726] dark:text-white">({{ $data->students_count }})Total</span>
                        </div>
                    </div>
                @empty
                    <div></div>
                    <div class="w-full">
                        <div class="flex justify-center items-center">
                            <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="livewire-pagination mt-5">{{ $batch->links() }}</div>
        </div>
    </div>

    {{-- Instert Form --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    <h5 class="font-bold text-lg">Add Batch</h5>
                </div>
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                    <form method="post" wire:submit="insert">
                        <div class="mb-1">
                            <label for="Name" class="my-label">Name</label>
                            <input type="text" wire:model="name" placeholder="Name" id="Name"
                                class="my-input focus:outline-none focus:shadow-outline">
                            @if ($errors->has('name'))
                                <div class="text-red-500">{{ $errors->first('name') }}</div>
                            @endif
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

    {{-- Student-under-Batch --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] @if ($isBatch) @else hidden @endif overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg w-full md:max-w-4xl my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    <h5 class="font-bold text-lg">{{ $singlebatch->name ?? '-' }}</h5>
                    <div class="flex justify-end items-center">
                        <button wire:click="removebatch()" type="button" class="shadow btn bg-gray-50 dark:bg-gray-800">Back</button>
                    </div>
                </div>
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                    <div x-data="{ show: false }">
                        <button class="bg-green-500 btn text-white border-0 ms-3 mb-5" @click="show = !show" x-show="!show">
                            Add Student
                        </button>
                        <div class="w-full flex justify-start gap-5 mb-5" x-show="show">
                            <div wire:ignore class="w-4/6 md:w-3/6">
                                <select id="addToBatch" wire:model="addToBatch" class="my-input focus:outline-none focus:shadow-outline p-0" name="addToBatch[]" multiple>
                                    @foreach ($this->studentWithoutBatch as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}({{ $data->student_id }})</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('addToBatch'))
                                    <div class="text-red-500">{{ $errors->first('addToBatch') }}</div>
                                @endif
                            </div>
                            <div class="w-1/6 flex justify-start items-end">
                                <button wire:click="addStudent({{ $singlebatch->id ?? '' }})" class="bg-green-500 btn text-white border-0 mb-[0.15rem]">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Student ID</th>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Profile</th>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course</th>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp
                                @forelse ($singlebatch->students ?? [] as $data)
                                    <tr>
                                        <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                            {{ $i++ }}
                                        </td>
                                        <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                            {{ $data->student_id }}
                                        </td>
                                        <td class="p-3 mt-2 border-b border-[#ebedf2] dark:border-[#191e3a] d-flex justify-center" style="display: flex">
                                            @if (empty($data->profile))
                                                <div class="profile w-7 h-7 text-xs">{{ mb_substr(strtoupper($data->name), 0, 1) }}
                                                </div>
                                            @else
                                                <div class="text-center">
                                                    <img class="w-7 h-7 rounded-full overflow-hidden object-cover ring-2 ring-white dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none"
                                                        src="{{ asset('storage/' . $data->profile) }}" alt="image" />
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                            {{ $data->name }}</td>
                                        <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                            {{ $data->course->name ?? '-' }}</td>
                                        <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                            {{-- Edit Button --}}
                                            <button wire:click="removeStudentAlert({{ $data->id }})"
                                                class="bg-red-500 btn text-white border-0">
                                                Remove
                                            </button>
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
                </div>
            </div>
        </div>
    </div>

    {{-- Teacher-under-Batch --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] @if ($isMentorModal) @else hidden @endif overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg w-full md:max-w-4xl my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    <h5 class="font-bold text-lg">{{ $batchMentor->name ?? '-' }}</h5>
                    <div class="flex justify-end items-center">
                        <button wire:click="removeMentorMOdal()" type="button" class="shadow btn bg-gray-50 dark:bg-gray-800">Back</button>
                    </div>
                </div>
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                    <div x-data="{ show: false }">
                        <button class="bg-green-500 btn text-white border-0 ms-3 mb-5" @click="show = !show" x-show="!show">
                            Add Mentor
                        </button>
                        <div class="w-full flex justify-start gap-5 mb-5" x-show="show">
                            <div class="w-4/6 md:w-3/6">
                                <select id="mentor" wire:model="mentor" class="my-input focus:outline-none focus:shadow-outline" name="mentor">
                                    <option value="">Select Mentor</option>
                                    @foreach ($mentors as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('mentor'))
                                    <div class="text-red-500">{{ $errors->first('mentor') }}</div>
                                @endif
                            </div>
                            <div class="w-1/6 flex justify-start items-end">
                                <button wire:click="addMentor({{ $batchMentor->id ?? '' }})" class="bg-green-500 btn text-white border-0 mb-[0.15rem]">
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-auto">
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Profile</th>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                                    <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($batchMentor->mentors) && $batchMentor->mentors->count() > 0)
                                    @foreach($batchMentor->mentors as $item)
                                        <tr>
                                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                                1
                                            </td>
                                            <td class="p-3 mt-2 border-b border-[#ebedf2] dark:border-[#191e3a] d-flex justify-center" style="display: flex">
                                                @if (empty($item->image))
                                                    <div class="profile w-7 h-7 text-xs">{{ mb_substr(strtoupper($item->name), 0, 1) }}
                                                    </div>
                                                @else
                                                    <div class="text-center">
                                                        <img class="w-7 h-7 rounded-full overflow-hidden object-cover ring-2 ring-white dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none" src="{{ asset('storage/' . $item->image) }}" alt="image" />
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center" >
                                                {{ $item->name ?? '-' }}
                                            </td>
                                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                                <button class="bg-red-500 btn text-white border-0" wire:click="removeMentorAlert({{ $batchMentor->id }})">
                                                    Remove
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="20">
                                            <div class="flex justify-center items-center">
                                                <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        {{-- remove Batch Alert --}}
        <script>
            window.addEventListener('confirmBatchDeleteAlert', event => {
                const eventDataBatch = event.detail[0];
                // console.log(eventDataBatch.okBtn);
                if (eventDataBatch && eventDataBatch.title && eventDataBatch.type) {
                    Swal.fire({
                        icon: eventDataBatch.type,
                        title: eventDataBatch.title,
                        showConfirmButton: eventDataBatch.okBtn,
                        text: eventDataBatch.text,
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, Delete"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('deleteConfirm');
                        }
                    });
                } else {
                    console.error('Invalid event data format:', eventDataBatch);
                }
            });

            window.addEventListener('deleteBatchSuccessFull', event => {
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

        {{-- remove Student Alert --}}
        <script>
            window.addEventListener('removeStudentAlert', event => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Student Will Removed Form This Batch",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Remove"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('removeConfirm');
                    }
                });
            });

            window.addEventListener('deleteSuccessFull', event => {
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

        {{-- remove Mentor Alert --}}
        <script>
            window.addEventListener('removeMentorAlert', event => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "Mentor Will Removed Form This Batch",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Remove"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('removeMentorConfirm');
                    }
                });
            });

            window.addEventListener('deleteMentorSuccessFull', event => {
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

        {{-- Add Student Form --}}
        <script src="{{ asset('frontend/js/nice-select2.js') }}"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function(e) {
                // seachable
                var options = {
                    searchable: true,
                    placeholder: 'Select Students'
                };
                var instance = NiceSelect.bind(document.getElementById("addToBatch"), options);
                window.addEventListener('clearInput', event => {
                    let selectedDiv = document.querySelector('.multiple-options');
                    let selected = document.querySelectorAll('.nice-select-dropdown .list .selected');
                    selected.forEach(item => {
                        item.remove();
                    });
                    selectedDiv.innerHTML = 'Select Students';

                    let select = document.getElementById('addToBatch');
                    let options = select.getElementsByTagName('option');
                    var selectedOptions = [];
                    for (var i = 0; i < options.length; i++) {
                        if (options[i].selected) {
                            selectedOptions.push(options[i]);
                        }
                    }
                    selectedOptions.forEach(item => {
                        item.remove();
                    });

                    instance.clear();
                    instance.update();

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
            });
        </script>
    @endpush
</div>
