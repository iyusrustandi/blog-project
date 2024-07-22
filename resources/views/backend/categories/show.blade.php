@extends('layouts.app')

@section('title', 'Category Details')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <p>Slug: {{ $category->slug }}</p>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
</div>
@endsection
