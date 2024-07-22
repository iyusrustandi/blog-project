{{-- resources/views/backend/profile/edit.blade.php --}}
@extends('layouts.frontend')

@section('title', 'Edit Profile')

@section('content')
<div class="container mx-auto">
    <div class="grid max-w-2xl mx-auto mt-8">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

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
                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 2MB)</p>
                    </div>
                </div>
                
                <div class="mt-4">
                    <input type="file" name="profile_picture" id="profilePictureInput" class="hidden" accept="image/*" onchange="previewProfile(event)">
                    @error('profile_picture')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="items-center mt-8 sm:mt-14 text-[#202142]">
                <div class="mb-2 sm:mb-6">
                    <label for="username" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your username</label>
                    <input type="text" id="username" name="name" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" value="{{ Auth::user()->name }}">
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2 sm:mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Your email</label>
                    <input type="email" id="email" name="email" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" value="{{ Auth::user()->email }}">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2 sm:mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">New Password</label>
                    <input type="password" name="password" id="password" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="New Password">
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2 sm:mb-6">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5" placeholder="Confirm Password">
                </div>
                <div class="mb-2 sm:mb-6">
                    <label for="role" class="block mb-2 text-sm font-medium text-indigo-900 dark:text-white">I want to be an author</label>
                    <input type="checkbox" id="role" name="role" value="author" {{ Auth::user()->role == 'author' ? 'checked' : '' }}>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Save</button>
                </div>
            </div>
            <input type="hidden" name="remove_profile_picture" id="remove_profile_picture" value="0">
        </form>
    </div>
</div>

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
        const removeInput = document.getElementById('remove_profile_picture');
        output.src = '{{ asset('path/to/default-image.jpg') }}';
        output.classList.remove('hidden');
        instructions.classList.add('hidden');
        removeButton.classList.add('hidden');
        input.value = ''; // Clear the input value
        removeInput.value = '1'; // Set the hidden input value to indicate image removal
    }
</script>
@endsection
