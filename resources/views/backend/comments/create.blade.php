@extends('layouts.app')

@section('title', 'Add Comment')

@section('content')
<div class="container">
    <h1>Add Comment to Post: {{ $post->title }}</h1>
    <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
