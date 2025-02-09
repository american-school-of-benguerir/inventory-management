<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use App\Models\User;
use App\Models\Type;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $devices = Device::all()->count();
        $users = User::all()->count();
        $types = Type::all()->count();

        return view('components.dashboard.index' , compact('user', 'devices', 'types', 'users'));
    }
}
