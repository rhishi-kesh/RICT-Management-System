<div class="pt-5">
    @push('css')
        <link rel="stylesheet" href="{{ asset('frontend/css/nice-select2.css') }}">
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
        </style>
    @endpush
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
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
            <div class="mb-1" wire:ignore>
                <label for="classday" class="my-label">Class Day</label>
                <select id="classday" wire:model="classday" class="my-input focus:outline-none focus:shadow-outline p-0" name="classday[]" multiple>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                </select>
                @if ($errors->has('classday'))
                    <div class="text-red-500">{{ $errors->first('classday') }}</div>
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
            <div>
                <input type="submit" value="Admit" class="uppercase btn bg-blue-500 border-none text-white cursor-pointer">
            </div>
        </div>
    </form>
    @push('js')
    <script src="{{ asset('frontend/js/nice-select2.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            // seachable
            var options = {
                searchable: true
            };
            NiceSelect.bind(document.getElementById("classday"), options);
        });
    </script>
    @endpush
</div>
