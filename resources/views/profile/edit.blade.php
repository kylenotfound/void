<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="p-4 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.theme-setting')
            </div>
        </div>

        @if (!auth()->user()->is_socialite_user)
            <div class="p-4 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        @endif

        <div class="p-4 sm:p-8">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>

    @push('scripts')
        @vite('resources/js/breeze.js')
    @endpush
</x-app-layout>
