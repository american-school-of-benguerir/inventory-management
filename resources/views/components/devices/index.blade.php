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

        @if ($devices->isEmpty())
            <p class="text-sm text-gray-600 dark:text-gray-300">No devices available.</p>
        @else
        <!-- Devices Table -->
        <table class="min-w-full w-full table-auto bg-[#ebe7e4] dark:bg-gray-800 rounded">
            <thead class="bg-[#e4ebeb] dark:bg-gray-700 rounded">
                <tr>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Name</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Serial Number</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Type</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Make</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Assignee</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Switch</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Port</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($devices as $device)

                <tr>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->device_name }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->serial_number }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->type->name }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->make }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->assignee->name ?? 'Unassigned' }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->switch }}</td>
                    <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $device->port }}</td>
                    <td class="py-2 px-4">
                        <a href="{{ route('devices.show', $device->id) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fa-solid fa-up-right-from-square"></i>
                        </a>
                        <a href="{{ route('devices.edit', $device->id) }}" class="text-green-500 hover:text-green-700 ml-4">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="delete-button text-red-500 hover:text-red-700 ml-4" data-id="{{ $device->id }}">
                            <i class="fas fa-trash"></i>
                        </button>
                        <form id="delete-form-{{ $device->id }}" action="{{ route('devices.destroy', $device->id) }}" method="POST" class="hidden">
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
        <form action="{{ route('devices.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4"> <!-- Create a 2-column grid -->

                <!-- First Column: Fields 1 to 7 -->
                <div>
                    <!-- Serial Number Field -->
                    <div class="mb-4">
                        <label for="serial_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Serial Number</label>
                        <input type="text" id="serial_number" name="serial_number" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- OS Field -->
                    <div class="mb-4">
                        <label for="os" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OS</label>
                        <input type="text" id="os" name="os" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- OS Version Field -->
                    <div class="mb-4">
                        <label for="os_version" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OS Version</label>
                        <input type="text" id="os_version" name="os_version" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- MAC Address Field -->
                    <div class="mb-4">
                        <label for="mac_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">MAC Address</label>
                        <input type="text" id="mac_address" name="mac_address" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- RAM Field -->
                    <div class="mb-4">
                        <label for="ram" class="block text-sm font-medium text-gray-700 dark:text-gray-300">RAM</label>
                        <input type="text" id="ram" name="ram" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Processor Field -->
                    <div class="mb-4">
                        <label for="processor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Processor</label>
                        <input type="text" id="processor" name="processor" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Disk Spaces Field -->
                    <div class="mb-4">
                        <label for="disk_spaces" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Disk Spaces</label>
                        <input type="text" id="disk_spaces" name="disk_spaces" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>
                </div>

                <!-- Second Column: Fields 8 to 14 -->
                <div>
                    <!-- Device Name Field -->
                    <div class="mb-4">
                        <label for="device_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Device Name</label>
                        <input type="text" id="device_name" name="device_name" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>
                    <!-- Model Field -->
                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                        <input type="text" id="model" name="model" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Make Field -->
                    <div class="mb-4">
                        <label for="make" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Make</label>
                        <input type="text" id="make" name="make" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Assignee Field -->
                    <div class="mb-4">
                        <label for="assignee_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Assignee</label>
                        <select id="assignee_id" name="assignee_id" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Select assignee</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Switch Field -->
                    <div class="mb-4">
                        <label for="switch" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Switch</label>
                        <input type="text" id="switch" name="switch" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Port Field -->
                    <div class="mb-4">
                        <label for="port" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Port</label>
                        <input type="text" id="port" name="port" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <div class="mb-4">
                        <label for="type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                        <select id="type_id" name="type_id" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Select type</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
