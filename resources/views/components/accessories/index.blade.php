@extends('dashbordLayout')

@section('content')
<!-- Devices Management Card -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Manage Devices</h6>
            <button id="openModalButton" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">
                <i class="fas fa-plus"></i> Add New Device
            </button>
        </div>

        @if ($accessories->isEmpty())
            <p class="text-sm text-gray-600 dark:text-gray-300">No devices available.</p>
        @else
        <!-- Devices Table -->
        <table class="min-w-full w-full table-auto bg-[#ebe7e4] dark:bg-gray-800 rounded">
            <thead class="bg-[#e4ebeb] dark:bg-gray-700 rounded">
                <tr>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Name</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Type</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Quantity</th>
                    <th class="py-2 px-4 text-sm font-semibold text-gray-700 dark:text-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($accessories as $accessory)
                <tr>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $accessory->name }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $accessory->type }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $accessory->quantity }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('accessories.show', $accessory->id) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </a>
                        <a href="{{ route('accessories.edit', $accessory->id) }}" class="text-green-500 hover:text-green-700 ml-4">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="delete-button text-red-500 hover:text-red-700 ml-4" data-id="{{ $accessory->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form id="delete-form-{{ $accessory->id }}" action="{{ route('accessories.destroy', $accessory->id) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

<!-- Modal Overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[1001]"></div>

<!-- Modal for adding new Device -->
<div id="addEntryModal" class="fixed inset-0 flex items-center justify-center hidden z-[1002]">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-[90%] max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Add New Device</h3>
            <button id="closeModalButton" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">&times;</button>
        </div>
        <form action="{{ route('accessories.store') }}" method="POST">
            @csrf
            <!-- Device Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" placeholder="Enter device name">
            </div>
            <!-- Device Type -->
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                <input type="text" id="type" name="type" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" placeholder="Enter device type">
            </div>
            <!-- Device Quantity -->
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                <input type="number" id="quantity" name="quantity" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" placeholder="Enter device quantity">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Add Device</button>
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
