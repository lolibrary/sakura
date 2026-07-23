import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/search.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~fontawesome': path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-pro'),
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~tom-select': path.resolve(__dirname, 'node_modules/tom-select'),
            '~simple-lightbox': path.resolve(__dirname, 'node_modules/simple-lightbox'),
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                quietDeps: true,
                silenceDeprecations: ["slash-div", "color-functions", "global-builtin", "import"],
            },
        }
    }
});
