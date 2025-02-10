<?php

namespace App\Http\Controllers;
use App\Models\Accessory;

use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    // Display a listing of accessories
    public function index()
    {
        $accessories = Accessory::all();
        return view('components.accessories.index', compact('accessories'));
    }

    // Show the form for creating a new accessory
    public function create()
    {
        return view('components.accessories.create');
    }

    // Store a newly created accessory in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        Accessory::create($request->all());

        return redirect()->route('accessories.index')->with('success', 'Accessory created successfully!');
    }

    // Show the form for editing the specified accessory
    public function edit($id)
    {
        $accessory = Accessory::findOrFail($id);
        return view('components.accessories.edit', compact('accessory'));
    }

    // Update the specified accessory in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        $accessory = Accessory::findOrFail($id);
        $accessory->update($request->all());

        return redirect()->route('accessories.index')->with('success', 'Accessory updated successfully!');
    }

    // Remove the specified accessory from storage
    public function destroy($id)
    {
        $accessory = Accessory::findOrFail($id);
        $accessory->delete();

        return redirect()->route('accessories.index')->with('success', 'Accessory deleted successfully!');
    }
}
