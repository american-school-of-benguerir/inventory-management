@extends('dashbordLayout')

@section('content')
<!-- Edit User Card -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Edit User</h6>
            <a href="{{ route('users.index') }}" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">
                <i class="fas fa-arrow-left"></i> Back to Users List
            </a>
        </div>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-300">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label for="role" class="text-sm font-medium text-gray-700 dark:text-gray-300">Role:</label>
                <select name="role" id="role" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="super-admin" {{ $user->role == 'super-admin' ? 'selected' : '' }}>Super Admin</option>
                </select>
            </div>

            <!-- Type -->
            <div class="mb-4">
                <label for="type" class="text-sm font-medium text-gray-700 dark:text-gray-300">Type:</label>
                <select name="type" id="type" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
                    <option value="staff" {{ $user->type == 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="student" {{ $user->type == 'student' ? 'selected' : '' }}>Student</option>
                    <option value="room" {{ $user->type == 'room' ? 'selected' : '' }}>Room</option>
                </select>
            </div>

            <!-- Active Toggle -->
            <div class="mb-4">
                <label for="active" class="text-sm font-medium text-gray-700 dark:text-gray-300">Active:</label>
                <select name="active" id="active" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
                    <option value="1" {{ $user->active == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $user->active == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Update User</button>
            </div>
        </form>
    </div>
</div>
@endsection
