@extends('layout/index')
@section('content')
    <div class="p-6 bg-gray-200 dark:bg-gray-950 w-full">
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
        <div class="md:w-[40rem] w-full mx-auto my-10 bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-slate-900 dark:bg-slate-900 dark:shadow-none p-3">
            <h2 class="mb-2 font-bold text-xl dark:text-white text-blue-500">Send Notice To Mentors</h2>
            <form action="{{ route('noticeMentorPost') }}" method="POST" id="form">
                @csrf
                <div>
                    <textarea name="message" id="editor" rows="10" placeholder="Enter Notice" class="my-input focus:outline-none focus:shadow-outline @error('message') is-invalid @enderror">{{ old('message') }}</textarea>

                    <div class="p-3 bg-red-500 text-white mb-2 my-1 error errormessage"></div>

                    <div class="flex justify-start items-center mt-5">
                        <button type="submit" id="submit" class="bg-blue-500 text-white border-blue-500 btn mr-4">Send</button>
                        <a href="{{ route('notice') }}" class="btn-back btn mr-4">Back</a>
                    </div>
                </div>
                <div class="w-full max-h-[250px] overflow-auto mt-5">
                    <table class="w-full overflow-y-auto border-collapse border border-slate-500">
                        <tr>
                            <td class="border border-slate-600 px-5 py-2">
                                <label for="all" class="mb-0 cursor-pointer select-none">
                                    <input type="checkbox" id="all">
                                    <span>Select All Mentor</span>
                                </label>
                            </td>
                        </tr>
                        @foreach ($mentors as $item)
                        <tr>
                            <td class="border border-slate-600 px-5 py-2">
                                <label for="id{{ $item->id }}" class="mb-0 cursor-pointer select-none">
                                    <input type="checkbox" id="id{{ $item->id }}" value="{{ $item->id }}" name="person[]">
                                    <span>{{ $item->name }}</span>
                                </label>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="p-3 bg-red-500 text-white mb-2 my-1 error errorperson"></div>
                </div>
            </form>
        </div>
        @push('js')
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
            <script>
                var form = document.getElementById('form');

                document.querySelector('.errormessage').style.display = 'none';
                document.querySelector('.errorperson').style.display = 'none';
                var submitBtn = document.querySelector('#submit');

                function sendAjaxRequest() {

                    // Create a new XMLHttpRequest object
                    var xhr = new XMLHttpRequest();

                    // Configure it: POST-request for the URL /ajax-example
                    xhr.open('POST', '{{ route('noticeMentorPost') }}', true);

                    // Set up the request headers
                    xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
                    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

                    // Define the callback function
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            if(response.status == 0){
                                handleValidationErrors(response.error);
                                submitBtn.disabled = false;
                            }else{
                                Swal.fire({
                                    icon: 'success',
                                    title: response.msg,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                document.querySelector('.errormessage').style.display = 'none';
                                document.querySelector('.errorperson').style.display = 'none';
                                submitBtn.disabled = false;
                                form.reset();
                            }
                        }
                    };

                    //Pass Data With Request
                    var formData = new FormData(form);
                    var data = {};
                    formData.forEach((value, key) => {
                        if (key.endsWith('[]')) {
                            key = key.slice(0, -2);
                            if (!data[key]) {
                                data[key] = [];
                            }
                            data[key].push(value);
                        } else {
                            data[key] = value;
                        }
                    });

                    xhr.send(JSON.stringify(data));
                }

                //Form ON Submit
                form.onsubmit = (e) => {
                    e.preventDefault();
                    submitBtn.disabled = true;
                    sendAjaxRequest();
                }

                //HandleValidat Error
                function handleValidationErrors(errors) {

                    var messageError = document.querySelector('.errormessage');
                    if (errors.message) {
                        messageError.innerText = errors.message.join(', ');
                        messageError.style.display = 'block';
                    }else{
                        messageError.style.display = 'none';
                    }

                    var personError = document.querySelector('.errorperson');
                    if (errors.person) {
                        personError.innerText = errors.person.join(', ');
                        personError.style.display = 'block';
                    }else{
                        personError.style.display = 'none';
                    }
                }
            </script>
        @endpush
    </div>
@endsection
