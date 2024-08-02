<?php

//routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendPostController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ImageUploadController;

// Frontend Page Routes
Route::get('/', [FrontendPostController::class, 'index'])->name('frontend.index');
Route::get('/about', function () {
    return view('frontend.about');
});
Route::get('/services', function () {
    return view('frontend.services');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/post/{slug}', [FrontendPostController::class, 'show'])->name('frontend.show');

// New routes for category and author filtering
Route::get('/category/{category}', [FrontendPostController::class, 'category'])->name('frontend.category');
Route::get('/author/{author}', [FrontendPostController::class, 'author'])->name('frontend.author');

Route::get('/search', [FrontendPostController::class, 'search'])->name('frontend.search');

// Backend Page Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::resource('users', UserController::class);
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}/remove-profile-picture', [UserController::class, 'removeProfilePicture'])->name('users.remove_profile_picture');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');

    Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');
    
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('posts.comments', CommentController::class);
});

require __DIR__.'/auth.php';

