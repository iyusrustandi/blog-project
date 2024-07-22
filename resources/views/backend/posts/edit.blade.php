{{-- resources/views/backend/posts/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
<div class="px-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">
  <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
      <label for="title" class="block mb-1 text-lg font-medium text-gray-800 dark:text-gray-200">Title</label>
      <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-md dark:border-gray-700 focus:outline-none focus:border-indigo-500" value="{{ $post->title }}" required>
    </div>
      <div class="mb-6">
      <label for="author" class="block mb-1 text-lg font-medium text-gray-800 dark:text-gray-200">Author</label>
      <input type="text" id="author" name="author" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" value="{{ $post->user->name }}" readonly required>
      <input type="hidden" name="user_id" value="{{ $post->user->id }}">
    </div>
    <div class="grid grid-cols-2 gap-4 mb-4">
        <div class="col-span-2 mb-6 sm:col-span-1">
            <label for="category" class="block mb-1 text-lg font-medium text-gray-800 dark:text-gray-200">Category</label>
            <select id="category" name="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-md dark:border-gray-700 focus:outline-none focus:border-indigo-500" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-span-2 mb-6 sm:col-span-1">
            <label for="tags" class="block mb-1 text-lg font-medium text-gray-800 dark:text-gray-200">Tags</label>
            <div class="relative">
                <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    Tags
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownSearch" class="z-10 hidden mt-1 bg-white rounded-lg shadow dark:bg-gray-700 w-60">
                    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
                        @foreach($tags as $tag)
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <input id="tag_{{ $tag->id }}" type="checkbox" name="tags[]" value="{{ $tag->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label for="tag_{{ $tag->id }}" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">{{ $tag->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-6">
        <label for="content" class="block mb-1 text-lg font-medium text-gray-800 dark:text-gray-200">Content</label>
        <textarea id="content" name="content" class="w-full px-4 py-2 border border-gray-300 rounded-md dark:border-gray-700 focus:outline-none focus:border-indigo-500" rows="6" required>{{ $post->content }}</textarea>
    </div>
    
<div class="mb-6">
    <label for="image" class="block mb-1 text-lg font-medium text-gray-800 dark:text-gray-100">Thumbnail</label>
    <div class="flex items-center justify-center w-9/12 mx-auto">
        <label for="dropzone" id="dropzone-label" class="relative flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <div id="preview-container" class="flex flex-wrap justify-center mt-4">
                @if ($post->image)
                    <div class="relative object-cover w-full h-56 m-2 border rounded">
                        <img src="{{ asset($post->image) }}" alt="Post Image" class="object-cover w-full h-full rounded">
                        <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" onclick="removeImage()">
                            <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </div>
                @endif
            </div>
            <div id="instructions" class="flex flex-col items-center justify-center pt-5 pb-6 {{ $post->image ? 'hidden' : '' }}">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG or GIF (MAX. 5MB)</p>
            </div>
            <input id="dropzone" type="file" name="image" class="hidden" multiple accept="image/*" onchange="handleFiles(this.files)" />
        </label>
    </div>
</div>

    <div class="flex justify-end">
      <button type="submit" class="px-6 py-2 font-semibold text-white bg-indigo-500 rounded-md hover:bg-indigo-600 focus:outline-none">Update</button>
    </div>
  </form>
</div>

<script>
    function handleFiles(files) {
        const previewContainer = document.getElementById('preview-container');
        const instructions = document.getElementById('instructions');
        
        previewContainer.innerHTML = '';

        // Limit to 4 files
        const fileArray = Array.from(files).slice(0, 4);

        if (fileArray.length > 0) {
            instructions.style.display = 'none';
        } else {
            instructions.style.display = 'flex';
        }

        fileArray.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = (e) => {
                const div = document.createElement('div');
                div.className = 'relative w-full h-56 m-2 object-cover border rounded';
                
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-full object-cover rounded';
                
                const button = document.createElement('button');
                button.className = 'absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none';
                button.type = 'button';
                button.innerHTML = `
                    <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                `;
                button.onclick = () => {
                    previewContainer.removeChild(div);
                    if (previewContainer.children.length === 0) {
                        instructions.style.display = 'flex';
                    }
                };
                
                div.appendChild(img);
                div.appendChild(button);
                previewContainer.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }

    // Drag and drop functionality
    const dropzoneLabel = document.getElementById('dropzone-label');
    dropzoneLabel.addEventListener('dragover', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropzoneLabel.classList.add('bg-gray-200');
    });

    dropzoneLabel.addEventListener('dragleave', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropzoneLabel.classList.remove('bg-gray-200');
    });

    dropzoneLabel.addEventListener('drop', (e) => {
        e.preventDefault();
        e.stopPropagation();
        dropzoneLabel.classList.remove('bg-gray-200');
        handleFiles(e.dataTransfer.files);
    });

    function removeImage() {
        const previewContainer = document.getElementById('preview-container');
        const instructions = document.getElementById('instructions');
        
        // Clear the preview container
        previewContainer.innerHTML = '';
        
        // Show the instructions
        instructions.style.display = 'flex';
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownButton = document.getElementById('dropdownSearchButton');
        const dropdownMenu = document.getElementById('dropdownSearch');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    });
</script>
@endsection
