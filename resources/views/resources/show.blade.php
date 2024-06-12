@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Resource Details</h2>
        <ul>
            <li><strong>Name:</strong> {{ $resource->name }}</li>
            <li><strong>Email:</strong> {{ $resource->email }}</li>
            <li><strong>Phone:</strong> {{ $resource->phone }}</li>
            <li><strong>Document:</strong> {{ $resource->document }}</li>
            <li><strong>Text:</strong> {{ $resource->text }}</li>
        </ul>
        <a href="{{ route('resources.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection
