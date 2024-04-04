<div class="pt-5">
    <div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-6 pt-6 pb-8 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Students List</h2>
        <hr>
        <div class="flex item-center justify-between d p-6">
            <div class="grid grid-cols-12 gap-2">
                <div class="col-start-2 col-span-2">
                        <div class="flex space-x-4 item-center mb-3">
                           <h1>show</h1>
                            <select wire:model.live="perpage">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </select>
                            <h1>entries</h1>
                        </div>
                </div>
                <div class="col-end-12 col-span-2">
                    <div class="flex space-x-4 item-center mb-3">
                        <h1 class="" style="font-size: 15px;">search</h1>
                        <input wire:model.live.debounch.300ms="search" type="text"
                            class="peer w-full h-full bg-gray-100 dark:bg-slate-800 ps-10 py-2 rounded border dark:border-gray-700 focus:outline-none dark:focus:border-blue-500 focus:border"
                            placeholder="Search..." />
                        <button type="button"
                            class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-blue-500 ltr:right-auto rtl:left-auto">
                            <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5"
                                    opacity="0.5" />
                                <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div style="overflow: auto;">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                        <th wire:click="doSort('student_id')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center"><x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="student_id" /> </th>
                        <th wire:click="doSort('name')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center "> <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="name" /> </th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Father Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Mother Name</th>
                        <th wire:click="doSort('mobile')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center ">
                            <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="mobile" /> </th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Address</th>
                        <th wire:click="doSort('email')" class="p-3 bg-gray-100 dark:bg-gray-800 text-center ">
                            <x-datatable-item :sortColumn="$sortColumn" :sortDirection="$sortDirection" columnName="email" /> </th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Guardian Mobile No.</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Qualification</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Profession</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Course Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Discount</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Payment Type</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Total Amount</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Total Pay</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Total Due</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Payment Number</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Admission Fee</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{$student['id']}} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['student_id'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['name'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['fName'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['mName'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['mobile'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['address'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['email'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['guardianMobileNo'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['qualification'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['profession'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['courseName'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['discount'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['paymentType'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['total'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['pay'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['due'] }} </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['paymentNumber'] }} </td>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $student['admissionFee'] }} </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $students->links() }}
    </div>
</div>
