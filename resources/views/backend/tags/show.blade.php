@extends('layouts.app')

@section('title', 'Tag Details')

@section('content')
<div class="container">
    <h1>{{ $tag->name }}</h1>
    <p>Slug: {{ $tag->slug }}</p>
    <a href="{{ route('tags.index') }}" class="btn btn-secondary">Back to Tags</a>
</div>
@endsection
