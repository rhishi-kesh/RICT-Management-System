@extends('layout/index')
@section('content')
<div class="animate__animated p-6 bg-gray-200 dark:bg-gray-950" :class="[$store.app.animation]">
    <div class="pt-5">
        <form method="POST" action="{{ route('permissionOnRolePost') }}" id="form" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
            @csrf
            <input type="hidden" value="{{ $role->id }}" name="id">
            <h4 class="text-3xl font-bold text-center mb-2 text-blue-500">Role: {{$role->name}}</h4>
            <p class="text-xl mb-2 text-blue-500 font-bold">Permissions</p>
            <div class="w-full overflow-auto">
                <table class="w-full border-collapse border border-slate-500">
                    <tr>
                        <td colspan="2" class="border border-slate-600 px-5 py-2">
                            <label for="all" class="inline-block cursor-pointer">
                                <input type="checkbox" id="all" value="1" class="inline-block cursor-pointer">
                                <span class="ms-2 mt-1 inline-block">All</span>
                            </label>
                        </td>
                    </tr>
                    @foreach ($group_name as $group)
                        <tr>
                            <td class="border-t border-slate-600 px-5 py-2">
                                <div class="inline-block border-b pr-3 pl-[1px]">
                                    <label for="role-{{ $group }}" class="inline-block cursor-pointer">
                                        <input type="checkbox" id="role-{{ $group }}" value="{{ $group }}" onclick="selectGroup(this.id)" class="cursor-pointer">
                                        <span class="ms-1 mt-1 inline-block">
                                            {{ $group }}
                                        </span>
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="role-{{ $group }}" class="border-top border-slate-600">
                                @foreach ($permissions as $permission)
                                    @if ($group == $permission->group)
                                        <label for="permission{{ $permission->id }}" class="inline-block ms-5 pr-5 mt-1 cursor-pointer select-none">
                                            <input
                                                type="checkbox"
                                                class="cursor-pointer"
                                                value="{{ $permission->name }}"
                                                id="permission{{ $permission->id }}"
                                                name="permission[]"
                                                {{ in_array($permission->id, $roleWithPermission) ? 'checked' : '' }}
                                            />
                                                {{ $permission->name }}
                                        </label>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="flex justify-start items-center mt-8">
                <button type="submit" class="uppercase btn btn-submit cursor-pointer mr-4">Save</button>
                <a href="{{ route('role') }}" type="button" class="btn btn-back uppercase">back</a>
            </div>
        </form>
    </div>
    @push('js')
        <script>
            //All Checked Code
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

            //Group All Checked Code
            function selectGroup(className){
                let allGroup = document.getElementById(className);
                let allGroupInput = document.querySelectorAll('.' + className + ' input[type="checkbox"]');
                if(allGroup.checked){
                    allGroupInput.forEach(input => {
                        input.setAttribute('checked', 'checked');
                    });
                }else{
                    allGroupInput.forEach(input => {
                        input.removeAttribute('checked');
                    });
                }
            }
        </script>
        {{-- <script>
            let form = document.getElementById('form');
            form.onsubmit = (e) => {
                e.preventDefault();

                let formData = new FormData(form);
                let csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                fetch('/admin/permission-on-role-post', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: formData,
                })
                .then(response => {
                    if (response.message == 'Success') {
                        // Handle successful response
                        console.log('Form submitted successfully');
                    } else {
                        // Handle error response
                        console.error('Error submitting form');
                    }
                })
                .catch(error => {
                    // Handle network error
                    console.error('Network error:', error);
                });
            }
        </script> --}}
    @endpush
</div>
@endsection
