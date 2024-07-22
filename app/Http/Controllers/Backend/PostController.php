<?php

// app/Http/Controllers/Backend/PostController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        // return view('backend.posts.index', compact('posts'));

           $user = auth()->user();

    if ($user->role === 'admin') {
        $posts = Post::with('category', 'tags')->orderBy('created_at', 'desc')->paginate(5);
    } else {
        $posts = Post::with('category', 'tags')
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }

    return view('backend.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $user = auth()->user();
        
        return view('backend.posts.create', compact('categories', 'tags', 'user'));
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'author' => 'required',
        'category_id' => 'required|exists:categories,id',
        'tags.*' => 'exists:tags,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',//max image upload size
    ]);

    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->author = auth()->user()->name;
    $post->category_id = $request->category_id;
    $post->user_id = auth()->id();

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/posts/images');
        $post->image = 'storage/' . substr($imagePath, 7);
    }

    $post->save();
    $post->tags()->attach($request->tags);

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}

    public function show(Post $post)
    {
        return view('backend.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'tags.*' => 'exists:tags,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->author = $request->author;
        $post->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::delete(str_replace('storage/', 'public/', $post->image));
            }

            $imagePath = $request->file('image')->store('public/posts/images');
            $post->image = 'storage/' . substr($imagePath, 7);
        }

        $post->tags()->sync($request->tags);
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete(str_replace('storage/', 'public/', $post->image));
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    
}
