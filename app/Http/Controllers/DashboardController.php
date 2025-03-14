<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use App\Models\User;
use App\Models\Type;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $devices = Device::all()->count();
        $users = User::all()->count();
        $types = Type::all()->count();
        // get count of unassigned devices
        $unassigned = Device::where('assignee_id', null)->count();
        // getting all types and how many devices linked to each type
        $typesWithCount = DB::table('types')
        ->leftJoin('devices', 'types.id', '=', 'devices.type_id')
        ->select('types.id', 'types.name', DB::raw('COUNT(devices.id) as device_count'))
        ->groupBy('types.id', 'types.name')
        ->get();
        return view('components.dashboard.index' , compact('user', 'devices', 'types', 'users', 'unassigned', 'typesWithCount'));
    }
}
