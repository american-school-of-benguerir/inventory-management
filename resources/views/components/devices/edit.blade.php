@extends('dashbordLayout')

@section('content')
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <div class="flex justify-between items-center mb-6">
            <h6 class="text-lg font-semibold mb-6">Edit Device</h6>
        </div>
        <form action="{{ route('devices.update', $device->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method spoofing for PUT request -->
            <div class="grid grid-cols-2 gap-4">

                <!-- First Column: Fields 1 to 7 -->
                <div>
                    <!-- Serial Number Field -->
                    <div class="mb-4">
                        <label for="serial_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Serial Number</label>
                        <input type="text" id="serial_number" name="serial_number" value="{{ old('serial_number', $device->serial_number) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- OS Field -->
                    <div class="mb-4">
                        <label for="os" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OS</label>
                        <input type="text" id="os" name="os" value="{{ old('os', $device->os) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- OS Version Field -->
                    <div class="mb-4">
                        <label for="os_version" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OS Version</label>
                        <input type="text" id="os_version" name="os_version" value="{{ old('os_version', $device->os_version) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- MAC Address Field -->
                    <div class="mb-4">
                        <label for="mac_address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">MAC Address</label>
                        <input type="text" id="mac_address" name="mac_address" value="{{ old('mac_address', $device->mac_address) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- RAM Field -->
                    <div class="mb-4">
                        <label for="ram" class="block text-sm font-medium text-gray-700 dark:text-gray-300">RAM</label>
                        <input type="text" id="ram" name="ram" value="{{ old('ram', $device->ram) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Processor Field -->
                    <div class="mb-4">
                        <label for="processor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Processor</label>
                        <input type="text" id="processor" name="processor" value="{{ old('processor', $device->processor) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Disk Spaces Field -->
                    <div class="mb-4">
                        <label for="disk_spaces" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Disk Spaces</label>
                        <input type="text" id="disk_spaces" name="disk_spaces" value="{{ old('disk_spaces', $device->disk_spaces) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>
                    <!-- is device defactive -->
                    <div class="mb-4">
                        <label for="is_defective" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Is Defective</label>
                        <select name="is_defective" id="is_defective" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="0" {{ $device->is_defective == 0 ? 'selected' : '' }}>No</option>
                            <option value="1" {{ $device->is_defective == 1 ? 'selected' : '' }}>Yes</option>
                        </select>
                    </div>

                </div>

                <!-- Second Column: Fields 8 to 14 -->
                <div>
                    <!-- Device Name Field -->
                    <div class="mb-4">
                        <label for="device_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Device Name</label>
                        <input type="text" id="device_name" name="device_name" value="{{ old('device_name', $device->device_name) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Model Field -->
                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model name</label>
                        <input type="text" id="model" name="model_name" value="{{ old('model_name', $device->model_name) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Model number</label>
                        <input type="text" id="model" name="model_number" value="{{ old('model_number', $device->model_number) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Make Field -->
                    <div class="mb-4">
                        <label for="make" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Make</label>
                        <input type="text" id="make" name="make" value="{{ old('make', $device->make) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Assignee Field -->
                    <div class="mb-4">
                        <label for="assignee_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Assignee</label>
                        <select id="assignee_id" name="assignee_id" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Select assignee</option>
                            <option value="0">Unassigned</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $device->assignee_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Switch Field -->
                    <div class="mb-4">
                        <label for="switch" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Switch</label>
                        <input type="text" id="switch" name="switch" value="{{ old('switch', $device->switch) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Port Field -->
                    <div class="mb-4">
                        <label for="port" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Port</label>
                        <input type="text" id="port" name="port" value="{{ old('port', $device->port) }}" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" >
                    </div>

                    <!-- Type Field -->
                    <div class="mb-4">
                        <label for="type_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
                        <select id="type_id" name="type_id" class="mt-1 block w-full px-3 py-2 bg-gray-50 dark:bg-gray-700 border dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="" selected disabled>Select type</option>
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ $device->type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-4">
                <button type="submit" class="bg-[#6ca296] dark:bg-[#8576ff] text-white hover:bg-[#4b776d] dark:hover:bg-[#423B7F] px-4 py-2 rounded">Update Device</button>
            </div>
        </form>
    </div>
</div>
@endsection
