<div class="pt-5" x-data="modal">

    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="{{ asset('frontend/css/monthSelect-flatpickr.css') }}">
        <style>
            input[type="date"]::-webkit-inner-spin-button,
            input[type="date"]::-webkit-calendar-picker-indicator {
                display: none;
                -webkit-appearance: none;
                user-select: none;
            }
            .flatpickr-wrapper{
                width: 100%;
            }
        </style>
    @endpush

    {{-- Insert Button --}}
    <div class="mb-3">
        <button @click="toggle; $wire.call('showModal')" class="bg-blue-500 btn text-white border-0 flex items-center justify-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Target
        </button>
    </div>

    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Sales Targets</h2>
        <hr>
        <div>
            {{-- Show Data --}}
            <div class="overflow-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center text-nowrap">Sales Target</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Month</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($selesTarget as $key => $data)
                            <tr>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $i++ }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->target }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    <div class="relative">
                                        <span class="inline-block mr-1">{{ date("F-Y", strtotime($data->date ?? '-')) }}</span>
                                        @if (date('Y-m') == date('Y-m', strtotime($data->date)))
                                            <span class="animate-ping absolute inline-flex h-[20px] w-[20px] rounded-full bg-sky-400 opacity-75 ml-[-3px] mt-[-3px]"></span>
                                            <span class="relative inline-block rounded-full h-3 w-3 bg-blue-500"></span>
                                        @endif
                                    </div>
                                </td>

                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">

                                    {{-- Edit Button --}}
                                    <button type="button" x-tooltip="Edit" @click="open = true; $wire.call('ShowUpdateModel','{{ $data->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-pencil text-green-500">
                                            <path class="text-green-500" stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                            <path d="M13.5 6.5l4 4" />
                                        </svg>
                                    </button>

                                    {{-- Delete Button --}}
                                    <button wire:click="deleteAlert({{ $data->id }})" type="button" x-tooltip="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-red-500">
                                            <path class="text-red-500" stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path class="text-red-500" d="M10 11l0 6" />
                                            <path class="text-red-500" d="M14 11l0 6" />
                                            <path class="text-red-500" d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path class="text-red-500" d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
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

    {{-- Update & Instert Form --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg w-full max-w-lg my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    @if (!empty($update_id))
                        <h5 class="font-bold text-lg">Update</h5>
                    @else
                        <h5 class="font-bold text-lg">Add Sale Target</h5>
                    @endif
                </div>
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                    <form method="post"
                        @if (!empty($update_id))
                            wire:submit="update"
                        @else
                            wire:submit="insert"
                        @endif
                    >
                        <div class="mb-1">
                            <label for="target" class="my-label">Target</label>
                            <input type="number" wire:model="target" placeholder="Sales Target" id="target"
                                class="my-input focus:outline-none focus:shadow-outline">
                            @if ($errors->has('target'))
                                <div class="text-red-500">{{ $errors->first('target') }}</div>
                            @endif
                        </div>
                        <div class="mb-1"x-data
                        x-init="
                          flatpickr($refs.dateInput, {
                            static: true,
                            altInput: true,
                            plugins: [new monthSelectPlugin({shorthand: false, dateFormat: 'Y-m-d', defaultDate: ['{{ $date }}']})]
                          })
                        ">
                            <div wire:ignore>
                                <label for="date" class="my-label">Select Month</label>
                                <input x-ref="dateInput" type="date" wire:model="date" placeholder="Select Month" id="date" name="date" class="my-input w-full focus:outline-none focus:shadow-outline" id="date">
                            </div>
                            @if ($errors->has('date'))
                                <div class="text-red-500">{{ $errors->first('date') }}</div>
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
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('frontend/js/flatpickr-monthSelect.js') }}"></script>
    @endpush
</div>
