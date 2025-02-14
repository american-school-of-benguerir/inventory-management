<?php

namespace App\Http\Controllers;
use App\Models\Device;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // Display a listing of devices
    public function index(Request $request)
    {
        $query = $request->input('search');

        $devices = Device::with(['type', 'assignee', 'lastUpdatedBy'])
                         ->where('device_name', 'like', '%' . $query . '%')  // Search by device name
                         ->orWhere('serial_number', 'like', '%' . $query . '%')  // Search by serial number
                         ->orWhere('mac_address', 'like', '%' . $query . '%')  // Search by mac address
                         ->latest()
                         ->paginate(10);

        $types = Type::all();
        $users = User::all();

        return view('components.devices.index', compact('devices', 'types', 'users', 'query'));
    }

    public function unassigned(Request $request)
    {
        $query = $request->input('search');

        $devices = Device::with(['type', 'assignee', 'lastUpdatedBy'])
                        ->where('device_name', 'like', '%' . $query . '%')  // Search by device name
                        ->orWhere('serial_number', 'like', '%' . $query . '%')  // Search by serial number
                        ->orWhere('mac_address', 'like', '%' . $query . '%')  // Search by mac address
                        ->whereNull('assignee_id')  // Get only unassigned devices
                        ->latest()
                        ->paginate(10);

        return view('components.devices.unassigned', compact('devices', 'query'));
    }

    // Show the form for editing the specified device
    public function edit($id)
    {
        $device = Device::findOrFail($id);
        $types = Type::all(); // For selecting the device type in the form
        $users = User::all(); // For selecting the assignee in the form
        return view('components.devices.edit', compact('device', 'types', 'users'));
    }
    // show a single device with all its details
    public function show($id)
    {
        $device = Device::findOrFail($id);
        $users = User::all();
        $types = Type::all();
        return view('components.devices.show', compact('device', 'users', 'types'));
    }
    // Update the specified device in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'serial_number' => 'required|unique:devices,serial_number,' . $id,
            // Add validation for other fields as needed
        ]);
        // if assignee_id is 0 set it to null
        if ($request->assignee_id == 0) {
            $request->merge(['assignee_id' => null]);
        }
        $device = Device::findOrFail($id);
        // get the curent user and add it to the request in the last_updated_by field
        $request->merge(['last_updated_by' => auth()->id()]);
        $device->update($request->all());

        return redirect()->route('devices.index')->with('success', 'Device updated successfully!');
    }

    // Store a newly created device
    public function store(Request $request)
    {
        $fields = [
            'os', 'os_version', 'serial_number', 'mac_address',
            'ram', 'processor', 'disk_spaces', 'model', 'make',
            'assignee_id', 'switch', 'port', 'last_updated_by'
        ];
        $values = request()->all();

        // Loop through using the key to modify the original array
        foreach ($values as $key => $value) {
            if (empty(trim($value))) {
                $values[$key] = 'N/A';  // Modify the original array using the key
            }
        }
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'serial_number' => 'required|unique:devices,serial_number',
            // Add validation for other fields as needed
        ]);
        // add the last_updated_by field to the request
        $values['last_updated_by'] = auth()->id();
        $device = Device::create($values);

        return redirect()->route('devices.index')->with('success', 'Device created successfully!');
    }

    // Remove the specified device from storage
    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();

        return redirect()->route('devices.index')->with('success', 'Device deleted successfully!');
    }
}
