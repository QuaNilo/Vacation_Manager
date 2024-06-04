import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy'
import path from "path";

export default defineConfig({
    build: {
        commonjsOptions: {
            include: ["backend-tailwind.config.js", "node_modules/**"],
        },
    },
    optimizeDeps: {
        include: ["tailwind-config"],
    },
    plugins: [
        viteStaticCopy({
            targets: [
                { src: 'resources/js/vendor/ckeditor/custom/build/ckeditor.js', dest: 'js/ckeditor' },
                { src: 'node_modules/intl-tel-input/build/js/utils.js', dest: 'js/intl-tel-input' }
            ]
        }),
        laravel({
            input: [
                // CSS Vendor
                "resources/css/vendor/ckeditor.css",
                "resources/css/vendor/dropzone.css",
                "resources/css/vendor/full-calendar.css",
                "resources/css/vendor/highlight.css",
                "resources/css/vendor/leaflet.css",
                "resources/css/vendor/litepicker.css",
                "resources/css/vendor/simplebar.css",
                "resources/css/vendor/tabulator.css",
                "resources/css/vendor/tiny-slider.css",
                "resources/css/vendor/tippy.css",
                "resources/css/vendor/toastify.css",
                "resources/css/vendor/tom-select.css",
                "resources/css/vendor/zoom-vanilla.css",

                // CSS Themes
                "resources/css/themes/enigma/side-nav.css",
                "resources/css/themes/enigma/top-nav.css",
                "resources/css/themes/icewall/side-nav.css",
                "resources/css/themes/icewall/top-nav.css",
                "resources/css/themes/rubick/side-nav.css",
                "resources/css/themes/rubick/top-nav.css",
                "resources/css/themes/tinker/side-nav.css",
                "resources/css/themes/tinker/top-nav.css",

                // CSS Components
                "resources/css/components/mobile-menu.css",

                // CSS General
                "resources/css/app.css",

                // JS Vendor
                "resources/js/vendor/accordion.js",
                "resources/js/vendor/alert.js",
                "resources/js/vendor/axios.js",
                "resources/js/vendor/calendar/calendar.js",
                "resources/js/vendor/calendar/plugins/day-grid.js",
                "resources/js/vendor/calendar/plugins/interaction.js",
                "resources/js/vendor/calendar/plugins/list.js",
                "resources/js/vendor/calendar/plugins/time-grid.js",
                "resources/js/vendor/chartjs.js",
                "resources/js/vendor/dayjs.js",
                "resources/js/vendor/ckeditor/balloon.js",
                "resources/js/vendor/ckeditor/balloon-block.js",
                "resources/js/vendor/ckeditor/classic.js",
                "resources/js/vendor/ckeditor/document.js",
                "resources/js/vendor/ckeditor/inline.js",
                "resources/js/vendor/popper.js",
                "resources/js/vendor/dom.js",
                "resources/js/vendor/dropdown.js",
                "resources/js/vendor/dropzone.js",
                "resources/js/vendor/highlight.js",
                "resources/js/vendor/image-zoom.js",
                "resources/js/vendor/leaflet-map.js",
                "resources/js/vendor/litepicker.js",
                "resources/js/vendor/lodash.js",
                "resources/js/vendor/lucide.js",
                "resources/js/vendor/modal.js",
                "resources/js/vendor/pristine.js",
                "resources/js/vendor/simplebar.js",
                "resources/js/vendor/svg-loader.js",
                "resources/js/vendor/tab.js",
                "resources/js/vendor/tabulator.js",
                "resources/js/vendor/tailwind-merge.js",
                "resources/js/vendor/tiny-slider.js",
                "resources/js/vendor/tippy.js",
                "resources/js/vendor/toastify.js",
                "resources/js/vendor/tom-select.js",
                "resources/js/vendor/transition.js",
                "resources/js/vendor/xlsx.js",

                // JS Utils
                "resources/js/utils/colors.js",
                "resources/js/utils/helper.js",

                // JS Pages
                "resources/js/pages/chat.js",
                "resources/js/pages/modal.js",
                "resources/js/pages/notification.js",
                "resources/js/pages/slideover.js",
                "resources/js/pages/tabulator.js",
                "resources/js/pages/validation.js",

                // JS Themes
                "resources/js/themes/rubick.js",
                "resources/js/themes/icewall.js",
                "resources/js/themes/tinker.js",
                "resources/js/themes/enigma.js",

                // JS Base Components
                "resources/js/components/base/theme-color.js",
                "resources/js/components/base/calendar/calendar.js",
                "resources/js/components/base/calendar/draggable.js",
                "resources/js/components/base/balloon-block-editor.js",
                "resources/js/components/base/balloon-editor.js",
                "resources/js/components/base/classic-editor.js",
                "resources/js/components/base/document-editor.js",
                "resources/js/components/base/dropzone.js",
                "resources/js/components/base/highlight.js",
                "resources/js/components/base/inline-editor.js",
                "resources/js/components/base/leaflet-map-loader.js",
                "resources/js/components/base/litepicker.js",
                "resources/js/components/base/lucide.js",
                "resources/js/components/base/preview-component.js",
                "resources/js/components/base/source.js",
                "resources/js/components/base/tiny-slider.js",
                "resources/js/components/base/tippy.js",
                "resources/js/components/base/tippy-content.js",
                "resources/js/components/base/tom-select.js",

                // JS Components
                "resources/js/components/themes/enigma/top-bar.js",
                "resources/js/components/themes/icewall/top-bar.js",
                "resources/js/components/themes/rubick/top-bar.js",
                "resources/js/components/themes/tinker/top-bar.js",
                "resources/js/components/donut-chart.js",
                "resources/js/components/horizontal-bar-chart.js",
                "resources/js/components/line-chart.js",
                "resources/js/components/mobile-menu.js",
                "resources/js/components/pie-chart.js",
                "resources/js/components/report-bar-chart-1.js",
                "resources/js/components/report-bar-chart.js",
                "resources/js/components/report-donut-chart-1.js",
                "resources/js/components/report-donut-chart-2.js",
                "resources/js/components/report-donut-chart.js",
                "resources/js/components/report-line-chart.js",
                "resources/js/components/report-pie-chart.js",
                "resources/js/components/simple-line-chart-1.js",
                "resources/js/components/simple-line-chart-2.js",
                "resources/js/components/simple-line-chart-3.js",
                "resources/js/components/simple-line-chart-4.js",
                "resources/js/components/simple-line-chart.js",
                "resources/js/components/stacked-bar-chart-1.js",
                "resources/js/components/stacked-bar-chart.js",
                "resources/js/components/vertical-bar-chart.js",

                //custom
                "resources/js/vendor/flatpickr.js",
                "resources/js/components/flatpickr.js",
                "resources/css/vendor/flatpickr.css",
                "resources/css/vendor/intl-tel-input.css",
                "resources/js/vendor/intl-tel-input.js",

                // JS General
                "resources/js/app.js",
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        }),
    ],
    resolve: {
        alias: {
            "tailwind-config": path.resolve(__dirname, "./backend-tailwind.config.js"),
        },
    },
});
