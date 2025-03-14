@extends('dashbordLayout')

@section('content')
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <h6 class="text-lg font-semibold mb-6">Welcome {{ auth()->user()->name }}</h6>

        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('devices.index') }}">
                <div class="card bg-[#FCF8F3] dark:bg-gray-700  shadow-sm">
                    <div class="card-body">
                        <h6 class="text-lg font-semibold">number of devices</h6>
                        <p class="text-3xl font-bold">
                            {{ $devices }}
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('types.index') }}">
                <div class="card bg-[#FCF8F3] dark:bg-gray-700  shadow-sm">
                    <div class="card-body">
                        <h6 class="text-lg font-semibold">number of types</h6>
                        <p class="text-3xl font-bold">
                            {{ $types }}
                        </p>
                    </div>
                </div>
            </a>
            <a href="{{ route('devices.unassigned') }}">
                <div class="card bg-[#FCF8F3] dark:bg-gray-700  shadow-sm">
                    <div class="card-body">
                        <h6 class="text-lg font-semibold">unassigned devices</h6>
                        <p class="text-3xl font-bold">{{ $unassigned }}</p>
                    </div>
                </div>
            </a>
            <!-- Total Users Card -->
            <div class="card bg-customBeige dark:bg-gray-700  shadow-sm">
                <div class="card-body">
                    <h6 class="text-lg font-semibold">Total Users</h6>
                    <p class="text-3xl font-bold">{{ $users }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] mt-4">
    <div class="card-body">
        <h6 class="text-lg font-semibold mb-6">types of Devices count</h6>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($typesWithCount as $type)
                <div class="card bg-[#FCF8F3] dark:bg-gray-700  shadow-sm">
                    <div class="card-body">
                        <h6 class="text-lg font-semibold">{{ $type->name }}</h6>
                        <p class="text-3xl font-bold">{{ $type->device_count }}</p>
                    </div>
                </div>
            @endforeach
    </div>
@endsection
