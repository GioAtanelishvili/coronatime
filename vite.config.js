import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/helpers/Validate.js",
                "resources/js/helpers/Input.js",
                "resources/js/login.js",
            ],
            refresh: true,
        }),
    ],
});
