<?php

namespace App\Http\Controllers;
use App\Models\Device;
use App\Models\Type;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    // Display a listing of devices
    public function index()
    {
        $devices = Device::all();
        return view('components.devices.index', compact('devices'));
    }

    // Show the form for editing the specified device
    public function edit($id)
    {
        $device = Device::findOrFail($id);
        $types = Type::all(); // For selecting the device type in the form
        return view('components.devices.edit', compact('device', 'types'));
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
        $device->update($request->all());

        return redirect()->route('devices.index')->with('success', 'Device updated successfully!');
    }

    // Store a newly created device
    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required|exists:types,id',
            'serial_number' => 'required|unique:devices,serial_number',
            // Add validation for other fields as needed
        ]);

        $device = Device::create($request->all());

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
