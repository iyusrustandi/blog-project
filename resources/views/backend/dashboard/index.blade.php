@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="antialiased bg-gray-50 dark:bg-gray-900">
<div class="row-gap-8 grid grid-cols-2 md:grid-cols-4 ">
    <div class="mb-12 text-center md:mb-0 md:border-r-2 dark:bg-gray-900  bg-slate-400 dark:md:border-slate-500">
        <div class="font-heading text-[2.6rem] font-bold dark:text-white lg:text-5xl xl:text-6xl">
            {{ $postCount }}
        </div>
        <p class="text-sm font-medium uppercase tracking-widest text-gray-800 dark:text-slate-400 lg:text-base">
            Posts
        </p>
    </div>
    <div class="mb-12 text-center md:mb-0 md:border-r-2  dark:bg-gray-900 bg-orange-400 dark:md:border-slate-500">
        <div class="font-heading text-[2.6rem] font-bold dark:text-white lg:text-5xl xl:text-6xl">
            {{ $categoryCount }}
        </div>
        <p class="text-sm font-medium uppercase tracking-widest text-gray-800 dark:text-slate-400 lg:text-base">
            Categories
        </p>
    </div>
    <div class="mb-12 text-center md:mb-0 md:border-r-2 dark:bg-gray-900 bg-yellow-400 dark:md:border-slate-500">
        <div class="font-heading text-[2.6rem] font-bold dark:text-white lg:text-5xl xl:text-6xl">
            {{ $tagCount }}
        </div>
        <p class="text-sm font-medium uppercase tracking-widest text-gray-800 dark:text-slate-400 lg:text-base">
            Tags
        </p>
    </div>
    <div class="mb-12 text-center md:mb-0 md:border-r-2 dark:bg-gray-900 bg-emerald-400 dark:md:border-slate-500">
        <div class="font-heading text-[2.6rem] font-bold dark:text-white lg:text-5xl xl:text-6xl">
            {{ $userCount }}
        </div>
        <p class="text-sm font-medium uppercase tracking-widest text-gray-800 dark:text-slate-400 lg:text-base">
            Users
        </p>
    </div>
</div>
</div>
@endsection
