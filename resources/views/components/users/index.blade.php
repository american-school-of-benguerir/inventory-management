@extends('dashbordLayout')

@section('content')

<!-- Card for and serach for the users -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] mb-6">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold text-dark dark:text-light">Search for Users</h6>
        </div>

        <form method="GET" action="{{ route('users.index') }}">
            <div class="mb-4">
                <label for="search" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Search</label>
                <input id="search" type="text" name="search" value="{{ request('search') }}"
                    class="w-full mt-1 px-3 py-2 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-150 ease-in-out">
            </div>

            <div>
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white px-4 py-2 rounded hover:bg-[#4b776d] dark:hover:bg-[#423B7F]">
                    Search
                </button>
            </div>
        </form>
    </div>
<!-- listing all of the users -->
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold text-dark dark:text-light">Users</h6>
            <a href="{{ route('users.create') }}"
                class="bg-[#6ca296] dark:bg-[#8576ff] text-white px-4 py-2 rounded hover:bg-[#4b776d] dark:hover:bg-[#423B7F]">Create
                User</a>
        </div>

        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th class="text-left">Name</th>
                        <th class="text-left">Email</th>
                        <th class="text-left">Role</th>
                        <th class="text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}"
                                class="text-[#6ca296] dark:text-[#8576ff] hover:underline">Edit</a>
                            <form method="POST" action="{{ route('users.destroy', $user) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-[#6ca296] dark:text-[#8576ff] hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
