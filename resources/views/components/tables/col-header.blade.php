@props([
    'column', 
    'canSort' => true
])

<th 
    class="py-3 bg-gray-50 dark:bg-gray-800 dark:text-gray-200 text-left text-xs font-medium text-gray-500 tracking-wider" 
    @if($canSort) wire:click="sortBy('{{ $column }}')" @endif
>
    {{ $slot }}
</th>