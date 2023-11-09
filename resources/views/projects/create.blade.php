@extends('layout')

@section('content')
    <h3>Create Project</h3>
    <div class="row mt-3">
        <div class="col-md-6">
            <form action="{{ route('projects.store') }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                           value="{{ old('description') }}">
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
