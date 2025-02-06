<!-- resources/views/components/auth/register.blade.php -->
@extends('welcome')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-80px)]">
    <div class="bg-[#ebe7e4] dark:bg-[#262F3F] p-10 rounded-lg shadow-lg max-w-lg w-full">
        <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-white mb-6">Create an Account</h2>

        <p class="text-center text-sm text-gray-700 dark:text-gray-300 mb-6">Fill in the details to create your account.</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required
                    class="w-full mt-2 px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-sm focus:ring-[#6ca296] dark:focus:ring-[#8576ff] focus:border-[#6ca296] dark:focus:border-[#8576ff] transition duration-150 ease-in-out">
            </div>

            <!-- Email Address -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full mt-2 px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-sm focus:ring-[#6ca296] dark:focus:ring-[#8576ff] focus:border-[#6ca296] dark:focus:border-[#8576ff] transition duration-150 ease-in-out">
            </div>

            <!-- Invite Code -->
            <div class="mb-6">
                <label for="invite_code" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Invite Code</label>
                <input id="invite_code" type="text" name="invite_code" value="{{ old('invite_code') }}" required
                    class="w-full mt-2 px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-sm focus:ring-[#6ca296] dark:focus:ring-[#8576ff] focus:border-[#6ca296] dark:focus:border-[#8576ff] transition duration-150 ease-in-out">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full mt-2 px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-sm focus:ring-[#6ca296] dark:focus:ring-[#8576ff] focus:border-[#6ca296] dark:focus:border-[#8576ff] transition duration-150 ease-in-out">
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full mt-2 px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-sm focus:ring-[#6ca296] dark:focus:ring-[#8576ff] focus:border-[#6ca296] dark:focus:border-[#8576ff] transition duration-150 ease-in-out">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full px-4 py-3 bg-[#6ca296] dark:bg-[#8576ff] text-white rounded-sm hover:bg-[#4b776d] dark:hover:bg-[#423B7F] focus:outline-none focus:ring focus:ring-[#6ca296] dark:focus:ring-[#8576ff] transition duration-150 ease-in-out">
                    Register
                </button>
            </div>
        </form>

        <!-- Login Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-700 dark:text-gray-300">Already have an account?
                <a href="{{ route('login') }}" class="text-[#6ca296] dark:text-[#8576ff] hover:underline">Login</a>
            </p>
        </div>
    </div>
</div>
@endsection
