import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import { resolve } from "path";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ["resources/css/app.css", "resources/ts/app.ts"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": resolve(__dirname, "resources/ts"),
        },
    },
});
