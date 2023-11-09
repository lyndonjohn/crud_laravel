@extends('layout')

@section('content')
    <h3>Edit Project</h3>
    <div class="row mt-3">
        <div class="col-md-6">
            @if(session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('projects.update', $project) }}" method="post">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $project->name }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" id="description"
                           value="{{ $project->description }}">
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
