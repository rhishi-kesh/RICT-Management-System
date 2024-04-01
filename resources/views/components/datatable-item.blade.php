<div class="flex items-center">
    {{$columnName}}
    @if ($sortColumn !== $columnName)
        <x-heroicon-s-chevron-up-down class="w-6 h-6" />
    @elseif ($sortDirection === 'ASC')
        <x-heroicon-s-chevron-down class="w-4 h-4" />
    @else
        <x-heroicon-s-chevron-up class="w-6 h-6" />
    @endif
</div>