import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/admin.css',
                'resources/css/all.min.css',
                'resources/css/app.css',
                'resources/css/modal-form.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
