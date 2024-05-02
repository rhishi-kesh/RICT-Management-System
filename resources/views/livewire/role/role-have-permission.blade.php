<div class="pt-5">
    <form method="post" wire:submit="addRolePermission" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <label class="my-label">Permissions</label>
        <div>
            @foreach ($permissions as $permission)
                <label for="permission{{ $permission->id }}" class="inline-block m-2 p-2 cursor-pointer select-none">
                    <input
                        type="checkbox"
                        wire:model="permission"
                        value="{{ $permission->name }}"
                        id="permission{{ $permission->id }}"
                        {{ in_array($permission->id, $roleWithPermission) ? 'checked' : '' }}
                    />
                        {{ $permission->name }}
                </label>
            @endforeach
        </div>
        <div class="flex justify-start items-center mt-8">
            <button type="submit" class="uppercase btn bg-blue-500 border-none text-white cursor-pointer mr-4">Save</button>
            <a href="{{ route('role') }}" type="button" class="shadow btn bg-gray-900 dark:bg-white border-none text-white dark:text-black uppercase">back</a>
        </div>
    </form>
</div>
