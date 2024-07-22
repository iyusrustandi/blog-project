<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments()->get();
        return view('comments.index', compact('post', 'comments'));
    }

    public function create(Post $post)
    {
        return view('comments.create', compact('post'));
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;
        $comment->save();

        return redirect()->route('posts.comments.index', $post->id)->with('success', 'Comment created successfully.');
    }

    public function show(Post $post, Comment $comment)
    {
        return view('comments.show', compact('post', 'comment'));
    }

    public function edit(Post $post, Comment $comment)
    {
        return view('comments.edit', compact('post', 'comment'));
    }

    public function update(Request $request, Post $post, Comment $comment)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment->update([
            'content' => $request->content,
        ]);

        return redirect()->route('posts.comments.index', $post->id)->with('success', 'Comment updated successfully.');
    }

    public function destroy(Post $post, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.comments.index', $post->id)->with('success', 'Comment deleted successfully.');
    }
}
