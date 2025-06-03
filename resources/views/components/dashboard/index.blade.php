@extends('dashbordLayout')

@section('content')
<div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
    <div class="card-body">
        <h6 class="text-lg font-semibold mb-6">Welcome {{ auth()->user()->name }}</h6>

        <div class="grid grid-cols-2 gap-4">
            <a href="{{ route('devices.index') }}">
                <div class="card bg-[#FCF8F3] dark:bg-gray-700 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-lg font-semibold">Number of Devices</h6>
                        <p class="text-3xl font-bold">{{ $devices }}</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('types.index') }}">
                <div class="card bg-[#FCF8F3] dark:bg-gray-700 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-lg font-semibold">Number of Types</h6>
                        <p class="text-3xl font-bold">{{ $types }}</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('devices.unassigned') }}">
                <div class="card bg-[#FCF8F3] dark:bg-gray-700 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-lg font-semibold">Unassigned Devices</h6>
                        <p class="text-3xl font-bold">{{ $unassigned }}</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('users.index') }}">
            <div class="card bg-[#FCF8F3] dark:bg-gray-700 shadow-sm">
                <div class="card-body">
                    <h6 class="text-lg font-semibold">Total Users</h6>
                    <p class="text-3xl font-bold">{{ $users }}</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] mt-4">
    <div class="card-body">
        <h6 class="text-lg font-semibold mb-6">Types of Devices Count</h6>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($typesWithCount as $type)
                <div class="card bg-[#FCF8F3] dark:bg-gray-700 shadow-sm">
                    <div class="card-body">
                        <h6 class="text-lg font-semibold">{{ $type["name"] }}</h6>
                        <p class="text-3xl font-bold">{{ $type["device_count"] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="card bg-[#ebe7e4] dark:bg-[#262F3F] mt-4 pb-10">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        <!-- Device Assignment Chart -->
        <div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
            <div class="card-body" style="height: 400px;">
                <h6 class="text-lg font-semibold mb-6">Device Assignment Status</h6>
                <canvas id="assignmentChart" class="w-full"></canvas>
            </div>
        </div>

        <!-- Device Types Distribution Chart -->
        <div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
            <div class="card-body" style="height: 400px;">
                <h6 class="text-lg font-semibold mb-6">Device Types Distribution</h6>
                <canvas id="typesChart" class="w-full"></canvas>
            </div>
        </div>

        <!-- Device Defective Status Chart -->
        <div class="card bg-[#ebe7e4] dark:bg-[#262F3F]">
            <div class="card-body" style="height: 400px;">
                <h6 class="text-lg font-semibold mb-6">Device Condition (Working vs Defective)</h6>
                <canvas id="deviceStatusChart" class="w-full"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.chartInstances) {
            window.chartInstances.forEach(chart => chart.destroy());
        }
        window.chartInstances = [];

        const devices = {{ $devices }};
        const unassigned = {{ $unassigned }};
        const typesWithCount = @json($typesWithCount);
        const deviceStatusCount = @json($deviceStatusCount);

        // Assignment Chart
        const assignmentCtx = document.getElementById('assignmentChart')?.getContext('2d');
        if (assignmentCtx) {
            const assignmentChart = new Chart(assignmentCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Assigned', 'Unassigned'],
                    datasets: [{
                        data: [devices - unassigned, unassigned],
                        backgroundColor: ['rgba(108, 162, 150, 0.8)', 'rgba(133, 118, 255, 0.8)'],
                        borderColor: ['rgba(108, 162, 150, 1)', 'rgba(133, 118, 255, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000'
                            }
                        }
                    }
                }
            });
            window.chartInstances.push(assignmentChart);
        }

        // Types Chart
        const typesCtx = document.getElementById('typesChart')?.getContext('2d');
        if (typesCtx && typesWithCount.length > 0) {
            const labels = typesWithCount.map(item => item.name);
            const data = typesWithCount.map(item => item.device_count);

            const typesChart = new Chart(typesCtx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Number of Devices',
                        data: data,
                        backgroundColor: 'rgba(108, 162, 150, 0.8)',
                        borderColor: 'rgba(108, 162, 150, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000'
                            },
                            grid: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000'
                            },
                            grid: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'rgba(255,255,255,0.1)' : 'rgba(0,0,0,0.1)'
                            }
                        }
                    }
                }
            });
            window.chartInstances.push(typesChart);
        }

        // Device Status Chart
        const deviceStatusCtx = document.getElementById('deviceStatusChart')?.getContext('2d');
        if (deviceStatusCtx && deviceStatusCount) {
            const labels = Object.keys(deviceStatusCount);
            const data = Object.values(deviceStatusCount);

            const statusChart = new Chart(deviceStatusCtx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: ['rgba(108, 162, 150, 0.8)', 'rgba(255, 99, 132, 0.8)'],
                        borderColor: ['rgba(108, 162, 150, 1)', 'rgba(255, 99, 132, 1)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000'
                            }
                        }
                    }
                }
            });
            window.chartInstances.push(statusChart);
        }

        // Dark Mode Listener
        const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
        darkModeMediaQuery.addEventListener('change', (e) => {
            const isDark = e.matches;
            const textColor = isDark ? '#fff' : '#000';
            const gridColor = isDark ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';
            window.chartInstances.forEach(chart => {
                if (chart.options.scales) {
                    chart.options.scales.x.ticks.color = textColor;
                    chart.options.scales.x.grid.color = gridColor;
                    chart.options.scales.y.ticks.color = textColor;
                    chart.options.scales.y.grid.color = gridColor;
                }
                if (chart.options.plugins.legend) {
                    chart.options.plugins.legend.labels.color = textColor;
                }
                chart.update();
            });
        });
    });
</script>
@endsection
