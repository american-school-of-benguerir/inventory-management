<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->get('search');
        $users = User::when($query, function ($query) use ($request) {
                return $query->where('name', 'like', '%'.$request->search.'%')
                            ->orWhere('email', 'like', '%'.$request->search.'%');
            })
            ->paginate(10); // You can adjust the number of users per page as needed
        return view('components.users.index', compact('users', 'query'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:user,admin,super-admin',
            'type' => 'required|in:staff,student,room',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],
            'type' => $validated['type'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('users.index');
    }
    public function edit(User $user)
    {
        return view('components.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin,super-admin',
            'type' => 'required|in:staff,student,room',
            'active' => 'required|boolean',
        ]);

        $user->update($validated);

        // If account is inactive, we can also handle any additional logic, like logging out the user if they are active
        if ($user->active == 0) {
            // You can add a mechanism to log the user out if they are the currently logged-in user
            // Auth::logout();
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function show(User $user)
    {
        // get all of the devices that belong to the user
        $devices = Device::where('assignee_id', $user->id)->get();
        return view('components.users.show', compact('user', 'devices'));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }

}
