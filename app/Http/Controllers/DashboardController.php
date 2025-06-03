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
        $unassigned = Device::whereNull('assignee_id')->count();

        $typesWithCount = DB::table('types')
            ->leftJoin('devices', 'types.id', '=', 'devices.type_id')
            ->select('types.name', DB::raw('COUNT(devices.id) as device_count'))
            ->groupBy('types.id', 'types.name')
            ->get()->map(function ($type) {
                return [
                    'name' => $type->name,
                    'device_count' => $type->device_count
                ];
            })->toArray();

        $topUsers = User::withCount('devices')
            ->orderByDesc('devices_count')
            ->take(5)->get();

        $recentDevices = Device::latest()->take(5)->get();

        $deviceStatusCount = Device::selectRaw('is_defective, COUNT(*) as total')
            ->groupBy('is_defective')
            ->get()
            ->mapWithKeys(fn($item) => [
                $item->is_defective ? 'Defective' : 'Working' => $item->total
            ]);
        return view('components.dashboard.index', compact(
            'user', 'devices', 'users', 'types', 'unassigned',
            'typesWithCount', 'topUsers', 'recentDevices', 'deviceStatusCount'
        ));
    }
}
