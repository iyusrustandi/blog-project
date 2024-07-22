@extends('layouts.app')

@section('title', 'Tags')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    <button id="addTagBtn" type="button" class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add Tags
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">N0</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Tags</th>
                            <th scope="col" class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tags as $tag)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">{{ $tag->name }}</td>
                            <td class="px-4 py-3">{{ $tag->slug }}</td>
                            <td class="px-4 py-3">
                                <div class="inline-flex items-center rounded-md shadow-sm">
                                    <button type="button" class="edit-btn text-slate-100 hover:text-blue-600 text-sm bg-yellow-500 hover:bg-slate-100 border border-slate-200 rounded-l-lg font-medium px-2 py-1 inline-flex space-x-1 items-center" data-id="{{ $tag->id }}" data-name="{{ $tag->name }}" data-slug="{{ $tag->slug }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    </button>
                                    <button type="button" class="delete-btn text-slate-100 hover:text-blue-600 text-sm bg-red-700 hover:bg-slate-100 border border-slate-200 rounded-r-lg font-medium px-2 py-1 inline-flex space-x-1 items-center" data-id="{{ $tag->id }}">
                                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4"> 
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-4">
                {{ $tags->links() }}
            </div>
        </div>
    </div>
</section>

<!-- Modal for Edit -->
<div id="editModal" class="hidden fixed inset-0 z-50 overflow-auto bg-smoke-light ">
    <div class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex rounded-lg">
        <span class="absolute top-0 right-0 p-4">
            <svg id="closeEditModal" class="h-6 w-6 cursor-pointer text-gray-600 hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a1 1 0 110-2 1 1 0 010 2zm.707-.707L14 4.586a1 1 0 00-1.414-1.414L10 6.172 7.414 3.586A1 1 0 006 4.586L8.586 7 6 9.586A1 1 0 107.414 11L10 8.414l2.586 2.586A1 1 0 0014 9.586L11.414 7 14 4.414z" clip-rule="evenodd" />
            </svg>
        </span>
        <h2 class="text-2xl font-semibold mb-4">Edit Tag</h2>
        <form id="editForm" method="POST" action="">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="editName" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="editName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2">
            </div>
            <div class="mb-4">
                <label for="editSlug" class="block text-gray-700">Slug</label>
                <input type="text" name="slug" id="editSlug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2">
            </div>
            <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Save</button>
        </form>
    </div>
</div>

<!-- Modal for Delete Confirmation -->
<div id="deleteModal" class="hidden fixed inset-0 z-50 overflow-auto bg-smoke-light">
    <div class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex rounded-lg">
        <span class="absolute top-0 right-0 p-4">
            <svg id="closeDeleteModal" class="h-6 w-6 cursor-pointer text-gray-600 hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a1 1 0 110-2 1 1 0 010 2zm.707-.707L14 4.586a1 1 0 00-1.414-1.414L10 6.172 7.414 3.586A1 1 0 006 4.586L8.586 7 6 9.586A1 1 0 107.414 11L10 8.414l2.586 2.586A1 1 0 0014 9.586L11.414 7 14 4.414z" clip-rule="evenodd" />
            </svg>
        </span>
        <h2 class="text-2xl font-semibold mb-4">Delete Tag</h2>
        <p>Are you sure you want to delete this tag?</p>
        <form id="deleteForm" method="POST" action="">
            @csrf
            @method('DELETE')
            <div class="flex space-x-4 mt-4">
                <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-500 dark:hover:bg-red-600 focus:outline-none dark:focus:ring-red-800">Delete</button>
                <button type="button" id="cancelDelete" class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-gray-600 dark:text-gray-300 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal for Add Tag -->
<div id="addTagModal" class="hidden fixed inset-0 z-50 overflow-auto bg-smoke-light">
    <div class="relative p-8 bg-white w-full max-w-md m-auto flex-col flex rounded-lg">
        <span class="absolute top-0 right-0 p-4">
            <svg id="closeAddTagModal" class="h-6 w-6 cursor-pointer text-gray-600 hover:text-gray-900" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a1 1 0 110-2 1 1 0 010 2zm.707-.707L14 4.586a1 1 0 00-1.414-1.414L10 6.172 7.414 3.586A1 1 0 006 4.586L8.586 7 6 9.586A1 1 0 107.414 11L10 8.414l2.586 2.586A1 1 0 0014 9.586L11.414 7 14 4.414z" clip-rule="evenodd" />
            </svg>
        </span>
        <h2 class="text-2xl font-semibold mb-4">Add Tag</h2>
        <form id="addTagForm" method="POST" action="{{ route('tags.store') }}">
            @csrf
            <div class="mb-4">
                <label for="tagName" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="tagName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2">
            </div>
            <div class="mb-4">
                <label for="tagSlug" class="block text-gray-700">Slug</label>
                <input type="text" name="slug" id="tagSlug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2">
            </div>
            <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Add Tag</button>
        </form>
    </div>
</div>

<script>
// Script for Edit Modal
document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        const name = button.getAttribute('data-name');
        const slug = button.getAttribute('data-slug');
        document.getElementById('editName').value = name;
        document.getElementById('editSlug').value = slug;
        document.getElementById('editForm').action = `/tags/${id}`;
        document.getElementById('editModal').classList.remove('hidden');
    });
});

document.getElementById('closeEditModal').addEventListener('click', () => {
    document.getElementById('editModal').classList.add('hidden');
});

// Script for Delete Modal
document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', () => {
        const id = button.getAttribute('data-id');
        document.getElementById('deleteForm').action = `/tags/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    });
});

document.getElementById('closeDeleteModal').addEventListener('click', () => {
    document.getElementById('deleteModal').classList.add('hidden');
});

document.getElementById('cancelDelete').addEventListener('click', () => {
    document.getElementById('deleteModal').classList.add('hidden');
});

// Script for Add Tag Modal
document.getElementById('addTagBtn').addEventListener('click', () => {
    document.getElementById('addTagModal').classList.remove('hidden');
});

document.getElementById('closeAddTagModal').addEventListener('click', () => {
    document.getElementById('addTagModal').classList.add('hidden');
});

</script>

@endsection
