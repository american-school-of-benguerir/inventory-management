@extends('dashbordLayout')

@section('content')
<!-- Users Management Card -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Manage Users</h6>
            <button id="openModalButton" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">
                <i class="fas fa-plus"></i> Add New User
            </button>
        </div>
        <div class="flex justify-between items-center mb-6">
            <form method="GET" action="{{ route('users.index') }}" class="flex items-center">
                <div class="mr-2">
                    <label for="search" class="text-sm font-medium text-gray-700 dark:text-gray-300">Search by name or email:</label>
                    <input type="text" name="search" value="{{ old('search', $query) }}" placeholder="Search" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700">
                </div>
                <button type="submit" class="px-4 py-2 rounded bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F]"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        @if ($users->isEmpty())
            <p class="text-sm text-gray-600 dark:text-gray-300">No users found.</p>
        @else
        <!-- Users Table -->
        <table class="min-w-full w-full table-auto bg-[#ebe7e4] dark:bg-gray-800 rounded">
            <thead class="bg-[#e4ebeb] dark:bg-gray-700 rounded">
                <tr>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Name</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Email</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Role</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Type</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Created At</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Updated At</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $user->name }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $user->email }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $user->role }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $user->type }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $user->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $user->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </a>
                        <a href="{{ route('users.edit', $user->id) }}" class="text-green-500 hover:text-green-700 ml-4">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="delete-button text-red-500 hover:text-red-700 ml-4" data-id="{{ $user->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $users->appends(['search' => request('search')])->links('vendor.pagination.default') }}
        </div>
        @endif
    </div>
</div>

<!-- Modal for adding new User -->
<div id="modalOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[1001]"></div>
<div id="addEntryModal" class="fixed inset-0 flex items-center justify-center hidden z-[1002]">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-[90%] max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Add New User</h3>
            <button id="closeModalButton" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">&times;</button>
        </div>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="text-sm font-medium text-gray-700 dark:text-gray-300">Name:</label>
                <input type="text" name="name" id="name" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
            </div>
            <div class="mb-4">
                <label for="email" class="text-sm font-medium text-gray-700 dark:text-gray-300">Email:</label>
                <input type="email" name="email" id="email" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
            </div>
            <div class="mb-4">
                <label for="password" class="text-sm font-medium text-gray-700 dark:text-gray-300">Password:</label>
                <input type="password" name="password" id="password" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
            </div>
            <!-- confirm password -->
            <div class="mb-4">
                <label for="password_confirmation" class="text-sm font-medium text-gray-700 dark:text-gray-300">Confirm Password:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
            </div>
            <div class="mb-4">
                <label for="role" class="text-sm font-medium text-gray-700 dark:text-gray-300">Role:</label>
                <select name="role" id="role" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="super-admin">Super Admin</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="type" class="text-sm font-medium text-gray-700 dark:text-gray-300">Type:</label>
                <select name="type" id="type" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700 w-full" required>
                    <option value="staff">Staff</option>
                    <option value="student">Student</option>
                    <option value="room">Room</option>
                </select>
            </div>
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Add User</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript for modal toggle -->
<script>
    document.getElementById('openModalButton').addEventListener('click', function() {
        document.getElementById('modalOverlay').classList.remove('hidden');
        document.getElementById('addEntryModal').classList.remove('hidden');
    });

    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('modalOverlay').classList.add('hidden');
        document.getElementById('addEntryModal').classList.add('hidden');
    });

    document.getElementById('modalOverlay').addEventListener('click', function() {
        document.getElementById('modalOverlay').classList.add('hidden');
        document.getElementById('addEntryModal').classList.add('hidden');
    });
</script>

<!-- SweetAlert2 for Delete Confirmation -->
<script>
    document.querySelectorAll('.delete-button').forEach(function(button) {
        button.addEventListener('click', function() {
            const entryId = this.getAttribute('data-id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + entryId).submit();
                }
            });
        });
    });
</script>
@endsection
