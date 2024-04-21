<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Write something great!') }}
        </h2>
    </x-slot>

    <section>
        <div class="p-6">
            <div class="grid grid-cols-2 justify-between">
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input 
                        id="title" 
                        class="block mt-1 w-full mb-4"
                        type="text"
                        name="title"
                        required
                    />
                </div>
                <div class="flex justify-end mt-4 mb-4">
                    <x-buttons.primary onclick="clearEditor()">
                        Clear Editor
                    </x-buttons.primary>
                </div>
            </div>
            <div>
                <x-custom.toast />
            </div>
        </div>
    </section>
    
    @push('scripts')
        @vite('resources/js/toast.js')
    @endpush
</x-app-layout>