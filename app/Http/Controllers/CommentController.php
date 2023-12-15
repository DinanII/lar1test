<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return view('comments.create')->with('blog', $id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required'],
            'desc'=>['required']
        ]);

        $comment = new Comment();
        $comment->title = $request->input('title');

        $comment->description = $request->input('desc');

        $comment->user_id = auth()->user()->id;
        $comment->blog_id = $request->input('blog_id');

        $comment->save();
        return redirect()->route('blogs.index');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
