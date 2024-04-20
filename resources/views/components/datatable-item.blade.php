<div class="flex items-center justify-center">
    {{$columnName}}
    @if ($sortColumn !== $columnName)
        <x-heroicon-c-chevron-up-down class="w-5 h-5"/>
    @elseif ($sortDirection === 'ASC')
        <x-heroicon-c-chevron-down class="w-4 h-4"/>
    @else
        <x-heroicon-c-chevron-up class="w-4 h-4"/>
    @endif
</div>
