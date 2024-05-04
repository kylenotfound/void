<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section>
        <div class="m-4 p-4">
            @if (auth()->user()->isAdmin())
                <div class="bg-white dark:bg-gray-700 shadow-md rounded-lg p-6 mb-4">
                    <div>
                        <div class="flex justify-between mb-2">
                            <div>
                                <h2 class="text-4xl font-semibold custom-underline">
                                    User Manager
                                </h2>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('users.manage') }}" class="text-2xl">
                                    <i class="fa-regular fa-user"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-700 border-gray-200 dark:border-gray-100 shadow-md rounded-lg p-6 mb-4">
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
            @endif
        </div>
    </section>
</x-app-layout>
