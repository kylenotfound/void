<div class="flex justify-between pb-4">
    <div class="w-1/2">
        <x-forms.text-input
            class="w-full"
            placeholder="Search..."
            wire:model.live="search" 
        />
    </div>
    <select class="appearance-none bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 dark:focus:border-gray-400" wire:model.live="rowCount">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
    </select>
</div>