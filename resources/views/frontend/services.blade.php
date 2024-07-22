@extends('layouts.frontend')

@section('title', 'Our Services')

@section('content')
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
     <div id="services">
        <h1 class="text-[3rem] font-bold text-slate-600 mt-5 pl-10">My Services</h1>

        <div class="flex flex-wrap justify-center mt-5">
          <!-- card 1 -->
          <div class="max-w-sm p-4 duration-500 hover:scale-105 hover:shadow-xl">
            <div class="flex flex-col h-full p-8 bg-gray-500 rounded-lg dark:bg-gray-800 hover:bg-sky-900">
              <div class="flex items-center mb-3">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 mr-3 text-white bg-indigo-500 rounded-full dark:bg-indigo-500">
                  <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 15.5V5s3 1 3 4m-7-3H4m9 4H4m4 4H4m13 2.4c0 1.326-1.343 2.4-3 2.4s-3-1.075-3-2.4 1.343-2.4 3-2.4 3 1.075 3 2.4Z"/>
</svg>

                </div>
                <h2 class="text-lg font-medium text-white dark:text-white">Music Player</h2>
              </div>
              <div class="flex flex-col justify-between flex-grow">
                <p class="text-base leading-relaxed text-white dark:text-gray-300">If you need Guitarist with any music genre start with Rock, Pop and dangdut you can hire me. I have my own rig:</p>
                <ul class="mt-5 text-base leading-relaxed text-white dark:text-gray-300">
                  <li><i class="mx-2 fa-solid fa-check"></i>Schecter C6 Plus</li>
                  <li><i class="mx-2 fa-solid fa-check"></i>Ibanez Acoustic Guitar</li>
                  <li><i class="mx-2 fa-solid fa-check"></i>NUX MG400</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- card 2 -->
          <div class="max-w-sm p-4 duration-500 hover:scale-105 hover:shadow-xl">
            <div class="flex flex-col h-full p-8 bg-gray-500 rounded-lg dark:bg-gray-800 hover:bg-sky-900">
              <div class="flex items-center mb-3">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 mr-3 text-white bg-indigo-500 rounded-full dark:bg-indigo-500">
                  <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9v3a5.006 5.006 0 0 1-5 5h-4a5.006 5.006 0 0 1-5-5V9m7 9v3m-3 0h6M11 3h2a3 3 0 0 1 3 3v5a3 3 0 0 1-3 3h-2a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3Z"/>
</svg>

                </div>
                <h2 class="text-lg font-medium text-white dark:text-white">Music Recording</h2>
              </div>
              <div class="flex flex-col justify-between flex-grow">
                <p class="text-base leading-relaxed text-white dark:text-gray-300">
                  Music recording with home recording setup, or if you need an operator for your recording studio and mixing engineer. I use Presonus Studio One as a DAW, and can operate other DAW with Learn.
                </p>
              </div>
            </div>
          </div>

          <!-- card 3 -->
          <div class="max-w-sm p-4 duration-500 hover:scale-105 hover:shadow-xl">
            <div class="flex flex-col h-full p-8 bg-gray-500 rounded-lg dark:bg-gray-800 hover:bg-sky-900">
              <div class="flex items-center mb-3">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 mr-3 text-white bg-indigo-500 rounded-full dark:bg-indigo-500">
                 <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 6H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1Zm7 11-6-2V9l6-2v10Z"/>
</svg>

                </div>
                <h2 class="text-lg font-medium text-white dark:text-white">Video Editing</h2>
              </div>
              <div class="flex flex-col justify-between flex-grow">
                <p class="text-base leading-relaxed text-white dark:text-gray-300">Video Editing use Adobe Premiere with basic skills or if you need an operator or video editor for your youtube video with remote or at office.</p>
              </div>
            </div>
          </div>

          <!-- card 4 -->
          <div class="max-w-sm p-4 duration-500 hover:scale-105 hover:shadow-xl">
            <div class="flex flex-col h-full p-8 bg-gray-500 rounded-lg dark:bg-gray-800 hover:bg-sky-900">
              <div class="flex items-center mb-3">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 mr-3 text-white bg-indigo-500 rounded-full dark:bg-indigo-500">
                 <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
</svg>

                </div>
                <h2 class="text-lg font-medium text-white dark:text-white">Web Development</h2>
              </div>
              <div class="flex flex-col justify-between flex-grow">
                <p class="text-base leading-relaxed text-white dark:text-gray-300">Web Development with Beginner skills HTML, CSS and Javascript, Bootstrap, SQL:</p>
                <ul class="mt-5 text-base leading-relaxed text-white dark:text-gray-300 columns-2">
                  <li><i class="mx-2 fa-solid fa-check"></i>HTML</li>
                  <li><i class="mx-2 fa-solid fa-check"></i>Laravel</li>
                  <li><i class="mx-2 fa-solid fa-check"></i>React JS</li>
                  <li><i class="mx-2 fa-solid fa-check"></i>CSS</li>
                  <li><i class="mx-2 fa-solid fa-check"></i>Bootstrap</li>
                  <li><i class="mx-2 fa-solid fa-check"></i>Tailwind</li>
                  <li><i class="mx-2 fa-solid fa-check"></i>Mysql</li>
                </ul>
              </div>
            </div>
          </div>

          <!-- card 5 -->
          <div class="max-w-sm p-4 duration-500 hover:scale-105 hover:shadow-xl">
            <div class="flex flex-col h-full p-8 bg-gray-500 rounded-lg dark:bg-gray-800 hover:bg-sky-900">
              <div class="flex items-center mb-3">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 mr-3 text-white bg-indigo-500 rounded-full dark:bg-indigo-500">
                 <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15h12M6 6h12m-6 12h.01M7 21h10a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1Z"/>
</svg>

                </div>
                <h2 class="text-lg font-medium text-white dark:text-white">Mobile Apps Development</h2>
              </div>
              <div class="flex flex-col justify-between flex-grow">
                <p class="text-base leading-relaxed text-white dark:text-gray-300">Vobile Apps Development with Beginner skills React Native.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
