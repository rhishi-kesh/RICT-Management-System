<div class="bg-white dark:bg-slate-900 shadow-md rounded px-8 md:px-8 pt-6 pb-8 mb-4 w-full">
    <h2 class="mb-2 font-bold text-3xl dark:text-white text-blue-500">Courses</h2>
    <hr>
    <div>
        {{-- Show Data --}}
        <div class="overflow-x-auto ">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">SL</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Name</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Show In Website</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Show In Website Footer</th>
                        <th class="p-3 bg-gray-100 dark:bg-gray-800 text-center">Best Selling Course</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $key => $item)
                        <tr>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $courses->firstItem() + $key }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                {{ $item->name }}
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                <div class="flex justify-center items-center">
                                    <label class="w-12 h-6 relative">
                                        <input type="checkbox" class="checkbox peer" id="custom_switch_checkbox6" @if($item->is_web == 0) checked @else  @endif wire:click="showOnWebsite({{ $item->id }})">
                                        <span for="custom_switch_checkbox6" class="checkboxSpan"></span>
                                    </label>
                                </div>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                <div class="flex justify-center items-center">
                                    <label class="w-12 h-6 relative">
                                        <input type="checkbox" class="checkbox peer" id="custom_switch_checkbox6" @if($item->is_footer == 0) checked @else  @endif wire:click="ShowOnWebsiteFooter({{ $item->id }})">
                                        <span for="custom_switch_checkbox6" class="checkboxSpan"></span>
                                    </label>
                                </div>
                            </td>
                            <td class="p-3 border-b border-[#ebedf2] dark:border-[#191e3a] text-center">
                                <div class="flex justify-center items-center">
                                    <label class="w-12 h-6 relative">
                                        <input type="checkbox" class="checkbox peer" id="custom_switch_checkbox6" @if($item->best_selling == 0) checked @else  @endif wire:click="bestSelling({{ $item->id }})">
                                        <span for="custom_switch_checkbox6" class="checkboxSpan"></span>
                                    </label>
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
