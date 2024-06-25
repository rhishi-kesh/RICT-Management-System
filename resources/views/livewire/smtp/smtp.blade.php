<div class="pt-5">
    <form wire:submit="update" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">SMTP Settings</h2>
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
            <div class="mb-1">
                <label for="driver" class="my-label">Driver</label>
                <input type="text" wire:model="driver" name="driver" placeholder="Driver" id="driver" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('driver'))
                    <div class="text-red-500">{{ $errors->first('driver') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="host" class="my-label">Host</label>
                <input type="text" wire:model="host" name="host" placeholder="Host" id="host" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('host'))
                    <div class="text-red-500">{{ $errors->first('host') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="port" class="my-label">Port</label>
                <input type="text" wire:model="port" name="port" placeholder="Port" id="port" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('port'))
                    <div class="text-red-500">{{ $errors->first('port') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="username" class="my-label">Username</label>
                <input type="text" wire:model="username" name="username" placeholder="Username" id="location" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('username'))
                    <div class="text-red-500">{{ $errors->first('username') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="password" class="my-label">Password</label>
                <input type="text" wire:model="password" name="password" placeholder="Password" id="location" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('password'))
                    <div class="text-red-500">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="encryption" class="my-label">Encryption</label>
                <input type="text" wire:model="encryption" name="encryption" placeholder="Encryption" id="location" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('encryption'))
                    <div class="text-red-500">{{ $errors->first('encryption') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="from_address" class="my-label">From Address</label>
                <input type="text" wire:model="from_address" name="from_address" placeholder="From Address" id="location" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('from_address'))
                    <div class="text-red-500">{{ $errors->first('from_address') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="from_name" class="my-label">From Name</label>
                <input type="text" wire:model="from_name" name="from_name" placeholder="From Name" id="location" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('from_name'))
                    <div class="text-red-500">{{ $errors->first('from_name') }}</div>
                @endif
            </div>
        </div>
        <div class="flex justify-start items-center mt-5">
            <button type="submit" class="btn-submit btn mr-4" wire:loading.remove>Update</button>
            <button type="button" disabled class="btn-submit btn mr-4" wire:loading>Loading...</button>
        </div>
    </form>
</div>
