<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $postCount = Post::count();
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        $userCount = User::count();

        return view('backend.dashboard.index', compact('postCount', 'categoryCount', 'tagCount', 'userCount'));
    }
}
