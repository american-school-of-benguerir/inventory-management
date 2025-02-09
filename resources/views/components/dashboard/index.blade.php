@extends('dashbordLayout')

@section('content')
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <h6 class="text-lg font-semibold mb-6">Welcome {{ auth()->user()->name }}</h6>

        <div class="grid grid-cols-2 gap-4">
            <div class="card bg-[#FCF8F3] dark:bg-gray-700  shadow-sm">
                <div class="card-body">
                    <h6 class="text-lg font-semibold">number of devices</h6>
                    <p class="text-3xl font-bold">
                        {{ $devices }}
                    </p>
                </div>
            </div>

            <!-- Freezer Temp (Lowest) Card -->
            <div class="card bg-[#FCF8F3] dark:bg-gray-700  shadow-sm">
                <div class="card-body">
                    <h6 class="text-lg font-semibold">number of types</h6>
                    <p class="text-3xl font-bold">
                        {{ $types }}
                    </p>
                </div>
            </div>
            <div class="card bg-customBeige dark:bg-gray-700  shadow-sm">
                <div class="card-body">
                    <h6 class="text-lg font-semibold">Pending tasks</h6>
                    <p class="text-3xl font-bold">1</p>
                </div>
            </div>

            <!-- Pending Tasks Card -->
            <div class="card bg-[#FCF8F3] dark:bg-gray-700  shadow-sm">
                <div class="card-body">
                    <h6 class="text-lg font-semibold">unassigned devices</h6>
                    <p class="text-3xl font-bold">1</p>
                </div>
            </div>
            <!-- Total Users Card -->
            <div class="card bg-customBeige dark:bg-gray-700  shadow-sm">
                <div class="card-body">
                    <h6 class="text-lg font-semibold">Total Users</h6>
                    <p class="text-3xl font-bold">{{ $users }}</p>
                </div>
            </div>

            <!-- Pending Tasks Card -->
            <div class="card bg-[#FCF8F3] dark:bg-gray-700  shadow-sm">
                <div class="card-body">
                    <h6 class="text-lg font-semibold">Pending Tasks</h6>
                    <p class="text-3xl font-bold">1</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
