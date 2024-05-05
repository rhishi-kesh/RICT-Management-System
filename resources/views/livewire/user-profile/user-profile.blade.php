<div>
    <div class="pt-5">
        <div class="pt-5 ng-tns-c265-3">
            <div class="mb-5 grid grid-cols-1 gap-5 lg:grid-cols-3 xl:grid-cols-4 ng-tns-c265-3">
                <div class="panel ng-tns-c265-3">
                    <form wire:submit="updateImage" enctype="multipart/form-data">
                        <div x-data="{ photoName: null, photoPreview: '{{ empty(Auth::Guard('student')->user()->profile) ? url('profile.jpeg') : asset('storage/' . Auth::Guard('student')->user()->profile) }}' }" class="col-span-6 ml-2 mt-9 sm:col-span-4 md:mr-3">
                            <!-- Photo File Input -->
                            <input type="file" class="hidden" wire:model="photo" x-ref="photo"
                                x-on:change=" photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                            photoPreview = e.target.result};
                            reader.readAsDataURL($refs.photo.files[0]);">
                            <label class="block text-gray-700 text-sm font-bold mb-2 text-center" for="photo">
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
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md duration-150 mt-2 ml-3"
                                    x-on:click.prevent="$refs.photo.click()">
                                    Select New Photo
                                </button>
                            </div>
                        </div>
                       
                        <div class="flex justify-center items-center">
                            <button type="submit"
                                class=" inline-flex items-center uppercase btn bg-blue-500 border-none text-white cursor-pointer mt-2 ml-3 duration-150 ">
                                Update Image
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="lg:col-span-2 xl:col-span-3 ng-tns-c265-3">
                    <div class="panel">
                        <div class="mb-5 ng-tns-c265-3">
                            <h5 class="text-lg font-semibold dark:text-white-light ng-tns-c265-3">Update Information
                            </h5>
                        </div>
                        <div class="mb-5 ng-tns-c265-3">
                            <form wire:submit="profileUpdate" enctype="multipart/form-data">
                                <div class=" grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                                    <input type="hidden" wire:model='id' name="id">
                                    <div>
                                        <label for="Name" class="my-label">Name</label>
                                        <input type="text" wire:model="name" name="name" placeholder="Name"
                                            id="Name" class="my-input focus:outline-none ">
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
                                    <div class="mt-4">
                                        <button type="submit"
                                            class="uppercase btn bg-blue-500 border-none text-white cursor-pointer">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="panel mt-6">
                        <div class="mb-5 ng-tns-c265-3">
                            <h5 class="text-lg font-semibold dark:text-white-light ng-tns-c265-3">Change Password</h5>
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
                                <div class="mt-7">
                                    <button type="submit"
                                        class="uppercase btn bg-blue-500 border-none text-white cursor-pointer">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
