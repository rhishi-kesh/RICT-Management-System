@extends('layout/mentorIndex')
@section('content')
    <div class="mx-auto my-10">
        <div class="md:w-[40rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-slate-900 dark:bg-slate-900 dark:shadow-none p-3">
            <h2 class="mb-3 font-bold text-xl dark:text-white text-blue-500">Update attendance of <span class="text-orange-500">{{ $batchName->name }}</span> batch</h2>
            <form action="{{ route('attendanceUpdate', [$date, $id]) }}" method="POST">
                @csrf
                <div>
                    <input name="date" type="date" id="date" placeholder="Select Date" value="{{ $date }}" rows="10" class="@error('date') is-invalid @enderror my-input focus:outline-none focus:shadow-outline">
                    @error('date')
                        <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full mt-5 h-auto">
                    <table class="w-full border-collapse border border-slate-500">
                        <thead>
                            <tr>
                                <th class="border border-slate-600 px-5 py-2 text-center">SL</th>
                                <th class="border border-slate-600 px-5 py-2 text-center">Name</th>
                                <th class="border border-slate-600 px-5 py-2 text-center">Present</th>
                                <th class="border border-slate-600 px-5 py-2 text-center">absent</th>
                                <th class="border border-slate-600 px-5 py-2 text-center">Late</th>
                            </tr>
                        </thead>
                        @php $i = 1; @endphp
                        @foreach ($attendance as $item)
                            <tr>
                                <td class="border border-slate-600 px-5 py-2 text-center">
                                    {{ $i++ }}
                                </td>
                                <td class="border border-slate-600 px-5 py-2 text-center">
                                    {{ $item->students->name }}
                                    <input type="hidden" value="{{ $item->students->id }}" name="student_id[]">
                                </td>
                                <td class="border border-slate-600 text-center select-none">
                                    <label for="present{{ $item->id }}" class="px-5 py-2 cursor-pointer mb-0">
                                        <input type="radio" name="attendance{{ $item->students->id }}" id="present{{ $item->id }}" value="present" {{ $item->attendance === 'present' ? 'checked' : '' }}>
                                        Present
                                    </label>
                                </td>
                                <td class="border border-slate-600 text-center select-none">
                                    <label for="absent{{ $item->id }}" class="px-5 py-2 cursor-pointer mb-0">
                                        <input type="radio" name="attendance{{ $item->students->id }}" id="absent{{ $item->id }}" value="absent" {{ $item->attendance === 'absent' ? 'checked' : '' }}>
                                        Absent
                                    </label>
                                </td>
                                <td class="border border-slate-600 text-center select-none">
                                    <label for="late{{ $item->id }}" class="px-5 py-2 cursor-pointer mb-0">
                                        <input type="radio" name="attendance{{ $item->students->id }}" id="late{{ $item->id }}" value="late" {{ $item->attendance === 'late' ? 'checked' : '' }}>
                                        Late
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="flex justify-start items-center mt-5">
                    <button type="submit" class="btn-submit btn mr-4">Update</button>
                    <a href="{{ route('attendanceBatch', $id) }}" class="btn-back btn mr-4">Back</a>
                </div>
            </form>
        </div>
        @push('js')
        <script>
            flatpickr("#date");
        </script>
        @endpush
    </div>
@endsection
