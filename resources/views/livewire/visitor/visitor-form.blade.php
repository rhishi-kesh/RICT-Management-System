<div class="pt-5">
    <form wire:submit="submit" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Visitor Form</h2>
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">

            <div class="mb-1" wire:ignore>
                <label for="counseling" class="my-label">Counseling</label>
                <select id="counseling" wire:model="counseling"
                class="my-input focus:outline-none focus:shadow-outline" name="counseling">
                @foreach ($counciling as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                </select>
                @if ($errors->has('counseling'))
                    <div class="text-red-500">{{ $errors->first('counseling') }}</div>
                @endif
            </div>
            <div class="mb-1" wire:ignore>
                <label for="status" class="my-label">Status</label>
                <select id="status" wire:model="status"
                class="my-input focus:outline-none focus:shadow-outline" name="status[]">
                    <option value="Admitted">Admitted</option>
                    <option value="Processing">Processing</option>
                    <option value="Not Admitted">Not Admitted</option>
                    <option value="Cancel">Cancel</option>
                </select>
                @if ($errors->has('status'))
                    <div class="text-red-500">{{ $errors->first('status') }}</div>
                @endif
            </div>
            
            <div class="mb-1">
                <label for="name" class="my-label">Name</label>
                <input type="text" wire:model="name" placeholder="Name" id="name" name="name"
                    class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('name'))
                    <div class="text-red-500">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="mb-1">
                <label for="mobile" class="my-label">Mobile Number</label>
                <input type="text" wire:model="mobile" placeholder="Mobile Number" id="mobile"
                    name="mobile" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('mobile'))
                    <div class="text-red-500">{{ $errors->first('mobile') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="Email" class="my-label">Email</label>
                <input type="text" wire:model="email" placeholder="Email" id="Email" name="email"
                    class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('email'))
                    <div class="text-red-500">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="course_name" class="my-label">Course Name</label>
                <select name="course_name" wire:model.live="course_name" id="course_name"
                    class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select Course</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('course_name'))
                    <div class="text-red-500">{{ $errors->first('course_name') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="Address" class="my-label">Address</label>
                <input type="text" wire:model="address" placeholder="Address" id="Address" name="address"
                    class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('address'))
                    <div class="text-red-500">{{ $errors->first('address') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="amount" class="my-label">Total Amount</label>
                <input type="text" wire:model="amount" placeholder="Total Amount" id="amount"
                    name="amount" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('amount'))
                    <div class="text-red-500">{{ $errors->first('amount') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="visitor_comment" class="my-label">Visitor Comment</label>
                <input type="text" wire:model="visitor_comment" placeholder="visitor_comment"
                    id="visitor_comment" name="visitor_comment"
                    class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('visitor_comment'))
                    <div class="text-red-500">{{ $errors->first('visitor_comment') }}</div>
                @endif
            </div>

            <div class="mb-1">
                <label for="gender" class="my-label">Gender</label>
                <div class="flex">
                    <div class="flex items-center me-4">
                        <input  wire:model="selectedOption" id="inline-radio" type="radio" value="male" name="inline-radio-group"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="inline-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male
                        </label>
                    </div>
                    <div class="flex items-center me-4">
                        <input wire:model="selectedOption" id="inline-2-radio" type="radio" value="female" name="inline-radio-group"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="inline-2-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                    </div>
                    <div class="flex items-center me-4">
                        <input wire:model="selectedOption" id="inline-checked-radio" type="radio" value="Others"
                            name="inline-radio-group"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="inline-checked-radio"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Others</label>
                    </div>
                </div>
            </div>

            <div class="mb-1">
                <label for="ref_name" class="my-label">Reference name</label>
                <input type="text" wire:model="ref_name" placeholder="ref_name" id="ref_name" name="ref_name"
                    class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('ref_name'))
                    <div class="text-red-500">{{ $errors->first('ref_name') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="admission_booth_name" class="my-label">Admission Booth Name</label>
                <select name="admission_booth_name" wire:model.live="admission_booth_name" id="admission_booth_name"
                    class="my-input focus:outline-none focus:shadow-outline">
                    <option value="">Select Course</option>
                    @foreach ($admissionBooth as $booth)
                        <option value="{{ $booth->id }}">{{ $booth->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('admission_booth_name'))
                    <div class="text-red-500">{{ $errors->first('admission_booth_name') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="admission_booth_number" class="my-label">Admission Booth Number</label>
                <input type="text" wire:model="admission_booth_number" placeholder="Guardian Mobile No."
                    id="admission_booth_number" name="admission_booth_number"
                    class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('admission_booth_number'))
                    <div class="text-red-500">{{ $errors->first('admission_booth_number') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="calling_person" class="my-label">Calling Person</label>
                <select name="calling_person" wire:model.live="calling_person" id="calling_person"
                    class="my-input focus:outline-none focus:shadow-outline">
                    <option> Select person</option>
                    @foreach ($counciling as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach

                </select>
                @if ($errors->has('calling_person'))
                    <div class="text-red-500">{{ $errors->first('calling_person') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="commentscomments" class="my-label">Comments</label>
                <input type="text" wire:model="comments" placeholder="Guardian Mobile No." id="comments"
                    name="comments" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('comments'))
                    <div class="text-red-500">{{ $errors->first('comments') }}</div>
                @endif
            </div>
            <div  class="mb-1">
                <input type="submit" value="Submit"
                    class="uppercase btn bg-blue-500 border-none mt-7 text-white cursor-pointer">
            </div>
        </div>
    </form>
</div>
