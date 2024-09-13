import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',    // Already included
                'resources/js/app.js',        // Already included
                'resources/scss/styles.scss'  // Add this line
            ],
            refresh: true,
        }),
    ],
});
