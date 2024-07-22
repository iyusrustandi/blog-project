@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')
<div class="container">
    <h1>Edit Comment</h1>
    <form action="{{ route('posts.comments.update', [$post->id, $comment->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" name="content" rows="3" required>{{ $comment->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
