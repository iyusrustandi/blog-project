@extends('layouts.app')

@section('title', 'Comment Details')

@section('content')
<div class="container">
    <h1>Comment Detail</h1>
    <p>{{ $comment->content }}</p>
    <a href="{{ route('posts.comments.index', $post->id) }}" class="btn btn-secondary">Back to Comments</a>
</div>
@endsection
