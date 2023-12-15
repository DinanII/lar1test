@extends('layouts.app')
@section('content')
<div class="row m-6">

    <div class="container d-flex align-items-center justify-content-center">
        <div class="card border border-primary " style="min-width: 40%;">
            <div class="card-body">
                <h2>{{ $blog->title }}</h2>
                <b>{{ $blog->user->name }}</b>
                <p class="card-text">{{ $blog->description }}</p>
                @if (Auth::user()->id == $blog->user_id)
                <div class="container d-flex align-items-center justify-content-center">
                    <p>
                        <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning  ms-2">Edit</a>
                    </p>
                    <p>
                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger ms-2" type="submit" value="Delete">
                    </form>
                    </p>
                </div>
                @endif
            </div>
            <div class="card mt-6 ">
            <h2 class="m-2">
            <div class="container d-flex align-items-center justify-content-center mb-4 mt-4">
                <h2>Comments</h2>
            </div>
            <div class="container d-flex align-items-center justify-content-center mb-4 mt-4">
                <a class="btn btn-info" href="#">New comment (Not yet implemented)</a>
            </div>


                @foreach($comments as $comment)
                <div class="card-body border border-secondary m-3">
                    <h2>{{ $comment->title }}</h2>
                    <p>{{ $comment->user->name}}</p>
                    <p>{{ $comment->description }}</p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection