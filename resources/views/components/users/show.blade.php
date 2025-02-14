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
<!-- listing all of the devices linked to this user -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] mt-6">
    <div class="card-body">
        <h6 class="text-lg font-semibold mb-6">Devices Linked to this User</h6>
        @if ($devices->isEmpty())
            <p class="text-sm text-gray-600 dark:text-gray-300">No devices linked to this user.</p>
        @else
        <!-- Devices Table -->
        <table class="min-w-full w-full table-auto bg-[#ebe7e4] dark:bg-gray-800 rounded">
            <thead class="bg-[#e4ebeb] dark:bg-gray-700 rounded">
                <tr>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Name</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Type</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Serial number</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Created At</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Updated At</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($devices as $device)
                <tr>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->device_name }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->type->name }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->serial_number }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->updated_at->format('Y-m-d H:i:s') }}</td>
                    <!-- link to the device page -->
                    <td class="py-2 px-4">
                        <a href="{{ route('devices.show', $device->id) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
