<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit your post. Make it even greater!') }}
            </h2>
            <x-buttons.link href="{{ route('blog.index') }}" class="bg-purple-500 hover:bg-purple:800 dark:bg-purple-500 dark:hover:bg-purple-800">
                {{ __('Go Back') }}
            </x-buttons>
        </div>
    </x-slot>

    <section>
        <div class="p-6">
            <form action="{{ route('blog.update', ['blog' => $post->getKey()]) }}" method="POST" id="postForm">
                @csrf
                @method('patch')
                <div class="grid grid-cols-2 justify-between">
                    <div>
                        <x-forms.input-label for="title" :value="__('Title')" />
                        <x-forms.text-input 
                            id="title" 
                            class="block mt-1 w-full mb-4"
                            type="text"
                            name="title"
                            :value="$post->title"
                            autocomplete="title"
                            required
                        />
                        <x-forms.input-error :messages="$errors->get('title')" class="mt-2 mb-2" />
                    </div>
                    <div class="flex justify-end mt-4 mb-4">
                        <x-buttons.primary class="mr-2" type="submit">
                            Update
                        </x-buttons.primary>
                        
                        <x-buttons.danger type="button" id="clear-editor-btn">
                            <x-icons.trash></x-icons>
                        </x-buttons.danger>
                    </div>
                </div>
                <div>
                    <x-custom.toast :content="$post->content" />
                </div>
            </form>
        </div>
    </section>
    
    @push('scripts')
        @vite('resources/js/toast.js')
    @endpush
</x-app-layout>