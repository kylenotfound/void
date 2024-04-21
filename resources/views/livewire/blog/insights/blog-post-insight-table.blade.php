<div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $post->title  }} - Details.
            </h2>
            <x-buttons.link href="{{ route('blog.index') }}" class="bg-purple-500 hover:bg-purple:800 dark:bg-purple-500 dark:hover:bg-purple-800">
                {{ __('Go Back') }}
            </x-buttons>
        </div>
    </x-slot>

    <section>
        <x-tables.search-and-count></x-tables>
        <table class="min-w-full divide-y divide-gray-200 mb-2">
            <thead>
                <tr>
                    <x-tables.col-header column="ip">Ip Address</x-tables>
                    <x-tables.col-header column="username">User</x-tables>
                    <x-tables.col-header column="created_at">Read At</x-tables>
                    <x-tables.col-header column="action" :canSort="false">Action</x-tables>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewers as $viewer)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $viewer->ip }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $viewer->user?->username }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ $viewer->read_at }}
                        </td>
                        <td>
                            <livewire:blog.insights.delete-post-view :postView="$viewer" wire:key="{{ $viewer->getKey() }}" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <div class="m-2 p-4">
            {{ $viewers->withQueryString()->links() }}
        </div>
    </section>
</div>