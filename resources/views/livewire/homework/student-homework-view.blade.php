<div class="animate__animated p-6" :class="[$store.app.animation]">
    <div x-data="todolist">
        <div class="relative flex h-full gap-5 sm:h-[calc(100vh_-_150px)] bg-white dark:bg-[#0F172A]">
            <div class="table-responsive grow overflow-y-auto min-h-screen">
                <div class="p-5 pb-3">
                    <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">My Homework</h2>
                    <hr>
                </div>
                <table class="table-hover w-full @if(empty($homeworks)) h-full @endif">
                    <tbody>
                        @if (count($homeworks) !== 0)
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="text-center font-bold text-blue-500 py-3">Status</td>
                                <td class="text-center font-bold text-blue-500">Dateline</td>
                                <td class="text-center font-bold text-blue-500">Action</td>
                            </tr>
                        @endif
                        @forelse ($homeworks as $item)
                            <tr class="group hover:bg-[#EBEBEB] dark:hover:bg-[#121E31] border-b dark:border-b-[#181F32] border-b-[#EBEBEB]">
                                <td class="px-5 py-2 w-[80px]">
                                    @if (empty($item->student->profile))
                                        <div class="profile w-9 h-9 text-xs">
                                            {{ mb_substr(strtoupper($item->student->name), 0, 1) }}
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <img class="w-9 h-9 rounded-full overflow-hidden object-cover ring-2 ring-blue dark:ring-[#515365] shadow-[0_0_15px_1px_rgba(113,106,202,0.30)] dark:shadow-none" src="{{ asset('storage/' . $item->student->profile) }}" alt="img" width="150" height="100" />
                                        </div>
                                    @endif
                                </td>
                                <td class="px-5 py-2 pl-0">
                                    <p class="whitespace-nowrap text-base font-semibold line-clamp-1 min-w-[50px] cursor-pointer">
                                        <span>
                                            <span class="text-blue-500" @click="viewModal = true; $wire.call('viewData','{{ $item->id }}')">{{ Str::limit($item->title, 35, '...') }}</span>
                                            <span class="ml-2 select-none inline-block whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:bg-blue-500 hover:text-white text-xs border border-blue-500">{{ $item->created_at->diffForHumans() }}</span>
                                        </span>
                                        <button type="button" class="ml-2 whitespace-nowrap px-2 py-[.120rem] rounded-full capitalize hover:text-white text-xs border @if($item->priority == 'urgent') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->priority == 'high') border-yellow-500 text-yellow-500 hover:bg-yellow-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif">{{ $item->priority }}</button>
                                    </p>
                                    <p class="line-clamp-1 min-w-[300px]">{!! Str::limit($item->text, 85, '...') !!}</p>
                                </td>
                                <td class="px-5 py-2">
                                    <div class="flex gap-3 items-center justify-center">
                                        <button @click="editStatus = {{ $item->id }}" type="button" class="whitespace-nowrap px-3 py-2 capitalize hover:text-white border @if($item->status == 'reject') border-red-500 text-red-500 hover:bg-red-500 @elseif($item->status == 'done') border-green-500 text-green-500 hover:bg-green-500 @else border-blue-500 text-blue-500 hover:bg-blue-500 @endif text-xs rounded">
                                            {{ $item->status }}
                                            <svg :class="editStatus == {{ $item->id }} ? 'rotate-180' : 'rotate-0'" class="w-5 h-5 inline-block transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 15.0006L7.75732 10.758L9.17154 9.34375L12 12.1722L14.8284 9.34375L16.2426 10.758L12 15.0006Z"></path></svg>
                                        </button>
                                        <button @click="editStatus = 0" x-show="editStatus == {{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon icon-tabler icons-tabler-outline icon-tabler-circle-minus" fill="none" stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" height="24" width="24"><path d="M0 0h24v24H0z" fill="none" stroke="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M9 12l6 0"></path></svg>
                                        </button>
                                    </div>
                                    <div class="mt-2 flex gap-2 justify-center items-center" x-cloak x-show="editStatus == {{ $item->id }}">
                                        <select wire:model="status" class="my-input w-[200px] focus:outline-none focus:shadow-outline>
                                            <option value="">Select Status</option>
                                            <option value="pending">Pending</option>
                                            <option value="underProcessing">Under Processing</option>
                                            <option value="inReview">In Review</option>
                                        </select>
                                        <button class="bg-blue-500 text-nowrap text-[12px] text-white border-blue-500 btn px-2 py-[.140rem]" wire:click="changeStatus({{ $item->id }})">Done</button>
                                    </div>
                                </td>
                                <td class="px-5 py-2 text-center">
                                    <p class="whitespace-nowrap font-medium animate-pulse text-orange-500">{{ date("d-M-Y (g:i A)", strtotime($item->dueDate)) }}</p>
                                </td>
                                <td class="px-5 py-2">
                                    @if($item->status == 'reject' || $item->status == 'done' || $item->status == 'inReview')
                                        <div class="flex justify-center gap-3">
                                            <button x-tooltip="Edit Homework" class="bg-blue-500 btn text-white border-0 flex items-center justify-between" @click="modalOpen = true; $wire.call('editHomework','{{ $item->id }}')">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                                <span class="ml-2 text-nowrap">Edit</span>
                                            </button>
                                            <button x-tooltip="Show Homework" class="bg-blue-500 btn text-white border-0 flex items-center justify-between" @click="viewHomework = true; $wire.call('viewHomeWork','{{ $item->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"  height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22L8 18H16L12 22ZM12 2L16 6H8L12 2ZM12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14ZM2 12L6 8V16L2 12ZM22 12L18 16V8L22 12Z"></path></svg>
                                                <span class="ml-2 text-nowrap">My Submit</span>
                                            </button>
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="20">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset('empty.png') }}" alt="" class="w-[200px] md:w-[300px] opacity-40 dark:opacity-15 mt-10 select-none">
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="p-3 pt-2">
                    {{ $homeworks->links() }}
                </div>
            </div>
        </div>

        {{-- View Homework --}}
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="viewModal && '!block'">
            <div class="flex items-center justify-center min-h-screen px-4" @click.self="viewModal = false">
                <div x-show="viewModal" x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg">{{ $singleData->title ?? 'Loading...' }}</h5>
                    </div>
                    <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                        <p>{{ $singleData->text ?? 'Loading...' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- View Submited HomeWork --}}
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="viewHomework && '!block'">
            <div class="flex items-center justify-center min-h-screen px-4" @click.self="viewHomework = false">
                <div x-show="viewHomework" x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg text-blue-500">Submited Task</h5>
                        <button @click="viewHomework = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x text-blue-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                        <a href="{{ $singleHomework->url ?? 'Loading...' }}" class="inline-block mb-4" target="_blank"><b>Task Link:</b> <span class="text-blue-500">{{ $singleHomework->url ?? 'Loading...' }}</span></a>
                        <p><b>Description:</b> {{ $singleHomework->description ?? 'Loading...'}}</p>
                        @if(!empty($singleHomework->feedback))
                            <p class="mt-4"><b>Feedback:</b> {{ $singleHomework->feedback ?? ''}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Submit Form --}}
        <div class="fixed inset-0 bg-[black]/60 z-[999] hidden overflow-y-auto" :class="modalOpen && '!block'">
            <div class="flex items-center justify-center min-h-screen px-4" @click.self="modalOpen = false">
                <div x-show="modalOpen" x-transition x-transition.duration.400 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                    <div class="flex bg-[#fbfbfb] dark:bg-[#121c2c] items-center justify-between px-5 py-3">
                        <h5 class="font-bold text-lg text-blue-500">Submit Your Homework</h5>
                        <button @click="modalOpen = false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-x text-blue-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M18 6l-12 12"></path><path d="M6 6l12 12"></path></svg>
                        </button>
                    </div>
                    <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                        <form
                            method="post"
                            @if(!empty($updateId))
                                wire:submit="updateHomework"
                            @else
                                wire:submit="submitHomework"
                            @endif
                            enctype="multipart/form-data"
                        >
                            <div class="my-3 mb-4">
                                <label for="url" class="my-label">Task Link</label>
                                <input type="url" name="url" id="url" wire:model="url" placeholder="Task Link" class="my-input focus:outline-none focus:shadow-outline">
                                @error('url')
                                    <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="description" class="my-label">Description</label>
                                <textarea name="description" wire:model="description" id="description" rows="7" placeholder="Enter Description" class="@error('text') is-invalid @enderror my-input focus:outline-none focus:shadow-outline"></textarea>
                                @error('description')
                                    <div class="p-3 bg-red-500 text-white my-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex justify-end items-center mt-8">
                                <button type="reset" class="btn btn-reset">Reset</button>
                                <button type="submit" class="btn-submit btn ml-4" wire:loading.remove>Submit</button>
                                <button type="button" disabled class="btn-submit btn ml-4" wire:loading>Loading</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('todolist', () => ({
                viewModal: false,
                modalOpen: false,
                viewHomework: false,
                editStatus: 0,
                init() {
                    this.$wire.on('showForm', () => {
                        this.modalOpen = true;
                    });
                    this.$wire.on('swal', () => {
                        this.modalOpen = false;
                        this.editStatus = 0;
                    });
                }
            }));
        });
    </script>
    @endpush
</div>
