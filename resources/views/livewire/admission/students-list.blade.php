
<div class="pt-5">
<div class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-6 pt-6 pb-8 mb-4 w-full">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Students List</h2>
        <hr>
        <div class="flex item-center justify-between d p-6">
            <div class="flex">
                <div class="relative w-full">
                    <input wire:model.live.debounch.300ms="search" type="text" class="bg-gray-50 border border-gray-300" placeholder="Search" >
                </div>
            </div>
        </div>
        <div>
            <div class="overflow-auto">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Father Name</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Mother Name</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Mobile Number</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Address</th>
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Email</th>
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
                            <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['student_id']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['name']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['fName']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['mName']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['mobile']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['address']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['email']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['guardianMobileNo']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['qualification']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['profession']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['courseName']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['discount']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['paymentType']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['total']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['pay']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['due']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['paymentNumber']}} </td>
                                <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center"> {{ $student['admissionFee']}} </td>

                                    <!-- {{-- Edit Button --}} -->

                                    <!-- <button  type="button" x-tooltip="Edit" wire:click="ShowUpdateModel()">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-pencil text-green-500"><path class="text-green-500" stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" /><path d="M13.5 6.5l4 4" /></svg>
                                    </button> -->


                                    <!-- {{-- Delete Button --}} -->

                                    <!-- <button type="button" x-tooltip="Delete" wire:click="deleteAlert()">
                                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-red-500"><path class="text-red-500" stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path class="text-red-500" d="M10 11l0 6" /><path class="text-red-500" d="M14 11l0 6" /><path class="text-red-500" d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path class="text-red-500" d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                    </button> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="py-4 px-3">
                <div class="flex">
                    <div class="flex space-x-4 item-center mb-3">
                        <label for="">Previous Page</label>
                        <select wire:model.live="prepage">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                </div>
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>
