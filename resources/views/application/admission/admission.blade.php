@extends('layout/index')
@section('content')
<div x-data="sales">
    <ul class="flex space-x-2 rtl:space-x-reverse">
        <li>
            <span>Dashboard</span>
        </li>
    </ul>
    <div class="pt-5">
        <form action="#" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
            <h2 class="mb-2 font-bold text-3xl dark:text-white">Admission Form</h2>
            <hr>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
                <div class="mb-1">
                    <label for="Name" class="my-label">Name</label>
                    <input type="text" name="name" placeholder="Name" id="Name" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="FatherName" class="my-label">Father Name</label>
                    <input type="text" placeholder="Father Name" id="FatherName" name="fatherName" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="MotherName" class="my-label">Mother Name</label>
                    <input type="text" placeholder="Mother Name" id="MotherName" name="motherName" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="MobileNumber" class="my-label">Mobile Number</label>
                    <input type="text" placeholder="Mobile Number" id="MobileNumber" name="mobileNumber" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="Address" class="my-label">Address</label>
                    <input type="text" placeholder="Address" id="Address" name="address" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="Email" class="my-label">Email</label>
                    <input type="text" placeholder="Email" id="Email" name="email" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="gMobile" class="my-label">Guardian Mobile No.</label>
                    <input type="text" placeholder="Guardian Mobile No." id="gMobile" name="gMobile" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="Qualification" class="my-label">Qualification</label>
                    <input type="text" placeholder="Qualification" id="Qualification" name="qualification" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="Profession" class="my-label">Profession</label>
                    <input type="text" placeholder="Profession" id="Profession" name="profession" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="courseName" class="my-label">Course Name</label>
                    <select name="courseName" id="courseName" class="my-input focus:outline-none focus:shadow-outline">
                        <option value="">Select Course</option>
                    </select>
                </div>
                <div class="mb-1">
                    <label for="Discount" class="my-label">Discount</label>
                    <input type="text" placeholder="Discount" id="Discount" name="discount" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="paymentType" class="my-label">Payment Type</label>
                    <select name="paymentType" id="paymentType" class="my-input focus:outline-none focus:shadow-outline">
                        <option value="">Payment Type</option>
                    </select>
                </div>
                <div class="mb-1">
                    <label for="TotalAmount" class="my-label">Total Amount</label>
                    <input type="text" placeholder="Total Amount" id="TotalAmount" name="totalAmount" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="totalPay" class="my-label">Total Pay</label>
                    <input type="text" placeholder="Total Pay" id="totalPay" name="totalPay" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="totalDue" class="my-label">Total Due</label>
                    <input type="text" placeholder="Total Due" id="totalDue" name="totalDue" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1">
                    <label for="BkashNumber" class="my-label">Bkash Number</label>
                    <input type="text" placeholder="Bkash Number" id="BkashNumber" name="bkashNumber" class="my-input focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-1 ">
                    <label for="admissionFee" class="cursor-pointer w-full block text-gray-700 font-bold mt-0 md:mt-9">
                    <input type="checkbox" name="admissionFee group" id="admissionFee" class="cursor-pointer mr-2 leading-tight">
                    <span class="text-gray-700 dark:text-white group-checked:text-green-600 text-sm font-bold mb-2">Admission Fee 100 TK</span>
                    </label>
                </div>
                <div></div>
                <div>
                    <input type="submit" value="Admit" class="uppercase btn bg-gray-900 text-white dark:bg-white dark:text-black cursor-pointer">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
