@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Schools</h1>
        @can('create', App\Models\School::class)
            <a href="{{ route('schools.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                Add New School
            </a>
        @endcan
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($schools as $school)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium text-gray-900">{{ $school->name }}</div>
                        <div class="text-sm text-gray-500">{{ $school->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($school->is_approved)
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Approved
                            </span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Pending Approval
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('schools.show', $school) }}" class="text-blue-600 hover:text-blue-900 mr-3">View</a>
                        @can('update', $school)
                            <a href="{{ route('schools.edit', $school) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                        @endcan
                        @can('approve', $school)
                            @if(!$school->is_approved)
                                <form action="{{ route('schools.approve', $school) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="text-green-600 hover:text-green-900 mr-3">Approve</button>
                                </form>
                            @endif
                        @endcan
                        @can('delete', $school)
                            <form action="{{ route('schools.destroy', $school) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
