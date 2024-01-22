import "../css/app.css";
import { DefineComponent, createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";

declare global {
    interface ImportMeta {
        glob: (content: string) => {
            [key: string]: () => Promise<DefineComponent> | DefineComponent;
        };
    }
}

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue");
        return pages[`./Pages/${name}.vue`]();
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});