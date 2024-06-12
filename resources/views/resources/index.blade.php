<!-- @extends('layouts.app') -->

@section('content')
    <div class="container">
        <a href="{{ route('logout') }}">Logout</a>
        <h2>List of Resources</h2>
        <a href="{{ route('resources.create') }}" class="btn btn-primary">Create Resource</a>
        @if (count($resources) > 0)
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($resources as $resource)
                        <tr>
                            <td>{{ $resource->name }}</td>
                            <td>{{ $resource->email }}</td>
                            <td>{{ $resource->phone }}</td>
                            <td>
                                <a href="{{ route('resources.edit', $resource->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this resource?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No resources found.</p>
        @endif
    </div>
@endsection
