<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CredentialController extends Controller
{
    public function index()
    {
        $credentials = Credential::all();
        return view('components.credentials.index', compact('credentials'));
    }

    public function create()
    {
        return view('credentials.create');
    }
    // show Credential

    public function show($id)
    {
        $credential = Credential::findOrFail($id);
        return view('components.credentials.show', compact('credential'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'type' => 'required|string',
        ]);

        $credential = new Credential([
            'username' => $request->username,
            'password' => $request->password,
            'type' => $request->type,
        ]);

        $credential->save();

        return redirect()->route('credentials.index')
            ->with('success', 'Credential created successfully.');
    }

    public function edit(Credential $credential)
    {
        return view('components.credentials.edit', compact('credential'));
    }

    public function update(Request $request, Credential $credential)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'type' => 'required|string',
        ]);

        $credential->update([
            'username' => $request->username,
            'password' => $request->password,
            'type' => $request->type,
        ]);

        return redirect()->route('credentials.index')
            ->with('success', 'Credential updated successfully.');
    }

    public function destroy(Credential $credential)
    {
        $credential->delete();
        return redirect()->route('credentials.index')->with('success', 'Credential deleted successfully!');
    }
}
