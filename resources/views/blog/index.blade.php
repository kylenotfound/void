<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Blog Posts') }}
                </h2>
            </div>
            <div>
                <x-buttons.link href="{{ route('blog.create') }}">
                    {{ __('Write a new post') }}
                </x-buttons.link>
            </div>
        </div>
    </x-slot>

    <section>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <livewire:blog.blog-post-table />
        </div>
    </section>
</x-app-layout>