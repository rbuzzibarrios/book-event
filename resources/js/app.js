import './bootstrap';
import '../css/app.css';

import { createSSRApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { createVuetify } from 'vuetify';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import "vuetify/styles";
import "vuetify/dist/vuetify.min.css";
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import "@mdi/font/css/materialdesignicons.css";
import { mdi } from "vuetify/iconsets/mdi";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        const vuetify = createVuetify({
            icons: {
                defaultSet: 'mdi',
            },
            components,
            directives,
            ssr: true,
        });

        return createSSRApp({ render: () => h(App, props) })
            .use(plugin)
            .use(vuetify)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
