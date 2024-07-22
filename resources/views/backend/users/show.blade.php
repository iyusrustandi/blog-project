@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="py-8 mx-auto max-w-screen-xl px-4 lg:px-12">
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="p-4">
                <h2 class="text-2xl font-bold dark:text-white">User Details</h2>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="flex flex-col items-center mb-6">
                         @if($user->profile_picture)
                        <img class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-indigo-300 dark:ring-indigo-500" src="{{ asset('storage/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture">
                         @else
                         <svg class="w-40 h-40 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                        </svg>
                        @endif
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium first-line:dark:text-gray-100 text-gray-500">
                                    ID
                                </dt>
                                <dd class="mt-1 text-sm dark:text-gray-400 text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $user->id }}
                                </dd>
                            </div>
                            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium first-line:dark:text-gray-100 text-gray-500">
                                    Name
                                </dt>
                                <dd class="mt-1 text-sm dark:text-gray-400 text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $user->name }}
                                </dd>
                            </div>
                            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium first-line:dark:text-gray-100 text-gray-500">
                                    Email
                                </dt>
                                <dd class="mt-1 text-sm dark:text-gray-400 text-gray-900 sm:mt-0 sm:col-span-2">
                                   {{ $user->email }}
                                </dd>
                            </div>
                            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium first-line:dark:text-gray-100 text-gray-500">
                                    Role
                                </dt>
                                <dd class="mt-1 text-sm dark:text-gray-400 text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $user->role }}
                                </dd>
                            </div>
                            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium first-line:dark:text-gray-100 text-gray-500">
                                    Created At
                                </dt>
                                <dd class="mt-1 text-sm dark:text-gray-400 text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $user->created_at }}
                                </dd>
                            </div>
                            <div class="py-3 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium first-line:dark:text-gray-100 text-gray-500">
                                    Updated At
                                </dt>
                                <dd class="mt-1 text-sm dark:text-gray-400 text-gray-900 sm:mt-0 sm:col-span-2">
                                   {{ $user->updated_at }}
                                </dd>
                            </div>
                            
                        </dl>
                    </div>        
                    <div class="flex justify-end">
                        <a href="{{ route('users.index') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection
