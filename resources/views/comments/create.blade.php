@extends('layouts.app')
@section('content')
<div class="container d-flex align-items-center justify-content-center">
    <div>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="hidden" name="blogId" value="{{ $blog->id  }}">
            <div class="mb-3">
                <label for="title" class="form-label">Comment Title</label>
                <input placeholder="title ..." type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Content</label>
                <div class="mb-3">
                    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Content of your comment" ></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection