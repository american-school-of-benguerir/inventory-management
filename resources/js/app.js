import './bootstrap';
import { initializeCharts } from './charts';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Initialize charts if we're on the dashboard
if (document.getElementById('assignmentChart')) {
    const devices = parseInt(document.getElementById('assignmentChart').dataset.devices || 0);
    const unassigned = parseInt(document.getElementById('assignmentChart').dataset.unassigned || 0);
    const typesWithCount = JSON.parse(document.getElementById('assignmentChart').dataset.types || '[]');

    initializeCharts(devices, unassigned, typesWithCount);
}
