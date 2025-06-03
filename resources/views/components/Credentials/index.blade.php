@extends('dashbordLayout')

@section('content')
<!-- Credentials Management Card -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Manage Credentials</h6>
            <button id="openModalButton" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">
                <i class="fas fa-plus"></i> Add New Credential
            </button>
        </div>

        <!-- Search Form -->
        <div class="flex justify-between items-center mb-6">
            <form method="GET" action="{{ route('credentials.index') }}" class="flex items-center">
                <div class="mr-2">
                    <label for="search" class="text-sm font-medium text-gray-700 dark:text-gray-300">Search by username or type:</label>
                    <input type="text" name="search" value="{{ old('search', $query) }}" placeholder="Search" class="px-3 py-2 rounded-md bg-gray-50 dark:bg-gray-700">
                </div>
                <button type="submit" class="px-4 py-2 rounded bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F]">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        @if ($credentials->isEmpty())
            <p class="text-sm text-gray-600 dark:text-gray-300">No credentials found.</p>
        @else
        <!-- Credentials Table -->
        <table class="min-w-full w-full table-auto bg-[#ebe7e4] dark:bg-gray-800 rounded">
            <thead class="bg-[#e4ebeb] dark:bg-gray-700 rounded">
                <tr>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Username</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Password</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Type</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($credentials as $credential)
                    <tr>
                        <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $credential->username }}</td>
                        <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">
                            <div class="relative">
                                <input type="password" class="password-field block bg-transparent text-sm text-gray-700 dark:text-gray-300 rounded-md px-3 py-2" value="{{ $credential->password }}" readonly>
                                <button type="button" class="absolute right-2 top-2 text-gray-500 dark:text-gray-300 toggle-password">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </td>
                        <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $credential->type }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('credentials.show', $credential->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fa-solid fa-up-right-from-square"></i>
                            </a>
                            <a href="{{ route('credentials.edit', $credential->id) }}" class="text-green-500 hover:text-green-700 ml-4">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="delete-button text-red-500 hover:text-red-700 ml-4" data-id="{{ $credential->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                            <form id="delete-form-{{ $credential->id }}" action="{{ route('credentials.destroy', $credential->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $credentials->appends(['search' => request('search')])->links('vendor.pagination.default') }}
        </div>
        @endif
    </div>
</div>

<!-- Modal Overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[1001]"></div>

<!-- Modal for adding new Credential -->
<div id="addEntryModal" class="fixed inset-0 flex items-center justify-center hidden z-[1002]">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-[90%] max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Add New Credential</h3>
            <button id="closeModalButton" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">&times;</button>
        </div>
        <form action="{{ route('credentials.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Username</label>
                <input type="text" name="username" id="username" class="w-full p-2 mt-2 bg-[#ebe7e4] dark:bg-gray-700 rounded" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Password</label>
                <input type="password" name="password" id="password" class="w-full p-2 mt-2 bg-[#ebe7e4] dark:bg-gray-700 rounded" required>
            </div>

            <div class="mb-4">
                <label for="type" class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Type</label>
                <select name="type" id="type" class="w-full p-2 mt-2 bg-[#ebe7e4] dark:bg-gray-700 rounded" required>
                    <option value="">Select Type</option>
                    <option value="ssh">SSH</option>
                    <option value="icloud">iCloud</option>
                    <option value="google">Google</option>
                    <option value="microsoft">Microsoft</option>
                    <option value="database">Database</option>
                    <option value="api">API</option>
                    <option value="vpn">VPN</option>
                    <option value="local acount">Local acount</option>
                    <option value="admin acount">Admin acount</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Add Credential</button>
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
document.querySelectorAll('.toggle-password').forEach(function(button) {
    button.addEventListener('click', function() {
        const passwordField = this.closest('td').querySelector('.password-field');
        const icon = this.querySelector('i');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });
});

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
