@extends('layouts.app')
@section('content')
<div class="container d-flex align-items-center justify-content-center">
    <div>
        <form action="{{ route('blogs.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="postTitle" class="form-label">Post title</label>
                <input placeholder="title ..." type="text" class="form-control" name="postTitle" id="postTitle">
            </div>
            <div class="mb-3">
                <label for="postDescription" class="form-label">Content</label>
                <div class="mb-3">
                    <textarea name="postDescription" id="postDescription" cols="30" rows="10" placeholder="Content of your post" ></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
@endsection