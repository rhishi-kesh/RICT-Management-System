<div class="pt-5">
    <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-3 xl:grid-cols-4">
        <div class="bg-white rounded dark:bg-[#0E1726] p-5">
            <form wire:submit="updateImage" enctype="multipart/form-data">
                <div x-data="{ photoName: null, photoPreview: '{{ empty(Auth::Guard('student')->user()->profile) ? url('profile.jpeg') : asset('storage/' . Auth::Guard('student')->user()->profile) }}' }" class="col-span-6 ml-2 mt-9 sm:col-span-4 md:mr-3 text-center text-blue-500">
                    <!-- Photo File Input -->
                    <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change=" photoName = $refs.photo.files[0].name;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                    photoPreview = e.target.result};
                    reader.readAsDataURL($refs.photo.files[0]);">
                    <label class="mb-4 font-bold text-3xl dark:text-white text-center" for="photo">
                        Profile Photo <span class="text-red-600"> </span>
                    </label>
                    <div class="text-center">
                        <!-- Current Profile Photo -->
                        <div class="mt-2" x-show="! photoPreview">
                            <img wire:model="image" alt="" class="w-40 h-40 m-auto rounded-full shadow">
                        </div>
                        <!-- New Profile Photo Preview -->
                        <div class="mt-2" x-show="photoPreview" style="display: none;">
                            <span class="block w-40 h-40 rounded-full m-auto shadow"
                                x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                                photoPreview + '\');'"
                                style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                            </span>
                        </div>
                        <div class="flex justify-center items-center">
                            @if ($errors->has('photo'))
                                <div class="text-red-500">{{ $errors->first('photo') }}</div>
                            @endif
                        </div>
                        <button type="button" class="inline-flex items-center whitespace-nowrap px-4 py-2 bg-white border border-gray-300 rounded-md duration-150 mt-2 ml-3 uppercase" x-on:click.prevent="$refs.photo.click()">
                            Select New Photo
                        </button>
                    </div>
                </div>

                <div class="flex justify-center items-center">
                    <button type="submit" class="btn btn-submit mt-2 uppercase cursor-pointer" wire:loading.remove wire:target="updateImage">Update Image</button>
                    <button type="button" disabled class="btn btn-submit mt-2 uppercase cursor-pointer" wire:loading wire:target="updateImage">Loading</button>
                </div>
            </form>
        </div>

        <div class="lg:col-span-2 xl:col-span-3 ng-tns-c265-3">
            <div class="bg-white rounded dark:bg-[#0E1726] p-5">
                <div class="mb-5 ng-tns-c265-3">
                    <h5 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Update Information </h5>
                </div>
                <div class="mb-5 ng-tns-c265-3">
                    <form wire:submit="profileUpdate" enctype="multipart/form-data">
                        <div class=" grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                            <input type="hidden" wire:model='id' name="id">
                            <div>
                                <label for="name" class="my-label">Name</label>
                                <input type="name" wire:model="name" name="name" placeholder="Name"
                                    id="name" class="my-input focus:outline-none ">
                                @if ($errors->has('name'))
                                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div>
                                <label for="Name" class="my-label">Email</label>
                                <input type="text" wire:model="email" name="email" placeholder="Name"
                                    id="email" class="my-input focus:outline-none ">
                                @if ($errors->has('email'))
                                    <div class="text-red-500">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div>
                                <label for="mobile" class="my-label">Mobile</label>
                                <input type="number" wire:model="mobile" name="mobile" placeholder="Mobile"
                                    id="mobile" class="my-input focus:outline-none ">
                                @if ($errors->has('mobile'))
                                    <div class="text-red-500">{{ $errors->first('mobile') }}</div>
                                @endif
                            </div>
                            <div x-data
                            x-init="
                              flatpickr($refs.dateInput, {
                                altInput: true,
                                dateFormat: 'Y-m-d',
                                defaultDate: ['{{ $date }}']
                              })
                            ">
                                <div wire:ignore>
                                    <label for="date" class="my-label">Date Of Birth</label>
                                    <input x-ref="dateInput" type="date" wire:model="date" placeholder="Date Of Birth" id="date" name="date" class="my-input focus:outline-none focus:shadow-outline" id="date">
                                </div>
                                @if ($errors->has('date'))
                                    <div class="text-red-500">{{ $errors->first('date') }}</div>
                                @endif
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-submit uppercase cursor-pointer">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white rounded dark:bg-[#0E1726] p-5 mt-6">
                <div class="mb-5 ng-tns-c265-3">
                    <h5 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Change Password</h5>
                </div>
                <div class="mb-5 ng-tns-c265-3">
                    <form wire:submit="passwordSubmit" enctype="multipart/form-data">
                        <div class=" grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                            <div class="mb-1">
                                <label for="Email" class="my-label">Current Password</label>
                                <input type="password" wire:model="current_password" name="current_password"
                                    placeholder="current password" type="password" id="Email" name="email"
                                    class=" form-control my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('current_password'))
                                    <div class="text-red-500">{{ $errors->first('current_password') }}</div>
                                @endif
                                @if (Session::has('old'))
                                    <div class="text-red-500">{{ Session::get('old') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="Email" class="my-label">New Password</label>
                                <input type="password" wire:model="password" name="password"
                                    placeholder="Enter new password" type="password" id="password"
                                    name="password"
                                    class=" form-control my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('password'))
                                    <div class="text-red-500">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="Email" class="my-label">Confirm Password</label>
                                <input type="password" wire:model="password_confirmation"
                                    name="password_confirmation" placeholder="Enter new password"
                                    type="password_confirmation" id="password_confirmation"
                                    class=" form-control my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('password_confirmation'))
                                    <div class="text-red-500">{{ $errors->first('password_confirmation') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-submit uppercase cursor-pointer">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
