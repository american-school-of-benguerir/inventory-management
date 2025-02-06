<!-- resources/views/components/auth/password-confirm.blade.php -->
@extends('authlayout')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-80px)]">
    <div class="bg-[#ebe7e4] dark:bg-[#262F3F] p-10 rounded-lg shadow-lg max-w-lg w-full">
        <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-white mb-6">Confirm Your Password</h2>

        <p class="text-center text-sm text-gray-700 dark:text-gray-300 mb-6">
            Please confirm your password before continuing.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-800 dark:text-gray-200">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full mt-2 px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-[#6ca296] dark:focus:ring-[#8576ff] focus:border-[#6ca296] dark:focus:border-[#8576ff] transition duration-150 ease-in-out">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full px-4 py-3 bg-[#6ca296] dark:bg-[#8576ff] text-white rounded-lg hover:bg-[#4b776d] dark:hover:bg-[#423B7F] focus:outline-none focus:ring focus:ring-[#6ca296] dark:focus:ring-[#8576ff] transition duration-150 ease-in-out">
                    Confirm Password
                </button>
            </div>
        </form>

        <!-- Forgot Password Link -->
        @if (Route::has('password.request'))
            <div class="mt-6 text-center">
                <a href="{{ route('password.request') }}" class="text-sm text-[#6ca296] dark:text-[#8576ff] hover:underline">
                    Forgot your password?
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
