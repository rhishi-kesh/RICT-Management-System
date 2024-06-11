@extends('layout/index')
@section('content')
<div class="animate__animated p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
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
                .ck-editor__editable_inline {
                    min-height: 140px;
                }
                .bg-light.active {
                    background: #5D87FF !important;
                }
            </style>
        @endpush

        <form action="{{ route('courseModuleEditPost', $id) }}" method="post" enctype="multipart/form-data" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-1">
                <label for="class_no" class="my-label">Class No: </label>
                <input type="text" name="class_no" placeholder="Class No" value="{{ $CourseModule->class_no }}" id="class_no" class="my-input focus:outline-none focus:shadow-outline">
                @error('class_no')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-1">
                <label for="class_topics" class="my-label"> Class Topics: </label>
                <textarea name="class_topics" class="my-input focus:outline-none focus:shadow-outline appearance-none @error('class_topics') is-invalid @enderror" name="class_topics" id="class_topics" placeholder="Class Topics" cols="5" rows="1">{{ $CourseModule->class_topics }}</textarea>
                @error('class_topics')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-start items-start mt-8">
                <button type="submit" class="bg-gray-900 text-white btn">Save</button>
                <a href="{{ route('courseModule', $id) }}" class="bg-gray-900 text-white btn ml-4">Back</a>
            </div>
        </form>

        @push('js')
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script>
                flatpickr("#date");
            </script>
            <script>
                ClassicEditor
                    .create(document.querySelector('#class_topics'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        @endpush
    </div>
</div>
@endsection
