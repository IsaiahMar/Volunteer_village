@extends('layouts.guest')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Create New School</h1>
        
        <form method="POST" action="{{ route('schools.store') }}" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- School Information -->
                <div class="col-span-2">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">School Information</h2>
                </div>
                
                <div class="col-span-2">
                    <label for="name" class="block text-gray-700 font-medium mb-2">School Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" 
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="phone" class="block text-gray-700 font-medium mb-2">Phone *</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- Address Information -->
                <div class="col-span-2 mt-4">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Address Information</h2>
                </div>
                
                <div class="col-span-2">
                    <label for="address" class="block text-gray-700 font-medium mb-2">Address *</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="city" class="block text-gray-700 font-medium mb-2">City *</label>
                    <input type="text" id="city" name="city" value="{{ old('city') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @error('city')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="state" class="block text-gray-700 font-medium mb-2">State *</label>
                    <input type="text" id="state" name="state" value="{{ old('state') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @error('state')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="zip_code" class="block text-gray-700 font-medium mb-2">Zip Code *</label>
                    <input type="text" id="zip_code" name="zip_code" value="{{ old('zip_code') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @error('zip_code')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <!-- School Details -->
                <div class="col-span-2 mt-4">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">School Details</h2>
                </div>
                
                <div>
                    <label for="principal_name" class="block text-gray-700 font-medium mb-2">Principal Name *</label>
                    <input type="text" id="principal_name" name="principal_name" value="{{ old('principal_name') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    @error('principal_name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <label for="student_count" class="block text-gray-700 font-medium mb-2">Student Count</label>
                    <input type="number" id="student_count" name="student_count" value="{{ old('student_count') }}"
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('student_count')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="col-span-2">
                    <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <div class="mt-8 flex justify-end">
                <a href="{{ route('schools.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg mr-4">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                    Create School
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
