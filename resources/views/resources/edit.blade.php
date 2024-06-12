@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Resource</h2>
        <form action="{{ route('resources.update', $resource->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $resource->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $resource->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $resource->phone }}" required>
            </div>
            <div class="form-group">
                <label for="document">Upload Document</label>
                <input type="file" class="form-control-file" id="document" name="document">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" name="text">{{ $resource->text }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
