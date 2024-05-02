<div class="pt-5">
    <form wire:submit="submit" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4">
        <h2 class="mb-2 font-bold text-3xl dark:text-white">Visitor Form</h2>
        <hr>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-3">
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
                <input type="number" wire:model="mobile" placeholder="Mobile Number" id="mobile"
                    name="mobile" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('mobile'))
                    <div class="text-red-500">{{ $errors->first('mobile') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="Email" class="my-label">Email</label>
                <input type="email" wire:model="email" placeholder="Email" id="Email" name="email"
                    class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('email'))
                    <div class="text-red-500">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="course_name" class="my-label">Course Name</label>
                <select name="course_name" wire:model="course_name" id="course_name" class="my-input focus:outline-none focus:shadow-outline">
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
                <label for="amount" class="my-label">Amount</label>
                <input type="number" wire:model="amount" placeholder="Amount" id="amount"
                    name="amount" class="my-input focus:outline-none focus:shadow-outline">
                @if ($errors->has('amount'))
                    <div class="text-red-500">{{ $errors->first('amount') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="counseling" class="my-label">Counseling Person</label>
                <select id="counseling" wire:model="counseling" class="my-input focus:outline-none focus:shadow-outline" name="counseling">
                    <option value="">Select Person</option>
                @foreach ($counciling as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
                </select>
                @if ($errors->has('counseling'))
                    <div class="text-red-500">{{ $errors->first('counseling') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="status" class="my-label">Status</label>
                <select id="status" wire:model="status" class="my-input focus:outline-none focus:shadow-outline" name="status[]">
                    <option value="">Select Status</option>
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
                <label for="visitor_comment" class="my-label">Visitor Comment</label>
                <textarea wire:model="visitor_comment" placeholder="Visitor Comment" id="visitor_comment" name="visitor_comment" class="my-input focus:outline-none focus:shadow-outline h-[37px]"></textarea>
                @if ($errors->has('visitor_comment'))
                    <div class="text-red-500">{{ $errors->first('visitor_comment') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="gender" class="my-label">Gender</label>
                <select id="gender" wire:model="gender" class="my-input focus:outline-none focus:shadow-outline" name="gender[]">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">Others</option>
                </select>
                @if ($errors->has('gender'))
                    <div class="text-red-500">{{ $errors->first('gender') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="ref_name" class="my-label">Reference</label>
                <select id="ref_name" wire:model="ref_name" class="my-input focus:outline-none focus:shadow-outline" name="ref_name">
                    <option value="">Select Reference</option>
                    <option value="Admission Booth Reference">Admission Booth Reference</option>
                    <option value="Student Reference">Student Reference</option>
                    <option value="Others">Others</option>
                </select>
                @if ($errors->has('ref_name'))
                    <div class="text-red-500">{{ $errors->first('ref_name') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="admission_booth_name" class="my-label">Admission Booth Name</label>
                <select name="admission_booth_name" wire:model="admission_booth_name" id="admission_booth_name" class="my-input focus:outline-none focus:shadow-outline">
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
                <label for="comments" class="my-label">Comments</label>
                <textarea wire:model="comments" placeholder="Comments" id="comments" name="comments" class="my-input focus:outline-none focus:shadow-outline"></textarea>
                @if ($errors->has('comments'))
                    <div class="text-red-500">{{ $errors->first('comments') }}</div>
                @endif
            </div>
        </div>
        <div class="flex justify-start items-center mt-4">
            <button type="submit" class="bg-gray-900 text-white btn mr-4" wire:loading.remove>Save</button>
            <button type="button" disabled class="bg-gray-900 text-white btn mr-4" wire:loading>Loading</button>
            <button type="reset" class="shadow btn bg-gray-50 dark:bg-gray-800 text-black dark:text-white">Reset</button>
        </div>
    </form>
</div>
