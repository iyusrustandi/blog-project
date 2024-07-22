{{-- resources/views/backend/users/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="py-8 mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="p-4">
                <h2 class="text-2xl font-bold dark:text-white">Edit User</h2>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-col items-center mb-6 relative">
                        <div id="profileUploadContainer" class="relative w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500 bg-gray-50 dark:bg-gray-700 flex items-center justify-center cursor-pointer" onclick="document.getElementById('profilePictureInput').click()">
                            <img id="previewProfilePicture" class="object-cover w-full h-full rounded-full {{ $user->profile_picture ? '' : 'hidden' }}" src="{{ $user->profile_picture ? asset('storage/profile_pictures/' . $user->profile_picture) : asset('path/to/default-image.jpg') }}" alt="Profile Picture">
                            <button class="absolute top-0 right-0 z-50 p-1 bg-red-500 rounded-full focus:outline-none {{ $user->profile_picture ? '' : 'hidden' }}" id="removeButton" type="button" onclick="removeImage()">
                                <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <div id="profileUploadInstructions" class="flex flex-col items-center justify-center {{ $user->profile_picture ? 'hidden' : '' }}">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG  (MAX. 2MB)</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <input type="file" name="profile_picture" id="profilePictureInput" class="hidden" accept="image/*" onchange="previewProfile(event)">
                            @error('profile_picture')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        </div>
                        <div>
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                            <select name="role" id="role" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="author" {{ $user->role == 'author' ? 'selected' : '' }}>Author</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update User</button>
                        <a href="{{ route('users.index') }}" class="ml-3 text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:text-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function previewProfile(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('previewProfilePicture');
            const instructions = document.getElementById('profileUploadInstructions');
            const removeButton = document.getElementById('removeButton');
            output.src = reader.result;
            output.classList.remove('hidden');
            instructions.classList.add('hidden');
            removeButton.classList.remove('hidden');
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function removeImage() {
        const output = document.getElementById('previewProfilePicture');
        const instructions = document.getElementById('profileUploadInstructions');
        const removeButton = document.getElementById('removeButton');
        const input = document.getElementById('profilePictureInput');
        output.src = '{{ asset('path/to/default-image.jpg') }}';
        output.classList.remove('hidden');
        instructions.classList.add('hidden');
        removeButton.classList.add('hidden');
        input.value = ''; // Clear the input value
        // Append a hidden input to signal removal of profile picture
        const removeInput = document.createElement('input');
        removeInput.type = 'hidden';
        removeInput.name = 'remove_profile_picture';
        document.querySelector('form').appendChild(removeInput);
    }
</script>
@endsection
