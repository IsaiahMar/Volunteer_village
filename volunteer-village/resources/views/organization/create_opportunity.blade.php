{{-- filepath: c:\Users\kisha\OneDrive\Desktop\CapStone\Volunteer_village\volunteer-village\resources\views\organization\create_opportunity.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Create Volunteer Opportunity</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('organization.storeOpportunity') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="Name">Opportunity Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('Name') is-invalid @enderror" 
                                   id="Name" name="Name" value="{{ old('Name') }}" required>
                            @error('Name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="Date">Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('Date') is-invalid @enderror" 
                                       id="Date" name="Date" value="{{ old('Date') }}" required>
                                @error('Date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="StartTime">Start Time <span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('StartTime') is-invalid @enderror" 
                                       id="StartTime" name="StartTime" value="{{ old('StartTime') }}" required>
                                @error('StartTime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="EndTime">End Time <span class="text-danger">*</span></label>
                                <input type="time" class="form-control @error('EndTime') is-invalid @enderror" 
                                       id="EndTime" name="EndTime" value="{{ old('EndTime') }}" required>
                                @error('EndTime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Location">Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('Location') is-invalid @enderror" 
                                   id="Location" name="Location" value="{{ old('Location') }}" required>
                            @error('Location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Max_students">Maximum Students <span class="text-danger">*</span></label>
                            <input type="number" min="1" class="form-control @error('Max_students') is-invalid @enderror" 
                                   id="Max_students" name="Max_students" value="{{ old('Max_students') }}" required>
                            @error('Max_students')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Description">Description</label>
                            <textarea class="form-control @error('Description') is-invalid @enderror" 
                                      id="Description" name="Description" rows="4">{{ old('Description') }}</textarea>
                            @error('Description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> Create Opportunity
                            </button>
                            <a href="{{ route('opportunities.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
