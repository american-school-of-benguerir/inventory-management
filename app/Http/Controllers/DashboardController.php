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
        $devices = Device::count();
        $users = User::count();
        $types = Type::count();
        // get count of unassigned devices
        $unassigned = Device::where('assignee_id', null)->count();
        // Get types with device counts using a direct query
        $typesWithCount = DB::table('types')
            ->leftJoin('devices', 'types.id', '=', 'devices.type_id')
            ->select('types.name', DB::raw('COUNT(devices.id) as device_count'))
            ->groupBy('types.id', 'types.name')
            ->get()
            ->map(function ($type) {
                return [
                    'name' => $type->name,
                    'device_count' => $type->device_count
                ];
            })
            ->toArray(); // Convert to plain array
        return view('components.dashboard.index' , compact('user', 'devices', 'types', 'users', 'unassigned', 'typesWithCount'));
    }
}
