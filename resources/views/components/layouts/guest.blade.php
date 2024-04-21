@include('components.layouts.partials.header')

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
    <div class="mb-2">
        <x-application-logo :href="route('home')" class="text-4xl" />
    </div>

    <div class="w-full sm:max-w-md mt-3 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>

@include('components.layouts.partials.footer')
