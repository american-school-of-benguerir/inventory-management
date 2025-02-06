<!-- resources/views/components/auth/verify-email.blade.php -->
@extends('authlayout')

@section('content')
<div class="flex items-center justify-center min-h-[calc(100vh-80px)]">
    <div class="bg-[#ebe7e4] dark:bg-[#262F3F] p-10 rounded-lg shadow-lg max-w-lg w-full">
        <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-white mb-6">Verify Your Email</h2>

        <p class="text-center text-sm text-gray-700 dark:text-gray-300 mb-6">
            A verification email has been sent to your email address. Please check your inbox and verify your email address.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 text-green-600 dark:text-green-400 text-center">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <!-- Resend Email Verification Link Button -->
            <div>
                <button type="submit" class="w-full px-4 py-3 bg-[#6ca296] dark:bg-[#8576ff] text-white rounded-lg hover:bg-[#4b776d] dark:hover:bg-[#423B7F] focus:outline-none focus:ring focus:ring-[#6ca296] dark:focus:ring-[#8576ff] transition duration-150 ease-in-out">
                    Resend Verification Email
                </button>
            </div>
        </form>

        <!-- Logout Option -->
        <div class="mt-6 text-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm text-gray-700 dark:text-gray-300 hover:underline">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
