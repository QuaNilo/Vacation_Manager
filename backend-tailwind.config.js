//jetstram
/*import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';*/

//const plugin = require("tailwindcss/plugin");
//const colors = require("tailwindcss/colors");
//const { parseColor } = require("tailwindcss/lib/util/color");
import plugin from "tailwindcss/plugin";
import colors from "tailwindcss/colors";
import forms from '@tailwindcss/forms';
import { parseColor } from "tailwindcss/lib/util/color";
import preset from './vendor/filament/support/tailwind.config.preset'


/** Converts HEX color to RGB */
const toRGB = (value) => {
    return parseColor(value).color.join(" ");
};


/** @type {import('tailwindcss').Config} */
export default {
    //presets: [preset],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',

        "./resources/**/*.{php,html,js,jsx,ts,tsx}",

    ],
    darkMode: "class",
    theme: {
        extend: {
            screens: {
                '3xl': '1920px',
                '4xl': '2560px',
            },
            colors: {
                theme: {
                    1: "rgb(var(--color-theme-1) / <alpha-value>)",
                    2: "rgb(var(--color-theme-2) / <alpha-value>)",
                },
                primary: "rgb(var(--color-primary) / <alpha-value>)",
                secondary: "rgb(var(--color-secondary) / <alpha-value>)",
                success: "rgb(var(--color-success) / <alpha-value>)",
                info: "rgb(var(--color-info) / <alpha-value>)",
                warning: "rgb(var(--color-warning) / <alpha-value>)",
                pending: "rgb(var(--color-pending) / <alpha-value>)",
                danger: "rgb(var(--color-danger) / <alpha-value>)",
                light: "rgb(var(--color-light) / <alpha-value>)",
                dark: "rgb(var(--color-dark) / <alpha-value>)",
                darkmode: {
                    50: "rgb(var(--color-darkmode-50) / <alpha-value>)",
                    100: "rgb(var(--color-darkmode-100) / <alpha-value>)",
                    200: "rgb(var(--color-darkmode-200) / <alpha-value>)",
                    300: "rgb(var(--color-darkmode-300) / <alpha-value>)",
                    400: "rgb(var(--color-darkmode-400) / <alpha-value>)",
                    500: "rgb(var(--color-darkmode-500) / <alpha-value>)",
                    600: "rgb(var(--color-darkmode-600) / <alpha-value>)",
                    700: "rgb(var(--color-darkmode-700) / <alpha-value>)",
                    800: "rgb(var(--color-darkmode-800) / <alpha-value>)",
                    900: "rgb(var(--color-darkmode-900) / <alpha-value>)",
                },
                //for filament
                custom: {
                    50: 'rgb(var(--c-50) / <alpha-value>)',
                    100: 'rgb(var(--c-100) / <alpha-value>)',
                    200: 'rgb(var(--c-200) / <alpha-value>)',
                    300: 'rgb(var(--c-300) / <alpha-value>)',
                    400: 'rgb(var(--c-400) / <alpha-value>)',
                    500: 'rgb(var(--c-500) / <alpha-value>)',
                    600: 'rgb(var(--c-600) / <alpha-value>)',
                    700: 'rgb(var(--c-700) / <alpha-value>)',
                    800: 'rgb(var(--c-800) / <alpha-value>)',
                    900: 'rgb(var(--c-900) / <alpha-value>)',
                    950: 'rgb(var(--c-950) / <alpha-value>)',
                },
            },
            fontFamily: {
                roboto: ["Roboto"],
            },
            container: {
                center: true,
            },
            maxWidth: {
                "1/4": "25%",
                "1/2": "50%",
                "3/4": "75%",
            },
            strokeWidth: {
                0.5: 0.5,
                1.5: 1.5,
                2.5: 2.5,
            },
            zIndex: {
                1: '1',
                2: '2',
                3: '3',
                999: '999',
            },
            backgroundImage: {
                "chevron-white":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23ffffff95' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E\")",
                "chevron-black":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%2300000095' stroke-width='1.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E\")",
                "file-icon-empty-directory":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='786' height='786' viewBox='0 0 786 786'%3E%3Cdefs%3E%3ClinearGradient id='linear-gradient' x1='0.5' x2='0.5' y2='1' gradientUnits='objectBoundingBox'%3E%3Cstop offset='0' stop-color='%238a97ac'/%3E%3Cstop offset='1' stop-color='%235d6c83'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg id='Group_2' data-name='Group 2' transform='translate(-567 -93)'%3E%3Crect id='Rectangle_4' data-name='Rectangle 4' width='418' height='681' rx='40' transform='translate(896 109)' fill='%2395a5b9'/%3E%3Crect id='Rectangle_3' data-name='Rectangle 3' width='433' height='681' rx='40' transform='translate(606 93)' fill='%23a0aec0'/%3E%3Crect id='Rectangle_2' data-name='Rectangle 2' width='786' height='721' rx='40' transform='translate(567 158)' fill='url(%23linear-gradient)'/%3E%3C/g%3E%3C/svg%3E%0A\")",
                "file-icon-directory":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='786' height='786' viewBox='0 0 786 786'%3E%3Cdefs%3E%3ClinearGradient id='linear-gradient' x1='0.5' x2='0.5' y2='1' gradientUnits='objectBoundingBox'%3E%3Cstop offset='0' stop-color='%238a97ac'/%3E%3Cstop offset='1' stop-color='%235d6c83'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg id='Group_3' data-name='Group 3' transform='translate(-567 -93)'%3E%3Crect id='Rectangle_4' data-name='Rectangle 4' width='418' height='681' rx='40' transform='translate(896 109)' fill='%2395a5b9'/%3E%3Crect id='Rectangle_3' data-name='Rectangle 3' width='433' height='681' rx='40' transform='translate(606 93)' fill='%23a0aec0'/%3E%3Crect id='Rectangle_2' data-name='Rectangle 2' width='742' height='734' rx='40' transform='translate(590 145)' fill='%23bec8d9'/%3E%3Crect id='Rectangle_5' data-name='Rectangle 5' width='786' height='692' rx='40' transform='translate(567 187)' fill='url(%23linear-gradient)'/%3E%3C/g%3E%3C/svg%3E%0A\")",
                "file-icon-file":
                    "url(\"data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='628.027' height='786.012' viewBox='0 0 628.027 786.012'%3E%3Cdefs%3E%3ClinearGradient id='linear-gradient' x1='0.5' x2='0.5' y2='1' gradientUnits='objectBoundingBox'%3E%3Cstop offset='0' stop-color='%238a97ac'/%3E%3Cstop offset='1' stop-color='%235d6c83'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg id='Group_5' data-name='Group 5' transform='translate(-646 -92.988)'%3E%3Cpath id='Union_2' data-name='Union 2' d='M40,786A40,40,0,0,1,0,746V40A40,40,0,0,1,40,0H501V103h29v24h98V746a40,40,0,0,1-40,40Z' transform='translate(646 93)' fill='url(%23linear-gradient)'/%3E%3Cpath id='Intersection_2' data-name='Intersection 2' d='M.409,162.042l.058-109.9c31.605,29.739,125.37,125.377,125.37,125.377l-109.976.049A20.025,20.025,0,0,1,.409,162.042Z' transform='translate(1147 42)' fill='%23bec8d9' stroke='%23bec8d9' stroke-width='1'/%3E%3C/g%3E%3C/svg%3E%0A\")",
            },
        },
    },
    plugins: [
        forms,
        plugin(function ({ addBase }) {
            addBase({
                // Default colors
                ":root": {
                    "--color-theme-1": toRGB(colors.blue["800"]),
                    "--color-theme-2": toRGB(colors.blue["900"]),
                    "--color-primary": toRGB(colors.blue["900"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.lime["500"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.yellow["400"]),
                    "--color-pending": toRGB(colors.orange["500"]),
                    "--color-danger": toRGB(colors.red["600"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    //custom for filament
                    "--primary-50":toRGB(colors.blue["50"]),
                    "--primary-100":toRGB(colors.blue["100"]),
                    "--primary-200":toRGB(colors.blue["200"]),
                    "--primary-300":toRGB(colors.blue["300"]),
                    "--primary-400":toRGB(colors.blue["400"]),
                    "--primary-500":toRGB(colors.blue["500"]),
                    "--primary-600":toRGB(colors.blue["600"]),
                    "--primary-700":toRGB(colors.blue["700"]),
                    "--primary-800":toRGB(colors.blue["800"]),
                    "--primary-900":toRGB(colors.blue["900"]),
                    "--primary-950":toRGB(colors.blue["950"]),
                    "--danger-50":toRGB(colors.red["50"]),
                    "--danger-100":toRGB(colors.red["100"]),
                    "--danger-200":toRGB(colors.red["200"]),
                    "--danger-300":toRGB(colors.red["300"]),
                    "--danger-400":toRGB(colors.red["400"]),
                    "--danger-500":toRGB(colors.red["500"]),
                    "--danger-600":toRGB(colors.red["600"]),
                    "--danger-700":toRGB(colors.red["700"]),
                    "--danger-800":toRGB(colors.red["800"]),
                    "--danger-900":toRGB(colors.red["900"]),
                    "--danger-950":toRGB(colors.red["950"]),
                    "--warning-50":toRGB(colors.yellow["50"]),
                    "--warning-100":toRGB(colors.yellow["100"]),
                    "--warning-200":toRGB(colors.yellow["200"]),
                    "--warning-300":toRGB(colors.yellow["300"]),
                    "--warning-400":toRGB(colors.yellow["400"]),
                    "--warning-500":toRGB(colors.yellow["500"]),
                    "--warning-600":toRGB(colors.yellow["600"]),
                    "--warning-700":toRGB(colors.yellow["700"]),
                    "--warning-800":toRGB(colors.yellow["800"]),
                    "--warning-900":toRGB(colors.yellow["900"]),
                    "--warning-950":toRGB(colors.yellow["950"]),
                    "--success-50":toRGB(colors.lime["50"]),
                    "--success-100":toRGB(colors.lime["100"]),
                    "--success-200":toRGB(colors.lime["200"]),
                    "--success-300":toRGB(colors.lime["300"]),
                    "--success-400":toRGB(colors.lime["400"]),
                    "--success-500":toRGB(colors.lime["500"]),
                    "--success-600":toRGB(colors.lime["600"]),
                    "--success-700":toRGB(colors.lime["700"]),
                    "--success-800":toRGB(colors.lime["800"]),
                    "--success-900":toRGB(colors.lime["900"]),
                    "--success-950":toRGB(colors.lime["950"]),
                    "--info-50":toRGB(colors.cyan["50"]),
                    "--info-100":toRGB(colors.cyan["100"]),
                    "--info-200":toRGB(colors.cyan["200"]),
                    "--info-300":toRGB(colors.cyan["300"]),
                    "--info-400":toRGB(colors.cyan["400"]),
                    "--info-500":toRGB(colors.cyan["500"]),
                    "--info-600":toRGB(colors.cyan["600"]),
                    "--info-700":toRGB(colors.cyan["700"]),
                    "--info-800":toRGB(colors.cyan["800"]),
                    "--info-900":toRGB(colors.cyan["900"]),
                    "--info-950":toRGB(colors.cyan["950"]),
                    "--gray-50":toRGB(colors.gray["50"]),
                    "--gray-100":toRGB(colors.gray["100"]),
                    "--gray-200":toRGB(colors.gray["200"]),
                    "--gray-300":toRGB(colors.gray["300"]),
                    "--gray-400":toRGB(colors.gray["400"]),
                    "--gray-500":toRGB(colors.gray["500"]),
                    "--gray-600":toRGB(colors.gray["600"]),
                    "--gray-700":toRGB(colors.gray["700"]),
                    "--gray-800":toRGB(colors.gray["800"]),
                    "--gray-900":toRGB(colors.gray["900"]),
                    "--gray-950":toRGB(colors.gray["950"]),
                },
                // Default dark-mode colors
                ".dark": {
                    "--color-primary": toRGB(colors.blue["700"]),
                    "--color-darkmode-50": "87 103 132",
                    "--color-darkmode-100": "74 90 121",
                    "--color-darkmode-200": "65 81 114",
                    "--color-darkmode-300": "53 69 103",
                    "--color-darkmode-400": "48 61 93",
                    "--color-darkmode-500": "41 53 82",
                    "--color-darkmode-600": "40 51 78",
                    "--color-darkmode-700": "35 45 69",
                    "--color-darkmode-800": "27 37 59",
                    "--color-darkmode-900": "15 23 42",
                },
                // Theme 1 colors
                ".theme-1": {
                    "--color-theme-1": toRGB(colors.emerald["800"]),
                    "--color-theme-2": toRGB(colors.emerald["900"]),
                    "--color-primary": toRGB(colors.emerald["900"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.emerald["600"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.yellow["400"]),
                    "--color-pending": toRGB(colors.amber["500"]),
                    "--color-danger": toRGB(colors.rose["600"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    "&.dark": {
                        "--color-primary": toRGB(colors.emerald["800"]),
                    },
                },
                // Theme 2 colors
                ".theme-2": {
                    "--color-theme-1": toRGB(colors.blue["900"]),
                    "--color-theme-2": toRGB(colors.blue["950"]),
                    "--color-primary": toRGB(colors.blue["950"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.teal["600"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.amber["500"]),
                    "--color-pending": toRGB(colors.orange["500"]),
                    "--color-danger": toRGB(colors.red["700"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    "&.dark": {
                        "--color-primary": toRGB(colors.blue["800"]),
                    },
                },
                // Theme 3 colors
                ".theme-3": {
                    "--color-theme-1": toRGB(colors.cyan["800"]),
                    "--color-theme-2": toRGB(colors.cyan["900"]),
                    "--color-primary": toRGB(colors.cyan["900"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.teal["600"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.amber["500"]),
                    "--color-pending": toRGB(colors.amber["600"]),
                    "--color-danger": toRGB(colors.red["700"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    "&.dark": {
                        "--color-primary": toRGB(colors.cyan["800"]),
                    },
                },
                // Theme 4 colors
                ".theme-4": {
                    "--color-theme-1": toRGB(colors.indigo["800"]),
                    "--color-theme-2": toRGB(colors.indigo["900"]),
                    "--color-primary": toRGB(colors.indigo["900"]),
                    "--color-secondary": toRGB(colors.slate["200"]),
                    "--color-success": toRGB(colors.emerald["600"]),
                    "--color-info": toRGB(colors.cyan["500"]),
                    "--color-warning": toRGB(colors.yellow["500"]),
                    "--color-pending": toRGB(colors.orange["600"]),
                    "--color-danger": toRGB(colors.red["700"]),
                    "--color-light": toRGB(colors.slate["100"]),
                    "--color-dark": toRGB(colors.slate["800"]),
                    "&.dark": {
                        "--color-primary": toRGB(colors.indigo["700"]),
                    },
                },
            });
        }),
    ],
    variants: {
        extend: {
            boxShadow: ["dark"],
        },
    },
    //jetstream
    /*theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],*/
};
