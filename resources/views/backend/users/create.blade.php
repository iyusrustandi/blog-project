{{-- resources/views/backend/users/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="py-8 mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="p-4">
                <h2 class="text-2xl font-bold dark:text-white">Create User</h2>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col items-center mb-6 relative">
                        <div id="profileUploadContainer" class="relative w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500 bg-gray-50 dark:bg-gray-700 flex items-center justify-center cursor-pointer" onclick="document.getElementById('profilePictureInput').click()">
                            <img id="previewProfilePicture" class="object-cover w-full h-full rounded-full hidden" src="#" alt="Profile Picture">
                            <button class="absolute top-0 right-0 z-50 p-1 bg-red-500 rounded-full focus:outline-none hidden" id="removeButton" type="button" onclick="removeImage()">
                                <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <div id="profileUploadInstructions" class="flex flex-col items-center justify-center">
                                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
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
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                        </div>
                        <div>
                            <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                            <select name="role" id="role" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200" required>
                                <option value="user">User</option>
                                <option value="author">Author</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create User</button>
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
        output.src = '#';
        output.classList.add('hidden');
        instructions.classList.remove('hidden');
        removeButton.classList.add('hidden');
        input.value = ''; // Clear the input value
    }
</script>
@endsection


