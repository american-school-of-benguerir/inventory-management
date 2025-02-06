<!-- resources/views/profile/edit.blade.php -->
@extends('dashbordLayout')

@section('content')

<!-- Card for Updating Profile Picture -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] mb-6">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold text-dark dark:text-light">Update Profile Picture</h6>
        </div>

        <form method="POST" action="{{ route('profile.picture.update') }}" enctype="multipart/form-data">
            @csrf

            <!-- Profile Picture Input -->
            <div class="mb-4">
                <label for="profile_picture" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profile Picture</label>

                <!-- Display Current Profile Picture -->
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="w-16 h-16 rounded-full">
                </div>

                <input id="profile_picture" type="file" name="profile_picture"
                    class="w-full mt-1 px-3 py-2  dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                @error('profile_picture')
                    <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Save Button -->
            <div>
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white px-4 py-2 rounded hover:bg-[#4b776d] dark:hover:bg-[#423B7F]">
                    Update Profile Picture
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Card for Updating Name -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] mb-6">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold text-dark dark:text-light">Update Your Name and Email</h6>
        </div>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <!-- Name Input -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                @error('name')
                    <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                @error('email')
                    <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                @enderror

                <!-- Email Verification Notice -->
                @if (!$user->hasVerifiedEmail())
                    <div class="text-sm mt-2">
                        Your email is not verified.
                        <form method="POST" action="{{ route('verification.send') }}" class="inline">
                            @csrf
                            <button type="submit" class="underline text-indigo-600 dark:text-indigo-400">Resend verification email</button>.
                        </form>
                    </div>
                @endif
            </div>

            <!-- Save Button -->
            <div>
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white px-4 py-2 rounded hover:bg-[#4b776d] dark:hover:bg-[#423B7F]">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Card for Updating Password -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] mb-6">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold text-dark dark:text-light">Update Your Password</h6>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')

            <!-- Current Password -->
            <div class="mb-4">
                <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Current Password</label>
                <input id="current_password" type="password" name="current_password" required
                    class="w-full mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                @error('current_password')
                    <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                @error('password')
                    <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm New Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm New Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
            </div>

            <!-- Save Button -->
            <div>
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white px-4 py-2 rounded hover:bg-[#4b776d] dark:hover:bg-[#423B7F]">
                    Update Password
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Card for Deleting Account -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold text-dark dark:text-light">Delete Your Account</h6>
        </div>

        <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
            Once your account is deleted, all of its resources and data will be permanently deleted. Please back up any important information before proceeding.
        </p>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <!-- Password Confirmation for Account Deletion -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
                @error('password')
                    <span class="text-red-600 dark:text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Delete Account Button -->
            <div>
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded focus:ring-red-500 hover:bg-red-700">
                    Delete Account

                </button>
            </div>
        </form>
    </div>
</div>
@endsection
