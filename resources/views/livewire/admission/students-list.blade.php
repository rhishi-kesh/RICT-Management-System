<div class="pt-5">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-6 pt-6 pb-5 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Students List</h2>
        <hr>
        <div class="flex item-center justify-between d px-6 pb-2 pt-2">
            <div class="flex item-center py-2">
                <h1 class="flex justify-center items-center font-bold">show</h1>
                <div class="dataTable-dropdown ml-[5px]">
                    <label>
                        <select class="width-auto bg-white text-state-950 border-slate-500 border rounded-[6px] pt-[.375rem] pb-[.375rem] pl-[.5rem] pr-[1rem]" wire:model.live="perpage">
                            <option value="10" selected="">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </label>
                </div>
                <h1 class="flex justify-center items-center ml-[5px] font-bold">entries</h1>
            </div>
            <div class="flex items-center" x-data="{ search: false }" @click.outside="search = false">
                <form
                    class="absolute inset-x-0 top-1/2 z-10 mx-4 hidden -translate-y-1/2 sm:relative sm:top-0 sm:mx-0 sm:block sm:translate-y-0"
                    :class="{'!block' : search}"
                >
                    <div class="relative">
                        <input wire:model.live.debounce.1000ms="search" type="text" class="peer w-full h-full bg-gray-100 dark:bg-slate-800 ps-10 py-2 rounded border dark:border-gray-700 focus:outline-none dark:focus:border-blue-500 focus:border" placeholder="Search..." />
                        <button type="button" class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-blue-500 ltr:right-auto rtl:left-auto">
                            <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                                <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </button>
                        <button
                            type="button"
                            class="absolute top-1/2 block -translate-y-1/2 hover:opacity-80 ltr:right-2 rtl:left-2 sm:hidden"
                            @click="search = false"
                        >
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle opacity="0.5" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                                <path
                                    d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                />
                            </svg>
                        </button>
                    </div>
                </form>
                <button
                    type="button"
                    class="search_btn rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden"
                    @click="search = ! search"
                >
                    <svg
                        class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5" />
                        <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </div>
        <div
            x-data="{ scrollPosition: 0 }"
            style="overflow-x: auto; white-space: nowrap;"
            @wheel.prevent="onWheel"
            x-ref="scrollContainer"
        >
            <div style="display: inline-block; width: 2000px;" >
                <table class="w-full">
                    <thead>
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{$student->id}} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->student_id }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->name }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->fName }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->mName }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->mobile }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->address }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->email }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->guardianMobileNo }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->qualification }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->profession }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->course->name ?? '-' }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->discount ?? "00" }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->paymentType }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->total }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->pay ?? "00" }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->due }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->paymentNumber }} </td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student->admissionFee }} </td>
                            

                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center" >

                                {{-- Edit Button --}}
                                <button  type="button" x-tooltip="Edit" wire:click="ShowUpdateModel({{ $student->id }})">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil text-green-500"><path class="text-green-500" stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                </button>

                                {{-- Delete Button --}}

                                <button type="button" x-tooltip="Delete" wire:click="deleteAlert({{ $student->id }})">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-red-500"><path class="text-red-500" stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path class="text-red-500" d="M10 11l0 6" /><path class="text-red-500" d="M14 11l0 6" /><path class="text-red-500" d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path class="text-red-500" d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                </button>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                            <tr>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $students->firstItem() + $key }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->student_id ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->name ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->fName }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->mName ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->mobile ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->address ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->email ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->dateofbirth ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->guardianMobileNo ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->qualification ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->profession ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->course->name ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->discount ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->total ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->pay ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->due ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    @foreach ($paymentTypes as $item)
                                        @if($item->id == $student->paymentType)
                                            {{ $student->pament_mode->name ?? '-' }}
                                        @endif
                                    @endforeach
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->paymentNumber ?? "-" }}
                                </td>
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->batch->name ?? "-" }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    @if(empty($student->class_days)) - @else {{ $student->class_days }} @endif
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a]">
                                    <div class="flex justify-center items-center">
                                        <label class="w-12 h-6 relative">
                                            <input type="checkbox" class="checkbox peer" id="custom_switch_checkbox6" @if($student->admissionFee == '1') checked @else {{ '' }} @endif wire:click="admissionfee({{ $student->id }})" />
                                            <span for="custom_switch_checkbox6" class="checkboxSpan"></span>
                                        </label>
                                    </div>
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                    {{ $student->created_at->diffForHumans() ?? '-' }}
                                </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center" >

                                    {{-- Edit Button --}}
                                    <button  type="button" x-tooltip="Edit" wire:click="ShowUpdateModel({{ $student->id }})">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil text-green-500"><path class="text-green-500" stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                    </button>

                                    {{-- Delete Button --}}
                                    <button type="button" x-tooltip="Delete" wire:click="deleteAlert({{ $student->id }})">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-red-500"><path class="text-red-500" stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path class="text-red-500" d="M10 11l0 6" /><path class="text-red-500" d="M14 11l0 6" /><path class="text-red-500" d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path class="text-red-500" d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="py-4 px-3 pb-0 mb-0">
            {{ $students->links() }}
        </div>
    </div>
    {{-- Edit/Update --}}
    <div class="fixed inset-0 bg-[black]/60 z-[999] @if($isModal)  @else hidden @endif overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div x-transition x-transition.duration.300 class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg my-8">
                <div class="p-5 bg-gray-200 dark:bg-gray-800 text-left">
                    <form wire:submit="submit" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
                        <h2 class="mb-2 font-bold text-3xl dark:text-white">Admission Form</h2>
                        <hr>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
                            <div class="mb-1">
                                <label for="Name" class="my-label">Name</label>
                                <input type="text" wire:model="name" name="name" placeholder="Name" id="Name" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('name'))
                                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="FatherName" class="my-label">Father Name</label>
                                <input type="text" wire:model="fatherName" placeholder="Father Name" id="FatherName" name="fatherName" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('fatherName'))
                                    <div class="text-red-500">{{ $errors->first('fatherName') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="MotherName" class="my-label">Mother Name</label>
                                <input type="text" wire:model="motherName" placeholder="Mother Name" id="MotherName" name="motherName" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('motherName'))
                                    <div class="text-red-500">{{ $errors->first('motherName') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="MobileNumber" class="my-label">Mobile Number</label>
                                <input type="text" wire:model="mobileNumber" placeholder="Mobile Number" id="MobileNumber" name="mobileNumber" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('mobileNumber'))
                                    <div class="text-red-500">{{ $errors->first('mobileNumber') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="Address" class="my-label">Address</label>
                                <input type="text" wire:model="address" placeholder="Address" id="Address" name="address" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('address'))
                                    <div class="text-red-500">{{ $errors->first('address') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="Email" class="my-label">Email</label>
                                <input type="text" wire:model="email" placeholder="Email" id="Email" name="email" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('email'))
                                    <div class="text-red-500">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="gMobile" class="my-label">Guardian Mobile No.</label>
                                <input type="text" wire:model="gMobile" placeholder="Guardian Mobile No." id="gMobile" name="gMobile" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('gMobile'))
                                    <div class="text-red-500">{{ $errors->first('gMobile') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="Qualification" class="my-label">Qualification</label>
                                <input type="text" wire:model="qualification" placeholder="Qualification" id="Qualification" name="qualification" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('qualification'))
                                    <div class="text-red-500">{{ $errors->first('qualification') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="Profession" class="my-label">Profession</label>
                                <input type="text" wire:model="profession" placeholder="Profession" id="Profession" name="profession" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('profession'))
                                    <div class="text-red-500">{{ $errors->first('profession') }}</div>
                                @endif
                            </div>

                            <div class="mb-1">
                                <label for="courseId" class="my-label">Course Name</label>
                                <select name="courseId" wire:model.live="courseId" id="courseId" class="my-input focus:outline-none focus:shadow-outline">
                                    <option value="">Select Course</option>
                                    @foreach ($course as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $courseId) selected @else '' @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('courseId'))
                                    <div class="text-red-500">{{ $errors->first('courseId') }}</div>
                                @endif
                            </div>

                            <div class="mb-1">
                                <label for="Discount" class="my-label">Discount Coupon</label>
                                <input type="text" wire:model.live="discount" placeholder="Discount" id="Discount" name="discount" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('discount'))
                                    <div class="text-red-500">{{ $errors->first('discount') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="paymentType" class="my-label">Payment Type</label>
                                <select name="paymentType" wire:model="paymentType" id="paymentType" class="my-input focus:outline-none focus:shadow-outline">
                                    <option value="">Select Payment Type</option>
                                    <option value="c">Cash</option>
                                    <option value="b">Bkash</option>
                                    <option value="n">Nagad</option>
                                </select>
                                @if ($errors->has('paymentType'))
                                    <div class="text-red-500">{{ $errors->first('paymentType') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="TotalAmount" class="my-label">Total Amount</label>
                                <input type="text" wire:model="totalAmount" placeholder="Total Amount" id="TotalAmount" name="totalAmount" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('totalAmount'))
                                    <div class="text-red-500">{{ $errors->first('totalAmount') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="totalPay" class="my-label">Total Pay</label>
                                <input type="text" wire:model.live="totalPay" placeholder="Total Pay" id="totalPay" name="totalPay" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('totalPay'))
                                    <div class="text-red-500">{{ $errors->first('totalPay') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="totalDue" class="my-label">Total Due</label>
                                <input type="text" wire:model="totalDue" placeholder="Total Due" id="totalDue" name="totalDue" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('totalDue'))
                                    <div class="text-red-500">{{ $errors->first('totalDue') }}</div>
                                @endif
                            </div>
                            <div class="mb-1">
                                <label for="paymentNumber" class="my-label">Payment Number <small class="text-green-500 font-thin">(When Paid With BKash/Nagad)</small></label>
                                <input type="text" wire:model="paymentNumber" placeholder="Payment Number" id="paymentNumber" name="paymentNumber" class="my-input focus:outline-none focus:shadow-outline">
                                @if ($errors->has('paymentNumber'))
                                    <div class="text-red-500">{{ $errors->first('paymentNumber') }}</div>
                                @endif
                            </div>
                            <div class="mb-1 ">
                                <label for="admissionFee" class="cursor-pointer w-full block group text-gray-700 font-bold mt-0 md:mt-9">
                                <input type="checkbox" wire:model="admissionFee" value="y" name="admissionFee" id="admissionFee" class="cursor-pointer mr-2 leading-tight">
                                <span class="text-gray-700 dark:text-white group-checked:text-green-600 text-sm font-bold mb-2">Admission Fee 100 TK</span>
                                </label>
                                @if ($errors->has('admissionFee'))
                                    <div class="text-red-500">{{ $errors->first('admissionFee') }}</div>
                                @endif
                            </div>
                            <br><br>
                            <div class="flex  items-center mt-8 mb-1">
                                <button wire:click="removeModal" type="button" class="shadow btn bg-gray-50 dark:bg-gray-800">Discard</button>
                                <button type="submit" class="bg-gray-900 text-white btn ltr:ml-4 rtl:mr-4">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js') 
    <script>
        function onWheel(event) {
            const delta = Math.sign(event.deltaY || event.wheelDelta);
            const scrollContainer = event.currentTarget;
            const scrollLeft = scrollContainer.scrollLeft;

            // Calculate the new scroll position
            const newScrollLeft = scrollLeft + delta * 300;

            // Update the scroll position
            scrollContainer.scrollLeft = newScrollLeft;
        }
    </script>
    @endpush
</div>
