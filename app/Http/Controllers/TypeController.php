<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('components.types.index', compact('types'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('types.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:types,name|max:255',
        ]);

        Type::create([
            'name' => $request->name,
        ]);

        return redirect()->route('types.index')->with('success', 'Type created successfully');
    }

    // Display the specified resource.
    public function show($id)
    {
        $type = Type::findOrFail($id);
        return view('components.types.show', compact('type'));
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('components.types.edit', compact('type'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:types,name,' . $id . '|max:255',
        ]);

        $type = Type::findOrFail($id);
        $type->update([
            'name' => $request->name,
        ]);

        return redirect()->route('types.index')->with('success', 'Type updated successfully');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $type = Type::findOrFail($id);
        $type->delete();

        return redirect()->route('types.index')->with('success', 'Type deleted successfully');
    }
}
