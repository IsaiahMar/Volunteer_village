@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <!-- School Header -->
        <div class="bg-blue-600 px-6 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-white">{{ $school->name }}</h1>
                @if($school->is_approved)
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-100 text-green-800">
                        Approved
                    </span>
                @else
                    <span class="px-3 py-1 text-sm font-semibold rounded-full bg-yellow-100 text-yellow-800">
                        Pending Approval
                    </span>
                @endif
            </div>
        </div>

        <!-- School Details -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Contact Information -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Contact Information</h2>
                    <div class="space-y-3">
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="text-gray-800">{{ $school->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Phone</p>
                            <p class="text-gray-800">{{ $school->phone }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Principal</p>
                            <p class="text-gray-800">{{ $school->principal_name }}</p>
                        </div>
                    </div>
                </div>

                <!-- Address Information -->
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Address</h2>
                    <div class="space-y-3">
                        <div>
                            <p class="text-gray-800">{{ $school->address }}</p>
                            <p class="text-gray-800">{{ $school->city }}, {{ $school->state }} {{ $school->zip_code }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Student Count</p>
                            <p class="text-gray-800">{{ $school->student_count ?? 'Not specified' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="col-span-2">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Description</h2>
                    <p class="text-gray-700 whitespace-pre-line">{{ $school->description ?? 'No description provided' }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('schools.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg">
                    Back to List
                </a>
                @can('update', $school)
                    <a href="{{ route('schools.edit', $school) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                        Edit
                    </a>
                @endcan
                @can('approve', $school)
                    @if(!$school->is_approved)
                        <form action="{{ route('schools.approve', $school) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg">
                                Approve School
                            </button>
                        </form>
                    @endif
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
