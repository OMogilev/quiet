import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/client/css/app.css',

                'resources/assets/client/js/app.js',

                //
                // 'resources/assets/admin/scss/main.scss',
                // 'resources/assets/admin/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
