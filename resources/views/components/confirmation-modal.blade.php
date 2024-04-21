<div {{ $attributes }} 
    x-data="{ show: @entangle($attributes->wire('model')) }" 
    x-show="show"
    x-show.transition="show"
    @keydown.escape.window="show = false"
    style="display: none;"
>
    <div class="fixed inset-0 bg-gray-900 dark:bg-gray-400 opacity-90" @click="show = false"></div>

    <div class="bg-white dark:bg-gray-600 shadow-md max-w-md h-48 m-auto rounded-md fixed inset-0" x-show="show" x-transition>
        <div class="flex flex-col h-full justify-between">
            <header class="p-4">
                <h3 class="font-bold text-lg">
                    {{ $title }}
                </h3>
            </header>

            <main class="p-4">
                <p>{{ $body }}</p>
            </main>

            <footer class="flex justify-end pb-2 rounded-b-md">
                {{ $footer }}
            </footer>
        </div>
    </div>
</div>