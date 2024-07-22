@extends('layouts.frontend')

@section('title', 'About')

@section('content')
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <section class="bg-white dark:bg-gray-900">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">My name is <span class="underline">Iyus Rustandi</span></h2>
            <p class="mb-4">I'm beginner programmer and this blog website is one of my product. I also a musician who can play any instrument with beginner skill.</p>
            <p>you can find my work on my portfolio site. on my services page, there are some services for programming, music and other.</p>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg" src="{{ asset('img/pasfoto.jpg') }}" alt="About 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg" src="{{ asset('img/foto2.jpg') }}" alt="About 2">
        </div>
    </div>
</section>
    </div>
@endsection
