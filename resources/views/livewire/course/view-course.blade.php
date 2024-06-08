<div class="pt-5" x-data="modal">

    <div class="mb-3">
        <button @click="toggle; $wire.call('showModal')"
            class="bg-blue-500 btn text-white border-0 flex items-center justify-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Add Course
        </button>
    </div>
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-8 md:px-8 pt-6 pb-8 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Courses</h2>
        <hr>
        <div>
            {{-- Show Data --}}
            <div class="overflow-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">CourseFee</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Duration</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Lecture</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Project</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Thumbnail</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Video</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Department Name</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Description</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $key => $data)
                            <tr>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $courses->firstItem() + $key }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->name ?? '-' }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->fee ?? '-' }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->duration ?? '-' }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->lecture }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->project }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    <img class="shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none"
                                        src="{{ asset('storage/' . $data->thumbnail) }}" alt="img" width="120"
                                        height="100" />
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->video ?? '-' }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->department->name ?? '-' }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $data->description ?? '-' }}</td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                        <a class="inline-block" @click="toggle">
                                            <svg class="m-auto h-5 w-5 opacity-70" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="5" cy="12" r="2" stroke="currentColor"
                                                    stroke-width="1.5"></circle>
                                                <circle opacity="0.5" cx="12" cy="12" r="2"
                                                    stroke="currentColor" stroke-width="1.5"></circle>
                                                <circle cx="19" cy="12" r="2" stroke="currentColor"
                                                    stroke-width="1.5"></circle>
                                            </svg>
                                        </a>
                                        <ul x-cloak x-show="open" x-transition x-transition.duration.300ms
                                            class="ltr:right-0 rtl:left-0">
                                            <li>
                                                <a class=" dropdown-item d-flex align-items-center gap-3"
                                                    href="{{ route('editCourse', $data->id) }}" data-bs-toggle="modal">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                        <path d="M16 5l3 3" />
                                                    </svg>
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a wire:click="deleteAlert({{ $data->id }})"
                                                    class="dropdown-item d-flex align-items-center gap-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                    Delete</a>
                                            </li>
                                            <li>
                                                <a class="whitespace-nowrap dropdown-item d-flex align-items-center gap-3"
                                                    href="{{ route('courseLearnings', $data->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-brand-drops"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M17.637 7.416a7.907 7.907 0 0 1 1.76 8.666a8 8 0 0 1 -7.397 4.918a8 8 0 0 1 -7.396 -4.918a7.907 7.907 0 0 1 1.759 -8.666l5.637 -5.416l5.637 5.416z" />
                                                        <path
                                                            d="M14.466 10.923a3.595 3.595 0 0 1 .77 3.877a3.5 3.5 0 0 1 -3.236 2.2a3.5 3.5 0 0 1 -3.236 -2.2a3.595 3.595 0 0 1 .77 -3.877l2.466 -2.423l2.466 2.423z" />
                                                    </svg>
                                                    Add Learning Form Course
                                                </a>
                                            </li>
                                            <li>
                                                <a class="whitespace-nowrap dropdown-item d-flex align-items-center gap-3"
                                                    href="{{ route('courseForThose', $data->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-affiliate" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275" />
                                                        <path d="M11.683 12.317l5.759 -5.759" />
                                                        <path
                                                            d="M5.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0" />
                                                        <path
                                                            d="M18.5 5.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0" />
                                                        <path
                                                            d="M18.5 18.5m-1.5 0a1.5 1.5 0 1 0 3 0a1.5 1.5 0 1 0 -3 0" />
                                                        <path
                                                            d="M8.5 15.5m-4.5 0a4.5 4.5 0 1 0 9 0a4.5 4.5 0 1 0 -9 0" />
                                                    </svg>
                                                    Add Course For Those
                                                </a>
                                            </li>
                                            <li>
                                                <a class="whitespace-nowrap  dropdown-item d-flex align-items-center gap-3"
                                                    href="{{ route('benefitCourse', $data->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-mood-puzzled"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M14.986 3.51a9 9 0 1 0 1.514 16.284c2.489 -1.437 4.181 -3.978 4.5 -6.794" />
                                                        <path d="M10 10h.01" />
                                                        <path d="M14 8h.01" />
                                                        <path d="M12 15c1 -1.333 2 -2 3 -2" />
                                                        <path d="M20 9v.01" />
                                                        <path
                                                            d="M20 6a2.003 2.003 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                                                    </svg>
                                                    Add Benefits of the Course
                                                </a>
                                            </li>
                                            <li>
                                                <a class="whitespace-nowrap dropdown-item d-flex align-items-center gap-3"
                                                    href="{{ route('addCreativeProject', $data->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-radioactive"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M13.5 14.6l3 5.19a9 9 0 0 0 4.5 -7.79h-6a3 3 0 0 1 -1.5 2.6" />
                                                        <path
                                                            d="M13.5 9.4l3 -5.19a9 9 0 0 0 -9 0l3 5.19a3 3 0 0 1 3 0" />
                                                        <path
                                                            d="M10.5 14.6l-3 5.19a9 9 0 0 1 -4.5 -7.79h6a3 3 0 0 0 1.5 2.6" />
                                                    </svg>
                                                    Add Creative Projects
                                                </a>
                                            </li>
                                            <li>
                                                <a class="whitespace-nowrap dropdown-item d-flex align-items-center gap-3"
                                                    href="{{ route('courseModule', $data->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-carousel-vertical"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M19 8v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1z" />
                                                        <path d="M7 22v-1a1 1 0 0 1 1 -1h8a1 1 0 0 1 1 1v1" />
                                                        <path d="M17 2v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1" />
                                                    </svg>
                                                    Add Course Module
                                                </a>
                                            </li>
                                            <li>
                                                <a class="whitespace-nowrap dropdown-item d-flex align-items-center gap-3"
                                                    href="{{ route('courseFAQ', $data->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-help-hexagon"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path
                                                            d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z" />
                                                        <path d="M12 16v.01" />
                                                        <path
                                                            d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483" />
                                                    </svg>
                                                    Add Course FAQ
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="20">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset('empty.png') }}" alt=""
                                            class="w-[200px] opacity-40 dark:opacity-15 mt-10 select-none">
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="livewire-pagination mt-5">{{ $courses->links() }}</div>
        </div>
    </div>

    {{-- Update & Instert Form --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="open && '!block'">
        <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
            <div x-show="open" x-transition x-transition.duration.400
                class=" panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-[800px] my-8">
                <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                    @if (!empty($update_id))
                        <h5 class="font-bold text-lg">Update Course</h5>
                    @else
                        <h5 class="font-bold text-lg">Add Course</h5>
                    @endif
                </div>
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">

                    <form method="post"
                        @if (!empty($update_id)) wire:submit="update"
                        @else wire:submit="insert" @endif>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-3">
                            <div class="mb-1">
                                <label for="Name" class="my-label">Course Name</label>
                                <input type="text" wire:model="name" placeholder="Course Name" id="name"
                                    class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('name'))
                                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="courseFee" class="my-label">Course Fee</label>
                                <input type="number" wire:model="courseFee" placeholder="Course Fee" id="courseFee"
                                    class="my-input focus:outline-none focus:shadow-outline appearance-none">
                                @if ($errors->has('courseFee'))
                                    <div class="text-red-500">{{ $errors->first('courseFee') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <div wire:ignore>
                                    <label for="duration" class="my-label"> Duration (Month)</label>
                                    <input type="number" wire:model="duration" placeholder="Course duration"
                                        id="duration" class="my-input focus:outline-none focus:shadow-outline">
                                </div>
                                @if ($errors->has('duration'))
                                    <div class="text-red-500">{{ $errors->first('duration') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="lecture" class="my-label">Lecture</label>
                                <input type="number" wire:model="lecture" placeholder="Lecture" id="lecture"
                                    class="my-input focus:outline-none focus:shadow-outline appearance-none">
                                @if ($errors->has('lecture'))
                                    <div class="text-red-500">{{ $errors->first('lecture') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="project" class="my-label">Project</label>
                                <input type="number" wire:model="project" placeholder="project"
                                    class="my-input focus:outline-none focus:shadow-outline appearance-none">
                                @if ($errors->has('project'))
                                    <div class="text-red-500">{{ $errors->first('project') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="department_id" class="my-label">Department Name</label>
                                <select name="department_id" wire:model.live.debounce.1000ms="department_id"
                                    id="department_id" class="my-input focus:outline-none focus:shadow-outline  bg-white">
                                    <option value="department_id"> Select Course </option>
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('department_id'))
                                    <div class="text-red-500">{{ $errors->first('department_id') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="video" class="my-label">Video</label>
                                <input type="url" wire:model="video" placeholder="video" id="video"
                                    class="my-input focus:outline-none focus:shadow-outline appearance-none">
                                @if ($errors->has('video'))
                                    <div class="text-red-500">{{ $errors->first('video') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="description" class="my-label">description</label>
                                <textarea wire:model="description" placeholder="description" class="my-input focus:outline-none focus:shadow-outline appearance-none" name="description" id="description" cols="5" rows="1">
                                </textarea>
                                @if ($errors->has('description'))
                                    <div class="text-red-500">{{ $errors->first('description') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label class=" col-form-label pt-0" for="image">Thumbnail</label>
                                <input wire:model="image" class="bg-white p-2 w-full block form-control @error('image') is-invalid @enderror" id="image" type="file">
                                <div wire:loading="" wire:target="image" class="text-green-500">
                                    Uploading Image...
                                </div>
                                @if ($image)
                                    <div>
                                        <img width="80" class="mt-1" src="{{ $image->temporaryUrl() }}"
                                            alt="">
                                    </div>
                                @else
                                    <div>
                                        <img width="80" class="mt-1" src="{{ asset('storage/' . $oldimage) }}"
                                            alt="">
                                    </div>
                                @endif
                                @if ($errors->has('image'))
                                    <div class="text-red-500">{{ $errors->first('image') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="flex justify-end items-center mt-4">
                            <button type="reset" class="shadow btn bg-gray-50 dark:bg-gray-800">Reset</button>
                            <button type="submit" class="bg-gray-900 text-white btn ml-4"
                                wire:loading.remove>Save</button>
                            <button type="button" disabled class="bg-gray-900 text-white btn ml-4"
                                wire:loading>Loading</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
