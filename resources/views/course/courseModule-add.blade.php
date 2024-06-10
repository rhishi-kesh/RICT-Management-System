@extends('layout/index')
@section('content')
    <div class="pt-5 p-5" >

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

        {{-- Instert Form --}}
        <div class="shadow-md rounded px-4 md:px-8 mb-4 w-full">
            <div class="flex items-center justify-center bg-gray-400 min-h-screen px-4">
                <div x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                    <div class="flex bg-[#fbfbfb] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg">Add Module</h5>
                    </div>
                    <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                        <form action="{{ route('courseModuleAddPost') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label for="class_no" class="my-label">Class No:</label>
                                <input type="text" name="class_no" placeholder="Class No :" id="class_no"
                                    class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('class_no'))
                                    <div class="text-red-500">{{ $errors->first('class_no') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <div>
                                    <label for="class_topics" class="my-label"> Class Topics: </label>
                                    <textarea name="class_topics" class="my-input focus:outline-none focus:shadow-outline appearance-none @error('class_topics') is-invalid @enderror"
                                        name="class_topics" id="class_topics" placeholder="class_topics" cols="5" rows="1"> </textarea>
                                </div>
                                @if ($errors->has('class_topics'))
                                    <div class="text-red-500">{{ $errors->first('class_topics') }}</div>
                                @endif
                            </div>
                            <div class="flex justify-end items-center mt-8">
                                {{-- <a href="{{ route('courseModule') }}">Back</a> --}}
                                <button type="submit" class="bg-gray-900 text-white btn ml-4">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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
