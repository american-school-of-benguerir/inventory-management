@extends('welcome')

@section('content')

    <!-- Hero Section -->
    <section class="hero-section pt-40 mt-20 flex flex-col items-center justify-center text-center px-6">
        <div class="container mx-auto flex flex-col items-center">
            <h1 class="text-4xl font-bold mb-6 text-gray-900 dark:text-white">Welcome</h1>
            <img src="{{ asset('images/Asb-Logo-Website-1.png') }}" alt="" class="mb-6">
            <a href="{{ route('login') }}"
               class="bg-[#6ca296] dark:bg-[#8576ff] text-white px-6 py-3 rounded hover:bg-[#4b776d] dark:hover:bg-[#423B7F]">
                Get Started
            </a>
        </div>
    </section>

@endsection
