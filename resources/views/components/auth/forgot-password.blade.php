<!-- resources/views/components/auth/forgot-password.blade.php -->
@extends('welcome')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-80px)]">
    <div class="bg-[#ebe7e4] dark:bg-[#262F3F] p-10 rounded-lg shadow-lg max-w-lg w-full">
        <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-white mb-6">Forgot Password</h2>

        @if (session('status'))
            <div class="mb-4 text-green-600 dark:text-green-400 text-center">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="mt-2 block w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-sm focus:ring-[#6ca296] dark:focus:ring-[#8576ff] focus:border-[#6ca296] dark:focus:border-[#8576ff] transition duration-150 ease-in-out">
            </div>

            <!-- Submit -->
            <div>
                <button type="submit" class="w-full px-4 py-3 bg-[#6ca296] dark:bg-[#8576ff] text-white rounded-lg hover:bg-[#4b776d] dark:hover:bg-[#423B7F] focus:outline-none focus:ring focus:ring-[#6ca296] dark:focus:ring-[#8576ff] transition duration-150 ease-in-out">
                    Send Password Reset Link
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
