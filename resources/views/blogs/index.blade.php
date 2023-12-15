@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center">
    <div>
    @foreach($blogs as $blog)
        <div class="col-md-8 offset-md-2 mb-4 ">
            <div class="card border border-primary">
                <div class="card-body">
                    <h2 class="title" >{{ $blog->title }}</h2>
                    <p class="card-text">{{ $blog->description }}</p>
                    <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
   
</div>
@endsection