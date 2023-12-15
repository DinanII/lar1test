<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blogs.index')->with('blogs', $blogs);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'postTitle'=>['required'],
            'postDescription'=>['required']
        ]);

        $post = new Blog();
        $post->title = $request->input('postTitle');

        $post->description = $request->input('postDescription');

        $post->user_id = auth()->user()->id;

        $post->save();
        return redirect()->route('blogs.index');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::findOrFail($id);
        $comments = Comment::where('blog_id', $id)->get();
        return view('blogs.detail')
            ->with('blog', $blog)
            ->with('comments', $comments);
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.edit')->with('blog', $blog);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'postTitle'=>['required'],
            'postDescription'=>['required']
        ]);

        $blog->title = $request->input('postTitle');

        $blog->description = $request->input('postDescription');
        $blog->save();
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index');

    }
}
