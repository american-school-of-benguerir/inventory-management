<?php

namespace App\Http\Controllers;
use App\Models\Device;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // Display a listing of devices
    public function index()
    {
        $devices = Device::with(['type', 'assignee', 'lastUpdatedBy'])->get();
        $types = Type::all();
        $users = User::all();
        return view('components.devices.index', compact('devices', 'types', 'users'));
    }

    // Show the form for editing the specified device
    public function edit($id)
    {
        $device = Device::findOrFail($id);
        $types = Type::all(); // For selecting the device type in the form
        $users = User::all(); // For selecting the assignee in the form
        return view('components.devices.edit', compact('device', 'types'));
    }
    // show a single device with all its details
    public function show($id)
    {
        $device = Device::findOrFail($id);
        return view('components.devices.show', compact('device'));
    }
    // Update the specified device in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'serial_number' => 'required|unique:devices,serial_number,' . $id,
            // Add validation for other fields as needed
        ]);

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
