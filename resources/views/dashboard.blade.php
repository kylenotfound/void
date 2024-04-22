<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section>
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <div>
                <div class="flex justify-between mb-2">
                    <div>
                        <h2 class="text-4xl font-semibold custom-underline">
                            Blog Posts
                        </h2>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('blog.index') }}" class="text-2xl">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
