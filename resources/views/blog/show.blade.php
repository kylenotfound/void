<x-app-layout>
    @section('title')
        {{ $post->title }}
    @endsection

    @section('description')
        {{ substr($post->content, 0, 100) }}
    @endsection

    <x-slot name="header">
        <div class="flex justify-between mb-2">
            <div>
                <h2 class="font-semibold text-4xl text-gray-800 dark:text-gray-200 leading-tight custom-underline mb-2">
                    {{ $post->title }}
                </h2>
            </div>
            <div></div>
        </div>

        <span class="text-gray-800 dark:text-gray-100 mr-12">
            📅 {{ $post->created_at->format('d M Y') }}
        </span>
        <span class="text-gray-800 dark:text-gray-100 mr-12">
            <a target="_blank" href="https://www.github.com/kylenotfound">
                👨🏻‍💻 {{ $post->author->username }}
            </a>
        </span>
        <span class="text-gray-800 dark:text-gray-100">
            👁️ {{ $post->view_count }}
        </span>
    </x-slot>

    <section>
        <div class="p-6">
            <article class="prose dark:prose-invert p-2">
                {!! Str::of($post->content)->markdown() !!}
            </article>
        </div>
    </section>
</x-app-layout>