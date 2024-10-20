import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/js/core.js",
                "resources/css/app.css",
                "resources/css/override.css",
                "resources/css/plugins/notification.css",
                "resources/js/app.js",
                "resources/js/util.js",
                "resources/js/init.js",
                "resources/js/chart.js",
                "resources/js/plugins/notification.js",
                "resources/js/plugins/rebound.js",
                "node_modules/franken-ui/dist/js/icon.iife.js",
            ],
            refresh: true,
        }),
    ],
});
