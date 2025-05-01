@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Schools</h5>
                    <a href="{{ route('admin.schools.create') }}" class="btn btn-primary">Add School</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($schools as $school)
                                    <tr>
                                        <td>{{ $school->name }}</td>
                                        <td>{{ $school->address }}</td>
                                        <td>{{ $school->city }}</td>
                                        <td>{{ $school->state }}</td>
                                        <td>{{ $school->zip_code }}</td>
                                        <td>
                                            <a href="{{ route('admin.schools.edit', $school) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.schools.destroy', $school) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this school?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No schools found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $schools->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 