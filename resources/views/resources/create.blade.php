@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Resource</h2>
        <form action="{{ route('resources.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="document">Upload Document</label>
                <input type="file" class="form-control-file" id="document" name="document">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" name="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
