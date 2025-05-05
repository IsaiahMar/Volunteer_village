@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>
                <p class="mb-6">Welcome to the Volunteer Village admin panel.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('leaderboard') }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white p-4 rounded-lg transition">
                        <h2 class="text-xl font-semibold">View Leaderboard</h2>
                        <p class="mt-2">Check student volunteer rankings</p>
                    </a>
                    
                    <a href="{{ route('admin.users') }}" 
                       class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-lg transition">
                        <h2 class="text-xl font-semibold">Manage Users</h2>
                        <p class="mt-2">Administer user accounts</p>
                    </a>

                    <a href="{{ route('admin.schools.index') }}" 
                       class="bg-purple-500 hover:bg-purple-600 text-white p-4 rounded-lg transition">
                        <h2 class="text-xl font-semibold">Manage Schools</h2>
                        <p class="mt-2">View and manage schools</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
