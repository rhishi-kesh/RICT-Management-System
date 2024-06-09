<div class="pt-5">
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
    <form wire:submit="genarate" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Download Student</h2>
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-5 gap-4 mt-3">
            <div class="mb-1">
                <div wire:ignore>
                    <label for="startDate" class="my-label">Start Date</label>
                    <input type="date" wire:model="startDate" placeholder="Start Date" id="startDate" name="startDate" class="my-input focus:outline-none focus:shadow-outline" id="startDate">
                </div>
                @if ($errors->has('startDate'))
                    <div class="text-red-500">{{ $errors->first('startDate') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <div wire:ignore>
                    <label for="endDate" class="my-label">End Date</label>
                    <input type="date" wire:model="endDate" placeholder="End Date" id="endDate" name="endDate" class="my-input focus:outline-none focus:shadow-outline" id="endDate">
                </div>
                @if ($errors->has('endDate'))
                    <div class="text-red-500">{{ $errors->first('endDate') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="batchId" class="my-label">Batch</label>
                <select name="batchId" wire:model="batchId" id="batchId" class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select Batch</option>
                    @foreach ($batch as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('batchId'))
                    <div class="text-red-500">{{ $errors->first('batchId') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="courseID" class="my-label">Course</label>
                <select name="courseID" wire:model="courseID" id="courseID" class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select Batch</option>
                    @foreach ($course as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('courseID'))
                    <div class="text-red-500">{{ $errors->first('courseID') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="gender" class="my-label">Gender</label>
                <select name="gender" wire:model="gender" id="gender" class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @if ($errors->has('gender'))
                    <div class="text-red-500">{{ $errors->first('gender') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="paymentType" class="my-label">Payment Type</label>
                <select name="paymentType" wire:model="paymentType" id="paymentType" class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select Batch</option>
                    @foreach ($paymentTypes as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('paymentType'))
                    <div class="text-red-500">{{ $errors->first('paymentType') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="admissionFee" class="my-label">Admission Fee</label>
                <select name="admissionFee" wire:model="admissionFee" id="admissionFee" class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
                @if ($errors->has('admissionFee'))
                    <div class="text-red-500">{{ $errors->first('admissionFee') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="certificate" class="my-label">Certificate</label>
                <select name="certificate" wire:model="certificate" id="certificate" class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                @if ($errors->has('certificate'))
                    <div class="text-red-500">{{ $errors->first('certificate') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="status" class="my-label">Student Status</label>
                <select name="status" wire:model="status" id="status" class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select Status</option>
                    <option value="running">Running</option>
                    <option value="cancel">Cancel</option>
                    <option value="pending">Pending</option>
                    <option value="complete">Complete</option>
                </select>
                @if ($errors->has('status'))
                    <div class="text-red-500">{{ $errors->first('status') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="admission" class="my-label">Admission</label>
                <select name="admission" wire:model="admission" id="admission" class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select</option>
                    <option value="1">Website</option>
                    <option value="0">Physical</option>
                </select>
                @if ($errors->has('admission'))
                    <div class="text-red-500">{{ $errors->first('admission') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <button type="submit" class="bg-blue-500 text-white border-blue-500 btn w-full mr-4" wire:loading.attr="disabled">
                    <span wire:loading.remove>Generate</span>
                    <span wire:loading>Loading...</span>
                </button>
            </div>
        </div>
        <div class="mt-3">
            @if(count($students) > 0)
                <div class="flex justify-end mb-3">
                    <a wire:click="download" wire:loading.class="select-none pointer-events-none" wire:target="download" class="p-3 dark:bg-slate-800 bg-[#E9E9ED] text-black dark:text-white cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" wire:loading.remove wire:target="download" width="18"  height="18"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 11l5 5l5 -5" /><path d="M12 4l0 12" /></svg>
                        <svg aria-hidden="true"  width="18" wire:loading wire:target="download" height="18" class="text-black animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                    </a>
                </div>
                <div class="overflow-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Student ID</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @forelse ($students as $item)
                                <tr>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ $i++ }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ $item->student_id }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ $item->name }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ $item->course->name ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <div class="text-red-500 w-full text-center">No Student Found</div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @elseif(!$students == [])
                <div class="text-red-500 w-full text-center">No Student Found</div>
            @endif
        </div>
    </form>
    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#startDate");
        flatpickr("#endDate");
    </script>
    @endpush
</div>
