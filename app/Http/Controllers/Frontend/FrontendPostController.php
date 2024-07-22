<?php

//app/Http/Controllers/Frontend/FrontendPostController.php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('frontend.show', compact('post'));
    }

    public function category(Category $category)
    {
        $posts = $category->posts()->paginate(5);
        return view('frontend.index', compact('posts'));
    }

    public function author(User $author)
    {
        $posts = $author->posts()->paginate(5);
        return view('frontend.index', compact('posts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::with('author', 'category')
            ->where('title', 'like', "%{$query}%")
            ->orWhereHas('author', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->orWhereHas('category', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->paginate(5);

        return view('frontend.index', compact('posts'));
    }
}

