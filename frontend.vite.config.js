
import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import path from "path";

export default defineConfig({
    /*build: {
        commonjsOptions: {
            include: ["frontend-tailwind.config.js", "node_modules/**"],
        },
    },
    optimizeDeps: {
        include: ["tailwind-config"],
    },*/
    plugins: [
        laravel({
            input: [
                'resources/frontend-assets/scss/materialdesignicons.scss',
                'resources/frontend-assets/scss/app.scss',
                'resources/frontend-assets/js/app.js',
                'resources/frontend-assets/js/easy_background.js',
                'resources/frontend-assets/js/plugins.init.js',
                'resources/frontend-assets/scss/vendor/tiny-slider.scss',
                'resources/frontend-assets/js/vendor/tiny-slider.js',
                'resources/frontend-assets/js/vendor/feather.js',
                'resources/frontend-assets/js/vendor/tobii.js',
                'resources/frontend-assets/scss/vendor/tobii.scss',
                'resources/frontend-assets/js/vendor/jarallax.js',
                'resources/frontend-assets/scss/vendor/animate.scss',
                'resources/frontend-assets/js/vendor/wow.js',

                //from backend
                'resources/js/vendor/dom.js',
                'resources/js/vendor/tom-select.js',
                'resources/js/components/base/tom-select.js',
                'resources/js/vendor/toastify.js',
                'resources/css/vendor/toastify.css',

                //"resources/js/vendor/tiny-slider.js",
            ],
            buildDirectory: '/frontend-assets',
            refresh: true,
        }),
    ],
    /*css: {
        postcss: {
            plugins: {
                "postcss-import": {}, //midone
                "postcss-advanced-variables": {}, //midone
                "tailwindcss/nesting": '', //midone
                tailwindcss: './frontend-tailwind.config.js',
                autoprefixer: {},
            },
        },
    },
    resolve: {
        alias: {
            "tailwind-config": path.resolve(__dirname, "./frontend-tailwind.config.js"),
        },
    },*/
});
