//to correctly load the tailwind config file of frontend or backend
const tailwindConfig = process.env.TAILWIND_CONFIG || './tailwind.config.js';
export default {
    plugins: {
        "postcss-import": {}, //midone
        "postcss-advanced-variables": {}, //midone
        "tailwindcss/nesting": '', //midone
        tailwindcss: tailwindConfig,
        autoprefixer: {},
    },
};

