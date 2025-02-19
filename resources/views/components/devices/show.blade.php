@extends('dashbordLayout')

@section('content')
<!-- Devices Management Card -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] shadow-lg rounded-lg">
    <div class="card-body p-6">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">{{ $device->device_name }}</h6>
        </div>

        <!-- Device Details -->
        <div class="grid grid-cols-2 gap-8">
            <!-- Device Information Section -->
            <div class="space-y-6">
                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="serial_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Serial Number</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->serial_number }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="os" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Operating System</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->os }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="os_version" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OS Version</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->os_version }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="mac_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">MAC Address</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->mac_address }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="ram" class="block text-sm font-medium text-gray-700 dark:text-gray-300">RAM</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->ram }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="processor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Processor</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->processor }}</p>
                </div>

                <div class="mb-6  border-gray-300 dark:border-gray-600 pb-4">
                    <label for="disk_spaces" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Disk Spaces</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->disk_spaces }}</p>
                </div>
                <!-- is device diffective -->
                <div class="mb-6  border-gray-300 dark:border-gray-600 pb-4">
                    <label for="disk_spaces" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Is Device Diffective</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->is_defective == 0 ? 'No' : 'Yes' }}</p>
                </div>
            </div>

            <!-- Additional Information Section -->
            <div class="space-y-6">
                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->type->name }}</p>
                </div>
                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model name</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->model_name }}</p>
                </div>
                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model number</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->model_number }}</p>
                </div>
                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="make" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Make</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->make }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="assignee" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Assignee</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->assignee->name ?? 'Unassigned' }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="switch" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Switch</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->switch }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="port" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Port</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->port }}</p>
                </div>

                <div class="mb-6   pb-4">
                    <label for="last_updated_by" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Last Updated By</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->lastUpdatedBy ? $device->lastUpdatedBy->name : 'N/A' }}</p>
                </div>
            </div>
        </div>

        <!-- Divider Line -->
        <div class="my-8 border-t border-gray-300 dark:border-gray-600"></div>

        <!-- Footer Section -->
        <div class="flex justify-end mt-6">
            <button onclick="window.history.back()" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Back to Devices</button>
        </div>
    </div>
</div>

<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] shadow-lg rounded-lg">
    <div class="card-body p-6">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Device's credeantials</h6>
            <button id="openModalButtonc" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">
                <i class="fas fa-plus"></i> Add credeantials
            </button>
        </div>
        @if ($device->credentials->isEmpty())
            <p class="text-sm text-gray-600 dark:text-gray-300">No credentials linked to this device.</p>
        @else
            <table class="min-w-full w-full table-auto bg-[#ebe7e4] dark:bg-gray-800 rounded">
                <thead class="bg-[#e4ebeb] dark:bg-gray-700 rounded">
                    <tr>
                        <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Email</th>
                        <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Type</th>
                        <th class="py-2 px-4 text-left text-sm font-medium text-gray-500 dark:text-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($device->credentials as $credential)
                        <tr>
                            <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $credential->email }}</td>
                            <td class="py-2 px-4 text-sm text-gray-700 dark:text-gray-300">{{ $credential->type }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('credentials.show', $credential->id) }}" class="text-blue-500 hover:text-blue-700 m-1"><i class="fa-solid fa-up-right-from-square"></i></a>
                                <form action="{{ route('credentials.destroy', $credential->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] shadow-lg rounded-lg">
    <div class="card-body p-6">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Device's Accessories</h6>
            <button id="openModalButton" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">
                <i class="fas fa-plus"></i> Add New Accessory
            </button>
        </div>
    </div>
</div>

<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] shadow-lg rounded-lg">
    <div class="card-body p-6">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Device's notes</h6>
            <button id="openModalButton" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">
                <i class="fas fa-plus"></i> Add New Note
            </button>
        </div>
        @if ($notes->isEmpty())
            <p class="text-sm text-gray-600 dark:text-gray-300">No notes linked to this device.</p>
        @else
        @foreach ($notes as $note)
            <div class="card bg-[#FCF8F3] dark:bg-gray-700 shadow-sm h-36 m-5">
                <div class="card-body p-4 flex flex-col justify-between">
                    <h6 class="text-lg font-semibold text-gray-800 dark:text-gray-300">{{ $note->created_at }}</h6>
                    <p class="text-sm text-gray-700 dark:text-gray-400 truncate">{{ $note->note}}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-300 mt-2">{{ $note->user->name }}</p>
                </div>
                <!-- delete button -->
                <button class="delete-button text-red-500 hover:text-red-700 ml-4" data-id="{{ $note->id }}">
                    <i class="fas fa-trash"></i>
                </button>
                <!-- delete button -->
                <form id="delete-form-{{ $note->id }}" action="{{ route('notes.destroy', $note->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        @endforeach
        @endif
    </div>
</div>

<!-- Modal Overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-[1001]"></div>

<!-- Modal for adding new Device -->
<div id="addEntryModal" class="fixed inset-0 flex items-center justify-center hidden z-[1002]">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-[90%] max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Add New note</h3>
            <button id="closeModalButton" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">&times;</button>
        </div>
        <!-- add a new note form -->
        <form action="{{ route('notes.store') }}" method="POST">
            @csrf
            <input type="text" name="device_id" value="{{ $device->id }}" hidden>
            <div class="mb-4">
                <label for="note" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Note</label>
                <textarea name="note" id="note" rows="3" class="mt-1 block w-full border-gray-300 dark:border-gray-600 focus:border-[#6ca296] dark:focus:border-[#8576ff] focus:ring focus:ring-[#6ca296] dark:focus:ring-[#8576ff] rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Add Note</button>
            </div>
        </form>
    </div>
</div>
<div id="credmodal" class="fixed inset-0 flex items-center justify-center hidden z-[1002]">
    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-lg w-[90%] max-w-md">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Add New Credantial</h3>
            <button id="closeModalButtonc" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">&times;</button>
        </div>
        <form action="{{ route('device.linkCredential', $device->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="credential" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Select Credential</label>
                <select name="credential_id" id="credential" class="mt-1 block w-full border-gray-300 dark:border-gray-600 focus:border-[#6ca296] dark:focus:border-[#8576ff] focus:ring focus:ring-[#6ca296] dark:focus:ring-[#8576ff] rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-300">
                    @foreach ($credentials as $credential)
                        <option value="{{ $credential->id }}">{{ $credential->email }} - {{ $credential->type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Link Credential</button>
            </div>
        </form>
    </div>
</div>

<script>
// Open modal
    document.getElementById('openModalButtonc').addEventListener('click', function() {
        document.getElementById('modalOverlay').classList.remove('hidden');
        document.getElementById('credmodal').classList.remove('hidden');
    });

    // Close modal
    document.getElementById('closeModalButtonc').addEventListener('click', function() {
        document.getElementById('modalOverlay').classList.add('hidden');
        document.getElementById('credmodal').classList.add('hidden');
    });

    // Close modal when overlay is clicked
    document.getElementById('modalOverlay').addEventListener('click', function() {
        document.getElementById('modalOverlay').classList.add('hidden');
        document.getElementById('credmodal').classList.add('hidden');
    });
</script>
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
