@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center">
   
    <div>
        <a class="btn btn-primary mt-6" href="{{ route('blogs.create') }}">New Post</a>
    </div>
</div>
<div class="row m-6">
    @foreach($blogs as $blog)
    <div class="col-md-4 mb-4">
        <div class="card border border-primary">
            <div class="card-body">
                <h2>{{ $blog->title }}</h2>
                <b>{{ $blog->user->name }}</b>
                <p class="card-text">{{ Str::limit($blog->description, 75) }}</p>
                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">Read more</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection