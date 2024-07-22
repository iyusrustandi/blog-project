{{-- resources/views/backend/posts/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<section class="p-3 bg-gray-50 dark:bg-gray-900 sm:p-5">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <a href="{{ route('posts.create') }}">
                        <button type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Create Post
                        </button>
                    </a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">No</th>
                            <th scope="col" class="px-4 py-3">Title</th>
                            <th scope="col" class="px-4 py-3">Category</th>
                            <th scope="col" class="px-4 py-3">Tags</th>
                            <th scope="col" class="px-4 py-3">Author</th>
                            <th scope="col" class="px-4 py-3">Created Date</th>
                            <th scope="col" class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ \Illuminate\Support\Str::words($post->title, 5, '...') }}</td>
                            <td class="px-4 py-3">{{ $post->category ? $post->category->name : 'None' }}</td>
                            <td class="px-4 py-3">
                                @foreach($post->tags as $tag)
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td class="px-4 py-3">{{ $post->author }}</td>
                            <td class="px-4 py-3">{{ $post->created_at }}</td>
                            <td class="flex px-4 py-3 space-x-2">
                                <div class="inline-flex items-center rounded-md shadow-sm">
                                    <a href="{{ route('posts.edit', $post->id) }}">
                                        <button type="button" class="inline-flex items-center px-2 py-1 space-x-1 text-sm font-medium bg-yellow-500 border rounded-l-lg edit-btn text-slate-100 hover:text-blue-600 hover:bg-slate-100 border-slate-200" data-id="{{ $post->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </button>
                                    </a>
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        <button type="button" class="inline-flex items-center px-2 py-1 space-x-1 text-sm font-medium bg-green-700 border view-btn text-slate-100 hover:text-blue-600 hover:bg-slate-100 border-slate-200" data-id="{{ $post->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </a>
                                    <button type="button" class="inline-flex items-center px-2 py-1 space-x-1 text-sm font-medium bg-red-500 border delete-btn text-slate-100 hover:text-red-600 hover:bg-slate-100 border-slate-200 rounded-r-md" data-id="{{ $post->id }}">
                                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 py-3 font-semibold tracking-wide text-gray-500 uppercase dark:text-gray-400">
                     {{ $posts->links() }} 
                </div>
            </div>
        </div>
    </div>
    
</section>

{{-- Modal --}}
<div id="deleteModal" class="fixed inset-0 hidden w-full h-full overflow-y-auto bg-gray-600 bg-opacity-50">
    <div class="relative p-5 mx-auto bg-white border rounded-md shadow-lg top-20 w-96">
        <div class="mt-3 text-center">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12c0-4.97-4.03-9-9-9S3 7.03 3 12s4.03 9 9 9 9-4.03 9-9z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Delete Confirmation</h3>
            <div class="py-3 mt-2 px-7">
                <p class="text-sm text-gray-500">Are you sure you want to delete this post?</p>
            </div>
            <div class="items-center px-4 py-3">
                <button id="ok-btn" class="w-full px-4 py-2 text-base font-medium text-white bg-red-500 rounded-md shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-300">
                    OK
                </button>
                <button id="cancel-btn" class="w-full px-4 py-2 mt-2 text-base font-medium bg-gray-300 rounded-md shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Delete Form --}}
<form id="deleteForm" method="POST" action="">
    @csrf
    @method('DELETE')
</form>

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.getAttribute('data-id');
            document.getElementById('deleteForm').action = `/posts/${id}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        });
    });

    document.getElementById('cancel-btn').addEventListener('click', () => {
        document.getElementById('deleteModal').classList.add('hidden');
    });

    document.getElementById('ok-btn').addEventListener('click', () => {
        document.getElementById('deleteForm').submit();
    });
</script>
@endsection

