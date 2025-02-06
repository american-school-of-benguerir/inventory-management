<!-- resources/views/components/auth/login.blade.php -->
@extends('welcome')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-80px)]"> <!-- Adjusted to account for the navbar -->
    <div class="bg-[#ebe7e4] dark:bg-[#262F3F] p-10 rounded-lg shadow-lg max-w-lg w-full">
        <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-white mb-6">Welcome Back!</h2>

        <p class="text-center text-sm text-gray-700 dark:text-gray-300 mb-6">Please log in to your account.</p>

        @if(session('status'))
            <div class="mb-4 text-green-600 dark:text-green-400 text-center">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="w-full rounded-sm mt-2 px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 focus:ring-[#6ca296] dark:focus:ring-[#8576ff] focus:border-[#6ca296] dark:focus:border-[#8576ff] transition duration-150 ease-in-out">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full mt-2 px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-sm focus:ring-[#6ca296] dark:focus:ring-[#8576ff] focus:border-[#6ca296] dark:focus:border-[#8576ff] transition duration-150 ease-in-out">
            </div>

            <!-- Remember Me and Forgot Password -->
            <div class="flex items-center justify-between mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="form-checkbox text-[#6ca296] dark:text-[#8576ff] dark:bg-gray-800 dark:border-gray-700">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-[#6ca296] dark:text-[#8576ff] hover:underline">Forgot your password?</a>
                @endif
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full px-4 py-3 bg-[#6ca296] dark:bg-[#8576ff] text-white rounded-lg hover:bg-[#4b776d] dark:hover:bg-[#423B7F] focus:outline-none focus:ring focus:ring-[#6ca296] dark:focus:ring-[#8576ff] transition duration-150 ease-in-out">
                    Login
                </button>
            </div>
        </form>

        <!-- Register Link -->
        <div class="mt-6 text-center">
            <p class="text-sm text-gray-700 dark:text-gray-300">Don't have an account?
                <a href="{{ route('register') }}" class="text-[#6ca296] dark:text-[#8576ff] hover:underline">Register</a>
            </p>
        </div>
    </div>
</div>
@endsection
