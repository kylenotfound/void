<x-app-layout>
    <section>
        <x-slot name="header">
            <h1 class="font-semibold text-3xl text-gray-800 dark:text-gray-200">My Writings</h1>
        </x-slot>
    </section>
    <section>
        <div class="p-6">
            @forelse ($posts as $post)
                <div class="m-4 p-4">
                    <a href="{{ route('blog.post.show', ['post' => $post->slug]) }}">
                        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight mb-2">{{ $post->title }}</h2>
                    </a>
                </div>
            @empty
                <span>No Posts Found.</span>
            @endforelse
        </div>
    </section>
</x-app-layout>