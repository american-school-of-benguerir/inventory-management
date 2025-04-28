import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/theme.css',  // Add theme.css here
                'resources/js/app.js',
                'resources/js/libs/jquery/dist/jquery.min.js',  // Add jQuery
                'resources/js/libs/simplebar/dist/simplebar.min.js',  // Add Simplebar
                'resources/js/libs/iconify-icon/dist/iconify-icon.min.js',  // Add Iconify
                'resources/js/libs/@preline/dropdown/index.js',  // Add Preline Dropdown
                'resources/js/libs/@preline/overlay/index.js',  // Add Preline Overlay
                'resources/js/sidebarmenu.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': resolve(__dirname, 'resources/js'),
        },
    },
    build: {
        rollupOptions: {
            external: ['chart.js'],
        },
    },
});
