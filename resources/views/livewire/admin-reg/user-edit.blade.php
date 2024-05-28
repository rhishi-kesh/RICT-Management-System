<div class="pt-5">
    @push('css')
        <link rel="stylesheet" href="{{ asset('frontend/css/nice-select2.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <style>
            .nice-select{
                width: 99%;
            }
            .nice-select-dropdown{
                width: 100%;
            }
            .nice-select .list li{
                color: #000;
            }
            .nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus {
                background-color: transparent;
            }
            .nice-select .option.selected {
                font-weight: bold;
                background-color: #ececec !important;
            }
            .nice-select .list {
                max-height: 125px;
            }
            input[type="date"]::-webkit-inner-spin-button,
            input[type="date"]::-webkit-calendar-picker-indicator {
                display: none;
                -webkit-appearance: none;
                user-select: none;
            }
        </style>
    @endpush
    <form wire:submit="update" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Add User</h2>
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
            <div class="mb-1">
                <label for="Name" class="my-label">Name</label>
                <input type="text" wire:model="name" placeholder="Name" id="Name" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('name'))
                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="email" class="my-label">Email</label>
                <input type="email" wire:model="email" placeholder="Email" id="email" class="my-input focus:outline-none focus:shadow-outline appearance-none">
                @if ($errors->has('email'))
                    <div class="text-red-500">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="mobile" class="my-label">Mobile Number</label>
                <input type="number" wire:model="mobile" placeholder="Mobile Number" id="mobile" class="my-input focus:outline-none focus:shadow-outline appearance-none">
                @if ($errors->has('mobile'))
                    <div class="text-red-500">{{ $errors->first('mobile') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <div wire:ignore>
                    <label for="date" class="my-label">Date Of Birth</label>
                    <input type="date" wire:model="date" placeholder="Date Of Birth" id="date" name="date" class="my-input focus:outline-none focus:shadow-outline" id="date">
                </div>
                @if ($errors->has('date'))
                    <div class="text-red-500">{{ $errors->first('date') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <div wire:ignore>
                    <label for="roles" class="my-label">Role</label>
                    <select id="roles" wire:model="roles" class="my-input focus:outline-none focus:shadow-outline p-0" name="roles[]" multiple>
                        @foreach ($allRoles as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('roles'))
                    <div class="text-red-500">{{ $errors->first('roles') }}</div>
                @endif
            </div>
        </div>
        <div class="mt-4">
            <input type="submit" value="Admit" class="uppercase btn bg-blue-500 border-none text-white cursor-pointer">
        </div>
    </form>
    @push('js')
    <script src="{{ asset('frontend/js/nice-select2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            // seachable
            var options = {
                searchable: true,
                placeholder: 'Select Roles'
            };
            NiceSelect.bind(document.getElementById("roles"), options);
        });
    </script>
    <script>
        flatpickr("#date");
    </script>
    @endpush
</div>
