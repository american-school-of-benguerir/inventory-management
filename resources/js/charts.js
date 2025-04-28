import Chart from 'chart.js/auto';

export function initializeCharts(devices, unassigned, typesWithCount) {
    // Device Assignment Status Chart
    const assignmentCtx = document.getElementById('assignmentChart')?.getContext('2d');
    if (assignmentCtx) {
        new Chart(assignmentCtx, {
            type: 'doughnut',
            data: {
                labels: ['Assigned', 'Unassigned'],
                datasets: [{
                    data: [devices - unassigned, unassigned],
                    backgroundColor: [
                        'rgba(108, 162, 150, 0.8)', // #6ca296
                        'rgba(133, 118, 255, 0.8)', // #8576ff
                    ],
                    borderColor: [
                        'rgba(108, 162, 150, 1)',
                        'rgba(133, 118, 255, 1)',
                    ],
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
    }

    // Device Types Distribution Chart
    const typesCtx = document.getElementById('typesChart')?.getContext('2d');
    if (typesCtx) {
        new Chart(typesCtx, {
            type: 'bar',
            data: {
                labels: typesWithCount.map(type => type.name),
                datasets: [{
                    label: 'Number of Devices',
                    data: typesWithCount.map(type => type.device_count),
                    backgroundColor: 'rgba(108, 162, 150, 0.8)',
                    borderColor: 'rgba(108, 162, 150, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000'
                        },
                        grid: {
                            color: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        ticks: {
                            color: window.matchMedia('(prefers-color-scheme: dark)').matches ? '#fff' : '#000'
                        },
                        grid: {
                            color: window.matchMedia('(prefers-color-scheme: dark)').matches ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)'
                        }
                    }
                }
            }
        });
    }

    // Update chart colors when dark mode changes
    const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    darkModeMediaQuery.addEventListener('change', (e) => {
        const isDarkMode = e.matches;
        const textColor = isDarkMode ? '#fff' : '#000';
        const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.1)';

        Chart.helpers.each(Chart.instances, (instance) => {
            if (instance.options.scales) {
                instance.options.scales.y.ticks.color = textColor;
                instance.options.scales.y.grid.color = gridColor;
                instance.options.scales.x.ticks.color = textColor;
                instance.options.scales.x.grid.color = gridColor;
            }
            if (instance.options.plugins.legend) {
                instance.options.plugins.legend.labels.color = textColor;
            }
            instance.update();
        });
    });
}
