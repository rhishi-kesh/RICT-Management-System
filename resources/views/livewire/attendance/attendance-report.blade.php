<div class="pt-5">
    <form wire:submit="genarate" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Generate Attendance Report</h2>
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
            <div class="mb-1">
                <select name="batchId" wire:model.live.debounce.300ms="batchId" id="batchId" class="my-input focus:outline-none focus:shadow-outline">
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
                <select name="studentId" wire:model="studentId" id="studentId" class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select Student</option>
                    @foreach ($student as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}({{ $item->student_id }})</option>
                    @endforeach
                </select>
                @if ($errors->has('studentId'))
                    <div class="text-red-500">{{ $errors->first('studentId') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <button type="submit" class="bg-blue-500 text-white border-blue-500 btn w-full mr-4" wire:loading.attr="disabled">
                    <span wire:loading.remove>Generate</span>
                    <span wire:loading>Loading...</span>
                </button>
            </div>
        </div>
        <div class="mt-4">
            <div class="overflow-auto">
                @if(count($attendance) > 0)
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Date</th>
                                <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @forelse ($attendance as $item)
                                <tr>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ $i++ }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        {{ date('M d, Y', strtotime($item->date)) }}
                                    </td>
                                    <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                        <span class="@if($item->attendance == 'present') text-green-500 @else text-red-500 @endif">{{ ucfirst($item->attendance) }}</span>
                                    </td>
                                </tr>
                            @empty
                                <div class="text-red-500 w-full text-center">No Attendance Found</div>
                            @endforelse
                        </tbody>
                    </table>
                @elseif(!$attendance == [])
                    <div class="text-red-500 w-full text-center">No Attendance Found</div>
                @endif
            </div>
        </div>
    </form>
</div>
