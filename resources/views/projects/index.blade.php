@extends('layout')

@section('content')
    <h3>Project List</h3>
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('projects.create') }}" class="btn btn-primary">Create</a>
    <table class="table">
        <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created At</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @forelse($projects as $key => $project)
            <tr>
                <td>{{ $projects->firstItem() + $key }}.</td>
                <td>{{ $project->name }}</td>
                <td>{{ $project->description }}</td>
                <td>
                    {{ $project->created_at->diffForHumans() }}
                    <div class="small text-muted">{{ $project->created_at->format('M. d, Y') }}</div>
                </td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-sm btn-outline-primary me-1">Edit</a>

                        <form action="{{ route('projects.delete', $project) }}" method="post"
                              onsubmit="return confirm('Are you sure?');">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">no data found in table</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-between">
        @if($projects->total() > 0)
            Showing {{ $projects->firstItem() }} - {{ $projects->lastItem() }}
            of {{ $projects->total() }} entries
            @if($projects->total() > $projects->perPage())
                {{ $projects->links() }}
            @endif
        @endif
    </div>
@endsection
