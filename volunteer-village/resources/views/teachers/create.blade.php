@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Teacher</h2>
    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf
        <div>
            <label for="Teacher_name">Teacher Name</label>
            <input type="text" name="Teacher_name" id="Teacher_name" required>
            @error('Teacher_name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
