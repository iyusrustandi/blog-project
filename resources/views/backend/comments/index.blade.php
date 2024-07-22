@extends('layouts.app')

@section('title', 'Comments')

@section('content')
<div class="container">
    <h1>Comments for Post: {{ $post->title }}</h1>
    <a href="{{ route('posts.comments.create', $post->id) }}" class="btn btn-primary">Add Comment</a>
    <table class="table">
        <thead>
            <tr>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->content }}</td>
                    <td>
                        <a href="{{ route('posts.comments.edit', [$post->id, $comment->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('posts.comments.destroy', [$post->id, $comment->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
