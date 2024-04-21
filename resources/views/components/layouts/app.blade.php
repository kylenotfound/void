@include('components.layouts.partials.header')

<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @auth
        @include('components.layouts.nav.auth')
    @else
        @include('components.layouts.nav.guest')
    @endauth

    <!-- Page Content -->
    <main>
        @if (isset($header))
            <!-- Page Heading -->
            <section class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <header class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            </section>
        @endif
        
        <!-- Page Body -->
        <section>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-gray-900 dark:text-gray-100">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

@stack('scripts')
@include('components.layouts.partials.footer')
