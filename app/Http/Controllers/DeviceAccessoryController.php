<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Accessory;
use App\Models\DeviceAccessory;

class DeviceAccessoryController extends Controller
{
    public function index()
    {
        $deviceAccessories = Device::with('accessories')->get();
        return view('device_accessories.index', compact('deviceAccessories'));
    }

    public function create()
    {
        $devices = Device::all();
        $accessories = Accessory::all();
        return view('device_accessories.create', compact('devices', 'accessories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_id' => 'required|exists:devices,id',
            'accessory_id' => 'required|exists:accessories,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $device = Device::findOrFail($request->device_id);

        if ($device->accessories()->where('accessory_id', $request->accessory_id)->exists()) {
            return redirect()->back()->with('error', 'Accessory is already linked to this device!');
        }

        $device->accessories()->attach($request->accessory_id, ['quantity' => $request->quantity]);

        // redirect to the single device page
        return redirect()->route('devices.show', $request->device_id)->with('success', 'Accessory linked to device successfully!');
    }

    public function edit($device_id, $accessory_id)
    {
        $device = Device::findOrFail($device_id);
        $accessory = Accessory::findOrFail($accessory_id);
        return view('device_accessories.edit', compact('device', 'accessory'));
    }

    public function update(Request $request, $device_id, $accessory_id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $device = Device::findOrFail($device_id);
        $device->accessories()->updateExistingPivot($accessory_id, ['quantity' => $request->quantity]);

        return redirect()->route('device-accessories.index')->with('success', 'Accessory quantity updated successfully!');
    }

    public function destroy(DeviceAccessory $deviceAccessory)
    {
        $device_id = $deviceAccessory->device_id;
        $deviceAccessory->delete();

        return redirect()->route('devices.show', $device_id)->with('success', 'Accessory unlinked from device successfully!');
    }
}
