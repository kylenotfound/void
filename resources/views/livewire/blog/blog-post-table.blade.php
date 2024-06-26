<div>
    <div>
        <x-tables.search-and-count></x-tables>
        <table class="min-w-full divide-y divide-gray-200 mb-2">
            <thead>
                <tr>
                    <x-tables.col-header column="title">Title</x-tables>
                    <x-tables.col-header column="view_count">View Count</x-tables>
                    <x-tables.col-header column="created_at">Published At</x-tables>
                    <x-tables.col-header column="action" :canSort="false" >Action</x-tables>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr wire:key="post-{{ $post->getKey() }}">
                        <td class="whitespace-no-wrap">
                            <a class="inline-block px-4 py-2 text-blue-500 hover:text-blue-700" target="_blank" href="{{ route('blog.post.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $post->view_count }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap">{{ $post->created_at->format('m/d/Y') }}</td>
                        <td>
                            <div class="flex">
                                <div class="mr-2">
                                    <x-buttons.link href="{{ route('blog.post.show', ['post' => $post->slug]) }}" class="bg-purple-500 hover:bg-purple-800 dark:bg-purple-500 dark:hover:bg-purple-800">
                                        <x-icons.eye></x-icons>
                                    </x-buttons>
                                </div>
                                <div class="mr-2">
                                    <x-buttons.link href="{{ route('blog.edit', ['blog' => $post->slug]) }}" class="bg-green-300 hover:bg-green-600 dark:bg-green-300 dark:hover:bg-green-600">
                                        <x-icons.pencil></x-icons>
                                    </x-buttons>
                                </div>
                                <div class="mr-2">
                                    <livewire:blog.delete-blog-post :entity="$post" wire:key="delete-button-{{ $post->getKey() }}" />
                                </div>
                                <div class="mr-2">
                                    <x-buttons.link href="{{ route('blog.insights', ['slug' => $post->slug]) }}" class="bg-yellow-300 hover:bg-yellow-500 dark:bg-yellow-300 dark:hover:bg-yellow-500">
                                        <x-icons.stats></x-icons>
                                    </x-buttons>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <hr>

    <div class="m-2 p-4">
        {{ $posts->withQueryString()->links() }}
    </div>
</div>
