<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Blog Posts') }}
        </h2>
    </x-slot>

    <section>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <livewire:blog.blog-post-table />
        </div>
    </section>
</x-app-layout>