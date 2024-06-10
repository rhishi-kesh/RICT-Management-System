<div class="pt-4">
    <form wire:submit="update" class="bg-white dark:bg-slate-900 shadow-md rounded px-4 md:px-8 pt-6 pb-8 mb-4"
        method="post">
        <h3 class="mb-2 font-bold text-3xl dark:text-white">Course Edit</h3>
        <hr class="mb-8">
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
                    <label for="duration" class="my-label"> Duration (Month) </label>
                    <input type="number" wire:model="duration" placeholder="Course duration" id="duration"
                        class="my-input focus:outline-none focus:shadow-outline">
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
                <label for="video" class="my-label">Video</label>
                <input type="url" wire:model="video" placeholder="video" id="video"
                    class="my-input focus:outline-none focus:shadow-outline appearance-none">
                @if ($errors->has('video'))
                    <div class="text-red-500">{{ $errors->first('video') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label for="department_id" class="my-label">Department Name</label>
                <select name="department_id" wire:model.live.debounce.1000ms="department_id" id="department_id"
                    class="my-input focus:outline-none focus:shadow-outline appearance-none bg-white">
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
                <label for="description" class="my-label">description</label>
                <textarea wire:model="description" placeholder="description" class="my-input focus:outline-none focus:shadow-outline appearance-none" name="description" id="description" cols="5" rows="1">
                </textarea>
                @if ($errors->has('description'))
                    <div class="text-red-500">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div class="mb-1">
                <label class="col-form-label pt-0" for="image">Thumbnail</label>
                <input wire:model="image" class="my-input focus:outline-none focus:shadow-outline appearance-none block form-control @error('image') is-invalid @enderror" id="image"
                    type="file">
                <div wire:loading="" wire:target="image" class="text-green-500">
                    Uploading Image...
                </div>
                @if ($image)
                    <div>
                        <img width="80" class="mt-1" src="{{ $image->temporaryUrl() }}" alt="">
                    </div>
                @else
                    <div>
                        <img width="80" class="mt-1" src="{{ asset('storage/' . $oldimage) }}" alt="">
                    </div>
                @endif
                @if ($errors->has('image'))
                    <div class="text-red-500">{{ $errors->first('image') }}</div>
                @endif
            </div>
            
        </div>
        <div class="flex justify-end items-center mt-4">
            <a href="{{ route('course') }}"  class="flex justify-center bg-gray-900 text-white text-bold btn ml-4">
                <span class="ml-2">Back</span>
                </a>
            <button type="submit" class="bg-gray-900 text-white text-bold btn ml-4" wire:loading.remove>Save</button>
            <button type="button" disabled class="bg-gray-900 text-white btn ml-4" wire:loading>Loading</button>
        </div>
    </form>
</div>
