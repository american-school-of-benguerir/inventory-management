@extends('dashbordLayout')

@section('content')
<!-- Devices Management Card -->
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] shadow-lg rounded-lg">
    <div class="card-body p-6">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Device's Details</h6>
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
            </div>

            <!-- Additional Information Section -->
            <div class="space-y-6">
                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->model }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="make" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Make</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->make }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="assignee" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Assignee</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->assignee ? $device->assignee->name : 'N/A' }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="switch" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Switch</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->switch }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
                    <label for="port" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Port</label>
                    <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">{{ $device->port }}</p>
                </div>

                <div class="mb-6 border-b border-gray-300 dark:border-gray-600 pb-4">
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
@endsection
