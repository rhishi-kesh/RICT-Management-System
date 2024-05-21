<div class="pt-5">
    <form wire:submit="update" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">System Information</h2>
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
            <div class="mb-1">
                <label for="number" class="my-label">Number</label>
                <input type="number" wire:model="number" name="number" placeholder="Number" id="number" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('number'))
                    <div class="text-red-500">{{ $errors->first('number') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="email" class="my-label">Email</label>
                <input type="text" wire:model="email" name="email" placeholder="Email" id="email" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('email'))
                    <div class="text-red-500">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="website" class="my-label">Website</label>
                <input type="url" wire:model="website" name="website" placeholder="Website" id="website" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('website'))
                    <div class="text-red-500">{{ $errors->first('website') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="logo" class="my-label">Logo</label>
                <input type="file" wire:model="logo" name="logo" placeholder="Logo" id="logo" class="my-input focus:outline-none focus:shadow-outline">
                <div wire:loading="" wire:target="logo" class="text-green-500">
                    Uploading Image...
                </div>
                @if ($errors->has('logo'))
                    <div class="text-red-500">{{ $errors->first('logo') }}</div>
                @endif
                @if ($logo)
                    <div>
                        <img width="80" class="mt-1" src="{{ $logo->temporaryUrl() }}" alt="">
                    </div>
                @else
                    <div>
                        <img width="100" class="mt-1" src="{{ asset('storage/' . $oldLogo) }}"  alt="">
                    </div>
                @endif
            </div>
            <div class="mb-1">
                <label for="fav" class="my-label">Favicon</label>
                <input type="file" wire:model="favicon" name="favicon" placeholder="Fav" id="fav" class="my-input focus:outline-none focus:shadow-outline">
                <div wire:loading="" wire:target="favicon" class="text-green-500">
                    Uploading Image...
                </div>
                @if ($errors->has('favicon'))
                    <div class="text-red-500">{{ $errors->first('favicon') }}</div>
                @endif
                @if ($favicon)
                    <div>
                        <img width="80" class="mt-1" src="{{ $favicon->temporaryUrl() }}" alt="">
                    </div>
                @else
                    <div>
                        <img width="40" class="mt-1" src="{{ asset('storage/' . $oldFav) }}"  alt="">
                    </div>
                @endif
            </div>
            <div class="mb-1">
                <label for="location" class="my-label">Location</label>
                <input type="text" wire:model="location" name="location" placeholder="Location" id="location" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('location'))
                    <div class="text-red-500">{{ $errors->first('location') }}</div>
                @endif
            </div>
        </div>
        <div class="flex justify-start items-center mt-5">
            <button type="submit" class="bg-blue-500 text-white border-blue-500 btn mr-4" wire:loading.remove>Update</button>
            <button type="button" disabled class="bg-blue-500 text-white border-blue-500 btn mr-4" wire:loading>Loading...</button>
        </div>
    </form>
</div>
