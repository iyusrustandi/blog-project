{{-- resources/views/frontend/show.blade.php --}}
@extends('layouts.frontend')

@section('title', $post->title)

@section('content')
<div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 bg-gray-50 dark:bg-gray-900 ">
    <div class="bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $post->title }}</h1>
        <p class="text-gray-600 dark:text-gray-400">By {{ $post->author }} on {{ $post->created_at->format('M d, Y') }}</p>
        
        <div class="flex justify-center items-center pt-12">
            @if ($post->image)
                <img src="{{ asset($post->image) }}" alt="Post Image" class="rounded-md sm:h-auto md:h-64 lg:h-96 max-w-full">
            @else
                {{-- <p>No Image</p> --}}
            @endif
        </div>

        <div class="mt-8 text-gray-800 dark:text-gray-200">
            {!! $post->content !!}
        </div>
    </div>
    <a href="{{ url('/') }}"
        class="inline-flex items-center mt-5 border border-indigo-300 dark:border-indigo-600 px-3 py-1.5 rounded-md bg-slate-600 dark:bg-indigo-700 hover:text-indigo-950 dark:hover:text-indigo-100 text-indigo-100 hover:bg-indigo-50 dark:hover:bg-indigo-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18">
            </path>
        </svg>
        <span class="ml-1 font-bold text-lg">Back to Posts</span>
    </a>
</div>
@endsection
