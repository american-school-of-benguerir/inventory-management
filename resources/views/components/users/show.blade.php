@extends('dashbordLayout')

@section('content')
<!-- Show User Card -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">User Details</h6>
            <a href="{{ route('users.index') }}" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">
                <i class="fas fa-arrow-left"></i> Back to Users List
            </a>
        </div>

        <div class="mb-4 border-b border-gray-300 dark:border-gray-600">
            <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Name:</strong>
            <p>{{ $user->name }}</p>
        </div>

        <div class="mb-4 border-b border-gray-300 dark:border-gray-600">
            <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Email:</strong>
            <p>{{ $user->email }}</p>
        </div>

        <div class="mb-4 border-b border-gray-300 dark:border-gray-600">
            <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Role:</strong>
            <p>{{ ucfirst($user->role) }}</p>
        </div>

        <div class="mb-4 border-b border-gray-300 dark:border-gray-600">
            <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Type:</strong>
            <p>{{ ucfirst($user->type) }}</p>
        </div>

        <div class="mb-4 border-b border-gray-300 dark:border-gray-600">
            <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Status:</strong>
            <p>{{ $user->active ? 'Active' : 'Inactive' }}</p>
        </div>

        <div class="mb-4 border-b border-gray-300 dark:border-gray-600">
            <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Created At:</strong>
            <p>{{ $user->created_at->format('Y-m-d H:i:s') }}</p>
        </div>

        <div class="mb-4 border-b border-gray-300 dark:border-gray-600">
            <strong class="text-sm font-medium text-gray-700 dark:text-gray-300">Updated At:</strong>
            <p>{{ $user->updated_at->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>
</div>
@endsection
