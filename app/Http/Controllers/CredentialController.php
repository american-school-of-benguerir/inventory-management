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
        // $request->validate([
        //     'email' => 'required|email|unique:credentials,email',
        //     'password' => 'required|min:8',
        //     'type' => 'required|string',
        // ]);

        // Create the credential with encrypted password
        Credential::create([
            'email' => $request->email,
            'password' => $request->password,  // Do not encrypt here
            'type' => $request->type,
            'active' => true,
        ]);

        return redirect()->route('credentials.index')->with('success', 'Credential added successfully!');
    }

    public function edit(Credential $credential)
    {
        return view('components.credentials.edit', compact('credential'));
    }

    public function update(Request $request, Credential $credential)
    {
        $request->validate([
            'email' => 'required|email|unique:credentials,email,' . $credential->id,
            'password' => 'required|min:8',
            'type' => 'required|string',
        ]);

        $credential->update([
            'email' => $request->email,
            'password' => Crypt::encryptString($request->password),  // Encrypt before saving
            'type' => $request->type,
        ]);

        return redirect()->route('credentials.index')->with('success', 'Credential updated successfully!');
    }

    public function destroy(Credential $credential)
    {
        $credential->delete();
        return redirect()->route('credentials.index')->with('success', 'Credential deleted successfully!');
    }
}
