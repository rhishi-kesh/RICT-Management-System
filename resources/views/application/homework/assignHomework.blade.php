@extends('layout/mentorIndex')
@section('content')
<div class="mx-auto my-10">
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
    @if (Session::has('success'))
        <div class="flex items-center p-4 mb-4 text-sm text-green-900 rounded-lg bg-green-300 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                {{ Session::get('success') }}
            </div>
          </div>
    @endif
    @if (Session::has('error'))
        <div class="alert bg-danger text-white alert-dismissible border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                aria-label="Close"></button>
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="md:w-[40rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-slate-900 dark:bg-slate-900 dark:shadow-none p-3">
        <form action="{{ route('homeworkAssignPost') }}" method="POST">
            @csrf
            <div class="my-3 mb-4">
                <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="Task Title" class="my-input focus:outline-none focus:shadow-outline">
                @error('title')
                    <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="block md:flex justify-between gap-4 mb-3">
                <div class="w-full md:w-[50%] mb-2">
                    <select name="priority" id="priority" class="my-input focus:outline-none focus:shadow-outline">
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
                    <input type="date" name="dueDate" id="date" placeholder="Set Dateline" value="{{ old('dueDate') }}" class="my-input focus:outline-none focus:shadow-outline">
                    @error('dueDate')
                        <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div>
                <textarea name="text" id="editor" rows="10" placeholder="Enter Description" class="@error('text') is-invalid @enderror my-input focus:outline-none focus:shadow-outline">{{ old('text') }}</textarea>
                @error('text')
                    <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                @enderror
                <div class="flex justify-start items-center mt-5">
                    <button type="submit" class="bg-blue-500 text-white border-blue-500 btn mr-4">Send</button>
                    <a href="{{ route('homework') }}" class="bg-slate-600 text-white border-slate-600 btn mr-4">Back</a>
                </div>
            </div>
            <div class="w-full max-h-[250px] overflow-auto mt-5">
                <table class="w-full overflow-y-auto border-collapse border border-slate-500">
                    <tr>
                        <td class="border border-slate-600 px-5 py-2">
                            <label for="all" class="mb-0 cursor-pointer select-none">
                                <input type="checkbox" id="all">
                                <span>Select All Students</span>
                            </label>
                        </td>
                    </tr>
                    @foreach ($students as $item)
                        <tr>
                            <td class="border border-slate-600 px-5 py-2">
                                <label for="id{{ $item->id }}" class="mb-0 cursor-pointer select-none">
                                    <input type="checkbox" id="id{{ $item->id }}" value="{{ $item->id }}" name="person[]">
                                    <span>{{ $item->name }}({{ $item->student_id }})</span>
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </table>
                @error('person')
                    <div class="p-3 bg-red-500 text-white mb-2 mt-2">{{ $message }}</div>
                @enderror
            </div>
        </form>
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
        let all = document.getElementById('all');
        let allInput = document.querySelectorAll('table input[type="checkbox"]');
        all.onclick = () => {
            if(all.checked){
                allInput.forEach(input => {
                    input.setAttribute('checked', 'checked');
                });
            }else{
                allInput.forEach(input => {
                    input.removeAttribute('checked');
                });
            }
        }
    </script>
    @endpush
</div>
@endsection
