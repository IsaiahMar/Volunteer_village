<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900">Name: {{ $user->name }}</h3>
                <h3 class="text-lg font-medium text-gray-900">Email: {{ $user->email }}</h3>
                <h3 class="text-lg font-medium text-gray-900">Role: {{ $user->role }}</h3>
                <h3 class="text-lg font-medium text-gray-900">Total Volunteer Hours: {{ $totalHours }}</h3>
            </div>
        </div>
    </div>
</x-app-layout>
