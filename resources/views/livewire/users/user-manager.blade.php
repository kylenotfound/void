<x-slot name="header">
    <div class="flex justify-between">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Users') }}
            </h2>
        </div>
    </div>
</x-slot>

<section style="overflow-x: auto;">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <div>
            <x-tables.search-and-count></x-tables>
            <table class="min-w-full divide-y divide-gray-200 mb-2">
                <thead>
                    <tr>
                        <x-tables.col-header column="avatar" :canSort="false"></x-tables>
                        <x-tables.col-header column="username">Username</x-tables>
                        <x-tables.col-header column="email">Email</x-tables>
                        <x-tables.col-header column="type">Type</x-tables>
                        <x-tables.col-header column="created_at">Registered At</x-tables>
                        <x-tables.col-header column="updated_at" :canSort="false">Actions</x-tables>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr wire:key="user-{{ $user->getKey() }}">
                            <td>
                                <img class="p-2" width="40" height="40" src="{{ $user->avatar }}" alt="{{ $user->username }}" />
                            </td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->type ?? 'Void' }}</td>
                            <td>{{ $user->registered_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        <hr>
    
        <div class="m-2 p-4">
            {{ $users->withQueryString()->links() }}
        </div>
    </div>
</section>