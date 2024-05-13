@extends('layout/index')
@section('content')
    <div class="mx-auto my-10">
        @push('css')
            <style>
                :is(.dark .ck-editor__editable, .ck-icon, .ck-button__label, .ck-toolbar) {
                    --tw-border-opacity: 1;
                    border-color: rgb(107 114 128 / var(--tw-border-opacity)) !important;
                    --tw-bg-opacity: 1;
                    background-color: rgb(30 41 59 / var(--tw-bg-opacity)) !important;
                    --tw-text-opacity: 1;
                    color: rgb(255 255 255 / var(--tw-text-opacity)) !important;
                }
                #container {
                    width: 1000px;
                    margin: 20px auto;
                }
                .ck-editor__editable[role="textbox"] {
                    /* Editing area */
                    min-height: 200px;
                }
                .ck-content .image {
                    /* Block images */
                    max-width: 80%;
                    margin: 20px auto;
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
            <form action="{{ route('noticeAdmissionBoothPost') }}" method="POST">
                @csrf
                <div>
                    <textarea name="message" id="editor" rows="10" placeholder="Enter Notice" class="@error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                    @enderror
                    <div class="flex justify-start items-center mt-5">
                        <button type="submit" class="bg-blue-500 text-white border-blue-500 btn mr-4">Send</button>
                        <a href="{{ route('notice') }}" class="bg-slate-600 text-white border-slate-600 btn mr-4">Back</a>
                    </div>
                </div>
                <div class="w-full max-h-[250px] overflow-auto mt-5">
                    <table class="w-full overflow-y-auto border-collapse border border-slate-500">
                        <tr>
                            <td class="border border-slate-600 px-5 py-2">
                                <label for="all" class="mb-0 cursor-pointer select-none">
                                    <input type="checkbox" id="all">
                                    <span>Select All Admission Booth</span>
                                </label>
                            </td>
                        </tr>
                        @foreach ($admissionBooth as $item)
                            <tr>
                                <td class="border border-slate-600 px-5 py-2">
                                    <label for="{{ $item->shop_name }}" class="mb-0 cursor-pointer select-none">
                                        <input type="checkbox" id="{{ $item->shop_name }}" value="{{ $item->id }}" name="person[]">
                                        <span>{{ $item->shop_name }}</span>
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
        <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
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
