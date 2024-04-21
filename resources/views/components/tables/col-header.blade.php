@props([
    'column', 
    'canSort' => true
])

<th 
    class="px-6 py-3 bg-gray-50 dark:bg-gray-800 dark:text-gray-200 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider" 
    @if($canSort) wire:click="sortBy('{{ $column }}')" @endif
>
    {{ $slot }}
</th>