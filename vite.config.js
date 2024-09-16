import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/scss/styles.scss',
                'resources/js/app.js',
                'resources/css/styles-rtl.css',
                'resources/scss/styles.scss',
            ],
            refresh: true,
        }),
        react(),
    ],
});
