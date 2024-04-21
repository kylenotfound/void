<a href="{{ $attributes['href'] }}">
    <h5 {{ $attributes->merge(['class' => 'text-2xl mt-1 block h-9 w-auto fill-current text-gray-800 dark:text-gray-200']) }}>
        {{ env('APP_NAME') }}
    </h5>
</a>